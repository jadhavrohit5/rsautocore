<?php
ob_start();
ini_set('max_execution_time', 0);
//---------------------------------
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/home/storm/sites/rsautocoresystem-co-uk/public/ctasks/phpmailer/Exception.php';
require '/home/storm/sites/rsautocoresystem-co-uk/public/ctasks/phpmailer/PHPMailer.php';
require '/home/storm/sites/rsautocoresystem-co-uk/public/ctasks/phpmailer/SMTP.php';
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

function pobe_format_dt($date)
{
	if(!empty($date) && $date != '0000-00-00') {
		$date = date('Y-m-d', strtotime(str_replace('-','/', $date)));
		list($year, $month, $day) = explode("-", $date);
		$new_date = date("M d", mktime(0, 0, 0, $month, $day)) . ", " . $year;
	} else {
		$new_date = "";
	}
	return $new_date;
}

function pobe_format_sort_date($date)
{
	if(!empty($date) && $date != '0000-00-00 00:00:00') {
		list($dt1, $dt2) = explode(" ", $date);
		list($year, $month, $day) = explode("-", $dt1);
		$new_date = date("d/m/Y", mktime(0, 0, 0, $month, $day, $year));
	} else {
		$new_date = "";
	}
	return $new_date;
}

class Logger {

    private
        $file,
        $timestamp;

    public function __construct($filename) {
        $this->file = $filename;
    }

    public function setTimestamp($format) {
        $this->timestamp = date($format)." : ";
    }

    public function putLog($insert) {
        if (isset($this->timestamp)) {
            file_put_contents($this->file, $this->timestamp.$insert, FILE_APPEND);
        } else {
            trigger_error("Timestamp not set", E_USER_ERROR);
        }
    }

    public function getLog() {
        $content = @file_get_contents($this->file);
        return $content;
    }

}

//---------------------------------

$currdate = date("Y-m-d H:i:s");

$prevdate = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
$notedate  = date("Y-m-d H:i:s", $prevdate);

$lastdate = mktime(0, 0, 0, date("m"), date("d")-1, date("Y"));
$fromdate  = date("Y-m-d H:i:s", $lastdate);

//--------------------------------------------------------------------------------//
$log = new Logger("/home/storm/sites/rsautocoresystem-co-uk/public/ctasks/mylog.txt");
$log->setTimestamp("D M d Y h.i A");
$log->putLog("Daily Usage Notification".PHP_EOL);
//--------------------------------------------------------------------------------//

/*--------------------------------------------------------------------------------*/

/*
*/

$msgcontent = '';

$my_qry = "SELECT id, user_name, contact_person FROM tbl_rsa_app_users WHERE user_type_id = 4 AND ((last_login BETWEEN DATE_SUB(NOW(), INTERVAL 24 HOUR) AND NOW()) OR (last_loged BETWEEN DATE_SUB(NOW(), INTERVAL 24 HOUR) AND NOW())) ORDER BY id ASC ";
$result_set = mysqli_query($ndbconn, $my_qry);
while($row = mysqli_fetch_array($result_set)){

$msgcontent .= '<tr>';
$msgcontent .= '<td align="left" valign="middle" style="border: 1px solid #ddd; font-size: 11px; padding:5px 10px;">'.stripslashes($row['contact_person']).'</td>';
$msgcontent .= '<td align="left" valign="middle" style="border: 1px solid #ddd; font-size: 11px; padding:5px 10px;">'.pobe_format_sort_date($fromdate).'</td>';

$schcntSQL = "SELECT count(DISTINCT vendortmp) as cntsess, count(searchid) as cntsrch FROM tbl_rsa_app_search WHERE searchdate > '" . $fromdate . "' AND searchdate < NOW() AND userid = '" . addslashes($row['id']) . "'";
$resultsch = mysqli_query($ndbconn, $schcntSQL); // Run the query.
$rowsch = mysqli_fetch_array($resultsch);
$cntsess = number_format($rowsch['cntsess']); 
$cntsrch = number_format($rowsch['cntsrch']); 

$msgcontent .= '<td align="left" valign="middle" style="border: 1px solid #ddd; font-size: 11px; padding:5px 10px;">'.$cntsess.'</td>';
$msgcontent .= '<td align="left" valign="middle" style="border: 1px solid #ddd; font-size: 11px; padding:5px 10px;">'.$cntsrch.'</td>';

$rstcntSQL = "SELECT count(*) as cntresults FROM tbl_rsa_app_search WHERE searchdate > '" . $fromdate . "' AND searchdate < NOW() AND numofresults > 0 AND (yes_results = '1' OR searchtype = 'by_refno') AND userid = '" . addslashes($row['id']) . "'";
$resultrst = mysqli_query($ndbconn, $rstcntSQL); // Run the query.
$rowrst = mysqli_fetch_array($resultrst);
$cntresults = number_format($rowrst['cntresults']); 

$msgcontent .= '<td align="left" valign="middle" style="border: 1px solid #ddd; font-size: 11px; padding:5px 10px;">'.$cntresults.'</td>';

//$offcntSQL = "SELECT SUM(offered_stock) as cntqty, count(po_num) as cntpo FROM tbl_rsa_app_offered_items_final WHERE postdate > '" . $fromdate . "' AND postdate < NOW() AND status = '1' AND is_offered = '1' AND userid = '" . addslashes($row['id']) . "'";
$offcntSQL = "SELECT SUM(offered_stock) as cntqty, count(DISTINCT po_num) as cntpo FROM tbl_rsa_app_offered_items_final WHERE postdate > '" . $fromdate . "' AND postdate < NOW() AND status = '1' AND is_offered = '1' AND userid = '" . addslashes($row['id']) . "'";
$resultoff = mysqli_query($ndbconn, $offcntSQL); // Run the query.
$rowoff = mysqli_fetch_array($resultoff);
$cntqty = number_format($rowoff['cntqty']); 
$cntpo = number_format($rowoff['cntpo']); 

$msgcontent .= '<td align="left" valign="middle" style="border: 1px solid #ddd; font-size: 11px; padding:5px 10px;">'.$cntqty.'</td>';
$msgcontent .= '<td align="left" valign="middle" style="border: 1px solid #ddd; font-size: 11px; padding:5px 10px;">'.$cntpo.'</td>';

$msgcontent .= '</tr>';
}

//--------------------------------------------------------------------------------//

$logo = '<img src="https://rsautocoresystem.co.uk/logo.png" alt="Logo - RS Core Purchase System" style="width: 200px; height: auto;">';

$msgbody = '<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
background: #DBDBDB;
font-size: 11px;
font-family: font-family: Arial;
padding: 0;
margin: 0;
}
td {
font-size: 12px;
padding: 5px 10px;
}
table {
border-collapse: collapse;
width: 100%;
}
.prod_table{
border-collapse: collapse;
border-spacing: 0;
border: 1px solid #ddd;
text-align: left;
}
.prod_table td{
border: 1px solid #ddd;
font-size: 11px;
} 
.prod_table th{
border: 1px solid #ddd;
text-align: left;
} 
.prod_table tr:nth-child(even){background-color: #f2f2f2;}
</style>
<body style="background: #DBDBDB; font-size: 12px; padding: 0; margin: 0; font-family: Arial;">
<div style="background: #DBDBDB; margin: 0 auto; padding:20px;">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin: 0 auto; border-spacing: 0;">
<tbody>
<tr>
<td align="center" valign="top" style="background: #fff; padding: 15px 0;">'.$logo.'</td>
</tr>
<tr>
<td align="center" style="background: #e30534; color: #fff; padding: 10px;"><h2 style="font-size:20px; margin:0; padding:0;">Daily Usage Report - RS Core Purchase System</h2></td>
</tr>  
<tr>
<td style="background: #fff; padding: 5px 20px;"><p><b>Date: </b>'.pobe_format_dt($notedate).'</p>    
</td>
</tr>  
<tr>
<td style="background: #fff; padding: 0 20px 20px 20px;">
<div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="prod_table" style="border-collapse: collapse; border-spacing: 0; border: 1px solid #ddd;">
<tbody>
<tr>
<th align="left" valign="top" style="background: #DE2F2F;  color: white;  padding:5px 10px; font-size: 12px; ">User Name</th>
<th align="left" valign="top" style="background: #DE2F2F;  color: white;  padding:5px 10px; font-size: 12px; ">Date Accessed</th>
<th align="left" valign="top" style="background: #DE2F2F;  color: white;  padding:5px 10px; font-size: 12px; ">Total Search Sessions</th>
<th align="left" valign="top" style="background: #DE2F2F;  color: white;  padding:5px 10px; font-size: 12px; ">Total Searches made</th>
<th align="left" valign="top" style="background: #DE2F2F;  color: white;  padding:5px 10px; font-size: 12px; ">Total YES Results</th>
<th align="left" valign="top" style="background: #DE2F2F;  color: white;  padding:5px 10px; font-size: 12px; ">Quantity of Parts purchased</th>
<th align="left" valign="top" style="background: #DE2F2F;  color: white;  padding:5px 10px; font-size: 12px; ">Number of Purchase orders</th>
</tr>
'.$msgcontent.'
</tbody>
</table>
</div>
</td>
</tr>
<tr>
<td style="background: #fff; padding: 20px;"><p>Thanks for using RS Core Purchase System!</p></td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
</div>
</body>
</html>';

/*--------------------------------------------------------------------------------*/
$mail = new PHPMailer;

$mail->isSMTP();

$mail->SMTPSecure = 'tls';
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

//Set who the message is to be sent to
$mail->addAddress('Sonny@rsautocore.co.uk', 'Sonny');
$mail->addCC('ryan@rsautocore.co.uk', 'Ryan Webster');
$mail->addCC('james@rsautocore.co.uk', 'James');
$mail->addCC('accounts@rsautocore.co.uk');

/*
$mail->addBCC('d.sanatan@advenzia.co.uk');
$mail->addAddress('d.sanatan@advenzia.co.uk', 'S Das');  // FOR TEST PUPOSE
*/

$mail->Subject = 'RS Core Purchase System - Daily Usage Report';

$mail->Body    = $msgbody;
$mail->AltBody = 'This is the body in plain text for non-HTML mail recipients';
$mail->IsHTML(true);

//send the message, check for errors
if (!$mail->send()) {
    //echo "Mailer Error: " . $mail->ErrorInfo;
	$log->putLog("Message could not be sent. Mailer Error: ".$mail->ErrorInfo.PHP_EOL);
} else {
    //echo "Message sent to Admin!";
	$log->putLog("Message has been sent.".PHP_EOL);
}
/*--------------------------------------------------------------------------------*/

//---------------------------------------------------------------------------------------------------------------
die;
?>