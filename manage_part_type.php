<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/partstype.php');
include('queries.php');
	
#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Manage Part Categories Page - Sony AutoParts";
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
$smarty->assign('adminusertype',$admintp); 
#=================================================================

/*--------------------------------------------------------------------------------*/
$wuserid=base64_decode($_SESSION['user_id']);
$smarty->assign('userfullname',pobe_siteuser_name($wuserid)); 
$smarty->assign('usertypename',pobe_siteuser_type($wuserid)); 
/*--------------------------------------------------------------------------------*/

$obj_nwlnreq=new partstype;

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}
/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/

$page = isset($_REQUEST['pg']) ? trim($_REQUEST['pg']) : 1;
$ptype = isset($_REQUEST['type']) ? trim($_REQUEST['type']) : 1;
$ppage = isset($_REQUEST['p']) ? trim($_REQUEST['p']) : 20;
$per_page = isset($_REQUEST['p']) ? trim($_REQUEST['p']) : 20;
//echo "==========================================".$per_page;

$offset = isset($offset) ? $offset : 0;
//echo "================================================".$offset;
$smarty->assign('ptype',$ptype); 
//$smarty->assign('ptypename',$ptype); 
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
/*
// Delete a item by ajax. Only unverified user can be deleted.
if($ACT=='delete' && $ID!=''){
	//$auth_delete = countRows('hf_users', "user_id='$ID' AND status='0' AND lastLogin IS NULL");
	$auth_delete = 1;
 	if(!$auth_delete){
		$ERROR = 1;
 		$ERRORMSG = 'This record is linked with other sections, so it can\'t be deleted. Delete all data attached with this record first, then try again.';  
	} else {
		//$delete = $db->DELETE('hf_users', "user_id='$ID'");
		//pobe_update_part_type($ID,$wuserid);
		$delete = 1;
		if($delete){
			$SUCCESS = 1;
			$MSG = 'Record deleted successfully.';
		} else {
			$ERROR = 1; 
			$ERRORMSG = 'Error deleting record.';
		}
	}
 	#Ajax returns array.
 	$data['error'] = $ERROR;
	$data['errorMsg'] = $ERRORMSG;
	$data['success'] = $SUCCESS;
	$data['successMsg'] = $MSG;
	echo json_encode($data);
	exit;
}
*/
/*--------------------------------------------------------------------------------*/

if(isset($_REQUEST['mode']))
{
	if($ACT=='delete' && $ID!=''){
		$ptypeid = base64_decode($_REQUEST['id']);
		$datedeleted = date("Y-m-d H:i:s");
////		$ret_val=$obj_nwlnreq->update_partstype(array('status'=>'0','deletedbyid'=>$wuserid,'datedeleted'=>$datedeleted,'is_deleted'=>'1'), array('id'=>$ptypeid));
////		$smarty->assign('msg',"Part Type deleted successfully.");
		$smarty->assign('msg',"Delete action disabled temporarily.");
	}

	if($_REQUEST['mode']=="show")
	{	
		$count=$obj_nwlnreq->count_partstype_details(array('status'=>'1','is_deleted'=>'0'));

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
		
		//$ret_cur=$obj_nwlnreq->get_partstype($start,$limit,array('part_type'=>$ptype,'status'=>'1','is_deleted'=>'0'));
		$ret_cur=$obj_nwlnreq->get_partstype($start,$limit,array('status'=>'1','is_deleted'=>'0'));
			
		if($ret_cur==1){
			$row_reqcnt=$obj_nwlnreq->db->sql_fetchrowset();

			for($i=0;$i<count($row_reqcnt);$i++){
				if($i % 2 == 0) {
					$gsreqcnt[$i]['gry'] = 0;
				} else {
					$gsreqcnt[$i]['gry'] = 1;
				}

				$gsreqcnt[$i]['cnt']=$artnum + $offset;
				$gsreqcnt[$i]['ptypeid']=base64_encode($row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['parttype']=stripslashes($row_reqcnt[$i]['part_type']);
				$gsreqcnt[$i]['noofparts']=pobe_number_of_parts_count($row_reqcnt[$i]['id']);

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

		$output=$smarty->fetch('manage_part_type.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
}

$smarty->assign('mainpage',"manage_site");
$smarty->assign('subpage',"manage_part_type");

$smarty->display('main.tpl');	

/*
if (error_get_last()){
$smarty->assign('errorgetlast',print_r(error_get_last()));
} else {
$smarty->assign('errorgetlast','');
}
*/
/*--------------------------------------------------------------------------------*/

?>