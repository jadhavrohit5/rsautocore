<?php
include('includes/inc_user.php');
require('libs/Smarty.class.php');
require("classes/siteusers.php");
require("classes/user_type.php");
include('queries.php');

#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Login Page - Sony AutoParts";
$message = isset($GLOBALS['message']) ? $GLOBALS['message'] : "";
#==============================================================

$obj_acnt=new siteusers;

if(isset($_REQUEST['mode']) && $_REQUEST['mode']=="logout"){
	if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
		unset($_SESSION['user_id']);			
		pobe_session_unregister('user_id');      //session_destroy();	
		pobe_session_unregister('adminnm');      //session_destroy();	
		pobe_session_unregister('admintp');      //session_destroy();	
	}
	$_SESSION['global_logged_in'] = "false";
	$_SESSION['user_id'] = "";
	$_SESSION['adminnm'] = "";
	$_SESSION['admintp'] = "";
	$_SESSION['userac'] = md5(time());
}

/*--------------------------------------------------------------------------------*/
if(!isset($message)){  
	$message = "";
}
$smarty->assign('message',$message);
/*--------------------------------------------------------------------------------*/

if(!empty($_POST)){
	$username = trim($_POST['user_name']);
	$password = trim($_POST['usrpasswd']);

	$cnt = $obj_acnt->count_siteusers_details(array('user_name'=>addslashes($username), 'user_status'=>'1', 'is_deleted'=>'0'));

	if ($cnt == 1){
		if ($obj_acnt->count_siteusers_details(array('user_name'=>addslashes($username), 'user_password'=>md5(addslashes($password)), 'user_status'=>'1', 'is_deleted'=>'0'))) {

			$cnt = pobe_user_login_count(addslashes($username));
			//echo "<BR>".$cnt."<BR>";

			$ret_val=$obj_acnt->get_siteusers_details(array('user_name'=>addslashes($username), 'user_password'=>md5(addslashes($password)), 'user_status'=>'1'));
			$user_info=$obj_acnt->db->sql_fetchrowset();
			//print_r($user_info);
			
			$userid = $user_info[0]['id'];
			$usernm = $user_info[0]['user_name'];
			$usertp = $user_info[0]['user_type_id'];
			$userac = $user_info[0]['account_type_id'];

			$_SESSION['user_id']=base64_encode($userid);
			$_SESSION['adminnm']=$usernm;	
			$_SESSION['admintp']=md5($usertp);	
			$_SESSION['userac']=md5($userac);	
			$_SESSION['global_logged_in']="true";	

			pobe_signin_date($userid);

			$ptype = pobe_part_type_default($userid);

			//if(($usertp==1) && ($userac==2)) {
			if($userac==2) {
				header("Location:parts.php?mode=show&type=".$ptype);
				die;
			} else {
				header("Location:partslist.php?mode=show&type=".$ptype);
				die;
			}
		}
	} else {
		$smarty->assign('message','Wrong Username/Password');
	}
} else {
	$smarty->assign('message',$message);
	$smarty->assign($_POST); 
}

#==============================================================

$smarty->assign('title',$title);
$smarty->assign('self',$_SERVER['PHP_SELF']);	

$output = $smarty->fetch('login.tpl');
$smarty->assign("MAIN_CONTENT",$output);
$smarty->display('main_login.tpl');

$obj_acnt->con_close();
exit;
?>