<?php
ob_start();
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
include('includes/inc_user.php');
include('classes/partspurchased.php');
include('queries.php');
/*--------------------------------------------------------------------------------*/
$wuserid=base64_decode($_SESSION['user_idd']);
$vendorid=$_SESSION['vendorid'];
/*--------------------------------------------------------------------------------*/
$obj_suplyd=new partspurchased;
/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/
$schid = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
$carid = isset($_REQUEST['carid']) ? $_REQUEST['carid'] : "";

/*--------------------------------------------------------------------------------*/

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'finalorder') {
/*
	$orderid = pobe_max_order_id() + 1;
	//$ponumber = "PO-M".$orderid;
	$ponumber = "PO-M".sprintf( "%06d", $orderid);
 */
	$ponumber = "PO-TEST-".$schid;
	//echo ">>1--<br>";
	$cnt_items = pobe_number_offered_items_td($vendorid,$wuserid,$schid);
	//echo ">>2--<br>";
	$ord_value = pobe_total_offered_value_td($vendorid,$wuserid,$schid);
	//echo ">>3--<br>";

	$dateposted = date("Y-m-d H:i:s");

	if ($cnt_items > 0) {
		/*
		//	poid	userid	po_num	total_items	total_order	postdate	status
		$ret_val3=$obj_suplyd->add_partspurchased_podata(array('userid'=>addslashes($wuserid), 'po_num'=>addslashes($ponumber), 'total_items'=>addslashes($cnt_items), 'total_order'=>addslashes($ord_value), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted));
		//echo ">>4--<br>";
		*/

		pobe_insert_supply_data_matched($vendorid,$wuserid,$ponumber);
		//echo ">>5--<br>";

		pobe_cart_temp_data_td($vendorid,$wuserid,$schid);   // added on 29-08-2021 
/*--------------------------------------------------------------------------------*/
		$mgbody  = "<html><body><pre style='width:760px;font-family:arial;background-color:#ffffff'>";
		$mgbody .= "<table cellspacing=0 cellpadding=0 width=720 border=0><tr><td><p style='font-size:14px;margin-left:20px'>";
		$mgbody .= "New Supply Order posted at RSA site<br><br>"; 
		$mgbody .= "PO NO.: " . $ponumber . "<br><br>";
		$mgbody .= "SUPPLIER NAME: " . pobe_siteuser_name($wuserid) . "<br><br>";
		$mgbody .= "TOTAL NO. OF ITEMS: " . $cnt_items . "<br><br>";
		$mgbody .= "TOTAL ORDER VALUE: " . pobe_vendor_currency($wuserid) ." ". $ord_value . "<br><br>";
		$mgbody .= "ORDER DATE: " . pobe_format_full_datetime($dateposted) . "<br><br>";
		///$mgbody .= pobe_list_supply_data($wuserid,$ponumber);	
		$mgbody .= pobe_list_supply_data_td($wuserid,$schid);	
		$mgbody .= "</p></td></tr></table>";	
		$mgbody .= "<p style='font-size:14px;margin-left:20px;'>TEST ORDER, LIVE DATABASE NOT UPDATED<br>PLEASE DO NOT REPLY TO THIS EMAIL AS IT WAS GENERATED FROM AN UNMANNED EMAIL ADDRESS.<br><br></p>";	
		$mgbody .= "</pre></body></html>";
//--------------------------------------------------------------------------------//
//echo $mgbody."<br>--------------------<br>";
//--------------------------------------------------------------------------------//
		// added on 29-08-2021 to send email notification to supplier
		$spbody  = "<html><body><pre style='width:760px;font-family:arial;background-color:#ffffff'>";
		$spbody .= "<table cellspacing=0 cellpadding=0 width=720 border=0><tr><td><p style='font-size:14px;margin-left:20px'>";
		$spbody .= pobe_siteuser_name($wuserid) . "<br><br>";
		$spbody .= "Your Supply Order posted at RSA site<br><br>"; 
		$spbody .= "PO NO.: " . $ponumber . "<br><br>";
		$spbody .= "TOTAL NO. OF ITEMS: " . $cnt_items . "<br><br>";
		$spbody .= "TOTAL ORDER VALUE: " . pobe_vendor_currency($wuserid) ." ". $ord_value . "<br><br>";
		$spbody .= "ORDER DATE: " . pobe_format_full_datetime($dateposted) . "<br><br>";
		///$spbody .= pobe_list_supply_data($wuserid,$ponumber);	
		$spbody .= pobe_list_supply_data_td($wuserid,$schid);	
		$spbody .= "</p></td></tr></table>";	
		$spbody .= "<p style='font-size:14px;margin-left:20px;'>TEST ORDER, LIVE DATABASE NOT UPDATED<br>PLEASE DO NOT REPLY TO THIS EMAIL AS IT WAS GENERATED FROM AN UNMANNED EMAIL ADDRESS.<br><br></p>";	
		$spbody .= "</pre></body></html>";
//--------------------------------------------------------------------------------//
//echo $spbody."<br>--------------------<br>";
//--------------------------------------------------------------------------------//
$mail = new PHPMailer;

$mail->isSMTP();

$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.rsautocoresystememail.co.uk';
$mail->Port = 587;

//Set the hostname of the mail server
$mail->Host = 'smtp.rsautocoresystememail.co.uk';
$mail->Port = 587;

$mail->SMTPAuth = true;

$mail->SMTPOptions = array(
	'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
	)
);
 
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "info@rsautocoresystememail.co.uk";
//Password to use for SMTP authentication
$mail->Password = "Oa6f9c7fa";
//Set who the message is to be sent from
$mail->setFrom('info@rsautocoresystememail.co.uk', 'RSA Purchase');

//Set an alternative reply-to address
// $mail->addReplyTo('info@rsautocoresystememail.co.uk', 'RSA Purchase');

//Set who the message is to be sent to
////////////////////////////////////////////////////////////////////
// FOR TEST PUPOSE
$mail->addAddress('d.sanatan@advenzia.co.uk');
////$mail->addAddress('ryan@rsautocore.co.uk');
////$mail->addBCC('d.sanatan@advenzia.co.uk');
/*
// COMMENTED TO AVOID SENDING TEST EMAILS
$mail->addAddress('accounts@rsautocore.co.uk');
$mail->addAddress('Sonny@rsautocore.co.uk');
$mail->addCC('ryan@rsautocore.co.uk');
$mail->addBCC('d.sanatan@advenzia.co.uk');
*/
////////////////////////////////////////////////////////////////////

$mail->Subject = 'TEST - Supply Order posted at Core Purchase System';

$mail->Body    = $mgbody;
$mail->AltBody = $mgbody;

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent to Admin!";
}
/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/

$spmail = new PHPMailer;

$spmail->isSMTP();

$spmail->SMTPSecure = 'tls';
$spmail->Host = 'smtp.rsautocoresystememail.co.uk';
$spmail->Port = 587;

//Set the hostname of the mail server
$spmail->Host = 'smtp.rsautocoresystememail.co.uk';
$spmail->Port = 587;

$spmail->SMTPAuth = true;

$spmail->SMTPOptions = array(
	'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
	)
);
 
//Username to use for SMTP authentication - use full email address for gmail
$spmail->Username = "info@rsautocoresystememail.co.uk";
//Password to use for SMTP authentication
$spmail->Password = "Oa6f9c7fa";
//Set who the message is to be sent from
$spmail->setFrom('info@rsautocoresystememail.co.uk', 'RSA Purchase');

//Set who the message is to be sent to
////////////////////////////////////////////////////////////////////

$spmail->addAddress('d.sanatan@advenzia.co.uk');
/*
// COMMENTED TO AVOID SENDING TEST EMAILS
$spmail->addAddress(pobe_user_contactemail($wuserid));  
$spmail->addBCC('d.sanatan@advenzia.co.uk');
*/
////////////////////////////////////////////////////////////////////

$spmail->Subject = 'TEST - Supply Order successfully posted at Core Purchase System';

$spmail->Body    = $spbody;
$spmail->AltBody = $spbody;

//send the message, check for errors
if (!$spmail->send()) {
    echo "Mailer Error: " . $spmail->ErrorInfo;
} else {
    echo "Message sent to Supplier!";
}
/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/
		
		$_SESSION['global_loggedin'] = "false";
		$_SESSION['vendorid'] = md5(time());

		//echo 'location: success.php?msg='.base64_encode($ponumber);
		header('location: success.php?msg='.base64_encode($ponumber));
		die;
	}
/*
*/
} else {
	header('location: order_list_td.php?id='.$schid.'&carid='.$carid);
	die;
}
/*--------------------------------------------------------------------------------*/

$obj_suplyd->con_close();
exit;
/*--------------------------------------------------------------------------------*/
?>