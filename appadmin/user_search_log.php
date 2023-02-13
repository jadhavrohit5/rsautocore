<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
require("classes/searchdata.php");
require("classes/user_type.php");
include('queries.php');
#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Search Activities - Sony AutoParts";
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
} elseif($_SESSION['global_wloggedin']!="true" || ($adminwtp != md5(1)) || ($adminwtp != md5(3))){  
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
} else {
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
}

if($adminwtp == md5(2)) {
	header('Location: error.php');	
	die;
} elseif($userwactn != md5(2)) {
	header('Location: error.php');	
	die;
}
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

$obj_schdata=new searchdata;

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";
/*--------------------------------------------------------------------------------*/

$vndrid = isset($_REQUEST['id']) ? base64_decode($_REQUEST['id']) : "";
$smarty->assign('vndrid',$_REQUEST['id']); 
$smarty->assign('vndrname',pobe_siteuser_name($vndrid)); 
$smarty->assign('username',pobe_user_username($vndrid)); 

/*--------------------------------------------------------------------------------*/
//print_r($_REQUEST);

/*--------------------------------------------------------------------------------*/

$page = isset($_REQUEST['pg']) ? trim($_REQUEST['pg']) : 1;
$ppage = isset($_REQUEST['p']) ? trim($_REQUEST['p']) : 100;
$per_page = isset($_REQUEST['p']) ? trim($_REQUEST['p']) : 100;
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
	if($_REQUEST['mode']=="show")
	{	
		//$count=$obj_schdata->count_searchdata_details(array('userid'=>addslashes($vndrid), 'status'=>'1'));
		$count=$obj_schdata->count_searchdata_last_100days($vndrid);

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
		
		//$ret_cur=$obj_schdata->get_searchdata($start,$limit,array('userid'=>addslashes($vndrid), 'status'=>'1'));
		$ret_cur=$obj_schdata->get_searchdata_last_100days($start,$limit,$vndrid);
			
		if($ret_cur==1){
			$row_webadm=$obj_schdata->db->sql_fetchrowset();
		
			for($i=0;$i<count($row_webadm);$i++){
				if($i % 2 == 0) {
					$gsreqcnt[$i]['gry'] = 0;
				} else {
					$gsreqcnt[$i]['gry'] = 1;
				} 
				$gswebadm[$i]['cnt']=$artnum + $offset;
				$gswebadm[$i]['schid']=stripslashes($row_webadm[$i]['searchid']);
				//$gswebadm[$i]['parttype']=pobe_view_part_type($row_webadm[$i]['part_type']);
				$gswebadm[$i]['parttype']=pobe_view_part_group($row_webadm[$i]['cat_type']);   // updated on 28-01-2022 
				$gswebadm[$i]['srchtext']=stripslashes($row_webadm[$i]['searchtext']);
				$gswebadm[$i]['numresults']=$row_webadm[$i]['numofresults'];
				$gswebadm[$i]['srchdate']=pobe_format_full_datetime($row_webadm[$i]['searchdate']);
				//$gswebadm[$i]['usrstatus']="";
				$gswebadm[$i]['yesresult']=$row_webadm[$i]['yes_results'];
				$artnum++;
			} 
			$smarty->assign('gswebadm',$gswebadm);
			$smarty->assign('empty_msg',"");		
		}		

		$GLOBALS["extra_var"]='mode=show&'; 

		if(isset($total)){
			$smarty->assign('showpagination',showPaginationSchLog($page, $page_count, $range, $ppage, base64_encode($vndrid)));
			$smarty->assign('total', $total);
			$smarty->assign('frshow', $start+1);
			$smarty->assign('toshow',$start+$artnum-1);		
		}
//--------------------------------------------------------------------------------

		$output=$smarty->fetch('user_search_log.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
}

$smarty->assign('mainpage',"manage_site");
$smarty->assign('subpage',"users_activities");

$smarty->display('main.tpl');	

/*--------------------------------------------------------------------------------*/
/*
if (error_get_last()){
print_r(error_get_last());
}
*/
/*--------------------------------------------------------------------------------*/
$obj_schdata->con_close();
exit;
?>