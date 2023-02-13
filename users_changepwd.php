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

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'updatepwd') {
	$wadmuserpass=md5(trim($_REQUEST['wadmuserpass']));
	$webadmaction = 'updated';
	$dateposted = date("Y-m-d H:i:s");

	$ret_val4=$obj_usrdata->update_siteusers(array('user_password'=>addslashes($wadmuserpass), 'last_updated'=>$dateposted),array('id'=>$webadmid));

	header('location: users_mgmt_view.php?mode=show&id='.base64_encode($webadmid).'&msg='.base64_encode("User Password updated successfully."));
	die;
}

if(isset($_REQUEST['mode']))
{	
	if($_REQUEST['mode']=="show")
	{		
		$ret_val=$obj_usrdata->get_siteusers_details(array('id'=>$webadmid));
		$row_webadm=$obj_usrdata->db->sql_fetchrowset();
			
		$smarty->assign('webadmid',base64_encode($webadmid));
		$smarty->assign('wadmusername',stripslashes($row_webadm[0]['user_name']));
		$smarty->assign('contactperson',stripslashes($row_webadm[0]['contact_person']));
			
		$output=$smarty->fetch('users_changepwd.tpl');
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