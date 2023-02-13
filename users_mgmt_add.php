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
//print_r($_REQUEST);

/*--------------------------------------------------------------------------------*/

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'add') {
	$wadmusertype=trim($_REQUEST['wadmusertype']);
	$wadmusername=trim($_REQUEST['wadmusername']);
	$wadmuserpass=md5(trim($_REQUEST['wadmuserpass']));
	$contactperson=trim($_REQUEST['contactperson']);
	$designation=trim($_REQUEST['designation']);
	$contactemail=trim($_REQUEST['contactemail']);
	$contactphone=trim($_REQUEST['contactphone']);

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

	$exist_emailnm=0;

	$exist_emailnm+=$obj_usrdata->count_siteusers_details(array('user_name'=>addslashes($wadmusername), 'user_status'=>'1'));	

	if($exist_emailnm==0) {

		if($wadmusertype == "adminuser") {
			$webusrtypeid=1;
			$webacctypeid=2;
			$usrtypename = 'Admin User';
			$sect_opt = rtrim($sect_opt,',');
			$type_opt = rtrim($type_opt,',');
		} else {
			$webusrtypeid=2;
			$webacctypeid=1;
			$usrtypename = 'Warehouse User';
			$sect_opt = "";
			$type_opt = rtrim($type_opt,',');
		}

		$webadmaction = 'created';
		$createdbyid = base64_decode($user_id);
		$dateposted = date("Y-m-d H:i:s");

		$ret_val=$obj_usrdata->add_siteusers(array('user_type_id'=>$webusrtypeid, 'account_type_id'=>$webacctypeid, 'user_name'=>addslashes($wadmusername), 'user_password'=>addslashes($wadmuserpass), 'user_typename'=>addslashes($usrtypename), 'contact_person'=>addslashes($contactperson), 'contact_email'=>addslashes($contactemail), 'contact_phone'=>addslashes($contactphone), 'designation'=>addslashes($designation), 'part_type'=>addslashes($type_opt), 'sect_type'=>addslashes($sect_opt), 'user_status'=>'1', 'createdbyid'=>$createdbyid, 'datecreated'=>$dateposted));

		$ret_val2=$obj_usrdata->get_siteusers_details(array('user_name'=>addslashes($wadmusername),'datecreated'=>$dateposted));
		$row_webadm=$obj_usrdata->db->sql_fetchrowset();
		$newwebadmid=$row_webadm[0]['id'];

		header('location: users_mgmt.php?mode=show&msg='.base64_encode("New user added successfully."));
		die;
	} else {
		$smarty->assign('msg',"Error - An user with this username is already exist.");
		$_REQUEST['mode']="show";
	}
}

if(isset($_REQUEST['mode']))
{	
	if($_REQUEST['mode']=="show")
	{		
		$contactperson = isset($_REQUEST['contactperson']) ? $_REQUEST['contactperson'] : "";
		$designation = isset($_REQUEST['designation']) ? $_REQUEST['designation'] : "";
		$contactemail = isset($_REQUEST['contactemail']) ? $_REQUEST['contactemail'] : "";
		$contactphone = isset($_REQUEST['contactphone']) ? $_REQUEST['contactphone'] : "";

		$smarty->assign('wadmusertype',""); 
		$smarty->assign('wadmusername',""); 
		$smarty->assign('contactperson',$contactperson); 
		$smarty->assign('designation',$designation); 
		$smarty->assign('contactemail',$contactemail); 
		$smarty->assign('contactphone',$contactphone); 

		$ptypecnt = pobe_parttype_count();
		$smarty->assign('ptypecnt',$ptypecnt);

		$ptypelist = pobe_parttype_list();
		$smarty->assign('ptypelist',$ptypelist);
//--------------------------------------------------------------------------------
		$smarty->assign('parttypelist',pobe_part_type_list());
		$output=$smarty->fetch('users_mgmt_add.tpl');
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