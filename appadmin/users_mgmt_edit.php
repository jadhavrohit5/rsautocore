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

$user_loggedin = isset($_SESSION['user_wid']) ? $_SESSION['user_wid'] : "";
$user_wid = pobe_session_register('user_wid', '');
$adminwnm = pobe_session_register('adminwnm', '');
$adminwtp = pobe_session_register('adminwtp', '');
$userwactn = pobe_session_register('userwact', '');
$global_wloggedin = pobe_session_register('global_wloggedin', '');

if($_SESSION['global_wloggedin']=="true" || !empty($user_loggedin)) {
	$smarty->assign('loggedin','1');
} else {
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
}

if($adminwtp != md5(3)) {
	header('Location: error.php');	
	die;
} elseif($userwactn != md5(2)) {
	header('Location: error.php');	
	die;
}

#==============================================================
$smarty->assign('title',$title);
$smarty->assign('self',$_SERVER['PHP_SELF']);	
$smarty->assign('message',$GLOBALS['message']);
$smarty->assign('adminusertype',$adminwtp); 
#=================================================================

/*--------------------------------------------------------------------------------*/
$wuserid=base64_decode($_SESSION['user_wid']);
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
	$country=trim($_REQUEST['country']);
	$wadmusertype=trim($_REQUEST['wadmusertype']);
//==================================updated on 04-08-2021 	
	$grp_opt = "";
	$type_opt = "";
	if(isset($_POST['ptypeopt'])) {
		foreach($_POST['ptypeopt'] as $ptypeopt => $val){
			$grp_opt.= $val.',';
			$type_opt.= pobe_partgroup_typeids($val).',';
		}
	} 
	$grp_opt = rtrim($grp_opt,',');
	$type_opt = rtrim($type_opt,',');

	if($_REQUEST['sch_opt'] == 1) {
		$rsadb_opt = '1';
		$extdb_opt = '0';
	} elseif($_REQUEST['sch_opt'] == 2) {
		$rsadb_opt = '0';
		$extdb_opt = '1';
	} else {
		$rsadb_opt = '1';
		$extdb_opt = '1';
	}
//==========================================================	
	$webadmaction = 'updated';
	$dateposted = date("Y-m-d H:i:s");

//	updated on 04-08-2021  
	$ret_val2=$obj_usrdata->update_siteusers(array('contact_person'=>addslashes($contactperson), 'contact_email'=>addslashes($contactemail), 'contact_phone'=>addslashes($contactphone), 'designation'=>addslashes($designation), 'country'=>addslashes($country), 'part_type'=>addslashes($type_opt), 'last_updated'=>$dateposted, 'cat_type'=>addslashes($grp_opt), 'rsadb_opt'=>$rsadb_opt, 'extdb_opt'=>$extdb_opt), array('id'=>$webadmid));

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
		$smarty->assign('country',stripslashes($row_webadm[0]['country']));
		$smarty->assign('webadmstatus',$row_webadm[0]['user_status']);
		$smarty->assign('webcreatedon',pobe_format_full_date($row_webadm[0]['datecreated']));

//==================================updated on 04-08-2021 	
		if(($row_webadm[0]['rsadb_opt'] == '1') && ($row_webadm[0]['extdb_opt'] == '1')) {
			$smarty->assign('sch_opt','3');
		} elseif(($row_webadm[0]['rsadb_opt'] == '1') && ($row_webadm[0]['extdb_opt'] == '0')) {
			$smarty->assign('sch_opt','1');
		} elseif(($row_webadm[0]['rsadb_opt'] == '0') && ($row_webadm[0]['extdb_opt'] == '1')) {
			$smarty->assign('sch_opt','2');
		} else {
			$smarty->assign('sch_opt','');
		}

		$type_opt = explode(",", $row_webadm[0]['part_type']);
		$grp_opt = explode(",", $row_webadm[0]['cat_type']);

		//$ptypelist = pobe_parttype_list_upd($type_opt);
		$smarty->assign('ptypelistold',pobe_parttype_list_upd($type_opt));
		$ptypelist = pobe_partgroup_list_upd($grp_opt);
		$smarty->assign('ptypelist',$ptypelist);
//==========================================================	

//--------------------------------------------------------------------------------
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