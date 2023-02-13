<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/partstype.php');
include('queries.php');
	
#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Edit Part Category - Sony AutoParts";
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

$obj_partdt=new partstype;

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";

////$ptypeid = isset($_REQUEST['ptype']) ? base64_decode($_REQUEST['ptype']) : "";
$ptypeid = isset($_REQUEST['ptype']) ? trim($_REQUEST['ptype']) : "";
$smarty->assign('ptype',$_REQUEST['ptype']); 

/*--------------------------------------------------------------------------------*/
/*
if(isset($_REQUEST['type'])){  
	$smarty->assign('parttype',$_REQUEST['type']);
	$smarty->assign('ptypenm',pobe_view_part_type($_REQUEST['type']));
} else {
	$smarty->assign('parttype',"");
	$smarty->assign('ptypenm',"");
}
*/
//echo "==========================================<br>";
//print_r($_REQUEST);
//echo "==========================================<br>";

/*--------------------------------------------------------------------------------*/

if(isset($_REQUEST['mode']))
{	
	if($_REQUEST['mode']=="show")
	{		

		$ret_val=$obj_partdt->get_partstype_details(array('id'=>addslashes($ptypeid)));
		$row_reqcnt=$obj_partdt->db->sql_fetchrowset();

		$ptid = stripslashes($row_reqcnt[0]['id']);	 

		$smarty->assign('parttype',stripslashes($row_reqcnt[0]['part_type']));
		$smarty->assign('stockopt',stripslashes($row_reqcnt[0]['stockopt']));
		$smarty->assign('oeoemopt',stripslashes($row_reqcnt[0]['oeoemopt']));
/*
*/		
		$smarty->assign('oestockopt',stripslashes($row_reqcnt[0]['hv_oerec']));   // added on 04-02-2023 

		$cust_opt = explode(",", $row_reqcnt[0]['cust_opt']);

		$customercnt = pobe_customer_count();
		$smarty->assign('customercnt',$customercnt);

		$customerlist = pobe_customer_list_opt($cust_opt);
		$smarty->assign('customerlist',$customerlist);

		// -------------------------------------------
		// added on 27-01-2022 
		$attr_opt = explode(",", $row_reqcnt[0]['attr_opt']);  // added on 27-01-2022 

		$attributelist = pobe_attribute_list_chk($attr_opt);
		$smarty->assign('attributelist',$attributelist);
		// -------------------------------------------

		$output=$smarty->fetch('export_select_option.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}

$smarty->assign('mainpage',"export_partdata");
$smarty->assign('subpage',"export_select_type");
$smarty->assign('ptype',"");

$smarty->display('main.tpl');	
?>