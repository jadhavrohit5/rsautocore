<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/regsearchdata.php');
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

$obj_schdata=new regsearchdata;

/*--------------------------------------------------------------------------------*/
$schid = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
$smarty->assign('schid',$_REQUEST['id']); 

$carid = isset($_REQUEST['carid']) ? $_REQUEST['carid'] : "";
$smarty->assign('carid',$_REQUEST['carid']); 

$dateposted = date("Y-m-d H:i:s");

$ptype = isset($_REQUEST['type']) ? trim($_REQUEST['type']) : 1;
$gptype = pobe_group_part_types($ptype);    // added on 05-08-2021 

/*--------------------------------------------------------------------------------*/
$ret_valpt=$obj_schdata->get_regsearchdata_details(array('id'=>addslashes($schid),'carid'=>addslashes($carid)));
$rowvd=$obj_schdata->db->sql_fetchrowset();

$smarty->assign('reg_num',stripslashes($rowvd[0]['regno']));
/*--------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------*/
$page = (isset($_GET['pg']) && is_numeric($_GET['pg'])) ? (int)$_GET['pg'] : 1;

$smarty->assign('page',$page); 
$smarty->assign('showpagination','');
/*--------------------------------------------------------------------------------*/
/*
//echo "<pre>";
//print_r($_REQUEST);
//echo "</pre>";
*/
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

$count=$obj_schdata->count_regsearchdata_matched_results($schid,$carid);
//echo "=================================================<br><br>count= ".$count . "<BR>";
pobe_regno_search_numofresults($schid,$count);

$yescount=0;

$total=$count;
$artnum = 1;
$per_page = 100;

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

//$ret_cur=$obj_schdata->get_regsearchdata_matched_results($start,$limit,$schid,$carid);  

$ret_cur=$obj_schdata->get_regsearchdata_matched_results($schid,$carid);  
	
if($ret_cur==1){
	$row_reqcnt=$obj_schdata->db->sql_fetchrowset();

	for($i=0;$i<count($row_reqcnt);$i++){
		if($i % 2 == 0) {
			$gsreqcnt[$i]['gry'] = 0;
		} else {
			$gsreqcnt[$i]['gry'] = 1;
		}

		$gsreqcnt[$i]['cnt']=$artnum + $offset;
		$gsreqcnt[$i]['itemid']=$row_reqcnt[$i]['itemid'];
		$gsreqcnt[$i]['partid']=$row_reqcnt[$i]['partid'];
		$gsreqcnt[$i]['parttp']=$row_reqcnt[$i]['part_type'];
		//$gsreqcnt[$i]['parttype']=pobe_view_part_type($row_reqcnt[$i]['part_type']);
		$gsreqcnt[$i]['parttype']=pobe_view_groupname_from_type($row_reqcnt[$i]['part_type']);
		//-----------------------------------------------------
		if ($row_reqcnt[$i]['part_type'] == 2){
		$gsreqcnt[$i]['rsref']=pobe_part_rsrefno_new($row_reqcnt[$i]['partid']);
		} else {
		$gsreqcnt[$i]['rsref']=stripslashes($row_reqcnt[$i]['rsac']);
		}
		$gsreqcnt[$i]['itm_manu']=stripslashes($row_reqcnt[$i]['manufacturer']);

		if (($row_reqcnt[$i]['part_type'] == 9) || ($row_reqcnt[$i]['part_type'] == 10) || ($row_reqcnt[$i]['part_type'] == 11)){
		$gsreqcnt[$i]['itm_type']=pobe_view_attribute_data($row_reqcnt[$i]['partid'],1);
		}

		$gsreqcnt[$i]['itm_turn']=pobe_view_attribute_data($row_reqcnt[$i]['partid'],10);
		$gsreqcnt[$i]['p_price']=pobe_view_attribute_data($row_reqcnt[$i]['partid'],4);
		$gsreqcnt[$i]['sensor']=pobe_view_attribute_data($row_reqcnt[$i]['partid'],20);

		if ($row_reqcnt[$i]['part_type'] == 2){
		$gsreqcnt[$i]['itm_position']=pobe_view_attribute_data($row_reqcnt[$i]['partid'],21);
		$gsreqcnt[$i]['disc_diameter']=pobe_view_attribute_data($row_reqcnt[$i]['partid'],22);
		$gsreqcnt[$i]['disc_width']=pobe_view_attribute_data($row_reqcnt[$i]['partid'],23);
		//$gsreqcnt[$i]['leading_trailing']=pobe_view_attribute_data($row_reqcnt[$i]['partid'],24);
		}

		$gsreqcnt[$i]['oenumbers']=pobe_view_oe_numbers_td($row_reqcnt[$i]['partid'],$row_reqcnt[$i]['part_type']);

		$gsreqcnt[$i]['tdrefno']=stripslashes($row_reqcnt[$i]['articleno']);
		$gsreqcnt[$i]['brandnm']=pobe_brand_name($row_reqcnt[$i]['brandno']);

		//-----------------------------------------------------
		$gsreqcnt[$i]['tdrefno']=stripslashes($row_reqcnt[$i]['articleno']);
		$gsreqcnt[$i]['brandnm']=pobe_brand_name($row_reqcnt[$i]['brandno']);
		//-----------------------------------------------------
		//$gsreqcnt[$i]['a_grade']=stripslashes($row_reqcnt[$i]['a_grade']);
		//$gsreqcnt[$i]['b_grade']=stripslashes($row_reqcnt[$i]['b_grade']);
		//$gsreqcnt[$i]['t_stock']=stripslashes($row_reqcnt[$i]['target_stock']);

		////$gsreqcnt[$i]['req_qty']=$row_reqcnt[$i]['target_stock'] - $row_reqcnt[$i]['a_grade'] - $row_reqcnt[$i]['b_grade'] - pobe_part_stock_offered($row_reqcnt[$i]['partid']) - pobe_part_stock_cart_totqnty($row_reqcnt[$i]['partid']);

		$gsreqcnt[$i]['req_qty']=$row_reqcnt[$i]['target_stock'] - $row_reqcnt[$i]['a_grade'] - $row_reqcnt[$i]['b_grade'] - pobe_part_stock_offered($row_reqcnt[$i]['partid']) - pobe_part_stock_cart_totqnty($row_reqcnt[$i]['partid']) - pobe_part_stock_imported_qnty($row_reqcnt[$i]['partid']);         // updated on 24-03-2022 

		$gsreqcnt[$i]['pphoto']=pobe_view_part_image($row_reqcnt[$i]['partid']);

		$artnum++;
	} 
	$smarty->assign('gsreqcnt',$gsreqcnt);
}		

$GLOBALS["extra_var"]='mode=show&'; 

if(isset($total)){
	$smarty->assign('total', $total);
	$smarty->assign('prevpg', $prevpg);		
	$smarty->assign('nextpg', $nextpg);
}

//-----------------------------------------------------
//$smarty->assign('npcartitems',pobe_npsearch_cart_items($schid));
//-----------------------------------------------------

$type_opt = explode(",", pobe_user_part_type($wuserid));

$smarty->assign('myparttypelist',pobe_partgroup_list_upd($type_opt));
//---------------
$smarty->assign('numofcartitems',pobe_total_cart_items($vendorid,$wuserid));
$smarty->assign('vdrcur',pobe_vendor_currency($wuserid));

$smarty->assign('pagenm',"matched_results");

$output=$smarty->fetch('matched_results.tpl');
$smarty->assign('MAIN_CONTENT',$output);

$smarty->display('main.tpl');	
/*--------------------------------------------------------------------------------*/
$obj_schdata->con_close();
exit;
?>