<?php
	
	class searchdata
	{
		var $db; //Instance of The DB class
		
		//Class Constructer
		function __construct(){
			$this->db = new build_sql();
			$this->db->build_sql();
		}
	    //function searchdata()
	    //{
		//	$this->db=new build_sql();
	    //} // end func
		
		//Function to retrieve search details for display
		function get_searchdata_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_search ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY searchdate DESC ";
			$this->db->select_sql();
			//echo "=================================================".$this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to count total searches
		function count_searchdata()
		{
			$this->db->tablename = " tbl_rsa_app_search ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to count total no. of searches
		function count_searchdata_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_search ";
			$this->db->where_clause($input_value);
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve searchdata order by searchdate for display
		function get_searchdata($limit,$to_show,$input_value="")
		{
			$this->db->tablename = " tbl_rsa_app_search ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY searchdate DESC LIMIT $limit,$to_show";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func
		  
		//Function to update search data
		function update_searchdata($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_app_search ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
//			echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to delete search data
		function delete_searchdata($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_search ";
			$this->db->where_clause($input_value);
			$this->db->delete_sql();
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//---------------------------------------------------------------------//
			
		//Function to count searchdata
		function count_searchdata_last_100days($userid)
		{
			$my_qry = "SELECT * FROM tbl_rsa_app_search WHERE userid = '". addslashes($userid) ."' AND status = '1' AND searchdate BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW() ";
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			return $this->db->sql_numrows();
		} // end func


		//Function to retrieve searchdata
		function get_searchdata_last_100days($limit,$to_show,$userid)
		{
			$my_qry = "SELECT * FROM tbl_rsa_app_search WHERE userid = '". addslashes($userid) ."' AND status = '1' AND searchdate BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW() "; 
			$my_qry .= " ORDER BY searchdate DESC LIMIT " . $limit . "," . $to_show;
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func

		//---------------------------------------------------------------------//
	
		function con_close(){
			$this->db->sql_close();
		}
		//---------------------------------------------------------------------//
	
	} // end class 
?>