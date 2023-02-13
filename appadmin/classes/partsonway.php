<?php
	
	class partsonway
	{
		var $db; //Instance of The DB class
		
		//Class Constructer
		function __construct(){
			$this->db = new build_sql();
			$this->db->build_sql();
		}
		
		//Function to retrieve partsonway details for display
		function get_partsonway_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_onway_stock ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id DESC ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to count total
		function count_partsonway()
		{
			$this->db->tablename = " tbl_rsa_app_onway_stock ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to count total 
		function count_partsonway_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_onway_stock ";
			$this->db->where_clause($input_value);
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve partsonway order by requestid for display
		function get_partsonway($limit,$to_show,$input_value="")
		{
			$this->db->tablename = " tbl_rsa_app_onway_stock ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id DESC LIMIT $limit,$to_show";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func
		  
		//Function to update partsonway
		function update_partsonway($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_app_onway_stock ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
//			echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to delete partsonway
		function delete_partsonway($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_onway_stock ";
			$this->db->where_clause($input_value);
			$this->db->delete_sql();
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//Function to add new partsonway
		function add_partsonway($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_onway_stock ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
//			echo $this->db->sql . "<BR>";
//			exit;
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//---------------------------------------------------------------------//

		//Function to count import data
		function count_partsonway_details_imported()
		{
			$my_qry = "SELECT count(*) as cnt FROM tbl_rsa_app_onway_stock WHERE status = '1' AND is_deleted = '0' GROUP BY uploadnum ";
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			return $this->db->sql_numrows();
		} // end func


		//Function to retrieve import data
		function get_partsonway_details_imported($limit,$to_show)
		{
			$my_qry = "SELECT count(id) as numrecs, uploadnum, SUM(po_quantity) as quantity, SUM(po_price) as price, postdate FROM tbl_rsa_app_onway_stock WHERE status = '1' AND is_deleted = '0' GROUP BY uploadnum ORDER BY postdate DESC LIMIT " . $limit . "," . $to_show;
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