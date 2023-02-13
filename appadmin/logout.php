<?php
include('includes/inc_user.php');

if(isset($_SESSION['user_wid']) && $_SESSION['user_wid']!=""){
	unset($_SESSION['user_wid']);			
	pobe_session_unregister('user_wid');      //session_destroy();	
	pobe_session_unregister('adminwnm');      //session_destroy();	
	pobe_session_unregister('adminwtp');      //session_destroy();	
}
$_SESSION['global_wloggedin'] = "false";
$_SESSION['user_wid'] = "";
$_SESSION['adminwnm'] = "";
$_SESSION['adminwtp'] = md5(time());
$_SESSION['userwact'] = md5(time());

header("Location:index.php");
die;
?> 