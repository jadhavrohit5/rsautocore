<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/partsdata.php');
include('queries.php');
	
#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Search Results - Sony AutoParts";
$GLOBALS['message']="";
#==============================================================

$user_loggedin = isset($_SESSION['user_idd']) ? $_SESSION['user_idd'] : "";
$user_idd = pobe_session_register('user_idd', '');
$adminusr = pobe_session_register('adminusr', '');
$admintpy = pobe_session_register('admintpy', '');
$useracntn = pobe_session_register('useracnt', '');
$global_loggedin = pobe_session_register('global_loggedin', '');
$vendorid = pobe_session_register('vendorid', '');
$usrtoken = pobe_session_register('usrtoken', '');

if($_SESSION['global_loggedin']=="true" || !empty($user_loggedin)) {
	$smarty->assign('loggedin','1');
} else {
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
}

if($admintpy != md5(4)) {
	header('Location: error.php');	
	die;
} elseif($useracntn != md5(3)) {
	header('Location: error.php');	
	die;
}

/*--------------------------------------------------------------------------------*/
$wuserid=base64_decode($_SESSION['user_idd']);
$tknchk = pobe_user_login_check($wuserid,$usrtoken);
if($tknchk==0) {
	if (isset($_COOKIE['rsatoken'])){
		unset($_COOKIE['rsatoken']);
		setcookie('rsatoken', '', time() - 3600, '/'); // empty value and old timestamp
	}
	header('Location: errorpage.php?msg='.base64_encode("Someone logged in from another place."));	
	die;
}
/*--------------------------------------------------------------------------------*/

#==============================================================
$smarty->assign('title',$title);
$smarty->assign('self',$_SERVER['PHP_SELF']);	
$smarty->assign('message',$GLOBALS['message']);
$smarty->assign('memberstype',$admintpy); 
#=================================================================

/*--------------------------------------------------------------------------------*/
$wuserid=base64_decode($_SESSION['user_idd']);
$smarty->assign('userfullname',pobe_siteuser_name($wuserid)); 
$smarty->assign('usertypename',pobe_siteuser_type($wuserid)); 
$vendorid=$_SESSION['vendorid'];
/*--------------------------------------------------------------------------------*/

$obj_partdt=new partsdata;

/*--------------------------------------------------------------------------------*/
$ptype = isset($_REQUEST['type']) ? trim($_REQUEST['type']) : 1;
$smarty->assign('parttype',$_REQUEST['type']);
//$smarty->assign('ptypenm',strtoupper(pobe_view_part_type($_REQUEST['type'])));
$smarty->assign('ptypenm',strtoupper(pobe_view_part_group_name($_REQUEST['type'])));

$schid = isset($_REQUEST['schid']) ? $_REQUEST['schid'] : "";
$smarty->assign('schid',$_REQUEST['schid']); 

/*--------------------------------------------------------------------------------*/
$page = (isset($_GET['pg']) && is_numeric($_GET['pg'])) ? (int)$_GET['pg'] : 1;

$smarty->assign('ptype',$ptype); 
//$smarty->assign('ptypename',pobe_view_part_type($ptype)); 
$smarty->assign('ptypename',pobe_view_part_group_name($ptype)); 
$smarty->assign('ptypeph',pobe_view_part_group_image($ptype));
$smarty->assign('page',$page); 
$smarty->assign('showpagination','');
/*--------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$CURPAGE = basename( $_SERVER[ 'PHP_SELF' ] ); // Get current page name
$smarty->assign('PAGE',$CURPAGE);

$errmessage = "";
/*--------------------------------------------------------------------------------*/

$gptype = pobe_group_part_types($ptype);    // added on 05-08-2021 

$ret_valtp=$obj_partdt->get_searchparts_details(array('searchid'=>addslashes($schid)));
$row_reqcnt=$obj_partdt->db->sql_fetchrowset();

$searchtype = stripslashes($row_reqcnt[0]['searchtype']);
$searchkey = stripslashes($row_reqcnt[0]['searchtext']);

$schtype = '0';

//if($searchtype == "by_oem") {
//	$schtype = '1';
//} else {
//	$schtype = '0';
//}

$smarty->assign('searchkey',$searchkey); 

$cntids = 0;
//$ids=$obj_partdt->quick_searchparts_ids($ptype,$searchkey,$schtype);
$ids=$obj_partdt->quick_searchparts_ids($ptype,$gptype,$searchkey);
$cntids = count($ids);

if($cntids > 0) {
	//$count=$obj_partdt->count_searchparts_results_all($ptype,$ids);
	$count=$obj_partdt->count_searchparts_results_all($gptype,$ids);
} else {
	$count=0;
}
$yescount=0;

$total=$count;
$artnum = 1;
$per_page = 12;

$page_count = ceil($total / $per_page);

if ($page > $page_count) { $page = $page_count; }
if ($page < 1) { $page = 1; }
$offset = (($page - 1) * $per_page);   

$prevpg = $page - 1;
$nextpg = $page + 1;

if ($prevpg < 1) { $prevpg = 0; }
if ($nextpg > $page_count) { $nextpg = 0; }

$start = $offset;		
$limit = $per_page;

if($count==0) $smarty->assign('empty_msg',"no items found");		

//$ret_cur=$obj_partdt->get_searchparts_results_all($start,$limit,$ptype,$ids);
$ret_cur=$obj_partdt->get_searchparts_results_all($start,$limit,$gptype,$ids);
	
if($ret_cur==1){
	$row_reqcnt=$obj_partdt->db->sql_fetchrowset();

	for($i=0;$i<count($row_reqcnt);$i++){
		if($i % 2 == 0) {
			$gsreqcnt[$i]['gry'] = 0;
		} else {
			$gsreqcnt[$i]['gry'] = 1;
		}

		$gsreqcnt[$i]['cnt']=$artnum + $offset;
		$gsreqcnt[$i]['partid']=$row_reqcnt[$i]['id'];
		$gsreqcnt[$i]['parttype']=pobe_view_part_type($row_reqcnt[$i]['part_type']);
		//-----------------------------------------------------added on 04-08-2021 
		if ($row_reqcnt[$i]['part_type'] == 2){
		$gsreqcnt[$i]['rsref']=pobe_part_rsrefno_new($row_reqcnt[$i]['id']);
		} else if (($row_reqcnt[$i]['part_type'] == 14) || ($row_reqcnt[$i]['part_type'] == 15) || ($row_reqcnt[$i]['part_type'] == 16) || ($row_reqcnt[$i]['part_type'] == 17)){
		$gsreqcnt[$i]['rsref']=pobe_get_group_rsac_num($row_reqcnt[$i]['id']);
		} else {
		$gsreqcnt[$i]['rsref']=stripslashes($row_reqcnt[$i]['rsac']);
		}
		//-----------------------------------------------------
		$gsreqcnt[$i]['a_grade']=stripslashes($row_reqcnt[$i]['a_grade']);
		$gsreqcnt[$i]['b_grade']=stripslashes($row_reqcnt[$i]['b_grade']);
		$gsreqcnt[$i]['t_stock']=stripslashes($row_reqcnt[$i]['target_stock']);
		//$gsreqcnt[$i]['req_qty']=$row_reqcnt[$i]['target_stock'] - $row_reqcnt[$i]['a_grade'] - $row_reqcnt[$i]['b_grade'] - pobe_part_stock_offered($row_reqcnt[$i]['id']) - pobe_part_stock_cart_quntity($vendorid,$wuserid,$row_reqcnt[$i]['id']);

		////$gsreqcnt[$i]['req_qty']=$row_reqcnt[$i]['target_stock'] - $row_reqcnt[$i]['a_grade'] - $row_reqcnt[$i]['b_grade'] - pobe_part_stock_offered($row_reqcnt[$i]['id']) - pobe_part_stock_cart_totqnty($row_reqcnt[$i]['id']);

		if (($row_reqcnt[$i]['part_type'] == 14) || ($row_reqcnt[$i]['part_type'] == 15) || ($row_reqcnt[$i]['part_type'] == 16) || ($row_reqcnt[$i]['part_type'] == 17)){
			$gsreqcnt[$i]['req_qty']=$row_reqcnt[$i]['target_stock'] - pobe_group_total_stock($row_reqcnt[$i]['id'], $row_reqcnt[$i]['part_type']) - pobe_part_stock_offered($row_reqcnt[$i]['id']) - pobe_part_stock_cart_totqnty($row_reqcnt[$i]['id']) - pobe_part_stock_imported_qnty($row_reqcnt[$i]['id']);         // updated on 24-03-2022
		} else {
			$gsreqcnt[$i]['req_qty']=$row_reqcnt[$i]['target_stock'] - $row_reqcnt[$i]['a_grade'] - $row_reqcnt[$i]['b_grade'] - pobe_part_stock_offered($row_reqcnt[$i]['id']) - pobe_part_stock_cart_totqnty($row_reqcnt[$i]['id']) - pobe_part_stock_imported_qnty($row_reqcnt[$i]['id']);         // updated on 24-03-2022 
		}
		///$gsreqcnt[$i]['req_qty']=$row_reqcnt[$i]['target_stock'] - $row_reqcnt[$i]['a_grade'] - $row_reqcnt[$i]['b_grade'] - pobe_part_stock_offered($row_reqcnt[$i]['id']) - pobe_part_stock_cart_totqnty($row_reqcnt[$i]['id']) - pobe_part_stock_imported_qnty($row_reqcnt[$i]['id']);         // updated on 24-03-2022 

		//echo "<br>target_stock=".$row_reqcnt[$i]['target_stock']." a_grade=".$row_reqcnt[$i]['a_grade']." b_grade=".$row_reqcnt[$i]['b_grade']." stock_offered=".pobe_part_stock_offered($row_reqcnt[$i]['id'])." cart_totqnty=".pobe_part_stock_cart_totqnty($row_reqcnt[$i]['id'])." imported_qnty=".pobe_part_stock_imported_qnty($row_reqcnt[$i]['id']);

		$gsreqcnt[$i]['pphoto']=pobe_view_part_image($row_reqcnt[$i]['id']);
		if ($gsreqcnt[$i]['req_qty'] > 0) {
		$yescount=$gsreqcnt[$i]['req_qty'] + $yescount;
		}
		$artnum++;
	} 
	$smarty->assign('gsreqcnt',$gsreqcnt);
}		

if($yescount > 0) {
	$ret_vala=$obj_partdt->update_searchparts(array('numofresults'=>$count,'yes_results'=>'1'),array('searchid'=>addslashes($schid)));
} else {
	$ret_valc=$obj_partdt->update_searchparts(array('numofresults'=>$count),array('searchid'=>addslashes($schid)));
}

$GLOBALS["extra_var"]='mode=show&'; 

if(isset($total)){
	$smarty->assign('total', $total);
	$smarty->assign('prevpg', $prevpg);		
	$smarty->assign('nextpg', $nextpg);
}

$type_opt = explode(",", pobe_user_part_type($wuserid));
//$smarty->assign('myparttypelist',pobe_parttype_list_upd($type_opt));
//	added on 05-08-2021  
$smarty->assign('myparttypelist',pobe_partgroup_list_upd($type_opt));
//---------------
$smarty->assign('numofcartitems',pobe_total_cart_items($vendorid,$wuserid));
$smarty->assign('vdrcur',pobe_vendor_currency($wuserid));

$smarty->assign('pagenm',"search_results");

$output=$smarty->fetch('search_results.tpl');
$smarty->assign('MAIN_CONTENT',$output);

$smarty->display('main.tpl');	
/*--------------------------------------------------------------------------------*/
$obj_partdt->con_close();
exit;
?>