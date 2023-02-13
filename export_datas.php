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

$ptype = isset($_REQUEST['type']) ? trim($_REQUEST['type']) : 8;

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
$pTypeSQL = "SELECT part_type,oeoemopt,part_opt,cust_opt,attr_opt FROM tbl_rsa_part_type WHERE status = '1' AND is_deleted = '0' AND id = '". addslashes($ptype) ."' ";
$resultpt = mysqli_query($ndbconn, $pTypeSQL); // Run the query.
$rowpt = mysqli_fetch_array($resultpt);
$ptypename = stripslashes($rowpt['part_type']);
$part_opt = explode(",", $rowpt['part_opt']);
$oeoemopt = $rowpt['oeoemopt'];

/*
$attr_opt = $rowpt['attr_opt'];    //  updated on 17-01-2023  
$cust_opt = $rowpt['cust_opt'];    //  updated on 17-01-2023 
*/
$attr_opt = explode(",", $rowpt['attr_opt']);
$attr_opt_no = implode(',', $attr_opt);

$cust_opt = explode(",", $rowpt['cust_opt']);
$cust_opt_no = implode(',', $cust_opt);

//-----------------------------------------------------------------------------
$heading = array();
$heading[] = "RSAC";
$heading[] = "Manufacturer";
$heading[] = "Make";
$heading[] = "Model";
$heading[] = "Years";
$heading[] = "A Grade";
$heading[] = "B Grade";
$heading[] = "Location";
$heading[] = "Target Stock";
$heading[] = "Sell Price";
if ($oeoemopt == '1') {
$heading[] = "OE Number";
$heading[] = "OEM Number";
}
$heading[] = "Notes";
/*
// -------------------------------------------
// added on 27-01-2022 
foreach ($attr_opt as $attr) {
	$attrSQL = "SELECT attrname FROM tbl_rsa_attributes WHERE id = ". addslashes($attr) ." ";
	$resultatt = mysqli_query($ndbconn, $attrSQL); // Run the query.
	$rowatt = mysqli_fetch_array($resultatt);
	$heading[] = stripslashes($rowatt['attrname']);
}
// -------------------------------------------

foreach ($cust_opt as $cust) {
	$custSQL = "SELECT name FROM tbl_rsa_customers WHERE cid = ". addslashes($cust) ." ";
	$resultct = mysqli_query($ndbconn, $custSQL); // Run the query.
	$rowct = mysqli_fetch_array($resultct);
	$heading[] = stripslashes($rowct['name']);
}
*/                                                

// -------------------------------------------
// updated on 17-01-2023  
$attrSQL = "SELECT attrname FROM tbl_rsa_attributes WHERE id IN (". $attr_opt_no .") ";
$resultatt = mysqli_query($ndbconn, $attrSQL); // Run the query.
$rowatt = mysqli_fetch_all($resultatt, MYSQLI_ASSOC);
foreach ($rowatt as $attr)   {
	$heading[] = stripslashes($attr['attrname']);
}

// updated on 17-01-2023  
$custSQL = "SELECT name FROM tbl_rsa_customers WHERE cid IN (". $cust_opt_no .") ";
$resultct = mysqli_query($ndbconn, $custSQL); // Run the query.
$rowct = mysqli_fetch_all($resultct, MYSQLI_ASSOC);
foreach ($rowct as $cust)   {
	$heading[] = stripslashes($cust['name']);
}
// -------------------------------------------

//echo "-------------------------------------------------------------------------<br><pre>";
//print_r($heading);
//echo "</pre>-------------------------------------------------------------------------<br>";
//exit(); 
//-----------------------------------------------------------------------------

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
$pdata = array();
$j=0;

$my_qry  = "SELECT p.id as partid, p.rsac, p.manufacturer, p.make, p.model, p.years, p.a_grade, p.b_grade, p.location, p.target_stock, p.sell_price, oe.oe_number, oe.oem_number, p.notes ";
$my_qry .= " FROM tbl_rsa_parts p ";
$my_qry .= "LEFT JOIN tbl_rsa_parts_oeref oe on oe.partid = p.id ";
$my_qry .= "WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = '" . addslashes($ptype) . "' AND oe.refnum = 1 "; 
$my_qry .= "GROUP BY p.id ";
$my_qry .= "ORDER BY p.id ASC ";

$result_set = mysqli_query($ndbconn, $my_qry);
while($row = mysqli_fetch_array($result_set)){

	$pdata[$j][] = stripslashes($row['rsac']);
	$pdata[$j][] = stripslashes($row['manufacturer']);
	$pdata[$j][] = stripslashes($row['make']);
	$pdata[$j][] = stripslashes($row['model']);
	$pdata[$j][] = stripslashes($row['years']);
	$pdata[$j][] = stripslashes($row['a_grade']);
	$pdata[$j][] = stripslashes($row['b_grade']);
	$pdata[$j][] = stripslashes($row['location']);
	$pdata[$j][] = stripslashes($row['target_stock']);
	$pdata[$j][] = stripslashes($row['sell_price']);
	if ($oeoemopt == '1') {
		$pdata[$j][] = stripslashes($row['oe_number']);
		$pdata[$j][] = stripslashes($row['oem_number']);
	}
	$pdata[$j][] = stripslashes($row['notes']);

/*
	// -------------------------------------------
	// added on 27-01-2022 
	foreach ($attr_opt as $attrno) {
		$attrbtSQL = "SELECT attrdata FROM tbl_rsa_attributes_data WHERE attrid = ". addslashes($attrno) ." AND partid = ". addslashes($row['partid']) ." AND status = '1' LIMIT 0,1";
		$resultatb = mysqli_query($ndbconn, $attrbtSQL); // Run the query.
		$rowatb = mysqli_fetch_array($resultatb);
		$pdata[$j][] = stripslashes($rowatb['attrdata']);
		set_time_limit(10);
	}

	foreach ($cust_opt as $custno) {
		$custcrSQL = "SELECT crdata FROM tbl_rsa_parts_customerref WHERE custid = ". addslashes($custno) ." AND partid = ". addslashes($row['partid']) ." AND refnum = 1 AND status = '1' LIMIT 0,1";
		$resultcr = mysqli_query($ndbconn, $custcrSQL); // Run the query.
		$rowcr = mysqli_fetch_array($resultcr);
		$pdata[$j][] = stripslashes($rowcr['crdata']);
		set_time_limit(10);
	}
*/
	// -------------------------------------------
	foreach ($attr_opt as $attrno) {
		$attrbtSQL = "SELECT attrdata FROM tbl_rsa_attributes_data WHERE attrid = ". addslashes($attrno) ." AND partid = ". addslashes($row['partid']) ." AND status = '1' LIMIT 0,1";
		$resultatb = mysqli_query($ndbconn, $attrbtSQL); // Run the query.
		$rowatb = mysqli_fetch_array($resultatb);
		$pdata[$j][] = stripslashes($rowatb['attrdata']);
		//set_time_limit(10);
	}
	// -------------------------------------------

	foreach ($cust_opt as $custno) {
		$custcrSQL = "SELECT crdata FROM tbl_rsa_parts_customerref WHERE custid = ". addslashes($custno) ." AND partid = ". addslashes($row['partid']) ." AND refnum = 1 AND status = '1' LIMIT 0,1";
		$resultcr = mysqli_query($ndbconn, $custcrSQL); // Run the query.
		$rowcr = mysqli_fetch_array($resultcr);
		$pdata[$j][] = stripslashes($rowcr['crdata']);
		//set_time_limit(10);
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
header('Content-Type: application/vnd.ms-excel'); 
header('Content-Disposition: attachment;filename="export_' . $ptypename . '.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
//-----------------------------------------------------------------------------
$ndbconn->close();
exit(); 
?>