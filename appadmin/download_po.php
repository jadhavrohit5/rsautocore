<?php
ob_start();
ini_set('max_execution_time', 0);
include('includes/inc_user.php');
include('classes/partspurchased.php');
require 'classes/PHPExcel.php';
include('queries.php');

$obj_podata = new partspurchased;

$objPHPExcel = new PHPExcel();

$poid = isset($_REQUEST['id']) ? base64_decode($_REQUEST['id']) : "";

$ponum = pobe_po_number($poid);
//------------------------------------------------------

/*
// commented following function to show heading unformatted
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
*/
//------------------------------------------------------
//PO#	Supplier	RS Reference	Quantity	Price	Date

$heading = array();
$heading[] = "PO#";
$heading[] = "Supplier";
$heading[] = "RS Reference";
$heading[] = "Quantity";
$heading[] = "Price";
$heading[] = "Date";
//print_r($heading);

////////////////////////////////////////////////////////////////////////////////
$objPHPExcel = new \PHPExcel(); 
$sheet = $objPHPExcel->getActiveSheet();
$sheet->setTitle('PO List'); 
$rowNumber_h = 1; 
$col_h = 'A'; 
foreach($heading as $head) {
	//echo($col_h.", ".$rowNumber_h.", ".$head."<br>"); 
	// commented following line to show heading unformatted
	//cellColor($objPHPExcel, $col_h.$rowNumber_h, 'CCCCCC');
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

if($count==0) { 
	echo "no records found";		
} else {

$podata = $obj_podata->get_partspurchased_export_po_data($poid);
//echo "-------------------------------------------------------------------------<br><pre>";
//print_r($podata);
//echo "</pre>-------------------------------------------------------------------------<br>";

$rowNumber = 2; 

////////////////////////////////////////////////////////////////////////////////
for($i = 0; $i < count($podata); $i++) {
	$col = 'A'; 
	$row = $podata[$i];
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
//exit;
//-----------------------------------------------------------------------------
ob_end_clean();
header('Content-Type: application/vnd.ms-excel'); 
header('Content-Disposition: attachment;filename="' . $ponum . '.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
//-----------------------------------------------------------------------------

$obj_podata->con_close();
exit(); 
?>