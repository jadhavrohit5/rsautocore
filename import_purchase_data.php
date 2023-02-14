<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/partstock.php');
include('queries.php');

require_once 'classes/PHPExcel/IOFactory.php';

#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Import Purchase Data - Sony AutoParts";
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

$obj_partstk=new partstock;

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

$errmessage = "";
/*--------------------------------------------------------------------------------*/

$parttype = isset($_REQUEST['parttype']) ? trim($_REQUEST['parttype']) : 0;

$artnum = 0;
$postdate = date("Y-m-d H:i:s");  

if(isset($_POST['import_data'])){

	$file1 = $_FILES['excelfile']['tmp_name'];
	$importfor = $_POST['importfor'];

	// added on 14-05-2022  ---------------------------------------------------------
	$orderdate = $_POST['orderdate'];    
	$orddate = str_replace('/', '-', $orderdate);
	list($day, $month, $year) = explode("-", $orddate);
	$nwodate = date("Y-m-d", mktime(0, 0, 0, $month, $day, $year));
	//-------------------------------------------------------------------------------

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
  // TODO: load file
  // e.g. PHPExcel_IOFactory::load($file_path)
///-------------------------------------------------------------------------------

	$objPHPExcel = \PHPExcel_IOFactory::load($file1);
	foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
		$worksheetTitle     = $worksheet->getTitle();
		$highestRow         = $worksheet->getHighestRow(); // e.g. 10
		$highestColumn      = "J";	//$worksheet->getHighestColumn(); // e.g 'F'
		$highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
		$nrColumns = ord($highestColumn) - 64;

		for ($row = 2; $row <= $highestRow; ++ $row) {
			$col = 0;
			$ponum = $worksheet->getCellByColumnAndRow($col++, $row);
			$custn = $worksheet->getCellByColumnAndRow($col++, $row);
			$rsref = $worksheet->getCellByColumnAndRow($col++, $row);
			$po_oe = $worksheet->getCellByColumnAndRow($col++, $row);
			$oqnty = $worksheet->getCellByColumnAndRow($col++, $row);
			$price = $worksheet->getCellByColumnAndRow($col++, $row);
			$po_notes = $worksheet->getCellByColumnAndRow($col++, $row);
			$odate = $worksheet->getCellByColumnAndRow($col++, $row)->getFormattedValue();

			/*
			$orddate = str_replace('/', '-', $odate);
			list($month, $day, $year) = explode("-", $orddate);
			$nwodate = date("Y-m-d", mktime(0, 0, 0, $month, $day, $year));
			*/

			$sptype = 2;
			//$partid = pobe_get_part_id($rsref);
			$partid = pobe_get_part_id_new($rsref);  // updated on 25-01-2023 

			if($partid > 0){
				$parttp = pobe_get_part_type($partid);	//  added on 15-10-2020 

				//$ret_val=$obj_partstk->add_partstock(array('partid'=>addslashes($partid), 'type'=>addslashes($parttype), 'po_num'=>addslashes($ponum), 'supplier'=>addslashes($custn), 'rsac_ref'=>addslashes($rsref), 'po_quantity'=>addslashes($oqnty), 'po_price'=>addslashes($price), 'ord_date'=>$nwodate, 'postdate'=>$postdate, 'status'=>'1', 'sp_type'=>$sptype, 'is_sale'=>'0', 'is_purchase'=>'1'));
				// updated on on 15-10-2020 
				$ret_val=$obj_partstk->add_partstock(array('partid'=>addslashes($partid), 'type'=>addslashes($parttp), 'po_num'=>addslashes($ponum), 'supplier'=>addslashes($custn), 'rsac_ref'=>addslashes($rsref), 'po_oe' => addslashes($po_oe), 'po_quantity'=>addslashes($oqnty), 'po_price'=>addslashes($price), 'po_notes' => addslashes($po_notes), 'ord_date'=>$nwodate, 'postdate'=>$postdate, 'status'=>'1', 'sp_type'=>$sptype, 'is_sale'=>'0', 'is_purchase'=>'1'));
				$artnum++;
			}
		}
	}

	$smarty->assign('msg',$artnum." records successfully imported.");
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
		if($admintp != md5(3)) {
		$smarty->assign('myparttypelist',pobe_part_type_allowed_list(base64_decode($user_id)));
		} else {
		$smarty->assign('myparttypelist',pobe_part_type_list());
		}

		$parttypelist = pobe_part_type_list();
		$smarty->assign('parttypelist',$parttypelist);

		$output=$smarty->fetch('import_purchase_data.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}

$smarty->assign('mainpage',"manage_imports");
$smarty->assign('subpage',"import_purchase_data");
$smarty->assign('ptype',"");

$smarty->display('main.tpl');	
?>