<?php
	
	class searchparts
	{
		var $db; //Instance of The DB class
		
		//Class Constructer
		function __construct(){
			$this->db = new build_sql();
			$this->db->build_sql();
		}
		
		//Function to retrieve searchparts details for display
		function get_searchparts_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts_search ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY searchid ASC ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to count total
		function count_searchparts()
		{
			$this->db->tablename = " tbl_rsa_parts_search ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to count total 
		function count_searchparts_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts_search ";
			$this->db->where_clause($input_value);
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve searchparts order by requestid for display
		function get_searchparts($limit,$to_show,$input_value="")
		{
			$this->db->tablename = " tbl_rsa_parts_search ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY searchid ASC LIMIT $limit,$to_show";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func
		  
		//Function to update searchparts
		function update_searchparts($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_parts_search ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
//			echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to delete searchparts
		function delete_searchparts($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts_search ";
			$this->db->where_clause($input_value);
			$this->db->delete_sql();
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//Function to add new searchparts
		function add_searchparts($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts_search ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//---------------------------------------------------------------------//

		//Function to get part ids for quick search results
		function quick_searchparts_ids($ptype,$searchkey,$oeoemopt)
		{
			$ids = array();

			$my_qry2  = "SELECT DISTINCT cr.partid as id FROM tbl_rsa_parts_customerref cr ";
			$my_qry2 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
			$my_qry2 .= " LEFT JOIN tbl_rsa_customers ct on ct.cid = cr.custid "; 
			$my_qry2 .= " WHERE cr.crdata LIKE '%". addslashes($searchkey) ."%' AND cr.status = '1' AND cr.refnum = 1 AND ct.status = '1' AND pt.part_type = ". $ptype;
			//echo "=================================================<br><br>".$my_qry2."<br>";

			$this->db->sql_query($my_qry2);
			if($this->db->sql_numrows()>0) {
				$childs=$this->db->sql_fetchrowset();
				//print_r($childs);
				for($i=0;$i<count($childs);$i++){
					$ids[] = $childs[$i]['id'];
					//echo $childs[$i]['id']."<br />";
				}
			}

			$my_qry7  = "SELECT DISTINCT cr.partid as id FROM tbl_rsa_attributes_data cr ";
			$my_qry7 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
			$my_qry7 .= " LEFT JOIN tbl_rsa_attributes ct on ct.id = cr.attrid "; 
			$my_qry7 .= " WHERE cr.attrdata LIKE '%". addslashes($searchkey) ."%' AND cr.status = '1' AND ct.status = '1' AND pt.part_type = ". $ptype;
			//echo "=================================================<br><br>".$my_qry7."<br>";

			$this->db->sql_query($my_qry7);
			if($this->db->sql_numrows()>0) {
				$childatb=$this->db->sql_fetchrowset();
				//print_r($childatb);
				for($i=0;$i<count($childatb);$i++){
					if(!in_array($childatb[$i]['id'], $ids)) {
					$ids[] = $childatb[$i]['id'];
					//echo $childatb[$i]['id']."<br />";
					}
				}
			}

			if($oeoemopt == '1') {
				$my_qry5  = "SELECT DISTINCT oe.partid as id FROM tbl_rsa_parts_oeref oe ";
				$my_qry5 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = oe.partid ";
				$my_qry5 .= " WHERE (oe.oe_number LIKE '%". addslashes($searchkey) ."%' OR oe.oem_number LIKE '%". addslashes($searchkey) ."%') AND oe.refnum = 1 AND pt.part_type = ". $ptype;
				//echo "=================================================<br><br>".$my_qry5."<br>";

				$this->db->sql_query($my_qry5);
				if($this->db->sql_numrows()>0) {
					$childom=$this->db->sql_fetchrowset();
					for($i=0;$i<count($childom);$i++){
						if(!in_array($childom[$i]['id'], $ids)) {
						$ids[] = $childom[$i]['id'];
						//echo $childom[$i]['id']."<br />";
						}
					}
				}
			}

			////$my_qry3 = "SELECT DISTINCT p.id as id FROM tbl_rsa_parts p ";
			////if($oeoemopt == '1') {
			////$my_qry3 .= " LEFT JOIN tbl_rsa_parts_oeref oe on oe.partid = p.id ";
			////$my_qry3 .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = ". addslashes($ptype)." AND oe.refnum = 1 ";
			////} else {
			////$my_qry3 .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = ". addslashes($ptype)." ";
			////}
			$my_qry3 = "SELECT DISTINCT p.id as id FROM tbl_rsa_parts p ";
			$my_qry3 .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = ". addslashes($ptype)." ";
			$my_qry3 .= " AND (p.rsac LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.notes LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.manufacturer LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.make LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.model LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.years LIKE '%". addslashes($searchkey) ."%' ";
/*
*/
			$my_qry3 .= " OR p.location LIKE '%". addslashes($searchkey) ."%' ";
			////if($oeoemopt == '1') {
			////$my_qry3 .= " OR oe.oe_number LIKE '%". addslashes($searchkey) ."%' ";
			////$my_qry3 .= " OR oe.oem_number LIKE '%". addslashes($searchkey) ."%' ";
			////}
			$my_qry3 .= " ) ";
			//echo "=================================================<br><br>".$my_qry3."<br>";

			$this->db->sql_query($my_qry3);
			if($this->db->sql_numrows()>0) {
				$parents=$this->db->sql_fetchrowset();
				//print_r($parents);
				for($i=0;$i<count($parents);$i++){
					if(!in_array($parents[$i]['id'], $ids)) {
					$ids[] = $parents[$i]['id'];
					//echo $parents[$i]['id']."<br />";
					}
				}
			}

			return $ids;
		} // end func

		//---------------------------------------------------------------------//

		//Function to get part ids for advance search results

		// updated on 08-02-2022  
		function advance_searchparts_ids($ptype,$custref,$custdata,$manufacturer,$make,$model, $oe_number,$oem_number,$location,$attrval,$attrdata)
		{                                
			$ids = array();
			$custids = array();      // added on 08-02-2022 
			$attrids = array();      // added on 08-02-2022 
			$idd = array();          // added on 08-02-2022 

			$cust_ids = "";
			$attr_ids = "";

			if(($custref > 0) || ($custdata != "")) {
				$my_qry2  = "SELECT DISTINCT cr.partid as id FROM tbl_rsa_parts_customerref cr ";
				$my_qry2 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
				$my_qry2 .= " LEFT JOIN tbl_rsa_customers ct on ct.cid = cr.custid "; 
				$my_qry2 .= " WHERE cr.status = '1' AND cr.refnum = 1 AND ct.status = '1' AND pt.part_type = ". $ptype;
				if($custref > 0) {
				$my_qry2 .= " AND cr.custid = '". addslashes($custref) ."' ";
				}
				if($custdata != "") {
				$my_qry2 .= " AND cr.crdata LIKE '%". addslashes($custdata) ."%' ";
				}
				//echo "=================================================<br><br>".$my_qry2."<br>";

				$this->db->sql_query($my_qry2);
				if($this->db->sql_numrows()>0) {
					$childs=$this->db->sql_fetchrowset();
					for($i=0;$i<count($childs);$i++){
						$custids[] = $childs[$i]['id'];
					}
					$cust_ids = implode(',', $custids);
				} else {
					$cust_ids = "0";
				}
			}

			// added on 08-02-2022 ---------------------------------------
			if(isset($attrdata) && ($attrdata != "")) {
	
				$attrids = explode(',', $attrdata);
				for($i=0;$i<count($attrids);$i++){
					$idd[] = $attrids[$i];
				}
				//print_r($idd);
			} 

			if($attrval > 0) {
				if(count($idd) != 0) {
					$attr_ids = implode(',', $idd);
				} else {
					$attr_ids = "0";
				}
			}

			if(($manufacturer != "") || ($make != "") || ($model != "") || ($location != "") || ($oe_number != "") || ($oem_number != "") || ($attrdata != "")) {
				$my_qry3 = "SELECT DISTINCT p.id as id FROM tbl_rsa_parts p ";
				if(($oe_number != "") || ($oem_number != "")) {
				$my_qry3 .= " LEFT JOIN tbl_rsa_parts_oeref oe on oe.partid = p.id ";
				}
				$my_qry3 .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = ". addslashes($ptype)."  ";
				if(($oe_number != "") || ($oem_number != "")) {
				$my_qry3 .= " AND oe.refnum = 1 ";
				}
				if(isset($manufacturer) && $manufacturer != "") {
				$my_qry3 .= " AND p.manufacturer LIKE '%". addslashes($manufacturer) ."%' ";
				}
				if (isset($make) && $make != "") {
				$my_qry3 .= " AND p.make LIKE '%". addslashes($make) ."%' ";
				}
				if(isset($model) && $model != "") {
				$my_qry3 .= " AND p.model LIKE '%". addslashes($model) ."%' ";
				}
				if(isset($location) && $location != "") {
				$my_qry3 .= " AND p.location LIKE '%". addslashes($location) ."%' ";
				}
				if(isset($oe_number) && $oe_number != "") {
				$my_qry3 .= " AND oe.oe_number LIKE '%". addslashes($oe_number) ."%' ";
				}
				if(isset($oem_number) && $oem_number != "") {
				$my_qry3 .= " AND oe.oem_number LIKE '%". addslashes($oem_number) ."%' ";
				}

				if($cust_ids != "") {
					$my_qry3 .= " AND p.id IN (".$cust_ids.") ";
				}

				if($attrval > 0) {
					$my_qry3 .= " AND p.id IN (".$attr_ids.") ";
				}
				//echo "=================================================<br><br>".$my_qry3."<br>";
				//exit;

				/*
				$this->db->sql_query($my_qry3);
				if($this->db->sql_numrows()>0) {
					$parents=$this->db->sql_fetchrowset();
					//print_r($parents);
					for($i=0;$i<count($parents);$i++){
						if(!in_array($parents[$i]['id'], $ids)) {
						$ids[] = $parents[$i]['id'];
						//echo $parents[$i]['id']."<br />";
						}
					}
				}
				*/

				// added on 08-02-2022 ---------------------------------------
				$this->db->sql_query($my_qry3);
				if($this->db->sql_numrows()>0) {
					$parents=$this->db->sql_fetchrowset();
					for($i=0;$i<count($parents);$i++){
						$ids[] = $parents[$i]['id'];   
					}
				}
				//print_r($ids);
				//echo "<br>";
				//------------------------------------------------------------
			}

			return $ids;
		} // end func

		//---------------------------------------------------------------------//

		//Function to count search results from part ids
		function count_searchparts_results_all($ptype,$ids)
		{
			$idss = implode(',',$ids);
			$idss = rtrim($idss,',');

			//$my_qry = "SELECT DISTINCT p.id, p.rsac, p.part_type, p.make, p.manufacturer, p.model, p.years, p.location, p.target_stock, p.notes FROM tbl_rsa_parts p ";

			$my_qry = "SELECT DISTINCT p.id, p.rsac, p.part_type, p.make, p.manufacturer, p.model, p.notes FROM tbl_rsa_parts p ";
			$my_qry .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = ". addslashes($ptype)." ";
			$my_qry .= " AND p.id IN(".$idss.") "; 
			$my_qry .= " ORDER BY p.id ASC ";
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			return $this->db->sql_numrows();
		} // end func


		//Function to retrieve search results from part ids
		function get_searchparts_results_all($limit,$to_show,$ptype,$ids)
		{
			$idss = implode(',',$ids);
			$idss = rtrim($idss,',');

			// UPDATED ON 01-08-2022 TO IMPLEMENT NEW DATABASE CHANGES
			//$my_qry = "SELECT DISTINCT p.id, p.rsac, p.part_type, p.make, p.manufacturer, p.model, p.a_grade, p.b_grade, p.pulley_grooves, p.pulley_size, p.bar_pressure, p.length, p.turns, p.trod_threadsize, p.sensor, p.type, p.cast, p.plug_pins, p.pinion_length, p.pinion_type, p.notes FROM tbl_rsa_parts p ";

			$my_qry = "SELECT DISTINCT p.id, p.rsac, p.part_type, p.make, p.manufacturer, p.model, p.a_grade, p.b_grade, p.notes FROM tbl_rsa_parts p ";
			$my_qry .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = ". addslashes($ptype)." ";
			$my_qry .= " AND p.id IN(".$idss.") "; 
			$my_qry .= " ORDER BY p.id ASC LIMIT " . $limit . "," . $to_show;
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func

		//Function to count quick search results
		function count_searchparts_quick($ptype,$searchkey)
		{
			$my_qry = "SELECT DISTINCT p.id, p.rsac, p.part_type, p.make, p.manufacturer, p.model, p.years, p.location, p.target_stock, p.notes FROM tbl_rsa_parts p ";
			//$my_qry .= " LEFT JOIN tbl_rsa_make m on m.id = p.make ";
			$my_qry .= " LEFT JOIN tbl_rsa_parts_oeref oe on oe.partid = p.id ";
			//$my_qry .= " LEFT JOIN tbl_rsa_parts_customerref cr on cr.partid = p.id ";
			$my_qry .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = ". addslashes($ptype)." AND oe.refnum = 1 ";
			//$my_qry .= " AND cr.refnum = 1 ";
			if($searchkey != "") {
			$my_qry .= " AND (p.rsac LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.notes LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.manufacturer LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.make LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.model LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.years LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.pulley_size LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.bar_pressure LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.piston_mm LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.pad_gap LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.f_r LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.cast LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.location LIKE '%". addslashes($searchkey) ."%' ";
			//$my_qry .= " OR m.name LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR oe.oe_number LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR oe.oem_number LIKE '%". addslashes($searchkey) ."%' ";
			//$my_qry .= " OR cr.crdata LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " ) ";
			}
			$my_qry .= " ORDER BY p.id ASC ";
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve quick search results
		function get_searchparts_quick($limit,$to_show,$ptype,$searchkey)
		{
			$my_qry = "SELECT DISTINCT p.id, p.rsac, p.part_type, p.make, p.manufacturer, p.model, p.years, p.location, p.target_stock, p.notes FROM tbl_rsa_parts p ";
			//$my_qry .= " LEFT JOIN tbl_rsa_make m on m.id = p.make ";
			$my_qry .= " LEFT JOIN tbl_rsa_parts_oeref oe on oe.partid = p.id ";
			$my_qry .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = ". addslashes($ptype)." AND oe.refnum = 1 ";
			if($searchkey != "") {
			$my_qry .= " AND (p.rsac LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.notes LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.manufacturer LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.make LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.model LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.years LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.pulley_size LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.bar_pressure LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.piston_mm LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.pad_gap LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.f_r LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.cast LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR p.location LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR oe.oe_number LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " OR oe.oem_number LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry .= " ) ";
			}
			$my_qry .= " ORDER BY p.id ASC LIMIT " . $limit . "," . $to_show;
			//echo $my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func

		//---------------------------------------------------------------------//

		//Function to count advance search results
		function count_searchparts_advance($ptype,$custref,$custdata,$manufacturer,$make,$model,$pulley_size,$bar_pressure, $oe_number,$oem_number,$location)
		{
			$my_qry = "SELECT DISTINCT p.id, p.rsac, p.part_type, p.make, p.manufacturer, p.model, p.years, p.location, p.target_stock, p.notes FROM tbl_rsa_parts p ";
			$my_qry .= " LEFT JOIN tbl_rsa_parts_oeref oe on oe.partid = p.id ";
			$my_qry .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = ". addslashes($ptype)."  ";
			if(($oe_number != "") || ($oem_number != "")) {
			$my_qry .= " AND oe.refnum = 1 ";
			}
			if($manufacturer != "") {
			$my_qry .= " AND p.manufacturer LIKE '%". addslashes($manufacturer) ."%' ";
			}
			if ($make != "") {
			$my_qry .= " AND p.make LIKE '%". addslashes($make) ."%' ";
			}
			if($model != "") {
			$my_qry .= " AND p.model LIKE '%". addslashes($model) ."%' ";
			}
			if($pulley_size != "") {
			$my_qry .= " AND p.pulley_size LIKE '%". addslashes($pulley_size) ."%' ";
			}
			if($bar_pressure != "") {
			$my_qry .= " AND p.bar_pressure LIKE '%". addslashes($bar_pressure) ."%' ";
			}
			if($location != "") {
			$my_qry .= " AND p.location LIKE '%". addslashes($location) ."%' ";
			}
			if($oe_number != "") {
			$my_qry .= " AND oe.oe_number LIKE '%". addslashes($oe_number) ."%' ";
			}
			if($oem_number != "") {
			$my_qry .= " AND oe.oem_number LIKE '%". addslashes($oem_number) ."%' ";
			}
			$my_qry .= " ORDER BY p.id ASC	  ";
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve advance search results
		function get_searchparts_advance($limit,$to_show,$ptype,$custref,$custdata,$manufacturer,$make,$model,$pulley_size,$bar_pressure, $oe_number,$oem_number,$location)
		{
			$my_qry = "SELECT DISTINCT p.id, p.rsac, p.part_type, p.make, p.manufacturer, p.model, p.years, p.location, p.target_stock, p.notes FROM tbl_rsa_parts p ";
			$my_qry .= " LEFT JOIN tbl_rsa_parts_oeref oe on oe.partid = p.id ";
			$my_qry .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = ". addslashes($ptype)."  ";
			if(($oe_number != "") || ($oem_number != "")) {
			$my_qry .= " AND oe.refnum = 1 ";
			}
			if($manufacturer != "") {
			$my_qry .= " AND p.manufacturer LIKE '%". addslashes($manufacturer) ."%' ";
			}
			if ($make != "") {
			$my_qry .= " AND p.make LIKE '%". addslashes($make) ."%' ";
			}
			if($model != "") {
			$my_qry .= " AND p.model LIKE '%". addslashes($model) ."%' ";
			}
			if($pulley_size != "") {
			$my_qry .= " AND p.pulley_size LIKE '%". addslashes($pulley_size) ."%' ";
			}
			if($bar_pressure != "") {
			$my_qry .= " AND p.bar_pressure LIKE '%". addslashes($bar_pressure) ."%' ";
			}
			if($location != "") {
			$my_qry .= " AND p.location LIKE '%". addslashes($location) ."%' ";
			}
			if($oe_number != "") {
			$my_qry .= " AND oe.oe_number LIKE '%". addslashes($oe_number) ."%' ";
			}
			if($oem_number != "") {
			$my_qry .= " AND oe.oem_number LIKE '%". addslashes($oem_number) ."%' ";
			}
			$my_qry .= " ORDER BY p.id ASC LIMIT " . $limit . "," . $to_show;
			//echo $my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func
		  
//---------------------------------------------------------------------//

		//Function to count quick search results
		function count_searchparts_quick2($ptype,$searchkey)
		{
			$ids = array();
			$my_qry2  = "SELECT DISTINCT cr.partid as id FROM tbl_rsa_parts_customerref cr ";
			$my_qry2 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
			$my_qry2 .= " WHERE cr.crdata LIKE '%". addslashes($searchkey) ."%' AND cr.status = '1' AND cr.refnum = 1 AND pt.part_type = ". $ptype;
			//echo $my_qry2."<br>";

			$this->db->sql_query($my_qry2);
			if($this->db->sql_numrows()>0) {
				$childs=$this->db->sql_fetchrowset();
				//print_r($childs);
				for($i=0;$i<count($childs);$i++){
					$ids[] = $childs[$i]['id'];
					//echo $childs[$i]['id']."<br />";
				}
			}
			$my_qry3 = "SELECT DISTINCT p.partid as id FROM tbl_rsa_parts p ";
			//$my_qry3 .= " LEFT JOIN tbl_rsa_make m on m.id = p.make ";
			$my_qry3 .= " LEFT JOIN tbl_rsa_parts_oeref oe on oe.partid = p.id ";
			$my_qry3 .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = ". addslashes($ptype)." AND oe.refnum = 1 ";
			$my_qry3 .= " AND (p.rsac LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.notes LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.manufacturer LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.model LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.years LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.pulley_size LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.bar_pressure LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.piston_mm LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.pad_gap LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.f_r LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.cast LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.location LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.make LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR oe.oe_number LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR oe.oem_number LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " ) ";
			//echo $my_qry3."<br>";

			$this->db->sql_query($my_qry3);
			if($this->db->sql_numrows()>0) {
				$parents=$this->db->sql_fetchrowset();
				//print_r($parents);
				for($i=0;$i<count($parents);$i++){
					if(!in_array($parents[$i]['id'], $ids)) {
					$ids[] = $parents[$i]['id'];
					//echo $parents[$i]['id']."<br />";
					}
				}
			}

			$cnt = count($ids);

			if($cnt > 0) {
				$idss = implode(',',$ids);
				$idss = rtrim($idss,',');

				$my_qry = "SELECT DISTINCT p.id, p.rsac, p.part_type, p.make, p.manufacturer, p.model, p.years, p.location, p.target_stock, p.notes FROM tbl_rsa_parts p ";
				$my_qry .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = ". addslashes($ptype)." ";
				$my_qry .= " AND p.id IN(".$idss.") "; 
				$my_qry .= " ORDER BY p.id ASC ";
/*
*/
				//echo "=================================================<br><br>".$my_qry . "<BR>";
				$this->db->sql_query($my_qry);
				return $this->db->sql_numrows();
			} else {
				return 0;
			}
		} // end func

		//---------------------------------------------------------------------//
		//---------------------------------------------------------------------//
	
		//Function to get part ids by group for quick search results - added on 16-12-2022 
		function quick_searchparts_ids_group($ptype,$searchkey,$oeoemopt)
		{
			$ids = array();

			$my_qry2  = "SELECT DISTINCT cr.partid as id FROM tbl_rsa_parts_customerref cr ";
			$my_qry2 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
			$my_qry2 .= " LEFT JOIN tbl_rsa_customers ct on ct.cid = cr.custid "; 
			$my_qry2 .= " WHERE cr.crdata LIKE '%". addslashes($searchkey) ."%' AND cr.status = '1' AND cr.refnum = 1 AND ct.status = '1'AND pt.part_type = ". $ptype;
			//echo "=================================================<br><br>".$my_qry2."<br>";  AND pt.is_main = '1' 

			$this->db->sql_query($my_qry2);
			if($this->db->sql_numrows()>0) {
				$childs=$this->db->sql_fetchrowset();
				//print_r($childs);
				for($i=0;$i<count($childs);$i++){
					$ids[] = $childs[$i]['id'];
					//echo $childs[$i]['id']."<br />";
				}
			}

			$my_qry7  = "SELECT DISTINCT cr.partid as id FROM tbl_rsa_attributes_data cr ";
			$my_qry7 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
			$my_qry7 .= " LEFT JOIN tbl_rsa_attributes ct on ct.id = cr.attrid "; 
			$my_qry7 .= " WHERE cr.attrdata LIKE '%". addslashes($searchkey) ."%' AND cr.status = '1' AND ct.status = '1' AND pt.part_type = ". $ptype;
			//echo "=================================================<br><br>".$my_qry7."<br>"; AND pt.is_main = '1'

			$this->db->sql_query($my_qry7);
			if($this->db->sql_numrows()>0) {
				$childatb=$this->db->sql_fetchrowset();
				//print_r($childatb);
				for($i=0;$i<count($childatb);$i++){
					if(!in_array($childatb[$i]['id'], $ids)) {
					$ids[] = $childatb[$i]['id'];
					//echo $childatb[$i]['id']."<br />";
					}
				}
			}
			
			$my_qry8  = "SELECT DISTINCT os.partid as id FROM tbl_rsa_oe_stock_data os ";
			$my_qry8 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = os.partid "; 
			$my_qry8 .= " WHERE (os.oe_one LIKE '%". addslashes($searchkey) ."%' OR os.oe_two LIKE '%". addslashes($searchkey) ."%' OR os.oemone LIKE '%". addslashes($searchkey) ."%' OR os.oemtwo LIKE '%". addslashes($searchkey) ."%') AND os.status = '1' AND os.is_deleted = '0' AND pt.part_type = ". $ptype;
			//echo "=================================================<br><br>".$my_qry8."<br>";

			$this->db->sql_query($my_qry8);
			if($this->db->sql_numrows()>0) {
				$childatb=$this->db->sql_fetchrowset();
				//print_r($childatb);
				for($i=0;$i<count($childatb);$i++){
					if(!in_array($childatb[$i]['id'], $ids)) {
					$ids[] = $childatb[$i]['id'];
					//echo $childatb[$i]['id']."<br />";
					}
				}
			}
			//print_r($ids);

			if($oeoemopt == '1') {
				$my_qry5  = "SELECT DISTINCT oe.partid as id FROM tbl_rsa_parts_oeref oe ";
				$my_qry5 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = oe.partid ";
				$my_qry5 .= " WHERE (oe.oe_number LIKE '%". addslashes($searchkey) ."%' OR oe.oem_number LIKE '%". addslashes($searchkey) ."%') AND oe.refnum = 1 AND pt.part_type = ". $ptype;
				//echo "=================================================<br><br>".$my_qry5."<br>"; AND pt.is_main = '1'

				$this->db->sql_query($my_qry5);
				if($this->db->sql_numrows()>0) {
					$childom=$this->db->sql_fetchrowset();
					for($i=0;$i<count($childom);$i++){
						if(!in_array($childom[$i]['id'], $ids)) {
						$ids[] = $childom[$i]['id'];
						//echo $childom[$i]['id']."<br />";
						}
					}
				}
			}

			$my_qry3 = "SELECT DISTINCT p.id as id FROM tbl_rsa_parts p ";
			$my_qry3 .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.is_main = '1' AND p.part_type = ". addslashes($ptype)." ";
			$my_qry3 .= " AND (p.group_rsac LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.notes LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.manufacturer LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.make LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.model LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.years LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " OR p.location LIKE '%". addslashes($searchkey) ."%' ";
			$my_qry3 .= " ) ";
			//echo "=================================================<br><br>".$my_qry3."<br>";

			$this->db->sql_query($my_qry3);
			if($this->db->sql_numrows()>0) {
				$parents=$this->db->sql_fetchrowset();
				//print_r($parents);
				for($i=0;$i<count($parents);$i++){
					if(!in_array($parents[$i]['id'], $ids)) {
					$ids[] = $parents[$i]['id'];
					//echo $parents[$i]['id']."<br />";
					}
				}
			}

			return $ids;
		} // end func

		//---------------------------------------------------------------------//

		//Function to count search results from part ids by group - added on 17-12-2022 
		function count_searchparts_results_group($ptype,$ids)
		{
			$idss = implode(',',$ids);
			$idss = rtrim($idss,',');

			$my_qry = "SELECT DISTINCT p.id, p.rsac, p.part_type, p.make, p.manufacturer, p.model, p.notes, p.group_rsac FROM tbl_rsa_parts p ";
			$my_qry .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = ". addslashes($ptype)." AND p.is_main = '1' ";
			$my_qry .= " AND p.id IN(".$idss.") "; 
			$my_qry .= " GROUP BY p.group_rsac ";
			$my_qry .= " ORDER BY p.id ASC ";
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			return $this->db->sql_numrows();
		} // end func

		//---------------------------------------------------------------------//

		//Function to retrieve search results from part ids by group - added on 17-12-2022 
		function get_searchparts_results_group($limit,$to_show,$ptype,$ids)
		{
			$idss = implode(',',$ids);
			$idss = rtrim($idss,',');

			$my_qry = "SELECT DISTINCT p.id, p.rsac, p.part_type, p.make, p.manufacturer, p.model, p.a_grade, p.b_grade, p.notes, p.group_rsac FROM tbl_rsa_parts p ";
			$my_qry .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = ". addslashes($ptype)." AND p.is_main = '1' ";
			$my_qry .= " AND p.id IN(".$idss.") "; 
			$my_qry .= " GROUP BY p.group_rsac ";
			$my_qry .= " ORDER BY p.id ASC LIMIT " . $limit . "," . $to_show;
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func

		//---------------------------------------------------------------------//
		//---------------------------------------------------------------------//


		function con_close(){
			$this->db->sql_close();
		}
		//---------------------------------------------------------------------//

	} // end class 
?>