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
$title="Order Success - Sony AutoParts";
$message = isset($GLOBALS['message']) ? $GLOBALS['message'] : "";
#==============================================================

#==============================================================
$smarty->assign('title',$title);
$smarty->assign('self',$_SERVER['PHP_SELF']);	
$smarty->assign('message',$GLOBALS['message']);
#=================================================================

if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}
$errmessage = "";
/*--------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------*/

$output=$smarty->fetch('success.tpl');
$smarty->assign('MAIN_CONTENT',$output);

$smarty->display('main_gen.tpl');	
/*--------------------------------------------------------------------------------*/
$obj_partdt->con_close();
exit;
?>