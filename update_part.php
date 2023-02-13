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

$smarty->assign('previd',pobe_get_prev_part($partid,$ptypeid)); 
$smarty->assign('nextid',pobe_get_next_part($partid,$ptypeid)); 

$byuser = "admin";
$refnum = 1;
$dateposted = date("Y-m-d H:i:s");
/*--------------------------------------------------------------------------------*/

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'updatepart') {

	$rsac = trim($_POST['rsac']);
	$agrddata = isset($_POST['agrddata']) ? (int)$_POST['agrddata'] : 0;
	$bgrddata = isset($_POST['bgrddata']) ? (int)$_POST['bgrddata'] : 0;
	$a_grade = isset($_POST['a_grade']) ? (int)$_POST['a_grade'] : 0;
	$b_grade = isset($_POST['b_grade']) ? (int)$_POST['b_grade'] : 0;
	$a_grade_val = $a_grade + $agrddata;
	$b_grade_val = $b_grade + $bgrddata;

	//$target_stock = isset($_POST['target_stock']) ? (int)$_POST['target_stock'] : 0;
	//$cast = isset($_POST['cast']) ? $_POST['cast'] : "";

	if(($a_grade_val == 0) && ($b_grade_val == 0)) {
		$location = "";
	} else {
		$location = isset($_POST['location']) ? $_POST['location'] : "";
	}

	if(($a_grade_val < 0) || ($b_grade_val < 0)) {
		$smarty->assign('msg',"Error: Updated Stock should not be less than 0.");
	} else {
//--------------------------------------------------------------------------------
		$obj_partdt->update_partsdata(array('location'=>addslashes($location), 'a_grade'=>addslashes($a_grade_val), 'b_grade'=>addslashes($b_grade_val), 'last_updated'=>$dateposted), array('id'=>$partid));
//--------------------------------------------------------------------------------
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
/*
		$max_stock = isset($_REQUEST['max_stock']) ? $_REQUEST['max_stock'] : stripslashes($row_partdt[0]['max_stock']);
		$prtype = isset($_REQUEST['prtype']) ? $_REQUEST['prtype'] : stripslashes($row_partdt[0]['type']);
		$pulley_size = isset($_REQUEST['pulley_size']) ? $_REQUEST['pulley_size'] : stripslashes($row_partdt[0]['pulley_size']);
		$bar_pressure = isset($_REQUEST['bar_pressure']) ? $_REQUEST['bar_pressure'] : stripslashes($row_partdt[0]['bar_pressure']);
		$piston_mm = isset($_REQUEST['piston_mm']) ? $_REQUEST['piston_mm'] : stripslashes($row_partdt[0]['piston_mm']);
		$pad_gap = isset($_REQUEST['pad_gap']) ? $_REQUEST['pad_gap'] : stripslashes($row_partdt[0]['pad_gap']);
		$f_r = isset($_REQUEST['f_r']) ? $_REQUEST['f_r'] : stripslashes($row_partdt[0]['f_r']);
		$cast = isset($_REQUEST['cast']) ? $_REQUEST['cast'] : stripslashes($row_partdt[0]['cast']);

		$purchase_price = isset($_REQUEST['purchase_price']) ? $_REQUEST['purchase_price'] : stripslashes($row_partdt[0]['purchase_price']);
		$length = isset($_REQUEST['length']) ? $_REQUEST['length'] : stripslashes($row_partdt[0]['length']);
		$turns = isset($_REQUEST['turns']) ? $_REQUEST['turns'] : stripslashes($row_partdt[0]['turns']);
		$trod_threadsize = isset($_REQUEST['trod_threadsize']) ? $_REQUEST['trod_threadsize'] : stripslashes($row_partdt[0]['trod_threadsize']);
		$pinion_length = isset($_REQUEST['pinion_length']) ? $_REQUEST['pinion_length'] : stripslashes($row_partdt[0]['pinion_length']);
		$pinion_type = isset($_REQUEST['pinion_type']) ? $_REQUEST['pinion_type'] : stripslashes($row_partdt[0]['pinion_type']);
		$pulley_grooves = isset($_REQUEST['pulley_grooves']) ? $_REQUEST['pulley_grooves'] : stripslashes($row_partdt[0]['pulley_grooves']);
		$pulley_type = isset($_REQUEST['pulley_type']) ? $_REQUEST['pulley_type'] : stripslashes($row_partdt[0]['pulley_type']);
		$plug_pins = isset($_REQUEST['plug_pins']) ? $_REQUEST['plug_pins'] : stripslashes($row_partdt[0]['plug_pins']);
		$weight = isset($_REQUEST['weight']) ? $_REQUEST['weight'] : stripslashes($row_partdt[0]['weight']);
		$bolt_diameter = isset($_REQUEST['bolt_diameter']) ? $_REQUEST['bolt_diameter'] : stripslashes($row_partdt[0]['bolt_diameter']);
		$pinhole_diameter = isset($_REQUEST['pinhole_diameter']) ? $_REQUEST['pinhole_diameter'] : stripslashes($row_partdt[0]['pinhole_diameter']);
		$sensor = isset($_REQUEST['sensor']) ? $_REQUEST['sensor'] : stripslashes($row_partdt[0]['sensor']);
*/
		$notes = isset($_REQUEST['notes']) ? $_REQUEST['notes'] : stripslashes($row_partdt[0]['notes']);

		$smarty->assign('rsac',$rsac); 
		$smarty->assign('make',$make); 
		$smarty->assign('manufacturer',$manufacturer); 
		$smarty->assign('model',$model); 
		$smarty->assign('years',$years); 
		$smarty->assign('location',$location); 
		$smarty->assign('a_grade',$a_grade); 
		$smarty->assign('b_grade',$b_grade); 
		$smarty->assign('target_stock',$target_stock); 
		$smarty->assign('sell_price',$sell_price); 

/*
		$smarty->assign('max_stock',$max_stock); 
		$smarty->assign('prtype',$prtype); 
		$smarty->assign('pulley_size',$pulley_size); 
		$smarty->assign('bar_pressure',$bar_pressure); 
		$smarty->assign('piston_mm',$piston_mm); 
		$smarty->assign('pad_gap',$pad_gap); 
		$smarty->assign('f_r',$f_r); 
		$smarty->assign('cast',$cast); 
		$smarty->assign('purchase_price',$purchase_price); 
		$smarty->assign('length',$length); 
		$smarty->assign('turns',$turns); 
		$smarty->assign('trod_threadsize',$trod_threadsize); 
		$smarty->assign('pinion_length',$pinion_length); 
		$smarty->assign('pinion_type',$pinion_type); 
		$smarty->assign('pulley_grooves',$pulley_grooves); 
		$smarty->assign('pulley_type',$pulley_type); 
		$smarty->assign('plug_pins',$plug_pins); 
		$smarty->assign('weight',$weight); 
		$smarty->assign('bolt_diameter',$bolt_diameter); 
		$smarty->assign('pinhole_diameter',$pinhole_diameter); 
		$smarty->assign('sensor',$sensor); 
*/
		$smarty->assign('notes',$notes); 

		$smarty->assign('agrddata',""); 
		$smarty->assign('bgrddata',""); 

//--------------------------------------------------------------------------------
//echo "============================================flag-2<br>";
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
//echo "============================================flag-3<br>";
		$ret_val3=$obj_parttp->get_partstype_details(array('id'=>addslashes($ptypeid)));
		$row_reqcnt=$obj_parttp->db->sql_fetchrowset();

		$smarty->assign('ptypenm',strtoupper(stripslashes($row_reqcnt[0]['part_type'])));
		$smarty->assign('stockopt',stripslashes($row_reqcnt[0]['stockopt']));
		$smarty->assign('oeoemopt',stripslashes($row_reqcnt[0]['oeoemopt']));
		$part_opt = explode(",", $row_reqcnt[0]['part_opt']);
		$cust_opt = explode(",", $row_reqcnt[0]['cust_opt']);

		$attr_opt = explode(",", $row_reqcnt[0]['attr_opt']);  // added on 05-05-2022 

//--------------------------------------------------------------------------------
/*
		$smarty->assign('prtype_opt','');
		$smarty->assign('pulley_size_opt','');
		$smarty->assign('bar_pressure_opt','');
		$smarty->assign('piston_mm_opt','');
		$smarty->assign('pad_gap_opt','');
		$smarty->assign('fr_opt','');
		$smarty->assign('max_stock_opt','');
		$smarty->assign('cast_opt','');

		$smarty->assign('purchase_price_opt','');
		$smarty->assign('length_opt','');
		$smarty->assign('turns_opt','');
		$smarty->assign('trod_threadsize_opt','');
		$smarty->assign('pinion_length_opt','');
		$smarty->assign('pinion_type_opt','');
		$smarty->assign('pulley_grooves_opt','');
		$smarty->assign('pulley_type_opt','');
		$smarty->assign('plug_pins_opt','');
		$smarty->assign('weight_opt','');
		$smarty->assign('bolt_diameter_opt','');
		$smarty->assign('pinhole_diameter_opt','');
		$smarty->assign('sensor_opt','');

		foreach ($part_opt as $item) {
			if ($item == "type") $smarty->assign('prtype_opt','1');
			if ($item == "pulley_size") $smarty->assign('pulley_size_opt','1');
			if ($item == "bar_pressure") $smarty->assign('bar_pressure_opt','1');
			if ($item == "piston_mm") $smarty->assign('piston_mm_opt','1');
			if ($item == "pad_gap") $smarty->assign('pad_gap_opt','1');
			if ($item == "f_r") $smarty->assign('fr_opt','1');
			if ($item == "max_stock") $smarty->assign('max_stock_opt','1');
			if ($item == "cast") $smarty->assign('cast_opt','1');

			if ($item == "purchase_price") $smarty->assign('purchase_price_opt','1');
			if ($item == "length") $smarty->assign('length_opt','1');
			if ($item == "turns") $smarty->assign('turns_opt','1');
			if ($item == "trod_threadsize") $smarty->assign('trod_threadsize_opt','1');
			if ($item == "pinion_length") $smarty->assign('pinion_length_opt','1');
			if ($item == "pinion_type") $smarty->assign('pinion_type_opt','1');
			if ($item == "pulley_grooves") $smarty->assign('pulley_grooves_opt','1');
			if ($item == "pulley_type") $smarty->assign('pulley_type_opt','1');
			if ($item == "plug_pins") $smarty->assign('plug_pins_opt','1');
			if ($item == "weight") $smarty->assign('weight_opt','1');
			if ($item == "bolt_diameter") $smarty->assign('bolt_diameter_opt','1');
			if ($item == "pinhole_diameter") $smarty->assign('pinhole_diameter_opt','1');
			if ($item == "sensor") $smarty->assign('sensor_opt','1');
		}
*/
//--------------------------------------------------------------------------------
		// added on 05-05-2022  
		$attributelist = pobe_attribute_list_opt($attr_opt,$partid);
		$smarty->assign('attributelist',$attributelist);
		//print_r($attributelist);

		// added on 05-05-2022  
		$customerlist = pobe_customer_opt_list_3($cust_opt,$partid);
		$smarty->assign('customerlist',$customerlist);
//--------------------------------------------------------------------------------
		
//--------------------------------------------------------------------------------
		$smarty->assign('parttypelist',pobe_part_type_list());
//--------------------------------------------------------------------------------
		$displayphoto = pobe_part_images_display($partid);
		$smarty->assign('displayphoto',$displayphoto);
//--------------------------------------------------------------------------------
		$output=$smarty->fetch('update_part.tpl');
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
//$obj_partdt->con_close();
//$obj_parttp->con_close();
//die;
?>