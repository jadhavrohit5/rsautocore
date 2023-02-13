<?php
ob_start();
include('includes/inc_user.php');
require('libs/Smarty.class.php');
include('classes/partsdata.php');
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
} elseif($_SESSION['global_logged_in']!="true" || $admintp != md5(1)){  
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
} else {
	$_GLOBALS['message']="Please login to access";
	header('Location: index.php');	
	die;
}

if(($admintp == md5(2)) && ($useracn == md5(1))) {
	header('Location: partslist.php?mode=show&type=1');	
	die;
} else if($useracn != md5(2)) {
	header('Location: error.php');	
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

$obj_nwlnreq=new partsdata;

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
if((pobe_user_part_type_access(base64_decode($user_id), $ptype) != $ptype) && ($admintp != md5(3))) {
	header('Location: error_page.php?msg='.base64_encode("You don't have access to this part type"));	
	die;
}
$smarty->assign('ptypeid',pobe_part_type_default(base64_decode($user_id)));
/*--------------------------------------------------------------------------------*/

$MSG = 		isset($_SESSION['MSG']) ? $_SESSION['MSG'] : ''; 
$ERRORMSG = isset($_SESSION['ERRORMSG']) ? $_SESSION['ERRORMSG'] : ''; 
$ERROR = 	isset($_REQUEST['ERROR']) ? $_REQUEST['ERROR'] : '0';
$SUCCESS =	isset($_REQUEST['SUCCESS']) ? $_REQUEST['SUCCESS'] : 0;
$ACT = 		isset($_REQUEST['act']) ? $_REQUEST['act'] : '';
//$ID = 		isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$ID = 		isset($_REQUEST['partid']) ? $_REQUEST['partid'] : '';

/*
// Delete a item by ajax. Only unverified user can be deleted.
if($ACT=='delete' && $ID!=''){
	
	//$auth_delete = countRows('hf_users', "user_id='$ID' AND status='0' AND lastLogin IS NULL");
	$auth_delete = 1;
 	if(!$auth_delete):
		$ERROR = 1;
 		$ERRORMSG = 'This record is linked with other sections, so it can\'t be deleted. Delete all data attached with this record first, then try again.';  
	else:
		//$delete = $db->DELETE('hf_users', "user_id='$ID'");
		$delete = 1;
		if($delete):
			$SUCCESS = 1;
			$MSG = 'Record deleted successfully.';
		else: 
			$ERROR = 1; 
			$ERRORMSG = 'Error deleting record.';
		endif;
	endif;
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
//  added on 13-02-2022 
$att1 = 1;  // Type
$att2 = 2;  // Pulley Size or Pulley Diameter
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

if(isset($_REQUEST['mode']))
{
	//delete
	if($ACT=='delete' && $ID!=''){
		$partid = $_REQUEST['partid'];
		$datedeleted = date("Y-m-d H:i:s");
		$ret_val=$obj_nwlnreq->update_partsdata(array('status'=>'0','is_deleted'=>'1','last_updated'=>$datedeleted), array('id'=>$partid));
		$smarty->assign('msg',"Part record deleted successfully.");
				
		$_REQUEST['mode']="show";
	}

	if($_REQUEST['mode']=="show")
	{	
		$sp_ptypes = [14, 15, 16, 17];   // ADDED ON 03-01-2023 TO ALLOW LIST BY GROUPS FOR SELECTED PART TYPES

		//$count=$obj_nwlnreq->count_partsdata_details(array('part_type'=>$ptype,'is_deleted'=>'0'));
		// ABOVE LINE COMMENTED AND REPLACED BY FOLLOWING CONDITION
		if (in_array($ptype, $sp_ptypes)) {
			$count=$obj_nwlnreq->count_partsdata_details_bygroup(array('part_type'=>$ptype,'is_deleted'=>'0','is_main'=>'1'));
		} else {
			$count=$obj_nwlnreq->count_partsdata_details(array('part_type'=>$ptype,'is_deleted'=>'0'));
		}

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
		
		//$ret_cur=$obj_nwlnreq->get_partsdata($start,$limit,array('part_type'=>$ptype,'is_deleted'=>'0'));
		// ABOVE LINE COMMENTED AND REPLACED BY FOLLOWING CONDITION
		if (in_array($ptype, $sp_ptypes)) {
			$ret_cur=$obj_nwlnreq->get_partsdata_bygroup($start,$limit,array('part_type'=>$ptype,'is_deleted'=>'0','is_main'=>'1'));
			$smarty->assign('hvGroups','1');
		} else {
			$ret_cur=$obj_nwlnreq->get_partsdata($start,$limit,array('part_type'=>$ptype,'is_deleted'=>'0'));
			$smarty->assign('hvGroups','0');
		}
			
		if($ret_cur==1){
			$row_reqcnt=$obj_nwlnreq->db->sql_fetchrowset();

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
*/
				//  added on 13-02-2022 ------------------------------------------------------------
				if($ptype == 1) {
				$gsreqcnt[$i]['pulley_size']=pobe_get_attribute_data($att2,$row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['bar_pressure']=pobe_get_attribute_data($att3,$row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['pulley_grooves']=pobe_get_attribute_data($att14,$row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['sensor']=pobe_get_attribute_data($att20,$row_reqcnt[$i]['id']);
				}
                if($ptype == 1 || $ptype == 10 || $ptype == 11 || $ptype == 14) {
                $gsreqcnt[$i]['type']=pobe_get_attribute_data($att1,$row_reqcnt[$i]['id']);
                }
				if($ptype == 2) {
				$gsreqcnt[$i]['type']=pobe_get_attribute_data($att1,$row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['cast']=pobe_get_attribute_data($att8,$row_reqcnt[$i]['id']);
                $gsreqcnt[$i]['piston_mm']=pobe_get_attribute_data($att5,$row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['pad_gap']=pobe_get_attribute_data($att6,$row_reqcnt[$i]['id']);
				}
				if($ptype == 9 or $ptype == 15) {
				$gsreqcnt[$i]['type']=pobe_get_attribute_data($att1,$row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['plug_pins']=pobe_get_attribute_data($att16,$row_reqcnt[$i]['id']);
				}
				if(($ptype > 2) && ($ptype < 7)) {
				$gsreqcnt[$i]['length']=pobe_get_attribute_data($att9,$row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['turns']=pobe_get_attribute_data($att10,$row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['trod_threadsize']=pobe_get_attribute_data($att11,$row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['pinion_length']=pobe_get_attribute_data($att12,$row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['pinion_type']=pobe_get_attribute_data($att13,$row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['sensor']=pobe_get_attribute_data($att20,$row_reqcnt[$i]['id']);
                $gsreqcnt[$i]['lock_stops_size']=pobe_get_attribute_data($att38,$row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['lock_stops_colour']=pobe_get_attribute_data($att39,$row_reqcnt[$i]['id']);
				}
				if(($ptype == 7) || ($ptype == 8)) {
				$gsreqcnt[$i]['length']=pobe_get_attribute_data($att9,$row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['turns']=pobe_get_attribute_data($att10,$row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['trod_threadsize']=pobe_get_attribute_data($att11,$row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['pinion_length']=pobe_get_attribute_data($att12,$row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['pinion_type']=pobe_get_attribute_data($att13,$row_reqcnt[$i]['id']);
				$gsreqcnt[$i]['plug_pins']=pobe_get_attribute_data($att16,$row_reqcnt[$i]['id']);
                $gsreqcnt[$i]['plug_wires']=pobe_get_attribute_data($att16,$row_reqcnt[$i]['id']);
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

				// added on 03-01-2023
				if (in_array($ptype, $sp_ptypes)) {
				$gsreqcnt[$i]['grprsac']=stripslashes($row_reqcnt[$i]['group_rsac']);                 
				$gsreqcnt[$i]['totalstock']=pobe_group_total_stock($row_reqcnt[$i]['id']); 
				}

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
		
		$smarty->assign('parttypelist',pobe_part_type_list());

		$output=$smarty->fetch('parts.tpl');
		$smarty->assign('MAIN_CONTENT',$output);
	}
}

$smarty->assign('mainpage',"parts");
$smarty->assign('subpage',"parts");

$smarty->display('main.tpl');	

/*--------------------------------------------------------------------------------*/
/*
if (error_get_last()){
print_r(error_get_last());
}
*/
/*--------------------------------------------------------------------------------*/
$obj_nwlnreq->con_close();
exit;
?>