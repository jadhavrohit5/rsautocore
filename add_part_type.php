<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/partstype.php');
include('queries.php');
	
#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Add New Part Category - Sony AutoParts";
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

$obj_partdt=new partstype;

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";
/*--------------------------------------------------------------------------------*/

if(isset($_REQUEST['type'])){  
	$smarty->assign('parttype',$_REQUEST['type']);
	$smarty->assign('ptypenm',pobe_view_part_type($_REQUEST['type']));
} else {
	$smarty->assign('parttype',"");
	$smarty->assign('ptypenm',"");
}

//print_r($_REQUEST);

/*--------------------------------------------------------------------------------*/

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'selectptype') {
	$customercnt = $_POST['customercnt'];

	$parttype = isset($_POST['parttype']) ? $_POST['parttype'] : "";
	$stockopt = isset($_POST['stockopt']) ? $_POST['stockopt'] : "";
/*
	$part_opt = "";
	$part_opt.= isset($_REQUEST['prtype']) && $_REQUEST['prtype'] == "on" ? 'type,' : '';
	$part_opt.= isset($_REQUEST['pulley_size']) && $_REQUEST['pulley_size'] == "on" ? 'pulley_size,' : '';
	$part_opt.= isset($_REQUEST['bar_pressure']) && $_REQUEST['bar_pressure'] == "on" ? 'bar_pressure,' : '';
	$part_opt.= isset($_REQUEST['piston_mm']) && $_REQUEST['piston_mm'] == "on" ? 'piston_mm,' : '';
	$part_opt.= isset($_REQUEST['pad_gap']) && $_REQUEST['pad_gap'] == "on" ? 'pad_gap,' : '';
	$part_opt.= isset($_REQUEST['max_stock']) && $_REQUEST['max_stock'] == "on" ? 'max_stock,' : '';
	$part_opt.= isset($_REQUEST['fr_opt']) && $_REQUEST['fr_opt'] == "on" ? 'f_r,' : '';
	$part_opt.= isset($_REQUEST['cast']) && $_REQUEST['cast'] == "on" ? 'cast,' : '';

	$part_opt.= isset($_REQUEST['purchase_price']) && $_REQUEST['purchase_price'] == "on" ? 'purchase_price,' : '';
	$part_opt.= isset($_REQUEST['length']) && $_REQUEST['length'] == "on" ? 'length,' : '';
	$part_opt.= isset($_REQUEST['turns']) && $_REQUEST['turns'] == "on" ? 'turns,' : '';
	$part_opt.= isset($_REQUEST['trod_threadsize']) && $_REQUEST['trod_threadsize'] == "on" ? 'trod_threadsize,' : '';
	$part_opt.= isset($_REQUEST['pinion_length']) && $_REQUEST['pinion_length'] == "on" ? 'pinion_length,' : '';
	$part_opt.= isset($_REQUEST['pinion_type']) && $_REQUEST['pinion_type'] == "on" ? 'pinion_type,' : '';
	$part_opt.= isset($_REQUEST['pulley_grooves']) && $_REQUEST['pulley_grooves'] == "on" ? 'pulley_grooves,' : '';
	$part_opt.= isset($_REQUEST['pulley_type']) && $_REQUEST['pulley_type'] == "on" ? 'pulley_type,' : '';
	$part_opt.= isset($_REQUEST['plug_pins']) && $_REQUEST['plug_pins'] == "on" ? 'plug_pins,' : '';
	$part_opt.= isset($_REQUEST['weight']) && $_REQUEST['weight'] == "on" ? 'weight,' : '';
	$part_opt.= isset($_REQUEST['bolt_diameter']) && $_REQUEST['bolt_diameter'] == "on" ? 'bolt_diameter,' : '';
	$part_opt.= isset($_REQUEST['pinhole_diameter']) && $_REQUEST['pinhole_diameter'] == "on" ? 'pinhole_diameter,' : '';
	$part_opt.= isset($_REQUEST['sensor']) && $_REQUEST['sensor'] == "on" ? 'sensor,' : '';
*/
//-------------------------------------------------------------------------
	// added on 20-01-2022
	$attr_opt = "";
	if(isset($_POST['attr'])) {
        foreach($_POST['attr'] as $attr => $val){
            //echo $attr .':'.$val."<br />";
			$attr_opt.= $val.',';
		}
    } 
//-------------------------------------------------------------------------

	$oeoemopt = isset($_POST['oeoemopt']) ? $_POST['oeoemopt'] : '0';

	$cust_opt = "";
	if(isset($_POST['cust'])) {
        foreach($_POST['cust'] as $cust => $val){
            //echo $cust .':'.$val."<br />";
			$cust_opt.= $val.',';
		}
    } 

	//$part_opt = rtrim($part_opt,',');
	$cust_opt = rtrim($cust_opt,',');

	$attr_opt = rtrim($attr_opt,',');	// added on 20-01-2022

	$dateposted = date("Y-m-d H:i:s");

	//$ret_val3=$obj_partdt->add_partstype(array('part_type'=>addslashes($parttype), 'stockopt'=>$stockopt, 'oeoemopt'=>$oeoemopt, 'part_opt'=>addslashes($part_opt), 'cust_opt'=>addslashes($cust_opt), 'attr_opt'=>addslashes($part_opt), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted));

	// updated on 20-01-2022
	$ret_val3=$obj_partdt->add_partstype(array('part_type'=>addslashes($parttype), 'stockopt'=>$stockopt, 'oeoemopt'=>$oeoemopt, 'cust_opt'=>addslashes($cust_opt), 'attr_opt'=>addslashes($attr_opt), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted));
/*--------------------------------------------------------------------------------*/
	header('location: add_part_type.php?mode=show&msg='.base64_encode("New part type added successfully."));
	die;
}

if(isset($_REQUEST['mode']))
{	
	if($_REQUEST['mode']=="show")
	{		
		//$customercnt = pobe_customer_count();
		//$smarty->assign('customercnt',$customercnt);

		$customerlist = pobe_customer_list();
		$smarty->assign('customerlist',$customerlist);

//--------------------------------------------------------------------------------
		// added on 20-01-2022
		$attributelist = pobe_attribute_list();
		$smarty->assign('attributelist',$attributelist);
//--------------------------------------------------------------------------------
		$smarty->assign('parttypelist',pobe_part_type_list());

		$output=$smarty->fetch('add_part_type.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}

$smarty->assign('mainpage',"manage_site");
$smarty->assign('subpage',"manage_part_type");
$smarty->assign('ptype',"");

$smarty->display('main.tpl');	
?>