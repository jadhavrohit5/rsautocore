<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/partsdata.php');
include('classes/partsoffered.php');
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
$vendorid=$_SESSION['vendorid'];
/*--------------------------------------------------------------------------------*/

$obj_partdt=new partsdata;
$obj_offerd=new partsoffered;

/*--------------------------------------------------------------------------------*/
$ptype = isset($_REQUEST['type']) ? trim($_REQUEST['type']) : 1;
$smarty->assign('parttype',$_REQUEST['type']);
//$smarty->assign('ptypenm',strtoupper(pobe_view_part_type($_REQUEST['type'])));
$smarty->assign('ptypenm',strtoupper(pobe_view_part_group_name($_REQUEST['type'])));
$smarty->assign('ptypeph',pobe_view_part_group_image($ptype));

$schid = isset($_REQUEST['schid']) ? $_REQUEST['schid'] : "";
$smarty->assign('schid',$_REQUEST['schid']); 
$smarty->assign('searchkey',pobe_view_search_key($schid));    // added on 15-03-2022 

$partid = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
$smarty->assign('partid',$_REQUEST['id']); 
/*--------------------------------------------------------------------------------*/
//echo "=================================================<br><br><br><br><br>";
//print_r($_REQUEST);
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

$ret_valpt=$obj_partdt->get_partsdata_details(array('id'=>addslashes($partid)));
$rowpartdt=$obj_partdt->db->sql_fetchrowset();
//print_r($rowpartdt);
//$ptrsac = stripslashes($rowpartdt[0]['rsac']);
//--------------------------------------added on 04-08-2021 
if ($ptype == 2){
$ptrsac = pobe_part_rsrefno_new($partid);
} else if (($ptype == 9) || ($ptype == 10) || ($ptype == 11) || ($ptype == 12)){
$ptrsac = pobe_get_group_rsac_num($partid);
} else {
$ptrsac = stripslashes($rowpartdt[0]['rsac']);
}
//---------------------------------------
$agrade = (int)stripslashes($rowpartdt[0]['a_grade']);
$bgrade = (int)stripslashes($rowpartdt[0]['b_grade']);
$tstock = (int)stripslashes($rowpartdt[0]['target_stock']);
$ofrqty = pobe_part_stock_offered($partid);
$ofrqty_tot = pobe_part_stock_cart_totqnty($partid);
$imptdqnty = pobe_part_stock_imported_qnty($partid);       // added on 24-03-2022
//$reqqty = $tstock - $agrade - $bgrade - $ofrqty - $ofrqty_tot;
///$reqqty = $tstock - $agrade - $bgrade - $ofrqty - $ofrqty_tot - $imptdqnty;     // updated on 24-03-2022 

// updated on 06-02-2023 
if (($ptype == 9) || ($ptype == 10) || ($ptype == 11) || ($ptype == 12)){
	$grtotstock = pobe_group_total_stock($partid);
	$reqqty = $tstock - $grtotstock - $ofrqty - $ofrqty_tot - $imptdqnty;   
	//echo "<br>". $reqqty ." + ". $tstock ." + ". $grtotstock ." + ". $ofrqty ." + ". $ofrqty_tot ." + ". $imptdqnty ."<br>";   
} else {
	$reqqty = $tstock - $agrade - $bgrade - $ofrqty - $ofrqty_tot - $imptdqnty;     // updated on 24-03-2022 
}

//$purchaseprice = stripslashes($rowpartdt[0]['purchase_price']);
//$pprice = number_format(($purchaseprice), 2, '.', '');
$pprice = pobe_view_purchase_price($partid);     //  added on 01-03-2022 

//-----------------------------------------------------------------------------------added on 26-02-2020 
$myofrqty = pobe_part_stock_cart_quntity($vendorid,$wuserid,$partid);
//$myreqqty = $reqqty - $myofrqty;
$myreqqty = $reqqty;
//-----------------------------------------------------------------------------------

$smarty->assign('ptrsac',$ptrsac); 
$smarty->assign('reqqty',$reqqty); 
$smarty->assign('myreqqty',$myreqqty); 
$smarty->assign('pprice',$pprice);

$supplyqty = isset($_REQUEST['supplyqty']) ? $_REQUEST['supplyqty'] : '';
$smarty->assign('supplyqty',$supplyqty); 

$cnt_ofrd = pobe_count_part_offered($vendorid,$wuserid,$partid);
$smarty->assign('cnt_ofrd',$cnt_ofrd); 
/*--------------------------------------------------------------------------------*/

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'partsupply') {
	$supplyqty = (int)$_POST['supplyqty'];
	$requirqty = (int)$_POST['requirqty'];
	$partprice = $_POST['partprice'];
	$part_rsac = $_POST['part_rsac'];
//-----------------------------------------------------------------------------------added on 26-02-2020
	if ($myofrqty > 0){
		$supplyqty = $supplyqty + $myofrqty;
	}
//-----------------------------------------------------------------------------------

	if($supplyqty < 1) {
		$smarty->assign('msg',"Error - Supply Quantity less than 1.");
	} elseif($supplyqty > $requirqty) {
 		$smarty->assign('msg',"Error - Supply Quantity more than Required Quantity.");
	} else {
		$dateposted = date("Y-m-d H:i:s");
		$sch_type = "kw";  // added on 06-01-2022 

		$tot_price = number_format(($supplyqty * $partprice), 2, '.', '');

		if ($myofrqty > 0){
			$ret_val3=$obj_offerd->update_partsoffered(array('searchid'=>addslashes($schid), 'sch_type'=>addslashes($sch_type), 'required_stock'=>addslashes($requirqty), 'purchase_price'=>addslashes($partprice), 'offered_stock'=>addslashes($supplyqty), 'offered_price'=>addslashes($tot_price), 'status'=>'1', 'last_updated'=>$dateposted),array('vendortmp'=>addslashes($vendorid), 'userid'=>addslashes($wuserid), 'partid'=>addslashes($partid)));

			header('location: order_list.php?id='.$schid);
			die;
		} else {
			$ptypeidd = pobe_part_type_id($partid);    // added on 05-08-2021 

			//$ret_val3=$obj_offerd->add_partsoffered(array('vendortmp'=>addslashes($vendorid), 'userid'=>addslashes($wuserid), 'searchid'=>addslashes($schid), 'partid'=>addslashes($partid), 'part_type'=>addslashes($ptype), 'rsac_ref'=>addslashes($part_rsac), 'required_stock'=>addslashes($requirqty), 'purchase_price'=>addslashes($partprice), 'offered_stock'=>addslashes($supplyqty), 'offered_price'=>addslashes($tot_price), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted));

			$ret_val3=$obj_offerd->add_partsoffered(array('vendortmp'=>addslashes($vendorid), 'userid'=>addslashes($wuserid), 'searchid'=>addslashes($schid), 'partid'=>addslashes($partid), 'part_type'=>addslashes($ptypeidd), 'rsac_ref'=>addslashes($part_rsac), 'sch_type'=>addslashes($sch_type), 'required_stock'=>addslashes($requirqty), 'purchase_price'=>addslashes($partprice), 'offered_stock'=>addslashes($supplyqty), 'offered_price'=>addslashes($tot_price), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted));

			if($obj_offerd->get_partsoffered_details(array('vendortmp'=>addslashes($vendorid), 'userid'=>addslashes($wuserid), 'searchid'=>addslashes($schid), 'postdate'=>$dateposted))){
				$row_offerd=$obj_offerd->db->sql_fetchrowset();
				$ofpid=$row_offerd[0]['id'];

				header('location: order_list.php?id='.$schid);
				die;
			} else {
				$smarty->assign('msg',"Error - Please try again.");
			}
		}
	}

}

/*--------------------------------------------------------------------------------*/
//	added on 15-10-2020 
$type_opt = explode(",", pobe_user_part_type($wuserid));
//$smarty->assign('myparttypelist',pobe_parttype_list_upd($type_opt));
//	added on 05-08-2021  
$smarty->assign('myparttypelist',pobe_partgroup_list_upd($type_opt));
//---------------
$smarty->assign('numofcartitems',pobe_total_cart_items($vendorid,$wuserid));
$smarty->assign('vdrcur',pobe_vendor_currency($wuserid));

$smarty->assign('pagenm',"reqmt_desc");

$output=$smarty->fetch('reqmt_desc.tpl');
$smarty->assign('MAIN_CONTENT',$output);

$smarty->display('main.tpl');	
/*--------------------------------------------------------------------------------*/
$obj_partdt->con_close();
exit;
?>