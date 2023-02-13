<?php
ob_start();
ini_set('max_execution_time', 0);
//echo "==========================================================".date('Y-m-d H:i:s')."<br>";
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/partstock.php');
include('queries.php');

#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Sales Data Report - Sony AutoParts";
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
$smarty->assign('memberstype',$admintp); 
#=================================================================

/*--------------------------------------------------------------------------------*/
$wuserid=base64_decode($_SESSION['user_id']);
$smarty->assign('userfullname',pobe_siteuser_name($wuserid)); 
$smarty->assign('usertypename',pobe_siteuser_type($wuserid)); 
/*--------------------------------------------------------------------------------*/

$obj_partstk=new partstock;

/*--------------------------------------------------------------------------------*/
$psect = "manage_reports";
if((pobe_user_part_sect_access(base64_decode($user_id), $psect) != 1) && ($admintp != md5(3))) {
	header('Location: error_page.php?msg='.base64_encode("You don't have access to this section"));	
	die;
}
/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";
/*--------------------------------------------------------------------------------*/
//$parttype = isset($_REQUEST['parttype']) ? trim($_REQUEST['parttype']) : 0;
/*--------------------------------------------------------------------------------*/

$page = isset($_REQUEST['pg']) ? trim($_REQUEST['pg']) : 1;
$ptype = isset($_REQUEST['type']) ? trim($_REQUEST['type']) : 1;
$ppage = isset($_REQUEST['p']) ? trim($_REQUEST['p']) : 50;
$per_page = isset($_REQUEST['p']) ? trim($_REQUEST['p']) : 50;
//echo "==========================================".$per_page;

$offset = isset($offset) ? $offset : 0;
//echo "================================================".$offset;
$smarty->assign('ptype',$ptype); 
$smarty->assign('ptypename',pobe_view_part_type($ptype)); 
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
$today = date("Y-m-d");
$startday = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d"), date("Y")-1));
$smarty->assign('today',pobe_format_date($today)); 
$smarty->assign('startday',pobe_format_date($startday)); 

/*--------------------------------------------------------------------------------*/

if(isset($_REQUEST['mode']))
{
	if($_REQUEST['mode']=="show")
	{	
		$count=$obj_partstk->count_partstock_sales_data($ptype,$startday);

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

		if($count==0) $smarty->assign('empty_msg',"no items found");		
		
		///$ret_cur=$obj_partstk->get_partstock_sales_data($start,$limit,$ptype,$startday);
		$ret_cur=$obj_partstk->get_partstock_sales_data_avg($start,$limit,$ptype,$startday);
			
		if($ret_cur==1){
			$row_reqcnt=$obj_partstk->db->sql_fetchrowset();

			for($i=0;$i<count($row_reqcnt);$i++){
				if($i % 2 == 0) {
					$gsreqcnt[$i]['gry'] = 0;
				} else {
					$gsreqcnt[$i]['gry'] = 1;
				}

				$gsreqcnt[$i]['cnt']=$artnum + $offset;
				$gsreqcnt[$i]['pid']=stripslashes($row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['rsac']=stripslashes($row_reqcnt[$i]['rsac']);
				$gsreqcnt[$i]['purchased']=$row_reqcnt[$i]['purchased'];
				$gsreqcnt[$i]['sold']=$row_reqcnt[$i]['sold'];
				//$gsreqcnt[$i]['sumpoprice']=number_format($row_reqcnt[$i]['purchaseprice'], 2, '.', '');
				//$gsreqcnt[$i]['sumsoprice']=number_format($row_reqcnt[$i]['saleprice'], 2, '.', '');
				if ($row_reqcnt[$i]['purchaseprice'] > 0 && $row_reqcnt[$i]['purchased'] > 0){
				$gsreqcnt[$i]['purchaseprice']=number_format($row_reqcnt[$i]['purchaseprice']/$row_reqcnt[$i]['purchased'], 2, '.', '');
				} else {
				$gsreqcnt[$i]['purchaseprice']=0.00;
				}
				if ($row_reqcnt[$i]['saleprice'] > 0 && $row_reqcnt[$i]['sold'] > 0){
				$gsreqcnt[$i]['saleprice']=number_format($row_reqcnt[$i]['saleprice']/$row_reqcnt[$i]['sold'], 2, '.', '');
				} else {
				$gsreqcnt[$i]['saleprice']=0.00;
				}
				$gsreqcnt[$i]['totalqnty']=$row_reqcnt[$i]['purchased'] - $row_reqcnt[$i]['sold'];
				$artnum++;
			} 
			$smarty->assign('gsreqcnt',$gsreqcnt);
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

		$output=$smarty->fetch('sales_purchase_report.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
}
//echo "==========================================================".date('Y-m-d H:i:s')."<br>";

$smarty->assign('mainpage',"manage_reports");
$smarty->assign('subpage',"sales_purchase_report");

$smarty->display('main.tpl');	

/*
if (error_get_last()){
$smarty->assign('errorgetlast',print_r(error_get_last()));
} else {
$smarty->assign('errorgetlast','');
}
*/
/*--------------------------------------------------------------------------------*/
$obj_partstk->con_close();
exit;
?>