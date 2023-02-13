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

$custid = isset($_REQUEST['custid']) ? trim($_REQUEST['custid']) : 0;
$smarty->assign('custid',$custid); 

$artnum = 0;
$totnum = 0;

if(isset($_POST['import_data'])){

	$file1 = $_FILES['excelfile']['tmp_name'];
	$importfor = $_POST['importfor'];

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

		if ($nrColumns > 2) {
			//echo "  No. of Columns:" . $nrColumns . "  No. of Records:" . $nrRows;
			$smarty->assign('errmsg', "Error: Number of Columns more than 2<br>No. of Columns:" . $nrColumns . "&nbsp;&nbsp;&nbsp;No. of Records:" . $nrRows);
			break;
		}

		if ($nrRows > 10) {
			$smarty->assign('errmsg', "Error: Number of Records more than 10<br>No. of Columns:" . $nrColumns . "&nbsp;&nbsp;&nbsp;No. of Records:" . $nrRows);
			break;
		}

		for ($row = 2; $row <= $highestRow; ++ $row) {
			$col = 0;
			$rsac = $worksheet->getCellByColumnAndRow($col++, $row);
			$crdata1 = $worksheet->getCellByColumnAndRow($col++, $row);
/* */
			$exist_rsac=0;
			$exist_rsac+=$obj_partdt->count_partsdata_details(array('rsac'=>addslashes($rsac)));	
			//echo "================================================= ".$exist_rsac."<br>";

			if($exist_rsac==1) {
				if($obj_partdt->get_partsdata_details(array('rsac'=>addslashes($rsac)))){
					$row_partdt=$obj_partdt->db->sql_fetchrowset();
					$newpartid=$row_partdt[0]['id'];

					if (isset($crdata1) && $crdata1 != ''){
						//echo $custid . " / " . $rsac . " / " . $crdata1 . "<br>";
						$custcnt = pobe_update_customer_ref_data($newpartid,$custid,$crdata1);
						$artnum++;
					}

				}
			}
			$totnum++;
			set_time_limit(30);
		}
	}

	$smarty->assign('msg', "FROM ".$totnum." records, ".$artnum." records successfully imported.");
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
		$customercnt = pobe_customer_count();
		$smarty->assign('customercnt',$customercnt);

		$customerlist = pobe_customer_list();
		$smarty->assign('customerlist',$customerlist);
//--------------------------------------------------------------------------------
		$smarty->assign('parttypelist',pobe_part_type_list());

		$output=$smarty->fetch('import_customer_data.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}

$smarty->assign('mainpage',"manage_imports");
$smarty->assign('subpage',"import_customer_data");
$smarty->assign('ptype',"");

$smarty->display('main.tpl');	
?>