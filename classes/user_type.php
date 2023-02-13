<?php
	
	class user_type
	{
		var $db; //Instance of The DB class
		
		//Class Constructer
		function __construct(){
			$this->db = new build_sql();
			$this->db->build_sql();
		}
		
		//Function to retrieve user details for display
		function get_user_type_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_user_type ";
			$this->db->where_clause($input_value);
			$this->db->select_sql();
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to count total no. of category
		function count_user_type()
		{
			$this->db->tablename = " tbl_rsa_user_type ";
			$this->db->select_sql();
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve category for display
		function get_user_type($limit,$to_show)
		{
			$this->db->tablename = " tbl_rsa_user_type ";
			$this->db->extra_sql=" LIMIT $limit,$to_show";
			$this->db->select_sql();
			$this->db->sql_query($this->db->sql);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func

		//Function to update emblem information
		function update_user_type($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_user_type ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to delete category
		function delete_user_type($input_value)
		{
			$this->db->tablename = " tbl_rsa_user_type ";
			$this->db->where_clause($input_value);
			$this->db->delete_sql();
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//Function to add new category
		function add_user_type($input_value)
		{
			$this->db->tablename = " tbl_rsa_user_type ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//Function To Check Admin Login
		function check_type($input_value)
		{	
			 $this->db->tablename = " tbl_rsa_user_type ";
			 $this->db->where_clause($input_value);
			 $this->db->select_sql();
			 //echo $this->db->sql;
			 $this->db->sql_query($this->db->sql);
			 return 1;
		} // end func	

	} // end class 
?>