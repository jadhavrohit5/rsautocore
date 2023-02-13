<?php
ob_start();
include('includes/inc_user.php');
include('classes/searchparts.php');
include('queries.php');
	
$user_loggedin = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
$user_id = pobe_session_register('user_id', '');
$adminnm = pobe_session_register('adminnm', '');
$admintp = pobe_session_register('admintp', '');
$useracn = pobe_session_register('userac', '');
$global_logged_in = pobe_session_register('global_logged_in', '');

if($_SESSION['global_logged_in']=="true" || !empty($user_loggedin)) {
//	$smarty->assign('loggedin','1');
} elseif($_SESSION['global_logged_in']!="true" || $admintp != md5(3)){  
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
} else {
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
}

/*--------------------------------------------------------------------------------*/
$wuserid=base64_decode($_SESSION['user_id']);
/*--------------------------------------------------------------------------------*/

$obj_partdt=new searchparts;

$ptype = isset($_REQUEST['type']) ? trim($_REQUEST['type']) : 1;
$searchkey = isset($_POST['searchKey']) ? $_POST['searchKey'] : "";

/*--------------------------------------------------------------------------------*/

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'quicksearch') {
	$searchtype = "quick";
	$numofresults = 0;
	$dateposted = date("Y-m-d H:i:s");

	$ret_val3=$obj_partdt->add_searchparts(array('searchtype'=>addslashes($searchtype), 'searchtext'=>addslashes($searchkey),'searchdate'=>$dateposted, 'status'=>'1', 'search_by'=>$wuserid, 'numofresults'=>$numofresults));

	if($obj_partdt->get_searchparts_details(array('searchtype'=>addslashes($searchtype),'searchdate'=>$dateposted,'search_by'=>$wuserid))){
		$row_partdt=$obj_partdt->db->sql_fetchrowset();
		$newschid=$row_partdt[0]['searchid'];
/*--------------------------------------------------------------------------------*/
		// commented on 15-12-2022 to replace the codes
		//header('location: search_results.php?mode=show&type='.$ptype.'&schid='.$newschid);
		//die;
/*--------------------------------------------------------------------------------*/
		$sp_ptypes = [14, 15, 16, 17];
		if (in_array($ptype, $sp_ptypes)) {
			header('location: view_results.php?mode=show&type='.$ptype.'&schid='.$newschid);
			die;
		} else {
			header('location: search_results.php?mode=show&type='.$ptype.'&schid='.$newschid);
			die;
		}
	} else {
		if(($admintp == md5(1)) || ($admintp == md5(3))) {
			header('location: parts.php?mode=show&type='.$ptype.'&msg='.base64_encode("Error - Please try again."));
			die;
		} else {
			header('location: partslist.php?mode=show&type='.$ptype.'&msg='.base64_encode("Error - Please try again."));
			die;
		}
	}
}

/*--------------------------------------------------------------------------------*/
$obj_partdt->con_close();
exit;
?>