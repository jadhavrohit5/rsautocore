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
} elseif($_SESSION['global_logged_in']!="true" || ($admintp != md5(1)) || ($admintp != md5(3))){  
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
} else {
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
}

//if(($admintp != md5(1)) || ($admintp != md5(3))) {
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

//print_r($_REQUEST);
/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";
/*--------------------------------------------------------------------------------*/
//echo "============================================flag-0<br>";

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
//echo "============================================".pobe_get_prev_part($partid,$ptypeid)." PREV== ";
//echo $partid." == ";
//echo pobe_get_next_part($partid,$ptypeid)." NEXT<br>";

$incqty = (int) pobe_incoming_cores_qnty($partid) + (int) pobe_imported_cores_qnty($partid);    //  added on 24-03-2022 
$smarty->assign('icqnty',$incqty);    //  updated on 24-03-2022 

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'updatepart') {
	//print_r($_POST);
	$rsac = trim($_POST['rsac']);

	//$a_grade = isset($_POST['a_grade']) ? (int)$_POST['a_grade'] : 0;
	//$b_grade = isset($_POST['b_grade']) ? (int)$_POST['b_grade'] : 0;
	$agrddata = isset($_POST['agrddata']) ? (int)$_POST['agrddata'] : 0;
	$bgrddata = isset($_POST['bgrddata']) ? (int)$_POST['bgrddata'] : 0;
	$a_grade = isset($_POST['a_grade']) ? (int)$_POST['a_grade'] : 0;
	$b_grade = isset($_POST['b_grade']) ? (int)$_POST['b_grade'] : 0;
	$a_grade_val = $a_grade + $agrddata;
	$b_grade_val = $b_grade + $bgrddata;

	$target_stock = isset($_POST['target_stock']) ? (int)$_POST['target_stock'] : 0;
	//$location = isset($_POST['location']) ? $_POST['location'] : "";
	if(($a_grade_val == 0) && ($b_grade_val == 0)) {
		$location = "";
	} else {
		$location = isset($_POST['location']) ? $_POST['location'] : "";
	}

	$sell_price = isset($_POST['sell_price']) ? (float)$_POST['sell_price'] : 0.00;

	$oe_number = isset($_POST['oe_number']) ? $_POST['oe_number'] : "";
	$oem_number = isset($_POST['oem_number']) ? $_POST['oem_number'] : "";
/*
	$max_stock = isset($_POST['max_stock']) ? (int)$_POST['max_stock'] : 0;

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
	$manufacturer = isset($_POST['manufacturer']) ? $_POST['manufacturer'] : "";
	$make = isset($_POST['make']) ? $_POST['make'] : "";
	$model = isset($_POST['model']) ? $_POST['model'] : "";
	$years = isset($_POST['years']) ? $_POST['years'] : "";
	//$notes = $_POST['notes'];
	$oeoemopt = $_POST['oeoemopt'];
	$stockopt = $_POST['stockopt'];

	// commented on 22-07-2019  to fix error
	//if(($a_grade == 0) && ($b_grade == 0)) {
	if(($a_grade_val == 0) && ($b_grade_val == 0)) {
		$location = "";
		$_REQUEST['location'] = "";
	}

	$exist_rsac = pobe_chk_part_rsac_name($partid,$rsac);
	//echo "================================================= ".$exist_rsac."<br>";

	if($exist_rsac==0) {

//--------------------------------------------------------------------------------
		if(($a_grade_val < 0) || ($b_grade_val < 0)) {
			$smarty->assign('msg',"Error: Updated Stock should not be less than 0.");
		} else {
//--------------------------------------------------------------------------------
			// updated on 26-01-2022 
			$obj_partdt->update_partsdata(array('rsac'=>addslashes($rsac), 'make'=>addslashes($make), 'manufacturer'=>addslashes($manufacturer), 'model'=>addslashes($model), 'years'=>addslashes($years), 'location'=>addslashes($location), 'a_grade'=>addslashes($a_grade_val), 'b_grade'=>addslashes($b_grade_val), 'target_stock'=>addslashes($target_stock), 'sell_price'=>addslashes($sell_price),     'last_updated'=>$dateposted), array('id'=>$partid));

			//$obj_partdt->update_partsdata(array('rsac'=>addslashes($rsac), 'make'=>addslashes($make), 'manufacturer'=>addslashes($manufacturer), 'model'=>addslashes($model), 'years'=>addslashes($years), 'location'=>addslashes($location), 'a_grade'=>addslashes($a_grade_val), 'b_grade'=>addslashes($b_grade_val), 'target_stock'=>addslashes($target_stock), 'max_stock'=>addslashes($max_stock), 'sell_price'=>addslashes($sell_price), 'type'=>addslashes($prtype), 'pulley_size'=>addslashes($pulley_size), 'bar_pressure'=>addslashes($bar_pressure), 'piston_mm'=>addslashes($piston_mm), 'pad_gap'=>addslashes($pad_gap), 'f_r'=>addslashes($f_r), 'cast'=>addslashes($cast), 'purchase_price'=>addslashes($purchase_price), 'length'=>addslashes($length), 'turns'=>addslashes($turns), 'trod_threadsize'=>addslashes($trod_threadsize), 'pinion_length'=>addslashes($pinion_length), 'pinion_type'=>addslashes($pinion_type), 'pulley_grooves'=>addslashes($pulley_grooves), 'pulley_type'=>addslashes($pulley_type), 'plug_pins'=>addslashes($plug_pins), 'weight'=>addslashes($weight), 'bolt_diameter'=>addslashes($bolt_diameter), 'pinhole_diameter'=>addslashes($pinhole_diameter), 'sensor'=>addslashes($sensor), 'last_updated'=>$dateposted), array('id'=>$partid));

			if($oeoemopt == '1') {
				$exist_oeref = pobe_chk_part_oeref_data($partid);
				//echo "================================================= ".$exist_oeref."<br>";
				if($exist_oeref==0) {
					$ret_val4=$obj_partdt->add_partsdata_oeref(array('partid'=>addslashes($partid), 'oe_number'=>addslashes($oe_number), 'oem_number'=>addslashes($oem_number), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted));
				} else {
					$ret_val3=$obj_partdt->update_partsdata_oeref(array('oe_number'=>addslashes($oe_number), 'oem_number'=>addslashes($oem_number), 'last_updated'=>$dateposted), array('partid'=>addslashes($partid), 'refnum'=>$refnum));
				}
			}
			//if($oeoemopt == '1') {
			//	$ret_val3=$obj_partdt->update_partsdata_oeref(array('oe_number'=>addslashes($oe_number), 'oem_number'=>addslashes($oem_number), 'last_updated'=>$dateposted), array('partid'=>addslashes($partid), 'refnum'=>$refnum));
			//}

			//================================================= added on 21-01-2022 
			if(isset($_POST['attr'])) {
				foreach($_POST['attr'] as $attrno => $val){
					pobe_update_partsdata_attributes($partid,$attrno,$val);
				}
			} 
			//================================================= 


			if(isset($_POST['cust'])) {
				foreach($_POST['cust'] as $custno => $val){
					//if (isset($val) && trim($val) != ''){
					pobe_update_partsdata_cref($partid,$custno,$val);
					//}
				}
			} 
	//--------------------------------------------------------------------------------
			$smarty->assign('msg',"Part updated successfully.");
		}
	} else {
		$smarty->assign('msg',"Error - A part with this RSAC already assigned to another part.");
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
/*
		$smarty->assign('oe_number',stripslashes($row_oemndt[0]['oe_number'])); 
		$smarty->assign('oem_number',stripslashes($row_oemndt[0]['oem_number'])); 
*/
//--------------------------------------------------------------------------------
//echo "============================================flag-3<br>";
		$ret_val3=$obj_parttp->get_partstype_details(array('id'=>addslashes($ptypeid)));
		$row_reqcnt=$obj_parttp->db->sql_fetchrowset();

		$smarty->assign('ptypenm',strtoupper(stripslashes($row_reqcnt[0]['part_type'])));
		$smarty->assign('stockopt',stripslashes($row_reqcnt[0]['stockopt']));
		$smarty->assign('oeoemopt',stripslashes($row_reqcnt[0]['oeoemopt']));
		$part_opt = explode(",", $row_reqcnt[0]['part_opt']);
		$cust_opt = explode(",", $row_reqcnt[0]['cust_opt']);

		$attr_opt = explode(",", $row_reqcnt[0]['attr_opt']);  // added on 20-01-2022
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
//echo "flag-4<br>";
		// added on 20-01-2022 
		//$attributelist = pobe_attribute_list_opt($attr_opt,$partid);
		// updated on 17-08-2022 
		$attributelist = pobe_attribute_list_opt_nw($row_reqcnt[0]['attr_opt'],$partid);
		$smarty->assign('attributelist',$attributelist);
		//print_r($attributelist);

		//$customercnt = pobe_customer_count();
		//$smarty->assign('customercnt',$customercnt);

		//$customerlist = pobe_customer_opt_list_3($cust_opt,$partid);
		// updated on 17-08-2022 
		$customerlist = pobe_customer_opt_list_nw($row_reqcnt[0]['cust_opt'],$partid);
		$smarty->assign('customerlist',$customerlist);
//--------------------------------------------------------------------------------
//echo "flag-5<br>";
		//$manufacturerlist = pobe_part_manufacturer_list();
		//$smarty->assign('manufacturerlist',$manufacturerlist);

		//$partmakelist = pobe_part_make_list();
		//$smarty->assign('partmakelist',$partmakelist);
//--------------------------------------------------------------------------------
		$smarty->assign('parttypelist',pobe_part_type_list());
//--------------------------------------------------------------------------------
//echo "flag-6<br>";
		$displayphoto = pobe_part_images_display($partid);
		$smarty->assign('displayphoto',$displayphoto);
//--------------------------------------------------------------------------------
		$output=$smarty->fetch('edit_part.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}

$smarty->assign('mainpage',"parts");
$smarty->assign('subpage',"parts");
$smarty->assign('ptype',"");

$smarty->display('main.tpl');	

/*--------------------------------------------------------------------------------*/
$obj_partdt->con_close();
$obj_parttp->con_close();
exit;
?>