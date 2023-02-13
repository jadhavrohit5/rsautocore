<?php
include('includes/inc_user.php');

if(isset($_SESSION['user_idd']) && $_SESSION['user_idd']!=""){
	unset($_SESSION['user_idd']);			
	pobe_session_unregister('user_idd');      //session_destroy();	
	pobe_session_unregister('adminusr');      //session_destroy();	
	pobe_session_unregister('admintpy');      //session_destroy();	
}
$_SESSION['global_loggedin'] = "false";
$_SESSION['user_idd'] = "";
$_SESSION['adminusr'] = "";
$_SESSION['admintpy'] = md5(time());
$_SESSION['useracnt'] = md5(time());
$_SESSION['vendorid'] = md5(time());
$_SESSION['usrtoken'] = "";

header("Location:index.php");
die;
?>