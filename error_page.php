<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/searchparts.php');
//include('classes/partstype.php');
include('queries.php');
	
#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Add Part - Sony AutoParts";
$GLOBALS['message']="";
#==============================================================

$user_loggedin = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
$user_id = pobe_session_register('user_id', '');
$adminnm = pobe_session_register('adminnm', '');
$admintp = pobe_session_register('admintp', '');
$global_logged_in = pobe_session_register('global_logged_in', '');

if($_SESSION['global_logged_in']=="true" || !empty($user_loggedin)) {
	$smarty->assign('loggedin','1');
} elseif($_SESSION['global_logged_in']!="true" || $admintp != md5(3)){  
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
} else {
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
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

$obj_partdt=new searchparts;
//$obj_parttp=new partstype;

$ptype = isset($_REQUEST['type']) ? trim($_REQUEST['type']) : 1;
$smarty->assign('ptype',$ptype); 

//print_r($_REQUEST);
/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";
/*--------------------------------------------------------------------------------*/

$smarty->assign('ptype',pobe_part_type_default(base64_decode($user_id)));
/*--------------------------------------------------------------------------------*/

$smarty->assign('parttypelist',pobe_part_type_list());

$output=$smarty->fetch('error_page.tpl');
$smarty->assign('MAIN_CONTENT',$output);

$smarty->assign('mainpage',"parts");
$smarty->assign('subpage',"error_page");
$smarty->assign('ptype',"");

if($admintp == md5(1)) {
$smarty->display('main.tpl');	
} else {
$smarty->display('main_user.tpl');	
}
/*--------------------------------------------------------------------------------*/
/*
if (error_get_last()){
$smarty->assign('errorgetlast',print_r(error_get_last()));
} else {
$smarty->assign('errorgetlast','');
}
*/
/*--------------------------------------------------------------------------------*/
$obj_partdt->con_close();
exit;
?>