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
//---------------------------------
// Create connection
$ndbconn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$ndbconn) {
    die("Connection failed: " . mysqli_connect_error());
} 

//---------------------------------
/*
$ptype = 14;
$ptype = 15;
$ptype = 16;
$ptype = 17;
*/
$ptype = 17;
$artnum = 0;
$dateupdtd = date("Y-m-d H:i:s");
//---------------------------------

$sqlqryparts = "SELECT id, rsac, location, a_grade, group_rsac, is_main FROM tbl_rsa_parts WHERE part_type = '". addslashes($ptype) ."' AND status = '1' AND is_deleted = '0' AND id NOT IN (SELECT partno FROM tbl_rsa_oe_stock_data) ORDER BY id ASC LIMIT 0,8000";
echo $sqlqryparts . "<br><br>";
$sqlqrycr = mysqli_query($ndbconn, $sqlqryparts); // Run the query

while ($rowqrycr = mysqli_fetch_array($sqlqrycr)){


	$sqlqrygpid = "SELECT id as pid FROM tbl_rsa_parts WHERE group_rsac = '". addslashes($rowqrycr['group_rsac']) ."' AND is_main = '1' ";
	//echo $sqlqrygpid . "<br>";
	$sqlqrygp = mysqli_query($ndbconn, $sqlqrygpid); // Run the query
	$rowqrygp = mysqli_fetch_array($sqlqrygp);

	if ($rowqrycr['is_main'] == '1'){
		$mainpid = $rowqrycr['id'];
	}else {
		$mainpid = $rowqrygp['pid'];
	}

	$sqlqryattr1 = "SELECT attrdata as itemoeone FROM tbl_rsa_attributes_data WHERE partid = ". addslashes($rowqrycr['id']) ." AND attrid = 50 ";
	//echo $sqlqryattr1 . "<br>";
	$sqlqryat1 = mysqli_query($ndbconn, $sqlqryattr1); // Run the query
	$rowqryat1 = mysqli_fetch_array($sqlqryat1);

	$sqlqryattr2 = "SELECT attrdata as itemoetwo FROM tbl_rsa_attributes_data WHERE partid = ". addslashes($rowqrycr['id']) ." AND attrid = 51 ";
	$sqlqryat2 = mysqli_query($ndbconn, $sqlqryattr2); // Run the query
	$rowqryat2 = mysqli_fetch_array($sqlqryat2);

	$sqlqryattr3 = "SELECT attrdata as itemoemone FROM tbl_rsa_attributes_data WHERE partid = ". addslashes($rowqrycr['id']) ." AND attrid = 52 ";
	$sqlqryat3 = mysqli_query($ndbconn, $sqlqryattr3); // Run the query
	$rowqryat3 = mysqli_fetch_array($sqlqryat3);

	$sqlqryattr4 = "SELECT attrdata as itemoemtwo FROM tbl_rsa_attributes_data WHERE partid = ". addslashes($rowqrycr['id']) ." AND attrid = 53 ";
	$sqlqryat4 = mysqli_query($ndbconn, $sqlqryattr4); // Run the query
	$rowqryat4 = mysqli_fetch_array($sqlqryat4);

	// id	partid	ptype	oe_one	oe_two	oemone	oemtwo	qty_data	location	postdate	status	last_updated	partno	groupno	
	$addqryattr = "INSERT INTO tbl_rsa_oe_stock_data (partid, ptype, oe_one, oe_two, oemone, oemtwo, qty_data, location, postdate, status, last_updated, partno, groupno) VALUES(". addslashes($mainpid) .", ". addslashes($ptype) .", '". addslashes($rowqryat1['itemoeone']) ."', '". addslashes($rowqryat2['itemoetwo']) ."', '". addslashes($rowqryat3['itemoemone']) ."', '". addslashes($rowqryat4['itemoemtwo']) ."', ". addslashes($rowqrycr['a_grade']) .", '". addslashes($rowqrycr['location']) ."', '". $dateupdtd ."', '1', '". $dateupdtd ."', ". addslashes($rowqrycr['id']) .", '". addslashes($rowqrycr['group_rsac']) ."')";
	//echo $addqryattr . "<br>";
	$resultupdt = mysqli_query($ndbconn, $addqryattr); // Run the query
	$artnum++;
	set_time_limit(30);
}

echo "<br>".$artnum." records added.<br>";
//---------------------------------------------------------------------------------
die;
/*
*/
/*--------------------------------------------------------------------------------*/
?>