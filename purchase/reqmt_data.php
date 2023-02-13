<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/partsdata.php');
include('queries.php');
	
#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Search - Sony AutoParts";
$GLOBALS['message']="";
#==============================================================

$user_loggedin = isset($_SESSION['user_idd']) ? $_SESSION['user_idd'] : "";
$user_idd = pobe_session_register('user_idd', '');
$adminusr = pobe_session_register('adminusr', '');
$admintpy = pobe_session_register('admintpy', '');
$useracntn = pobe_session_register('useracnt', '');
$global_loggedin = pobe_session_register('global_loggedin', '');
$vendorid = pobe_session_register('vendorid', '');
$usrtoken = pobe_session_register('usrtoken', '');

if($_SESSION['global_loggedin']=="true" || !empty($user_loggedin)) {
	$smarty->assign('loggedin','1');
} else {
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
}

if($admintpy != md5(4)) {
	header('Location: error.php');	
	die;
} elseif($useracntn != md5(3)) {
	header('Location: error.php');	
	die;
}

/*--------------------------------------------------------------------------------*/
$wuserid=base64_decode($_SESSION['user_idd']);
$tknchk = pobe_user_login_check($wuserid,$usrtoken);
if($tknchk==0) {
	if (isset($_COOKIE['rsatoken'])){
		unset($_COOKIE['rsatoken']);
		setcookie('rsatoken', '', time() - 3600, '/'); // empty value and old timestamp
	}
	header('Location: errorpage.php?msg='.base64_encode("Someone logged in from another place."));	
	die;
}
/*--------------------------------------------------------------------------------*/

#==============================================================
$smarty->assign('title',$title);
$smarty->assign('self',$_SERVER['PHP_SELF']);	
$smarty->assign('message',$GLOBALS['message']);
$smarty->assign('memberstype',$admintpy); 
#=================================================================

/*--------------------------------------------------------------------------------*/
$wuserid=base64_decode($_SESSION['user_idd']);
$smarty->assign('userfullname',pobe_siteuser_name($wuserid)); 
$smarty->assign('usertypename',pobe_siteuser_type($wuserid)); 
/*--------------------------------------------------------------------------------*/

$obj_partdt=new partsdata;

/*--------------------------------------------------------------------------------*/
$ptype = isset($_REQUEST['type']) ? trim($_REQUEST['type']) : 1;
$smarty->assign('parttype',$_REQUEST['type']);
//$smarty->assign('ptypenm',strtoupper(pobe_view_part_type($_REQUEST['type'])));
$smarty->assign('ptypenm',strtoupper(pobe_view_part_group_name($_REQUEST['type'])));
$smarty->assign('ptypeph',pobe_view_part_group_image($ptype));

$schid = isset($_REQUEST['schid']) ? $_REQUEST['schid'] : "";
$smarty->assign('schid',$_REQUEST['schid']); 
$smarty->assign('searchkey',pobe_view_search_key($schid));    // added on 15-03-2022 

$partid = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
$smarty->assign('partid',$_REQUEST['id']); 
/*--------------------------------------------------------------------------------*/
//echo "=================================================<br><br><br><br><br>";
//print_r($_REQUEST);
/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$CURPAGE = basename( $_SERVER[ 'PHP_SELF' ] ); // Get current page name
$smarty->assign('PAGE',$CURPAGE);

$errmessage = "";
/*--------------------------------------------------------------------------------*/

$ret_valpt=$obj_partdt->get_partsdata_details(array('id'=>addslashes($partid)));
$rowpartdt=$obj_partdt->db->sql_fetchrowset();

//$ptrsac = stripslashes($rowpartdt[0]['rsac']);
//--------------------------------------added on 04-08-2021 
if ($ptype == 2){
$ptrsac = pobe_part_rsrefno_new($partid);
} else if (($ptype == 9) || ($ptype == 10) || ($ptype == 11) || ($ptype == 12)){
$ptrsac = pobe_get_group_rsac_num($partid);
} else {
$ptrsac = stripslashes($rowpartdt[0]['rsac']);
}
//---------------------------------------
$smarty->assign('ptrsac',$ptrsac); 

/*--------------------------------------------------------------------------------*/
//	added on 15-10-2020 
$type_opt = explode(",", pobe_user_part_type($wuserid));
//$smarty->assign('myparttypelist',pobe_parttype_list_upd($type_opt));
//	added on 05-08-2021  
$smarty->assign('myparttypelist',pobe_partgroup_list_upd($type_opt));
//---------------
$smarty->assign('numofcartitems',pobe_total_cart_items($vendorid,$wuserid));
$smarty->assign('vdrcur',pobe_vendor_currency($wuserid));

$smarty->assign('pagenm',"reqmt_data");

$output=$smarty->fetch('reqmt_data.tpl');
$smarty->assign('MAIN_CONTENT',$output);

$smarty->display('main.tpl');	
/*--------------------------------------------------------------------------------*/
$obj_partdt->con_close();
exit;
?>