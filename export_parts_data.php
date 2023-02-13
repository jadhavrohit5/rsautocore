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

$my_qry  = "SELECT p.id as partid, p.rsac,";

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
if (isset($_REQUEST['a_grade']) && $_REQUEST['a_grade'] == "on") {
$heading[] = "A Grade";
$my_qry .= " p.a_grade,";
}
if (isset($_REQUEST['b_grade']) && $_REQUEST['b_grade'] == "on") {
$heading[] = "B Grade";
$my_qry .= " p.b_grade,";
}
if (isset($_REQUEST['location']) && $_REQUEST['location'] == "on") {
$heading[] = "Location";
$my_qry .= " p.location,";
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

/*
if (isset($_REQUEST['prtype']) && $_REQUEST['prtype'] == "on") {
$heading[] = "Type";
$my_qry .= " p.type,";
}
if (isset($_REQUEST['pulley_size']) && $_REQUEST['pulley_size'] == "on") {
$heading[] = "Pulley Size";
$my_qry .= " p.pulley_size,";
}
if (isset($_REQUEST['bar_pressure']) && $_REQUEST['bar_pressure'] == "on") {
$heading[] = "Bar Pressure";
$my_qry .= " p.bar_pressure,";
}
if (isset($_REQUEST['piston_mm']) && $_REQUEST['piston_mm'] == "on") {
$heading[] = "PISTON MM";
$my_qry .= " p.piston_mm,";
}
if (isset($_REQUEST['pad_gap']) && $_REQUEST['pad_gap'] == "on") {
$heading[] = "PAD GAP";
$my_qry .= " p.pad_gap,";
}
if (isset($_REQUEST['fr_opt']) && $_REQUEST['fr_opt'] == "on") {
$heading[] = "F/R";
$my_qry .= " p.f_r,";
}
if (isset($_REQUEST['cast']) && $_REQUEST['cast'] == "on") {
$heading[] = "Cast";
$my_qry .= " p.cast,";
}
if (isset($_REQUEST['purchase_price']) && $_REQUEST['purchase_price'] == "on") {
$heading[] = "Purchase Price";
$my_qry .= " p.purchase_price,";
}
if (isset($_REQUEST['length']) && $_REQUEST['length'] == "on") {
$heading[] = "Length";
$my_qry .= " p.length,";
}
if (isset($_REQUEST['turns']) && $_REQUEST['turns'] == "on") {
$heading[] = "Turns";
$my_qry .= " p.turns,";
}
if (isset($_REQUEST['trod_threadsize']) && $_REQUEST['trod_threadsize'] == "on") {
$heading[] = "T-Rod Thread Size";
$my_qry .= " p.trod_threadsize,";
}
if (isset($_REQUEST['pinion_length']) && $_REQUEST['pinion_length'] == "on") {
$heading[] = "Pinion Length";
$my_qry .= " p.pinion_length,";
}
if (isset($_REQUEST['pinion_type']) && $_REQUEST['pinion_type'] == "on") {
$heading[] = "Pinion Type";
$my_qry .= " p.pinion_type,";
}
if (isset($_REQUEST['pulley_grooves']) && $_REQUEST['pulley_grooves'] == "on") {
$heading[] = "Pulley Grooves";
$my_qry .= " p.pulley_grooves,";
}
if (isset($_REQUEST['pulley_type']) && $_REQUEST['pulley_type'] == "on") {
$heading[] = "Pulley Type";
$my_qry .= " p.pulley_type,";
}
if (isset($_REQUEST['plug_pins']) && $_REQUEST['plug_pins'] == "on") {
$heading[] = "Plug Pins";
$my_qry .= " p.plug_pins,";
}
if (isset($_REQUEST['weight']) && $_REQUEST['weight'] == "on") {
$heading[] = "Weight";
$my_qry .= " p.weight,";
}
if (isset($_REQUEST['bolt_diameter']) && $_REQUEST['bolt_diameter'] == "on") {
$heading[] = "Bolt Diameter";
$my_qry .= " p.bolt_diameter,";
}
if (isset($_REQUEST['pinhole_diameter']) && $_REQUEST['pinhole_diameter'] == "on") {
$heading[] = "Pin Hole Diameter";
$my_qry .= " p.pinhole_diameter,";
}
if (isset($_REQUEST['sensor']) && $_REQUEST['sensor'] == "on") {
$heading[] = "Sensor";
$my_qry .= " p.sensor,";
}
*/
$my_qry = rtrim($my_qry,',');

// -------------------------------------------
// added on 27-01-2022 
$attr_opt = "";
$resultAttArray = array();
$attrvalues = '';
if(isset($_POST['attr'])) {
    foreach($_POST['attr'] as $attr => $val){
        $resultAttArray[$attr] = $val;
//        $attrSQL = "SELECT attrname FROM tbl_rsa_attributes WHERE id = ". addslashes($val) ." ";
//        $resultat = mysqli_query($ndbconn, $attrSQL); // Run the query.
//        $rowat = mysqli_fetch_array($resultat);
//        $heading[] = stripslashes($rowat['attrname']);
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
//        $custSQL = "SELECT name FROM tbl_rsa_customers WHERE cid = ". addslashes($val) ." ";
//        $resultct = mysqli_query($ndbconn, $custSQL); // Run the query.
//        $rowct = mysqli_fetch_array($resultct);
//        $heading[] = stripslashes($rowct['name']);
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


$my_qry .= " FROM tbl_rsa_parts p ";
$my_qry .= "LEFT JOIN tbl_rsa_parts_oeref oe on oe.partid = p.id ";
$my_qry .= "WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = '" . addslashes($ptype) . "'  "; 
$my_qry .= "GROUP BY p.id ";
$my_qry .= "ORDER BY p.id ASC ";

//echo "-------------------------------------------------------------------------<br><pre>";
//print_r($heading);
//echo "</pre>-------------------------------------------------------------------------<br>";
//echo $my_qry;
//echo "<br>-------------------------------------------------------------------------<br>";

$pdata = array();
$j=0;

$result_set = mysqli_query($ndbconn, $my_qry);
while($row = mysqli_fetch_array($result_set)){
$resArr = array();
$cusArr = array();

//echo "-------------------------------------------------------------------------<br><pre>";
//print_r($row);
//echo "</pre>-------------------------------------------------------------------------<br>";
//echo count($row);

	for($i = 1; $i < count($row)/2; $i++) {
		$pdata[$j][] = stripslashes($row[$i]);
		//$i++;
	}

// -------------------------------------------
// added on 27-01-2022 
	if(isset($_POST['attr'])) {
        //foreach($_POST['attr'] as $attr => $val){
            //$resultAttArray[$attr] = $val;
//			$attrbtSQL = "SELECT attrdata FROM tbl_rsa_attributes_data WHERE attrid = ". addslashes($val) ." AND partid = ". addslashes($row['partid']) ." AND status = '1' LIMIT 0,1";
//			$resultatb = mysqli_query($ndbconn, $attrbtSQL); // Run the query.
//			$rowatb = mysqli_fetch_array($resultatb);
//			$pdata[$j][] = (is_array($rowatb) && count($rowatb) > 0) ? stripslashes($rowatb['attrdata']) : '';
            //echo $attr .':'.$val .':'.stripslashes($rowatb['attrdata'])."<br />";
		//}
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
        //foreach($_POST['cust'] as $cust => $val){
            //$cusAttArray[$cust] = $val;
			//$custcrSQL = "SELECT crdata FROM tbl_rsa_parts_customerref WHERE custid = ". addslashes($val) ." AND partid = ". addslashes($row['partid']) ." AND refnum = 1 AND status = '1' LIMIT 0,1";
//			$resultcr = mysqli_query($ndbconn, $custcrSQL); // Run the query.
//			$rowcr = mysqli_fetch_array($resultcr);
//			$pdata[$j][] = (is_array($rowcr) && count($rowcr) > 0) ? stripslashes($rowcr['crdata']) : '';
            //echo $cust .':'.$val .':'.stripslashes($rowcr['crdata'])."<br />";
		//}
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