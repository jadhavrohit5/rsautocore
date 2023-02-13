<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/partstock.php');
include('queries.php');
#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Delete Purchase Order - Sony AutoParts";
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

$obj_podata=new partstock;

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";
/*--------------------------------------------------------------------------------*/

//print_r($_REQUEST);

/*--------------------------------------------------------------------------------*/
if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'deleteporder') {
	$ponum = isset($_POST['ponum']) ? $_POST['ponum'] : "";

	$poexists = $obj_podata->count_partstock_details(array('po_num'=>addslashes($ponum), 'status'=>'1', 'is_deleted'=>'0'));

	if ($poexists > 0){
		$datedeleted = date("Y-m-d H:i:s");
		$ret_vald1=$obj_podata->update_partstock(array('datedeleted'=>$datedeleted, 'is_deleted'=>'1'), array('po_num'=>addslashes($ponum)));
		$smarty->assign('msg',"Purchase Order deleted successfully. Deleted PO had ".$poexists." records.");
	} else {
		$smarty->assign('msg','No active PO exists with this PO number '.$ponum);
	}
}
/*--------------------------------------------------------------------------------*/
if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'deletesorder') {
	$sonum = isset($_POST['sonum']) ? $_POST['sonum'] : "";

	$sreccount = $obj_podata->count_partstock_details(array('so_num'=>addslashes($sonum), 'status'=>'1', 'is_deleted'=>'0'));

	if ($sreccount > 0){
		$datedeleted = date("Y-m-d H:i:s");
		$ret_vald2=$obj_podata->update_partstock(array('datedeleted'=>$datedeleted, 'is_deleted'=>'1'), array('so_num'=>addslashes($sonum)));
		$smarty->assign('msg',"Sales Order deleted successfully. Deleted SO had ".$sreccount." records.");
	} else {
		$smarty->assign('msg','No active SO exists with this SO number '.$sonum);
	}
}
/*--------------------------------------------------------------------------------*/

if(isset($_REQUEST['mode']))
{	
	if($_REQUEST['mode']=="show")
	{		
		$parttypelist = pobe_part_type_list();
		$smarty->assign('parttypelist',$parttypelist);

		$output=$smarty->fetch('manage_podata.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}

$smarty->assign('mainpage',"manage_site");
$smarty->assign('subpage',"manage_podata");
$smarty->assign('ptype',"");

$smarty->display('main.tpl');	
?>