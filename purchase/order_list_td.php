<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/regsearchoffer.php');
include('queries.php');
	
#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Search - Sony AutoParts";
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
/*--------------------------------------------------------------------------------*/

$obj_offerd=new regsearchoffer;

/*--------------------------------------------------------------------------------*/
$schid = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
$smarty->assign('schid',$_REQUEST['id']); 

$carid = isset($_REQUEST['carid']) ? $_REQUEST['carid'] : "";
$smarty->assign('carid',$_REQUEST['carid']); 

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$CURPAGE = basename( $_SERVER[ 'PHP_SELF' ] ); // Get current page name
$smarty->assign('PAGE',$CURPAGE);
$smarty->assign('parttype',"");

$errmessage = "";
/*--------------------------------------------------------------------------------*/

if(isset($_REQUEST['pageaction']) && $_REQUEST['pageaction'] == 'delete') {
	$ofridd = base64_decode($_REQUEST['itmid']);
	//$ret_val=$obj_offerd->delete_regsearchoffer(array('id'=>$ofridd));
	$ret_val=$obj_offerd->update_regsearchoffer(array('status'=>'0','is_deleted'=>'1'),array('id'=>addslashes($ofridd)));
	$smarty->assign('msg',"Item deleted successfully.");
}
/*--------------------------------------------------------------------------------*/

$count=$obj_offerd->count_regsearchoffer_details(array('vendortmp'=>addslashes($vendorid),'userid'=>addslashes($wuserid),'status'=>'1','is_deleted'=>'0'));

$artnum = 1;
$start = 0;		
$total=$count;
$smarty->assign('total', $total);

if($count==0) $smarty->assign('empty_msg',"no items found");		

$ret_cur=$obj_offerd->get_regsearchoffer($start,$total,array('vendortmp'=>addslashes($vendorid),'userid'=>addslashes($wuserid),'status'=>'1','is_deleted'=>'0'));
	
if($ret_cur==1){
	$row_offrcnt=$obj_offerd->db->sql_fetchrowset();

	for($i=0;$i<count($row_offrcnt);$i++){
		if($i % 2 == 0) {
			$gsoffrcnt[$i]['gry'] = 0;
		} else {
			$gsoffrcnt[$i]['gry'] = 1;
		}
		$gsoffrcnt[$i]['cnt']=$artnum;
		$gsoffrcnt[$i]['offrid']=base64_encode($row_offrcnt[$i]['id']);
		$gsoffrcnt[$i]['partid']=$row_offrcnt[$i]['partid'];
		$gsoffrcnt[$i]['parttype']=pobe_view_part_type($row_offrcnt[$i]['part_type']);
		$gsoffrcnt[$i]['rsac_ref']=stripslashes($row_offrcnt[$i]['rsac_ref']);
		$gsoffrcnt[$i]['articleno']=stripslashes($row_offrcnt[$i]['articleno']);
		$gsoffrcnt[$i]['reqstock']=stripslashes($row_offrcnt[$i]['required_stock']);
		$gsoffrcnt[$i]['buyprice']=stripslashes($row_offrcnt[$i]['purchase_price']);
		$gsoffrcnt[$i]['ofrstock']=stripslashes($row_offrcnt[$i]['offered_stock']);
		$gsoffrcnt[$i]['ofrprice']=stripslashes($row_offrcnt[$i]['offered_price']);
		// added for photo
		$gsoffrcnt[$i]['pphoto']=pobe_view_part_image($row_offrcnt[$i]['partid']);
		$gsoffrcnt[$i]['oenum']=pobe_offered_item_oenum($row_offrcnt[$i]['searchid']);

		$artnum++;
	} 
	$smarty->assign('gsoffrcnt',$gsoffrcnt);
}		

$GLOBALS["extra_var"]='mode=show&'; 

/*--------------------------------------------------------------------------------*/
$type_opt = explode(",", pobe_user_part_type($wuserid));
$smarty->assign('myparttypelist',pobe_partgroup_list_upd($type_opt));
//---------------
$smarty->assign('numofcartitems',pobe_total_cart_items($vendorid,$wuserid));
$smarty->assign('vdrcur',pobe_vendor_currency($wuserid));

$output=$smarty->fetch('order_list_td.tpl');
$smarty->assign('MAIN_CONTENT',$output);

$smarty->display('main.tpl');	
/*--------------------------------------------------------------------------------*/
$obj_offerd->con_close();
exit;
?>