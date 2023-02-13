<?php
ob_start();
// Display error - if there is
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
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

		$grptypes = [14, 15, 16, 17];   // ADDED ON 22-01-2023 

		if (in_array($parttype, $grptypes)) {
		//================================================

			$gridd = "";
			$sids = array();
			$limit = 0;

			for ($row = 2; $row <= $highestRow; ++ $row) {
				$col = 0;

				$grprsac = $worksheet->getCellByColumnAndRow($col++, $row);

				$exist_rsac=0;
				$exist_rsac+=$obj_partdt->count_partsdata_details(array('group_rsac'=>addslashes($grprsac),'part_type'=>addslashes($parttype),'status'=>'1','is_deleted'=>'0','is_main'=>'1'));	
				//echo "================================================= ".$exist_rsac."<br>";

				if($exist_rsac==1) {

					$partid = pobe_get_group_part_id($grprsac,$parttype);
					//echo "parttype#: " . $parttype . " partid#: " . $partid . "<br>";

					/*
					*/
					if ($gridd == $grprsac) {
						$viewrecs = '0';
					} else {
						$viewrecs = '1';
						$limit = 0;
					}
					//echo $gridd . "  *** viewrecs= " . $viewrecs . "<br>";

					$sids = pobe_group_parts_oestock_ids($partid,$limit);
					//echo $limit . "  =limit " . $sids . "  oestockids  <br>";

					$refnum = 1;
					$dateposted = date("Y-m-d H:i:s");

					$oe_one = $worksheet->getCellByColumnAndRow($col++, $row);
					$oe_two = $worksheet->getCellByColumnAndRow($col++, $row);
					$oemone = $worksheet->getCellByColumnAndRow($col++, $row);
					$oemtwo = $worksheet->getCellByColumnAndRow($col++, $row);
					$qtydata = (int)$worksheet->getCellByColumnAndRow($col++, $row)->getValue();
					$location = $worksheet->getCellByColumnAndRow($col++, $row);
					//echo "oe_one#: " . $oe_one . " oe_two#: " . $oe_two . " oemone#: " . $oemone . " oemtwo#: " . $oemtwo . " qtydata#: " . $qtydata . "<br>";

					if ($viewrecs == '1') {    ///

						$manufacturer = $worksheet->getCellByColumnAndRow($col++, $row);
						$make = $worksheet->getCellByColumnAndRow($col++, $row);
						$model = $worksheet->getCellByColumnAndRow($col++, $row);
						$years = $worksheet->getCellByColumnAndRow($col++, $row);
						$target_stock = (int)$worksheet->getCellByColumnAndRow($col++, $row)->getValue();
						$sell_price = (float)$worksheet->getCellByColumnAndRow($col++, $row)->getValue();

						$notes = $worksheet->getCellByColumnAndRow($col++, $row);  

						$obj_partdt->update_partsdata_import(array('make'=>addslashes($make), 'manufacturer'=>addslashes($manufacturer), 'model'=>addslashes($model), 'years'=>addslashes($years), 'target_stock'=>addslashes($target_stock), 'sell_price'=>addslashes($sell_price), 'notes'=>addslashes($notes), 'last_updated'=>$dateposted), array('id'=>$partid,'part_type'=>addslashes($parttype)));

						$attrdt = "";
						$attr_opt = array_diff($attr_opt, [50,51,52,53]);
						foreach ($attr_opt as $attrno) {
							//echo "=> attrid=".$attrno ." ";
							$attrdt = $worksheet->getCellByColumnAndRow($col++, $row);
							if (isset($attrdt) && trim($attrdt) != '') pobe_update_partsdata_attribute_import($partid,$attrno,$attrdt);
						}

						$custdt = "";
						foreach ($cust_opt as $custno) {
							//echo "=> custid=".$custno ." ";
							$custdt = $worksheet->getCellByColumnAndRow($col++, $row);
							if (isset($custdt) && trim($custdt) != '') pobe_update_partsdata_cref_import($partid,$custno,$custdt);						
						}

					}  ///

					$obj_partdt->update_partsdata_import_stock(array('oe_one'=>addslashes($oe_one), 'oe_two'=>addslashes($oe_two), 'oemone'=>addslashes($oemone), 'oemtwo'=>addslashes($oemtwo), 'qty_data'=>addslashes($qtydata), 'location'=>addslashes($location), 'last_updated'=>$dateposted), array('id'=>$sids,'partid'=>$partid));

					$limit++;
					$gridd = $grprsac;  ///

					//echo "<br>----------------------<br>";
					$artnum++;
				}

				$totnum++;
				set_time_limit(30);
			}

		//================================================
		} else {
		//================================================

			for ($row = 2; $row <= $highestRow; ++ $row) {
				$col = 0;

				$rsac = $worksheet->getCellByColumnAndRow($col++, $row);

				$exist_rsac=0;
				$exist_rsac+=$obj_partdt->count_partsdata_details(array('rsac'=>addslashes($rsac),'part_type'=>addslashes($parttype),'status'=>'1','is_deleted'=>'0'));	
				//echo "================================================= ".$exist_rsac."<br>";

				if($exist_rsac==1) {

					$partid = pobe_get_part_id($rsac);
					//echo "parttype#: " . $parttype . " partid#: " . $partid . "<br>";
					$refnum = 1;
					$dateposted = date("Y-m-d H:i:s");

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

					$obj_partdt->update_partsdata_import(array('make'=>addslashes($make), 'manufacturer'=>addslashes($manufacturer), 'model'=>addslashes($model), 'years'=>addslashes($years), 'location'=>addslashes($location), 'a_grade'=>addslashes($a_grade), 'b_grade'=>addslashes($b_grade), 'target_stock'=>addslashes($target_stock), 'sell_price'=>addslashes($sell_price), 'notes'=>addslashes($notes), 'last_updated'=>$dateposted), array('id'=>$partid,'part_type'=>addslashes($parttype)));

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

				$totnum++;
				set_time_limit(30);
			}

		//================================================
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