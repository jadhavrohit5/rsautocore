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
$title="Add Part - Sony AutoParts";
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

$obj_partdt=new partsdata;
$obj_parttp=new partstype;

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

$parttype = trim($_REQUEST['parttype']);   // added on 26-01-2023 
$smarty->assign('parttype',$_REQUEST['parttype']);   // added on 26-01-2023

/*--------------------------------------------------------------------------------*/

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'postnewpart') {
	//$parttype = trim($_REQUEST['parttype']);
	//$smarty->assign('parttype',$_REQUEST['parttype']);

	$rsac = trim($_POST['rsac']);
	$a_grade = isset($_POST['a_grade']) ? (int)$_POST['a_grade'] : 0;
	$b_grade = isset($_POST['b_grade']) ? (int)$_POST['b_grade'] : 0;
	$target_stock = isset($_POST['target_stock']) ? (int)$_POST['target_stock'] : 0;
	$location = isset($_POST['location']) ? $_POST['location'] : "";

	$sell_price = isset($_POST['sell_price']) ? (float)$_POST['sell_price'] : 0.00;

	$oe_number = isset($_POST['oe_number']) ? $_POST['oe_number'] : "";
	$oem_number = isset($_POST['oem_number']) ? $_POST['oem_number'] : "";
/*
	$max_stock = isset($_POST['max_stock']) ? (int)$_POST['max_stock'] : 0;

	$prtype = isset($_POST['prtype']) ? $_POST['prtype'] : "";
	$pulley_size = isset($_POST['pulley_size']) ? $_POST['pulley_size'] : "";
	$bar_pressure = isset($_POST['bar_pressure']) ? $_POST['bar_pressure'] : "";
	$cast = isset($_POST['cast']) ? $_POST['cast'] : "";
	$piston_mm = isset($_POST['piston_mm']) ? $_POST['piston_mm'] : "";
	$pad_gap = isset($_POST['pad_gap']) ? $_POST['pad_gap'] : "";
	$f_r = isset($_POST['f_r']) ? $_POST['f_r'] : "";
	$purchase_price = isset($_POST['purchase_price']) ? $_POST['purchase_price'] : "";
	$length = isset($_POST['length']) ? $_POST['length'] : "";
	$turns = isset($_POST['turns']) ? $_POST['turns'] : "";
	$trod_threadsize = isset($_POST['trod_threadsize']) ? $_POST['trod_threadsize'] : "";
	$pinion_length = isset($_POST['pinion_length']) ? $_POST['pinion_length'] : "";
	$pinion_type = isset($_POST['pinion_type']) ? $_POST['pinion_type'] : "";
	$pulley_grooves = isset($_POST['pulley_grooves']) ? $_POST['pulley_grooves'] : "";
	$pulley_type = isset($_POST['pulley_type']) ? $_POST['pulley_type'] : "";
	$plug_pins = isset($_POST['plug_pins']) ? $_POST['plug_pins'] : "";
	$weight = isset($_POST['weight']) ? $_POST['weight'] : "";
	$bolt_diameter = isset($_POST['bolt_diameter']) ? $_POST['bolt_diameter'] : "";
	$pinhole_diameter = isset($_POST['pinhole_diameter']) ? $_POST['pinhole_diameter'] : "";
	$sensor = isset($_POST['sensor']) ? $_POST['sensor'] : "";
*/
	$manufacturer = isset($_POST['manufacturer']) ? $_POST['manufacturer'] : "";
	$make = isset($_POST['make']) ? $_POST['make'] : "";
	$model = isset($_POST['model']) ? $_POST['model'] : "";
	$years = isset($_POST['years']) ? $_POST['years'] : "";
	$notes = $_POST['notes'];
	$oeoemopt = $_POST['oeoemopt'];
	$stockopt = $_POST['stockopt'];

	$exist_rsac=0;
	$exist_rsac+=$obj_partdt->count_partsdata_details(array('rsac'=>addslashes($rsac)));	
	//echo "================================================= ".$exist_rsac."<br>";
/* */
	if($exist_rsac==0) {

		$byuser="admin";
		$oldpartid=0;
		$dateposted = date("Y-m-d H:i:s");
//--------------------------------------------------------------------------------
		//$ret_val=$obj_partdt->add_partsdata(array('rsac'=>addslashes($rsac), 'part_type'=>addslashes($parttype), 'make'=>addslashes($make), 'manufacturer'=>addslashes($manufacturer), 'model'=>addslashes($model), 'years'=>addslashes($years), 'location'=>addslashes($location), 'a_grade'=>addslashes($a_grade), 'b_grade'=>addslashes($b_grade), 'target_stock'=>addslashes($target_stock), 'max_stock'=>addslashes($max_stock), 'sell_price'=>addslashes($sell_price), 'type'=>addslashes($prtype), 'pulley_size'=>addslashes($pulley_size), 'bar_pressure'=>addslashes($bar_pressure), 'piston_mm'=>addslashes($piston_mm), 'pad_gap'=>addslashes($pad_gap), 'f_r'=>addslashes($f_r), 'cast'=>addslashes($cast), 'purchase_price'=>addslashes($purchase_price), 'length'=>addslashes($length), 'turns'=>addslashes($turns), 'trod_threadsize'=>addslashes($trod_threadsize), 'pinion_length'=>addslashes($pinion_length), 'pinion_type'=>addslashes($pinion_type), 'pulley_grooves'=>addslashes($pulley_grooves), 'pulley_type'=>addslashes($pulley_type), 'plug_pins'=>addslashes($plug_pins), 'weight'=>addslashes($weight), 'bolt_diameter'=>addslashes($bolt_diameter), 'pinhole_diameter'=>addslashes($pinhole_diameter), 'sensor'=>addslashes($sensor), 'notes'=>addslashes($notes), 'postdate'=>$dateposted, 'status'=>'0', 'postbyuser'=>$wuserid, 'last_updated'=>$dateposted, 'oldpartid'=>$oldpartid));

		// updated on 26-01-2022 
		$ret_val=$obj_partdt->add_partsdata(array('rsac'=>addslashes($rsac), 'part_type'=>addslashes($parttype), 'make'=>addslashes($make), 'manufacturer'=>addslashes($manufacturer), 'model'=>addslashes($model), 'years'=>addslashes($years), 'location'=>addslashes($location), 'a_grade'=>addslashes($a_grade), 'b_grade'=>addslashes($b_grade), 'target_stock'=>addslashes($target_stock), 'sell_price'=>addslashes($sell_price), 'notes'=>addslashes($notes), 'postdate'=>$dateposted, 'status'=>'0', 'postbyuser'=>$wuserid, 'last_updated'=>$dateposted, 'oldpartid'=>$oldpartid));

		if($obj_partdt->get_partsdata_details(array('rsac'=>addslashes($rsac),'part_type'=>addslashes($parttype),'postdate'=>$dateposted))){
			$row_partdt=$obj_partdt->db->sql_fetchrowset();
			$newpartid=$row_partdt[0]['id'];

			$ret_val2=$obj_partdt->add_partsdata_desc(array('partid'=>addslashes($newpartid), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted));

			if($oeoemopt == '1') {
				$ret_val3=$obj_partdt->add_partsdata_oeref(array('partid'=>addslashes($newpartid), 'oe_number'=>addslashes($oe_number), 'oem_number'=>addslashes($oem_number), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted));
			}

			if(isset($_POST['attr'])) {
				foreach($_POST['attr'] as $attrno => $val){
					if (isset($val) && $val != ''){
						$ret_val3=$obj_partdt->add_partsdata_attr(array('attrid'=>addslashes($attrno), 'partid'=>addslashes($newpartid), 'attrdata'=>addslashes($val), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted));
					}
				}
			} 

			if(isset($_POST['cust'])) {
				foreach($_POST['cust'] as $custno => $val){
					//echo $cust .':'.$val."<br />";
					//$cust_val = isset($val) ? $cust .':'.$val : ""; 
					//echo $cust_val."<br>";
					if (isset($val) && $val != ''){
						$ret_val3=$obj_partdt->add_partsdata_cref(array('custid'=>addslashes($custno), 'partid'=>addslashes($newpartid), 'crdata'=>addslashes($val), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted));
					}
				}
			} 
				
			$ret_valup=$obj_partdt->update_partsdata(array('status'=>'1'), array('id'=>$newpartid));
//--------------------------------------------------------------------------------
			header('location: add_part.php?mode=show&type='.$parttype.'&msg='.base64_encode("New part added successfully."));
			die;
		}
	} else {
		$smarty->assign('msg',"Error - A part with this RSAC already exist.");
	}

}

/*--------------------------------------------------------------------------------*/

//if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'selectptype') {
//	$parttype = trim($_REQUEST['parttype']);
//	$smarty->assign('parttype',$parttype);
//}
	
/*--------------------------------------------------------------------------------*/
/*
*/
$rsac = isset($_REQUEST['rsac']) ? $_REQUEST['rsac'] : "";
$a_grade = isset($_REQUEST['a_grade']) ? $_REQUEST['a_grade'] : "";
$b_grade = isset($_REQUEST['b_grade']) ? $_REQUEST['b_grade'] : "";
$target_stock = isset($_REQUEST['target_stock']) ? $_REQUEST['target_stock'] : "";
$manufacturer = isset($_REQUEST['manufacturer']) ? $_REQUEST['manufacturer'] : "";
$sell_price = isset($_REQUEST['sell_price']) ? $_REQUEST['sell_price'] : "";
$location = isset($_REQUEST['location']) ? $_REQUEST['location'] : "";
$make = isset($_REQUEST['make']) ? $_REQUEST['make'] : "";
$model = isset($_REQUEST['model']) ? $_REQUEST['model'] : "";
$years = isset($_REQUEST['years']) ? $_REQUEST['years'] : "";
$notes = isset($_REQUEST['notes']) ? $_REQUEST['notes'] : "";
$oe_number = isset($_REQUEST['oe_number']) ? $_REQUEST['oe_number'] : "";
$oem_number = isset($_REQUEST['oem_number']) ? $_REQUEST['oem_number'] : "";

/*
$max_stock = isset($_REQUEST['max_stock']) ? $_REQUEST['max_stock'] : "";

$prtype = isset($_REQUEST['prtype']) ? $_REQUEST['prtype'] : "";
$pulley_size = isset($_REQUEST['pulley_size']) ? $_REQUEST['pulley_size'] : "";
$bar_pressure = isset($_REQUEST['bar_pressure']) ? $_REQUEST['bar_pressure'] : "";
$cast = isset($_REQUEST['cast']) ? $_REQUEST['cast'] : "";
$piston_mm = isset($_REQUEST['piston_mm']) ? $_REQUEST['piston_mm'] : "";
$pad_gap = isset($_REQUEST['pad_gap']) ? $_REQUEST['pad_gap'] : "";
$f_r = isset($_REQUEST['f_r']) ? $_REQUEST['f_r'] : "";
$purchase_price = isset($_REQUEST['purchase_price']) ? $_REQUEST['purchase_price'] : "";
$length = isset($_REQUEST['length']) ? $_REQUEST['length'] : "";
$turns = isset($_REQUEST['turns']) ? $_REQUEST['turns'] : "";
$trod_threadsize = isset($_REQUEST['trod_threadsize']) ? $_REQUEST['trod_threadsize'] : "";
$pinion_length = isset($_REQUEST['pinion_length']) ? $_REQUEST['pinion_length'] : "";
$pinion_type = isset($_REQUEST['pinion_type']) ? $_REQUEST['pinion_type'] : "";
$pulley_grooves = isset($_REQUEST['pulley_grooves']) ? $_REQUEST['pulley_grooves'] : "";
$pulley_type = isset($_REQUEST['pulley_type']) ? $_REQUEST['pulley_type'] : "";
$plug_pins = isset($_REQUEST['plug_pins']) ? $_REQUEST['plug_pins'] : "";
$weight = isset($_REQUEST['weight']) ? $_REQUEST['weight'] : "";
$bolt_diameter = isset($_REQUEST['bolt_diameter']) ? $_REQUEST['bolt_diameter'] : "";
$pinhole_diameter = isset($_REQUEST['pinhole_diameter']) ? $_REQUEST['pinhole_diameter'] : "";
$sensor = isset($_REQUEST['sensor']) ? $_REQUEST['sensor'] : "";
*/

$smarty->assign('rsac',$rsac); 
$smarty->assign('a_grade',$a_grade); 
$smarty->assign('b_grade',$b_grade); 
$smarty->assign('target_stock',$target_stock); 
$smarty->assign('manufacturer',$manufacturer); 
$smarty->assign('sell_price',$sell_price); 
$smarty->assign('location',$location); 
$smarty->assign('make',$make); 
$smarty->assign('model',$model); 
$smarty->assign('years',$years); 
$smarty->assign('notes',$notes); 

$smarty->assign('oe_number',$oe_number); 
$smarty->assign('oem_number',$oem_number); 

/*
$smarty->assign('max_stock',$max_stock); 

$smarty->assign('prtype',$prtype); 
$smarty->assign('pulley_size',$pulley_size); 
$smarty->assign('bar_pressure',$bar_pressure); 
$smarty->assign('cast',$cast); 
$smarty->assign('piston_mm',$piston_mm); 
$smarty->assign('pad_gap',$pad_gap); 
$smarty->assign('f_r',$f_r); 
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

/*--------------------------------------------------------------------------------*/

if(isset($_REQUEST['parttype'])){  
	//$smarty->assign('ptypenm',pobe_view_part_type($_REQUEST['parttype']));

	$ret_valtp=$obj_parttp->get_partstype_details(array('id'=>addslashes($parttype)));
	$row_reqcnt=$obj_parttp->db->sql_fetchrowset();

	$smarty->assign('ptypenm',strtoupper(stripslashes($row_reqcnt[0]['part_type'])));
	$smarty->assign('stockopt',stripslashes($row_reqcnt[0]['stockopt']));
	$smarty->assign('oeoemopt',stripslashes($row_reqcnt[0]['oeoemopt']));
	$part_opt = explode(",", $row_reqcnt[0]['part_opt']);
	$cust_opt = explode(",", $row_reqcnt[0]['cust_opt']);

	$attr_opt = explode(",", $row_reqcnt[0]['attr_opt']);  // added on 22-01-2022

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

	// added on 22-01-2022 
	$attributelist = pobe_attribute_list_chk($attr_opt);
	$smarty->assign('attributelist',$attributelist);

//	$customercnt = pobe_customer_count();
//	$smarty->assign('customercnt',$customercnt);

	$customerlist = pobe_customer_opt_list($cust_opt);
	$smarty->assign('customerlist',$customerlist);

	$output=$smarty->fetch('add_new_part.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}
	
$smarty->assign('mainpage',"manage_site");
$smarty->assign('subpage',"add_part");
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