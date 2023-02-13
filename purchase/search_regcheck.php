<?php
ob_start();
//---------------------------------
session_start();
/*--------------------------------------------------------------------------------*/
include('includes/msconnect.php');
include('includes/sessions.php');
/*
// Display error - if there is 
error_reporting(E_ALL);
ini_set('display_errors', 1);
//ini_set('max_execution_time', 0);

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
*/
//---------------------------------

/*--------------------------------------------------------------------------------*/

$user_loggedin = isset($_SESSION['user_idd']) ? $_SESSION['user_idd'] : "";
$user_idd = pobe_session_register('user_idd', '');
$adminusr = pobe_session_register('adminusr', '');
$admintpy = pobe_session_register('admintpy', '');
$useracntn = pobe_session_register('useracnt', '');
$global_loggedin = pobe_session_register('global_loggedin', '');
$vendorid = pobe_session_register('vendorid', '');
$usrtoken = pobe_session_register('usrtoken', '');

//$wuserid=base64_decode($user_idd);
$wuserid=base64_decode($_SESSION['user_idd']);
/*--------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------*/
$searchid = base64_decode($_GET['id']);	
$regnumber = strtoupper(base64_decode($_GET['regno']));	
$stagenum = '1';
/*--------------------------------------------------------------------------------*/

$ct_url = "https://www.cartell.ie/secure/xml/findvehicle";

$ct_input_xml = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
<soap:Body>
<FindByRegistration>
<registration>'.$regnumber.'</registration>
<servicename>XML_Cartell_RSAutoCare</servicename>
<reference>RS Automotive Core</reference>
</FindByRegistration>
</soap:Body>
</soap:Envelope>';
/*
//echo $ct_input_xml;
*/
/*--------------------------------------------------------------------------------*/

$headerscrd = array(
    "Content-type: text/xml",
	"APIKEY: 2BeBXg6GTdZTDjj61eBFEZGGgWDCBBxMqC2tGQzC54C23X2qV2Hx",
    "Content-length: " . strlen($ct_input_xml),
    "Connection: close"
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $ct_url);
curl_setopt($ch, CURLOPT_USERPWD, 'XMLRSAC:XMLpW230920@123');
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $ct_input_xml);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headerscrd);
$ct_output_xml = curl_exec($ch);
/* */
//echo $ct_output_xml."<br>";

$ct_data = new DOMDocument();
$ct_data->loadXML($ct_output_xml);

$ct_xml = $ct_data->saveXML($ct_data->documentElement);
$vhxml = simplexml_load_string($ct_xml);
//echo $vhxml;

if(isset($vhxml->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->Fault->children()->faultcode)){  
	header('Location: search_bynum.php?msg='.base64_encode("invalid"));
	die;
} 

$vhdata = $vhxml->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->FindByRegistration->children()->Vehicle;

$ct_RegNo = trim($vhdata->children()->Registration);
$ct_Make = trim($vhdata->children()->Make);
$ct_Model = trim($vhdata->children()->Model);
$ct_Desc = trim($vhdata->children()->Description);
$ct_BType = trim($vhdata->children()->BodyType);
$ct_FType = trim($vhdata->children()->FuelType);
$ct_EngNum = trim($vhdata->children()->EngineNumber);
$ct_EngCap = trim($vhdata->children()->EngineCapacity);
$ct_ChasNum = trim($vhdata->children()->ChassisNumber);
$ct_KTypNo = trim($vhdata->children()->TecDoc_KTyp_No);
$ct_EngCode = trim($vhdata->children()->TecDoc_Engine_Code);
$ct_Transms = trim($vhdata->children()->Transmission);
$ct_Power = trim($vhdata->children()->Power);
$ct_RegDate = trim($vhdata->children()->FirstRegistrationDate);

//---------------------------------------------------------------------------------------------------------------
$dateposted = date("Y-m-d H:i:s");

//---------------------------------
if (strpos($ct_KTypNo, ';') !== false) {
	$kno = explode(";", $ct_KTypNo);
    $ktypno = $kno[0];
} else {
	$ktypno = trim($ct_KTypNo);	
}
//---------------------------------

$addSQLrs = "INSERT INTO tbl_rsa_app_regno_search (userid, searchid, regno, carid, vehicleMake, FirstRegDate, postdate, status, ctKTypNo) VALUES('".$wuserid."', '".$searchid."', '".addslashes($regnumber)."', '".addslashes($ktypno)."','".addslashes($ct_Make)."', '".addslashes($ct_RegDate)."', '".$dateposted."', '1', '".addslashes($ct_KTypNo)."')";
$resultrs = mysqli_query($ndbconn, $addSQLrs); // Run the query.
$schid = mysqli_insert_id($ndbconn);

//---------------------------------------------------------------------------------------------------------------

//echo 'Location: search_articles.php?id='.$schid.'&ktypno='.$ktypno;
header('Location: search_articles.php?id='.$schid.'&ktypno='.$ktypno);
die;
?>