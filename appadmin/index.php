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
	if(isset($_SESSION['user_wid']) && $_SESSION['user_wid']!=""){
		unset($_SESSION['user_wid']);			
		pobe_session_unregister('user_wid');      //session_destroy();	
		pobe_session_unregister('adminwnm');      //session_destroy();	
		pobe_session_unregister('adminwtp');      //session_destroy();	
	}
	$_SESSION['global_wloggedin'] = "false";
	$_SESSION['user_wid'] = "";
	$_SESSION['adminwnm'] = "";
	$_SESSION['adminwtp'] = "";
	$_SESSION['userwact'] = md5(time());
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

	$cnt = $obj_acnt->count_siteusers_details(array('user_type_id'=>3, 'account_type_id'=>2, 'user_name'=>addslashes($username), 'user_status'=>'1', 'is_deleted'=>'0'));

	if ($cnt == 1){
		if ($obj_acnt->count_siteusers_details(array('user_type_id'=>3, 'account_type_id'=>2, 'user_name'=>addslashes($username), 'user_password'=>md5(addslashes($password)), 'user_status'=>'1', 'is_deleted'=>'0'))) {

			$cnt = pobe_user_login_count(addslashes($username));
			//echo "<BR>".$cnt."<BR>";

			$ret_val=$obj_acnt->get_siteusers_details(array('user_name'=>addslashes($username), 'user_password'=>md5(addslashes($password)), 'user_status'=>'1'));
			$user_info=$obj_acnt->db->sql_fetchrowset();
			//print_r($user_info);
			
			$userid = $user_info[0]['id'];
			$usernm = $user_info[0]['user_name'];
			$usertp = $user_info[0]['user_type_id'];
			$userwact = $user_info[0]['account_type_id'];

			$_SESSION['user_wid']=base64_encode($userid);
			$_SESSION['adminwnm']=$usernm;	
			$_SESSION['adminwtp']=md5($usertp);	
			$_SESSION['userwact']=md5($userwact);	
			$_SESSION['global_wloggedin']="true";	

			pobe_signin_date($userid);

			header("Location:users_mgmt.php?mode=show");
			die;
		} else {
			$smarty->assign('message','Wrong Password');
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