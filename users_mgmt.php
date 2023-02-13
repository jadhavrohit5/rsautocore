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

$user_loggedin = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
$user_id = pobe_session_register('user_id', '');
$adminnm = pobe_session_register('adminnm', '');
$admintp = pobe_session_register('admintp', '');
$useracn = pobe_session_register('userac', '');
$global_logged_in = pobe_session_register('global_logged_in', '');

if($_SESSION['global_logged_in']=="true" || !empty($user_loggedin)) {
	$smarty->assign('loggedin','1');
} elseif($_SESSION['global_logged_in']!="true" || ($admintp != md5(1)) || ($admintp != md5(3))){  
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
} else {
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
}

if($admintp == md5(2)) {
	header('Location: error.php');	
	die;
} elseif($useracn != md5(2)) {
	header('Location: error.php');	
	die;
}

#==============================================================
$smarty->assign('title',$title);
$smarty->assign('self',$_SERVER['PHP_SELF']);	
$smarty->assign('message',$GLOBALS['message']);
$smarty->assign('adminusertype',$admintp); 
#=================================================================

/*--------------------------------------------------------------------------------*/
$wuserid=base64_decode($_SESSION['user_id']);
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
$ptype = isset($_REQUEST['type']) ? trim($_REQUEST['type']) : 1;
$ppage = isset($_REQUEST['p']) ? trim($_REQUEST['p']) : 10;
$per_page = isset($_REQUEST['p']) ? trim($_REQUEST['p']) : 10;
//echo "==========================================".$per_page;

$offset = isset($offset) ? $offset : 0;
//echo "================================================".$offset;
$smarty->assign('ptype',$ptype); 
//$smarty->assign('ptypename',$ptype); 
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
	if($_REQUEST['mode']=="delete")	{
		$webadmid=base64_decode($_REQUEST['id']);
		$dateposted = date("Y-m-d H:i:s");
		$ret_val2=$obj_usrdata->update_siteusers(array('user_status'=>'0','is_deleted'=>'1'),array('id'=>$webadmid));
				
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
		$count=$obj_usrdata->count_siteusers_details(array('is_deleted'=>'0'));
		//$count=$obj_usrdata->count_siteusers_details(array('user_type_id'=>'2', 'is_deleted'=>'0'));

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
		
		$ret_cur=$obj_usrdata->get_siteusers($start,$limit,array('is_deleted'=>'0'));
		//$ret_cur=$obj_usrdata->get_siteusers($start,$limit,array('user_type_id'=>'2', 'is_deleted'=>'0'));
			
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
			$smarty->assign('showpagination',showPagination($page, $page_count, $range, $ppage, $ptype));
			$smarty->assign('total', $total);
			$smarty->assign('frshow', $start+1);
			$smarty->assign('toshow',$start+$artnum-1);		
		}
//--------------------------------------------------------------------------------
		$smarty->assign('parttypelist',pobe_part_type_list());

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