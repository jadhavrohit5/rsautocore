<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('queries.php');
	
#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Contact - Sony AutoParts";
$GLOBALS['message']="";
#==============================================================

$user_loggedin = isset($_SESSION['user_idd']) ? $_SESSION['user_idd'] : "";
$user_idd = pobe_session_register('user_idd', '');
$adminusr = pobe_session_register('adminusr', '');
$admintpy = pobe_session_register('admintpy', '');
$useracntn = pobe_session_register('useracnt', '');
$global_loggedin = pobe_session_register('global_loggedin', '');
//$global_loggedin = isset($_SESSION['global_loggedin']) ? $_SESSION['global_loggedin'] : "";
$vendorid = pobe_session_register('vendorid', '');
$usrtoken = pobe_session_register('usrtoken', '');

/*--------------------------------------------------------------------------------*/
if(!empty($user_loggedin)) {
	$smarty->assign('loggedin','1');
	//------------------------------------------------
	$wuserid=base64_decode($_SESSION['user_idd']);
	$smarty->assign('userfullname',pobe_siteuser_name($wuserid)); 
	$smarty->assign('usertypename',pobe_siteuser_type($wuserid)); 
	$vendorid=$_SESSION['vendorid'];
	//------------------------------------------------
} else {
	$smarty->assign('loggedin','0');
}

/*--------------------------------------------------------------------------------*/

#==============================================================
$smarty->assign('title',$title);
$smarty->assign('self',$_SERVER['PHP_SELF']);	
$smarty->assign('message',$GLOBALS['message']);
$smarty->assign('memberstype',$admintpy); 
#=================================================================

/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/

if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$PAGE = basename( $_SERVER[ 'PHP_SELF' ] ); // Get current page name
$smarty->assign('PAGE',$PAGE);

$errmessage = "";
/*--------------------------------------------------------------------------------*/

$smarty->assign('numofcartitems',0);

$smarty->assign('pagenm',"contact");

$output=$smarty->fetch('contact.tpl');
$smarty->assign('MAIN_CONTENT',$output);

$smarty->display('main_new.tpl');	
?>