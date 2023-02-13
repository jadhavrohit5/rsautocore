<?php
ob_start();
//---------------------------------
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/regsearchdata.php');
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
////$wuserid=base64_decode($_SESSION['user_idd']);
$smarty->assign('userfullname',pobe_siteuser_name($wuserid)); 
$smarty->assign('usertypename',pobe_siteuser_type($wuserid)); 
$vendorid=$_SESSION['vendorid'];
/*--------------------------------------------------------------------------------*/

$obj_schdata=new regsearchdata;

/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/

if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$PAGE = basename( $_SERVER[ 'PHP_SELF' ] ); // Get current page name
$smarty->assign('PAGE',$PAGE);

$errmessage = "";
/*--------------------------------------------------------------------------------*/

$schid = trim($_GET['id']);	
$ktypno = trim($_GET['ktypno']);	

$smarty->assign('schid',$_GET['id']);
$smarty->assign('ktypno',$_GET['ktypno']);

$stagenum = '3';
$dateposted = date("Y-m-d H:i:s");

/*--------------------------------------------------------------------------------*/

//$ret_valpt=$obj_schdata->get_regsearchdata_vdata(array('sch_id'=>addslashes($schid),'KTypNo'=>addslashes($ktypno)));
$ret_valpt=$obj_schdata->get_regsearchdata_details(array('id'=>addslashes($schid),'carid'=>addslashes($ktypno)));
$rowvd=$obj_schdata->db->sql_fetchrowset();

$smarty->assign('regnum',stripslashes($rowvd[0]['regno']));
$smarty->assign('ccmTech',stripslashes($rowvd[0]['ccmTech']));
$smarty->assign('consType',stripslashes($rowvd[0]['consType']));
$smarty->assign('fuelType',stripslashes($rowvd[0]['fuelType']));
$smarty->assign('manuName',stripslashes($rowvd[0]['manuName']));
$smarty->assign('modelName',stripslashes($rowvd[0]['modelName']));
$smarty->assign('motorType',stripslashes($rowvd[0]['motorType']));

if(isset($rowvd[0]['yearConsFrom']) && ($rowvd[0]['yearConsFrom'] != "")){  
	$yearCons = DateTime::createFromFormat('Ym', $rowvd[0]['yearConsFrom'])->format('m/Y');
	$smarty->assign('yearCons',$yearCons);
} else {
	$smarty->assign('yearCons',"");
}

if(isset($rowvd[0]['yearConsTo']) && ($rowvd[0]['yearConsTo'] != "")){  
	$yearCoTo = DateTime::createFromFormat('Ym', $rowvd[0]['yearConsTo'])->format('m/Y');
	$smarty->assign('yearCoTo',$yearCoTo);
} else {
	$smarty->assign('yearCoTo',"");
}

/*--------------------------------------------------------------------------------*/
///$smarty->assign('regnum',pobe_sch_car_regnum($schid));
/*--------------------------------------------------------------------------------*/

$type_opt = explode(",", pobe_user_part_type($wuserid));
$smarty->assign('myparttypelist',pobe_partgroup_list_upd($type_opt));
//---------------
$smarty->assign('numofcartitems',pobe_total_cart_items($vendorid,$wuserid));

$smarty->assign('pagenm',"view_vdata");

$output=$smarty->fetch('view_vdata.tpl');
$smarty->assign('MAIN_CONTENT',$output);

$smarty->display('main.tpl');
?>