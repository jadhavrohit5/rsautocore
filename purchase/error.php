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
$title="Error page - Sony AutoParts";
$message = isset($GLOBALS['message']) ? $GLOBALS['message'] : "";
#==============================================================

#==============================================================
$smarty->assign('title',$title);
$smarty->assign('self',$_SERVER['PHP_SELF']);	
$smarty->assign('message',$GLOBALS['message']);
#=================================================================

/*--------------------------------------------------------------------------------*/
if(isset($_SESSION['user_idd']) && $_SESSION['user_idd']!=""){
	unset($_SESSION['user_idd']);			
	pobe_session_unregister('user_idd');      //session_destroy();	
	pobe_session_unregister('adminusr');      //session_destroy();	
	pobe_session_unregister('admintpy');      //session_destroy();	
}
$_SESSION['global_loggedin'] = "false";
$_SESSION['user_idd'] = "";
$_SESSION['adminusr'] = "";
$_SESSION['admintpy'] = md5(time());
$_SESSION['useracnt'] = md5(time());
$_SESSION['vendorid'] = md5(time());
$_SESSION['usrtoken'] = "";
/*--------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('message',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('message',"");
}
/*--------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------*/

$output=$smarty->fetch('error.tpl');
$smarty->assign('MAIN_CONTENT',$output);

$smarty->display('main_page.tpl');	
/*--------------------------------------------------------------------------------*/
?>