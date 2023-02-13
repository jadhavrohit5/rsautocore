<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
require("classes/siteusers.php");
require("classes/user_type.php");
include('queries.php');
#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Manage Users Page - Sony AutoParts";
$GLOBALS['message']="";
#==============================================================

$user_loggedin = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
$user_id = pobe_session_register('user_id', '');
$adminnm = pobe_session_register('adminnm', '');
$admintp = pobe_session_register('admintp', '');
$useracn = pobe_session_register('userac', '');
$global_logged_in = pobe_session_register('global_logged_in', '');

if($_SESSION['global_logged_in']=="true" || !empty($user_loggedin)) {
	$smarty->assign('loggedin','1');
} else {
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
}

if($admintp != md5(3)) {
	header('Location: error.php');	
	die;
} elseif($useracn != md5(2)) {
	header('Location: error.php');	
	die;
}

#==============================================================
$smarty->assign('title',$title);
$smarty->assign('self',$_SERVER['PHP_SELF']);	
$smarty->assign('message',$GLOBALS['message']);
$smarty->assign('adminusertype',$admintp); 
#=================================================================

/*--------------------------------------------------------------------------------*/
$wuserid=base64_decode($_SESSION['user_id']);
$smarty->assign('userfullname',pobe_siteuser_name($wuserid)); 
$smarty->assign('usertypename',pobe_siteuser_type($wuserid)); 
/*--------------------------------------------------------------------------------*/

$obj_usrdata=new siteusers;

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";
/*--------------------------------------------------------------------------------*/

$webadmid = isset($_REQUEST['id']) ? base64_decode($_REQUEST['id']) : "";
$smarty->assign('webadmid',$_REQUEST['id']); 

/*--------------------------------------------------------------------------------*/
//print_r($_REQUEST);

/*--------------------------------------------------------------------------------*/

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'update') {
	$contactperson=trim($_REQUEST['contactperson']);
	$designation=trim($_REQUEST['designation']);
	$contactemail=trim($_REQUEST['contactemail']);
	$contactphone=trim($_REQUEST['contactphone']);
	$wadmusertype=trim($_REQUEST['wadmusertype']);

	$sect_opt = "";
	$sect_opt.= isset($_REQUEST['addpart']) && $_REQUEST['addpart'] == "on" ? "add_part," : "";
	$sect_opt.= isset($_REQUEST['imports']) && $_REQUEST['imports'] == "on" ? "manage_imports," : "";
	$sect_opt.= isset($_REQUEST['reports']) && $_REQUEST['reports'] == "on" ? "manage_reports," : "";

	$type_opt = "";
	if(isset($_POST['ptypeopt'])) {
        foreach($_POST['ptypeopt'] as $ptypeopt => $val){
 			$type_opt.= $val.',';
		}
    } 

	if($wadmusertype == "adminuser") {
		$sect_opt = rtrim($sect_opt,',');
		$type_opt = rtrim($type_opt,',');
	} else {
		$sect_opt = "";
		$type_opt = rtrim($type_opt,',');
	}

	$webadmaction = 'updated';
	$dateposted = date("Y-m-d H:i:s");

	$ret_val2=$obj_usrdata->update_siteusers(array('contact_person'=>addslashes($contactperson), 'contact_email'=>addslashes($contactemail), 'contact_phone'=>addslashes($contactphone), 'designation'=>addslashes($designation), 'part_type'=>addslashes($type_opt), 'sect_type'=>addslashes($sect_opt), 'last_updated'=>$dateposted), array('id'=>$webadmid));

	header('location: users_mgmt_view.php?mode=show&id='.base64_encode($webadmid).'&msg='.base64_encode("User details updated successfully."));
	die;
}

if(isset($_REQUEST['mode']))
{	
	if($_REQUEST['mode']=="show")
	{		
		$ret_val=$obj_usrdata->get_siteusers_details(array('id'=>$webadmid));
		$row_webadm=$obj_usrdata->db->sql_fetchrowset();
			
		$smarty->assign('webadmid',base64_encode($webadmid));
		$smarty->assign('wadmusertpnm',stripslashes($row_webadm[0]['user_typename']));
		$smarty->assign('wadmusername',stripslashes($row_webadm[0]['user_name']));
		$smarty->assign('contactperson',stripslashes($row_webadm[0]['contact_person']));
		$smarty->assign('contactemail',stripslashes($row_webadm[0]['contact_email']));
		$smarty->assign('contactphone',stripslashes($row_webadm[0]['contact_phone']));
		$smarty->assign('designation',stripslashes($row_webadm[0]['designation']));
		$smarty->assign('webadmstatus',$row_webadm[0]['user_status']);
		$smarty->assign('webcreatedon',pobe_format_full_date($row_webadm[0]['datecreated']));

		if($row_webadm[0]['user_type_id'] == '1') {
			$smarty->assign('wadmusertype',"adminuser");
		} elseif($row_webadm[0]['user_type_id'] == '2') {
			$smarty->assign('wadmusertype',"siteuser");
		}

		$smarty->assign('sect_opt',stripslashes($row_webadm[0]['part_type']));
		$smarty->assign('type_opt',stripslashes($row_webadm[0]['sect_type']));

		$sect_opt = explode(",", $row_webadm[0]['sect_type']);
		$smarty->assign('addpart','');
		$smarty->assign('imports','');
		$smarty->assign('reports','');

		foreach ($sect_opt as $item) {
			if ($item == "add_part") $smarty->assign('addpart','1');
			if ($item == "manage_imports") $smarty->assign('imports','1');
			if ($item == "manage_reports") $smarty->assign('reports','1');
		}

		$type_opt = explode(",", $row_webadm[0]['part_type']);

		$ptypelist = pobe_parttype_list_upd($type_opt);
		$smarty->assign('ptypelist',$ptypelist);

		$output=$smarty->fetch('users_mgmt_edit.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}

$smarty->assign('mainpage',"manage_site");
$smarty->assign('subpage',"users_mgmt");

$smarty->display('main.tpl');	
?>