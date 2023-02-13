<?php
ob_start();
//---------------------------------
session_start();
/*--------------------------------------------------------------------------------*/
include('includes/msconnect.php');
include('includes/sessions.php');
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

//---------------------------------
// Constant values:
define ('TECDOC_MANDATOR', 22889);
define ('SERVICE_URL', 'https://webservice.tecalliance.services/pegasus-3-0/services/TecdocToCatDLB.jsonEndpoint?api_key=2BeBXg6GTdZTDjj61eBFEZGGgWDCBBxMqC2tGQzC54C23X2qV2Hx');
//---------------------------------

/*--------------------------------------------------------------------------------*/
$schid = trim($_GET['id']);	
$carid = trim($_GET['ktypno']);	
$ktypno = trim($_GET['ktypno']);	
//---------------------------------
/*
if (strpos($ktypno, ';') !== false) {
	$kno = explode(";", $carid);
    $ktypno = $kno[0];
} else {
	$ktypno = trim($_GET['ktypno']);	
}
*/
//---------------------------------

$ptypes = array();
//$ptypes = [100027, 100551, 102798, 102799, 706379, 100199, 102803];
$ptypes = [100027, 100551, 102798, 102799, 100199, 102803, 706379, 100354, 100350, 100359, 706373];  //updated on 17-09-2022 

$stagenum = '2';
$dateposted = date("Y-m-d H:i:s");

/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/
// Setup HTTP context with communication header:
function getContext( $data, $optional_headers ) {
	$params = array(
				'http' => array(
				'method' => 'POST',
				'content' => $data
			  )
	);

	if ( $optional_headers !== null ) {
	  $params[ 'http' ][ 'header' ] = $optional_headers;
	}

	return stream_context_create( $params );
}

// Create request with function name and its parameters:
function createRequest( $functionName, $requestParams ) {
	return array(
	  $functionName => $requestParams
	);
}

// Serializing request, calling JSON endpoint & deserializing response:
function callJSON( $function, $request, $optional_headers = null ) {        
	$jsonRequest = json_encode( $request );

	$ctx = getContext( $jsonRequest, $optional_headers );
	$fp = @fopen( SERVICE_URL, 'rb', false, $ctx );
	if ( !$fp ) {
	  throw new Exception( "Problem with $url, $php_errormsg" );
	}

	$jsonResponse = @stream_get_contents($fp);
	if ( $jsonResponse === false ) {
	  throw new Exception( "Problem reading data from $url, $php_errormsg" );
	}

	$response = json_decode($jsonResponse, true);
	return $response;
}

/*--------------------------------------------------------------------------------*/
$function2 = 'getVehicleByIds4';
$params2 = array(
		  'articleCountry' => 'gb',
		  'carIds' => array(                    
			'array' => array( $ktypno )
		  ),
		  'countriesCarSelection' => 'gb',
		  'country' => 'gb',
		  'lang' => 'en',
		  'provider' => TECDOC_MANDATOR
		);
$request2 = createRequest( $function2, $params2 );
$result2 = callJSON( $function2, $request2 );
//print_r($result2);

foreach($result2 as $key2 => $output2) {
    if($key2 === 'data') {

		$vd_carId = $output2['array']['0']['vehicleDetails']['carId'];
		$vd_ccmTech = $output2['array']['0']['vehicleDetails']['ccmTech'];
		$vd_constructionType = $output2['array']['0']['vehicleDetails']['constructionType'];
		$vd_fuelType = $output2['array']['0']['vehicleDetails']['fuelType'];
		$vd_manuId = $output2['array']['0']['vehicleDetails']['manuId'];
		$vd_manuName = $output2['array']['0']['vehicleDetails']['manuName'];
		$vd_modId = $output2['array']['0']['vehicleDetails']['modId'];
		$vd_modelName = $output2['array']['0']['vehicleDetails']['modelName'];
		$vd_motorType = $output2['array']['0']['vehicleDetails']['motorType'];
		$vd_yearOfConstrFrom = $output2['array']['0']['vehicleDetails']['yearOfConstrFrom'];

		if (isset($output2['array']['0']['vehicleDetails']['yearOfConstrTo'])){
		$vd_yearOfConstrTo = $output2['array']['0']['vehicleDetails']['yearOfConstrTo'];
		} else {
		$vd_yearOfConstrTo = "";
		}

		$vd_rmiTypeId = $output2['array']['0']['vehicleDetails']['rmiTypeId'];
		$vehicleDocId = $output2['array']['0']['vehicleDocId'];

 		///$addSQLvd = "INSERT INTO tbl_rsa_app_td_vehicle_data (sch_id, KTypNo, carId, ccmTech, constructionType, yearOfConstrTo, fuelType, manuId, manuName, modId, modelName, motorType, yearOfConstrFrom, rmiTypeId, vehicleDocId, postdate, status) VALUES('".$schid."', '".addslashes($ktypno)."', '".addslashes($vd_carId)."', '".addslashes($vd_ccmTech)."', '".addslashes($vd_constructionType)."', '".addslashes($vd_yearOfConstrTo)."', '".addslashes($vd_fuelType)."', '".addslashes($vd_manuId)."', '".addslashes($vd_manuName)."', '".addslashes($vd_modId)."', '".addslashes($vd_modelName)."', '".addslashes($vd_motorType)."', '".addslashes($vd_yearOfConstrFrom)."', '".addslashes($vd_rmiTypeId)."', '".addslashes($vehicleDocId)."', '".$dateposted."', '1')";
		///$resultvd = mysqli_query($ndbconn, $addSQLvd); // Run the query.

		$updSQLvd = "UPDATE tbl_rsa_app_regno_search SET ccmTech = '".addslashes($vd_ccmTech)."', consType = '".addslashes($vd_constructionType)."', fuelType = '".addslashes($vd_fuelType)."', manuName = '".addslashes($vd_manuName)."', modelName = '".addslashes($vd_modelName)."', motorType = '".addslashes($vd_motorType)."',  yearConsFrom = '".addslashes($vd_yearOfConstrFrom)."',  yearConsTo = '".addslashes($vd_yearOfConstrTo)."' WHERE id = '".addslashes($schid)."' AND  carid = '".addslashes($ktypno)."' ";
		//echo $updSQLvd . "<br>";
		$resultupvd = mysqli_query($ndbconn, $updSQLvd); // Run the query
 
   }
}
/*--------------------------------------------------------------------------------*/

foreach($ptypes as $val) {

	// TestRequestParameters:
	$function = 'getArticleIdsWithState';
	$params = array(
			  'articleCountry' => 'gb',
			  'assemblyGroupNodeId' => $val,
			  'lang' => 'en',
			  'linkingTargetId' => $ktypno,
			  'linkingTargetType' => 'P',
			  'provider' => TECDOC_MANDATOR
			);
	$request = createRequest( $function, $params );
	$result = callJSON( $function, $request );

/*--------------------------------------------------------------------------------*/

	if (!empty($result['data'])){

		foreach($result['data']['array'] as $outputt) {

			$addSQLad = "INSERT INTO tbl_rsa_app_td_articles (sch_id, carId, groupNodeId, articleId, articleNo, artBrandName, brandNo, postdate, status) VALUES('".addslashes($schid)."', '".addslashes($ktypno)."', '".addslashes($val)."', '".addslashes($outputt['articleId'])."', '".addslashes($outputt['articleNo'])."', '".addslashes($outputt['brandName'])."', '".addslashes($outputt['brandNo'])."', '".$dateposted."', '1')";
			//echo $addSQLad . "<br>";
			$resultad = mysqli_query($ndbconn, $addSQLad); // Run the query.

		}
	}
}

//---------------------------------------------------------------------------------------------------------------

//echo 'Location: view_vdata.php?id='.$schid.'&ktypno='.$ktypno;
header('Location: view_vdata.php?id='.$schid.'&ktypno='.$ktypno);
die;
?>