<?php
	
	class customersdata
	{
		var $db; //Instance of The DB class
		
		//Class Constructer
		function __construct(){
			$this->db = new build_sql();
			$this->db->build_sql();
		}
		
		//Function to retrieve customersdata details for display
		function get_customersdata_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_customers ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY cid ASC ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to count total
		function count_customersdata()
		{
			$this->db->tablename = " tbl_rsa_customers ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to count total 
		function count_customersdata_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_customers ";
			$this->db->where_clause($input_value);
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve customersdata order by requestid for display
		function get_customersdata($limit,$to_show,$input_value="")
		{
			$this->db->tablename = " tbl_rsa_customers ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY cid ASC LIMIT $limit,$to_show";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func
		  
		//Function to update customersdata
		function update_customersdata($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_customers ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to delete customersdata
		function delete_customersdata($input_value)
		{
			$this->db->tablename = " tbl_rsa_customers ";
			$this->db->where_clause($input_value);
			$this->db->delete_sql();
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//Function to add new customersdata
		function add_customersdata($input_value)
		{
			$this->db->tablename = " tbl_rsa_customers ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
//			echo $this->db->sql . "<BR>";
//			exit;
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//---------------------------------------------------------------------//


		//---------------------------------------------------------------------//
	
	} // end class 
?>