<?php
$HTTP_HOST = $_SERVER['HTTP_HOST'];
echo "Site is Temporary Down";
exit(); 

$root = '/'; // Local site root
$host = 'localhost';
$mysql_user = '8xG4Wv4C';
$mysql_pass = 'SrhqY02eGwE0hKEi';
$database = 'MNqD8JNM';		
define("DB_HOST", "localhost");
define("DB_USERNAME", '8xG4Wv4C');
define("DB_PASSWORD",'SrhqY02eGwE0hKEi');
define("DB_NAME", 'MNqD8JNM');
define("ROOT", "/");

$file_dir = '/home/storm/sites/rsautonewdemo2-co-uk/public/purchase/'; // Folder for all contribulers uplods
$admin = '';// Admin folder path
 
//Mysql connect.
$con = mysqli_connect($host, $mysql_user, $mysql_pass) or die ('Cound not connect. ' . mysqli_error());
$select_database = mysqli_select_db($con, $database) or die ('Unable to select database. ' . mysqli_error());

//date_default_timezone_set('Europe/London'); // Set time zone
$page = basename($_SERVER['PHP_SELF']); // Get current page name

list($tdyear, $tdmonth, $tdday) = explode("-", date("Y-m-d"));
$td_date = date("l jS F, Y", mktime(0, 0, 0, $tdmonth, $tdday));
define("TODAY_DATE", $td_date);

$block_period=3600;
$num_searches=20;
$check_period=30;
$alw_searches=700;
define("BLOCK_PERIOD", $block_period);
define("NUM_SEARCHES", $num_searches);
define("CHECK_PERIOD", $check_period);
define("ALW_SEARCHES", $alw_searches);

?>