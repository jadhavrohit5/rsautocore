<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/attributedata.php');
include('queries.php');
	
#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Edit Attribute - Sony AutoParts";
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

$obj_attrdt=new attributedata;

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";

$attrid = isset($_REQUEST['attrid']) ? base64_decode($_REQUEST['attrid']) : "";
$smarty->assign('attrid',$_REQUEST['attrid']); 

/*--------------------------------------------------------------------------------*/
//print_r($_REQUEST);

/*--------------------------------------------------------------------------------*/

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'updattribute') {
	$attributename = isset($_POST['attributename']) ? $_POST['attributename'] : "";

	$attrcnt = pobe_chk_customer_name($attrid,$attributename);
	$attrcnt = $obj_attrdt->count_attributedata_details(array('id'=>addslashes($attrid),'attrname'=>addslashes($attributename)));

	if ($attrcnt == 0){
		$dateposted = date("Y-m-d H:i:s");

		$ret_val3=$obj_attrdt->update_attributedata(array('attrname'=>addslashes($attributename), 'last_updated'=>$dateposted), array('id'=>$attrid));
/*--------------------------------------------------------------------------------*/
		header('location: manage_attributes.php?mode=show&msg='.base64_encode("Attribute updated successfully."));
		die;
	} else {
		$smarty->assign('msg','The attribute name already exists.');
	}
}

if(isset($_REQUEST['mode']))
{	
	if($_REQUEST['mode']=="show")
	{		

		$ret_val=$obj_attrdt->get_attributedata_details(array('id'=>addslashes($attrid)));
		$row_reqcnt=$obj_attrdt->db->sql_fetchrowset();

		$attrid = stripslashes($row_reqcnt[0]['id']);	 
		$smarty->assign('attributename',stripslashes($row_reqcnt[0]['attrname']));
		$smarty->assign('sortcode',stripslashes($row_reqcnt[0]['sortcode']));

		$output=$smarty->fetch('edit_attribute.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}

$smarty->assign('mainpage',"manage_site");
$smarty->assign('subpage',"manage_attributes");
$smarty->assign('attrid',"");

$smarty->display('main.tpl');	
?>