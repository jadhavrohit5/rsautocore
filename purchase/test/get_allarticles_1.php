<?php
ob_start();
// Display error - if there is 
error_reporting(E_ALL);
ini_set('display_errors', 1);
//ini_set('max_execution_time', 0);
//---------------------------------

//---------------------------------
// Constant values:
define ('TECDOC_MANDATOR', 22889);
define ('SERVICE_URL', 'https://webservice.tecalliance.services/pegasus-3-0/services/TecdocToCatDLB.jsonEndpoint?api_key=2BeBXg6GTdZTDjj61eBFEZGGgWDCBBxMqC2tGQzC54C23X2qV2Hx');
//---------------------------------

/*--------------------------------------------------------------------------------*/
$ktypno = trim($_GET['carid']);	
$regnum = trim($_GET['regno']);	
/*--------------------------------------------------------------------------------*/

$ptypes = array();
$ptypes = [100027, 100551, 102798, 102799, 706379, 100199, 102803];

$brndno = array();
$brndno = [30, 66, 83, 89, 114, 161, 214, 226, 234, 292, 293, 393, 479, 4607, 4739];

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

echo "TecDoc KType No : <strong>" . $ktypno . "</strong><br>";
echo "Vehicle Reg. No. : <strong>" . $regnum . "</strong><br>";

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
	
foreach($result2 as $key2 => $output2) {
    if($key2 === 'data') {
echo '<br>carid=  '.$output2['array']['0']['carId'];
//echo '<br>ccmTech=  '.$output2['array']['0']['vehicleDetails']['ccmTech'];
echo '<br>constructionType=  '.$output2['array']['0']['vehicleDetails']['constructionType'];
echo '<br>fuelType=  '.$output2['array']['0']['vehicleDetails']['fuelType'];
echo '<br>manuName=  '.$output2['array']['0']['vehicleDetails']['manuName'];
echo '<br>modelName=  '.$output2['array']['0']['vehicleDetails']['modelName'];
echo '<br>motorType=  '.$output2['array']['0']['vehicleDetails']['motorType'];
//echo '<br>yearOfConstrFrom=  '.$output2['array']['0']['vehicleDetails']['yearOfConstrFrom'];
//echo '<br>yearOfConstrTo=  '.$output2['array']['0']['vehicleDetails']['yearOfConstrTo'];
echo '<br>';
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
	echo "<br>Articles for assemblyGroupNodeId: <strong>" . $val . "</strong><br><br>";
	//echo "<pre>";
	//print_r( $result );
	$part_type = "";
	switch($val) {
		case "100199":
			$part_type = "LHD/RHD/Steering Pumps";
			break;
		case "100027":
			$part_type = "Brake Calipers";
			break;
		case "100551":
			$part_type = "EGR Valves";
			break;
		case "102799":
			$part_type = "Diesel Injectors";
			break;
		case "102798":
			$part_type = "Diesel Pumps";
			break;
		case "102803":
			$part_type = "Diesel Pumps";
			break;
		case "706379":
			$part_type = "Driveshafts";
			break;
	}	

/*
*/
/*--------------------------------------------------------------------------------*/
	echo '<table border="1" cellspacing="0" cellpadding="2">
			<tr>
				<td width="150" align="center"><strong>articleId</strong></td>
				<td width="200" align="center"><strong>articleNo</strong></td>
				<td width="200" align="center"><strong>brandName</strong></td>
				<td width="150" align="center"><strong>brandNo</strong></td>
				<td width="250" align="center"><strong>RSA Part Type</strong></td>
			</tr>';

	if (!empty($result['data'])){

		foreach($result['data']['array'] as $outputt) {
			echo '<tr>
					<td width="150" align="center">'. $outputt['articleId'] .'</td>
					<td width="200">'. $outputt['articleNo'] .'</td>
					<td width="200">'. $outputt['brandName'] .'</td>
					<td width="150" align="center">'. $outputt['brandNo'] .'</td>
					<td width="250">'. $part_type .'</td>';
			echo '</tr>';
		}
	}

	echo '</table>';
/*--------------------------------------------------------------------------------*/

}

die;
/*

*/
/*--------------------------------------------------------------------------------*/
?>