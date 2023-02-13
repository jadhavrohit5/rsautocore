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
$title="Edit Part - Sony AutoParts";
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

//if(($admintp != md5(1)) || ($admintp != md5(3))) {
if($admintp == md5(2)) {
	//header('Location: error.php');	
	//die;
} elseif($useracn != md5(2)) {
	//header('Location: error.php');	
	//die;
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

$obj_partdt=new partsdata;

/*--------------------------------------------------------------------------------*/
$psect = "add_part";
if((pobe_user_part_sect_access(base64_decode($user_id), $psect) != 1) && ($admintp != md5(3))) {
	header('Location: error_page.php?msg='.base64_encode("You don't have access to this section"));	
	die;
}
/*--------------------------------------------------------------------------------*/
//echo "=================================================<br><br><br><br><br>";
//print_r($_REQUEST);
/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";
/*--------------------------------------------------------------------------------*/

$partid = isset($_REQUEST['partid']) ? $_REQUEST['partid'] : "";
$smarty->assign('partid',$_REQUEST['partid']); 

$ptypeid = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
$smarty->assign('ptypeid',$_REQUEST['type']); 
$smarty->assign('ptypenm',strtoupper(pobe_view_part_type($_REQUEST['type'])));

$schid = isset($_REQUEST['schid']) ? $_REQUEST['schid'] : "";
$smarty->assign('schid',$_REQUEST['schid']); 

$byuser = "admin";
$dateposted = date("Y-m-d H:i:s");
/*--------------------------------------------------------------------------------*/
//print_r($_REQUEST);

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'addoestock') {

	$oeone = isset($_POST['oeone']) ? $_POST['oeone'] : "";
	$oetwo = isset($_POST['oetwo']) ? $_POST['oetwo'] : "";
	$oemone = isset($_POST['oemone']) ? $_POST['oemone'] : "";
	$oemtwo = isset($_POST['oemtwo']) ? $_POST['oemtwo'] : "";
	$qntydata = isset($_POST['qtydata']) ? (int)$_POST['qtydata'] : 0;
	$location = isset($_POST['location']) ? $_POST['location'] : "";
	$grouprsac = $_POST['grouprsac'];
	$partno = 0;

	//id 	partid 	ptype 	oe_one 	oe_two 	oemone 	oemtwo 	qty_data 	location 	postdate 	status 	last_updated 	partno 	groupno 	

	$ret_val=$obj_partdt->add_partsdata_oe_stock(array('partid'=>addslashes($partid), 'ptype'=>addslashes($ptypeid), 'oe_one'=>addslashes($oeone), 'oe_two'=>addslashes($oetwo), 'oemone'=>addslashes($oemone), 'oemtwo'=>addslashes($oemtwo), 'qty_data'=>addslashes($qntydata), 'location'=>addslashes($location), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted, 'partno'=>addslashes($partno), 'groupno'=>addslashes($grouprsac),'is_deleted'=>'0'));

	header('location: view_part.php?type='.$ptypeid.'&partid='.$partid.'&schid='.$schid.'&msg='.base64_encode("New OE Stock record added successfully."));
	die;
}

/*--------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------*/

if(isset($_REQUEST['partid'])){  
	$smarty->assign('grouprsac',strtoupper(pobe_get_group_rsac_num($partid,$ptypeid)));
	$smarty->assign('oeone',"");
	$smarty->assign('oetwo',"");
	$smarty->assign('oemone',"");
	$smarty->assign('oemtwo',"");
	$smarty->assign('qtydata',"");
	$smarty->assign('location',"");

	$output=$smarty->fetch('add_new_stock_rec.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}
	
$smarty->assign('mainpage',"parts");
$smarty->assign('subpage',"parts");
$smarty->assign('ptype',"");

$smarty->display('main.tpl');	
/*--------------------------------------------------------------------------------*/
/*
if (error_get_last()){
$smarty->assign('errorgetlast',print_r(error_get_last()));
} else {
$smarty->assign('errorgetlast','');
}
*/
/*--------------------------------------------------------------------------------*/
?>