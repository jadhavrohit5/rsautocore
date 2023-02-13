<?php
if(!defined("SQL_LAYER"))
{

define("SQL_LAYER","mysqli");

//class sql_db_connect extends dbConnect 
class sql_db_connect  
{

	var $db_connect_id ="";
	var $query_result;
	var $num_queries = 0;
	var $row = array();
	var $rowset = array();

	var $query_id = 0;

	//function __construct(){
	//	$this->db = new dbConnect();
	//}

	// Constructor

	function sql_db($sqlserver=DB_HOST, $sqluser=DB_USERNAME, $sqlpassword=DB_PASSWORD, $database=DB_NAME, $persistency = true)
	{
		$this->persistency = $persistency;
		$this->user = $sqluser;
		$this->password = $sqlpassword;
		$this->server = $sqlserver;
		$this->dbname = $database;

		if($this->persistency)
		{
			$this->server = 'p:'.$this->server;
		}

		$this->db_connect_id = @mysqli_connect($this->server, $this->user, $this->password);
		if($this->db_connect_id)
		{
			if($database != "")
			{
				$this->dbname = $database;
				$dbselect = mysqli_select_db($this->db_connect_id, $this->dbname);
				if(!$dbselect)
				{
					mysqli_close($this->db_connect_id);
					$this->db_connect_id = $dbselect;
				}
			}
			return $this->db_connect_id;
		}
		else
		{
			echo "Connection to mySQL failed!";
			exit;
		}
	}

	//
	// Other base methods
	//
	function sql_close()
	{
		if($this->db_connect_id)
		{
			if($this->query_result)
			{
				@mysqli_free_result($this->query_result);
			}
			$result = mysqli_close($this->db_connect_id);
			return $result;
		}
		else
		{
			return false;
		}
	}

	//
	// Base query method
	//
	function sql_query($query = "", $transaction = FALSE)
	{
		// Remove any pre-existing queries
		unset($this->query_result);
		if($query != "")
		{
			//nt_common_add_debug($query);
			$this->num_queries++;
			$this->query_result = @mysqli_query($this->db_connect_id, $query);
			if (!($this->db_connect_id instanceof mysqli)) {
				var_dump($this->db_connect_id);
				var_dump($query, $this);
			}
		}
		if($this->query_result)
		{
			return $this->query_result;
		}
		else
		{
			return ( $transaction == 'END_TRANSACTION' ) ? true : false;
		}
	}

	function sql_select_db($dbname)
	{
		if($this->db_connect_id)
		{
			$result = mysqli_select_db($this->db_connect_id, $dbname);
			return $result;
		}
		return false;
	}
	function sql_reselect_db()
	{
		if($this->db_connect_id)
		{
			$result = mysqli_select_db($this->db_connect_id, $this->dbname);
			return $result;
		}
		return false;
	}
	//
	// Other query methods
	//
	function sql_numrows($query_id = 0)
	{
		if(!$query_id)
		{
			$query_id = $this->query_result;
		}
		if($query_id)
		{
			$result = mysqli_num_rows($query_id);
			return $result;
		}
		else
		{
			return false;
		}
	}
	function sql_affectedrows()
	{
		if($this->db_connect_id)
		{
			$result = mysqli_affected_rows($this->db_connect_id);
			return $result;
		}
		else
		{
			return false;
		}
	}
	function sql_numfields($query_id = 0)
	{
		if(!$query_id)
		{
			$query_id = $this->query_result;
		}
		if($query_id)
		{
			$result = mysqli_num_fields($query_id);
			return $result;
		}
		else
		{
			return false;
		}
	}
	// function sql_fieldname($query_id = 0){}
	// function sql_fieldtype($offset, $query_id = 0){}
	function sql_fetchrow($query_id = 0)
	{
		if(!$query_id)
		{
			$query_id = $this->query_result;
		}
		if($query_id)
		{
			return mysqli_fetch_array($query_id);
		}
		else
		{
			return false;
		}
	}
	function sql_fetchrowset($query_id = 0)
	{
		if(!$query_id)
		{
			$query_id = $this->query_result;
		}
		if($query_id)
		{
			while($row = mysqli_fetch_array($query_id))
			{
				$result[] = $row;
			}
			return $result;
		}
		else
		{
			return false;
		}
	}
	// function sql_fetchfield($field, $rownum = -1, $query_id = 0){}
	// function sql_rowseek($rownum, $query_id = 0){}
	function sql_nextid(){
		if($this->db_connect_id)
		{
			$result = mysqli_insert_id($this->db_connect_id);
			return $result;
		}
		else
		{
			return false;
		}
	}
	function sql_freeresult($query_id = 0){
		if(!$query_id)
		{
			$query_id = $this->query_result;
		}

		if ( $query_id )
		{
			@mysqli_free_result($query_id);

			return true;
		}
		else
		{
			return false;
		}
	}
	function sql_error($query_id = 0)
	{
		$result["message"] = mysqli_error($this->db_connect_id);
		$result["code"] = mysqli_errno($this->db_connect_id);

		return $result;
	}

////////////////////////////////////////////////////////////////////////////////////////////////////////////

		function query($query)
		{
			$this->db_connect_id = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

			if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
   
			// Remove any pre-existing queries
			unset($this->query_result);

			$this->query_result = mysqli_query($this->db_connect_id, $query);
			//echo "query=>".$query."<=<BR>";
			
			if(!$this->query_result) {
				$this->handle_error("query", mysqli_error($this->db_connect_id));
			}
		}
		
		function fetch_array()
		{
			return mysqli_fetch_array($this->query_result, MYSQLI_ASSOC);
		}

		function get_last_id() {
			return @mysqli_insert_id($this->db_connect_id);
		}
		
		function get_num_rows() {
			return mysqli_num_rows($this->query_result);
		}

  		function input($string) 
  		{
  			$string = trim($string);
    		$string = addslashes($string);
  			$string = str_replace('"', "'", $string);  			
  			return $string;
  		}
		
  		function prepare_input($string) 
  		{
    		if (is_string($string)) {
      		return trim($this->sanitize_string(stripslashes($string)));
    		} elseif (is_array($string)) {
      		reset($string);
      		while (list($key, $value) = each($string)) {
        			$string[$key] = prepare_input($value);
      		}
      		return $string;
    		} else {
      		return $string;
    		}
  		}
		
		function handle_error($type, $error)
		{
			// Redirect to error page
			die("There has been an error with the last " . $type . ": " . $error);
		}
////////////////////////////////////////////////////////////////////////////////////////////////////////////

} // class sql_db


} // if ... define

?>