<?php
ob_start();
// Display error - if there is 
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('max_execution_time', 0);
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/partsdata.php');
include('queries.php');

require_once 'classes/PHPExcel/IOFactory.php';

#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Import Customer Data - Sony AutoParts";
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

/*--------------------------------------------------------------------------------*/
$psect = "manage_imports";
if((pobe_user_part_sect_access(base64_decode($user_id), $psect) != 1) && ($admintp != md5(3))) {
	header('Location: error_page.php?msg='.base64_encode("You don't have access to this section"));	
	die;
}
/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$smarty->assign('errmsg',"");

$errmessage = "";
/*--------------------------------------------------------------------------------*/

$artnum = 0;
$totnum = 0;

if(isset($_POST['import_data'])){

	$file1 = $_FILES['excelfile']['tmp_name'];
	$importfor = $_POST['importfor'];

//-----------------------------------------------------------------------------
//-----------------------------------------------------------------------------
//echo "<br><br><br>";
$parttype = isset($_REQUEST['parttype']) ? trim($_REQUEST['parttype']) : 0;

$ret_val=$obj_partdt->get_partsdata_parttype(array('id'=>addslashes($parttype)));
$row_reqcnt=$obj_partdt->db->sql_fetchrowset();
$ptypename = stripslashes($row_reqcnt[0]['part_type']);
$part_opt = explode(",", $row_reqcnt[0]['part_opt']);
$cust_opt = explode(",", $row_reqcnt[0]['cust_opt']);
$oeoemopt = $row_reqcnt[0]['oeoemopt'];
//print_r($part_opt);
//print_r($cust_opt);

$attr_opt = explode(",", $row_reqcnt[0]['attr_opt']);  //  added on 28-01-2022 

/*
$type_opt = '0';
$pulley_size_opt = '0';
$bar_pressure_opt = '0';
$piston_mm_opt = '0';
$pad_gap_opt = '0';
$f_r_opt = '0';
$cast_opt = '0';
$purchase_price_opt = '0';
$length_opt = '0';
$turns_opt = '0';
$trod_threadsize_opt = '0';
$pinion_length_opt = '0';
$pinion_type_opt = '0';
$pulley_grooves_opt = '0';
$pulley_type_opt = '0';
$plug_pins_opt = '0';
$weight_opt = '0';
$bolt_diameter_opt = '0';
$pinhole_diameter_opt = '0';
$sensor_opt = '0';

foreach ($part_opt as $item) {
	//echo $item ."===<br>";
	if ($item == "type") $type_opt = '1'; 
	if ($item == "pulley_size") $pulley_size_opt = '1'; 
	if ($item == "bar_pressure") $bar_pressure_opt = '1'; 
	if ($item == "piston_mm") $piston_mm_opt = '1'; 
	if ($item == "pad_gap") $pad_gap_opt = '1';  
	if ($item == "f_r") $f_r_opt = '1';  
	if ($item == "cast") $cast_opt = '1';  
	if ($item == "purchase_price") $purchase_price_opt = '1';  
	if ($item == "length") $length_opt = '1';  
	if ($item == "turns") $turns_opt = '1';  
	if ($item == "trod_threadsize") $trod_threadsize_opt = '1';  
	if ($item == "pinion_length") $pinion_length_opt = '1';  
	if ($item == "pinion_type") $pinion_type_opt = '1';  
	if ($item == "pulley_grooves") $pulley_grooves_opt = '1';  
	if ($item == "pulley_type") $pulley_type_opt = '1';  
	if ($item == "plug_pins") $plug_pins_opt = '1';  
	if ($item == "weight") $weight_opt = '1';  
	if ($item == "bolt_diameter") $bolt_diameter_opt = '1';  
	if ($item == "pinhole_diameter") $pinhole_diameter_opt = '1';  
	if ($item == "sensor") $sensor_opt = '1';
	
}
*/
//-----------------------------------------------------------------------------
///-------------------------------------------------------------------------------
$valid = false;
$types = array('Excel2007', 'Excel5');
foreach ($types as $type) {
    $reader = PHPExcel_IOFactory::createReader($type);
    if ($reader->canRead($file1)) {
        $valid = true;
        break;
    }
}

if ($valid) {
///-------------------------------------------------------------------------------
	$dateposted = date("Y-m-d H:i:s");
	
	$objPHPExcel = \PHPExcel_IOFactory::load($file1);
	foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
		$worksheetTitle     = $worksheet->getTitle();
		$highestRow         = $worksheet->getHighestRow(); 
		$highestColumn      = $worksheet->getHighestColumn(); 
		$highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
		$nrColumns = ord($highestColumn) - 64;
		$nrRows = $highestRow - 1;

		//echo "<br>No. of Columns: " . $highestColumnIndex . "<br>No. of Records: ". $nrRows . "<br>";

		for ($row = 2; $row <= $highestRow; ++ $row) {
			$col = 0;

			$rsac = $worksheet->getCellByColumnAndRow($col++, $row);
			$manufacturer = $worksheet->getCellByColumnAndRow($col++, $row);
			$make = $worksheet->getCellByColumnAndRow($col++, $row);
			$model = $worksheet->getCellByColumnAndRow($col++, $row);
			$years = $worksheet->getCellByColumnAndRow($col++, $row);
			$a_grade = (int)$worksheet->getCellByColumnAndRow($col++, $row)->getValue();
			$b_grade = (int)$worksheet->getCellByColumnAndRow($col++, $row)->getValue();
			$location = $worksheet->getCellByColumnAndRow($col++, $row);
			$target_stock = (int)$worksheet->getCellByColumnAndRow($col++, $row)->getValue();
			$sell_price = (float)$worksheet->getCellByColumnAndRow($col++, $row)->getValue();
			if ($oeoemopt == '1') {
				$oe_number = $worksheet->getCellByColumnAndRow($col++, $row);
				$oem_number = $worksheet->getCellByColumnAndRow($col++, $row);
			} else {
				$oe_number = "";
				$oem_number = "";
			}
			$notes = $worksheet->getCellByColumnAndRow($col++, $row);  

/*
			if ($type_opt == '1') { $pa_type = $worksheet->getCellByColumnAndRow($col++, $row); } else { $pa_type = ""; }
			if ($pulley_size_opt == '1') { $pulley_size = $worksheet->getCellByColumnAndRow($col++, $row);} else { $pulley_size = ""; }
			if ($bar_pressure_opt == '1') { $bar_pressure = $worksheet->getCellByColumnAndRow($col++, $row);} else { $bar_pressure = ""; }
			if ($piston_mm_opt == '1') { $piston_mm = $worksheet->getCellByColumnAndRow($col++, $row);} else { $piston_mm = ""; }
			if ($pad_gap_opt == '1') { $pad_gap = $worksheet->getCellByColumnAndRow($col++, $row);} else { $pad_gap = ""; }
			if ($f_r_opt == '1') { $f_r = $worksheet->getCellByColumnAndRow($col++, $row);} else { $f_r = ""; }
			if ($cast_opt == '1') { $cast = $worksheet->getCellByColumnAndRow($col++, $row);} else { $cast = ""; }
			if ($purchase_price_opt == '1') { $purchase_price = $worksheet->getCellByColumnAndRow($col++, $row);} else { $purchase_price = ""; }
			if ($length_opt == '1') { $length = $worksheet->getCellByColumnAndRow($col++, $row); } else { $length = ""; }
			if ($turns_opt == '1') { $turns = $worksheet->getCellByColumnAndRow($col++, $row); } else { $turns = ""; }
			if ($trod_threadsize_opt == '1') { $trod_threadsize = $worksheet->getCellByColumnAndRow($col++, $row);  } else { $trod_threadsize = ""; }
			if ($pinion_length_opt == '1') { $pinion_length = $worksheet->getCellByColumnAndRow($col++, $row); } else { $pinion_length = ""; }
			if ($pinion_type_opt == '1') { $pinion_type = $worksheet->getCellByColumnAndRow($col++, $row); } else { $pinion_type = ""; }
			if ($pulley_grooves_opt == '1') { $pulley_grooves = $worksheet->getCellByColumnAndRow($col++, $row); } else { $pulley_grooves = ""; }
			if ($pulley_type_opt == '1') { $pulley_type = $worksheet->getCellByColumnAndRow($col++, $row);} else { $pulley_type = ""; }
			if ($plug_pins_opt == '1') { $plug_pins = $worksheet->getCellByColumnAndRow($col++, $row);} else { $plug_pins = ""; }
			if ($weight_opt == '1') { $weight = $worksheet->getCellByColumnAndRow($col++, $row);} else { $weight = ""; }
			if ($bolt_diameter_opt == '1') { $bolt_diameter = $worksheet->getCellByColumnAndRow($col++, $row);} else { $bolt_diameter = ""; }
			if ($pinhole_diameter_opt == '1') { $pinhole_diameter = $worksheet->getCellByColumnAndRow($col++, $row);} else { $pinhole_diameter = ""; }
			if ($sensor_opt == '1') { $sensor = $worksheet->getCellByColumnAndRow($col++, $row);} else { $sensor = ""; }

*/ 
//--------------------------------------------------------------------------------
			$exist_rsac=0;
			$exist_rsac+=$obj_partdt->count_partsdata_details(array('rsac'=>addslashes($rsac),'part_type'=>addslashes($parttype),'status'=>'1','is_deleted'=>'0'));	
			//echo "================================================= ".$exist_rsac."<br>";

			if($exist_rsac==1) {

				$refnum = 1;
				$dateposted = date("Y-m-d H:i:s");
				$partid = pobe_get_part_id($rsac);
				//echo "parttype#: " . $parttype . " partid#: " . $partid . "<br>";

				$obj_partdt->update_partsdata_import(array('make'=>addslashes($make), 'manufacturer'=>addslashes($manufacturer), 'model'=>addslashes($model), 'years'=>addslashes($years), 'location'=>addslashes($location), 'a_grade'=>addslashes($a_grade), 'b_grade'=>addslashes($b_grade), 'target_stock'=>addslashes($target_stock), 'sell_price'=>addslashes($sell_price), 'notes'=>addslashes($notes), 'last_updated'=>$dateposted), array('id'=>$partid,'rsac'=>addslashes($rsac),'part_type'=>addslashes($parttype)));

				//updated on 28-01-2022 
				//$obj_partdt->update_partsdata_import(array('make'=>addslashes($make), 'manufacturer'=>addslashes($manufacturer), 'model'=>addslashes($model), 'years'=>addslashes($years), 'location'=>addslashes($location), 'a_grade'=>addslashes($a_grade), 'b_grade'=>addslashes($b_grade), 'target_stock'=>addslashes($target_stock), 'sell_price'=>addslashes($sell_price), 'type'=>addslashes($pa_type), 'pulley_size'=>addslashes($pulley_size), 'bar_pressure'=>addslashes($bar_pressure), 'piston_mm'=>addslashes($piston_mm), 'pad_gap'=>addslashes($pad_gap), 'f_r'=>addslashes($f_r), 'cast'=>addslashes($cast), 'purchase_price'=>addslashes($purchase_price), 'length'=>addslashes($length), 'turns'=>addslashes($turns), 'trod_threadsize'=>addslashes($trod_threadsize), 'pinion_length'=>addslashes($pinion_length), 'pinion_type'=>addslashes($pinion_type), 'pulley_grooves'=>addslashes($pulley_grooves), 'pulley_type'=>addslashes($pulley_type), 'plug_pins'=>addslashes($plug_pins), 'weight'=>addslashes($weight), 'bolt_diameter'=>addslashes($bolt_diameter), 'pinhole_diameter'=>addslashes($pinhole_diameter), 'sensor'=>addslashes($sensor), 'notes'=>addslashes($notes), 'last_updated'=>$dateposted), array('id'=>$partid,'rsac'=>addslashes($rsac),'part_type'=>addslashes($parttype)));
				
				////$obj_partdt->update_partsdata_import(array('make'=>addslashes($make), 'manufacturer'=>addslashes($manufacturer), 'model'=>addslashes($model), 'years'=>addslashes($years), 'location'=>addslashes($location), 'a_grade'=>addslashes($a_grade), 'b_grade'=>addslashes($b_grade), 'target_stock'=>addslashes($target_stock), 'sell_price'=>addslashes($sell_price), 'type'=>addslashes($pa_type), 'pulley_size'=>addslashes($pulley_size), 'bar_pressure'=>addslashes($bar_pressure), 'piston_mm'=>addslashes($piston_mm), 'pad_gap'=>addslashes($pad_gap), 'f_r'=>addslashes($f_r), 'cast'=>addslashes($cast), 'purchase_price'=>addslashes($purchase_price), 'length'=>addslashes($length), 'turns'=>addslashes($turns), 'trod_threadsize'=>addslashes($trod_threadsize), 'pinion_length'=>addslashes($pinion_length), 'pinion_type'=>addslashes($pinion_type), 'pulley_grooves'=>addslashes($pulley_grooves), 'pulley_type'=>addslashes($pulley_type), 'plug_pins'=>addslashes($plug_pins), 'weight'=>addslashes($weight), 'bolt_diameter'=>addslashes($bolt_diameter), 'pinhole_diameter'=>addslashes($pinhole_diameter), 'sensor'=>addslashes($sensor), 'notes'=>addslashes($notes), 'last_updated'=>$dateposted), array('id'=>$partid,'rsac'=>addslashes($rsac),'part_type'=>addslashes($parttype)));

				if($oeoemopt == '1') {
					$exist_oeref = pobe_chk_part_oeref_data($partid);
					//echo "================================================= ".$exist_oeref."<br>";
					if($exist_oeref==0) {
						$ret_val4=$obj_partdt->add_partsdata_oeref_import(array('partid'=>addslashes($partid), 'oe_number'=>addslashes($oe_number), 'oem_number'=>addslashes($oem_number), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted));
					} else {
						$ret_val3=$obj_partdt->update_partsdata_oeref_import(array('oe_number'=>addslashes($oe_number), 'oem_number'=>addslashes($oem_number), 'last_updated'=>$dateposted), array('partid'=>addslashes($partid), 'refnum'=>$refnum));
					}
				}

				// -------------------------------------------
				// added on 28-01-2022  
				$attrdt = "";
				foreach ($attr_opt as $attrno) {
					//echo "=> attrid=".$attrno ." ";
					$attrdt = $worksheet->getCellByColumnAndRow($col++, $row);
					if (isset($attrdt) && trim($attrdt) != '') pobe_update_partsdata_attribute_import($partid,$attrno,$attrdt);
					
				}
				// -------------------------------------------

				$custdt = "";
				foreach ($cust_opt as $custno) {
					//echo "=> custid=".$custno ." ";
					$custdt = $worksheet->getCellByColumnAndRow($col++, $row);
					if (isset($custdt) && trim($custdt) != '') pobe_update_partsdata_cref_import($partid,$custno,$custdt);
					
				}
				//echo "<br>";
				$artnum++;
			}
/* */
			$totnum++;
			set_time_limit(30);
		}
	}

	$smarty->assign('msg', "FROM ".$totnum." records, ".$artnum." records imported.");
///-------------------------------------------------------------------------------
} else {
  // TODO: show error message
	$smarty->assign('msg',"Error: Wrong file format. Please upload valid file.");
}
///-------------------------------------------------------------------------------

}
/*--------------------------------------------------------------------------------*/

if(isset($_REQUEST['parttype'])){  
	$smarty->assign('parttype',$_REQUEST['parttype']);
	$smarty->assign('ptypenm',strtoupper(pobe_view_part_type($_REQUEST['parttype'])));
} else {
	$smarty->assign('parttype',"");
	$smarty->assign('ptypenm',"");
}

if(isset($_REQUEST['mode']))
{	
	if($_REQUEST['mode']=="show")
	{		
		$smarty->assign('myparttypelist',pobe_part_type_list());
//--------------------------------------------------------------------------------
		$smarty->assign('parttypelist',pobe_part_type_list());

		$output=$smarty->fetch('import_parts_data.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}

$smarty->assign('mainpage',"manage_imports");
$smarty->assign('subpage',"import_parts_data");
$smarty->assign('ptype',"");

$smarty->display('main.tpl');	
?>