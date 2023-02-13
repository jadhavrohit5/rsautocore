<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('queries.php');
	
#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Terms - Sony AutoParts";
$message = isset($GLOBALS['message']) ? $GLOBALS['message'] : "";
#==============================================================

#==============================================================
$smarty->assign('title',$title);
$smarty->assign('self',$_SERVER['PHP_SELF']);	
$smarty->assign('message',$GLOBALS['message']);
#=================================================================

/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/
function myrandtoken($length = 32){
    if(!isset($length) || intval($length) <= 8 ){
      $length = 32;
    }
    if (function_exists('random_bytes')) {
        return bin2hex(random_bytes($length));
    }
    if (function_exists('mcrypt_create_iv')) {
        return bin2hex(mcrypt_create_iv($length, MCRYPT_DEV_URANDOM));
    }
    if (function_exists('openssl_random_pseudo_bytes')) {
        return bin2hex(openssl_random_pseudo_bytes($length));
    }
}

function mynewtoken(){
    return substr(strtr(base64_encode(hex2bin(myrandtoken(32))), '+', '.'), 0, 44);
}

/*--------------------------------------------------------------------------------*/
//$mytoken = isset($_SESSION['usrtoken']) ? $_SESSION['usrtoken'] : mynewtoken();
//$smarty->assign('newtoken',$mytoken);

/*--------------------------------------------------------------------------------*/
if(!isset($message)){  
	$message = "Please accept our Terms and Cookie Policy";
}
$smarty->assign('message',$message);
//print_r($_REQUEST);
/*--------------------------------------------------------------------------------*/
if(!empty($_POST)){
	$newtoken = trim($_POST['newtoken']);
	//echo $newtoken ."<br>";
	$_SESSION['usrtoken'] = $newtoken;

	$lifetime=2592000;
	setcookie('rsatoken', $newtoken, time() + $lifetime, "/");

	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
} else {
	$mytoken = mynewtoken();
	//echo $mytoken ."<br>";
	$smarty->assign('newtoken',$mytoken);
	$smarty->assign('message',$message);
	$smarty->assign($_POST); 
}

/*--------------------------------------------------------------------------------*/

$output=$smarty->fetch('terms.tpl');
$smarty->assign('MAIN_CONTENT',$output);

$smarty->display('main_page.tpl');	
/*--------------------------------------------------------------------------------*/
?>