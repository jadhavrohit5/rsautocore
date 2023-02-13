<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/partsdata.php');
include('classes/partstype.php');
include('queries.php');
	
#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Add Part - Sony AutoParts";
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

$obj_partdt=new partsdata;
$obj_parttp=new partstype;

/*--------------------------------------------------------------------------------*/
$psect = "add_part";
if((pobe_user_part_sect_access(base64_decode($user_id), $psect) != 1) && ($admintp != md5(3))) {
	header('Location: error_page.php?msg='.base64_encode("You don't have access to this section"));	
	die;
}
/*--------------------------------------------------------------------------------*/
//echo "=================================================<br><br><br><br><br>";
//print_r($_REQUEST);
/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";

$parttype = trim($_REQUEST['parttype']);   
$smarty->assign('parttype',$_REQUEST['parttype']);

/*--------------------------------------------------------------------------------*/

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'postnewpart') {

	$rsac = trim($_POST['rsac']);
	$target_stock = isset($_POST['target_stock']) ? (int)$_POST['target_stock'] : 0;

	$sell_price = isset($_POST['sell_price']) ? (float)$_POST['sell_price'] : 0.00;

	$oe_number = isset($_POST['oe_number']) ? $_POST['oe_number'] : "";
	$oem_number = isset($_POST['oem_number']) ? $_POST['oem_number'] : "";

	$manufacturer = isset($_POST['manufacturer']) ? $_POST['manufacturer'] : "";
	$make = isset($_POST['make']) ? $_POST['make'] : "";
	$model = isset($_POST['model']) ? $_POST['model'] : "";
	$years = isset($_POST['years']) ? $_POST['years'] : "";
	$notes = $_POST['notes'];
	$oeoemopt = $_POST['oeoemopt'];
	$stockopt = $_POST['stockopt'];

	$oeone = isset($_POST['oeone']) ? $_POST['oeone'] : "";
	$oetwo = isset($_POST['oetwo']) ? $_POST['oetwo'] : "";
	$oemone = isset($_POST['oemone']) ? $_POST['oemone'] : "";
	$oemtwo = isset($_POST['oemtwo']) ? $_POST['oemtwo'] : "";
	$qntydata = isset($_POST['qtydata']) ? (int)$_POST['qtydata'] : 0;
	$location = isset($_POST['location']) ? $_POST['location'] : "";

	$exist_rsac=0;
	$exist_rsac+=$obj_partdt->count_partsdata_details(array('group_rsac'=>addslashes($rsac)));	
	//echo "================================================= ".$exist_rsac."<br>";
/* */
	if($exist_rsac==0) {

		$byuser="admin";
		$oldpartid=0;
		$partno = 0;
		$dateposted = date("Y-m-d H:i:s");
//--------------------------------------------------------------------------------

		$ret_val=$obj_partdt->add_partsdata(array('rsac'=>addslashes($rsac), 'part_type'=>addslashes($parttype), 'make'=>addslashes($make), 'manufacturer'=>addslashes($manufacturer), 'model'=>addslashes($model), 'years'=>addslashes($years), 'target_stock'=>addslashes($target_stock), 'sell_price'=>addslashes($sell_price), 'notes'=>addslashes($notes), 'postdate'=>$dateposted, 'status'=>'0', 'postbyuser'=>$wuserid, 'last_updated'=>$dateposted, 'oldpartid'=>$oldpartid, 'group_rsac'=>addslashes($rsac), 'is_main'=>'1'));

		if($obj_partdt->get_partsdata_details(array('group_rsac'=>addslashes($rsac),'part_type'=>addslashes($parttype),'postdate'=>$dateposted))){
			$row_partdt=$obj_partdt->db->sql_fetchrowset();
			$newpartid=$row_partdt[0]['id'];

			$ret_val2=$obj_partdt->add_partsdata_desc(array('partid'=>addslashes($newpartid), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted));

			$ret_val3=$obj_partdt->add_partsdata_oe_stock(array('partid'=>addslashes($newpartid), 'ptype'=>addslashes($parttype), 'oe_one'=>addslashes($oeone), 'oe_two'=>addslashes($oetwo), 'oemone'=>addslashes($oemone), 'oemtwo'=>addslashes($oemtwo), 'qty_data'=>addslashes($qntydata), 'location'=>addslashes($location), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted, 'partno'=>addslashes($partno), 'groupno'=>addslashes($rsac),'is_deleted'=>'0'));

			if($oeoemopt == '1') {
				$ret_val4=$obj_partdt->add_partsdata_oeref(array('partid'=>addslashes($newpartid), 'oe_number'=>addslashes($oe_number), 'oem_number'=>addslashes($oem_number), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted));
			}

			if(isset($_POST['attr'])) {
				foreach($_POST['attr'] as $attrno => $val){
					if (isset($val) && $val != ''){
						$ret_val5=$obj_partdt->add_partsdata_attr(array('attrid'=>addslashes($attrno), 'partid'=>addslashes($newpartid), 'attrdata'=>addslashes($val), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted));
					}
				}
			} 

			if(isset($_POST['cust'])) {
				foreach($_POST['cust'] as $custno => $val){
					if (isset($val) && $val != ''){
						$ret_val6=$obj_partdt->add_partsdata_cref(array('custid'=>addslashes($custno), 'partid'=>addslashes($newpartid), 'crdata'=>addslashes($val), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted));
					}
				}
			} 
				
			$ret_valup=$obj_partdt->update_partsdata(array('status'=>'1'), array('id'=>$newpartid));
//--------------------------------------------------------------------------------
			header('location: add_part.php?mode=show&type='.$parttype.'&msg='.base64_encode("New part added successfully."));
			die;
		}
	} else {
		$smarty->assign('msg',"Error - A part with this RSAC already exist.");
	}

}

/*--------------------------------------------------------------------------------*/
/*
*/
$rsac = isset($_REQUEST['rsac']) ? $_REQUEST['rsac'] : "";
$target_stock = isset($_REQUEST['target_stock']) ? $_REQUEST['target_stock'] : "";

$manufacturer = isset($_REQUEST['manufacturer']) ? $_REQUEST['manufacturer'] : "";
$sell_price = isset($_REQUEST['sell_price']) ? $_REQUEST['sell_price'] : "";
$make = isset($_REQUEST['make']) ? $_REQUEST['make'] : "";
$model = isset($_REQUEST['model']) ? $_REQUEST['model'] : "";
$years = isset($_REQUEST['years']) ? $_REQUEST['years'] : "";
$notes = isset($_REQUEST['notes']) ? $_REQUEST['notes'] : "";

$oe_number = isset($_REQUEST['oe_number']) ? $_REQUEST['oe_number'] : "";
$oem_number = isset($_REQUEST['oem_number']) ? $_REQUEST['oem_number'] : "";

$smarty->assign('rsac',$rsac); 
$smarty->assign('target_stock',$target_stock); 
$smarty->assign('manufacturer',$manufacturer); 
$smarty->assign('sell_price',$sell_price); 
$smarty->assign('make',$make); 
$smarty->assign('model',$model); 
$smarty->assign('years',$years); 
$smarty->assign('notes',$notes); 

$smarty->assign('oe_number',$oe_number); 
$smarty->assign('oem_number',$oem_number); 

/*--------------------------------------------------------------------------------*/

if(isset($_REQUEST['parttype'])){  

	$ret_valtp=$obj_parttp->get_partstype_details(array('id'=>addslashes($parttype)));
	$row_reqcnt=$obj_parttp->db->sql_fetchrowset();

	$smarty->assign('ptypenm',strtoupper(stripslashes($row_reqcnt[0]['part_type'])));
	$smarty->assign('stockopt',stripslashes($row_reqcnt[0]['stockopt']));
	$smarty->assign('oeoemopt',stripslashes($row_reqcnt[0]['oeoemopt']));
	$part_opt = explode(",", $row_reqcnt[0]['part_opt']);
	$cust_opt = explode(",", $row_reqcnt[0]['cust_opt']);
	$attr_opt = explode(",", $row_reqcnt[0]['attr_opt']);  

	$attributelist = pobe_attribute_list_chk($attr_opt);
	$smarty->assign('attributelist',$attributelist);

	$customerlist = pobe_customer_opt_list($cust_opt);
	$smarty->assign('customerlist',$customerlist);

	$output=$smarty->fetch('add_new_item.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}
	
$smarty->assign('mainpage',"manage_site");
$smarty->assign('subpage',"add_part");
$smarty->assign('ptype',"");

$smarty->display('main.tpl');	
/*--------------------------------------------------------------------------------*/
/*
if (error_get_last()){
$smarty->assign('errorgetlast',print_r(error_get_last()));
} else {
$smarty->assign('errorgetlast','');
}
*/
/*--------------------------------------------------------------------------------*/
?>