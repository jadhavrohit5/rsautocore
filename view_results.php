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
//  added on 13-02-2022 
$att1 = 1;  // Type
$att2 = 2;  // Pulley Size
$att3 = 3;  // Bar Pressure
$att8 = 8;  // Cast
$att9 = 9;  // Length
$att10 = 10;  // Turns
$att11 = 11;  // T-Rod Thread Size
$att12 = 12;  // Pinion Length
$att13 = 13;  // Pinion Type
$att14 = 14;  // Pulley Grooves
$att16 = 16;  // Plug Pins
$att20 = 20;  // Sensor
$att5 = 5;  // Piston MM
$att6 = 6; // Pad Gap
$att38 = 38; //Lock Stops Size
$att39 = 39; // Lock Stops Colour
$att54 = 54; // Actuator Type
$att69 = 69; // Plug Wires
$att15 = 15;// Pulley Type
$att27 = 27;// Mounting Points
$att71 = 71;// Rear Head No
$att25 = 25;// Amps
$att30 = 30;// Teeth
$att31 = 31;// Rotation
$att40 = 40; // Outer teething wheel side
$att56 = 56; // ABS Ring Ã˜ (mm/
$att57 = 57; // Flange Ã˜ (mm)
$att62 = 62; // Teeth, ABS ring
$att64 = 64;  //Overall Length (mm)
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
			$ids=$obj_srchdt->advance_searchparts_ids($ptype,$custref,$custdata,$manufacturer,$make,$model, $oe_number,$oem_number,$location,$attrval,$attrdata);

			$cntids = count($ids);
		} elseif($searchtype=="quick") {
			//$count=$obj_srchdt->count_searchparts_quick($ptype,$searchkey);
			$ids=$obj_srchdt->quick_searchparts_ids_group($ptype,$searchkey,$oeoemopt);
			$cntids = count($ids);
		}

		if($cntids > 0) {
			$count=$obj_srchdt->count_searchparts_results_group($ptype,$ids);
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

		$ret_cur=$obj_srchdt->get_searchparts_results_group($start,$limit,$ptype,$ids);
			
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
                if($ptype == 14) {
                $gsreqcnt[$i]['type']=pobe_get_attribute_data($att1,$row_reqcnt[$i]['id']);
                }
                if($ptype == 14){
                $gsreqcnt[$i]['actuator_type']=pobe_get_attribute_data($att54,$row_reqcnt[$i]['id']);
                }
                if($ptype == 13){
                $gsreqcnt[$i]['length']=pobe_get_attribute_data($att9,$row_reqcnt[$i]['id']);
                $gsreqcnt[$i]['outer_teething_wheel_side']=pobe_get_attribute_data($att40,$row_reqcnt[$i]['id']);
                $gsreqcnt[$i]['abs_ring']=pobe_get_attribute_data($att56,$row_reqcnt[$i]['id']);
                $gsreqcnt[$i]['flange']=pobe_get_attribute_data($att57,$row_reqcnt[$i]['id']);
                $gsreqcnt[$i]['teeth_abs_ring']=pobe_get_attribute_data($att62,$row_reqcnt[$i]['id']);
                $gsreqcnt[$i]['overall_length']=pobe_get_attribute_data($att64,$row_reqcnt[$i]['id']);
                }

                if($ptype == 15 or $ptype == 16 or $ptype == 17){
                $gsreqcnt[$i]['plug_pins']=pobe_get_attribute_data($att16,$row_reqcnt[$i]['id']);
                $gsreqcnt[$i]['pulley_grooves']=pobe_get_attribute_data($att14,$row_reqcnt[$i]['id']);
                $gsreqcnt[$i]['pulley_size']=pobe_get_attribute_data($att2,$row_reqcnt[$i]['id']);
                $gsreqcnt[$i]['pulley_type']=pobe_get_attribute_data($att15,$row_reqcnt[$i]['id']);
                $gsreqcnt[$i]['mounting_points']=pobe_get_attribute_data($att27,$row_reqcnt[$i]['id']);
                $gsreqcnt[$i]['rear_head_no']=pobe_get_attribute_data($att71,$row_reqcnt[$i]['id']);
                $gsreqcnt[$i]['amps']=pobe_get_attribute_data($att25,$row_reqcnt[$i]['id']);
                $gsreqcnt[$i]['teeth']=pobe_get_attribute_data($att30,$row_reqcnt[$i]['id']);
                $gsreqcnt[$i]['rotation']=pobe_get_attribute_data($att31,$row_reqcnt[$i]['id']);
                }

				//  --------------------------------------------------------------------------------
				$gsreqcnt[$i]['notes']=stripslashes($row_reqcnt[$i]['notes']);
				$gsreqcnt[$i]['pphoto']=pobe_view_part_image($row_reqcnt[$i]['id']);

				$gsreqcnt[$i]['grprsac']=stripslashes($row_reqcnt[$i]['group_rsac']);   // added on 22-12-2022 
				$gsreqcnt[$i]['totalstock']=pobe_group_total_stock($row_reqcnt[$i]['id']);   // added on 08-01-2023  

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

		$output=$smarty->fetch('view_results.tpl');
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