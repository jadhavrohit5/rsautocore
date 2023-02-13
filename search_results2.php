<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/partsdata.php');
include('classes/searchparts.php');
include('queries.php');
	
#=================================================================
$smarty = new SmartyBC;
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
#=================================================================
$title="Panel Parts Page - Sony AutoParts";
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
} elseif($_SESSION['global_logged_in']!="true" || $admintp != md5(3)){  
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
} else {
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
}

#==============================================================
$smarty->assign('title',$title);
$smarty->assign('self',$_SERVER['PHP_SELF']);	
$smarty->assign('message',$GLOBALS['message']);
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
$obj_srchdt=new searchparts;

/*--------------------------------------------------------------------------------*/
if(isset($_REQUEST['msg'])){  
	$smarty->assign('msg',base64_decode($_REQUEST['msg']));
} else {
	$smarty->assign('msg',"");
}
/*--------------------------------------------------------------------------------*/
$schid = isset($_REQUEST['schid']) ? $_REQUEST['schid'] : "";
$smarty->assign('schid',$_REQUEST['schid']); 

/*--------------------------------------------------------------------------------*/

$page = isset($_REQUEST['pg']) ? trim($_REQUEST['pg']) : 1;
$ptype = isset($_REQUEST['type']) ? trim($_REQUEST['type']) : 1;
$ppage = isset($_REQUEST['p']) ? trim($_REQUEST['p']) : 10;
$per_page = isset($_REQUEST['p']) ? trim($_REQUEST['p']) : 10;
//echo "==========================================".$per_page;

$offset = isset($offset) ? $offset : 0;
//echo "================================================".$offset;
$smarty->assign('ptype',$ptype); 
$smarty->assign('ptypename',pobe_view_part_type($ptype)); 
$smarty->assign('ppage',$per_page); 
$smarty->assign('page',$page); 
$smarty->assign('showpagination','');

/*--------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/

$MSG = 		isset($_SESSION['MSG']) ? $_SESSION['MSG'] : ''; 
$ERRORMSG = isset($_SESSION['ERRORMSG']) ? $_SESSION['ERRORMSG'] : ''; 
$ERROR = 	isset($_REQUEST['ERROR']) ? $_REQUEST['ERROR'] : '0';
$SUCCESS =	isset($_REQUEST['SUCCESS']) ? $_REQUEST['SUCCESS'] : 0;
$ACT = 		isset($_REQUEST['act']) ? $_REQUEST['act'] : '';
//$ID = 		isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$ID = 		isset($_REQUEST['partid']) ? $_REQUEST['partid'] : '';

/*--------------------------------------------------------------------------------*/

	$ret_valtp=$obj_srchdt->get_searchparts_details(array('searchid'=>addslashes($schid)));
	$row_reqcnt=$obj_srchdt->db->sql_fetchrowset();

	$searchtype = stripslashes($row_reqcnt[0]['searchtype']);
	$searchkey = stripslashes($row_reqcnt[0]['searchtext']);
	$custref = stripslashes($row_reqcnt[0]['custref']);
	$custdata = stripslashes($row_reqcnt[0]['custdata']);
	$make = stripslashes($row_reqcnt[0]['make']);
	$manufacturer = stripslashes($row_reqcnt[0]['manufacturer']);
	$model = stripslashes($row_reqcnt[0]['model']);
	$location = stripslashes($row_reqcnt[0]['location']);
	$oe_number = stripslashes($row_reqcnt[0]['oe_number']);
	$oem_number = stripslashes($row_reqcnt[0]['oem_number']);
/*
	$prtype = stripslashes($row_reqcnt[0]['prtype']);
	$pulley_size = stripslashes($row_reqcnt[0]['pulley_size']);
	$bar_pressure = stripslashes($row_reqcnt[0]['bar_pressure']);
	$cast = stripslashes($row_reqcnt[0]['cast']);

	$piston_mm = stripslashes($row_reqcnt[0]['piston_mm']);
	$pad_gap = stripslashes($row_reqcnt[0]['pad_gap']);
	$f_r = stripslashes($row_reqcnt[0]['f_r']);
	$purchase_price = stripslashes($row_reqcnt[0]['purchase_price']);
	$length = stripslashes($row_reqcnt[0]['length']);
	$turns = stripslashes($row_reqcnt[0]['turns']);
	$trod_threadsize = stripslashes($row_reqcnt[0]['trod_threadsize']);
	$pinion_length = stripslashes($row_reqcnt[0]['pinion_length']);
	$pinion_type = stripslashes($row_reqcnt[0]['pinion_type']);
	$pulley_grooves = stripslashes($row_reqcnt[0]['pulley_grooves']);
	$pulley_type = stripslashes($row_reqcnt[0]['pulley_type']);
	$plug_pins = stripslashes($row_reqcnt[0]['plug_pins']);
	$weight = stripslashes($row_reqcnt[0]['weight']);
	$bolt_diameter = stripslashes($row_reqcnt[0]['bolt_diameter']);
	$pinhole_diameter = stripslashes($row_reqcnt[0]['pinhole_diameter']);
	$sensor = stripslashes($row_reqcnt[0]['sensor']);
*/

	$attrval = $row_reqcnt[0]['attrval'];		// added on 08-02-2022  
	$attrdata = $row_reqcnt[0]['attrdata'];		// added on 08-02-2022  

	$oeoemopt = pobe_part_type_oeoem_options($ptype);
/*--------------------------------------------------------------------------------*/

if(isset($_REQUEST['mode']))
{
	//delete
	if($ACT=='delete' && $ID!=''){
		$partid = $_REQUEST['partid'];
		$datedeleted = date("Y-m-d H:i:s");
		$ret_val=$obj_partdt->update_partsdata(array('status'=>'0','is_deleted'=>'1','last_updated'=>$datedeleted), array('id'=>$partid));
		$smarty->assign('msg',"Part record deleted successfully.");
				
		$_REQUEST['mode']="show";
	}

	if($_REQUEST['mode']=="show")
	{	
		$cntids = 0;

		if($searchtype=="advance") {
			//$count=$obj_srchdt->count_searchparts_advance($ptype,$custref,$custdata,$manufacturer,$make,$model,$pulley_size,$bar_pressure, $oe_number,$oem_number,$location);

			//$ids=$obj_srchdt->advance_searchparts_ids($ptype,$custref,$custdata,$manufacturer,$make,$model, $oe_number,$oem_number,$location,$prtype, $pulley_size,$bar_pressure,$cast,$piston_mm,$pad_gap,$f_r,$purchase_price,$length,$turns,$trod_threadsize,$pinion_length,$pinion_type, $pulley_grooves,$pulley_type,$plug_pins,$weight,$bolt_diameter,$pinhole_diameter,$sensor);

			// updated on 27-01-2022  
			$ids=$obj_srchdt->advance_searchparts_ids($ptype,$custref,$custdata,$manufacturer,$make,$model, $oe_number,$oem_number,$location,$attrval,$attrdata);

			$cntids = count($ids);
		} elseif($searchtype=="quick") {
			//$count=$obj_srchdt->count_searchparts_quick($ptype,$searchkey);
			$ids=$obj_srchdt->quick_searchparts_ids($ptype,$searchkey,$oeoemopt);
			$cntids = count($ids);
		}

		if($cntids > 0) {
			$count=$obj_srchdt->count_searchparts_results_all($ptype,$ids);
		} else {
			$count=0;
		}
		//echo "=================================================<br><br>ids= ".print_r($ids)."<br>count= ".$count."<br>";

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
/*		
		if($searchtype=="advance") {
			$ret_cur=$obj_srchdt->get_searchparts_advance($start,$limit,$ptype,$custref,$custdata,$manufacturer,$make,$model,$pulley_size,$bar_pressure, $oe_number,$oem_number,$location);
		} elseif($searchtype=="quick") {
			$ret_cur=$obj_srchdt->get_searchparts_quick($start,$limit,$ptype,$searchkey);
		}
*/
		$ret_cur=$obj_srchdt->get_searchparts_results_all($start,$limit,$ptype,$ids);
			
		if($ret_cur==1){
			$row_reqcnt=$obj_srchdt->db->sql_fetchrowset();

			for($i=0;$i<count($row_reqcnt);$i++){
				if($i % 2 == 0) {
					$gsreqcnt[$i]['gry'] = 0;
				} else {
					$gsreqcnt[$i]['gry'] = 1;
				}

				$gsreqcnt[$i]['cnt']=$artnum + $offset;
				$gsreqcnt[$i]['partid']=$row_reqcnt[$i]['id'];
				$gsreqcnt[$i]['parttype']=pobe_view_part_type($row_reqcnt[$i]['part_type']);
				$gsreqcnt[$i]['rsref']=stripslashes($row_reqcnt[$i]['rsac']);
				$gsreqcnt[$i]['a_grade']=stripslashes($row_reqcnt[$i]['a_grade']);
				$gsreqcnt[$i]['b_grade']=stripslashes($row_reqcnt[$i]['b_grade']);
				//$gsreqcnt[$i]['stock']=stripslashes($row_reqcnt[$i]['target_stock']);
				$gsreqcnt[$i]['manufacturer']=stripslashes($row_reqcnt[$i]['manufacturer']);
				$gsreqcnt[$i]['make']=stripslashes($row_reqcnt[$i]['make']);
				$gsreqcnt[$i]['model']=stripslashes($row_reqcnt[$i]['model']);
/*
				$gsreqcnt[$i]['type']=stripslashes($row_reqcnt[$i]['type']);
				$gsreqcnt[$i]['pulley_size']=stripslashes($row_reqcnt[$i]['pulley_size']);
				$gsreqcnt[$i]['bar_pressure']=stripslashes($row_reqcnt[$i]['bar_pressure']);
				$gsreqcnt[$i]['cast']=stripslashes($row_reqcnt[$i]['cast']);
				$gsreqcnt[$i]['length']=stripslashes($row_reqcnt[$i]['length']);
				$gsreqcnt[$i]['turns']=stripslashes($row_reqcnt[$i]['turns']);
				$gsreqcnt[$i]['trod_threadsize']=stripslashes($row_reqcnt[$i]['trod_threadsize']);
				$gsreqcnt[$i]['pinion_length']=stripslashes($row_reqcnt[$i]['pinion_length']);
				$gsreqcnt[$i]['pinion_type']=stripslashes($row_reqcnt[$i]['pinion_type']);
				$gsreqcnt[$i]['pulley_grooves']=stripslashes($row_reqcnt[$i]['pulley_grooves']);
				$gsreqcnt[$i]['plug_pins']=stripslashes($row_reqcnt[$i]['plug_pins']);
				$gsreqcnt[$i]['sensor']=stripslashes($row_reqcnt[$i]['sensor']);
*/
				$gsreqcnt[$i]['notes']=stripslashes($row_reqcnt[$i]['notes']);
				$gsreqcnt[$i]['pphoto']=pobe_view_part_image($row_reqcnt[$i]['id']);

				$artnum++;
			} 
			$smarty->assign('gsreqcnt',$gsreqcnt);
		}		

		$GLOBALS["extra_var"]='mode=show&'; 

		if(isset($total)){
			$smarty->assign('showpagination',showPaginationSch($page, $page_count, $range, $ppage, $ptype, $schid));
			$smarty->assign('total', $total);
			$smarty->assign('frshow', $start+1);
			$smarty->assign('toshow',$start+$artnum-1);		
		}
		
		$smarty->assign('parttypelist',pobe_part_type_list());

		$output=$smarty->fetch('search_results.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
}

$smarty->assign('mainpage',"parts");
$smarty->assign('subpage',"search_results");

if(($admintp == md5(1)) || ($admintp == md5(3))) {
$smarty->display('main.tpl');	
} else {
$smarty->display('main_user.tpl');	
}

/*
if (error_get_last()){
$smarty->assign('errorgetlast',print_r(error_get_last()));
} else {
$smarty->assign('errorgetlast','');
}
*/
/*--------------------------------------------------------------------------------*/


/*--------------------------------------------------------------------------------*/
$obj_partdt->con_close();
$obj_srchdt->con_close();
exit;
?>