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
//print_r($_REQUEST);

/*--------------------------------------------------------------------------------*/

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'add') {
	$wadmusertype=trim($_REQUEST['wadmusertype']);
	$wadmusername=trim($_REQUEST['wadmusername']);
	$wadmuserpass=md5(trim($_REQUEST['wadmuserpass']));
	$contactperson=trim($_REQUEST['contactperson']);
	$designation=trim($_REQUEST['designation']);
	$contactemail=trim($_REQUEST['contactemail']);
	$contactphone=trim($_REQUEST['contactphone']);
	$country=trim($_REQUEST['country']);

	$exist_emailnm=0;

	$exist_emailnm+=$obj_usrdata->count_siteusers_details(array('user_name'=>addslashes($wadmusername)));	

	if($exist_emailnm==0) {

		$webusrtypeid=4;
		$webacctypeid=3;
		$usrtypename = 'Vendor';
		$webadmaction = 'created';
		$createdbyid = base64_decode($user_wid);
		$dateposted = date("Y-m-d H:i:s");

		$grp_opt = "";
		$type_opt = "";
		if(isset($_POST['ptypeopt'])) {
			foreach($_POST['ptypeopt'] as $ptypeopt => $val){
				$grp_opt.= $val.',';
				$type_opt.= pobe_partgroup_typeids($val).',';
			}
		} 
		$grp_opt = rtrim($grp_opt,',');
		$type_opt = rtrim($type_opt,',');

		if($_REQUEST['sch_opt'] == 1) {
			$rsadb_opt = '1';
			$extdb_opt = '0';
		} elseif($_REQUEST['sch_opt'] == 2) {
			$rsadb_opt = '0';
			$extdb_opt = '1';
		} else {
			$rsadb_opt = '1';
			$extdb_opt = '1';
		}
        $app_price_display = trim($_REQUEST['app_price_display']);

		$ret_val=$obj_usrdata->add_siteusers(array('user_type_id'=>$webusrtypeid, 'account_type_id'=>$webacctypeid, 'user_name'=>addslashes($wadmusername), 'user_password'=>addslashes($wadmuserpass), 'user_typename'=>addslashes($usrtypename), 'contact_person'=>addslashes($contactperson), 'contact_email'=>addslashes($contactemail), 'contact_phone'=>addslashes($contactphone), 'designation'=>addslashes($designation), 'country'=>addslashes($country), 'part_type'=>addslashes($type_opt), 'user_status'=>'1', 'createdbyid'=>$createdbyid, 'datecreated'=>$dateposted, 'cat_type'=>addslashes($grp_opt), 'rsadb_opt'=>$rsadb_opt, 'extdb_opt'=>$extdb_opt, 'app_price_display' => $app_price_display));


		$ret_val2=$obj_usrdata->get_siteusers_details(array('user_name'=>addslashes($wadmusername),'datecreated'=>$dateposted));
		$row_webadm=$obj_usrdata->db->sql_fetchrowset();
		$newwebadmid=$row_webadm[0]['id'];

		header('location: users_mgmt.php?mode=show&msg='.base64_encode("New user added successfully."));
		die;
	} else {
		$smarty->assign('msg',"Error - An user with this username is already exist.");
		$_REQUEST['mode']="show";
	}
}

if(isset($_REQUEST['mode']))
{	
	if($_REQUEST['mode']=="show")
	{		
		$wadmusername = isset($_REQUEST['wadmusername']) ? $_REQUEST['wadmusername'] : "";
		$wadmuserpass = isset($_REQUEST['wadmuserpass']) ? $_REQUEST['wadmuserpass'] : "";
		$contactperson = isset($_REQUEST['contactperson']) ? $_REQUEST['contactperson'] : "";
		$designation = isset($_REQUEST['designation']) ? $_REQUEST['designation'] : "";
		$contactemail = isset($_REQUEST['contactemail']) ? $_REQUEST['contactemail'] : "";
		$contactphone = isset($_REQUEST['contactphone']) ? $_REQUEST['contactphone'] : "";
		$country = isset($_REQUEST['country']) ? $_REQUEST['country'] : "";

		$smarty->assign('wadmusertype',""); 
		$smarty->assign('wadmusername',$wadmusername); 
		$smarty->assign('wadmuserpass',$wadmuserpass); 
		$smarty->assign('contactperson',$contactperson); 
		$smarty->assign('designation',$designation); 
		$smarty->assign('contactemail',$contactemail); 
		$smarty->assign('contactphone',$contactphone); 
		$smarty->assign('country',$country); 

//	updated on 04-08-2021  =====================
		//$ptypecnt = pobe_parttype_count();
		$ptypecnt = pobe_partgroup_count();
		$smarty->assign('ptypecnt',$ptypecnt);

		//$ptypelist = pobe_parttype_list();
		$ptypelist = pobe_partgroup_list();
		$smarty->assign('ptypelist',$ptypelist);
//	end  ==========================

//--------------------------------------------------------------------------------
		$output=$smarty->fetch('users_mgmt_add.tpl');
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