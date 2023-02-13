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
$smarty->assign('userfullname',pobe_siteuser_name($wuserid)); 
$smarty->assign('usertypename',pobe_siteuser_type($wuserid)); 
$vendorid=$_SESSION['vendorid'];
/*--------------------------------------------------------------------------------*/

$obj_partdt=new partsdata;

/*--------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------*/

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

if(isset($_REQUEST['type']) && trim($_REQUEST['type']) != ''){  
	$ptype = trim($_REQUEST['type']);
} else {
	$ptype = 1;
}
$smarty->assign('parttype',$ptype);
$smarty->assign('ptypenm',strtoupper(pobe_view_part_group_name($ptype)));

//echo "=================================================<br><br><br><br><br>";
//print_r($_REQUEST);
/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/

if(isset($_REQUEST['regnumber'])){  
	$smarty->assign('searchkey',$_REQUEST['regnumber']);
} else {
	$smarty->assign('searchkey',"");
}

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'vnpsearch') {


/*
*/
}

/*--------------------------------------------------------------------------------*/
$currschchk = pobe_check_current_searches($wuserid,$vendorid);
if ($currschchk == 1){
	//echo "current searches: ".$currschchk." :: BLOCK USER<br>";
	pobe_user_block($wuserid);
	header('Location: errorpage.php?msg='.base64_encode("Too many searches. Please login after sometime."));	
	die;
}
/*--------------------------------------------------------------------------------*/
$pastschchk = pobe_check_monthly_searches($wuserid);
if ($pastschchk == 1){
	//echo "30 days searches: ".$pastschchk." :: SUSPEND USER<br>";
	pobe_user_suspend($wuserid);
	header('Location: errorpage.php?msg='.base64_encode("Login access denied. Please contact site admin."));	
	die;
}
/*--------------------------------------------------------------------------------*/

$type_opt = explode(",", pobe_user_part_type($wuserid));
$smarty->assign('myparttypelist',pobe_partgroup_list_upd($type_opt));
//---------------
$smarty->assign('numofcartitems',pobe_total_cart_items($vendorid,$wuserid));

$output=$smarty->fetch('myresults.tpl');
$smarty->assign('MAIN_CONTENT',$output);

$smarty->display('main.tpl');	
/*--------------------------------------------------------------------------------*/
$obj_partdt->con_close();
exit;
?>