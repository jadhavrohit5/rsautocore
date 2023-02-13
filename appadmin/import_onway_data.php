<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
require("classes/partsonway.php");
include('queries.php');

require_once 'classes/PHPExcel/IOFactory.php';

#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Import On-way Data - Sony AutoParts";
$GLOBALS['message']="";
#==============================================================

$user_loggedin = isset($_SESSION['user_wid']) ? $_SESSION['user_wid'] : "";
$user_wid = pobe_session_register('user_wid', '');
$adminwnm = pobe_session_register('adminwnm', '');
$adminwtp = pobe_session_register('adminwtp', '');
$userwactn = pobe_session_register('userwact', '');
$global_wloggedin = pobe_session_register('global_wloggedin', '');
//print_r($_SESSION);

if($_SESSION['global_wloggedin']=="true" || !empty($user_loggedin)) {
	$smarty->assign('loggedin','1');
} elseif($_SESSION['global_wloggedin']!="true" || ($adminwtp != md5(1)) || ($adminwtp != md5(3))){  
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
} else {
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
}

if($adminwtp == md5(2)) {
	header('Location: error.php');	
	die;
} elseif($userwactn != md5(2)) {
	header('Location: error.php');	
	die;
}
/* */
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

$obj_partows=new partsonway;

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}
/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/
//print_r($_POST);
//print_r($_FILES);

$errmessage = "";
/*--------------------------------------------------------------------------------*/

$artnum = 0;
$postdate = date("Y-m-d H:i:s");  
$uploadnum = time();  
$uploaddate = date("Y-m-d");  

if(isset($_POST['import_data'])){

$file1 = $_FILES['excelfile']['tmp_name'];
$importfor = $_POST['importfor'];

// added on 14-05-2022  ---------------------------------------------------------
$orderdate = $_POST['orderdate'];    
$orddate = str_replace('/', '-', $orderdate);
list($day, $month, $year) = explode("-", $orddate);
$nwodate = date("Y-m-d", mktime(0, 0, 0, $month, $day, $year));
//-------------------------------------------------------------------------------

//-------------------------------------------------------------------------------
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
//-------------------------------------------------------------------------------
//  PO#	Supplier	RS Reference	Quantity	Price	Date
//echo "<br><br>";

	$objPHPExcel = \PHPExcel_IOFactory::load($file1);
	foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
		$worksheetTitle     = $worksheet->getTitle();
		$highestRow         = $worksheet->getHighestRow(); // e.g. 10
		$highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
		$highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
		$nrColumns = ord($highestColumn) - 64;

		for ($row = 2; $row <= $highestRow; ++ $row) {
			$col = 0;
			$ponum = $worksheet->getCellByColumnAndRow($col++, $row);
			$suppl = $worksheet->getCellByColumnAndRow($col++, $row);
			$rsref = trim($worksheet->getCellByColumnAndRow($col++, $row));
			$pqnty = $worksheet->getCellByColumnAndRow($col++, $row);
			$price = $worksheet->getCellByColumnAndRow($col++, $row);
			$odate = $worksheet->getCellByColumnAndRow($col++, $row)->getFormattedValue();
			/*
			//echo $row . " | ". $ponum ." | ". $suppl ." | ". $rsref ." | ". $pqnty ." | ". $price ." | ". $odate ."<br>";

			$orddate = str_replace('/', '-', $odate);
			list($day, $month, $year) = explode("-", $orddate);
			$nwodate = date("Y-m-d", mktime(0, 0, 0, $month, $day, $year));
			*/

			$sptype = 1;
			$partid = pobe_get_part_id($rsref);

			if($partid > 0){

				$parttp = pobe_get_part_type($partid);	
			
				$ret_val=$obj_partows->add_partsonway(array('partid'=>addslashes($partid), 'type'=>addslashes($parttp), 'po_num'=>addslashes($ponum), 'supplier'=>addslashes($suppl), 'rsac_ref'=>addslashes($rsref), 'po_quantity'=>addslashes($pqnty), 'po_price'=>addslashes($price), 'ord_date'=>$nwodate, 'postdate'=>$postdate, 'status'=>'1', 'uploadnum'=>addslashes($uploadnum), 'importedby'=>addslashes($wuserid)));
				$artnum++;
			}
		}
	}

	$smarty->assign('msg',$artnum." records successfully imported.");
//-------------------------------------------------------------------------------
} else {
  // TODO: show error message
	$smarty->assign('msg',"Error: Wrong file format. Please upload valid file.");
}
//-------------------------------------------------------------------------------

}
/*--------------------------------------------------------------------------------*/

//--------------------------------------------------------------------------------
if(isset($_REQUEST['mode']))
{	
	if($_REQUEST['mode']=="show")
	{		

		$output=$smarty->fetch('import_onway_data.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}
//--------------------------------------------------------------------------------

$smarty->assign('mainpage',"manage_site");
$smarty->assign('subpage',"import_onway_data");

$smarty->display('main.tpl');	

/*--------------------------------------------------------------------------------*/
/*
if (error_get_last()){
print_r(error_get_last());
}
*/
/*--------------------------------------------------------------------------------*/
$obj_partows->con_close();
exit;
?>