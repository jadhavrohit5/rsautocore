<?php
ob_start();
// Display error - if there is 
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
ini_set('max_execution_time', 0);
//---------------------------------
define('DB_HOST','localhost');
define('DB_NAME','MNqD8JNM');
define('DB_USER','8xG4Wv4C');
define('DB_PASS','SrhqY02eGwE0hKEi');
//define('DB_USER','root');
//define('DB_PASS','password');
//---------------------------------
// Create connection
$ndbconn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$ndbconn) {
    die("Connection failed: " . mysqli_connect_error());
} 
//---------------------------------

require_once 'PHPExcel/IOFactory.php';

/*--------------------------------------------------------------------------------*/

$file1 = "Turbocharger_20220809.xlsx"; //  <<============

//-----------------------------------------------------------------------------
$artnum = 0;
$totnum = 0;
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

		echo "<br>-------------------------------------------------------------------------------------<br>";
		echo "No. of Columns: " . $highestColumnIndex . "<br>No. of Records: ". $nrRows;
		echo "<br>-------------------------------------------------------------------------------------<br>";

		//for ($row = 3999; $row <= 6000; ++ $row) {
		for ($row = 5999; $row <= $highestRow; ++ $row) {
			$col = 0;
			$rsac = $worksheet->getCellByColumnAndRow($col++, $row);
			$pprice = $worksheet->getCellByColumnAndRow($col++, $row);

			if((isset($rsac)) && ($rsac != "")) {

				$tcPartSQL = "SELECT id FROM tbl_rsa_parts WHERE rsac='" . addslashes($rsac) . "' AND part_type='14' AND status='1' AND is_deleted='0' ";
				echo $tcPartSQL . "<br>";
				$sqlTCqry = mysqli_query($ndbconn, $tcPartSQL); // Run the query
				$row_tc = mysqli_fetch_array($sqlTCqry);
				$partid = $row_tc['id']; 

				if((isset($pprice)) && ($pprice != "")) {

					$attrno = 4;     // purchaseprice
					$pcAttSQL = "SELECT count(*) as cnt FROM tbl_rsa_attributes_data WHERE attrid = '". addslashes($attrno) ."' AND partid = '". addslashes($partid) ."' AND status='1' ";
					//echo $pcAttSQL . "<br>";
					$sqlATTqry = mysqli_query($ndbconn, $pcAttSQL); // Run the query
					$row_att = mysqli_fetch_array($sqlATTqry);
	 
					if($row_att['cnt'] == 0) {
						$addSQLpc = "INSERT INTO tbl_rsa_attributes_data (attrid, partid, attrdata, postdate, status, last_updated) VALUES('".addslashes($attrno)."', '".addslashes($partid)."', '".addslashes($pprice)."', '".$dateposted."', '1', '".$dateposted."')";
						echo $addSQLpc."<br>";
						$resultAddPC = mysqli_query($ndbconn, $addSQLpc); // Run the query.
					} else {
						$updSQLpc = "UPDATE tbl_rsa_attributes_data SET attrdata = '".addslashes($pprice)."', last_updated = '". $dateposted ."' WHERE partid='" . addslashes($partid) . "' AND attrid='".addslashes($attrno)."' AND status='1' ";
						echo $updSQLpc . "<br>";
						$resultUpdPC = mysqli_query($ndbconn, $updSQLpc); // Run the query
					}

					$artnum++;
				}

			}
			$totnum++;
			set_time_limit(30);
		}
	}

	echo "FROM ".$totnum." records, ".$artnum." records imported.<br>";
///-------------------------------------------------------------------------------
} else {
  // TODO: show error message
	echo "Error: Wrong file format. Please upload valid file.<br>";
}
///-------------------------------------------------------------------------------

/*--------------------------------------------------------------------------------*/
die;
?>