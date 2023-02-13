<?php
	
	class adminuser
	{
		var $db; //Instance of The DB class
		var $user_id;
		
		//Class Constructer
		function __construct(){
			$this->db = new build_sql();
			$this->db->build_sql();
		}
		
		//Function to retrieve user details for display
		function get_user_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_web_admins ";
			$this->db->where_clause($input_value);
			$this->db->select_sql();
			$this->db->sql_query($this->db->sql);			
			return 1;
		}//end function 

		//Function to count total no. of category
		function count_user()
		{
			$this->db->tablename = " tbl_rsa_web_admins ";
			$this->db->select_sql();
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to count total no. of category
		function count_user_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_web_admins ";
			$this->db->where_clause($input_value);
			$this->db->select_sql();			
			$this->db->sql_query($this->db->sql);									
			return $this->db->sql_numrows();
			
		} // end func

		//Function to retrieve category for display
		function get_user($limit,$to_show)
		{
			$this->db->tablename = " tbl_rsa_web_admins ";
			$this->db->extra_sql=" LIMIT $limit,$to_show";
			$this->db->select_sql();
			$this->db->sql_query($this->db->sql);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func

		//Function to retrieve category for display
		function get_adminuser($limit,$to_show,$input_value)
		{
			$this->db->tablename = " tbl_rsa_web_admins ";
			$this->db->where_clause($input_value);
			$this->db->extra_sql=" LIMIT $limit,$to_show";
			$this->db->select_sql();
			$this->db->sql_query($this->db->sql);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func

		//Function to retrieve category for display
		function get_reguser($limit,$to_show,$input_value)
		{
			$this->db->tablename = " tbl_rsa_web_admins ";
			$this->db->where_clause($input_value);
			$this->db->extra_sql=" LIMIT $limit,$to_show";
			$this->db->select_sql();
			$this->db->sql_query($this->db->sql);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func

		//Function to update user information
		function update_user($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_web_admins ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
			//echo "=================================================".$this->db->sql;
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to delete category
		function delete_user($input_value)
		{
			$this->db->tablename = " tbl_rsa_web_admins ";
			$this->db->where_clause($input_value);
			$this->db->delete_sql();
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//Function to add new category
		function add_user($input_value)
		{
			$this->db->tablename = " tbl_rsa_web_admins ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//Function To Check Admin Login
		function check_login($input_value)
		{	
			$this->db->tablename = " tbl_rsa_web_admins ";
			$this->db->where_clause($input_value);
			$this->db->extra_sql=" AND user_status = 1 AND is_deleted = '0' ";
			$this->db->select_sql();
			//echo "=================================================".$this->db->sql;
			$this->db->sql_query($this->db->sql);
				 
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func
		
		//Function to get user details
		function get_user_info(){
			$rec = mysql_fetch_array(mysql_query("select * from tbl_rsa_web_admins where user_id='$this->user_id'"));
			$this->user_name = $rec['user_name'];
		}
			
	} // end class 
?>