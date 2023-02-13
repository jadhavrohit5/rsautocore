<?php
ob_start();
// Display error - if there is 
error_reporting(E_ALL);
ini_set('display_errors', 1);
//---------------------------------
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
//---------------------------------
$log = new Logger("mylog.txt");
$log->setTimestamp("D M d Y h.i A");

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="Generator" content="EditPlus®">
<meta name="Author" content="">
<meta name="Keywords" content="">
<meta name="Description" content="">
<title>View log</title>
</head>
<body>
<h2>View log</h2>
<p><pre>
<?php
//---------------------------------
//Check your log with this:
echo $log->getLog();
//---------------------------------
?>
</pre></p>
</body>
</html>