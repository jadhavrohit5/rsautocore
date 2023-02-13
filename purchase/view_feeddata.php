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
//print_r($_REQUEST);
/*--------------------------------------------------------------------------------*/

$schid = trim($_GET['schid']);	
$ktypno = trim($_GET['carid']);	
$regnum = trim($_GET['regno']);	

$ptanum = [100027, 100551, 706379, 100199, 102798, 102799, 102803];
$brndno = [30, 66, 83, 89, 114, 161, 214, 226, 234, 292, 293, 393, 479, 4607, 4739];

$stagenum = '4';
$dateposted = date("Y-m-d H:i:s");

/*--------------------------------------------------------------------------------*/
//	id	sch_id	catid	carId	groupNodeId	articleId	articleNo	artBrandName	brandNo	gnArticleId	gnArticleName	brandName	oeNumber

	$selectArt = "SELECT DISTINCT ta.groupNodeId, ta.articleNo, ta.artBrandName, ta.brandNo, ta.oeNumber, tg.part_type_opt FROM tbl_rsa_app_td_articles ta, tbl_rsa_app_techdoc_groups tg WHERE ta.groupNodeId = tg.grpNodeId AND ta.sch_id = '".addslashes($schid)."' AND ta.carId = '".addslashes($ktypno)."' AND tg.isReqrd = '1' ORDER BY ta.groupNodeId";

	$sqlArt = mysqli_query($ndbconn, $selectArt); // Run the query.
	$numArt = mysqli_num_rows($sqlArt);
	//echo $numArt . "<br>";
//echo '<br>Vehicle Reg. No.: '.$regnum.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Records: '.$numArt.'<br><br>';
echo "TecDoc KType No : <strong>" . $ktypno . "</strong><br>";
echo "Vehicle Reg. No. : <strong>" . $regnum . "</strong><br>";

	echo '<table border="1" cellspacing="0" cellpadding="2">
			<tr>
				<td width="100" align="center"><strong>groupNodeId</strong></td>
				<td width="150" align="center"><strong>articleNo</strong></td>
				<td width="150" align="center"><strong>brandName</strong></td>
				<!-- <td width="150" align="center"><strong>oeNumber</strong></td> -->
				<td width="250" align="center"><strong>RSA Part Type</strong></td>
			</tr>';

	while ($rowArt = mysqli_fetch_array($sqlArt)){
		$part_type = "";
		switch($rowArt['part_type_opt']) {
			case "1,3,4,5,6,7,8":
				$part_type = "LHD/RHD/Steering Pumps";
				break;
			case "2":
				$part_type = "Brake Calipers";
				break;
			case "9":
				$part_type = "EGR Valves";
				break;
			case "10":
				$part_type = "Diesel Injectors";
				break;
			case "11":
				$part_type = "Diesel Pumps";
				break;
			case "13":
				$part_type = "Driveshafts";
				break;
		}	

		if (in_array($rowArt['groupNodeId'], $ptanum) && in_array($rowArt['brandNo'], $brndno)) {
			echo '<tr>
					<td width="100" align="center">'. $rowArt['groupNodeId'] .'</td>
					<td width="150"><strong>'. $rowArt['articleNo'] .'</strong></td>
					<td width="150">'. $rowArt['artBrandName'] .'</td>
					<!-- <td width="150">&nbsp;</td> -->
					<td width="250">'. $part_type .'</td>';
			echo '</tr>';
		} 

		/*
		// COMMENTED on 29-11-2021 SINCE STORING OENUMBER NOT REQUIRED
		if (in_array($rowArt['groupNodeId'], $ptanum) && in_array($rowArt['brandNo'], $brndno)) {
			echo '<tr>
					<td width="100" align="center">'. $rowArt['groupNodeId'] .'</td>
					<td width="150"><strong>'. $rowArt['articleNo'] .'</strong></td>
					<td width="150">'. $rowArt['artBrandName'] .'</td>
					<td width="150">&nbsp;</td>
					<td width="250">'. $part_type .'</td>';
			echo '</tr>';
		} 
		if (in_array($rowArt['groupNodeId'], $ptoeno)) {
			echo '<tr>
					<td width="100" align="center">'. $rowArt['groupNodeId'] .'</td>
					<td width="150"><strong>'. $rowArt['articleNo'] .'</strong></td>
					<td width="150">'. $rowArt['artBrandName'] .'</td>
					<td width="150"><strong>'. $rowArt['oeNumber'] .'</strong></td>
					<td width="250">'. $part_type .'</td>';
			echo '</tr>';
		} 
		*/
		
	}
echo '</table>';
echo '<br><br><br>';

/*
*/
//---------------------------------------------------------------------------------------------------------------
die;
?>