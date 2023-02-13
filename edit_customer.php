<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/customersdata.php');
include('queries.php');
	
#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Edit Customer - Sony AutoParts";
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

$obj_custdt=new customersdata;

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";

$custid = isset($_REQUEST['custid']) ? base64_decode($_REQUEST['custid']) : "";
$smarty->assign('custid',$_REQUEST['custid']); 

/*--------------------------------------------------------------------------------*/
//print_r($_REQUEST);

/*--------------------------------------------------------------------------------*/

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'updcustomer') {
	$custname = isset($_POST['custname']) ? $_POST['custname'] : "";

	$custcnt = pobe_chk_customer_name($custid,$custname);

	if ($custcnt == 0){
		$dateposted = date("Y-m-d H:i:s");

		$ret_val3=$obj_custdt->update_customersdata(array('name'=>addslashes($custname), 'last_updated'=>$dateposted), array('cid'=>$custid));
/*--------------------------------------------------------------------------------*/
		header('location: manage_customers.php?mode=show&msg='.base64_encode("Customer updated successfully."));
		die;
	} else {
		$smarty->assign('msg','The customer name already exists.');
	}
}

if(isset($_REQUEST['mode']))
{	
	if($_REQUEST['mode']=="show")
	{		

		$ret_val=$obj_custdt->get_customersdata_details(array('cid'=>addslashes($custid)));
		$row_reqcnt=$obj_custdt->db->sql_fetchrowset();

		$custid = stripslashes($row_reqcnt[0]['cid']);	 
		$smarty->assign('custname',stripslashes($row_reqcnt[0]['name']));
		$smarty->assign('sortcode',stripslashes($row_reqcnt[0]['sortcode']));

		$output=$smarty->fetch('edit_customer.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}

$smarty->assign('mainpage',"manage_site");
$smarty->assign('subpage',"manage_customers");
$smarty->assign('custid',"");

$smarty->display('main.tpl');	
?>