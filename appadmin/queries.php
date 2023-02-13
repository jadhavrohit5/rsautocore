<?php

	 //Check html form input	
	function check_input($data){
		$data = trim($data);
		$data = addslashes($data);
		$data = htmlspecialchars($data);
		$data = mysql_real_escape_string($data);
		return $data;
	}

	 //Generate Random key.
	function randomKey($length) {
		if(is_numeric($length) AND $length < 35 AND $length > 1):
			$i = 0;
			$random_str = '';
			$a_to_z = 'abcdefghijklmnopqrstwzyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
			$max = strlen($a_to_z)-1;
		while($i != $length):
			$rand = mt_rand(0, $max);
			$random_str .= $a_to_z[$rand];
			$i++;
		endwhile;
			return $random_str;
		endif;
	} 

	// Count pages. Pagination dropdown
	function count_page($r, $show){
		$number_of_pages =ceil($r/$show);
		$countpage = '';
		for($i=0; $i<$number_of_pages; $i++){
			$countpage .= '<option value="'.$i * $show.'">'.($i+1).'</option>';			
			}
		return $countpage;
	}

	function pobe_select_noofdays()
	{
		$days_list = null;
		$element = 0;

		for ($i=5; $i<=30; $i++){
			$days_list[$element++] = array("dy" => $i);
		}

		return $days_list;
	}

//------------------------------------------------------------------------------------------------

	function pobe_curr_date()
	{
  		$curr_date = date("Y-m-d");;
		list($year, $month, $day) = explode("-", $curr_date);
		$curr_date = date("d.m", mktime(0, 0, 0, $month, $day)) . "." . $year;
		return $curr_date;
	}

	function pobe_last_signin_date($adminid)
	{
		$db = new build_sql();
		$db->query(" SELECT last_login FROM tbl_rsa_app_users WHERE id = '" . $adminid . "' ");
		$rec = $db->fetch_array();
		if ($rec['last_login'] == NULL){
			$last_login = date("Y-m-d H:i:s"); 
		} else {
			$last_login = $rec['last_login'];
		}
		return $last_login;
	}	

	function pobe_signin_date($adminid)
	{
		$lastlgdate = pobe_last_signin_date($adminid);
		$signindate = date("Y-m-d H:i:s");  
		$db = new build_sql();
		$db->query("UPDATE tbl_rsa_app_users SET last_loged = '". $lastlgdate ."', last_login = '". $signindate ."' WHERE id = '" . $adminid . "' ");
	}	

	function pobe_user_login_count($username)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_app_users WHERE user_name='" . addslashes($username) . "' AND user_status='1' AND is_suspended='0' AND is_deleted='0' ");
		$rec = $db->fetch_array();
		return stripslashes($rec['cnt']);
	}	

//------------------------------------------------------------------------------------------------

	function pobe_admin_useraccount_typename($adminid)
	{
		$db = new build_sql();
		$db->query(" SELECT wat.account_type_desc FROM tbl_rsa_app_users wwa, tbl_rsa_account_type wat WHERE wwa.account_type_id = wat.account_type_id AND wwa.id = '" . $adminid . "' ");
		$rec = $db->fetch_array();
		$account_typename = stripslashes($rec['account_type_desc']);
		return $account_typename;
	}	

//------------------------------------------------------------------------------------------------

	function pobe_usertype($id)
	{
		$db = new build_sql();
		$db->query(" SELECT user_type_name FROM tbl_rsa_user_type WHERE user_type_id = '" . $id . "' ");
		$rec = $db->fetch_array();
		$user_type_name = stripslashes($rec['user_type_name']);
		return $user_type_name;
	}	

	function pobe_user_typename($id)
	{
		$db = new build_sql();
		$db->query(" SELECT user_type_desc FROM tbl_rsa_user_type WHERE user_type_id = '" . $id . "' ");
		$rec = $db->fetch_array();
		$usertypename = stripslashes($rec['user_type_desc']);
		return $usertypename;
	}	

	function pobe_account_typename($id)
	{
		$db = new build_sql();
		$db->query(" SELECT account_type_desc FROM tbl_rsa_account_type WHERE account_type_id = '" . $id . "' ");
		$rec = $db->fetch_array();
		$account_typename = stripslashes($rec['account_type_desc']);
		return $account_typename;
	}	

//------------------------------------------------------------------------------------------------

	function pobe_siteuser_type($adminid)
	{
		$db = new build_sql();
		$db->query(" SELECT user_typename FROM tbl_rsa_app_users WHERE id = '" . $adminid . "' ");
		$rec = $db->fetch_array();
		$usertype = stripslashes($rec['user_typename']);
		return $usertype;
	}	

	function pobe_siteuser_name($adminid)
	{
		$db = new build_sql();
		$db->query(" SELECT contact_person FROM tbl_rsa_app_users WHERE id = '" . $adminid . "' ");
		$rec = $db->fetch_array();
		$fullname = stripslashes($rec['contact_person']);
		return $fullname;
	}	

	function pobe_user_contactemail($adminid)
	{
		$db = new build_sql();
		$db->query(" SELECT contact_email FROM tbl_rsa_app_users WHERE id = '" . $adminid . "' ");
		$rec = $db->fetch_array();
		$contactemail = stripslashes($rec['contact_email']);
		return $contactemail;
	}	

	function pobe_user_username($adminid)
	{
		$db = new build_sql();
		$db->query(" SELECT user_name FROM tbl_rsa_app_users WHERE id = '" . $adminid . "' ");
		$rec = $db->fetch_array();
		$username = stripslashes($rec['user_name']);
		return $username;
	}	

	function pobe_user_user_type_id($adminid)
	{
		$db = new build_sql();
		$db->query(" SELECT user_type_id FROM tbl_rsa_app_users WHERE id = '" . $adminid . "' ");
		$rec = $db->fetch_array();
		$user_type_id = stripslashes($rec['user_type_id']);
		return $user_type_id;
	}	

	function pobe_user_account_type_id($adminid)
	{
		$db = new build_sql();
		$db->query(" SELECT account_type_id FROM tbl_rsa_app_users WHERE id = '" . $adminid . "' ");
		$rec = $db->fetch_array();
		$account_type_id = stripslashes($rec['account_type_id']);
		return $account_type_id;
	}	

	function pobe_user_part_type_access($adminid, $ptype)
	{
		$db = new build_sql();
		$db->query(" SELECT part_type FROM tbl_rsa_app_users WHERE id = '" . $adminid . "' ");
		$rec = $db->fetch_array();
		$part_type = explode(",", $rec['part_type']);
		$pact = 0;
		foreach ( $part_type as $element ) {
			if ( $ptype == $element ) {
				$pact = $element;
			}
		}
		return $pact; 
	}	

	function pobe_user_part_sect_access($adminid, $psect)
	{
		$db = new build_sql();
		$db->query(" SELECT sect_type FROM tbl_rsa_app_users WHERE id = '" . $adminid . "' ");
		$rec = $db->fetch_array();
		$sect_type = explode(",", $rec['sect_type']);
		$pacc = 0;
		foreach ( $sect_type as $element ) {
			if ( $psect == $element ) {
				$pacc = 1;
			}
		}
		return $pacc; 
	}	

//------------------------------------------------------------------------------------------------

	function pobe_po_number($poid)
	{
		$db = new build_sql();
		$db->query(" SELECT po_num FROM tbl_rsa_app_po_data WHERE poid = '" . addslashes($poid) . "' ");
		$rec = $db->fetch_array();
		$po_num = stripslashes($rec['po_num']);
		return $po_num;
	}	

//------------------------------------------------------------------------------------------------

// Pagination function
function showPaginationSch($page, $pcount, $range, $ppage, $schid) {   
	$showpgn = '';
	$showpgn .= '<span class="pagination-links">';
	$showpgn .= '<span class="pages">Page(s): </span>';
	if ($page > 1) {
		$showpgn .= '<a href="'.$_SERVER['PHP_SELF'].'?mode=show&schid='.$schid.'&p='.$ppage.'&pg=1" title="First" class="btn first"><i class="fa fa-angle-double-left"></i></a> <a href="'.$_SERVER['PHP_SELF'].'?mode=show&schid='.$schid.'&p='.$ppage.'&pg='.( $page - 1 ).'" title="Previous" class="btn prev"><i class="fa fa-angle-left" ></i></a> ';
		}
	#------------------------------
	$showpgn .= '<span class="paging">';
	for ($num = ($page - $range); $num < (($page + $range) + 1); $num++) {
		if($num > 0 && $num <= $pcount) {
			if($num == $page) { 
				$showpgn .= ' <span class="num">'.$num.'</span> ';
				} else {
				$showpgn .= ' <a href="'.$_SERVER['PHP_SELF'].'?mode=show&schid='.$schid.'&p='.$ppage.'&pg='.$num.'" class="num">'.$num.'</a> ';
				}
			}
		}
	$showpgn .= '</span>';	
	#------------------------------
	if ($page != $pcount) {
		$showpgn .= ' <a href="'.$_SERVER['PHP_SELF'].'?mode=show&schid='.$schid.'&p='.$ppage.'&pg='.( $page + 1 ).'" title="Next" class="btn next"><i class="fa fa-angle-right" ></i></a> <a href="'.$_SERVER['PHP_SELF'].'?mode=show&schid='.$schid.'&p='.$ppage.'&pg='.$pcount.'" title="Last" class="btn last"><i class="fa fa-angle-double-right"></i></a>';
		}
 	$showpgn .= '</span>';
	return $showpgn;
}

// Pagination function
function showPaginationTw($page, $pcount, $range, $ppage) { 
	$showpgn = '';
	$showpgn .= '<span class="pagination-links">';
	$showpgn .= '<span class="pages">Page(s): </span>';
	if ($page > 1) {
		$showpgn .= '<a href="'.$_SERVER['PHP_SELF'].'?mode=show&p='.$ppage.'&pg=1" title="First" class="btn first"><i class="fa fa-angle-double-left"></i></a> <a href="'.$_SERVER['PHP_SELF'].'?mode=show&p='.$ppage.'&pg='.( $page - 1 ).'" title="Previous" class="btn prev"><i class="fa fa-angle-left" ></i></a> ';
		}
	#------------------------------	
	$showpgn .= '<span class="paging">';
	for ($num = ($page - $range); $num < (($page + $range) + 1); $num++) {
		if($num > 0 && $num <= $pcount) {
			if($num == $page) { 
				$showpgn .= ' <span class="num">'.$num.'</span> ';
				} else {
				$showpgn .= ' <a href="'.$_SERVER['PHP_SELF'].'?mode=show&p='.$ppage.'&pg='.$num.'" class="num">'.$num.'</a> ';
				}
			}
		}
	$showpgn .= '</span>';	
	#------------------------------
	if ($page != $pcount) {
		$showpgn .= ' <a href="'.$_SERVER['PHP_SELF'].'?mode=show&p='.$ppage.'&pg='.( $page + 1 ).'" title="Next" class="btn next"><i class="fa fa-angle-right" ></i></a> <a href="'.$_SERVER['PHP_SELF'].'?mode=show&p='.$ppage.'&pg='.$pcount.'" title="Last" class="btn last"><i class="fa fa-angle-double-right"></i></a>';
		}
 	$showpgn .= '</span>';
	return $showpgn;
}

// Pagination function
function showPaginationSchLog($page, $pcount, $range, $ppage, $vndrid) {   
	$showpgn = '';
	$showpgn .= '<span class="pagination-links">';
	$showpgn .= '<span class="pages">Page(s): </span>';
	if ($page > 1) {
		$showpgn .= '<a href="'.$_SERVER['PHP_SELF'].'?mode=show&id='.$vndrid.'&p='.$ppage.'&pg=1" title="First" class="btn first"><i class="fa fa-angle-double-left"></i></a> <a href="'.$_SERVER['PHP_SELF'].'?mode=show&id='.$vndrid.'&p='.$ppage.'&pg='.( $page - 1 ).'" title="Previous" class="btn prev"><i class="fa fa-angle-left" ></i></a> ';
		}
	#------------------------------
	$showpgn .= '<span class="paging">';
	for ($num = ($page - $range); $num < (($page + $range) + 1); $num++) {
		if($num > 0 && $num <= $pcount) {
			if($num == $page) { 
				$showpgn .= ' <span class="num">'.$num.'</span> ';
				} else {
				$showpgn .= ' <a href="'.$_SERVER['PHP_SELF'].'?mode=show&id='.$vndrid.'&p='.$ppage.'&pg='.$num.'" class="num">'.$num.'</a> ';
				}
			}
		}
	$showpgn .= '</span>';	
	#------------------------------
	if ($page != $pcount) {
		$showpgn .= ' <a href="'.$_SERVER['PHP_SELF'].'?mode=show&id='.$vndrid.'&p='.$ppage.'&pg='.( $page + 1 ).'" title="Next" class="btn next"><i class="fa fa-angle-right" ></i></a> <a href="'.$_SERVER['PHP_SELF'].'?mode=show&id='.$vndrid.'&p='.$ppage.'&pg='.$pcount.'" title="Last" class="btn last"><i class="fa fa-angle-double-right"></i></a>';
		}
 	$showpgn .= '</span>';
	return $showpgn;
}

//------------------------------------------------------------------------------------------------

// Pagination function - added on 17-05-2022 
function showPaginationOWD($page, $pcount, $range, $ppage, $updno) {   
	$showpgn = '';
	$showpgn .= '<span class="pagination-links">';
	$showpgn .= '<span class="pages">Page(s): </span>';
	if ($page > 1) {
		$showpgn .= '<a href="'.$_SERVER['PHP_SELF'].'?mode=show&updno='.$updno.'&p='.$ppage.'&pg=1" title="First" class="btn first"><i class="fa fa-angle-double-left"></i></a> <a href="'.$_SERVER['PHP_SELF'].'?mode=show&updno='.$updno.'&p='.$ppage.'&pg='.( $page - 1 ).'" title="Previous" class="btn prev"><i class="fa fa-angle-left" ></i></a> ';
		}
	#------------------------------
	$showpgn .= '<span class="paging">';
	for ($num = ($page - $range); $num < (($page + $range) + 1); $num++) {
		if($num > 0 && $num <= $pcount) {
			if($num == $page) { 
				$showpgn .= ' <span class="num">'.$num.'</span> ';
				} else {
				$showpgn .= ' <a href="'.$_SERVER['PHP_SELF'].'?mode=show&updno='.$updno.'&p='.$ppage.'&pg='.$num.'" class="num">'.$num.'</a> ';
				}
			}
		}
	$showpgn .= '</span>';	
	#------------------------------
	if ($page != $pcount) {
		$showpgn .= ' <a href="'.$_SERVER['PHP_SELF'].'?mode=show&updno='.$updno.'&p='.$ppage.'&pg='.( $page + 1 ).'" title="Next" class="btn next"><i class="fa fa-angle-right" ></i></a> <a href="'.$_SERVER['PHP_SELF'].'?mode=show&updno='.$updno.'&p='.$ppage.'&pg='.$pcount.'" title="Last" class="btn last"><i class="fa fa-angle-double-right"></i></a>';
		}
 	$showpgn .= '</span>';
	return $showpgn;
}

//------------------------------------------------------------------------------------------------

	function pobe_view_part_type($id)
	{
		$db = new build_sql();
		$db->query(" SELECT part_type FROM tbl_rsa_part_type WHERE id = '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		$part_type = stripslashes($rec['part_type']);
		return $part_type;
	}	

	//  updated on 28-01-2022 , 22-02-2022 
	function pobe_purchase_order_list($userid,$ponum)
	{
		$db = new build_sql();					
		$db->query("SELECT id, partid, part_type, rsac_ref, oe_number, sch_type, articleno, brandno, required_stock, purchase_price, offered_stock, offered_price, postdate, is_delivered FROM tbl_rsa_app_offered_items_final WHERE userid = '" . addslashes($userid) . "' AND po_num = '" . addslashes($ponum) . "' AND status = '1' AND is_deleted = '0' ORDER BY id ASC ");

		$type_list = null;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$type_list[$element++] = array("cid" => stripslashes($clist['id']), "parttype" => pobe_view_part_type($clist['part_type']), "rsacref" => stripslashes($clist['rsac_ref']), "oenumber" => stripslashes($clist['oe_number']), "reqstock" => stripslashes($clist['required_stock']), "buyprice" => stripslashes($clist['purchase_price']), "ofrstock" => stripslashes($clist['offered_stock']), "ofrprice" => stripslashes($clist['offered_price']), "delvrd" => stripslashes($clist['is_delivered']), "cnt" => $element);
			}
		}

		return $type_list;
	}


//------------------------------------------------------------------------------------------------

	function pobe_count_usr_searches($useridd)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_app_search WHERE userid = '". addslashes($useridd) ."' ");
		//$db->query(" SELECT count(*) as cnt FROM tbl_rsa_app_offered_items_temp WHERE userid = '". addslashes($useridd) ."' ");
		$rec = $db->fetch_array();
		$cntsch = (int)stripslashes($rec['cnt']);
		return $cntsch;
	}	

	function pobe_count_usr_sessions($useridd)
	{
		$db = new build_sql();
		$db->query(" SELECT count(DISTINCT vendortmp) as cnt FROM tbl_rsa_app_search WHERE userid = '". addslashes($useridd) ."' ");
		//$db->query(" SELECT count(DISTINCT vendortmp) as cnt FROM tbl_rsa_app_offered_items_temp WHERE userid = '". addslashes($useridd) ."' ");
		$rec = $db->fetch_array();
		$cntss = (int)stripslashes($rec['cnt']);
		return $cntss;
	}	

	function pobe_count_purchase_orders($useridd)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_app_po_data WHERE userid = '". addslashes($useridd) ."' AND is_deleted = '0' ");
		$rec = $db->fetch_array();
		$cntpo = (int)stripslashes($rec['cnt']);
		return $cntpo;
	}	

//------------------------------------------------------------------------------------------------

	function pobe_count_usr_searches_30days($useridd)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_app_search WHERE userid = '". addslashes($useridd) ."' AND searchdate BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW() ");
		$rec = $db->fetch_array();
		$cntsch = (int)stripslashes($rec['cnt']);
		return $cntsch;
	}	

	function pobe_count_usr_sessions_30days($useridd)
	{
		$db = new build_sql();
		$db->query(" SELECT count(DISTINCT vendortmp) as cnt FROM tbl_rsa_app_search WHERE userid = '". addslashes($useridd) ."' AND searchdate BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW() ");
		$rec = $db->fetch_array();
		$cntss = (int)stripslashes($rec['cnt']);
		return $cntss;
	}	

//------------------------------------------------------------------------------------------------

	//  added on 15-10-2020 
	function pobe_parttype_count()
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_part_type WHERE status = '1' AND is_deleted = '0' ");
		$rec = $db->fetch_array();
		return stripslashes($rec['cnt']);
	}	

	//  added on 15-10-2020 
	function pobe_parttype_list()
	{
		$db = new build_sql();					
		$db->query("SELECT id,part_type FROM tbl_rsa_part_type WHERE status = '1' AND is_deleted = '0' ORDER BY id ASC ");

		$parttype_list = null;
		$num = 1;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				if (($num%5 == 0) && ($num > 1)) {
					$noit = 1;
				} else {
					$noit = 0;
				}
				$parttype_list[$element++] = array("typeid" => stripslashes($clist['id']), "typenm" => stripslashes($clist['part_type']), "itmno" => $num, "brk" => $noit);
				$num++;
			}
		}

		return $parttype_list;
	}

	//  added on 15-10-2020 
	function matchObjById($id,$typeopt){
		foreach ( $typeopt as $element ) {
			if ( $id == $element ) {
				return 1;
			}
		}

		return false;
	}

	//  added on 15-10-2020 
	function pobe_parttype_list_upd($typeopt)
	{
		$db = new build_sql();					
		$db->query("SELECT id,part_type FROM tbl_rsa_part_type WHERE status = '1' AND is_deleted = '0' ORDER BY id ASC ");

		$parttype_list = null;
		$num = 1;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				if (($num%5 == 0) && ($num > 1)) {
					$noit = 1;
				} else {
					$noit = 0;
				}
				$parttype_list[$element++] = array("typeid" => stripslashes($clist['id']), "typenm" => stripslashes($clist['part_type']), "itmno" => $num, "brk" => $noit, "chk" => matchObjById($clist['id'],$typeopt));
				$num++;
			}
		}

		return $parttype_list;
	}

//------------------------------------------------------------------------------------------------
//	added on 2021 
//------------------------------------------------------------------------------------------------

	//  added on 04-08-2021  
	function pobe_partgroup_count()
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_part_group WHERE status = '1' ");
		$rec = $db->fetch_array();
		return stripslashes($rec['cnt']);
	}	

	//  added on 04-08-2021  
	function pobe_partgroup_typeids($id)
	{
		$db = new build_sql();
		$db->query(" SELECT part_type_opt FROM tbl_rsa_part_group WHERE id = '". addslashes($id) ."' ");
		$rec = $db->fetch_array();
		$typeids = stripslashes($rec['part_type_opt']);
		return $typeids;
	}	

	//  added on 04-08-2021  
	function pobe_partgroup_list()
	{
		$db = new build_sql();					
		$db->query("SELECT id,part_group_name FROM tbl_rsa_part_group WHERE status = '1' ORDER BY id ASC ");

		$parttype_list = null;
		$num = 1;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				if (($num%6 == 0) && ($num > 1)) {
					$noit = 1;
				} else {
					$noit = 0;
				}
				$parttype_list[$element++] = array("typeid" => stripslashes($clist['id']), "typenm" => stripslashes($clist['part_group_name']), "itmno" => $num, "brk" => $noit);
				$num++;
			}
		}

		return $parttype_list;
	}

	//  added on 04-08-2021  
	function pobe_partgroup_list_upd($typeopt)
	{
		$db = new build_sql();					
		$db->query("SELECT id,part_group_name FROM tbl_rsa_part_group WHERE status = '1' ORDER BY id ASC ");

		$parttype_list = null;
		$num = 1;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				if (($num%6 == 0) && ($num > 1)) {
					$noit = 1;
				} else {
					$noit = 0;
				}
				$parttype_list[$element++] = array("typeid" => stripslashes($clist['id']), "typenm" => stripslashes($clist['part_group_name']), "itmno" => $num, "brk" => $noit, "chk" => matchObjById($clist['id'],$typeopt));
				$num++;
			}
		}

		return $parttype_list;
	}

//------------------------------------------------------------------------------------------------

	// updated on 15-03-2022 
	function pobe_get_part_id($rsac)
	{
		$db = new build_sql();
		$db->query(" SELECT id FROM tbl_rsa_parts WHERE rsac = '" . addslashes($rsac) . "' ");
		if($db->get_num_rows()) {
		$rec = $db->fetch_array();
		$partid = $rec['id'];
		} else {
		$partid = 0;
		//$partid = pobe_get_part_id_crdata($rsac);
		}
		return $partid;
	}	

	// added on 15-03-2022 for calipers
	function pobe_get_part_id_crdata($crdata)
	{
		$db = new build_sql();
		$db->query(" SELECT partid FROM tbl_rsa_parts_customerref WHERE crdata = '". addslashes($crdata) ."' AND custid = '41' ");
		if($db->get_num_rows()) {
		$rec = $db->fetch_array();
		$partid = $rec['partid'];
		} else {
		$partid = 0;
		}
		return $partid;
	}	

	function pobe_get_part_type($partid)
	{
		$db = new build_sql();
		$db->query(" SELECT part_type FROM tbl_rsa_parts WHERE id = '" . addslashes($partid) . "' ");
		$rec = $db->fetch_array();
		$parttp = $rec['part_type'];
		return $parttp;
	}	

//------------------------------------------------------------------------------------------------

	function pobe_vendor_name($id)
	{
		$db = new build_sql();
		$db->query(" SELECT contact_person FROM tbl_rsa_app_users WHERE id = '" . $id . "' ");
		$rec = $db->fetch_array();
		$fullname = stripslashes($rec['contact_person']);
		$vendorname = preg_replace("/[^a-zA-Z]+/", "", $fullname);
		return $vendorname;
	}	

//------------------------------------------------------------------------------------------------

	// added on 28-01-2022 
	function pobe_view_part_group($id)
	{
		$db = new build_sql();
		$db->query(" SELECT part_group_name FROM tbl_rsa_part_group WHERE id = '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		$cat_type = stripslashes($rec['part_group_name']);
		return $cat_type;
	}	

	// added on 18-02-2022  
	function pobe_vendor_currency($useridd)
	{
		$db = new build_sql();
		$db->query(" SELECT country FROM tbl_rsa_app_users WHERE id = '" . $useridd . "' ");
		$rec = $db->fetch_array();
		if ($rec['country'] == "United Kingdom"){
			$vdrcur = "&pound;"; 
		} else {
			$vdrcur = "&euro;"; 
		}
		return $vdrcur;
	}	

	// added on 22-02-2022  
	function pobe_partspurchased_delivery_status($po_num)
	{
		$db = new build_sql();
		$db->query(" SELECT count(id) as totitm, SUM(is_delivered = '1') as delvyes, SUM(is_delivered = '0') as delvnot FROM tbl_rsa_app_offered_items_final WHERE po_num = '" . addslashes($po_num) . "' AND status = '1' AND is_deleted = '0' ");
		$rec = $db->fetch_array();
		if ($rec['totitm'] == $rec['delvyes']){
			$dstatus = "YES"; 
		} else if ($rec['totitm'] == $rec['delvnot']){
			$dstatus = "NO"; 
		} else {
			$dstatus = "Partially"; 
		}
		return $dstatus;
	}	

	// added on 25-03-2022  
	function pobe_view_distict_ponum($updno)
	{
		$db = new build_sql();
		$db->query(" SELECT DISTINCT po_num FROM tbl_rsa_app_onway_stock WHERE status = '1' AND is_deleted = '0' AND uploadnum = '" . addslashes($updno) . "' ");
		$ponums = "";
		if($db->get_num_rows()) {
			while($clist = $db->fetch_array()){
				$ponums .= $clist['po_num']."<br/>";
			}
		}
		return $ponums;
	}	

	// added on 25-03-2022  
	function pobe_view_distict_suuplier($updno)
	{
		$db = new build_sql();
		$db->query(" SELECT DISTINCT supplier FROM tbl_rsa_app_onway_stock WHERE status = '1' AND is_deleted = '0' AND uploadnum = '" . addslashes($updno) . "' ");
		$suppliers = "";
		if($db->get_num_rows()) {
			while($clist = $db->fetch_array()){
				$suppliers .= $clist['supplier']."<br/>";
			}
		}
		//return rtrim($suppliers, ', ');
		return $suppliers;
	}	

//------------------------------------------------------------------------------------------------


?>