<?php
ob_start();
// Display error - if there is 
error_reporting(E_ALL);
ini_set('display_errors', 1);
//ini_set('max_execution_time', 0);
//---------------------------------
session_start();
/*--------------------------------------------------------------------------------*/
include('includes/msconnect.php');
include('includes/sessions.php');
include('queries.php');

$user_loggedin = isset($_SESSION['user_idd']) ? $_SESSION['user_idd'] : "";
$user_idd = pobe_session_register('user_idd', '');
$adminusr = pobe_session_register('adminusr', '');
$admintpy = pobe_session_register('admintpy', '');
$useracntn = pobe_session_register('useracnt', '');
$global_loggedin = pobe_session_register('global_loggedin', '');
$vendorid = pobe_session_register('vendorid', '');
$usrtoken = pobe_session_register('usrtoken', '');

//$wuserid=base64_decode($user_idd);
$wuserid=base64_decode($_SESSION['user_idd']);
/*--------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------*/
//echo "<pre>";
//print_r($_REQUEST);
//echo "</pre>";
/*--------------------------------------------------------------------------------*/

$schid = trim($_POST['id']);	
$carid = trim($_POST['carid']);	
$regnum = trim($_POST['regnum']);	

$dateposted = date("Y-m-d H:i:s");
$sch_type = "np";  // added on 06-01-2022

$item_ids = '';

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'selectarticles') {

	$regnum=trim($_REQUEST['regnum']);

	$pid = isset($_POST['pid']) ? $_POST['pid'] : array();
	$spqty = isset($_POST['spqty']) ? $_POST['spqty'] : array();
	$myord = array();
	$supplyqty = 0;
	$requirqty = 0;

	foreach($pid as $k => $val ){
		$myord[$val]['ID'] = $val;     
		if (array_key_exists($val,$spqty)){
			$supplyqty = $spqty[$val];
		}else{
			$supplyqty = 1;
		}
		//echo $val."//".$supplyqty ."<br>";

		$updSQLMchd = "UPDATE tbl_rsa_app_matched_articles SET acptd = '1' WHERE sch_id = '".addslashes($schid)."' AND carid = '".addslashes($carid)."' AND id = '".addslashes($val)."' ";
		$resultupMchd = mysqli_query($ndbconn, $updSQLMchd); // Run the query
		//echo $updSQLMchd."<br>";

		///$retMRupd=$obj_schdata->update_regsearchdata_matched(array('acptd'=>'1'), array('sch_id'=>addslashes($schid),'carid'=>addslashes($carid),'id'=>addslashes($val)));

		//$my_qry = "SELECT p.id as partid, p.rsac, p.part_type, p.purchase_price, p.a_grade, p.b_grade, p.target_stock, mp.articleno, mp.brandno "; 
		// updated on 07-02-2023  
		$my_qry = "SELECT p.id as partid, p.rsac, p.part_type, p.a_grade, p.b_grade, p.target_stock, p.group_rsac, mp.articleno, mp.brandno "; 
		$my_qry .= " FROM tbl_rsa_parts p, tbl_rsa_app_matched_articles mp "; 
		$my_qry .= " WHERE p.id = mp.partid AND mp.sch_id = '".addslashes($schid)."' AND mp.carid = '".addslashes($carid)."' AND mp.id = '".addslashes($val)."' AND mp.status = '1' "; 
		//echo $my_qry."<br>";
		$sqlspqry = mysqli_query($ndbconn, $my_qry); // Run the query
		$rowspqry = mysqli_fetch_array($sqlspqry);

		$partid = $rowspqry['partid'];
		//$partrsac = $rowspqry['rsac'];
		$ptypeidd = $rowspqry['part_type'];
		//$itmprice = $rowspqry['purchase_price'];


		// added on 07-02-2023 
		if (($ptypeidd == 14) || ($ptypeidd == 15) || ($ptypeidd == 16) || ($ptypeidd == 17)){
			$partrsac = $rowspqry['group_rsac'];
			//---------------------------------------------------------------
			$totstk_qry = "SELECT SUM(qty_data) as tot_stock FROM tbl_rsa_oe_stock_data WHERE partid = '" . addslashes($partid) . "' AND status = '1' AND is_deleted = '0' "; 
			$sqlstkqry = mysqli_query($ndbconn, $totstk_qry); // Run the query
			$rowstkqry = mysqli_fetch_array($sqlstkqry);
			$totalstock = number_format($rowstkqry['tot_stock']);
			//---------------------------------------------------------------
			$requirqty = $rowspqry['target_stock'] - $totalstock;
		} else {
			$partrsac = $rowspqry['rsac'];
			$requirqty = $rowspqry['target_stock'] - $rowspqry['a_grade'] - $rowspqry['b_grade'];
		}
		

		// added on 01-03-2022 -----------------------------------------
		$pp_qry = "SELECT attrdata FROM tbl_rsa_attributes_data WHERE attrid = 4 AND partid = '" . addslashes($partid) . "' AND status = '1' "; 
		$sqlppqry = mysqli_query($ndbconn, $pp_qry); // Run the query
		$rowppqry = mysqli_fetch_array($sqlppqry);
		$itmprice = number_format(($rowppqry['attrdata']), 2, '.', '');
		//---------------------------------------------------------------

		$articleno = $rowspqry['articleno'];
		$brandno = $rowspqry['brandno'];

		// updated and moved above on 07-02-2023 
		//$requirqty = $rowspqry['target_stock'] - $rowspqry['a_grade'] - $rowspqry['b_grade'];

		$tot_price = number_format(($supplyqty * $itmprice), 2, '.', '');

/*--------------------------------------------------------------------------------*/
		///$sqlCart = "SELECT * FROM tbl_rsa_app_offered_tdparts_temp where vendortmp = '".addslashes($vendorid)."' AND userid = '".addslashes($wuserid)."' AND  searchid = '".addslashes($schid)."' AND partid = '".addslashes($partid)."' AND status = '1' AND is_deleted = '0' ";
		$sqlCart = "SELECT * FROM tbl_rsa_app_offered_items_temp where vendortmp = '".addslashes($vendorid)."' AND userid = '".addslashes($wuserid)."' AND  searchid = '".addslashes($schid)."' AND partid = '".addslashes($partid)."' AND sch_type = 'np' AND status = '1' AND is_deleted = '0' ";
		//echo $sqlCart."<br>";
		$sqlCartItm = mysqli_query($ndbconn, $sqlCart); // Run the query.
		$numCartItm = mysqli_num_rows($sqlCartItm);

		if ($numCartItm == 0) {
			//id	vendortmp	userid	searchid	partid	part_type	rsac_ref	articleno	brandno	required_stock	purchase_price	offered_stock	offered_price	postdate	status	last_updated	is_deleted	is_offered	

			///$addSQLitm = "INSERT INTO tbl_rsa_app_offered_tdparts_temp (vendortmp, userid, searchid, partid, part_type, rsac_ref, articleno, brandno, sch_type, required_stock, purchase_price, offered_stock, offered_price, postdate, status, last_updated) VALUES('".addslashes($vendorid)."', '".addslashes($wuserid)."', '".addslashes($schid)."','".addslashes($partid)."', '".addslashes($ptypeidd)."', '".addslashes($partrsac)."', '".addslashes($articleno)."', '".addslashes($brandno)."', '".addslashes($sch_type)."', '".addslashes($requirqty)."', '".addslashes($itmprice)."', '".addslashes($supplyqty)."', '".addslashes($tot_price)."', '".$dateposted."', '1', '".$dateposted."')";
			$addSQLitm = "INSERT INTO tbl_rsa_app_offered_items_temp (vendortmp, userid, searchid, partid, part_type, rsac_ref, articleno, brandno, sch_type, required_stock, purchase_price, offered_stock, offered_price, postdate, status, last_updated) VALUES('".addslashes($vendorid)."', '".addslashes($wuserid)."', '".addslashes($schid)."','".addslashes($partid)."', '".addslashes($ptypeidd)."', '".addslashes($partrsac)."', '".addslashes($articleno)."', '".addslashes($brandno)."', '".addslashes($sch_type)."', '".addslashes($requirqty)."', '".addslashes($itmprice)."', '".addslashes($supplyqty)."', '".addslashes($tot_price)."', '".$dateposted."', '1', '".$dateposted."')";
			//echo $addSQLitm."<br>";
			$resultAddItm = mysqli_query($ndbconn, $addSQLitm); // Run the query.

			//$ret_val3=$obj_offerd->add_regsearchoffer(array('vendortmp'=>addslashes($vendorid), 'userid'=>addslashes($wuserid), 'searchid'=>addslashes($schid), 'partid'=>addslashes($partid), 'part_type'=>addslashes($ptypeidd), 'rsac_ref'=>addslashes($part_rsac), 'articleno'=>addslashes($articleno), 'brandno'=>addslashes($brandno), 'required_stock'=>addslashes($requirqty), 'purchase_price'=>addslashes($partprice), 'offered_stock'=>addslashes($supplyqty), 'offered_price'=>addslashes($tot_price), 'postdate'=>$dateposted, 'status'=>'1', 'last_updated'=>$dateposted));
		} else {
			///$updSQLitm = "UPDATE tbl_rsa_app_offered_tdparts_temp SET offered_stock = '".addslashes($supplyqty)."', offered_price = '".addslashes($tot_price)."', status = '1', last_updated = '".$dateposted."' WHERE vendortmp = '".addslashes($vendorid)."' AND userid = '".addslashes($wuserid)."' AND searchid = '".addslashes($schid)."' AND partid = '".addslashes($partid)."' AND is_deleted = '0' ";
			$updSQLitm = "UPDATE tbl_rsa_app_offered_items_temp SET offered_stock = '".addslashes($supplyqty)."', offered_price = '".addslashes($tot_price)."', status = '1', last_updated = '".$dateposted."' WHERE vendortmp = '".addslashes($vendorid)."' AND userid = '".addslashes($wuserid)."' AND searchid = '".addslashes($schid)."' AND partid = '".addslashes($partid)."' AND is_deleted = '0' ";
			$resultUpdItm = mysqli_query($ndbconn, $updSQLitm); // Run the query
			//echo $updSQLitm."<br>";
		}
/*--------------------------------------------------------------------------------*/
		
	}

	//echo 'location: order_list.php?id='.$schid.'&carid='.$carid;
	header('location: order_list.php?id='.$schid.'&carid='.$carid);
	die;
}

/*
*/
//---------------------------------------------------------------------------------------------------------------
die;
?>