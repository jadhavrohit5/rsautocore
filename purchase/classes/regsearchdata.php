<?php
	
	class regsearchdata
	{
		var $db; //Instance of The DB class
		
		//Class Constructer
		function __construct(){
			$this->db = new build_sql();
			$this->db->build_sql();
		}
		
		//Function to retrieve regsearchdata details for display
		function get_regsearchdata_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_regno_search ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id ASC ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to count total
		function count_regsearchdata()
		{
			$this->db->tablename = " tbl_rsa_app_regno_search ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to count total 
		function count_regsearchdata_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_regno_search ";
			$this->db->where_clause($input_value);
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve regsearchdata order by requestid for display
		function get_regsearchdata($limit,$to_show,$input_value="")
		{
			$this->db->tablename = " tbl_rsa_app_regno_search ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id ASC LIMIT $limit,$to_show";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func
		  
		//Function to update regsearchdata
		function update_regsearchdata($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_app_regno_search ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
//			echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to delete regsearchdata
		function delete_regsearchdata($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_regno_search ";
			$this->db->where_clause($input_value);
			$this->db->delete_sql();
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//Function to add new regsearchdata
		function add_regsearchdata($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_regno_search ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
//			echo $this->db->sql . "<BR>";
//			exit;
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//---------------------------------------------------------------------//

		//Function to retrieve regsearchdata details for display
		function get_regsearchdata_vdata($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_td_vehicle_data ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id ASC ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to add new regsearchdata
		function add_regsearchdata_vdata($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_td_vehicle_data ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
//			echo $this->db->sql . "<BR>";
//			exit;
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function


		//---------------------------------------------------------------------//

		//Function to retrieve matched search data for display
		function get_regsearchdata_matched($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_matched_articles ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id ASC ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to count matched search data 
		function count_regsearchdata_matched($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_matched_articles ";
			$this->db->where_clause($input_value);
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to update matched search data 
		function update_regsearchdata_matched($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_app_matched_articles ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
//			echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func


		//---------------------------------------------------------------------//

		//Function to retrieve matching results 
		//function get_regsearchdata_matched_results($limit,$to_show,$schid,$carid)
		function get_regsearchdata_matched_results($schid,$carid)
		{
			//$my_qry = "SELECT p.id as partid, p.rsac, p.part_type, p.manufacturer, p.type, p.turns, p.purchase_price, p.sensor, ";
			// updated on 05-08-2022 
			$my_qry = "SELECT p.id as partid, p.rsac, p.part_type, p.manufacturer, ";
			$my_qry .= " p.a_grade, p.b_grade, p.target_stock, mp.id as itemid, mp.articleno, mp.brandno "; 
			$my_qry .= " FROM tbl_rsa_parts p, tbl_rsa_app_matched_articles mp "; 
			$my_qry .= " WHERE p.id = mp.partid AND mp.sch_id = '".addslashes($schid)."' AND mp.carId = '".addslashes($carid)."' "; 
			$my_qry .= " AND mp.status = '1' AND mp.brandopt = '1' AND p.status = '1' AND p.is_deleted = '0' "; 
			$my_qry .= " ORDER BY p.part_type,p.id ASC ";
			//$my_qry .= " ORDER BY p.part_type,p.id ASC LIMIT " . $limit . "," . $to_show;
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func

		//Function to count matching results 
		function count_regsearchdata_matched_results($schid,$carid)
		{
			$my_qry = "SELECT p.id as partid, mp.id as itemid ";
			$my_qry .= " FROM tbl_rsa_parts p, tbl_rsa_app_matched_articles mp "; 
			$my_qry .= " WHERE p.id = mp.partid AND mp.sch_id = '".addslashes($schid)."' AND mp.carId = '".addslashes($carid)."' "; 
			$my_qry .= " AND mp.status = '1' AND mp.brandopt = '1' AND p.status = '1' AND p.is_deleted = '0' "; 
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve selected matching results 
		function get_regsearchdata_selected_results($limit,$to_show,$schid,$carid)
		{
			$my_qry = "SELECT DISTINCT p.id as partid, p.rsac, p.part_type, p.a_grade, p.b_grade, p.target_stock, mp.id as itemid ";
			$my_qry .= " FROM tbl_rsa_parts p, tbl_rsa_app_matched_articles mp "; 
			$my_qry .= " WHERE p.id = mp.partid AND mp.sch_id = '".addslashes($schid)."' AND mp.carId = '".addslashes($carid)."' "; 
			$my_qry .= " AND p.status = '1' AND p.is_deleted = '0' AND mp.acptd = '1' "; 
			$my_qry .= " ORDER BY p.part_type,p.id ASC LIMIT " . $limit . "," . $to_show;
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func

		//Function to count selected matching results 
		function count_regsearchdata_selected_results($schid,$carid)
		{
			$my_qry = "SELECT DISTINCT p.id as partid, p.rsac, mp.acptd, mp.id as itemid ";
			$my_qry .= " FROM tbl_rsa_parts p, tbl_rsa_app_matched_articles mp "; 
			$my_qry .= " WHERE p.id = mp.partid AND mp.sch_id = '".addslashes($schid)."' AND mp.carId = '".addslashes($carid)."' "; 
			$my_qry .= " AND p.status = '1' AND p.is_deleted = '0' AND mp.acptd = '1' "; 
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			return $this->db->sql_numrows();
		} // end func

		//---------------------------------------------------------------------//


		//---------------------------------------------------------------------//


		function con_close(){
			$this->db->sql_close();
		}
		//---------------------------------------------------------------------//
	
	} // end class 
?>