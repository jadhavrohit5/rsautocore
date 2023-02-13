<?php
ob_start();
ini_set('max_execution_time', 0);
include('includes/inc_user.php');
include('classes/partsdata.php');
require 'classes/PHPExcel.php';
include('queries.php');

$obj_nwlnreq = new partsdata;

$objPHPExcel = new PHPExcel();

$ptype = isset($_REQUEST['type']) ? trim($_REQUEST['type']) : 8;
//$ptypename = pobe_view_part_type($ptype);

//------------------------------------------------------

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
	
//------------------------------------------------------
$ret_val3=$obj_nwlnreq->get_partsdata_parttype(array('id'=>addslashes($ptype)));
$row_reqcnt=$obj_nwlnreq->db->sql_fetchrowset();
$ptypename = stripslashes($row_reqcnt[0]['part_type']);
$part_opt = explode(",", $row_reqcnt[0]['part_opt']);
$cust_opt = explode(",", $row_reqcnt[0]['cust_opt']);
$partoptt = $row_reqcnt[0]['part_opt'];
$custoptt = $row_reqcnt[0]['cust_opt'];
$oeoemopt = $row_reqcnt[0]['oeoemopt'];

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

foreach ($part_opt as $item) {
	//echo $item."<br>";
	if ($item == "type") $heading[] = "Type";
	if ($item == "pulley_size") $heading[] = "Pulley Size";
	if ($item == "bar_pressure") $heading[] = "Bar Pressure";
	if ($item == "piston_mm") $heading[] = "PISTON MM";
	if ($item == "pad_gap") $heading[] = "PAD GAP";
	if ($item == "f_r") $heading[] = "F/R";
	if ($item == "cast") $heading[] = "Cast";
}
foreach ($cust_opt as $cust) {
	$heading[] = pobe_get_customer_ref($cust);
}

//print_r($heading);

////////////////////////////////////////////////////////////////////////////////
$objPHPExcel = new \PHPExcel(); 
$objPHPExcel->getActiveSheet()->setTitle($ptypename.' List'); 
$rowNumber_h = 1; 
$col_h = 'A'; 
foreach($heading as $head) {
	//echo($col_h.", ".$rowNumber_h.", ".$head."<br>"); 
	cellColor($objPHPExcel, $col_h.$rowNumber_h, 'CCCCCC');
	$objPHPExcel->getActiveSheet()->setCellValue($col_h.$rowNumber_h,$head); 
	$objPHPExcel->getActiveSheet()->getColumnDimension($col_h)->setAutoSize(true);
	$col_h++; 
} 
////////////////////////////////////////////////////////////////////////////////
//exit(); 


//-----------------------------------------------------------------------------
$count=1;

$total=$count;
$rowCount = 1;
$ptypename = pobe_view_part_type($ptype);

if($count==0) { 
	echo "no records found";		
} else {

$partdata = $obj_nwlnreq->get_partsdata_export_data($ptype, $partoptt, $custoptt, $oeoemopt);
//echo "-------------------------------------------------------------------------<br><pre>";
//print_r($partdata);
//echo "</pre>-------------------------------------------------------------------------<br>";

$rowNumber = 2; 

////////////////////////////////////////////////////////////////////////////////
for($i = 0; $i < count($partdata); $i++) {
	$col = 'A'; 
	$row = $partdata[$i];
	$id = 0;
	
	foreach($row as $pdata) {
		$objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$pdata); 
		$col++; 
	}
	
	$rowNumber++; 
}
////////////////////////////////////////////////////////////////////////////////

}		

//-----------------------------------------------------------------------------
ob_end_clean();
header('Content-Type: application/vnd.ms-excel'); 
header('Content-Disposition: attachment;filename="export_' . $ptypename . '.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
//-----------------------------------------------------------------------------

$obj_nwlnreq->con_close();
exit(); 
?>