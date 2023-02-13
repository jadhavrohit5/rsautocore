<?php
ob_start();
// Display error - if there is 
error_reporting(E_ALL);
ini_set('display_errors', 1);
//ini_set('max_execution_time', 0);
//---------------------------------
session_start();

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

/*--------------------------------------------------------------------------------*/

$schid = trim($_GET['schid']);	
$carid = trim($_GET['carid']);	
$regnum = trim($_GET['regno']);	

/*--------------------------------------------------------------------------------*/

$selectArt = "SELECT DISTINCT p.id, p.rsac, p.part_type, mp.articleno, mp.brandno ";
$selectArt .= " FROM tbl_rsa_parts p, tbl_rsa_app_matched_articles mp "; 
$selectArt .= " WHERE p.id = mp.partid AND mp.sch_id = '".addslashes($schid)."' AND mp.carId = '".addslashes($carid)."' "; 
$selectArt .= " AND p.status = '1' AND p.is_deleted = '0' "; 
$selectArt .= " ORDER BY p.part_type,p.id ASC";
//echo "=================================================<br><br>".$selectArt . "<BR>";

$sqlArt = mysqli_query($ndbconn, $selectArt); // Run the query.
$numArt = mysqli_num_rows($sqlArt);
//echo $numArt . "<br>";

/*--------------------------------------------------------------------------------*/

//echo '<br>Vehicle Reg. No.: '.$regnum.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Records: '.$numArt.'<br><br>';
echo "TecDoc KType No : <strong>" . $carid . "</strong><br>";
echo "Vehicle Reg. No. : <strong>" . $regnum . "</strong><br>";

	echo '<table border="1" cellspacing="0" cellpadding="2">
		<tr>
			<td width="250" align="center"><strong>Part Type</strong></td>
			<td width="150" align="center"><strong>TecDoc articleno</strong></td>
			<td width="150" align="center"><strong>TecDoc brandname</strong></td>
			<td width="150" align="center"><strong>RSA Ref No.</strong></td>
		</tr>';
	while ($rowArt = mysqli_fetch_array($sqlArt)){

		switch($rowArt['part_type']) {
			case 1:
				$part_type = "Steering Pumps";
				break;
			case 2:
				$part_type = "Brake Calipers";
				break;
			case 3:
				$part_type = "LHD Steering";
				break;
			case 4:
				$part_type = "LHD Steering";
				break;
			case 5:
				$part_type = "RHD Steering";
				break;
			case 6:
				$part_type = "RHD Steering";
				break;
			case 7:
				$part_type = "RHD Steering";
				break;
			case 8:
				$part_type = "LHD Steering";
				break;
			case 9:
				$part_type = "EGR Valves";
				break;
			case 10:
				$part_type = "Diesel Injectors";
				break;
			case 11:
				$part_type = "Diesel Pumps";
				break;
			case 13:
				$part_type = "Driveshafts";
				break;
		}	

		switch($rowArt['brandno']) {
			case 30:
				$part_type = "BOSCH";
				break;
			case 66:
				$brandname = "DENSO";
				break;
			case 83:
				$brandname = "CONTINENTAL/VDO";
				break;
			case 89:
				$brandname = "DELPHI";
				break;
			case 114:
				$brandname = "BUDWEG CALIPER";
				break;
			case 161:
				$brandname = "TRW";
				break;
			case 214:
				$brandname = "REMY";
				break;
			case 226:
				$brandname = "ELSTOCK";
				break;
			case 234:
				$brandname = "ERA";
				break;
			case 292:
				$brandname = "LIZARTE";
				break;
			case 293:
				$brandname = "LENCO";
				break;
			case 393:
				$brandname = "CEVAM";
				break;
			case 479:
				$brandname = "ALANKO";
				break;
			case 4607:
				$brandname = "SHAFTEC";
				break;
			case 4739:
				$brandname = "VEGE";
				break;
		}	

		echo '<tr>
				<td width="250"><strong>'. $part_type .'</strong></td>
				<td width="150">'. $rowArt['articleno'] .'</td>
				<td width="250">'. $brandname .'</td>
				<td width="150" align="center">'. $rowArt['rsac'] .'</td>';
		echo '</tr>';

	} 

echo '</table>';
echo '<br><br><br>';

/*
*/
//---------------------------------------------------------------------------------------------------------------
die;
?>