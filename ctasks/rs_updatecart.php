<?php
ob_start();
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

$log = new Logger("/home/storm/sites/rsautocoresystem-co-uk/public/ctasks/mylog.txt");
$log->setTimestamp("D M d Y h.i A");

$log->putLog("Updated cart data".PHP_EOL);
//---------------------------------

$currdate = date("Y-m-d H:i:s");

$updSQLkws = "UPDATE tbl_rsa_app_offered_items_temp SET status = '0', last_updated = '". $currdate ."' WHERE status = '1' AND is_deleted = '0' AND is_offered = '0' AND (postdate >= now() - INTERVAL 15 DAY) ";
$resultupMchd = mysqli_query($ndbconn, $updSQLkws); // Run the query
$log->putLog($updSQLkws.PHP_EOL);
//---------------------------------

//---------------------------------------------------------------------------------------------------------------
$prevweek = mktime(0, 0, 0, date("m"), date("d")-15, date("Y"));
$prevdate  = date("Y-m-d H:i:s", $prevweek);
 
$delSQLb = "DELETE FROM tbl_rsa_app_td_articles WHERE postdate <= '". $prevdate ."' ";
$resultDelB = mysqli_query($ndbconn, $delSQLb); // Run the query
$log->putLog($delSQLb.PHP_EOL);

$delSQLc = "DELETE FROM tbl_rsa_app_matched_articles WHERE postdate <= '". $prevdate ."' ";
$resultDelC = mysqli_query($ndbconn, $delSQLc); // Run the query
$log->putLog($delSQLc.PHP_EOL);

//$delSQLd = "DELETE FROM tbl_rsa_app_regno_search WHERE postdate <= '". $prevdate ."' and id NOT IN (SELECT searchid FROM tbl_rsa_app_offered_tdparts_final) ";
///////$resultDelD = mysqli_query($ndbconn, $delSQLd); // Run the query
//$log->putLog($delSQLd.PHP_EOL);
/*
*/
//---------------------------------------------------------------------------------------------------------------
die;
?>