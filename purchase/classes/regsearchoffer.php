<?php
	
	class regsearchoffer
	{
		var $db; //Instance of The DB class
		
		//Class Constructer
		function __construct(){
			$this->db = new build_sql();
			$this->db->build_sql();
		}
		
		//Function to retrieve regsearchoffer details for display
		function get_regsearchoffer_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_offered_tdparts_temp ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id ASC ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to count total
		function count_regsearchoffer()
		{
			$this->db->tablename = " tbl_rsa_app_offered_tdparts_temp ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to count total 
		function count_regsearchoffer_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_offered_tdparts_temp ";
			$this->db->where_clause($input_value);
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve regsearchoffer order by requestid for display
		function get_regsearchoffer($limit,$to_show,$input_value="")
		{
			$this->db->tablename = " tbl_rsa_app_offered_tdparts_temp ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id ASC LIMIT $limit,$to_show";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func
		  
		//Function to update regsearchoffer
		function update_regsearchoffer($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_app_offered_tdparts_temp ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
//			echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to delete regsearchoffer
		function delete_regsearchoffer($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_offered_tdparts_temp ";
			$this->db->where_clause($input_value);
			$this->db->delete_sql();
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//Function to add new regsearchoffer
		function add_regsearchoffer($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_offered_tdparts_temp ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
//			echo $this->db->sql . "<BR>";
//			exit;
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//---------------------------------------------------------------------//

		//Function to retrieve matched search data for display
		function get_regsearchoffer_matched_data($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_matched_articles ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id ASC ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 


		//---------------------------------------------------------------------//


		function con_close(){
			$this->db->sql_close();
		}
		//---------------------------------------------------------------------//
	
	} // end class 
?>