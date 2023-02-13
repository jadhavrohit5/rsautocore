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
////$wuserid=base64_decode($_SESSION['user_idd']);
$smarty->assign('userfullname',pobe_siteuser_name($wuserid)); 
$smarty->assign('usertypename',pobe_siteuser_type($wuserid)); 
$vendorid=$_SESSION['vendorid'];
/*--------------------------------------------------------------------------------*/

$obj_partdt=new partsdata;

/*--------------------------------------------------------------------------------*/
if (pobe_user_search_option($wuserid) == 1) {
	header("Location:select_partcat.php");
	die;
} 
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
/*--------------------------------------------------------------------------------*/

	if(isset($_REQUEST['msg']) && (base64_decode($_REQUEST['msg']) == "invalid")){  
		$regno = $_REQUEST['regno'];
		$errmsg = "Sorry we've not found your vehicle details. Please try again.";
		$smarty->assign('errmsg',$errmsg);
	} else {
		$errmsg = "";
		$smarty->assign('errmsg',"");
	}

/*--------------------------------------------------------------------------------*/

	if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'vnpsearch') {
		$regnumber = trim($_POST['regnumber']);
		$regno = preg_replace('/\s+/', '', $regnumber);
		//echo $regnumber ."<br>";

		$searchtext = $regno;
		$searchtype = "by_regno";
		$ptype = 0;
		$numofresults = 0;
		$stagenum = '1';
		$dateposted = date("Y-m-d H:i:s");

		$ret_val3=$obj_partdt->add_searchparts(array('userid'=>addslashes($wuserid), 'vendortmp'=>addslashes($vendorid), 'part_type'=>addslashes($ptype), 'searchtype'=>addslashes($searchtype), 'searchtext'=>addslashes($searchtext), 'searchdate'=>$dateposted, 'status'=>'1', 'numofresults'=>$numofresults, 'cat_type'=>addslashes($ptype)));

		if($obj_partdt->get_searchparts_details(array('userid'=>addslashes($wuserid),'searchtext'=>addslashes($searchtext),'searchdate'=>$dateposted))){
			$row_partdt=$obj_partdt->db->sql_fetchrowset();
			$newschid=$row_partdt[0]['searchid'];

			header('Location: search_regcheck.php?id='.base64_encode($newschid).'&regno='.base64_encode($regno));	
			die;
		}

	}

/*--------------------------------------------------------------------------------*/

$type_opt = explode(",", pobe_user_part_type($wuserid));
$smarty->assign('myparttypelist',pobe_partgroup_list_upd($type_opt));
//---------------
$smarty->assign('numofcartitems',pobe_total_cart_items($vendorid,$wuserid));

$smarty->assign('pagenm',"search_bynum");

$output=$smarty->fetch('search_bynum.tpl');
$smarty->assign('MAIN_CONTENT',$output);

$smarty->display('main_nw.tpl');	
?>