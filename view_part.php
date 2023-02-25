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
$title="Edit Part - Sony AutoParts";
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

//if(($admintp != md5(1)) || ($admintp != md5(3))) {
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
if(($admintp == md5(1)) || ($admintp == md5(3))) {
$smarty->assign('adminusertype',"delopt"); 
} else {
$smarty->assign('adminusertype',""); 
}
#=================================================================

/*--------------------------------------------------------------------------------*/
$wuserid=base64_decode($_SESSION['user_id']);
$smarty->assign('userfullname',pobe_siteuser_name($wuserid)); 
$smarty->assign('usertypename',pobe_siteuser_type($wuserid)); 
/*--------------------------------------------------------------------------------*/

$obj_partdt=new partsdata;
$obj_parttp=new partstype;

//echo "<br><br>============================================<br><br>";
//print_r($_REQUEST);
//echo "============================================<br><br>";
//print_r($_POST['pid']);

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}

$errmessage = "";
/*--------------------------------------------------------------------------------*/
//echo "============================================flag-0<br>";

$partid = isset($_REQUEST['partid']) ? $_REQUEST['partid'] : "";
$smarty->assign('partid',$_REQUEST['partid']); 

$ptypeid = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
$smarty->assign('ptypeid',$_REQUEST['type']); 
$smarty->assign('ptypenm',strtoupper(pobe_view_part_type($_REQUEST['type'])));

$schid = isset($_REQUEST['schid']) ? $_REQUEST['schid'] : "";
$smarty->assign('schid',$_REQUEST['schid']); 

//$smarty->assign('previd',pobe_get_prev_part($partid,$ptypeid)); 
//$smarty->assign('nextid',pobe_get_next_part($partid,$ptypeid)); 
//$smarty->assign('previd',""); 
//$smarty->assign('nextid',""); 

$byuser = "admin";
$refnum = 1;
$dateposted = date("Y-m-d H:i:s");
/*--------------------------------------------------------------------------------*/

$incqty = (int) pobe_incoming_cores_qnty($partid) + (int) pobe_imported_cores_qnty($partid);    //  added on 24-03-2022 
$smarty->assign('icqnty',$incqty);    //  updated on 24-03-2022 

//=========DELETE SCRIPTS==============================================================================
	//delete
	if(isset($_REQUEST['act']) && $_REQUEST['act'] == 'delete') {
		$psid = $_REQUEST['psid'];
		$datedeleted = date("Y-m-d H:i:s");
		$obj_partdt->update_partsdata_oe_stock(array('status'=>'0', 'last_updated'=>$datedeleted,'is_deleted'=>'1'), array('id'=>$psid,'partid'=>$partid));
		$smarty->assign('msg',"Record deleted successfully.");
	}

//=========UPDATE SCRIPTS==============================================================================
if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'updatepart') {
	//print_r($_POST);
/*
*/
	$target_stock = isset($_POST['target_stock']) ? (int)$_POST['target_stock'] : 0;
	$sell_price = isset($_POST['sell_price']) ? (float)$_POST['sell_price'] : 0.00;

	$oe_number = isset($_POST['oe_number']) ? $_POST['oe_number'] : "";
	$oem_number = isset($_POST['oem_number']) ? $_POST['oem_number'] : "";

	$manufacturer = isset($_POST['manufacturer']) ? $_POST['manufacturer'] : "";
	$make = isset($_POST['make']) ? $_POST['make'] : "";
	$model = isset($_POST['model']) ? $_POST['model'] : "";
	$years = isset($_POST['years']) ? $_POST['years'] : "";
	$oeoemopt = $_POST['oeoemopt'];
	$stockopt = $_POST['stockopt'];

//--------------------------------------------------------------------------------
	// codes to update OE STOCK data
	if(isset($_POST['pid'])) {
		foreach($_POST['pid'] as $val){
			$a_grade_val = 0;
			$a_grade = isset($val['itemqty']) ? (int)$val['itemqty'] : 0;
			$agrddata = isset($val['qtydata']) ? (int)$val['qtydata'] : 0;
			$a_grade_val = $a_grade + $agrddata;

            $b_grade_val = 0;
            $b_grade_location = '';
            if ($ptypeid == 14 or $ptypeid == 15) {
                $b_grade = isset($val['b_grade_itemqty']) ? (int)$val['b_grade_itemqty'] : 0;
                $bgrddata = isset($val['b_grade_qty']) ? (int)$val['b_grade_qty'] : 0;
                $b_grade_val = $b_grade + $bgrddata;
                $b_grade_location = $val['b_grade_location'];
            }

            $c_grade_val = 0;
            $c_grade_location = '';
            if ($ptypeid == 14) {
                $c_grade = isset($val['c_grade_itemqty']) ? (int)$val['c_grade_itemqty'] : 0;
                $cgrddata = isset($val['c_grade_qty']) ? (int)$val['c_grade_qty'] : 0;
                $c_grade_val = $c_grade + $cgrddata;
                $c_grade_location = $val['c_grade_location'];
            }

            $cast_number = '';
            if ($ptypeid == 17) {
                $cast_number = isset($val['castnumber']) ? $val['castnumber'] : '';
            }

			$obj_partdt->update_partsdata_oe_stock(array('oe_one'=>addslashes($val['oeone']), 'oe_two'=>addslashes($val['oetwo']), 'oemone'=>addslashes($val['oemone']), 'oemtwo'=>addslashes($val['oemtwo']), 'castnumber'=>addslashes($cast_number), 'qty_data'=>addslashes($a_grade_val), 'location'=>addslashes($val['location']), 'b_grade_qty' => addslashes($b_grade_val), 'b_grade_location' => addslashes($b_grade_location), 'c_grade_qty' => addslashes($c_grade_val), 'c_grade_location' => addslashes($c_grade_location), 'last_updated'=>$dateposted), array('id'=>$val['itemid'],'partid'=>$partid));
		}
	} 
//--------------------------------------------------------------------------------
	$obj_partdt->update_partsdata(array('make'=>addslashes($make), 'manufacturer'=>addslashes($manufacturer), 'model'=>addslashes($model), 'years'=>addslashes($years), 'target_stock'=>addslashes($target_stock), 'sell_price'=>addslashes($sell_price), 'last_updated'=>$dateposted), array('id'=>$partid));

	if($oeoemopt == '1') {
		$exist_oeref = pobe_chk_part_oeref_data($partid);
		//echo "================================================= ".$exist_oeref."<br>";
		if($exist_oeref==0) {
			$ret_val4=$obj_partdt->add_partsdata_oeref(array('partid'=>addslashes($partid), 'oe_number'=>addslashes($oe_number), 'oem_number'=>addslashes($oem_number), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted));
		} else {
			$ret_val3=$obj_partdt->update_partsdata_oeref(array('oe_number'=>addslashes($oe_number), 'oem_number'=>addslashes($oem_number), 'last_updated'=>$dateposted), array('partid'=>addslashes($partid), 'refnum'=>$refnum));
		}
	}

	if(isset($_POST['attr'])) {
		foreach($_POST['attr'] as $attrno => $val){
			pobe_update_partsdata_attributes($partid,$attrno,$val);
		}
	} 

	if(isset($_POST['cust'])) {
		foreach($_POST['cust'] as $custno => $val){
			pobe_update_partsdata_cref($partid,$custno,$val);
		}
	} 

	$smarty->assign('msg',"Part updated successfully.");
}
//=========UPDATE SCRIPTS ends here====================================================================

//=========RETRIEVE SCRIPTS============================================================================

if(isset($_REQUEST['partid'])) {  
//******************************************************

	if(isset($_REQUEST['type'])) {  

//echo "============================================flag-1<br>";
		$ret_val=$obj_partdt->get_partsdata_details(array('id'=>addslashes($partid)));
		$row_partdt=$obj_partdt->db->sql_fetchrowset();

		///$rsac = isset($_REQUEST['rsac']) ? $_REQUEST['rsac'] : stripslashes($row_partdt[0]['rsac']);
		$make = isset($_REQUEST['make']) ? $_REQUEST['make'] : stripslashes($row_partdt[0]['make']);
		$manufacturer = isset($_REQUEST['manufacturer']) ? $_REQUEST['manufacturer'] : stripslashes($row_partdt[0]['manufacturer']);
		$model = isset($_REQUEST['model']) ? $_REQUEST['model'] : stripslashes($row_partdt[0]['model']);
		$years = isset($_REQUEST['years']) ? $_REQUEST['years'] : stripslashes($row_partdt[0]['years']);
		$target_stock = isset($_REQUEST['target_stock']) ? $_REQUEST['target_stock'] : stripslashes($row_partdt[0]['target_stock']);
		$sell_price = isset($_REQUEST['sell_price']) ? $_REQUEST['sell_price'] : stripslashes($row_partdt[0]['sell_price']);
		$notes = isset($_REQUEST['notes']) ? $_REQUEST['notes'] : stripslashes($row_partdt[0]['notes']);

		///$smarty->assign('rsac',$rsac); 
		$smarty->assign('make',$make); 
		$smarty->assign('manufacturer',$manufacturer); 
		$smarty->assign('model',$model); 
		$smarty->assign('years',$years); 
		$smarty->assign('target_stock',$target_stock); 
		$smarty->assign('sell_price',$sell_price); 
		$smarty->assign('notes',$notes); 

		// added on 03-01-2023  
		$grprsac = isset($_REQUEST['grprsac']) ? $_REQUEST['grprsac'] : stripslashes($row_partdt[0]['group_rsac']);
		$total_stock = pobe_group_total_stock($partid, $ptypeid);
		$smarty->assign('grprsac',$grprsac); 
		$smarty->assign('total_stock',$total_stock); 

//--------------------------------------------------------------------------------
//echo "============================================flag-2<br>";
		if($obj_partdt->count_partsdata_oeref(array('partid'=>addslashes($partid), 'refnum'=>$refnum)) > 0){
			$ret_val2=$obj_partdt->get_partsdata_oeref(array('partid'=>addslashes($partid), 'refnum'=>$refnum));
			$row_oemndt=$obj_partdt->db->sql_fetchrowset();
			$poe_number = stripslashes($row_oemndt[0]['oe_number']);
			$poem_number = stripslashes($row_oemndt[0]['oem_number']);
		} else {
			$poe_number = "";
			$poem_number = "";
		}

		$oe_number = isset($_REQUEST['oe_number']) ? $_REQUEST['oe_number'] : $poe_number;
		$oem_number = isset($_REQUEST['oem_number']) ? $_REQUEST['oem_number'] : $poem_number;
		$smarty->assign('oe_number',$oe_number); 
		$smarty->assign('oem_number',$oem_number); 
//--------------------------------------------------------------------------------
//echo "============================================flag-3<br>";
		$ret_val3=$obj_parttp->get_partstype_details(array('id'=>addslashes($ptypeid)));
		$row_reqcnt=$obj_parttp->db->sql_fetchrowset();

		$smarty->assign('ptypenm',strtoupper(stripslashes($row_reqcnt[0]['part_type'])));
		$smarty->assign('stockopt',stripslashes($row_reqcnt[0]['stockopt']));
		$smarty->assign('oeoemopt',stripslashes($row_reqcnt[0]['oeoemopt']));
		$part_opt = explode(",", $row_reqcnt[0]['part_opt']);
		$cust_opt = explode(",", $row_reqcnt[0]['cust_opt']);
		$attr_opt = explode(",", $row_reqcnt[0]['attr_opt']);  // added on 20-01-2022
//--------------------------------------------------------------------------------
//--------------------------------------------------------------------------------
//echo "flag-4<br>";
		$attributelist = pobe_attribute_list_opt_grp($row_reqcnt[0]['attr_opt'],$partid);
		$smarty->assign('attributelist',$attributelist);
		//print_r($attributelist);

		$customerlist = pobe_customer_opt_list_nw($row_reqcnt[0]['cust_opt'],$partid);
		$smarty->assign('customerlist',$customerlist);
//--------------------------------------------------------------------------------
//echo "flag-5<br>";
		// updated on 08-01-2023 
		//$grouppartslist = pobe_group_parts_list($grprsac);
		$grouppartslist = pobe_group_parts_list($partid,$ptypeid);
		$smarty->assign('grouppartslist',$grouppartslist);
//--------------------------------------------------------------------------------
		$smarty->assign('parttypelist',pobe_part_type_list());
//--------------------------------------------------------------------------------
//echo "flag-6<br>";
		$displayphoto = pobe_part_images_display($partid);
		$smarty->assign('displayphoto',$displayphoto);
//--------------------------------------------------------------------------------
		$output=$smarty->fetch('view_part.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
//******************************************************
} else {
	$output=$smarty->fetch('error_page.tpl');
	$smarty->assign('MAIN_CONTENT',$output);
}

//=========RETRIEVE SCRIPTS ends here==================================================================

$smarty->assign('mainpage',"parts");
$smarty->assign('subpage',"parts");
$smarty->assign('ptype',"");

$smarty->display('main.tpl');	

/*--------------------------------------------------------------------------------*/
$obj_partdt->con_close();
$obj_parttp->con_close();
exit;
?>