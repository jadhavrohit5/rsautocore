<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/partsdata.php');
include('classes/partstype.php');
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
} elseif($_SESSION['global_logged_in']!="true" || $admintp != md5(2)){  
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
} else {
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
}

if($useracn != md5(1)) {
	header('Location: error.php');	
	die;
}

#==============================================================
$smarty->assign('title',$title);
$smarty->assign('self',$_SERVER['PHP_SELF']);	
$smarty->assign('message',$GLOBALS['message']);
if($admintp == md5(1)) {
$smarty->assign('adminusertype',"delopt"); 
} else {
$smarty->assign('adminusertype',""); 
}
#=================================================================

/*--------------------------------------------------------------------------------*/
$wuserid=base64_decode($_SESSION['user_id']);
$smarty->assign('userfullname',pobe_siteuser_name($wuserid)); 
$smarty->assign('usertypename',pobe_siteuser_type($wuserid)); 
/*--------------------------------------------------------------------------------*/

$obj_partdt=new partsdata;
$obj_parttp=new partstype;

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";
/*--------------------------------------------------------------------------------*/
//echo "============================================flag-0<br>";
//print_r($_REQUEST);

$partid = isset($_REQUEST['partid']) ? $_REQUEST['partid'] : "";
$smarty->assign('partid',$_REQUEST['partid']); 

$ptypeid = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
$smarty->assign('ptypeid',$_REQUEST['type']); 
$smarty->assign('ptypenm',strtoupper(pobe_view_part_type($_REQUEST['type'])));

//$smarty->assign('previd',pobe_get_prev_part($partid,$ptypeid)); 
//$smarty->assign('nextid',pobe_get_next_part($partid,$ptypeid)); 
$smarty->assign('previd',pobe_get_prev_part_by_group($partid,$ptypeid)); 
$smarty->assign('nextid',pobe_get_next_part_by_group($partid,$ptypeid)); 

$byuser = "admin";
$refnum = 1;
$dateposted = date("Y-m-d H:i:s");
/*--------------------------------------------------------------------------------*/

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'updatepart') {

	// codes to update OE STOCK data
	if(isset($_POST['pid'])) {
		foreach($_POST['pid'] as $val){
			$a_grade_val = 0;
			$a_grade = isset($val['itemqty']) ? (int)$val['itemqty'] : 0;
			$agrddata = isset($val['qtydata']) ? (int)$val['qtydata'] : 0;
			$a_grade_val = $a_grade + $agrddata;

			$obj_partdt->update_partsdata_oe_stock(array('oe_one'=>addslashes($val['oeone']), 'oe_two'=>addslashes($val['oetwo']), 'oemone'=>addslashes($val['oemone']), 'oemtwo'=>addslashes($val['oemtwo']), 'qty_data'=>addslashes($a_grade_val), 'location'=>addslashes($val['location']), 'last_updated'=>$dateposted), array('id'=>$val['itemid'],'partid'=>$partid));

		}

		$smarty->assign('msg',"Part updated successfully.");
	}
}

if(isset($_REQUEST['partid'])) {  

	if(isset($_REQUEST['type'])) {  

//echo "============================================flag-1<br>";
		$ret_val=$obj_partdt->get_partsdata_details(array('id'=>addslashes($partid)));
		$row_partdt=$obj_partdt->db->sql_fetchrowset();

		$rsac = isset($_REQUEST['rsac']) ? $_REQUEST['rsac'] : stripslashes($row_partdt[0]['rsac']);
		$make = isset($_REQUEST['make']) ? $_REQUEST['make'] : stripslashes($row_partdt[0]['make']);
		$manufacturer = isset($_REQUEST['manufacturer']) ? $_REQUEST['manufacturer'] : stripslashes($row_partdt[0]['manufacturer']);
		$model = isset($_REQUEST['model']) ? $_REQUEST['model'] : stripslashes($row_partdt[0]['model']);
		$years = isset($_REQUEST['years']) ? $_REQUEST['years'] : stripslashes($row_partdt[0]['years']);
		$location = stripslashes($row_partdt[0]['location']);
		$a_grade = stripslashes($row_partdt[0]['a_grade']);
		$b_grade = stripslashes($row_partdt[0]['b_grade']);
		$target_stock = isset($_REQUEST['target_stock']) ? $_REQUEST['target_stock'] : stripslashes($row_partdt[0]['target_stock']);
		$sell_price = isset($_REQUEST['sell_price']) ? $_REQUEST['sell_price'] : stripslashes($row_partdt[0]['sell_price']);

		$notes = isset($_REQUEST['notes']) ? $_REQUEST['notes'] : stripslashes($row_partdt[0]['notes']);

		$smarty->assign('make',$make); 
		$smarty->assign('manufacturer',$manufacturer); 
		$smarty->assign('model',$model); 
		$smarty->assign('years',$years); 
		$smarty->assign('target_stock',$target_stock); 
		$smarty->assign('sell_price',$sell_price); 

		$smarty->assign('notes',$notes); 

		$grprsac = isset($_REQUEST['grprsac']) ? $_REQUEST['grprsac'] : stripslashes($row_partdt[0]['group_rsac']);
		$total_stock = pobe_group_total_stock($partid);

		$smarty->assign('grprsac',$grprsac); 
		$smarty->assign('total_stock',$total_stock); 

//--------------------------------------------------------------------------------
		if($obj_partdt->count_partsdata_oeref(array('partid'=>addslashes($partid), 'refnum'=>$refnum)) > 0){
			$ret_val2=$obj_partdt->get_partsdata_oeref(array('partid'=>addslashes($partid), 'refnum'=>$refnum));
			$row_oemndt=$obj_partdt->db->sql_fetchrowset();
			$poe_number = stripslashes($row_oemndt[0]['oe_number']);
			$poem_number = stripslashes($row_oemndt[0]['oem_number']);
		} else {
			$poe_number = "";
			$poem_number = "";
		}

		$oe_number = isset($_REQUEST['oe_number']) ? $_REQUEST['oe_number'] : $poe_number;
		$oem_number = isset($_REQUEST['oem_number']) ? $_REQUEST['oem_number'] : $poem_number;
		$smarty->assign('oe_number',$oe_number); 
		$smarty->assign('oem_number',$oem_number); 

//--------------------------------------------------------------------------------
		$ret_val3=$obj_parttp->get_partstype_details(array('id'=>addslashes($ptypeid)));
		$row_reqcnt=$obj_parttp->db->sql_fetchrowset();

		$smarty->assign('ptypenm',strtoupper(stripslashes($row_reqcnt[0]['part_type'])));
		$smarty->assign('stockopt',stripslashes($row_reqcnt[0]['stockopt']));
		$smarty->assign('oeoemopt',stripslashes($row_reqcnt[0]['oeoemopt']));
		$part_opt = explode(",", $row_reqcnt[0]['part_opt']);
		$cust_opt = explode(",", $row_reqcnt[0]['cust_opt']);
		$attr_opt = explode(",", $row_reqcnt[0]['attr_opt']);  // added on 20-01-2022

//--------------------------------------------------------------------------------
		$attributelist = pobe_attribute_list_opt_grp($row_reqcnt[0]['attr_opt'],$partid);
		$smarty->assign('attributelist',$attributelist);

		$customerlist = pobe_customer_opt_list_nw($row_reqcnt[0]['cust_opt'],$partid);
		$smarty->assign('customerlist',$customerlist);
//--------------------------------------------------------------------------------
		$grouppartslist = pobe_group_parts_list($partid,$ptypeid);
		$smarty->assign('grouppartslist',$grouppartslist);
//--------------------------------------------------------------------------------
		$smarty->assign('parttypelist',pobe_part_type_list());
//--------------------------------------------------------------------------------
		$displayphoto = pobe_part_images_display($partid);
		$smarty->assign('displayphoto',$displayphoto);
//--------------------------------------------------------------------------------
		$output=$smarty->fetch('update_item.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}

$smarty->assign('mainpage',"parts");
$smarty->assign('subpage',"parts");
$smarty->assign('ptype',"");

$smarty->display('main_user.tpl');	

/*--------------------------------------------------------------------------------*/
$obj_partdt->con_close();
$obj_parttp->con_close();
exit;
?>