<?php
	
	class partsdata
	{
		var $db; //Instance of The DB class
		
		//Class Constructer
		function __construct(){
			$this->db = new build_sql();
			$this->db->build_sql();
		}
		
		//Function to retrieve partsdata details for display
		function get_partsdata_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id ASC ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to count total
		function count_partsdata()
		{
			$this->db->tablename = " tbl_rsa_parts ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to count total 
		function count_partsdata_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts ";
			$this->db->where_clause($input_value);
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve partsdata order by requestid for display
		function get_partsdata($limit,$to_show,$input_value="")
		{
			$this->db->tablename = " tbl_rsa_parts ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id ASC LIMIT $limit,$to_show";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func
		  
		//Function to update partsdata
		function update_partsdata($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_parts ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
//			echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//---------------------------------------------------------------------//

		//Function to retrieve searchparts details for display
		function get_searchparts_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_search ";
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
			$this->db->tablename = " tbl_rsa_app_search ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to count total 
		function count_searchparts_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_search ";
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
			$this->db->tablename = " tbl_rsa_app_search ";
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
			$this->db->tablename = " tbl_rsa_app_search ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to delete searchparts
		function delete_searchparts($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_search ";
			$this->db->where_clause($input_value);
			$this->db->delete_sql();
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//Function to add new searchparts
		function add_searchparts($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_search ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
			//echo $this->db->sql . "<BR>";
//			exit;
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//---------------------------------------------------------------------//

		//Function to get part ids for quick search results
		function quick_searchparts_ids($grpid,$ptype,$searchkey)
		{
			$ids = array();

			///$my_qry2  = "SELECT DISTINCT id FROM tbl_rsa_parts WHERE rsac = '". addslashes($searchkey) ."' AND status = '1' AND is_deleted = '0' AND part_type IN (".$ptype.") "; 
			// updated on 06-02-2023 
			if (($grpid == 9) or ($grpid == 10) or ($grpid == 11) or ($grpid == 12)) {
				$my_qry2  = "SELECT DISTINCT id FROM tbl_rsa_parts WHERE group_rsac = '". addslashes($searchkey) ."' AND status = '1' AND is_deleted = '0' AND part_type IN (".$ptype.") "; 
			} else {
				$my_qry2  = "SELECT DISTINCT id FROM tbl_rsa_parts WHERE rsac = '". addslashes($searchkey) ."' AND status = '1' AND is_deleted = '0' AND part_type IN (".$ptype.") "; 
			}
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

			// Cardone 1,3,4,8 - Cardone USA 2 - RS internal 2 9
			if (($grpid == 1) or ($grpid == 2) or ($grpid == 3) or ($grpid == 5)) {

				$my_qry4  = "SELECT DISTINCT cr.partid as id FROM tbl_rsa_parts_customerref cr ";
				$my_qry4 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
				$my_qry4 .= " LEFT JOIN tbl_rsa_customers ct on ct.cid = cr.custid "; 

				if($grpid == 2) {
						//$my_qry4 .= " WHERE cr.crdata LIKE '%". addslashes($searchkey) ."%' AND ( cr.custid = 32 OR cr.custid = 41 ) ";
						// updated 16-09-2022 - added new customers 
						// Elstock 8, Shaftec 18, Brake engineering 30, Apec 73, Rolling components 74, ECP 75
						// Parts aliance 77, Brake fit 78, Juratek 79, Brake engineering 2 80
						$my_qry4 .= " WHERE cr.crdata LIKE '%". addslashes($searchkey) ."%' AND ( cr.custid = 32 OR cr.custid = 41 OR cr.custid = 8 OR cr.custid = 18 OR cr.custid = 30 OR cr.custid = 73 OR cr.custid = 74 OR cr.custid = 75 OR cr.custid = 77 OR cr.custid = 78 OR cr.custid = 79 OR cr.custid = 80 ) ";
				}
				if($grpid == 5) {
						$my_qry4 .= " WHERE cr.crdata LIKE '%". addslashes($searchkey) ."%' AND cr.custid = 41 ";
				}
				if(($grpid == 1) or ($grpid == 3)) {
						$my_qry4 .= " WHERE cr.crdata LIKE '%". addslashes($searchkey) ."%' AND cr.custid = 2 ";
				}
				$my_qry4 .= " AND cr.status = '1' AND cr.refnum = 1 AND ct.status = '1' AND pt.part_type IN (".$ptype.") ";
				//echo "=================================================<br><br>".$my_qry4."<br>";

				$this->db->sql_query($my_qry4);
				if($this->db->sql_numrows()>0) {
					$childs=$this->db->sql_fetchrowset();
					//print_r($childs);
					for($i=0;$i<count($childs);$i++){
						$ids[] = $childs[$i]['id'];
						//echo $childs[$i]['id']."<br />";
					}
				}
			}

			// OE Number, OEM Number - updated on 15-08-2022 ALLOWED OE/OEM SEARCH FOR ALL PART TYPES
			//if ($grpid != 2) {
			if ($grpid != 0) {
				$my_qry5  = "SELECT DISTINCT oe.partid as id FROM tbl_rsa_parts_oeref oe ";
				$my_qry5 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = oe.partid ";
				$my_qry5 .= " WHERE (oe.oe_number LIKE '%". addslashes($searchkey) ."%' OR oe.oem_number LIKE '%". addslashes($searchkey) ."%') AND oe.refnum = 1 AND pt.part_type IN (".$ptype.") ";
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

			// Cast 2, 1, 3,4,8, 5,6,7 
			if (($grpid == 1) or ($grpid == 2) or ($grpid == 3) or ($grpid == 4)) {
				//$my_qry6  = "SELECT DISTINCT id FROM tbl_rsa_parts WHERE cast LIKE '%". addslashes($searchkey) ."%' AND status = '1' AND is_deleted = '0' AND part_type IN (".$ptype.") "; 
				// updated on 18-03-2022 for cast data
				$my_qry6  = "SELECT DISTINCT cr.partid as id FROM tbl_rsa_attributes_data cr ";
				$my_qry6 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
				$my_qry6 .= " LEFT JOIN tbl_rsa_attributes ct on ct.id = cr.attrid "; 
				$my_qry6 .= " WHERE cr.attrdata LIKE '%". addslashes($searchkey) ."%' AND cr.attrid = 8 AND cr.status = '1' AND ct.status = '1' AND pt.part_type IN (".$ptype.") ";
				//echo "=================================================<br><br>".$my_qry6."<br>";

				$this->db->sql_query($my_qry6);
				if($this->db->sql_numrows()>0) {
					$childca=$this->db->sql_fetchrowset();
					for($i=0;$i<count($childca);$i++){
						if(!in_array($childca[$i]['id'], $ids)) {
						$ids[] = $childca[$i]['id'];
						//echo $childca[$i]['id']."<br />";
						}
					}
				}
			}

			//---------------------------------------------------------------------------------------------
			// ADDED ON 15-08-2022 - ALLOWED SEARCH CONDITION FOR OE 1#, OE 2#, OEM 1#, OEM 2#
			////if ($grpid != 0) {
			if (($grpid == 9) or ($grpid == 10) or ($grpid == 11) or ($grpid == 12)) {
				$my_qry7  = "SELECT DISTINCT cr.partid as id FROM tbl_rsa_attributes_data cr ";
				$my_qry7 .= " LEFT JOIN tbl_rsa_parts pt on pt.id = cr.partid ";
				$my_qry7 .= " LEFT JOIN tbl_rsa_attributes ct on ct.id = cr.attrid "; 
				$my_qry7 .= " WHERE cr.attrdata LIKE '%". addslashes($searchkey) ."%' AND (cr.attrid = 50 OR cr.attrid = 51 OR cr.attrid = 52 OR cr.attrid = 53) AND ct.status = '1' AND pt.part_type IN (".$ptype.") ";
				//echo "=================================================<br><br>".$my_qry7."<br>";

				$this->db->sql_query($my_qry7);
				if($this->db->sql_numrows()>0) {
					$childnw=$this->db->sql_fetchrowset();
					for($i=0;$i<count($childnw);$i++){
						if(!in_array($childnw[$i]['id'], $ids)) {
						$ids[] = $childnw[$i]['id'];
						//echo $childnw[$i]['id']."<br />";
						}
					}
				}

			//---------------------------------------------------------------------------------------------

			//----------------
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
			//----------------
			}
			//---------------------------------------------------------------------------------------------


			return $ids;
		} // end func

		//---------------------------------------------------------------------//

		//Function to count search results from part ids
		function count_searchparts_results_all($ptype,$ids)
		{
			$idss = implode(',',$ids);
			$idss = rtrim($idss,',');
			$sp_ptypes = [14, 15, 16, 17];  // added on 03-02-2023 

			$my_qry = "SELECT DISTINCT p.id, p.rsac, p.part_type, p.make, p.manufacturer, p.model FROM tbl_rsa_parts p ";
			//$my_qry .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = ". addslashes($ptype)." ";
			$my_qry .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type IN(".$ptype.") "; 
			///$my_qry .= " AND p.id IN(".$idss.") "; 
			///$my_qry .= " ORDER BY p.id ASC ";
			//------------------------------------------------added on 03-02-2023
			if (in_array($ptype, $sp_ptypes)) {
			$my_qry .= " AND p.is_main = '1' AND p.id IN(".$idss.") "; 
			} else {
			$my_qry .= " AND p.id IN(".$idss.") "; 
			}
			//------------------------------------------------
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			return $this->db->sql_numrows();
		} // end func


		//Function to retrieve search results from part ids
		function get_searchparts_results_all($limit,$to_show,$ptype,$ids)
		{
			$idss = implode(',',$ids);
			$idss = rtrim($idss,',');
			$sp_ptypes = [14, 15, 16, 17];  // added on 03-02-2023

			$my_qry = "SELECT DISTINCT p.id, p.rsac, p.part_type, p.make, p.manufacturer, p.model, p.a_grade, p.b_grade, p.target_stock FROM tbl_rsa_parts p ";
			//$my_qry .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = ". addslashes($ptype)." ";
			$my_qry .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type IN(".$ptype.") "; 
			///$my_qry .= " AND p.id IN(".$idss.") "; 
			//------------------------------------------------added on 03-02-2023
			if (in_array($ptype, $sp_ptypes)) {
			$my_qry .= " AND p.is_main = '1' AND p.id IN(".$idss.") "; 
			} else {
			$my_qry .= " AND p.id IN(".$idss.") "; 
			}
			//------------------------------------------------
			$my_qry .= " ORDER BY p.id ASC LIMIT " . $limit . "," . $to_show;
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func

		//---------------------------------------------------------------------//

		// SELECT * FROM tbl_rsa_parts WHERE SUBSTR(rsac, 1, 4) = SUBSTRING('344111',1,4)

		//---------------------------------------------------------------------//

		//---------------------------------------------------------------------//

		//---------------------------------------------------------------------//

		//---------------------------------------------------------------------//
	
		function con_close(){
			$this->db->sql_close();
		}
		//---------------------------------------------------------------------//
	
	} // end class 
?>