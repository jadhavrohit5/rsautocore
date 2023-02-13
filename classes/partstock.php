<?php
	
	class partstock
	{
		var $db; //Instance of The DB class
		
		//Class Constructer
		function __construct(){
			$this->db = new build_sql();
			$this->db->build_sql();
		}
		
		//Function to retrieve partstock details for display
		function get_partstock_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts_stock2 ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id DESC ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to count total
		function count_partstock()
		{
			$this->db->tablename = " tbl_rsa_parts_stock2 ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to count total 
		function count_partstock_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts_stock2 ";
			$this->db->where_clause($input_value);
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve partstock order by requestid for display
		function get_partstock($limit,$to_show,$input_value="")
		{
			$this->db->tablename = " tbl_rsa_parts_stock2 ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id DESC LIMIT $limit,$to_show";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func
		  
		//Function to update partstock
		function update_partstock($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_parts_stock2 ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
//			echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to delete partstock
		function delete_partstock($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts_stock2 ";
			$this->db->where_clause($input_value);
			$this->db->delete_sql();
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//Function to add new partstock
		function add_partstock($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts_stock2 ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
//			echo $this->db->sql . "<BR>";
//			exit;
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//---------------------------------------------------------------------//

		//Function for export sales/purchase data
		function get_partstock_export_data_avg($ptype)
		{
			$pdata = array();
			$j=0;
			$today = date("Y-m-d");
			$startday = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d"), date("Y")-1));

			//$my_qry  = "SELECT p.id, p.rsac, IFNULL(SUM(sp.po_quantity), 0) as purchased, IFNULL(SUM(sp.so_quantity), 0) as sold, IFNULL(SUM(sp.po_price), 0) as purchaseprice, IFNULL(SUM(sp.so_price), 0) as saleprice FROM tbl_rsa_parts p ";  
			$my_qry  = "SELECT p.id, p.rsac, IFNULL(SUM(sp.po_quantity), 0) as purchased, IFNULL(SUM(sp.so_quantity), 0) as sold, IFNULL(SUM(sp.po_price*sp.po_quantity), 0) as purchaseprice, IFNULL(SUM(sp.so_price*sp.so_quantity), 0) as saleprice FROM tbl_rsa_parts p ";  
			$my_qry .= " LEFT JOIN tbl_rsa_parts_stock2 sp on sp.partid = p.id AND sp.ord_date >= '" . $startday . "' ";  
			$my_qry .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = '" . addslashes($ptype) . "' "; 
			$my_qry .= " GROUP BY p.id "; 
			$my_qry .= " ORDER BY p.id ASC "; 

			//echo "<br>".$my_qry;
			//exit;

			$this->db->sql_query($my_qry);
			if($this->db->sql_numrows()>0) {
				$parts=$this->db->sql_fetchrowset();

				for($i=0;$i<count($parts);$i++){
					//$pdata[$j][] = $parts[$i]['id'];
					$pdata[$j][] = stripslashes($parts[$i]['rsac']);
					$pdata[$j][] = $parts[$i]['purchased'];
					$pdata[$j][] = $parts[$i]['sold'];
					if (($parts[$i]['purchaseprice']) > 0 && ($parts[$i]['purchased'] > 0)){
						$pdata[$j][]=number_format($parts[$i]['purchaseprice']/$parts[$i]['purchased'], 2, '.', '');
					} else {
						$pdata[$j][]=0.00;
					}
					if (($parts[$i]['saleprice']) > 0 && ($parts[$i]['sold'] > 0)){
						$pdata[$j][]=number_format($parts[$i]['saleprice']/$parts[$i]['sold'], 2, '.', '');
					} else {
						$pdata[$j][]=0.00;
					}

					$pdata[$j][] = $parts[$i]['purchased'] - $parts[$i]['sold'];
					$j++;
				}
		
			}
			return $pdata;
		} // end func

		//---------------------------------------------------------------------//

		//Function to count search results from part ids
		function count_partstock_sales_data($ptype,$startday)
		{
			$my_qry  = "SELECT DISTINCT id FROM tbl_rsa_parts WHERE status = '1' AND is_deleted = '0' AND part_type = '" . addslashes($ptype) . "' ";  
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			return $this->db->sql_numrows();
		} // end func


		//Function to retrieve sales/purchase data
		function get_partstock_sales_data_avg($limit,$to_show,$ptype,$startday)
		{
			//$my_qry  = "SELECT p.id, p.rsac, IFNULL(SUM(sp.po_quantity), 0) as purchased, IFNULL(SUM(sp.so_quantity), 0) as sold, IFNULL(SUM(sp.po_price), 0) as purchaseprice, IFNULL(SUM(sp.so_price), 0) as saleprice FROM tbl_rsa_parts p ";  
			$my_qry  = "SELECT p.id, p.rsac, IFNULL(SUM(sp.po_quantity), 0) as purchased, IFNULL(SUM(sp.so_quantity), 0) as sold, IFNULL(SUM(sp.po_price*sp.po_quantity), 0) as purchaseprice, IFNULL(SUM(sp.so_price*sp.so_quantity), 0) as saleprice FROM tbl_rsa_parts p ";  
			$my_qry .= " LEFT JOIN tbl_rsa_parts_stock2 sp on sp.partid = p.id AND sp.ord_date >= '" . $startday . "' ";  
			$my_qry .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = '" . addslashes($ptype) . "' "; 
			$my_qry .= " GROUP BY p.id "; 
			$my_qry .= " ORDER BY p.id ASC LIMIT " . $limit . "," . $to_show;
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func

		//Function to retrieve sales/purchase data - NOT IN USE
		function get_partstock_sales_data($limit,$to_show,$ptype,$startday)
		{
			$my_qry  = "SELECT p.id, p.rsac, IFNULL(SUM(pp.quantity), 0) as purchased, IFNULL(SUM(sp.quantity), 0) as sold, IFNULL(SUM(pp.price), 0) as purchaseprice, IFNULL(SUM(sp.price), 0) as saleprice FROM tbl_rsa_parts p ";  
			$my_qry .= " LEFT JOIN tbl_rsa_parts_stock pp on (pp.partid = p.id and pp.is_purchase = '1' AND pp.ord_date >= '" . $startday . "') ";  
			$my_qry .= " LEFT JOIN tbl_rsa_parts_stock sp on (sp.partid = p.id and sp.is_sale = '1' AND sp.ord_date >= '" . $startday . "') ";  
			$my_qry .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = '" . addslashes($ptype) . "' ";  
			$my_qry .= " GROUP BY p.id "; 
			$my_qry .= " ORDER BY p.id ASC LIMIT " . $limit . "," . $to_show;
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func

		//---------------------------------------------------------------------//

		//Function to export sales/purchase data - NOT IN USE
		function get_partstock_export_data($ptype)
		{
			$pdata = array();
			$j=0;
			$today = date("Y-m-d");
			$startday = date('Y-m-d', mktime(0, 0, 0, date("m"), date("d"), date("Y")-1));

			$my_qry  = "SELECT p.id, p.rsac, IFNULL(SUM(pp.quantity), 0) as purchased, IFNULL(SUM(sp.quantity), 0) as sold, IFNULL(SUM(pp.price), 0) as purchaseprice, IFNULL(SUM(sp.price), 0) as saleprice FROM tbl_rsa_parts p ";  
			$my_qry .= " LEFT JOIN tbl_rsa_parts_stock pp on (pp.partid = p.id and pp.is_purchase = '1' AND pp.ord_date >= '" . $startday . "') ";  
			$my_qry .= " LEFT JOIN tbl_rsa_parts_stock sp on (sp.partid = p.id and sp.is_sale = '1' AND sp.ord_date >= '" . $startday . "') ";  
			$my_qry .= " WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = '" . addslashes($ptype) . "' ";  
			$my_qry .= " GROUP BY p.id "; 
			$my_qry .= " ORDER BY p.id ASC "; 

			//echo "<br>".$my_qry;
			//exit;

			$this->db->sql_query($my_qry);
			if($this->db->sql_numrows()>0) {
				$parts=$this->db->sql_fetchrowset();

				for($i=0;$i<count($parts);$i++){
					//$pdata[$j][] = $parts[$i]['id'];
					$pdata[$j][] = stripslashes($parts[$i]['rsac']);
					$pdata[$j][] = number_format($parts[$i]['purchased']);
					$pdata[$j][] = number_format($parts[$i]['sold']);
					//$pdata[$j][] = number_format($parts[$i]['purchaseprice'], 2, '.', '');
					//$pdata[$j][] = number_format($parts[$i]['saleprice'], 2, '.', '');
					if (($parts[$i]['purchaseprice']) > 0 && ($parts[$i]['purchased'] > 0)){
						$pdata[$j][]=number_format($parts[$i]['purchaseprice']/$parts[$i]['purchased'], 2, '.', '');
					} else {
						$pdata[$j][]=0.00;
					}
					if (($parts[$i]['saleprice']) > 0 && ($parts[$i]['sold'] > 0)){
						$pdata[$j][]=number_format($parts[$i]['saleprice']/$parts[$i]['sold'], 2, '.', '');
					} else {
						$pdata[$j][]=0.00;
					}

					$pdata[$j][] = number_format($parts[$i]['purchased'] - $parts[$i]['sold']);
					$j++;
				}
		
			}
			return $pdata;
		} // end func

		//---------------------------------------------------------------------//


		function con_close(){
			$this->db->sql_close();
		}
		//---------------------------------------------------------------------//
	
	} // end class 
?>