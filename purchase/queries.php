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

	function pobe_signin_date_upd($adminid,$mytoken)
	{
		$lastlgdate = pobe_last_signin_date($adminid);
		$signindate = date("Y-m-d H:i:s");  
		$db = new build_sql();
		$db->query("UPDATE tbl_rsa_app_users SET last_loged = '". $lastlgdate ."', last_login = '". $signindate ."', termsacptd='1', token_data = '". addslashes($mytoken) ."' WHERE id = '" . $adminid . "' ");
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

	function pobe_view_part_type($id)
	{
		$db = new build_sql();
		$db->query(" SELECT part_type FROM tbl_rsa_part_type WHERE id = '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		$part_type = stripslashes($rec['part_type']);
		return $part_type;
	}	

	function pobe_count_part_offered($vendordt,$useridd,$partid)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_app_offered_items_temp WHERE vendortmp = '". addslashes($vendordt) ."' AND userid = '". addslashes($useridd) ."' AND partid = '". addslashes($partid) ."' AND is_offered = '0' ");
		$rec = $db->fetch_array();
		$offerdqty = (int)stripslashes($rec['cnt']);
		return $offerdqty;
	}	

	function pobe_number_offered_items($vendordt,$useridd)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_app_offered_items_temp WHERE vendortmp = '". addslashes($vendordt) ."' AND userid = '". addslashes($useridd) ."' AND is_offered = '0' ");
		$rec = $db->fetch_array();
		$ordqty = (int)stripslashes($rec['cnt']);
		return $ordqty;
	}	

	function pobe_total_offered_value($vendordt,$useridd)
	{
		$db = new build_sql();
		$db->query(" SELECT SUM(offered_price) as ordval FROM tbl_rsa_app_offered_items_temp WHERE vendortmp = '". addslashes($vendordt) ."' AND userid = '". addslashes($useridd) ."' AND is_offered = '0' ");
		$rec = $db->fetch_array();
		$ordval = number_format($rec['ordval'], 2, '.', '');
		return $ordval;
	}	

	function pobe_insert_supply_data($vendordt,$useridd,$ponum)
	{
		$db = new build_sql();
		$db2 = new build_sql();
		$sch_type = "kw";   

		$db->query("SELECT * FROM tbl_rsa_app_offered_items_temp WHERE vendortmp = '". addslashes($vendordt) ."' AND userid = '". addslashes($useridd) ."' AND is_deleted = '0' AND is_offered = '0' ");
		if($db->get_num_rows()) {
			$element = 0;
			$datepostd = date("Y-m-d H:i:s");
			while($clist = $db->fetch_array()){
				$db2->query("INSERT INTO tbl_rsa_app_offered_items_final (userid, partid, part_type, rsac_ref, oe_number, oem_number, sch_type, searchid, required_stock, purchase_price, offered_stock, offered_price, po_num, postdate, status, last_updated, is_deleted, is_offered) VALUES(". addslashes($clist['userid']) .", '". addslashes($clist['partid']) ."', '". addslashes($clist['part_type']) ."', '". addslashes($clist['rsac_ref']) ."', '". addslashes($clist['oe_number']) ."', '". addslashes($clist['oem_number']) ."', '". addslashes($sch_type) ."', '". addslashes($clist['searchid']) ."', '". addslashes($clist['required_stock']) ."', '". addslashes($clist['purchase_price']) ."', '". addslashes($clist['offered_stock']) ."', '". addslashes($clist['offered_price']) ."', '". addslashes($ponum) ."', '". $datepostd ."', '1', '". $datepostd ."', '0', '1')");
			}
		}
	}	

//------------------------------------------------------------------------------------------------

	function pobe_part_type_list()
	{
		$db = new build_sql();					
		$db->query("SELECT id,part_type FROM tbl_rsa_part_type WHERE status = '1' AND is_deleted = '0' AND id <> 12 ORDER BY id ASC ");

		$type_list = null;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$type_list[$element++] = array("typeid" => stripslashes($clist['id']), "parttype" => stripslashes($clist['part_type']));
			}
		}

		return $type_list;
	}

	function pobe_part_type_default($adminid)
	{
		$db = new build_sql();					
		$db->query("SELECT part_type FROM tbl_rsa_app_users WHERE id = '" . $adminid . "' "); 
		$rec = $db->fetch_array();
		$part_type = explode(",", $rec['part_type']);
		if (isset($rec['part_type'])){
			$parttype = $part_type[0]; 
		} else {
			$parttype = 1; 
		}
		return $parttype;
	}

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
			// updated on 09-08-2022 ----------------------------------
			$imgnm = "https://rsautocoresystem.co.uk/".$img[0];
			//---------------------------------------------------------
			//echo "<br>".$imgnm."<br>";
			//if (file_exists($imgnm)) {
				return $imgnm;
				//return $img[0];
			//} else {
			//	return "";
			//}
		} else {
			return "";
		}
	}	

//------------------------------------------------------------------------------------------------

	function pobe_max_order_id()
	{
		$db = new build_sql();					
		$db->query("SELECT MAX(poid) as poid FROM tbl_rsa_app_po_data ");
		$rec = $db->fetch_array();
		$orderid = (int)stripslashes($rec['poid']);
		return $orderid;
	}

//------------------------------------------------------------------------------------------------

	function pobe_part_stock_offered($partid)
	{
		$db = new build_sql();
		$db->query(" SELECT SUM(offered_stock) as offerdstk FROM tbl_rsa_app_offered_items_final WHERE partid = '". addslashes($partid) ."' AND status = '1' AND is_offered = '1' AND po_deleted = '0' AND is_delivered = '0' ");
		$rec = $db->fetch_array();
		$offerdqty = (int)stripslashes($rec['offerdstk']);
		return $offerdqty;
	}	

	function pobe_total_cart_items($vendordt,$useridd)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_app_offered_items_temp WHERE vendortmp = '". addslashes($vendordt) ."' AND userid = '". addslashes($useridd) ."' AND is_deleted = '0' AND is_offered = '0' ");
		$rec = $db->fetch_array();
		$totalqty = (int)stripslashes($rec['cnt']);
		return $totalqty;
	}	
 
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

	// added on 26-02-2020 
	function pobe_part_stock_cart_quntity($vendordt,$useridd,$partid)
	{
		$db = new build_sql();
		$db->query(" SELECT SUM(offered_stock) as offerdstk FROM tbl_rsa_app_offered_items_temp WHERE partid = '". addslashes($partid) ."' AND vendortmp = '". addslashes($vendordt) ."' AND userid = '". addslashes($useridd) ."' AND sch_type = 'kw' AND status = '1' AND is_deleted = '0' AND is_offered = '0' ");
		$rec = $db->fetch_array();
		$offerdqty = (int)stripslashes($rec['offerdstk']);
		return $offerdqty;
	}	

//------------------------------------------------------------------------------------------------

	function pobe_count_cart_items($vendordt,$useridd)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_app_offered_items_temp WHERE vendortmp = '". addslashes($vendordt) ."' AND userid = '". addslashes($useridd) ."' AND is_offered = '0' ");
		$rec = $db->fetch_array();
		$totalqty = (int)stripslashes($rec['cnt']);
		return $totalqty;
	}	
 
	function pobe_offered_item_oenum($searchid)
	{
		$db = new build_sql();
		$db->query(" SELECT searchtext FROM tbl_rsa_app_search WHERE searchid = '". addslashes($searchid) ."' AND searchtype = 'by_oem' ");
		$rec = $db->fetch_array();
		$searchtext = stripslashes($rec['searchtext']);
		return $searchtext;
	}	

	function pobe_count_no_searches($userid,$vendorid)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_app_search WHERE userid = '". addslashes($userid) ."' AND vendortmp = '". addslashes($vendorid) ."' AND status = '1' ");
		$rec = $db->fetch_array();
		$totcounts = (int)stripslashes($rec['cnt']);
		return $totcounts;
	}	

	function pobe_count_yes_results($userid,$vendorid)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_app_search WHERE userid = '". addslashes($userid) ."' AND vendortmp = '". addslashes($vendorid) ."' AND status = '1' AND yes_results = '1' ");
		$rec = $db->fetch_array();
		$yescounts = (int)stripslashes($rec['cnt']);
		return $yescounts;
	}	

	function pobe_count_yes_results_past($userid,$daysno)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_app_search WHERE userid = '". addslashes($userid) ."' AND status = '1' AND yes_results = '1' AND searchdate BETWEEN DATE_SUB(NOW(), INTERVAL ". $daysno ." DAY) AND NOW() ");
		$rec = $db->fetch_array();
		$yescounts = (int)stripslashes($rec['cnt']);
		return $yescounts;
	}	

	function pobe_count_no_searches_past($userid,$daysno)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_app_search WHERE userid = '". addslashes($userid) ."' AND status = '1' AND searchdate BETWEEN DATE_SUB(NOW(), INTERVAL ". $daysno ." DAY) AND NOW() ");
		$rec = $db->fetch_array();
		$totcounts = (int)stripslashes($rec['cnt']);
		return $totcounts;
	}	

	function pobe_check_current_searches($userid,$vendorid)
	{
		$yescnt=pobe_count_yes_results($userid,$vendorid);
		$cartno=pobe_count_cart_items($vendorid,$userid);
		if (($yescnt > NUM_SEARCHES) && ($cartno < 1)){
			$schchk = 1;
		} else {
			$schchk = 0;
		}
		return $schchk;
	}	

	function pobe_check_monthly_searches($userid)
	{
		$yescnt=pobe_count_yes_results_past($userid,CHECK_PERIOD);
		//$totsch=pobe_count_no_searches_past($userid,CHECK_PERIOD);
		if ($yescnt > ALW_SEARCHES){
			$schchk = 1;
		} else {
			$schchk = 0;
		}
		return $schchk;
	}	

	function pobe_user_login_check($userid,$usertoken)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_app_users WHERE id='" . addslashes($userid) . "' AND token_data='" . addslashes($usertoken) . "' AND user_status='1' AND is_suspended='0' AND is_deleted='0' AND is_blocked='0' ");
		$rec = $db->fetch_array();
		$cnt = (int)stripslashes($rec['cnt']);
		return $cnt;
	}	

	function pobe_user_block($userid)
	{
		$currdate = date("Y-m-d H:i:s");  
		$db = new build_sql();
		$db->query("UPDATE tbl_rsa_app_users SET last_updated = '". $currdate ."', is_blocked = '1', date_block = ADDTIME(last_login, '1:0:0') WHERE id = '" . $userid . "' ");
	}	

	function pobe_user_unblock($userid)
	{
		$currdate = date("Y-m-d H:i:s");  
		$db = new build_sql();
		$db->query("UPDATE tbl_rsa_app_users SET last_updated = '". $currdate ."', is_blocked = '0' WHERE id = '" . $userid . "' ");
	}	

	function pobe_user_suspend($userid)
	{
		$currdate = date("Y-m-d H:i:s");  
		$db = new build_sql();
		$db->query("UPDATE tbl_rsa_app_users SET last_updated = '". $currdate ."', is_suspended = '1', date_suspend = '". $currdate ."' WHERE id = '" . $userid . "' ");
	}	

	function pobe_user_access_check($userid)
	{
		$db = new build_sql();
		$currdate = date("Y-m-d H:i:s");  
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_app_users WHERE id='" . addslashes($userid) . "' AND user_status='1' AND date_block < '" . $currdate . "' ");
		$rec = $db->fetch_array();
		$cnt = (int)stripslashes($rec['cnt']);
		return $cnt;
	}	

	// updated on 18-02-2022 
	function pobe_list_supply_data($userid,$ponum,$vndrcur)
	{
		$db = new build_sql(); 
		$db->query("SELECT id,part_type,rsac_ref,purchase_price,offered_stock FROM tbl_rsa_app_offered_items_final WHERE userid = '". addslashes($userid) ."' AND po_num = '". addslashes($ponum) ."' AND status = '1' AND is_deleted = '0' AND is_offered = '1' ORDER BY id ASC ");

		$supply_list = "<table cellspacing=3 cellpadding=3 border=0>";
		$supply_list.= "<tr><td><u>Part Type</u></td><td><u>Part RSAC Ref</u></td><td><u>Buy Price</u></td><td><u>Quantity Offered</u></td></tr>";
		//$supply_list.= "<tr><td><u>Part Type</u></td><td><u>Part RSAC Ref</u></td><td><u>Buy Price</u></td><td><u>Quantity Offered</u></td><td><u>Total</u></td></tr>";
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$supply_list .= "<tr><td>".pobe_view_part_type($clist['part_type'])."</td><td>".stripslashes($clist['rsac_ref'])."</td><td>".$vndrcur." ".stripslashes($clist['purchase_price'])."</td><td>".stripslashes($clist['offered_stock'])."</td></tr>";
				//$supply_list .= "<tr><td>".pobe_view_part_type($clist['part_type'])."</td><td>".stripslashes($clist['rsac_ref'])."</td><td>".$vndrcur." ".stripslashes($clist['purchase_price'])."</td><td>".stripslashes($clist['offered_stock'])."</td><td>".stripslashes($clist['offered_stock'])." X ".$vndrcur. " ".stripslashes($clist['purchase_price'])."</td></tr>";
			}
		}
		$supply_list .= "</table>";

		return $supply_list;
	}

//------------------------------------------------------------------------------------------------

	function pobe_user_part_type($userid)
	{
		$db = new build_sql();
		$db->query(" SELECT part_type FROM tbl_rsa_app_users WHERE id = '" . $userid . "' ");
		$rec = $db->fetch_array();
		$part_type = stripslashes($rec['part_type']);
		return $part_type;
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
		$db->query("SELECT id,part_type FROM tbl_rsa_part_type WHERE status = '1' AND is_deleted = '0' AND id <> 12 ORDER BY id ASC ");

		$type_list = null;
		$num = 1;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				if (($num%5 == 0) && ($num > 1)) {
					$noit = 1;
				} else {
					$noit = 0;
				}
				$type_list[$element++] = array("typeid" => stripslashes($clist['id']), "parttype" => stripslashes($clist['part_type']), "chk" => matchObjById($clist['id'],$typeopt));
				$num++;
			}
		}

		return $type_list;
	}


//------------------------------------------------------------------------------------------------
//  added on 04-08-2021  
//------------------------------------------------------------------------------------------------

	function pobe_user_search_dbopt($userid)
	{
		$db = new build_sql();
		$db->query(" SELECT rsadb_opt FROM tbl_rsa_app_users WHERE id = '" . $userid . "' ");
		$rec = $db->fetch_array();
		$dbopt = stripslashes($rec['rsadb_opt']);
		return $dbopt;
	}	

	function pobe_user_search_npopt($userid)
	{
		$db = new build_sql();
		$db->query(" SELECT extdb_opt FROM tbl_rsa_app_users WHERE id = '" . $userid . "' ");
		$rec = $db->fetch_array();
		$npopt = stripslashes($rec['extdb_opt']);
		return $npopt;
	}	

	function pobe_part_rsrefno_new($partid)
	{
		$db = new build_sql();
		$db->query(" SELECT crdata FROM tbl_rsa_parts_customerref WHERE partid = '". addslashes($partid) ."' AND custid = '41' ");
		$rec = $db->fetch_array();
		$rsrefnew = stripslashes($rec['crdata']);
		return $rsrefnew;
	}	

	function pobe_part_type_id($partid)
	{
		$db = new build_sql();
		$db->query(" SELECT part_type FROM tbl_rsa_parts WHERE id = '" . addslashes($partid) . "' ");
		$rec = $db->fetch_array();
		$part_type = stripslashes($rec['part_type']);
		return $part_type;
	}	

	function pobe_group_part_types($id)
	{
		$db = new build_sql();
		$db->query(" SELECT part_type_opt FROM tbl_rsa_part_group WHERE id = '" . $id . "' ");
		$rec = $db->fetch_array();
		$part_types = stripslashes($rec['part_type_opt']);
		return $part_types;
	}	

	function pobe_view_part_group_name($id)
	{
		$db = new build_sql();
		$db->query(" SELECT part_group_name FROM tbl_rsa_part_group WHERE id = '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		$group_name = stripslashes($rec['part_group_name']);
		return $group_name;
	}	

	function pobe_partgroup_list()
	{
		$db = new build_sql();					
		$db->query("SELECT id,part_group_name,part_group_image FROM tbl_rsa_part_group WHERE status = '1' ORDER BY id ASC ");

		$parttype_list = null;
		$num = 1;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$parttype_list[$element++] = array("typeid" => stripslashes($clist['id']), "typenm" => stripslashes($clist['part_group_name']), "photonm" => stripslashes($clist['part_group_image']), "itmno" => $num);
				$num++;
			}
		}

		return $parttype_list;
	}

	function pobe_user_cat_type($userid)
	{
		$db = new build_sql();
		$db->query(" SELECT cat_type FROM tbl_rsa_app_users WHERE id = '" . $userid . "' ");
		$rec = $db->fetch_array();
		$cat_type = stripslashes($rec['cat_type']);
		return $cat_type;
	}	

	function pobe_partgroup_list_upd($typeopt)
	{
		$db = new build_sql();					
		$db->query("SELECT id, part_group_name, part_group_image FROM tbl_rsa_part_group WHERE status = '1' ORDER BY id ASC ");

		$type_list = null;
		$num = 1;
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$type_list[$element++] = array("typeid" => stripslashes($clist['id']), "parttype" => stripslashes($clist['part_group_name']), "partimg" => stripslashes($clist['part_group_image']), "chk" => matchObjById($clist['id'],$typeopt));
				$num++;
			}
		}

		return $type_list;
	}

//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------

	function pobe_user_search_option($userid)
	{
		$db = new build_sql();
		$db->query(" SELECT rsadb_opt,extdb_opt FROM tbl_rsa_app_users WHERE id = '" . $userid . "' ");
		$rec = $db->fetch_array();
		if (($rec['rsadb_opt'] == '1') && ($rec['extdb_opt'] == '1')){
			$npopt = 3;
		} elseif (($rec['rsadb_opt'] == '0') && ($rec['extdb_opt'] == '1')){
			$npopt = 2;
		} else {
			$npopt = 1;
		}
		return $npopt;
	}	

	function pobe_cart_temp_data($vendordt,$useridd)
	{
		$lastupdatd = date("Y-m-d H:i:s");  
		$db = new build_sql();
		$db->query("UPDATE tbl_rsa_app_offered_items_temp SET is_offered = '1' WHERE vendortmp = '". addslashes($vendordt) ."' AND userid = '". addslashes($useridd) ."' AND status = '1' AND is_deleted = '0' ");
	}	

	function pobe_last_cart_idd($userid)
	{
		$db = new build_sql();
		$db->query(" SELECT vendortmp FROM tbl_rsa_app_offered_items_temp WHERE status = '1' AND is_deleted = '0' AND is_offered = '0' AND userid = '" . addslashes($userid) . "' AND (postdate >= now() - INTERVAL 1 DAY) ORDER BY postdate DESC LIMIT 0,1 ");
		$rec = $db->fetch_array();
		if (isset($rec['vendortmp'])){
			$vendoridd = $rec['vendortmp'];
		} else {
			$vendoridd = md5(time());
		}
		return $vendoridd;
	}	

	function pobe_sch_car_regnum($id)
	{
		$db = new build_sql();
		$db->query(" SELECT regno FROM tbl_rsa_app_regno_search WHERE id = '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		$regnum = stripslashes($rec['regno']);
		return $regnum;
	}	

	function pobe_brand_name($brandno)
	{
		$db = new build_sql();
		$db->query(" SELECT brandname FROM tbl_rsa_app_brands WHERE brandno = '" . addslashes($brandno) . "' ");
		$rec = $db->fetch_array();
		$brandname = stripslashes($rec['brandname']);
		return $brandname;
	}	

//------------------------------------------------------------------------------------------------

	function pobe_view_oe_numbers($partid)
	{
		$db = new build_sql();
		$db->query(" SELECT oe_number FROM tbl_rsa_parts_oeref WHERE refnum = 1 AND status = '1' AND partid = '" . addslashes($partid) . "' ");
		$rec = $db->fetch_array();
		$oenumbers = stripslashes($rec['oe_number']);
		return $oenumbers;
	}	

	function pobe_view_oe_numbers_td($partid,$partyp)
	{
		$db = new build_sql();
		if ($partyp == 2){
		//$db->query(" SELECT cast as oe_number FROM tbl_rsa_parts WHERE status = '1' AND is_deleted = '0' AND id = '" . addslashes($partid) . "' ");
		// updated on 05-08-2022 
		$db->query(" SELECT attrdata as oe_number FROM tbl_rsa_attributes_data WHERE attrid = '8' AND partid = '" . addslashes($partid) . "' AND status = '1' ");
		} else {
		$db->query(" SELECT oe_number FROM tbl_rsa_parts_oeref WHERE refnum = 1 AND status = '1' AND partid = '" . addslashes($partid) . "' ");
		}
		$rec = $db->fetch_array();
		$oenumbers = stripslashes($rec['oe_number']);
		return $oenumbers;
	}	

	function pobe_view_oem_numbers($partid)
	{
		$db = new build_sql();
		$db->query(" SELECT oem_number FROM tbl_rsa_parts_oeref WHERE refnum = 1 AND status = '1' AND partid = '" . addslashes($partid) . "' ");
		$rec = $db->fetch_array();
		$oemnumbers = stripslashes($rec['oem_number']);
		return $oemnumbers;
	}	

	function pobe_view_groupname_from_type($id)
	{
		$db = new build_sql();
		$db->query(" SELECT part_group_name FROM tbl_rsa_part_group WHERE FIND_IN_SET('". addslashes($id) ."',part_type_opt) ");
		$rec = $db->fetch_array();
		$group_name = stripslashes($rec['part_group_name']);
		return $group_name;
	}	

	function pobe_npsearch_cart_items($searchid)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_app_offered_tdparts_temp WHERE searchid = '". addslashes($searchid) ."' AND is_deleted = '0' AND is_offered = '0' ");
		$rec = $db->fetch_array();
		$totalqty = (int)stripslashes($rec['cnt']);
		return $totalqty;
	}	

	function pobe_number_offered_items_td($vendordt,$useridd,$schid)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_app_offered_tdparts_temp WHERE vendortmp = '". addslashes($vendordt) ."' AND userid = '". addslashes($useridd) ."' AND searchid = '". addslashes($schid) ."' AND status = '1' AND is_deleted = '0' AND is_offered = '0' ");
		$rec = $db->fetch_array();
		$ordqty = (int)stripslashes($rec['cnt']);
		return $ordqty;
	}	

	function pobe_total_offered_value_td($vendordt,$useridd,$schid)
	{
		$db = new build_sql();
		$db->query(" SELECT SUM(offered_price) as ordval FROM tbl_rsa_app_offered_tdparts_temp WHERE vendortmp = '". addslashes($vendordt) ."' AND userid = '". addslashes($useridd) ."' AND searchid = '". addslashes($schid) ."' AND status = '1' AND is_deleted = '0' AND is_offered = '0' ");
		$rec = $db->fetch_array();
		$ordval = number_format($rec['ordval'], 2, '.', '');
		return $ordval;
	}	

	function pobe_cart_temp_data_td($vendordt,$useridd,$schid)
	{
		$lastupdatd = date("Y-m-d H:i:s");  
		$db = new build_sql();
		$db->query("UPDATE tbl_rsa_app_offered_tdparts_temp SET is_offered = '1' WHERE vendortmp = '". addslashes($vendordt) ."' AND userid = '". addslashes($useridd) ."' AND searchid = '". addslashes($schid) ."' AND status = '1' AND is_deleted = '0' ");
	}	

	function pobe_list_supply_data_td($userid,$schid)
	{
		$db = new build_sql(); 
		$db->query("SELECT id,part_type,rsac_ref,purchase_price,offered_stock,offered_price FROM tbl_rsa_app_offered_tdparts_temp WHERE userid = '". addslashes($userid) ."' AND searchid = '". addslashes($schid) ."' AND status = '1' AND is_deleted = '0' AND is_offered = '1' ORDER BY id ASC ");

		$supply_list = "<table cellspacing=3 cellpadding=3 border=0>";
		$supply_list.= "<tr><td><u>Part Type</u></td><td><u>Part RSAC Ref</u></td><td><u>Buy Price</u></td><td><u>Quantity Offered</u></td><td><u>Total</u></td></tr>";
		if($db->get_num_rows()) {
			$element = 0;
			while($clist = $db->fetch_array()){
				$supply_list .= "<tr><td>".pobe_view_part_type($clist['part_type'])."</td><td>".stripslashes($clist['rsac_ref'])."</td><td>".stripslashes($clist['purchase_price'])."</td><td>".stripslashes($clist['offered_stock'])."</td><td>".stripslashes($clist['offered_price'])."</td></tr>";
			}
		}
		$supply_list .= "</table>";

		return $supply_list;
	}


//------------------------------------------------------------------------------------------------

	// updated on 17-01-2022  
	function pobe_insert_supply_data_matched($vendordt,$useridd,$ponum)
	{
		$db = new build_sql();
		$db2 = new build_sql();
		//$sch_type = "np";
		
		$db->query("SELECT * FROM tbl_rsa_app_offered_tdparts_temp WHERE vendortmp = '". addslashes($vendordt) ."' AND userid = '". addslashes($useridd) ."' AND is_deleted = '0' AND is_offered = '0' ");
		if($db->get_num_rows()) {
			$element = 0;
			$datepostd = date("Y-m-d H:i:s");
			while($clist = $db->fetch_array()){
				$db2->query("INSERT INTO tbl_rsa_app_offered_tdparts_final (userid, partid, part_type, rsac_ref, sch_type, searchid, articleno, brandno, required_stock, purchase_price, offered_stock, offered_price, po_num, postdate, status, last_updated, is_deleted, is_offered) VALUES(". addslashes($clist['userid']) .", '". addslashes($clist['partid']) ."', '". addslashes($clist['part_type']) ."', '". addslashes($clist['rsac_ref']) ."', '". addslashes($clist['sch_type']) ."', '". addslashes($clist['searchid']) ."', '". addslashes($clist['articleno']) ."', '". addslashes($clist['brandno']) ."', '". addslashes($clist['required_stock']) ."', '". addslashes($clist['purchase_price']) ."', '". addslashes($clist['offered_stock']) ."', '". addslashes($clist['offered_price']) ."', '". addslashes($ponum) ."', '". $datepostd ."', '1', '". $datepostd ."', '0', '1')");
			}
		}
	}	

	// added on 03-01-2022 
	function pobe_part_stock_cart_totqnty($partid)
	{
		$db = new build_sql();
		$db->query(" SELECT SUM(offered_stock) as offerdstk FROM tbl_rsa_app_offered_items_temp WHERE partid = '". addslashes($partid) ."' AND status = '1' AND is_deleted = '0' AND is_offered = '0' ");
		$rec = $db->fetch_array();
		$offerdqty = (int)stripslashes($rec['offerdstk']);
		return $offerdqty;
	}	

//------------------------------------------------------------------------------------------------

	function pobe_td_part_stock_cart_quntity($vendordt,$useridd,$partid)
	{
		$db = new build_sql();
		$db->query(" SELECT SUM(offered_stock) as offerdstk FROM tbl_rsa_app_offered_tdparts_temp WHERE partid = '". addslashes($partid) ."' AND vendortmp = '". addslashes($vendordt) ."' AND userid = '". addslashes($useridd) ."' AND is_deleted = '0' AND is_offered = '0' ");
		$rec = $db->fetch_array();
		$offerdqty = (int)stripslashes($rec['offerdstk']);
		return $offerdqty;
	}	

	function pobe_td_count_part_offered($vendordt,$useridd,$partid)
	{
		$db = new build_sql();
		$db->query(" SELECT count(*) as cnt FROM tbl_rsa_app_offered_tdparts_temp WHERE vendortmp = '". addslashes($vendordt) ."' AND userid = '". addslashes($useridd) ."' AND partid = '". addslashes($partid) ."' AND is_offered = '0' ");
		$rec = $db->fetch_array();
		$offerdqty = (int)stripslashes($rec['cnt']);
		return $offerdqty;
	}	

//------------------------------------------------------------------------------------------------

	//  added on 28-01-2022 
	function pobe_regno_search_numofresults($id,$tot)
	{
		$db = new build_sql();
		$db2 = new build_sql();
		$db->query(" SELECT searchid FROM tbl_rsa_app_regno_search WHERE id = '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		$searchid = (int)stripslashes($rec['searchid']);

		$db2->query("UPDATE tbl_rsa_app_search SET numofresults = '". addslashes($tot) ."' WHERE searchid = '". addslashes($searchid) ."' ");
	}	

	function pobe_view_attribute_data($partid,$attrid)
	{
		$db = new build_sql();
		$db->query(" SELECT attrdata FROM tbl_rsa_attributes_data WHERE attrid = '" . addslashes($attrid) . "' AND partid = '" . addslashes($partid) . "' AND status = '1' ");
		$rec = $db->fetch_array();
		$attrdata = stripslashes($rec['attrdata']);
		return $attrdata;
	}	

	function pobe_view_purchase_price($partid, $app_price_display)
	{
		$db = new build_sql();
		$db->query(" SELECT attrdata FROM tbl_rsa_attributes_data WHERE attrid = '" . addslashes($app_price_display) . "' AND partid = '" . addslashes($partid) . "' AND status = '1' ");
		$rec = $db->fetch_array();
		$purchaseprice = (float)stripslashes($rec['attrdata']);
		$purchase_price = number_format(($purchaseprice), 2, '.', '');
		return $purchase_price;
	}	

	// added on 15-03-2022 
	function pobe_view_search_key($id)
	{
		$db = new build_sql();
		$db->query(" SELECT searchtext FROM tbl_rsa_app_search WHERE searchid = '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		$searchkey = stripslashes($rec['searchtext']);
		return $searchkey;
	}	

//------------------------------------------------------------------------------------------------

	// added on 24-03-2022 
	function pobe_part_stock_imported_qnty($partid)
	{
		$db = new build_sql();
		$db->query(" SELECT SUM(po_quantity) as sumqnty FROM tbl_rsa_app_onway_stock WHERE partid = '" . addslashes($partid) . "' AND status = '1' AND is_deleted = '0' ");
		$rec = $db->fetch_array();
		$importedqnty = (int)stripslashes($rec['sumqnty']);
		return $importedqnty;
	}	

	// added on 08-04-2022  
	function pobe_view_part_group_image($id)
	{
		$db = new build_sql();
		$db->query(" SELECT part_group_image FROM tbl_rsa_part_group WHERE id = '" . addslashes($id) . "' ");
		$rec = $db->fetch_array();
		$group_img = stripslashes($rec['part_group_image']);
		return $group_img;
	}	

//------------------------------------------------------------------------------------------------

	// added on 03-02-2023   
	function pobe_get_group_rsac_num($partid)
	{
		$db = new build_sql();
		$db->query("SELECT group_rsac FROM tbl_rsa_parts WHERE id = '" . addslashes($partid) . "' ");
		$rec = $db->fetch_array();
		$group_rsac = stripslashes($rec['group_rsac']);
		return $group_rsac;
	}	

	//  added on 03-02-2023    
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

    function pobe_user_app_price_display($adminid)
    {
        $db = new build_sql();
        $db->query(" SELECT app_price_display FROM tbl_rsa_app_users WHERE id = '" . $adminid . "' ");
        $rec = $db->fetch_array();
        $usertype = stripslashes($rec['app_price_display']);
        return $usertype;
    }


?>