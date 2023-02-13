<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
require("classes/partsonway.php");
include('queries.php');
#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Manage On-way Data - Sony AutoParts";
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

$obj_partows=new partsonway;

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
   	function pobe_format_sort_date_2($date)
  	{
  		if(!empty($date) && $date != '0000-00-00') {
  			list($year, $month, $day) = explode("-", $date);
 			$new_date = date("d/m/Y", mktime(0, 0, 0, $month, $day, $year));
  		} else {
  			$new_date = "";
  		}
  		
  		return $new_date;
  	}

   	function pobe_format_sort_date_3($date)
  	{
  		if(!empty($date) && $date != '0000-00-00 00:00:00') {
  			list($dt1, $dt2) = explode(" ", $date);
  			list($year, $month, $day) = explode("-", $dt1);
 			$new_date = date("d/m/Y", mktime(0, 0, 0, $month, $day, $year));
  		} else {
  			$new_date = "";
  		}
  		
  		return $new_date;
  	}
  	
/*--------------------------------------------------------------------------------*/
//print_r($_REQUEST);

if(isset($_REQUEST['mode']))
{
	if($ACT=='delete' && $ID!=''){
		$poid = base64_decode($_REQUEST['id']);
		$datedeleted = date("Y-m-d H:i:s");
		$ret_vald2=$obj_partows->update_partsonway(array('datedeleted'=>$datedeleted, 'is_deleted'=>'1'), array('id'=>$poid));
		$smarty->assign('msg',"Record deleted successfully.");
	}

	if($_REQUEST['mode']=="show")
	{	
		$count=$obj_partows->count_partsonway_details_imported();

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
		
		$ret_cur=$obj_partows->get_partsonway_details_imported($start,$limit);
			
		if($ret_cur==1){
			$row_webadm=$obj_partows->db->sql_fetchrowset();
		
			for($i=0;$i<count($row_webadm);$i++){
				if($i % 2 == 0) {
					$gsreqcnt[$i]['gry'] = 0;
				} else {
					$gsreqcnt[$i]['gry'] = 1;
				}
				// id	partid	type	po_num	supplier	rsac_ref	po_quantity	po_price	ord_date	postdate	status	datedeleted	is_deleted	
				$gswebadm[$i]['cnt']=$artnum + $offset;
				$gswebadm[$i]['numrecs']=stripslashes($row_webadm[$i]['numrecs']);
				$gswebadm[$i]['quantity']=stripslashes($row_webadm[$i]['quantity']);
				$gswebadm[$i]['price']=stripslashes($row_webadm[$i]['price']);
				$gswebadm[$i]['importdon']=pobe_format_sort_date_3($row_webadm[$i]['postdate']);
				$gswebadm[$i]['uploadno']=stripslashes($row_webadm[$i]['uploadnum']);
				$gswebadm[$i]['ponums']=pobe_view_distict_ponum($row_webadm[$i]['uploadnum']);
				$gswebadm[$i]['suppliers']=pobe_view_distict_suuplier($row_webadm[$i]['uploadnum']);
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

		$output=$smarty->fetch('onway_data_mgmt.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
}

//--------------------------------------------------------------------------------

$smarty->assign('mainpage',"manage_site");
$smarty->assign('subpage',"onway_data_mgmt");

$smarty->display('main.tpl');	

/*--------------------------------------------------------------------------------*/
$obj_partows->con_close();
exit;
?>