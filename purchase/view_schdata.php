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

/*

https://rsautocoresystem.co.uk/purchase/view_vdata1.php?id=61&ktypno=22955
https://rsautocoresystem.co.uk/purchase/sch_matchdata1.php

https://rsautocoresystem.co.uk/purchase/view_feeddata.php?schid=61&carid=22955

https://rsautocoresystem.co.uk/purchase/view_schdata.php

2021-11-22 13:16:28   23   126554;126555;127518   FL18NVV   (STAGE: 1)
VEHICLE MAKE: FORD  FIRST REG DATE: 2018-03-30   FEED Count: 0  PART Count: 0

2021-11-23 10:40:36   78   31564   EK62YOW   (STAGE: 1)
VEHICLE MAKE: TOYOTA  FIRST REG DATE: 2012-11-06   FEED Count:   PART Count: 
*/

$ptanum = [100027, 100551, 706379, 100199];
$ptoeno = [102798, 102799, 102803];
$brndno = [114, 226, 214, 293, 292, 234, 4607, 161, 30];

/*--------------------------------------------------------------------------------*/
	$selectArt = "SELECT ars.id as id, ars.searchid, ars.regno, ars.carid as carid, ars.vehicleMake, ars.FirstRegDate, ars.stagenum, ars.postdate, ars.feedcnt, ars.partcnt, atv.KTypNo as KTypNo, atv.yearOfConstrFrom FROM tbl_rsa_app_regno_search ars, tbl_rsa_app_td_vehicle_data atv WHERE ars.id = atv.sch_id ORDER BY id DESC";

	$sqlArt = mysqli_query($ndbconn, $selectArt); // Run the query.
	$numArt = mysqli_num_rows($sqlArt);
	echo $numArt . "<br>";
echo '<br>=============================================<br><br>';
 	while ($rowArt = mysqli_fetch_array($sqlArt)){

		echo $rowArt['postdate'] . "&nbsp;&nbsp;SeaechID#:&nbsp;" . $rowArt['id'] . "&nbsp;&nbsp;Carid#:&nbsp;" . $rowArt['carid'] . "&nbsp;&nbsp;KTypNo#:&nbsp;" . $rowArt['KTypNo'] . "&nbsp;&nbsp;&nbsp;";
		echo "<strong>" . $rowArt['regno'] . "</strong>&nbsp;&nbsp;&nbsp;(STAGE:&nbsp;" . $rowArt['stagenum'] . ")<br>";
		echo "VEHICLE MAKE:&nbsp;" . $rowArt['vehicleMake'] . "&nbsp;&nbsp;FIRST REG DATE:&nbsp;" . $rowArt['FirstRegDate'] . "&nbsp;&nbsp;Year:&nbsp;" . $rowArt['yearOfConstrFrom'] . "&nbsp;&nbsp;&nbsp;";
		echo "FEED Count:&nbsp;" . $rowArt['feedcnt'] . "&nbsp;&nbsp;PART Count:&nbsp;" . $rowArt['partcnt'] . "<br>";
		
	}
echo '<br>=============================================<br><br>';
exit;
/*--------------------------------------------------------------------------------*/
/*
*/
//---------------------------------------------------------------------------------------------------------------
die;
?>