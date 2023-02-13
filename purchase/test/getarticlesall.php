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
$schid = 1;	
//$ktypno = 18897;	
$ktypno = isset($_GET['ktypno']) ? trim($_GET['ktypno']) : 18897;
/*--------------------------------------------------------------------------------*/

$ptypes = array();
$ptypes = [100027, 100551, 102798, 102799, 706379, 100199, 102803];
$artids = "";

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

echo "<br><strong>Select Vehicle by clicking CarID</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='https://rsautocoresystem.co.uk/purchase/test/getarticlesall.php?ktypno=18897'>18897</a>&nbsp;(SG 56 BVL)&nbsp;&nbsp;|&nbsp;&nbsp;<a href='https://rsautocoresystem.co.uk/purchase/test/getarticlesall.php?ktypno=128050'>128050</a>&nbsp;(BC 16 VUG)&nbsp;&nbsp;|&nbsp;&nbsp;<a href='https://rsautocoresystem.co.uk/purchase/test/getarticlesall.php?ktypno=29567'>29567</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='https://rsautocoresystem.co.uk/purchase/test/getarticlesall.php?ktypno=17703'>17703</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='https://rsautocoresystem.co.uk/purchase/test/getarticlesall.php?ktypno=6434'>6434</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='https://rsautocoresystem.co.uk/purchase/test/getarticlesall.php?ktypno=18302'>18302</a> (GF60CFX)&nbsp;&nbsp;|&nbsp;&nbsp;<a href='https://rsautocoresystem.co.uk/purchase/test/getarticlesall.php?ktypno=144315'>144315</a> (BG66XAZ)&nbsp;&nbsp;|&nbsp;&nbsp;<a href='https://rsautocoresystem.co.uk/purchase/test/getarticlesall.php?ktypno=105909'>105909</a> (OY15LFB)&nbsp;&nbsp;|&nbsp;&nbsp;<a href='https://rsautocoresystem.co.uk/purchase/test/getarticlesall.php?ktypno=22955'>22955</a> (AO58WHG)<br>";
echo "<br>TecDoc_KTyp_No (linkingTargetId): <strong>" . $ktypno . "</strong><br>";

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
echo '<br>ccmTech=  '.$output2['array']['0']['vehicleDetails']['ccmTech'];
echo '<br>constructionType=  '.$output2['array']['0']['vehicleDetails']['constructionType'];
echo '<br>fuelType=  '.$output2['array']['0']['vehicleDetails']['fuelType'];
echo '<br>manuName=  '.$output2['array']['0']['vehicleDetails']['manuName'];
echo '<br>modelName=  '.$output2['array']['0']['vehicleDetails']['modelName'];
echo '<br>motorType=  '.$output2['array']['0']['vehicleDetails']['motorType'];
echo '<br>yearOfConstrFrom=  '.$output2['array']['0']['vehicleDetails']['yearOfConstrFrom'];
echo '<br>';
    }
}


foreach($ptypes as $val) {
//echo "<br>assemblyGroupNodeId: <b>" . $val . "</b><br>";

// TestRequestParameters:
$function = 'getArticleIdsWithState';
$params = array(
		  'articleCountry' => 'gb',
		  'assemblyGroupNodeId' => $val,
		  'lang' => 'en',
		  'linkingTargetId' => $ktypno,
		  'linkingTargetType' => 'V',
		  'provider' => TECDOC_MANDATOR
		);

/*--------------------------------------------------------------------------------*/

$request = createRequest( $function, $params );

//echo "<h1>Calling function " . $function . ":</h1>";
//echo "<br><b>REQUEST:</b><br>";
//echo "<pre>";
//print_r( $request );

$result = callJSON( $function, $request );
	
//echo "<br><b>RESPONSE:</b><br>";
echo "<br>Articles for assemblyGroupNodeId: <strong>" . $val . "</strong><br><br>";
//echo "<pre>";
//print_r( $result );

/*
*/
/*--------------------------------------------------------------------------------*/
echo '<table border="1" cellspacing="0" cellpadding="2">
		<tr>
			<td width="150" align="center"><strong>articleId</strong></td>
			<td width="150" align="center"><strong>articleNo</strong></td>
			<td width="150" align="center"><strong>brandName</strong></td>
			<td width="150" align="center"><strong>brandNo</strong></td>
			<td width="150" align="center"><strong>genericArticleId</strong></td>
			<td width="250" align="center"><strong>genericArticleName</strong></td>
			<td width="150" align="center"><strong>brandName</strong></td>
			<td width="150" align="center"><strong>oeNumber</strong></td>
		</tr>';

if (!empty($result['data'])){
foreach($result['data']['array'] as $outputt) {

	$articleId = "";
	$articleId .= $outputt['articleId'] . ", ";

		$function_ag = 'getDirectArticlesByIds6';
		$params_ag = array(
		  'articleCountry' => 'gb',
		  'articleId' => array(                    
			'array' => array( $outputt['articleId'] )
		  ),
		  'info' => true,
		  'lang' => 'en',
		  'oeNumbers' => true,
		  'provider' => TECDOC_MANDATOR
		);
		$request_ag = createRequest( $function_ag, $params_ag );
		$result_ag = callJSON( $function_ag, $request_ag );

/*
			echo "<br><b>RESPONSE:</b><br>";
			echo "<pre>"; 
			print_r( $result_ag );
*/

		if (!empty($result_ag['data'])){
		foreach($result_ag['data']['array'] as $articles) {
			if (!empty($articles['oenNumbers'])){
				foreach($articles['oenNumbers']['array'] as $outputw) {
					echo '<tr>
							<td width="150" align="center">'. $outputt['articleId'] .'</td>
							<td width="150" align="center">'. $outputt['articleNo'] .'</td>
							<td width="150" align="center">'. $outputt['brandName'] .'</td>
							<td width="150" align="center">'. $outputt['brandNo'] .'</td>
							<td width="150" align="center">'. $outputt['genericArticleId'] .'</td>
							<td width="250">'. $outputt['genericArticleName'] . '</td>
							<td width="150"><strong>'. $outputw['brandName'] .'</strong></td>
							<td width="150"><strong>'. $outputw['oeNumber'] .'</strong></td>';
					echo '</tr>';
					$artids .= "'".$outputw['oeNumber']."',";
				}
			} else {
				echo '<tr>
						<td width="150" align="center">'. $outputt['articleId'] .'</td>
						<td width="150" align="center">'. $outputt['articleNo'] .'</td>
						<td width="150" align="center">'. $outputt['brandName'] .'</td>
						<td width="150" align="center">'. $outputt['brandNo'] .'</td>
						<td width="150" align="center">'. $outputt['genericArticleId'] .'</td>
						<td width="250">'. $outputt['genericArticleName'] . '</td>
						<td width="150"></td>
						<td width="150"></td>';
				echo '</tr>';
			}

		}
		}

/*
		foreach($result_ag['data']['array'] as $articles) {
			echo '<br>===========================';
			echo '<br>articleId=  '.$outputt['articleId'];
			echo '<br>ArticleName=  '.$outputt['genericArticleName'];
			//echo '<br>ArticleID=  '.$articles['directArticle']['articleId'];
			if (!empty($articles['oenNumbers'])){
			foreach($articles['oenNumbers']['array'] as $outputw) {
				echo '<br>-----------------------';
				echo '<br>blockNumber=  '.$outputw['blockNumber'];
				echo '<br>brandName=  '.$outputw['brandName'];
				echo '<br>oeNumber=  '.$outputw['oeNumber'];
				echo '<br>sortNumber=  '.$outputw['sortNumber'];
			}
			}

		}
*/

/*--------------------------------------------------------------------------------*/


}
}
echo '</table>';
}

//echo "<br><br>";
//echo "<strong>" . $ktypno . "</strong><br>";
//echo $artids;
//echo "<br><br>";

die;
/*

*/
/*--------------------------------------------------------------------------------*/
?>