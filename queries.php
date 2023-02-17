<?php
//part id array that should be displayed in following order
define("PARTS_MENU_ORDER_LIST", serialize(array(2, 1, 3, 4, 8, 5, 6, 7, 17, 16, 15, 14, 10, 11, 9, 13)));

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
		$db->query(" SELECT last_login FROM tbl_rsa_users WHERE id = '" . $adminid . "' ");
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
		$db->query("UPDATE tbl_rsa_users SET last_loged = '". $lastlgdate ."', last_login = '". $signindate ."' WHERE id = '" . $adminid . "' ");
	}	

	function pobe_user_login_count($username)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_users WHERE user_name='" . addslashes($username) . "' AND user_status='1' AND is_suspended='0' AND is_deleted='0' ");
		$rec = $db->fetch_array();
		return stripslashes($rec['cnt']);
	}	

//------------------------------------------------------------------------------------------------

	function pobe_admin_useraccount_typename($adminid)
	{
		$db = new build_sql();
		$db->query(" SELECT wat.account_type_desc FROM tbl_rsa_users wwa, tbl_rsa_account_type wat WHERE wwa.account_type_id = wat.account_type_id AND wwa.id = '" . $adminid . "' ");
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
		$db->query(" SELECT user_typename FROM tbl_rsa_users WHERE id = '" . $adminid . "' ");
		$rec = $db->fetch_array();
		$usertype = stripslashes($rec['user_typename']);
		return $usertype;
	}	

	function pobe_siteuser_name($adminid)
	{
		$db = new build_sql();
		$db->query(" SELECT contact_person FROM tbl_rsa_users WHERE id = '" . $adminid . "' ");
		$rec = $db->fetch_array();
		$fullname = stripslashes($rec['contact_person']);
		return $fullname;
	}	

	function pobe_user_contactemail($adminid)
	{
		$db = new build_sql();
		$db->query(" SELECT contact_email FROM tbl_rsa_users WHERE id = '" . $adminid . "' ");
		$rec = $db->fetch_array();
		$contactemail = stripslashes($rec['contact_email']);
		return $contactemail;
	}	

	function pobe_user_username($adminid)
	{
		$db = new build_sql();
		$db->query(" SELECT user_name FROM tbl_rsa_users WHERE id = '" . $adminid . "' ");
		$rec = $db->fetch_array();
		$username = stripslashes($rec['user_name']);
		return $username;
	}	

	function pobe_user_user_type_id($adminid)
	{
		$db = new build_sql();
		$db->query(" SELECT user_type_id FROM tbl_rsa_users WHERE id = '" . $adminid . "' ");
		$rec = $db->fetch_array();
		$user_type_id = stripslashes($rec['user_type_id']);
		return $user_type_id;
	}	

	function pobe_user_account_type_id($adminid)
	{
		$db = new build_sql();
		$db->query(" SELECT account_type_id FROM tbl_rsa_users WHERE id = '" . $adminid . "' ");
		$rec = $db->fetch_array();
		$account_type_id = stripslashes($rec['account_type_id']);
		return $account_type_id;
	}	

	function pobe_user_part_type_access($adminid, $ptype)
	{
		$db = new build_sql();
		$db->query(" SELECT part_type FROM tbl_rsa_users WHERE id = '" . $adminid . "' ");
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
		$db->query(" SELECT sect_type FROM tbl_rsa_users WHERE id = '" . $adminid . "' ");
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

// Pagination function
function showPagination($page, $pcount, $range, $ppage, $ptype) { 
	$showpgn = '';
	$showpgn .= '<span class="pagination-links">';
	$showpgn .= '<span class="pages">Page(s): </span>';
	if ($page > 1) {
		$showpgn .= '<a href="'.$_SERVER['PHP_SELF'].'?mode=show&type='.$ptype.'&p='.$ppage.'&pg=1" title="First" class="btn first"><i class="fa fa-angle-double-left"></i></a> <a href="'.$_SERVER['PHP_SELF'].'?mode=show&type='.$ptype.'&p='.$ppage.'&pg='.( $page - 1 ).'" title="Previous" class="btn prev"><i class="fa fa-angle-left" ></i></a> ';
		}
	#------------------------------	
	$showpgn .= '<span class="paging">';
	for ($num = ($page - $range); $num < (($page + $range) + 1); $num++) {
		if($num > 0 && $num <= $pcount) {
			if($num == $page) { 
				$showpgn .= ' <span class="num">'.$num.'</span> ';
				} else {
				$showpgn .= ' <a href="'.$_SERVER['PHP_SELF'].'?mode=show&type='.$ptype.'&p='.$ppage.'&pg='.$num.'" class="num">'.$num.'</a> ';
				}
			}
		}
	$showpgn .= '</span>';	
	#------------------------------
	if ($page != $pcount) {
		$showpgn .= ' <a href="'.$_SERVER['PHP_SELF'].'?mode=show&type='.$ptype.'&p='.$ppage.'&pg='.( $page + 1 ).'" title="Next" class="btn next"><i class="fa fa-angle-right" ></i></a> <a href="'.$_SERVER['PHP_SELF'].'?mode=show&type='.$ptype.'&p='.$ppage.'&pg='.$pcount.'" title="Last" class="btn last"><i class="fa fa-angle-double-right"></i></a>';
		}
 	$showpgn .= '</span>';
	return $showpgn;
}

// Pagination function
function showPaginationSch($page, $pcount, $range, $ppage, $ptype, $schid) {   
	$showpgn = '';
	$showpgn .= '<span class="pagination-links">';
	$showpgn .= '<span class="pages">Page(s): </span>';
	if ($page > 1) {
		$showpgn .= '<a href="'.$_SERVER['PHP_SELF'].'?mode=show&type='.$ptype.'&schid='.$schid.'&p='.$ppage.'&pg=1" title="First" class="btn first"><i class="fa fa-angle-double-left"></i></a> <a href="'.$_SERVER['PHP_SELF'].'?mode=show&type='.$ptype.'&schid='.$schid.'&p='.$ppage.'&pg='.( $page - 1 ).'" title="Previous" class="btn prev"><i class="fa fa-angle-left" ></i></a> ';
		}
	#------------------------------
	$showpgn .= '<span class="paging">';
	for ($num = ($page - $range); $num < (($page + $range) + 1); $num++) {
		if($num > 0 && $num <= $pcount) {
			if($num == $page) { 
				$showpgn .= ' <span class="num">'.$num.'</span> ';
				} else {
				$showpgn .= ' <a href="'.$_SERVER['PHP_SELF'].'?mode=show&type='.$ptype.'&schid='.$schid.'&p='.$ppage.'&pg='.$num.'" class="num">'.$num.'</a> ';
				}
			}
		}
	$showpgn .= '</span>';	
	#------------------------------
	if ($page != $pcount) {
		$showpgn .= ' <a href="'.$_SERVER['PHP_SELF'].'?mode=show&type='.$ptype.'&schid='.$schid.'&p='.$ppage.'&pg='.( $page + 1 ).'" title="Next" class="btn next"><i class="fa fa-angle-right" ></i></a> <a href="'.$_SERVER['PHP_SELF'].'?mode=show&type='.$ptype.'&schid='.$schid.'&p='.$ppage.'&pg='.$pcount.'" title="Last" class="btn last"><i class="fa fa-angle-double-right"></i></a>';
		}
 	$showpgn .= '</span>';
	return $showpgn;
}

//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------

	function pobe_chk_part_rsac_name($id,$rsac)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_parts WHERE is_deleted = '0' AND rsac = '" . addslashes($rsac) . "' AND id <> '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		if ($rec['cnt'] == 0){
			return 0; 
		} else {
			return 1; 
		}
	}	

	// updated on 03-02-2023 
	function pobe_number_of_parts_count($parttype)
	{
		$db = new build_sql();
		$grtypes = [14, 15, 16, 17];   
		if (in_array($parttype, $grtypes)) {
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_parts WHERE status = '1' AND is_deleted = '0' AND is_main = '1' AND part_type = '" . addslashes($parttype) . "' ");
		} else {
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_parts WHERE status = '1' AND is_deleted = '0' AND part_type = '" . addslashes($parttype) . "' ");
		}
		$rec = $db->fetch_array();
		return stripslashes($rec['cnt']);
	}	

	function pobe_get_part_id($rsac)
	{
		$db = new build_sql();
		$db->query(" SELECT id FROM tbl_rsa_parts WHERE rsac = '" . addslashes($rsac) . "' ");
		if($db->get_num_rows()) {
		$rec = $db->fetch_array();
		$partid = $rec['id'];
		} else {
		$partid = 0;
		}
		return $partid;
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

	function pobe_chk_part_type_name($id,$parttype)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_part_type WHERE is_deleted = '0' AND part_type = '" . addslashes($parttype) . "' AND id <> '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		if ($rec['cnt'] == 0){
			return 0; 
		} else {
			return 1; 
		}
	}	

	function pobe_part_type_cust_options($id)
	{
		$db = new build_sql();
		$db->query(" SELECT cust_opt FROM tbl_rsa_part_type WHERE id = '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		$cust_opt = stripslashes($rec['cust_opt']);
		return $cust_opt;
	}	

	function pobe_part_type_oeoem_options($id)
	{
		$db = new build_sql();
		$db->query(" SELECT oeoemopt FROM tbl_rsa_part_type WHERE id = '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		$oeoemopt = stripslashes($rec['oeoemopt']);
		return $oeoemopt;
	}	

	function pobe_part_type_list()
	{
		$db = new build_sql();					
		$db->query("SELECT id,part_type FROM tbl_rsa_part_type WHERE status = '1' AND is_deleted = '0' ORDER BY id ASC ");

		$type_list = null;
		$result_list = array();
        if ($db->get_num_rows()) {
            $element = 0;
            while ($clist = $db->fetch_array()) {
                $type_list[$clist['id']] = array("typeid" => stripslashes($clist['id']), "parttype" => stripslashes($clist['part_type']));
            }
        }

        $db->query("SELECT part_type FROM tbl_rsa_users WHERE id = '" . base64_decode($_SESSION['user_id']) . "' ");
        $rec = $db->fetch_array();
        $part_type = explode(",", $rec['part_type']);
        foreach ($part_type as $part_type) {
            if (array_key_exists($part_type, $type_list)) {
                $final_parts_list[$part_type] = array("typeid" => stripslashes($type_list[$part_type]['typeid']), "parttype" => stripslashes($type_list[$part_type]['parttype']));
            }
        }

        $displayView = unserialize(PARTS_MENU_ORDER_LIST);
        foreach ($displayView as $displayView) {
            if (array_key_exists($displayView, $final_parts_list)) {
                $result_list[] = array("typeid" => stripslashes($type_list[$displayView]['typeid']), "parttype" => stripslashes($type_list[$displayView]['parttype']));
            }
        }

        return $result_list;
	}

	function pobe_parttype_count()
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_part_type WHERE status = '1' AND is_deleted = '0' ");
		$rec = $db->fetch_array();
		return stripslashes($rec['cnt']);
	}	

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

	function matchObjById($id,$typeopt){
		foreach ( $typeopt as $element ) {
			if ( $id == $element ) {
				return 1;
			}
		}

		return false;
	}

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

	function pobe_view_part_make($id)
	{
		$db = new build_sql();
		$db->query(" SELECT name FROM tbl_rsa_make WHERE id = '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		$part_make = stripslashes($rec['name']);
		return $part_make;
	}	

	function pobe_chk_make_name($id,$makenm)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_make WHERE is_deleted = '0' AND name = '" . addslashes($makenm) . "' AND id <> '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		if ($rec['cnt'] == 0){
			return 0; 
		} else {
			return 1; 
		}
	}	

	function pobe_part_make_list()
	{
		$db = new build_sql();					
		$db->query("SELECT id,name FROM tbl_rsa_make WHERE status = '1' AND is_deleted = '0' ORDER BY name ASC ");

		$make_list = null;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$make_list[$element++] = array("makeid" => stripslashes($clist['id']), "make" => stripslashes($clist['name']));
			}
		}

		return $make_list;
	}

//------------------------------------------------------------------------------------------------

	function pobe_chk_manufacturer_name($id,$manufacturernm)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_manufacturers WHERE is_deleted = '0' AND name = '" . addslashes($manufacturernm) . "' AND id <> '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		if ($rec['cnt'] == 0){
			return 0; 
		} else {
			return 1; 
		}
	}	

	function pobe_part_manufacturer_list()
	{
		$db = new build_sql();					
		$db->query("SELECT id,name FROM tbl_rsa_manufacturers WHERE status = '1' AND is_deleted = '0' ORDER BY name ASC ");

		$mnf_list = null;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$mnf_list[$element++] = array("mnfid" => stripslashes($clist['id']), "carmaker" => stripslashes($clist['name']));
			}
		}

		return $mnf_list;
	}

//------------------------------------------------------------------------------------------------

	function pobe_chk_customer_name($id,$custnm)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_customers WHERE is_deleted = '0' AND name = '" . addslashes($custnm) . "' AND cid <> '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		if ($rec['cnt'] == 0){
			return 0; 
		} else {
			return 1; 
		}
	}	

	function pobe_get_customer_id($ctcode)
	{
		$db = new build_sql();
		$db->query(" SELECT cid FROM tbl_rsa_customers WHERE sortcode = '" . addslashes($ctcode) . "' ");
		$rec = $db->fetch_array();
		$customerid = stripslashes($rec['cid']);
		return $customerid;
	}	

	function pobe_customer_count()
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_customers WHERE status = '1' ");
		$rec = $db->fetch_array();
		return stripslashes($rec['cnt']);
	}	

	function pobe_customer_list()
	{
		$db = new build_sql();					
		$db->query("SELECT cid,name,sortcode FROM tbl_rsa_customers WHERE status = '1' ORDER BY cid ASC ");

		$customer_list = null;
		$num = 1;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				if (($num%5 == 0) && ($num > 1)) {
					$noit = 1;
				} else {
					$noit = 0;
				}
				$customer_list[$element++] = array("custid" => stripslashes($clist['cid']), "custname" => stripslashes($clist['name']), "custcode" => stripslashes($clist['sortcode']), "itmno" => $num, "brk" => $noit);
				$num++;
			}
		}

		return $customer_list;
	}

	function pobe_get_customer_ref($cid)
	{
		$db = new build_sql();
		$db->query(" SELECT name FROM tbl_rsa_customers WHERE cid = ". addslashes($cid) ." ");
		$rec = $db->fetch_array();
		$custname = stripslashes($rec['name']);
		return $custname;
	}	

//------------------------------------------------------------------------------------------------

	function findObjectById($id,$custopt){
		foreach ( $custopt as $element ) {
			if ( $id == $element ) {
				return 1;
			}
		}

		return false;
	}

	function pobe_customer_list_2($custopt)
	{
		$db = new build_sql();					
		$db->query("SELECT cid,name,sortcode FROM tbl_rsa_customers WHERE status = '1' ORDER BY cid ASC ");

		$customer_list = null;
		$num = 1;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				if (($num%5 == 0) && ($num > 1)) {
					$noit = 1;
				} else {
					$noit = 0;
				}
				$customer_list[$element++] = array("custid" => stripslashes($clist['cid']), "custname" => stripslashes($clist['name']), "custcode" => stripslashes($clist['sortcode']), "itmno" => $num, "brk" => $noit, "chk" => findObjectById($clist['cid'],$custopt));
				$num++;
			}
		}

		return $customer_list;
	}

	function pobe_customer_opt_list($custopt)
	{
		$db = new build_sql();					
		$db->query("SELECT cid,name,sortcode FROM tbl_rsa_customers WHERE status = '1' ORDER BY cid ASC ");

		$customer_list = null;
		$num = 1;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$customer_list[$element++] = array("custid" => stripslashes($clist['cid']), "custname" => stripslashes($clist['name']), "custcode" => stripslashes($clist['sortcode']), "itmno" => $num, "chk" => findObjectById($clist['cid'],$custopt));
				$num++;
			}
		}

		return $customer_list;
	}

	function pobe_customer_opt_list_3($custopt,$partid)
	{
		$db = new build_sql();					
		$db->query("SELECT trc.cid,trc.name,trc.sortcode,trp.crdata from tbl_rsa_customers trc left join tbl_rsa_parts_customerref trp on trp.custid = trc.cid AND trp.partid = '" . addslashes($partid) . "' AND trp.refnum = 1 WHERE trc.status = '1' ORDER BY trc.cid ASC");

		$customer_list = null;
		//$num = 1;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$customer_list[$element++] = array("custid" => stripslashes($clist['cid']), "custname" => stripslashes($clist['name']), "custcode" => stripslashes($clist['sortcode']), "crdata" => stripslashes($clist['crdata']), "chk" => findObjectById($clist['cid'],$custopt));
				//$num++;
			}
		}

		return $customer_list;
	}

//------------------------------------------------------------------------------------------------

	function pobe_update_partsdata_cref($partid,$custid,$crdata)
	{
		$db = new build_sql();
		$db2 = new build_sql();
		$db->query("SELECT count(*) as cnt FROM tbl_rsa_parts_customerref WHERE custid = ". addslashes($custid) ." AND partid = ". addslashes($partid) ." AND refnum = 1 ");
		//echo "SELECT count(*) as cnt FROM tbl_rsa_parts_customerref WHERE custid = ". addslashes($custid) ." AND partid = ". addslashes($partid) ." AND refnum = 1 <br>";
		$rec = $db->fetch_array();
		$dateupdtd = date("Y-m-d H:i:s");
		if ($rec['cnt'] == 0){
			if (isset($crdata) && trim($crdata) != ''){
			//echo "INSERT INTO tbl_rsa_parts_customerref (custid, partid, refnum, crdata, postdate, status, last_updated) VALUES(". addslashes($custid) .", ". addslashes($partid) .", 1, '". addslashes($crdata) ."', '". $dateupdtd ."', '1', '". $dateupdtd ."')<br>";
			$db2->query("INSERT INTO tbl_rsa_parts_customerref (custid, partid, refnum, crdata, postdate, status, last_updated) VALUES(". addslashes($custid) .", ". addslashes($partid) .", 1, '". addslashes($crdata) ."', '". $dateupdtd ."', '1', '". $dateupdtd ."')");
			}
		} else {
			//echo "UPDATE tbl_rsa_parts_customerref SET crdata = '". addslashes($crdata) ."', last_updated = '". $dateupdtd ."' WHERE custid = ". addslashes($custid) ." AND partid = ". addslashes($partid) ." AND refnum = 1<br>";
			$db2->query("UPDATE tbl_rsa_parts_customerref SET crdata = '". addslashes($crdata) ."', last_updated = '". $dateupdtd ."' WHERE custid = ". addslashes($custid) ." AND partid = ". addslashes($partid) ." AND refnum = 1 ");
		}
	}	

//------------------------------------------------------------------------------------------------

	function pobe_sch_part_make_list()
	{
		$db = new build_sql();					
		$db->query("SELECT id,name FROM tbl_rsa_make WHERE status = '1' AND is_deleted = '0' AND name <> '' ORDER BY name ASC ");

		$make_list = null;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$make_list[$element++] = array("makeid" => stripslashes($clist['id']), "make" => stripslashes($clist['name']));
			}
		}

		return $make_list;
	}

	function pobe_sch_part_manufacturer_list()
	{
		$db = new build_sql();					
		$db->query("SELECT id,name FROM tbl_rsa_manufacturers WHERE status = '1' AND is_deleted = '0' AND name <> '' ORDER BY name ASC ");

		$mnf_list = null;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$mnf_list[$element++] = array("mnfid" => stripslashes($clist['id']), "carmaker" => stripslashes($clist['name']));
			}
		}

		return $mnf_list;
	}

	function pobe_sch_customer_ref_list($type)
	{
		$db = new build_sql();					
		$db->query("SELECT cid,name,sortcode FROM tbl_rsa_customers WHERE status = '1' AND is_deleted = '0' ORDER BY cid ASC ");

		$customer_list = null;
		$custopt = explode(",", pobe_part_type_cust_options($type));

		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$customer_list[$element++] = array("custid" => stripslashes($clist['cid']), "custname" => stripslashes($clist['name']), "custcode" => stripslashes($clist['sortcode']), "chk" => findObjectById($clist['cid'],$custopt));
			}
		}

		return $customer_list;
	}


//------------------------------------------------------------------------------------------------TEMP

	function pobe_update_part_type($id,$adminid)
	{
		$datedeleted = date("Y-m-d H:i:s");
		$db = new build_sql();
		$db->query("UPDATE tbl_rsa_part_type SET status = '1', deletedbyid = ". $adminid .", datedeleted = '". $datedeleted ."', is_deleted = '0' WHERE id = '" . $id . "' ");
	}	

//------------------------------------------------------------------------------------------------

	function pobe_view_part_image($id)
	{
		$db = new build_sql();
		$db->query(" SELECT image FROM tbl_rsa_parts_desc WHERE partid = '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		$imagepath = str_replace(array('[',']','"'),'',stripslashes($rec['image']));
		$img = explode(",", $imagepath);
		//print_r($img);
		//echo "<br>".$img[0]."<br>";
		if (isset($img[0]) && $img[0] != ''){
			////$imgnm = "uploads/".basename($img[0]);
			// updated on 09-08-2022 
			$imgnm = $img[0];
			//echo "<br>".$imgnm."<br>";
			if (file_exists($imgnm)) {
				return $imgnm;
				//return $img[0];
			} else {
				return "";
			}
		} else {
			return "";
		}
	}	

	function pobe_part_images_display($id)
	{
		$db = new build_sql();					
		$db->query("SELECT image FROM tbl_rsa_parts_desc WHERE status = 1 AND partid = '" . addslashes($id) . "' ");
		$i=0;
		$displayphoto = "";
		if($db->get_num_rows()) {
			$displayphoto .= "<div class='rslider'>";
			$displayphoto .= "<ul class='rslides'>";
			$rec = $db->fetch_array();
			$imagepath = str_replace(array('[',']','"'),'',stripslashes($rec['image']));

			if(isset($imagepath)) {  
				$img = explode(",", $imagepath);
				foreach ($img as $item) {
					if (isset($item) && $item != ''){
						////$imgnm = "uploads/".basename($item);
						// updated on 09-08-2022 
						$imgnm = $item;
						if (file_exists($imgnm)) {
							$displayphoto .= "<li><a href='javascript:void(0);' onclick='lightbox(&quot;view-image.php?src=".$imgnm."&t=".base64_encode($id)."&quot;)'><img src='".$imgnm."' alt=''/></a></li>";
							$i++;
						}
					}
				}
			}
			$displayphoto .= "</ul>";
			$displayphoto .= "</div>";
		}

		return $displayphoto;
	}

//------------------------------------------------------------------------------------------------

	function pobe_get_prev_part($id,$ptype)
	{
		$db = new build_sql();
		$db->query(" SELECT id FROM tbl_rsa_parts WHERE status = '1' AND is_deleted = '0' AND part_type = '" . addslashes($ptype) . "' AND id < '" . addslashes($id) . "' order by id DESC LIMIT 1 ");
		$rec = $db->fetch_array();
		$previd = isset($rec['id']) ? stripslashes($rec['id']) : '';
		return $previd;
	}	

	function pobe_get_next_part($id,$ptype)
	{
		$db = new build_sql();
		$db->query(" SELECT id FROM tbl_rsa_parts WHERE status = '1' AND is_deleted = '0' AND part_type = '" . addslashes($ptype) . "' AND id > '" . addslashes($id) . "' order by id ASC LIMIT 1 ");
		$rec = $db->fetch_array();
		$nextid = stripslashes($rec['id']);
		return $nextid;
	}	

//------------------------------------------------------------------------------------------------

	function pobe_part_type_allowed_list($adminid)
	{
		$db = new build_sql();					
		$db->query("SELECT part_type FROM tbl_rsa_users WHERE id = '" . $adminid . "' "); 
		$rec = $db->fetch_array();
		$part_type = explode(",", $rec['part_type']);
		$type_list = null;
		$element = 0;
		foreach ( $part_type as $item ) {
			$type_list[$element++] = array("typeid" => $item, "parttype" => pobe_view_part_type($item));
		}
		return $type_list;
	}

	function pobe_part_type_default($adminid)
	{
		$db = new build_sql();					
		$db->query("SELECT part_type FROM tbl_rsa_users WHERE id = '" . $adminid . "' "); 
		$rec = $db->fetch_array();
		$part_type = explode(",", $rec['part_type']);
        
		if (isset($rec['part_type'])){
            if(in_array('2', $part_type)){
                $key  = array_search('2',$part_type);
                $parttype = $part_type[$key];
            } else {
                $parttype = $part_type[0];
            }
		} else {
			$parttype = 1;
		}
		return $parttype;
	}

//------------------------------------------------------------------------------------------------

	function pobe_chk_part_oeref_data($id)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_parts_oeref WHERE refnum = '1' AND status = '1' AND partid = '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		if ($rec['cnt'] == 0){
			return 0; 
		} else {
			return 1; 
		}
	}	

//------------------------------------------------------------------------------------------------

	//  added on 15-10-2020 
	function pobe_get_part_type($partid)
	{
		$db = new build_sql();
		$db->query(" SELECT part_type FROM tbl_rsa_parts WHERE id = '" . addslashes($partid) . "' ");
		$rec = $db->fetch_array();
		$parttp = $rec['part_type'];
		return $parttp;
	}	

//------------------------------------------------------------------------------------------------

	//  added on 01-12-2020 
	function pobe_update_customer_ref_data($partid,$custid,$crdata)
	{
		$db = new build_sql();
		$db2 = new build_sql();
		$db->query("SELECT count(*) as cnt FROM tbl_rsa_parts_customerref WHERE custid = ". addslashes($custid) ." AND partid = ". addslashes($partid) ." AND refnum = 1 ");
		$rec = $db->fetch_array();
		$dateupdtd = date("Y-m-d H:i:s");
		if ($rec['cnt'] == 0){
			if (isset($crdata) && trim($crdata) != ''){
				//echo "INSERT INTO tbl_rsa_parts_customerref (custid, partid, refnum, crdata, postdate, status, last_updated) VALUES(". addslashes($custid) .", ". addslashes($partid) .", 1, '". addslashes($crdata) ."', '". $dateupdtd ."', '1', '". $dateupdtd ."') <br>";
				$db2->query("INSERT INTO tbl_rsa_parts_customerref (custid, partid, refnum, crdata, postdate, status, last_updated) VALUES(". addslashes($custid) .", ". addslashes($partid) .", 1, '". addslashes($crdata) ."', '". $dateupdtd ."', '1', '". $dateupdtd ."')");
			}
		} else {
			$crdata2 = $crdata;
			//echo "UPDATE tbl_rsa_parts_customerref SET crdata = CONCAT(crdata, ', ". addslashes($crdata2) ."'), last_updated = '". $dateupdtd ."' WHERE custid = ". addslashes($custid) ." AND partid = ". addslashes($partid) ." AND refnum = 1 <br>";
			$db2->query("UPDATE tbl_rsa_parts_customerref SET crdata = CONCAT(crdata, ', ". addslashes($crdata2) ."'), last_updated = '". $dateupdtd ."' WHERE custid = ". addslashes($custid) ." AND partid = ". addslashes($partid) ." AND refnum = 1 ");
			$crdata2 = "";
		}
	}	

//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------

	//  added on 04-01-2021  
	function pobe_update_partsdata_cref_import($partid,$custid,$crdata)
	{
		$db = new build_sql();
		$db2 = new build_sql();
		$db->query("SELECT count(*) as cnt FROM tbl_rsa_parts_customerref WHERE custid = ". addslashes($custid) ." AND partid = ". addslashes($partid) ." AND refnum = 1 ");
		$rec = $db->fetch_array();
		$dateupdtd = date("Y-m-d H:i:s");
		if ($rec['cnt'] == 0){
			//echo "INSERT INTO tbl_rsa_parts_customerref (custid, partid, refnum, crdata, postdate, status, last_updated) VALUES(". addslashes($custid) .", ". addslashes($partid) .", 1, '". addslashes($crdata) ."', '". $dateupdtd ."', '1', '". $dateupdtd ."')<br>";
			$db2->query("INSERT INTO tbl_rsa_parts_customerref (custid, partid, refnum, crdata, postdate, status, last_updated) VALUES(". addslashes($custid) .", ". addslashes($partid) .", 1, '". addslashes($crdata) ."', '". $dateupdtd ."', '1', '". $dateupdtd ."')");
			////if (isset($crdata) && trim($crdata) != ''){
			////}
		} else {
			//echo "UPDATE tbl_rsa_parts_customerref SET crdata = '". addslashes($crdata) ."', last_updated = '". $dateupdtd ."' WHERE custid = ". addslashes($custid) ." AND partid = ". addslashes($partid) ." AND refnum = 1<br>";
			$db2->query("UPDATE tbl_rsa_parts_customerref SET crdata = '". addslashes($crdata) ."', last_updated = '". $dateupdtd ."' WHERE custid = ". addslashes($custid) ." AND partid = ". addslashes($partid) ." AND refnum = 1 ");
		}
	}	

	//  added on 04-03-2021   
	function pobe_customer_list_opt($custopt)
	{
		$db = new build_sql();					
		$db->query("SELECT cid,name,sortcode FROM tbl_rsa_customers WHERE status = '1' ORDER BY cid ASC ");

		$customer_list = null;
		$num = 1;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$customer_list[$element++] = array("custid" => stripslashes($clist['cid']), "custname" => stripslashes($clist['name']), "custcode" => stripslashes($clist['sortcode']), "itmno" => $num, "chk" => findObjectById($clist['cid'],$custopt));
				
				$num++;
			}
		}

		return $customer_list;
	}


//------------------------------------------------------------------------------------------------

	//  added on 13-01-2022 , updated on 24-02-2022 
	function pobe_incoming_cores_qnty($partid)
	{
		$db = new build_sql();
		//$db->query(" SELECT SUM(offered_stock) as sum_pqnty FROM tbl_rsa_app_offered_items_final WHERE partid = '" . addslashes($partid) . "' AND status = '1' AND is_deleted = '0' AND is_offered='1' AND is_delivered = '0' ");
		$db->query(" SELECT SUM(cp.offered_stock) as sum_pqnty FROM tbl_rsa_app_offered_items_final cp, tbl_rsa_app_po_data po WHERE cp.po_num = po.po_num AND cp.partid = '" . addslashes($partid) . "' AND cp.status = '1' AND cp.is_deleted = '0' AND cp.is_offered='1' AND cp.is_delivered = '0' AND po.is_deleted = '0' ");
		$rec = $db->fetch_array();
		$sumicqnty = number_format($rec['sum_pqnty']);
		return $sumicqnty;
	}	

//------------------------------------------------------------------------------------------------

	//  added on 20-01-2022 
	function pobe_attribute_count()
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_attributes WHERE status = '1' ");
		$rec = $db->fetch_array();
		return stripslashes($rec['cnt']);
	}	

	function pobe_attribute_list()
	{
		$db = new build_sql();					
		$db->query("SELECT id,attrname,sortcode FROM tbl_rsa_attributes WHERE status = '1' ORDER BY id ASC ");

		$attribute_list = null;
		$num = 1;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				if (($num%4 == 0) && ($num > 1)) {
					$noit = 1;
				} else {
					$noit = 0;
				}
				$attribute_list[$element++] = array("attrid" => stripslashes($clist['id']), "attributename" => stripslashes($clist['attrname']), "attrcode" => stripslashes($clist['sortcode']), "itmno" => $num, "brk" => $noit);
				$num++;
			}
		}

		return $attribute_list;
	}

	function pobe_part_type_attribute_options($id)
	{
		$db = new build_sql();
		$db->query(" SELECT attr_opt FROM tbl_rsa_part_type WHERE id = '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		$attr_opt = stripslashes($rec['attr_opt']);
		return $attr_opt;
	}	

	function pobe_sch_attribute_list($type)
	{
		$db = new build_sql();					
		$db->query("SELECT id,attrname,sortcode FROM tbl_rsa_attributes WHERE status = '1' ORDER BY id ASC ");

		$attribute_list = null;
		$attropt = explode(",", pobe_part_type_attribute_options($type));

		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$attribute_list[$element++] = array("attrid" => stripslashes($clist['id']), "attributename" => stripslashes($clist['attrname']), "attrcode" => stripslashes($clist['sortcode']), "chk" => findObjectById($clist['id'],$attropt));
			}
		}

		return $attribute_list;
	}

	function pobe_get_attribute_ref($id)
	{
		$db = new build_sql();
		$db->query(" SELECT attrname FROM tbl_rsa_attributes WHERE id = ". addslashes($id) ." ");
		$rec = $db->fetch_array();
		$attributename = stripslashes($rec['attrname']);
		return $attributename;
	}	

	function pobe_attribute_list_chk($attropt)
	{
		$db = new build_sql();					
		$db->query("SELECT id,attrname,sortcode FROM tbl_rsa_attributes WHERE status = '1' ORDER BY id ASC ");

		$attribute_list = null;
		$num = 1;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				if (($num%4 == 0) && ($num > 1)) {
					$noit = 1;
				} else {
					$noit = 0;
				}
				$attribute_list[$element++] = array("attrid" => stripslashes($clist['id']), "attributename" => stripslashes($clist['attrname']), "attrcode" => stripslashes($clist['sortcode']), "itmno" => $num, "brk" => $noit, "chk" => findObjectById($clist['id'],$attropt));
				$num++;
			}
		}

		return $attribute_list;
	}

	function pobe_attribute_list_opt($attropt,$partid)
	{
		$db = new build_sql();					
		$db->query("SELECT trc.id,trc.attrname,trc.sortcode,trp.attrdata from tbl_rsa_attributes trc left join tbl_rsa_attributes_data trp on trp.attrid = trc.id AND trp.partid = '" . addslashes($partid) . "' WHERE trc.status = '1' ORDER BY trc.id ASC");

		$attribute_list = null;
		//$num = 1;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$attribute_list[$element++] = array("attrid" => stripslashes($clist['id']), "attributename" => stripslashes($clist['attrname']), "attrcode" => stripslashes($clist['sortcode']), "attrdata" => stripslashes($clist['attrdata']), "chk" => findObjectById($clist['id'],$attropt));
				//$num++;
			}
		}

		return $attribute_list;
	}

//------------------------------------------------------------------------------------------------

	//  added on 21-01-2022 
	function pobe_update_partsdata_attributes($partid,$attrid,$attrdata)
	{
		$db = new build_sql();
		$db2 = new build_sql();
		$db->query("SELECT count(*) as cnt FROM tbl_rsa_attributes_data WHERE attrid = '". addslashes($attrid) ."' AND partid = '". addslashes($partid) ."' ");
		$rec = $db->fetch_array();
		$dateupdtd = date("Y-m-d H:i:s");
		if ($rec['cnt'] == 0){
			if (isset($attrdata) && trim($attrdata) != ''){
			$db2->query("INSERT INTO tbl_rsa_attributes_data (attrid,partid,attrdata,postdate,status,last_updated) VALUES(". addslashes($attrid) .", ". addslashes($partid) .", '". addslashes($attrdata) ."', '". $dateupdtd ."', '1', '". $dateupdtd ."')");
			}
		} else {
			$db2->query("UPDATE tbl_rsa_attributes_data SET attrdata = '". addslashes($attrdata) ."', last_updated = '". $dateupdtd ."' WHERE attrid = ". addslashes($attrid) ." AND partid = ". addslashes($partid) ." ");
		}
	}	

	//  added on 28-01-2022  
	function pobe_update_partsdata_attribute_import($partid,$attrid,$attrdata)
	{
		$db = new build_sql();
		$db2 = new build_sql();
		$db->query("SELECT count(*) as cnt FROM tbl_rsa_attributes_data WHERE attrid = '". addslashes($attrid) ."' AND partid = '". addslashes($partid) ."' ");
		$rec = $db->fetch_array();
		$dateupdtd = date("Y-m-d H:i:s");
		if ($rec['cnt'] == 0){
			$db2->query("INSERT INTO tbl_rsa_attributes_data (attrid,partid,attrdata,postdate,status,last_updated) VALUES(". addslashes($attrid) .", ". addslashes($partid) .", '". addslashes($attrdata) ."', '". $dateupdtd ."', '1', '". $dateupdtd ."')");
		} else {
			$db2->query("UPDATE tbl_rsa_attributes_data SET attrdata = '". addslashes($attrdata) ."', last_updated = '". $dateupdtd ."' WHERE attrid = ". addslashes($attrid) ." AND partid = ". addslashes($partid) ." ");
		}
	}	

//------------------------------------------------------------------------------------------------
	/*
	*/

	// added on 08-02-2022  
	function pobe_attributes_advanced_search_two($atcond,$ptype)
	{
		$db = new build_sql();
		$my_qry7  = "SELECT DISTINCT cr.partid as id FROM tbl_rsa_attributes_data cr ";
		$my_qry7 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
		$my_qry7 .= " WHERE cr.status = '1' AND pt.part_type = ". $ptype ." " . $atcond;
		$db->query($my_qry7);
		//echo "=================================================<br><br>".$my_qry7."<br>";
		$atlist = "";
		if($db->get_num_rows()) {
			while($clist = $db->fetch_array()){
				$atlist .= $clist['id'].",";
			}
		}
		return $atlist;
	}	

	function pobe_get_attribute_data($aid,$pid)
	{
		$db = new build_sql();
		$db->query(" SELECT attrdata FROM tbl_rsa_attributes_data WHERE attrid = ". addslashes($aid) ." AND partid = ". addslashes($pid) ." AND status = '1' ");
		$rec = $db->fetch_array();
		$attributedata = isset($rec['attrdata']) ? stripslashes($rec['attrdata']) : '';
		return $attributedata;
	}	

//------------------------------------------------------------------------------------------------

	//  added on 23-03-2022  
	function pobe_imported_cores_qnty($partid)
	{
		$db = new build_sql();
		$db->query(" SELECT SUM(po_quantity) as sum_qnty FROM tbl_rsa_app_onway_stock WHERE partid = '" . addslashes($partid) . "' AND status = '1' AND is_deleted = '0' ");
		$rec = $db->fetch_array();
		$impqnty = number_format($rec['sum_qnty']);
		return $impqnty;
	}	

//------------------------------------------------------------------------------------------------

	//  added on 17-08-2022   
	function pobe_attribute_list_opt_nw($attropt,$partid)
	{
		$db = new build_sql();					
		$db->query("SELECT trc.id,trc.attrname,trc.sortcode,trp.attrdata from tbl_rsa_attributes trc left join tbl_rsa_attributes_data trp on trp.attrid = trc.id AND trp.partid = '" . addslashes($partid) . "' WHERE trc.status = '1' AND trc.id IN (".$attropt.") ORDER BY trc.id ASC");

		$attribute_list = null;
		//$attr_opt = explode(",", $attropt);
		//$num = 1;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$attribute_list[$element++] = array("attrid" => stripslashes($clist['id']), "attributename" => stripslashes($clist['attrname']), "attrcode" => stripslashes($clist['sortcode']), "attrdata" => stripslashes($clist['attrdata']), "chk" => '1');
			}
		}

		return $attribute_list;
	}

	//  added on 17-08-2022   
	function pobe_customer_opt_list_nw($custopt,$partid)
	{
		$db = new build_sql();					
		$db->query("SELECT trc.cid,trc.name,trc.sortcode,trp.crdata from tbl_rsa_customers trc left join tbl_rsa_parts_customerref trp on trp.custid = trc.cid AND trp.partid = '" . addslashes($partid) . "' AND trp.refnum = 1 WHERE trc.status = '1' AND trc.cid IN (".$custopt.") ORDER BY trc.cid ASC");

		$customer_list = null;
		//$cust_opt = explode(",", $custopt);
		//$num = 1;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$customer_list[$element++] = array("custid" => stripslashes($clist['cid']), "custname" => stripslashes($clist['name']), "custcode" => stripslashes($clist['sortcode']), "crdata" => stripslashes($clist['crdata']), "chk" => '1');
			}
		}

		return $customer_list;
	}

//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------
//   FUNCTIONS ADDED IN JAN 2023 TO IMPLEMENT GROUP AND OE STOCK
//------------------------------------------------------------------------------------------------

	//  added on 08-01-2023    
	function pobe_group_parts_list($partid,$ptype)
	{
		$db = new build_sql();					
		$db->query("SELECT id, partid, oe_one, oe_two, oemone, oemtwo, qty_data, location , b_grade_qty, b_grade_location, c_grade_qty, c_grade_location FROM tbl_rsa_oe_stock_data WHERE partid = '" . addslashes($partid) . "' AND ptype = '" . addslashes($ptype) . "' AND status = '1' AND is_deleted = '0' ORDER BY id ASC");

		$grouppartslist = null;
		$num = 1;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$grouppartslist[$element++] = array("pid" => stripslashes($clist['id']), "itemloc" => stripslashes($clist['location']), "itemqty" => stripslashes($clist['qty_data']), "bgradeitemloc" => stripslashes($clist['b_grade_location']), "b_grade_itemqty" => stripslashes($clist['b_grade_qty']), "cgradeitemloc" => stripslashes($clist['c_grade_location']), "c_grade_itemqty" => stripslashes($clist['c_grade_qty']), "itemoeone" => stripslashes($clist['oe_one']), "itemoetwo" => stripslashes($clist['oe_two']), "itemoemone" => stripslashes($clist['oemone']), "itemoemtwo" => stripslashes($clist['oemtwo']), "qtydata" => 0, "cnt" => $num);
				$num++;
			}
		}

		return $grouppartslist;
	}

	//  added on 08-01-2023    
	function pobe_group_total_stock($partid, $ptypeid = '')
	{
		$db = new build_sql();
        $sum_b_qty = '';
        $sum_c_qty = '';
        if ($ptypeid == 14 or $ptypeid == 15) {
            $sum_b_qty = "+ SUM(b_grade_qty)";
        }
        if ($ptypeid == 14) {
            $sum_c_qty = " + SUM(c_grade_qty)";
        }
        $db->query(" SELECT (SUM(qty_data) " . $sum_b_qty . " " . $sum_c_qty . ") as tot_stock FROM tbl_rsa_oe_stock_data WHERE partid = '" . addslashes($partid) . "' AND status = '1' AND is_deleted = '0'");
        $rec = $db->fetch_array();
		$tot_stock = number_format($rec['tot_stock']);
		return $tot_stock;
	}	

	//  added on 08-01-2023
	function pobe_group_target_stock($partid)
	{
		$db = new build_sql();
		$db->query(" SELECT SUM(target_stock) as tottarget FROM tbl_rsa_parts WHERE partid = '" . addslashes($partid) . "' AND status = '1' AND is_deleted = '0' ");
		$rec = $db->fetch_array();
		$tottarget = number_format($rec['tottarget']);
		return $tottarget;
	}	

	//  added on 22-12-2022  
	function pobe_attribute_list_opt_grp($attropt,$partid)
	{
		$db = new build_sql();	

		$db->query("SELECT trc.id,trc.attrname,trc.sortcode,trp.attrdata from tbl_rsa_attributes trc left join tbl_rsa_attributes_data trp on trp.attrid = trc.id AND trp.partid = '" . addslashes($partid) . "' WHERE trc.status = '1' AND trc.id IN (".$attropt.") ORDER BY trc.id ASC");

		$attribute_list = null;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				if(($clist['id'] < 50)||($clist['id'] > 53)) {
				$attribute_list[$element++] = array("attrid" => stripslashes($clist['id']), "attributename" => stripslashes($clist['attrname']), "attrcode" => stripslashes($clist['sortcode']), "attrdata" => stripslashes($clist['attrdata']), "chk" => '1');
				}
			}
		}

		return $attribute_list;
	}

	//  added on 22-12-2022  
	function pobe_update_partsdata_attributes_grp($partid,$attrid,$attrdata)
	{
		$db = new build_sql();
		$db2 = new build_sql();
		$db->query("SELECT count(*) as cnt FROM tbl_rsa_attributes_data WHERE attrid = '". addslashes($attrid) ."' AND partid = '". addslashes($partid) ."' ");
		$rec = $db->fetch_array();
		$dateupdtd = date("Y-m-d H:i:s");
		if ($rec['cnt'] == 0){
			if (isset($attrdata) && trim($attrdata) != ''){
			$db2->query("INSERT INTO tbl_rsa_attributes_data (attrid,partid,attrdata,postdate,status,last_updated) VALUES(". addslashes($attrid) .", ". addslashes($partid) .", '". addslashes($attrdata) ."', '". $dateupdtd ."', '1', '". $dateupdtd ."')");
			}
		} else {
			$db2->query("UPDATE tbl_rsa_attributes_data SET attrdata = '". addslashes($attrdata) ."', last_updated = '". $dateupdtd ."' WHERE attrid = ". addslashes($attrid) ." AND partid = ". addslashes($partid) ." ");
		}
	}	

//------------------------------------------------------------------------------------------------

	function pobe_get_group_rsac_num($partid,$ptype)
	{
		$db = new build_sql();
		$db->query("SELECT group_rsac FROM tbl_rsa_parts WHERE part_type = '" . addslashes($ptype) . "' AND id = '" . addslashes($partid) . "' ");
		$rec = $db->fetch_array();
		$group_rsac = stripslashes($rec['group_rsac']);
		return $group_rsac;
	}	

	function pobe_get_prev_part_by_group($id,$ptype)
	{
		$db = new build_sql();
		$db->query("SELECT id FROM tbl_rsa_parts WHERE status = '1' AND is_deleted = '0' AND is_main = '1' AND part_type = '" . addslashes($ptype) . "' AND id < '" . addslashes($id) . "' GROUP BY group_rsac order by id DESC LIMIT 1 ");
		//HAVING COUNT(group_rsac)=1 
		$rec = $db->fetch_array();
        $previd = isset($rec['id']) ? stripslashes($rec['id']) : '';
		return $previd;
	}	

	function pobe_get_next_part_by_group($id,$ptype)
	{
		$db = new build_sql();
		$db->query("SELECT id FROM tbl_rsa_parts WHERE status = '1' AND is_deleted = '0' AND is_main = '1' AND part_type = '" . addslashes($ptype) . "' AND id > '" . addslashes($id) . "' GROUP BY group_rsac order by id ASC LIMIT 1 ");
		$rec = $db->fetch_array();
		$nextid = stripslashes($rec['id']);
		return $nextid;
	}	

	function pobe_get_group_part_id($grsac,$ptype)
	{
		$db = new build_sql();
		$db->query("SELECT id FROM tbl_rsa_parts WHERE status = '1' AND is_deleted = '0' AND is_main = '1' AND part_type = '" . addslashes($ptype) . "' AND group_rsac = '" . addslashes($grsac) . "' ");
		$rec = $db->fetch_array();
		$part_id = stripslashes($rec['id']);
		return $part_id;
	}	

	//  added on 24-01-2023     
	function pobe_group_parts_oestock_ids($partid,$limit)
	{
		$db = new build_sql();	
		$s = (int) $limit;
		$e = $s + 1;
		$db->query("SELECT id FROM tbl_rsa_oe_stock_data WHERE partid = '" . addslashes($partid) . "' AND status = '1' AND is_deleted = '0' ORDER BY id ASC LIMIT ".$s.",".$e);
		$rec = $db->fetch_array();
		$oestockid = $rec['id'];
		return $oestockid;
	}

//------------------------------------------------------------------------------------------------

	// ADDED ON 25-01-2023
	function pobe_get_part_id_new($rsac)
	{
		$db = new build_sql();
		$db2 = new build_sql();

		$db->query(" SELECT id,part_type FROM tbl_rsa_parts WHERE status = '1' AND is_deleted = '0' AND (rsac = '" . addslashes($rsac) . "' OR group_rsac = '" . addslashes($rsac) . "') LIMIT 0,1 ");

		if($db->get_num_rows()) {
			$rec = $db->fetch_array();
			$partid = $rec['id'];
			$ptypeid = $rec['part_type'];
			$grtypes = [14, 15, 16, 17];   

			if (in_array($ptypeid, $grtypes)) {
				$db2->query(" SELECT id FROM tbl_rsa_parts WHERE group_rsac = '" . addslashes($rsac) . "' AND is_main = '1' ");
				$rec2 = $db2->fetch_array();
				$partid = $rec2['id'];
			}

		} else {
			$partid = 0;
		}
		return $partid;
	}	

//------------------------------------------------------------------------------------------------

?>