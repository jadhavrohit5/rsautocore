<?php
ob_start();

$regnumber = strtoupper($_GET['regno']);	
$dateposted = date("Y-m-d H:i:s");

echo "Vehicle Reg. No. : <strong>" . $regnumber . "</strong><br>";
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
*/
echo $ct_input_xml."<br>";
echo "<br>";
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
//echo "<br>";

$ct_data = new DOMDocument();
$ct_data->loadXML($ct_output_xml);

$ct_xml = $ct_data->saveXML($ct_data->documentElement);
$vhxml = simplexml_load_string($ct_xml);
//echo $vhxml;

//if(isset($vhxml->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->Fault->children()->faultcode)){  
//	die;
//} 

$vhdata = $vhxml->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children()->FindByRegistration->children()->Vehicle;

echo '<br>Registration=  '.$vhdata->children()->Registration;
echo '<br>Make=  '.$vhdata->children()->Make;
echo '<br>Model=  '.$vhdata->children()->Model;
echo '<br>Description=  '.$vhdata->children()->Description;
echo '<br>BodyType=  '.$vhdata->children()->BodyType;
echo '<br>FuelType=  '.$vhdata->children()->FuelType;
echo '<br>EngineNumber=  '.$vhdata->children()->EngineNumber;
echo '<br>EngineCapacity=  '.$vhdata->children()->EngineCapacity;
echo '<br>ChassisNumber=  '.$vhdata->children()->ChassisNumber;
echo '<br>TecDoc_KTyp_No=  '.$vhdata->children()->TecDoc_KTyp_No;
echo '<br><strong>TecDoc_Engine_Code=  '.$vhdata->children()->TecDoc_Engine_Code;
echo '</strong><br>Transmission=  '.$vhdata->children()->Transmission;
echo '<br>Power=  '.$vhdata->children()->Power;
echo '<br>FirstRegistrationDate=  '.$vhdata->children()->FirstRegistrationDate;
echo "<br>";
//---------------------------------------------------------------------------------------------------------------

die;
?>