<?php
ob_start();
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
$title="Manage Users Page - Sony AutoParts";
$GLOBALS['message']="";
#==============================================================

$user_loggedin = isset($_SESSION['user_wid']) ? $_SESSION['user_wid'] : "";
$user_wid = pobe_session_register('user_wid', '');
$adminwnm = pobe_session_register('adminwnm', '');
$adminwtp = pobe_session_register('adminwtp', '');
$userwactn = pobe_session_register('userwact', '');
$global_wloggedin = pobe_session_register('global_wloggedin', '');
//print_r($_SESSION);

if($_SESSION['global_wloggedin']=="true" || !empty($user_loggedin)) {
	$smarty->assign('loggedin','1');
	//echo "<BR>===1 ".$adminwtp;
} elseif($_SESSION['global_wloggedin']!="true" || ($adminwtp != md5(1)) || ($adminwtp != md5(3))){  
	$_GLOBALS['message']="Please login to access";
	//echo "<BR>===2 ".$adminwtp;
	header('Location: index.php');	
	die;
} else {
	$_GLOBALS['message']="Please login to access";
	//echo "<BR>===3 ".$adminwtp;
	header('Location: index.php');	
	die;
}

if($adminwtp == md5(2)) {
	//echo "<BR>===4 ". $adminwtp;
	header('Location: error.php');	
	die;
} elseif($userwactn != md5(2)) {
	//echo "<BR>===5 ".$userwactn;
	header('Location: error.php');	
	die;
}
//echo "<BR>===6<br>";
/* */
#==============================================================
$smarty->assign('title',$title);
$smarty->assign('self',$_SERVER['PHP_SELF']);	
$smarty->assign('message',$GLOBALS['message']);
$smarty->assign('adminusertype',$adminwtp); 
#=================================================================

/*--------------------------------------------------------------------------------*/
$wuserid=base64_decode($_SESSION['user_wid']);
$smarty->assign('userfullname',pobe_siteuser_name($wuserid)); 
$smarty->assign('usertypename',pobe_siteuser_type($wuserid)); 
/*--------------------------------------------------------------------------------*/

$obj_usrdata=new siteusers;

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}
/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/

$page = isset($_REQUEST['pg']) ? trim($_REQUEST['pg']) : 1;
$ppage = isset($_REQUEST['p']) ? trim($_REQUEST['p']) : 10;
$per_page = isset($_REQUEST['p']) ? trim($_REQUEST['p']) : 10;
$offset = isset($offset) ? $offset : 0;
$smarty->assign('ppage',$per_page); 
$smarty->assign('showpagination','');

/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/

$MSG = 		isset($_SESSION['MSG']) ? $_SESSION['MSG'] : ''; 
$ERRORMSG = isset($_SESSION['ERRORMSG']) ? $_SESSION['ERRORMSG'] : ''; 
$ERROR = 	isset($_REQUEST['ERROR']) ? $_REQUEST['ERROR'] : '0';
$SUCCESS =	isset($_REQUEST['SUCCESS']) ? $_REQUEST['SUCCESS'] : 0;
$ACT = 		isset($_REQUEST['act']) ? $_REQUEST['act'] : '';
$ID = 		isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/

if(isset($_REQUEST['mode']))
{
	//delete
	//if($_REQUEST['mode']=="delete")	{
	if($ACT=='delete' && $ID!=''){
		$webadmid=base64_decode($_REQUEST['id']);
		$dateposted = date("Y-m-d H:i:s");
		$ret_val2=$obj_usrdata->update_siteusers(array('user_status'=>'0','is_deleted'=>'1','last_updated'=>$dateposted),array('id'=>$webadmid));
				
		$_REQUEST['mode']="show";
	}

	//change status
	if($_REQUEST['mode']=="changestatus")	{
		$webadmid=base64_decode($_REQUEST['id']);
		$status=$_REQUEST['status'];
		$dateposted = date("Y-m-d H:i:s");

		$ret_val4=$obj_usrdata->update_siteusers(array('user_status'=>$status),array('id'=>$webadmid));

		$_REQUEST['mode']="show";
	}

	if($_REQUEST['mode']=="show")
	{	
		$count=$obj_usrdata->count_siteusers_details(array('user_type_id'=>'4', 'account_type_id'=>'3', 'is_deleted'=>'0'));

		// Pagination
		$range = 2; // number of pages each side of active page in pagination

		$item_count = $count; // Get total records from database
		$page_count = ceil($item_count / $per_page);
		$page = (isset($_GET['pg']) && is_numeric($_GET['pg'])) ? (int)$_GET['pg'] : 1;
		if ($page > $page_count) { $page = $page_count; }
		if ($page < 1) { $page = 1; }
		$remaining = $per_page - (($page * $per_page) - $item_count); 
		$offset = (($page - 1) * $per_page);   
		if ($remaining < $per_page) { $per_page = $remaining; }
		
		$start = $offset;		
		$limit = $per_page;

		$total=$count;
		$artnum = 1;

		if($count==0) $smarty->assign('empty_msg',"no records found");		
		
		$ret_cur=$obj_usrdata->get_siteusers($start,$limit,array('user_type_id'=>'4', 'account_type_id'=>'3', 'is_deleted'=>'0'));
			
		if($ret_cur==1){
			$row_webadm=$obj_usrdata->db->sql_fetchrowset();
		
			for($i=0;$i<count($row_webadm);$i++){
				if($i % 2 == 0) {
					$gsreqcnt[$i]['gry'] = 0;
				} else {
					$gsreqcnt[$i]['gry'] = 1;
				}
				$gswebadm[$i]['cnt']=$artnum + $offset;
				$gswebadm[$i]['webadmid']=base64_encode($row_webadm[$i]['id']);
				$gswebadm[$i]['usrtypename']=stripslashes($row_webadm[$i]['user_typename']);
				$gswebadm[$i]['admusername']=stripslashes($row_webadm[$i]['user_name']);
				$gswebadm[$i]['contactname']=stripslashes($row_webadm[$i]['contact_person']);
				$gswebadm[$i]['createdon']=pobe_format_sort_date($row_webadm[$i]['datecreated']);
				$gswebadm[$i]['lastlogin']=pobe_format_sort_date($row_webadm[$i]['last_login']);
				$gswebadm[$i]['admstatus']=stripslashes($row_webadm[$i]['user_status']);
				$artnum++;
			} 
			$smarty->assign('gswebadm',$gswebadm);
			$smarty->assign('empty_msg',"");		
		}		

		$GLOBALS["extra_var"]='mode=show&'; 

		if(isset($total)){
			$smarty->assign('showpagination',showPaginationTw($page, $page_count, $range, $ppage));
			$smarty->assign('total', $total);
			$smarty->assign('frshow', $start+1);
			$smarty->assign('toshow',$start+$artnum-1);		
		}
//--------------------------------------------------------------------------------

		$output=$smarty->fetch('users_mgmt.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
}

$smarty->assign('mainpage',"manage_site");
$smarty->assign('subpage',"users_mgmt");

$smarty->display('main.tpl');	

/*--------------------------------------------------------------------------------*/
/*
if (error_get_last()){
print_r(error_get_last());
}
*/
/*--------------------------------------------------------------------------------*/
$obj_usrdata->con_close();
exit;
?>