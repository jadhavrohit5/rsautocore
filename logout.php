<?php
include('includes/inc_user.php');

if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
	unset($_SESSION['user_id']);			
	pobe_session_unregister('user_id');      //session_destroy();	
	pobe_session_unregister('adminnm');      //session_destroy();	
	pobe_session_unregister('admintp');      //session_destroy();	
}
$_SESSION['global_logged_in'] = "false";
$_SESSION['user_id'] = "";
$_SESSION['adminnm'] = "";
$_SESSION['admintp'] = md5(time());
$_SESSION['userac'] = md5(time());

header("Location:index.php");
die;
?> 