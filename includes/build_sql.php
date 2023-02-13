<?php
	class build_sql extends sql_db_connect {
		
     //Holds The Where clause Array
	   var $where_clause = array();
     //Sql Values Used At Insert/Update
	   var $sql_values = array();
	   var $filter_sql ; 
     //Extar Sql 
	   var $extra_sql ; 
     //Class Constructer
	 
	function __construct(){
		$this->db = new sql_db_connect();
		//$this->db->sql_db($sqlserver, $sqluser, $sqlpassword, $database);
		$this->db->sql_db();
	}
	 
	 function build_sql()
	  {
		 return $this->sql_db();
		//Do nothing   
	  } // end func

     //Functon To Build Clause
		function where_clause($input_val) {

           if(is_array($input_val))
				{
			        //If Already $this->sql_values is set discard the earlier array
						unset($this->where_clause);
//$a=count($input_val); print(" $a <br/>");
					////while(list($key,$val)=each($input_val))
					foreach($input_val as $key => $val)
						{
								$this->where_clause[]= $key ."='".$val."'"; 
						}
					$this->filter_sql="WHERE ". implode(" AND ", $this->where_clause);
				}
				else {
					trigger_error ("Input data is not an array.", E_USER_ERROR);
				}
		}
      
		function search_where_clause($input_val) {

           if(is_array($input_val))
				{
			        //If Already $this->sql_values is set discard the earlier array
						unset($this->where_clause);
					//$a=count($input_val); print(" $a <br/>");
				
					////while(list($key,$val)=each($input_val))
					foreach($input_val as $key => $val)
						{
								$this->where_clause[]= $key ." like '%".$val."%'"; 
						}
						
					$this->filter_sql="WHERE ". implode(" AND ", $this->where_clause);
					$this->filter_sql = $this->filter_sql;
				}
				else {
					trigger_error ("Input data is not an array.", E_USER_ERROR);
				}
		}

	  //Function To Set Values For Insert/Update Query
	     function query_string($input_val) {
	     	
			//If Already $this->sql_values is set discard the earlier array
			   unset($this->sql_values);
			 ////while(list($key,$val)=each($input_val))
			 foreach($input_val as $key => $val)
				{
				    $this->sql_values[]= $key ."='".$val."'"; 
				}

           $this->value_val=" SET ". implode(" , ", $this->sql_values);
	     }   
      //Function To Build Select Statement
	     function select_sql() {
	     	
			   $this->sql="SELECT * FROM ".$this->tablename ."  ".$this->filter_sql ."   ".$this->extra_sql;
	     }
      //Function To Build Select Statement
	     function select_sql_sort($table,$where,$orderby)
		 {
			   $this->sql="SELECT DISTINCT * FROM ".$table ." where ".$where ."  order by ".$orderby;
	     }
      //Function To Build Select Statement
		 function select_sql_sort_limit($table,$where,$orderby,$limit,$to_show)
		 {
			   $this->sql="SELECT DISTINCT * FROM ".$table ." where ".$where ." order by ".$orderby. " limit ".$to_show.",".$limit;
	     }
      //Function To Build Select Statement
		 function select_sql_sort_details($table,$where)
		 {
			   $this->sql="SELECT * FROM ".$table ." where ".$where;
	     }
      //Function To Build Select Statement
		 function select_sql_thebest($table,$select,$sum,$where,$groupby,$orderby,$limit,$to_show)
		 {
			   $this->sql="SELECT ".$select.",sum(".$sum.") as sum_select FROM ".$table ." group by ".$groupby." order by ".$orderby. " desc limit ".$to_show.",".$limit;
	     }
      //Special Function To Build Select Statement
	     function select_sql_filter($filter) {
	     
			   $this->sql="SELECT * FROM ".$this->tablename ." WHERE ".$filter."   ".$this->extra_sql;
	     }
      //Function To Build Update Statement
	     function insert_sql() {
	     	
			   $this->sql=" INSERT INTO ".$this->tablename ."  ".$this->value_val;
	     }
      //Function To Build Update Statement
	     function update_sql() {
	     	
			   $this->sql=" UPDATE ".$this->tablename ."  ".$this->value_val." ".$this->filter_sql;
	     }
      //Function To Build DELETE Statement
	     function delete_sql() {	     			              
			   $this->sql=" DELETE FROM ".$this->tablename ." ".$this->filter_sql;			   
	     }
      //Function To Build Select Count Statement
	     function select_count_sql() {
	     	
			   $this->sql="SELECT count(*) FROM ".$this->tablename ."  ".$this->filter_sql ."   ".$this->extra_sql;
	     }
	} 
?>