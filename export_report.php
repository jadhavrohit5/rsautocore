<?php
ob_start();
ini_set('max_execution_time', 0);
include('includes/inc_user.php');
include('classes/partstock.php');
require 'classes/PHPExcel.php';
include('queries.php');

$obj_partstk = new partstock;

$objPHPExcel = new PHPExcel();

$ptype = isset($_REQUEST['type']) ? trim($_REQUEST['type']) : 8;
$ptypename = pobe_view_part_type($ptype);

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

$heading = array();
$heading[] = "RS Auto Reference Number";
$heading[] = "Accumulated Quantity Purchased in Last Year";
$heading[] = "Accumulated Quantity Sold in Last Year";
$heading[] = "Average Purchase Price in Last Year";
$heading[] = "Average Sale Price in Last Year";
$heading[] = "Present Quantity Total";
///$heading[] = "RSA Ref No.";
///$heading[] = "Quantity Purchased";
///$heading[] = "Quantity Sold";
///$heading[] = "Average Purchase Price";
///$heading[] = "Average Sale Price";
///$heading[] = "Quantity Total";
//print_r($heading);

////////////////////////////////////////////////////////////////////////////////
$objPHPExcel = new \PHPExcel(); 
$sheet = $objPHPExcel->getActiveSheet();
///$objPHPExcel->getActiveSheet()->setTitle($ptypename.' List'); 
$sheet->setTitle($ptypename.' List'); 
$rowNumber_h = 1; 
$col_h = 'A'; 
foreach($heading as $head) {
	//echo($col_h.", ".$rowNumber_h.", ".$head."<br>"); 
	cellColor($objPHPExcel, $col_h.$rowNumber_h, 'CCCCCC');
	///$objPHPExcel->getActiveSheet()->setCellValue($col_h.$rowNumber_h,$head); 
	///$objPHPExcel->getActiveSheet()->getColumnDimension($col_h)->setAutoSize(true);
	$sheet->setCellValue($col_h.$rowNumber_h,$head); 
	$sheet->getColumnDimension($col_h)->setAutoSize(true);
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

///$partdata = $obj_partstk->get_partstock_export_data($ptype);
$partdata = $obj_partstk->get_partstock_export_data_avg($ptype);
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
		///$objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$pdata); 
		$sheet->setCellValue($col.$rowNumber,$pdata); 
		$col++; 
	}
	
	$rowNumber++; 
}
////////////////////////////////////////////////////////////////////////////////

}		

//-----------------------------------------------------------------------------
ob_end_clean();
header('Content-Type: application/vnd.ms-excel'); 
header('Content-Disposition: attachment;filename="export_report_' . $ptypename . '.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
//-----------------------------------------------------------------------------

$obj_partstk->con_close();
exit(); 
?>