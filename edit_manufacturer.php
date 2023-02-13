<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/manufacturerdata.php');
include('queries.php');
	
#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Edit Car Manufacturer - Sony AutoParts";
$GLOBALS['message']="";
#==============================================================

$user_loggedin = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
$user_id = pobe_session_register('user_id', '');
$adminnm = pobe_session_register('adminnm', '');
$admintp = pobe_session_register('admintp', '');
$global_logged_in = pobe_session_register('global_logged_in', '');

if($_SESSION['global_logged_in']=="true" || !empty($user_loggedin)) {
	$smarty->assign('loggedin','1');
} elseif($_SESSION['global_logged_in']!="true" || $admintp != md5(1)){  
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
} else {
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
}

if($admintp != md5(1)) {
	header('Location: error.php');	
	die;
}

#==============================================================
$smarty->assign('title',$title);
$smarty->assign('self',$_SERVER['PHP_SELF']);	
$smarty->assign('message',$GLOBALS['message']);
$smarty->assign('memberstype',$admintp); 
#=================================================================

/*--------------------------------------------------------------------------------*/
$wuserid=base64_decode($_SESSION['user_id']);
$smarty->assign('userfullname',pobe_siteuser_name($wuserid)); 
$smarty->assign('usertypename',pobe_siteuser_type($wuserid)); 
/*--------------------------------------------------------------------------------*/

$obj_custdt=new manufacturerdata;

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";

$cmid = isset($_REQUEST['cmid']) ? base64_decode($_REQUEST['cmid']) : "";
$smarty->assign('cmid',$_REQUEST['cmid']); 

/*--------------------------------------------------------------------------------*/
//print_r($_REQUEST);

/*--------------------------------------------------------------------------------*/

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'updcarmanf') {
	$manufacturernm = isset($_POST['manufacturernm']) ? $_POST['manufacturernm'] : "";

	$mnfexists = pobe_chk_manufacturer_name($cmid,$manufacturernm);

	if ($mnfexists == 0){
		$dateposted = date("Y-m-d H:i:s");

		$ret_val3=$obj_custdt->update_manufacturerdata(array('name'=>addslashes($manufacturernm), 'last_updated'=>$dateposted), array('id'=>$cmid));
/*--------------------------------------------------------------------------------*/
		header('location: manage_manufacturers.php?mode=show&msg='.base64_encode("Manufacturer updated successfully."));
		die;
	} else {
		$smarty->assign('msg','Manufacturer name already exists.');
	}
}

if(isset($_REQUEST['mode']))
{	
	if($_REQUEST['mode']=="show")
	{		

		$ret_val=$obj_custdt->get_manufacturerdata_details(array('id'=>addslashes($cmid)));
		$row_reqcnt=$obj_custdt->db->sql_fetchrowset();

		$cmid = stripslashes($row_reqcnt[0]['id']);	 
		$smarty->assign('manufacturernm',stripslashes($row_reqcnt[0]['name']));

		$output=$smarty->fetch('edit_manufacturer.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}

$smarty->assign('mainpage',"manage_site");
$smarty->assign('subpage',"manage_manufacturers");
$smarty->assign('cmid',"");

$smarty->display('main.tpl');	
?>