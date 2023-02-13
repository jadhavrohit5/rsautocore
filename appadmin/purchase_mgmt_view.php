<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
require("classes/partspurchased.php");
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

$user_loggedin = isset($_SESSION['user_wid']) ? $_SESSION['user_wid'] : "";
$user_wid = pobe_session_register('user_wid', '');
$adminwnm = pobe_session_register('adminwnm', '');
$adminwtp = pobe_session_register('adminwtp', '');
$userwactn = pobe_session_register('userwact', '');
$global_wloggedin = pobe_session_register('global_wloggedin', '');

if($_SESSION['global_wloggedin']=="true" || !empty($user_loggedin)) {
	$smarty->assign('loggedin','1');
} else {
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
}

if($adminwtp != md5(3)) {
	header('Location: error.php');	
	die;
} elseif($userwactn != md5(2)) {
	header('Location: error.php');	
	die;
}

#==============================================================
$smarty->assign('title',$title);
$smarty->assign('self',$_SERVER['PHP_SELF']);	
$smarty->assign('message',$GLOBALS['message']);
$smarty->assign('adminusertype',$adminwtp); 
#=================================================================

/*--------------------------------------------------------------------------------*/
$wuserid=base64_decode($_SESSION['user_wid']);
$smarty->assign('userfullname',pobe_siteuser_name($wuserid)); 
$smarty->assign('usertypename',pobe_siteuser_type($wuserid)); 
/*--------------------------------------------------------------------------------*/

$obj_podata=new partspurchased;

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";
/*--------------------------------------------------------------------------------*/

$poid = isset($_REQUEST['id']) ? base64_decode($_REQUEST['id']) : "";
$smarty->assign('poid',$_REQUEST['id']); 

/*--------------------------------------------------------------------------------*/
//print_r($_REQUEST);

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'itmdelivered') {

	$offitmid = "";
	$ponumbr = $_POST['ponumbr'];
	$dateupd = date("Y-m-d H:i:s");

	if(isset($_POST['delvopt'])) {
		foreach($_POST['delvopt'] as $delvopt => $val){
			$offitmid .= $val.",";
			$ret_vald2=$obj_podata->update_partspurchased(array('is_delivered'=>'1', 'last_updated'=>$dateupd), array('id'=>$val));
		}
		$smarty->assign('msg',"Part Delivery Status Updated");
	} 

	$offitmid = rtrim($offitmid,',');
	$ret_vald3=$obj_podata->update_partspurchased_delivery($ponumbr,$offitmid);

	$_REQUEST['mode']="show";
}

/*--------------------------------------------------------------------------------*/

if(isset($_REQUEST['mode']))
{

	if($_REQUEST['mode']=="show")
	{		

		$ret_val=$obj_podata->get_partspurchased_po_details(array('poid'=>addslashes($poid)));
		$row_webadm=$obj_podata->db->sql_fetchrowset();
			
		$vusrid=stripslashes($row_webadm[0]['userid']);
		$ponum=stripslashes($row_webadm[0]['po_num']);

		$smarty->assign('poid',base64_encode($poid));
		$smarty->assign('vendorname',pobe_siteuser_name($row_webadm[0]['userid']));
		$smarty->assign('ponum',stripslashes($row_webadm[0]['po_num']));
		$smarty->assign('totalitems',stripslashes($row_webadm[0]['total_items']));
		$smarty->assign('totalorder',stripslashes($row_webadm[0]['total_order']));
		$smarty->assign('dateposted',pobe_format_full_date($row_webadm[0]['postdate']));
		$smarty->assign('isdeletd',$row_webadm[0]['is_deleted']);

		$smarty->assign('vndrcur',pobe_vendor_currency($row_webadm[0]['userid']));  // added on 18-02-2022 

		$smarty->assign('pordlist',pobe_purchase_order_list($vusrid,$ponum));

//--------------------------------------------------------------------------------
		$output=$smarty->fetch('purchase_mgmt_view.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}

$smarty->assign('mainpage',"manage_site");
$smarty->assign('subpage',"purchase_mgmt");

$smarty->display('main.tpl');	
?>