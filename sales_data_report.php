<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/partstock.php');
include('queries.php');

require_once 'classes/PHPExcel/IOFactory.php';

#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Sales Data Report - Sony AutoParts";
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
} elseif($_SESSION['global_logged_in']!="true" || ($admintp != md5(1)) || ($admintp != md5(3))){  
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
} else {
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
}

if($admintp == md5(2)) {
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
$smarty->assign('memberstype',$admintp); 
#=================================================================

/*--------------------------------------------------------------------------------*/
$wuserid=base64_decode($_SESSION['user_id']);
$smarty->assign('userfullname',pobe_siteuser_name($wuserid)); 
$smarty->assign('usertypename',pobe_siteuser_type($wuserid)); 
/*--------------------------------------------------------------------------------*/

$obj_partstk=new partstock;

/*--------------------------------------------------------------------------------*/
$psect = "manage_reports";
if((pobe_user_part_sect_access(base64_decode($user_id), $psect) != 1) && ($admintp != md5(3))) {
	header('Location: error_page.php?msg='.base64_encode("You don't have access to this section"));	
	die;
}
/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";
/*--------------------------------------------------------------------------------*/

$parttype = isset($_REQUEST['parttype']) ? trim($_REQUEST['parttype']) : 0;

/*--------------------------------------------------------------------------------*/


if(isset($_REQUEST['parttype'])){  
	$smarty->assign('parttype',$_REQUEST['parttype']);
	$smarty->assign('ptypenm',strtoupper(pobe_view_part_type($_REQUEST['parttype'])));
} else {
	$smarty->assign('parttype',"");
	$smarty->assign('ptypenm',"");
}

if(isset($_REQUEST['mode']))
{	
	if($_REQUEST['mode']=="show")
	{		
		if($admintp != md5(3)) {
		$smarty->assign('myparttypelist',pobe_part_type_allowed_list(base64_decode($user_id)));
		} else {
		$smarty->assign('myparttypelist',pobe_part_type_list());
		}

		$parttypelist = pobe_part_type_list();
		$smarty->assign('parttypelist',$parttypelist);

		$output=$smarty->fetch('sales_data_report.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}

$smarty->assign('mainpage',"manage_reports");
$smarty->assign('subpage',"sales_data_report");
$smarty->assign('ptype',"");

$smarty->display('main.tpl');	
?>