<?php
include('includes/inc_user.php');
require('libs/Smarty.class.php');
require("classes/siteusers.php");
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

/*--------------------------------------------------------------------------------*/
if(!isset($_COOKIE['rsatoken'])) {
header("Location:terms.php");
} else {
$mytoken = "";
$_SESSION['usrtoken'] = $_COOKIE['rsatoken'];
//echo "<br>SESSION=". $_SESSION['usrtoken'] ."<br>COOKIE=". $_COOKIE['rsatoken'] ."<br>";
}
/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/
if(!isset($message)){  
	$message = "";
}
$smarty->assign('message',$message);
/*--------------------------------------------------------------------------------*/

if(!empty($_POST)){
	$username = trim($_POST['user_name']);
	$password = trim($_POST['usrpasswd']);
	$usertype = 4;

	$cnt = $obj_acnt->count_siteusers_details(array('user_type_id'=>addslashes($usertype), 'user_name'=>addslashes($username), 'user_status'=>'1', 'is_deleted'=>'0'));

	if ($cnt == 1){
		if ($obj_acnt->count_siteusers_details(array('user_type_id'=>addslashes($usertype), 'user_name'=>addslashes($username), 'user_password'=>md5(addslashes($password)), 'user_status'=>'1', 'is_deleted'=>'0', 'is_suspended'=>'0'))) {

			$cnt = pobe_user_login_count(addslashes($username));
			//echo "<BR>".$cnt."<BR>";

			$ret_val=$obj_acnt->get_siteusers_details(array('user_name'=>addslashes($username), 'user_password'=>md5(addslashes($password)), 'user_status'=>'1'));
			$user_info=$obj_acnt->db->sql_fetchrowset();
			//print_r($user_info);
			
			$userid = $user_info[0]['id'];
			$usernm = $user_info[0]['user_name'];
			$usertp = $user_info[0]['user_type_id'];
			$useracnt = $user_info[0]['account_type_id'];
			$usertkn = $user_info[0]['token_data'];
			$userblk = $user_info[0]['is_blocked'];

			if($userblk=='1') {
				if (pobe_user_access_check($userid) == 1){
					pobe_user_unblock($userid);
				} else {
					header('Location: errorpage.php?msg='.base64_encode("Access denied. Please login after sometime."));	
					die;
				}
			}

			$_SESSION['user_idd']=base64_encode($userid);
			$_SESSION['adminusr']=$usernm;	
			$_SESSION['admintpy']=md5($usertp);	
			$_SESSION['useracnt']=md5($useracnt);	
			$_SESSION['global_loggedin']="true";	
			//$_SESSION['vendorid'] = md5(time());

			$_SESSION['vendorid'] = pobe_last_cart_idd($userid);   // added on 29-08-2021 

			if(isset($_SESSION['usrtoken']) && ($_SESSION['usrtoken'] == $usertkn)) {
				pobe_signin_date($userid);
			} else {
				$mytoken = isset($_SESSION['usrtoken']) ? $_SESSION['usrtoken'] : $_COOKIE['rsatoken'];
				pobe_signin_date_upd($userid,$mytoken);
			}

			$ptype = pobe_part_type_default($userid);

			if($useracnt==3) {
				$schopt = pobe_user_search_option($userid);
				//echo $schopt;
				if ($schopt == 1) {
					header("Location:select_partcat.php?type=".$ptype."&mytoken=".$mytoken);
				} elseif ($schopt == 2) {
					header("Location:search_bynum.php?type=".$ptype."&mytoken=".$mytoken);
				} else {
					header("Location:home.php?mode=show&type=".$ptype."&mytoken=".$mytoken);
				}
				//header("Location:select_part_type.php?mode=show&type=".$ptype."&mytoken=".$mytoken);
				die;
			} else {
				header('Location: errorpage.php?msg='.base64_encode("You don't have access to this application"));	
				die;
			}
		} else {
			header('Location: errorpage.php?msg='.base64_encode("You don't have access to this application"));	
			die;
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