<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
require("classes/siteusers.php");
require("classes/user_type.php");
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

$obj_usrdata=new siteusers;

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";
/*--------------------------------------------------------------------------------*/

$webadmid = isset($_REQUEST['id']) ? base64_decode($_REQUEST['id']) : "";
$smarty->assign('webadmid',$_REQUEST['id']); 

/*--------------------------------------------------------------------------------*/
//print_r($_REQUEST);

/*--------------------------------------------------------------------------------*/

if(isset($_REQUEST['mode']))
{
	//change status
	if($_REQUEST['mode']=="changestatus")	{
		$status=$_REQUEST['status'];
		$dateposted = date("Y-m-d H:i:s");
		if ($status == 1){
			$ret_val4=$obj_usrdata->update_siteusers(array('user_status'=>'1','is_suspended'=>'0'),array('id'=>$webadmid));
		} else {
			$ret_val4=$obj_usrdata->update_siteusers(array('user_status'=>'0'),array('id'=>$webadmid));
		}

		header('location: users_mgmt_view.php?mode=show&id='.base64_encode($webadmid).'&msg='.base64_encode("User status updated successfully."));
		die;
	}

	if($_REQUEST['mode']=="show")
	{		

		$ret_val=$obj_usrdata->get_siteusers_details(array('id'=>$webadmid));
		$row_webadm=$obj_usrdata->db->sql_fetchrowset();
			
		$smarty->assign('webadmid',base64_encode($webadmid));
		$smarty->assign('wadmusertpid',stripslashes($row_webadm[0]['user_type_id']));
		$smarty->assign('wadmusertype',stripslashes($row_webadm[0]['user_typename']));
		$smarty->assign('wadmusername',stripslashes($row_webadm[0]['user_name']));
		$smarty->assign('contactperson',stripslashes($row_webadm[0]['contact_person']));
		$smarty->assign('contactemail',stripslashes($row_webadm[0]['contact_email']));
		$smarty->assign('contactphone',stripslashes($row_webadm[0]['contact_phone']));
		$smarty->assign('designation',stripslashes($row_webadm[0]['designation']));
		$smarty->assign('country',stripslashes($row_webadm[0]['country']));
		$smarty->assign('webadmstatus',$row_webadm[0]['user_status']);
		$smarty->assign('webcreatedon',pobe_format_full_date($row_webadm[0]['datecreated']));
		$smarty->assign('usrsuspend',$row_webadm[0]['is_suspended']);
		$smarty->assign('usrblocked',$row_webadm[0]['is_blocked']);

		//$type_opt = explode(",", $row_webadm[0]['part_type']);
		//$ptypelist = pobe_parttype_list_upd($type_opt);

		$grp_opt = explode(",", $row_webadm[0]['cat_type']);
		$ptypelist = pobe_partgroup_list_upd($grp_opt);
		$smarty->assign('ptypelist',$ptypelist);

//--------------------------------------------------------------------------------
		$output=$smarty->fetch('users_mgmt_view.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}

$smarty->assign('mainpage',"manage_site");
$smarty->assign('subpage',"users_mgmt");

$smarty->display('main.tpl');	
?>