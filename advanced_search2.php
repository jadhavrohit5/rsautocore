<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/searchparts.php');
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
} elseif($_SESSION['global_logged_in']!="true" || $admintp != md5(3)){  
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
} else {
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
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

$obj_partdt=new searchparts;
$obj_parttp=new partstype;

$ptype = isset($_REQUEST['type']) ? trim($_REQUEST['type']) : 1;
$smarty->assign('ptype',$ptype); 

//echo "=================================================<br><br><br><br><br>";
//print_r($_REQUEST);
/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";
/*--------------------------------------------------------------------------------*/

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'advsearch') {

	$custref = isset($_POST['custref']) ? (int)$_POST['custref'] : 0;
	$custdata = isset($_POST['custdata']) ? $_POST['custdata'] : "";
	$manufacturer = isset($_POST['manufacturer']) ? $_POST['manufacturer'] : "";
	$make = isset($_POST['make']) ? $_POST['make'] : "";
	$model = isset($_POST['model']) ? $_POST['model'] : "";
	$oe_number = isset($_POST['oe_number']) ? $_POST['oe_number'] : "";
	$oem_number = isset($_POST['oem_number']) ? $_POST['oem_number'] : "";
	$location = isset($_POST['location']) ? $_POST['location'] : "";

/*--------------------------------------------------------------------------------*/
	$attrdata = "";
	$attrbnum = 0;
	$attrcond = "";

	if(isset($_POST['attr'])) {
		foreach($_POST['attr'] as $attrno => $val){
			if (isset($val) && $val != ''){
				////$attrdata .= pobe_attributes_advanced_search($attrno,$val,$ptype);
				$attrcond .= " AND cr.partid IN (SELECT DISTINCT partid FROM tbl_rsa_attributes_data WHERE attrid = '".$attrno."' AND attrdata LIKE '%".$val."%') ";
				//print_r($attrdata);
				$attrbnum++;
			}
		}
		$attrdata = pobe_attributes_advanced_search_two($attrcond,$ptype);
	} 

	$attrval = $attrbnum;
	$attrdata = rtrim($attrdata, ',');
/*--------------------------------------------------------------------------------*/

/*
	$prtype = isset($_POST['prtype']) ? $_POST['prtype'] : "";
	$pulley_size = isset($_POST['pulley_size']) ? $_POST['pulley_size'] : "";
	$bar_pressure = isset($_POST['bar_pressure']) ? $_POST['bar_pressure'] : "";
	$piston_mm = isset($_POST['piston_mm']) ? $_POST['piston_mm'] : "";
	$pad_gap = isset($_POST['pad_gap']) ? $_POST['pad_gap'] : "";
	$f_r = isset($_POST['f_r']) ? $_POST['f_r'] : "";
	$cast = isset($_POST['cast']) ? $_POST['cast'] : "";
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
	$searchtype = "advance";
	$numofresults = 0;
	$dateposted = date("Y-m-d H:i:s");

	//$ret_val3=$obj_partdt->add_searchparts(array('searchtype'=>addslashes($searchtype), 'custref'=>addslashes($custref), 'custdata'=>addslashes($custdata), 'make'=>addslashes($make), 'manufacturer'=>addslashes($manufacturer), 'model'=>addslashes($model), 'location'=>addslashes($location), 'oe_number'=>addslashes($oe_number), 'oem_number'=>addslashes($oem_number), 'prtype'=>addslashes($prtype), 'pulley_size'=>addslashes($pulley_size), 'bar_pressure'=>addslashes($bar_pressure), 'cast'=>addslashes($cast), 'piston_mm'=>addslashes($piston_mm), 'pad_gap'=>addslashes($pad_gap), 'f_r'=>addslashes($f_r), 'purchase_price'=>addslashes($purchase_price), 'length'=>addslashes($length), 'turns'=>addslashes($turns), 'trod_threadsize'=>addslashes($trod_threadsize), 'pinion_length'=>addslashes($pinion_length), 'pinion_type'=>addslashes($pinion_type), 'pulley_grooves'=>addslashes($pulley_grooves), 'pulley_type'=>addslashes($pulley_type), 'plug_pins'=>addslashes($plug_pins), 'weight'=>addslashes($weight), 'bolt_diameter'=>addslashes($bolt_diameter), 'pinhole_diameter'=>addslashes($pinhole_diameter), 'sensor'=>addslashes($sensor), 'searchdate'=>$dateposted, 'status'=>'1', 'search_by'=>$wuserid, 'numofresults'=>$numofresults));

	// updated on 27-01-2022 
	$ret_val3=$obj_partdt->add_searchparts(array('searchtype'=>addslashes($searchtype), 'custref'=>addslashes($custref), 'custdata'=>addslashes($custdata), 'make'=>addslashes($make), 'manufacturer'=>addslashes($manufacturer), 'model'=>addslashes($model), 'location'=>addslashes($location), 'oe_number'=>addslashes($oe_number), 'oem_number'=>addslashes($oem_number), 'searchdate'=>$dateposted, 'status'=>'1', 'search_by'=>$wuserid, 'numofresults'=>$numofresults, 'attrval'=>addslashes($attrval), 'attrdata'=>addslashes($attrdata)));

	if($obj_partdt->get_searchparts_details(array('searchtype'=>addslashes($searchtype),'searchdate'=>$dateposted,'search_by'=>$wuserid))){
		$row_partdt=$obj_partdt->db->sql_fetchrowset();
		$newschid=$row_partdt[0]['searchid'];

/*--------------------------------------------------------------------------------*/
		header('location: search_results.php?mode=show&type='.$ptype.'&schid='.$newschid);
		die;
/*--------------------------------------------------------------------------------*/
/*
		// commented on 23-12-2022  to enable advance search codes
		$sp_ptypes = [14, 15, 16, 17];
		if (in_array($ptype, $sp_ptypes)) {
			header('location: view_results.php?mode=show&type='.$ptype.'&schid='.$newschid);
			die;
		} else {
			header('location: search_results.php?mode=show&type='.$ptype.'&schid='.$newschid);
			die;
		}
*/
	} else {
		$smarty->assign('msg',"Error - Please try again.");
	}
}

/*--------------------------------------------------------------------------------*/
/*
*/
/*--------------------------------------------------------------------------------*/

if(isset($_REQUEST['type'])){  
/*
	$ret_val3=$obj_parttp->get_partstype_details(array('id'=>addslashes($ptype)));
	$row_reqcnt=$obj_parttp->db->sql_fetchrowset();

	$part_opt = explode(",", $row_reqcnt[0]['part_opt']);

	$smarty->assign('prtype_opt','');
	$smarty->assign('pulley_size_opt','');
	$smarty->assign('bar_pressure_opt','');
	$smarty->assign('piston_mm_opt','');
	$smarty->assign('pad_gap_opt','');
	$smarty->assign('fr_opt','');
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
	$custref = isset($_REQUEST['custref']) ? $_REQUEST['custref'] : "";
	$custdata = isset($_REQUEST['custdata']) ? $_REQUEST['custdata'] : "";
	$manufacturer = isset($_REQUEST['manufacturer']) ? $_REQUEST['manufacturer'] : "";
	$location = isset($_REQUEST['location']) ? $_REQUEST['location'] : "";
	$make = isset($_REQUEST['make']) ? $_REQUEST['make'] : "";
	$model = isset($_REQUEST['model']) ? $_REQUEST['model'] : "";
	$oe_number = isset($_REQUEST['oe_number']) ? $_REQUEST['oe_number'] : "";
	$oem_number = isset($_REQUEST['oem_number']) ? $_REQUEST['oem_number'] : "";

	$smarty->assign('custref',$custref); 
	$smarty->assign('custdata',$custdata); 
	$smarty->assign('manufacturer',$manufacturer); 
	$smarty->assign('location',$location); 
	$smarty->assign('make',$make); 
	$smarty->assign('model',$model); 
	$smarty->assign('oe_number',$oe_number); 
	$smarty->assign('oem_number',$oem_number); 

	// -------------------------------------------
	// added on 27-01-2022 
	$attrval = isset($_REQUEST['attrval']) ? $_REQUEST['attrval'] : "";
	$attrdata = isset($_REQUEST['attrdata']) ? $_REQUEST['attrdata'] : "";
	$smarty->assign('attrval',$attrval); 
	$smarty->assign('attrdata',$attrdata); 
	// -------------------------------------------

	$smarty->assign('ptypenm',strtoupper(pobe_view_part_type($ptype)));
/*
	$prtype = isset($_REQUEST['prtype']) ? $_REQUEST['prtype'] : "";
	$pulley_size = isset($_REQUEST['pulley_size']) ? $_REQUEST['pulley_size'] : "";
	$bar_pressure = isset($_REQUEST['bar_pressure']) ? $_REQUEST['bar_pressure'] : "";
	$piston_mm = isset($_REQUEST['piston_mm']) ? $_REQUEST['piston_mm'] : "";
	$pad_gap = isset($_REQUEST['pad_gap']) ? $_REQUEST['pad_gap'] : "";
	$f_r = isset($_REQUEST['f_r']) ? $_REQUEST['f_r'] : "";
	$cast = isset($_REQUEST['cast']) ? $_REQUEST['cast'] : "";
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
	// -------------------------------------------
	// added on 27-01-2022 
	$attributelist = pobe_sch_attribute_list($ptype);
	$smarty->assign('attributelist',$attributelist);
	// -------------------------------------------

	$customerlist = pobe_sch_customer_ref_list($ptype);
	$smarty->assign('customerlist',$customerlist);
//--------------------------------------------------------------------------------
	$smarty->assign('parttypelist',pobe_part_type_list());

	$output=$smarty->fetch('advanced_search.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}
	
$smarty->assign('mainpage',"parts");
$smarty->assign('subpage',"advanced_search");
$smarty->assign('ptype',"");

if(($admintp == md5(1)) || ($admintp == md5(3))) {
$smarty->display('main.tpl');	
} else {
$smarty->display('main_user.tpl');	
}
/*--------------------------------------------------------------------------------*/
/*
if (error_get_last()){
$smarty->assign('errorgetlast',print_r(error_get_last()));
} else {
$smarty->assign('errorgetlast','');
}
*/
/*--------------------------------------------------------------------------------*/
$obj_partdt->con_close();
exit;
?>