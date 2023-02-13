<?php
	
	class siteusers
	{
		var $db; //Instance of The DB class
		
		//Class Constructer
		function __construct(){
			$this->db = new build_sql();
			$this->db->build_sql();
		}
	    //function siteusers()
	    //{
		//	$this->db=new build_sql();
	    //} // end func
		
		//Function to retrieve siteusers details for display
		function get_siteusers_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_users ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id ASC ";
			$this->db->select_sql();
			//echo "=================================================".$this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to count total no. of category
		function count_siteusers()
		{
			$this->db->tablename = " tbl_rsa_users ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to count total no. of category
		function count_siteusers_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_users ";
			$this->db->where_clause($input_value);
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve siteusers order by signup date for display
		function get_siteusers($limit,$to_show,$input_value="")
		{
			$this->db->tablename = " tbl_rsa_users ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id ASC LIMIT $limit,$to_show";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func
		  
		//Function to update siteusers information
		function update_siteusers($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_users ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
//			echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to delete product siteusers
		function delete_siteusers($input_value)
		{
			$this->db->tablename = " tbl_rsa_users ";
			$this->db->where_clause($input_value);
			$this->db->delete_sql();
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//Function to add new siteusers
		function add_siteusers($input_value)
		{
			$this->db->tablename = " tbl_rsa_users ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//---------------------------------------------------------------------//

		//Function To Check Admin Login
		function check_login($input_value)
		{	
			$this->db->tablename = " tbl_rsa_users ";
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
			$rec = mysql_fetch_array(mysql_query("select * from tbl_rsa_users where id='$this->user_id'"));
			$this->user_name = $rec['user_name'];
		}
			
		//---------------------------------------------------------------------//
	
		function con_close(){
			$this->db->sql_close();
		}
		//---------------------------------------------------------------------//
	
	} // end class 
?>