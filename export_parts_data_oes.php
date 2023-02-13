<?php
ob_start();
// Display error - if there is 
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
ini_set('max_execution_time', 0);
//---------------------------------
include('includes/rsconnect.php');
require 'classes/PHPExcel.php';
//---------------------------------

$objPHPExcel = new PHPExcel();

$ptype = trim($_REQUEST['ptype']);

//-----------------------------------------------------------------------------
function cellColor($objPHPExcel,$cells,$color){

	$objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
		'type' => \PHPExcel_Style_Fill::FILL_SOLID,
		'startcolor' => array(
			 'rgb' => $color
		)
	));
	$objPHPExcel->getActiveSheet()->getStyle($cells)->applyFromArray(array(
		'borders' => array(
			'allborders' => array(
				'style' => \PHPExcel_Style_Border::BORDER_THIN,
				'color' => array('rgb' => '000000')
			)
		)
	));
		
	$objPHPExcel->getActiveSheet()->getStyle($cells)->applyFromArray(array(
		'font'  => array(
			'bold'  => true,
			'color' => array('rgb' => '000000'),
			'size'  => 12,
			'name'  => 'Verdana'
	)));
}
	
//-----------------------------------------------------------------------------
/*--------------------------------------------------------------------------------*/
//echo "<br>";
//print_r($_REQUEST);
//echo "<br>";
/*--------------------------------------------------------------------------------*/

$ptypename = $_POST['parttype'];
$customercnt = $_POST['customercnt'];

$heading = array();
$heading[] = "RSAC";

$my_qry  = "SELECT p.id as partid, p.rsac, p.group_rsac,";  

// -------------------------------------------
if (isset($_REQUEST['oestocks']) && $_REQUEST['oestocks'] == "on") {
$heading[] = "OE 1#";
$heading[] = "OE 2#";
$heading[] = "OEM 1#";
$heading[] = "OEM 2#";
$heading[] = "QTY";
$heading[] = "Location";
$my_qry .= "c.oe_one, c.oe_two, c.oemone, c.oemtwo, c.qty_data, c.location,"; 
}
// -------------------------------------------

if (isset($_REQUEST['manufacturer']) && $_REQUEST['manufacturer'] == "on") {
$heading[] = "Manufacturer";
$my_qry .= " p.manufacturer,";
}
if (isset($_REQUEST['make']) && $_REQUEST['make'] == "on") {
$heading[] = "Make";
$my_qry .= " p.make,";
}
if (isset($_REQUEST['model']) && $_REQUEST['model'] == "on") {
$heading[] = "Model";
$my_qry .= " p.model,";
}
if (isset($_REQUEST['years']) && $_REQUEST['years'] == "on") {
$heading[] = "Years";
$my_qry .= " p.years,";
}
if (isset($_REQUEST['target_stock']) && $_REQUEST['target_stock'] == "on") {
$heading[] = "Target Stock";
$my_qry .= " p.target_stock,";
}
if (isset($_REQUEST['sell_price']) && $_REQUEST['sell_price'] == "on") {
$heading[] = "Sell Price";
$my_qry .= " p.sell_price,";
}

if (isset($_REQUEST['oeoemopt']) && $_REQUEST['oeoemopt'] == "on") {
$heading[] = "OE Number";
$heading[] = "OEM Number";
$my_qry .= " oe.oe_number, oe.oem_number,";
}
if (isset($_REQUEST['notes']) && $_REQUEST['notes'] == "on") {
$heading[] = "Notes";
$my_qry .= " p.notes,";
}
//-----------------------------------------------------------------------------

$my_qry = rtrim($my_qry,',');

// -------------------------------------------
$attr_opt = "";
$resultAttArray = array();
$attrvalues = '';
if(isset($_POST['attr'])) {
    foreach($_POST['attr'] as $attr => $val){
        $resultAttArray[$attr] = $val;
    }
    $attrvalues =  @implode(',',  $resultAttArray);
    $attrSQL = "SELECT attrname FROM tbl_rsa_attributes WHERE id IN (". addslashes($attrvalues) .") ";
    $resultat = mysqli_query($ndbconn, $attrSQL); // Run the query.
    $rowat = mysqli_fetch_all($resultat, MYSQLI_ASSOC);
    if(is_array($rowat) && count($rowat) > 0) {
        foreach($rowat as $rowat) {
            $heading[] = stripslashes($rowat['attrname']);
        }
    }
}
// -------------------------------------------

$cust_opt = "";

$cusAttArray = array();
$custValues = '';
if(isset($_POST['cust'])) {
    foreach($_POST['cust'] as $cust => $val){
        $cusAttArray[$cust] = $val;
    }
    $custValues = @implode(',', $cusAttArray);
    $custSQL = "SELECT name FROM tbl_rsa_customers WHERE cid IN (". addslashes($custValues) .") ";
    $resultct = mysqli_query($ndbconn, $custSQL); // Run the query.
    $rowct = mysqli_fetch_all($resultct, MYSQLI_ASSOC);
    if(is_array($rowct) && count($rowct) > 0) {
        foreach($rowct as $rowct){
            $heading[] = stripslashes($rowct['name']);
        }
    }
}

////////////////////////////////////////////////////////////////////////////////
$rowNumber_h = 1; 

$objPHPExcel = new \PHPExcel(); 
$sheet = $objPHPExcel->getActiveSheet();
$sheet->setTitle($ptypename.' List'); 

$col_h = 'A'; 
foreach($heading as $head) {
	cellColor($objPHPExcel, $col_h.$rowNumber_h, 'CCCCCC');
	$sheet->setCellValue($col_h.$rowNumber_h,$head); 
	$sheet->getColumnDimension($col_h)->setAutoSize(true);
	$col_h++; 
} 
////////////////////////////////////////////////////////////////////////////////

if (isset($_REQUEST['oestocks']) && $_REQUEST['oestocks'] == "on") {
$my_qry .= " FROM tbl_rsa_parts p ";
$my_qry .= "INNER JOIN tbl_rsa_oe_stock_data c ON p.id = c.partid ";
$my_qry .= "INNER JOIN (SELECT DISTINCT partid FROM tbl_rsa_oe_stock_data WHERE ptype = '" . addslashes($ptype) . "' AND status = '1' AND is_deleted = '0') b ON c.partid = b.partid ";
$my_qry .= "WHERE p.status = '1' AND p.is_deleted = '0' AND p.is_main = '1' AND p.part_type = '" . addslashes($ptype) . "' AND c.status = '1' AND c.is_deleted = '0' ORDER BY p.id ";
} else {
$my_qry .= " FROM tbl_rsa_parts p ";
if (isset($_REQUEST['oeoemopt']) && $_REQUEST['oeoemopt'] == "on") {
$my_qry .= "LEFT JOIN tbl_rsa_parts_oeref oe on oe.partid = p.id ";
}
$my_qry .= "WHERE p.status = '1' AND p.is_deleted = '0' AND p.is_main = '1' AND p.part_type = '" . addslashes($ptype) . "'  "; 
$my_qry .= "GROUP BY p.id ";
$my_qry .= "ORDER BY p.id ASC ";
}
//echo $my_qry . "<br>";

//echo "-------------------------------------------------------------------------<br><pre>";
//print_r($heading);
//echo "</pre>-------------------------------------------------------------------------<br>";
//echo $my_qry;
//echo "<br>-------------------------------------------------------------------------<br>";

$pdata = array();
$j=0;
$sp_ptypes = [14, 15, 16, 17];

$result_set = mysqli_query($ndbconn, $my_qry);
while($row = mysqli_fetch_array($result_set)){
$resArr = array();
$cusArr = array();

//echo "-------------------------------------------------------------------------<br><pre>";
//print_r($row);
//echo "</pre>-------------------------------------------------------------------------<br>";
//echo count($row);
	if (in_array($ptype, $sp_ptypes)) {
		$k = 2;
		$pdata[$j][] = stripslashes($row[$k]);
	} else {
		$k = 1;
		$pdata[$j][] = stripslashes($row[$k]);
	}
 
	for($i = 3; $i < count($row)/2; $i++) {
		$pdata[$j][] = stripslashes($row[$i]);
		//$i++;
	}

	// -------------------------------------------
	if(isset($_POST['attr'])) {
       $attrbtSQL = "SELECT attrid, attrdata FROM tbl_rsa_attributes_data WHERE attrid IN (". addslashes($attrvalues) .") AND partid = ". addslashes($row['partid']) ." AND status = '1';";
        $resultatb = mysqli_query($ndbconn, $attrbtSQL);
        $rowatb = mysqli_fetch_all($resultatb, MYSQLI_ASSOC);
        foreach ($rowatb as $rowatb)   {
            $resArr[$rowatb['attrid']] = (is_array($rowatb) && count($rowatb) > 0) ? stripslashes($rowatb['attrdata']) : '';
        }
            if(is_array($_POST['attr']) && count($_POST['attr']) > 0 ) {
                foreach($_POST['attr'] as $resultAttArray) {
                    if(array_key_exists($resultAttArray ,$resArr)) {
                        $pdata[$j][] = $resArr[$resultAttArray];
                    } else {
                        $pdata[$j][] = '';
                    }
                }
            }
    } 
	// -------------------------------------------
	if(isset($_POST['cust'])) {
        $custcrSQL = "SELECT custid, crdata FROM tbl_rsa_parts_customerref WHERE custid IN (". addslashes($custValues) .") AND partid = ". addslashes($row['partid']) ." AND refnum = 1 AND status = '1'";
        $resultcr = mysqli_query($ndbconn, $custcrSQL);
        $rowcr = mysqli_fetch_all($resultcr, MYSQLI_ASSOC);
        foreach ($rowcr as $rowcr)   {
            $cusArr[$rowcr['custid']] = (is_array($rowcr) && count($rowcr) > 0) ? stripslashes($rowcr['crdata']) : '';
        }
        if(is_array($_POST['cust']) && count($_POST['cust']) > 0){
            foreach($_POST['cust'] as $cusAttArray) {
                if(array_key_exists($cusAttArray ,$cusArr)) {
                    $pdata[$j][] = $cusArr[$cusAttArray];
                } else {
                    $pdata[$j][] = '';
                }
            }
        }
    }
	// -------------------------------------------


	$j++;
}

//echo "-------------------------------------------------------------------------<br><pre>";
//print_r($pdata);
//echo "</pre>-------------------------------------------------------------------------<br>";
//exit();

////////////////////////////////////////////////////////////////////////////////
$rowNumber = 2; 

for($i = 0; $i < count($pdata); $i++) {
	$col = 'A'; 
	$row = $pdata[$i];

	foreach($row as $prec) {
		$sheet->setCellValue($col.$rowNumber,$prec); 
		$col++; 
	}
	
	$rowNumber++; 
	//set_time_limit(30);
}
////////////////////////////////////////////////////////////////////////////////
$heading = null; 
$pdata = null;
//-----------------------------------------------------------------------------
ob_end_clean();
//header('Content-Type: application/vnd.ms-excel');
//header('Content-Disposition: attachment;filename="export_' . $ptypename . '.xlsx"');
//header('Cache-Control: max-age=0');
//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//$objWriter->save('php://output');
//set_time_limit(60);
//-----------------------------------------------------------------------------

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$excel_file_tmp = tempnam("/tmp", "tmp_export_" . $ptypename);
$objWriter->save($excel_file_tmp);

//zip
$zip_file_tmp = tempnam("/tmp", "tmp_zip_export_" . $ptypename);
$zip = new ZipArchive();
$zip->open($zip_file_tmp, ZipArchive::OVERWRITE);
$zip->addFile($excel_file_tmp, "export_" . $ptypename . ".xlsx");
$zip->close();

//download
$download_filename = "export_" . $ptypename . ".zip"; //'export_'.$ptypename.'.zip';
header('Content-Type: application/vnd.ms-excel');
header("Content-Type: application/zip");
header("Content-Transfer-Encoding: Binary");
header("Content-Length: " . filesize($zip_file_tmp));
header("Content-Disposition: attachment; filename=\"" . $download_filename . "\"");
header('Cache-Control: max-age=0');
readfile($zip_file_tmp);
unlink($excel_file_tmp);
unlink($zip_file_tmp);
$ndbconn->close();
exit(); 
?>