<?php
ob_start();
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
/*--------------------------------------------------------------------------------*/
		$mgbody  = "<html><body><pre style='width:760px;font-family:arial;background-color:#ffffff'>";
		$mgbody .= "<table cellspacing=0 cellpadding=0 width=720 border=0><tr><td><p style='font-size:14px;margin-left:20px'>";
		$mgbody .= "New Supply Order posted at RSA site<br><br>"; 
		$mgbody .= "PO NO.: PO2001<br><br>";
		$mgbody .= "SUPPLIER NAME: ABC<br><br>";
		$mgbody .= "TOTAL NO. OF ITEMS: 10<br><br>";
		$mgbody .= "TOTAL ORDER VALUE: &pound; 200.00<br><br>";
		$mgbody .= "ORDER DATE: 26/02/2020<br><br>";
		$mgbody .= "</p></td></tr></table>";	
		$mgbody .= "<p style='font-size:14px;margin-left:20px;'>PLEASE DO NOT REPLY TO THIS EMAIL AS IT WAS GENERATED FROM AN UNMANNED EMAIL ADDRESS.<br><br></p>";	
		$mgbody .= "</pre></body></html>";
		echo $mgbody . "<br><br>";
		//exit;
/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/
$mail = new PHPMailer;

$mail->isSMTP();

$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.demopoint.co.uk';
$mail->Port = 587;

//Set the hostname of the mail server
$mail->Host = 'smtp.demopoint.co.uk';
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
$mail->Username = "rsacore@demopoint.co.uk";
//Password to use for SMTP authentication
$mail->Password = "Gc3fc20c9";
//Set who the message is to be sent from
$mail->setFrom('rsacore@demopoint.co.uk', 'RSA Purchase');

//Set an alternative reply-to address
// $mail->addReplyTo('rsacore@demopoint.co.uk', 'RSA Purchase');

//Set who the message is to be sent to
$mail->addAddress('d.sanatan@advenzia.co.uk');
////$mail->addAddress('accounts@rsautocore.co.uk');
////$mail->addAddress('Sonny@rsautocore.co.uk');
////$mail->addCC('ryan@rsautocore.co.uk');
////$mail->addBCC('d.sanatan@advenzia.co.uk');

$mail->Subject = 'Supply Order posted at Core Purchase System';

$mail->Body    = $mgbody;
$mail->AltBody = 'This is the body in plain text for non-HTML mail';

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

exit;
?>