<?php
	
	class partspurchased
	{
		var $db; //Instance of The DB class
		
		//Class Constructer
		function __construct(){
			$this->db = new build_sql();
			$this->db->build_sql();
		}
		
		//Function to retrieve partspurchased details for display
		function get_partspurchased_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_offered_items_final ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id DESC ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to count total
		function count_partspurchased()
		{
			$this->db->tablename = " tbl_rsa_app_offered_items_final ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to count total 
		function count_partspurchased_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_offered_items_final ";
			$this->db->where_clause($input_value);
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve partspurchased order by requestid for display
		function get_partspurchased($limit,$to_show,$input_value="")
		{
			$this->db->tablename = " tbl_rsa_app_offered_items_final ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id DESC LIMIT $limit,$to_show";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func
		  
		//Function to update partspurchased
		function update_partspurchased($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_app_offered_items_final ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
//			echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to delete partspurchased
		function delete_partspurchased($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_offered_items_final ";
			$this->db->where_clause($input_value);
			$this->db->delete_sql();
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//Function to add new partspurchased
		function add_partspurchased($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_offered_items_final ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
//			echo $this->db->sql . "<BR>";
//			exit;
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//---------------------------------------------------------------------//

		//Function to retrieve partspurchased details for display
		function get_partspurchased_po_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_po_data ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY poid DESC ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to count total 
		function count_partspurchased_podata($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_po_data ";
			$this->db->where_clause($input_value);
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve partspurchased order by requestid for display
		function get_partspurchased_podata($limit,$to_show,$input_value="")
		{
			$this->db->tablename = " tbl_rsa_app_po_data ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY poid DESC LIMIT $limit,$to_show";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func
		  
		//Function to update partspurchased
		function update_partspurchased_podata($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_app_po_data ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
//			echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to delete partspurchased
		function delete_partspurchased_podata($input_value)
		{
			$this->db->tablename = " tbl_rsa_app_po_data ";
			$this->db->where_clause($input_value);
			$this->db->delete_sql();
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//---------------------------------------------------------------------//

		function pobe_format_sort_date($date)
		{
			if(!empty($date) && $date != '0000-00-00 00:00:00') {
				list($dt1, $dt2) = explode(" ", $date);
				list($year, $month, $day) = explode("-", $dt1);
				$new_date = date("d/m/Y", mktime(0, 0, 0, $month, $day, $year));
			} else {
				$new_date = "";
			}
			
			return $new_date;
		}

		//---------------------------------------------------------------------//

		//Function for download PO data
		function get_partspurchased_export_po_data($poid)
		{
			$podata = array();
			$j=0;

			$my_qry  = " SELECT op.id, po.userid, po.po_num, po.postdate, op.rsac_ref, op.offered_stock, op.offered_price, sp.contact_person FROM tbl_rsa_app_po_data po ";  
			$my_qry .= " LEFT JOIN tbl_rsa_app_offered_items_final op on op.po_num = po.po_num ";  
			$my_qry .= " LEFT JOIN tbl_rsa_app_users sp on sp.id = po.userid ";  
			$my_qry .= " WHERE po.poid = '" . addslashes($poid) . "' AND op.status = '1' AND op.is_deleted = '0' "; 
			$my_qry .= " ORDER BY op.id ASC "; 

			//echo "<br>".$my_qry;
			//exit;

			$this->db->sql_query($my_qry);
			if($this->db->sql_numrows()>0) {
				$parts=$this->db->sql_fetchrowset();

				for($i=0;$i<count($parts);$i++){
					$podata[$j][] = stripslashes($parts[$i]['po_num']);
					$podata[$j][] = stripslashes($parts[$i]['contact_person']);
					$podata[$j][] = stripslashes($parts[$i]['rsac_ref']);
					$podata[$j][] = stripslashes($parts[$i]['offered_stock']);
					$podata[$j][] = number_format($parts[$i]['offered_price'], 2, '.', '');
					$podata[$j][] = pobe_format_sort_date($parts[$i]['postdate']);
					$j++;
				}
		
			}
			return $podata;
		} // end func

		//---------------------------------------------------------------------//
 
		//Function to count PO by vendor 
		function count_partspurchased_podata_byvendor()
		{
			$my_qry = "SELECT userid,po_num,postdate FROM `tbl_rsa_app_po_data` where status = '1' AND is_deleted = '0' ";
			$my_qry .= " GROUP BY userid ORDER BY postdate DESC ";
			//echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve PO by vendor for display
		function get_partspurchased_podata_byvendor($limit,$to_show)
		{
			$my_qry = "SELECT userid,po_num,postdate FROM `tbl_rsa_app_po_data` where status = '1' AND is_deleted = '0' ";
			$my_qry .= " GROUP BY userid ORDER BY postdate DESC LIMIT " . $limit . "," . $to_show;
			///echo "=================================================<br><br>".$my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func  

		//---------------------------------------------------------------------//

		//Function for download PO data
		function get_partspurchased_export_po_byvendor($id)
		{
			$podata = array();
			$j=0;

			$my_qry  = " SELECT op.id, po.userid, po.po_num, po.postdate, op.rsac_ref, op.offered_stock, op.offered_price, sp.contact_person FROM tbl_rsa_app_po_data po ";  
			$my_qry .= " LEFT JOIN tbl_rsa_app_offered_items_final op on op.po_num = po.po_num ";  
			$my_qry .= " LEFT JOIN tbl_rsa_app_users sp on sp.id = po.userid ";  
			$my_qry .= " WHERE po.userid = '" . addslashes($id) . "' AND op.status = '1' AND op.is_deleted = '0' "; 
			$my_qry .= " ORDER BY op.id ASC "; 

			//echo "<br>".$my_qry;
			//exit;

			$this->db->sql_query($my_qry);
			if($this->db->sql_numrows()>0) {
				$parts=$this->db->sql_fetchrowset();

				for($i=0;$i<count($parts);$i++){
					$podata[$j][] = stripslashes($parts[$i]['po_num']);
					$podata[$j][] = stripslashes($parts[$i]['contact_person']);
					$podata[$j][] = stripslashes($parts[$i]['rsac_ref']);
					$podata[$j][] = stripslashes($parts[$i]['offered_stock']);
					$podata[$j][] = number_format($parts[$i]['offered_price'], 2, '.', '');
					$podata[$j][] = pobe_format_sort_date($parts[$i]['postdate']);
					$j++;
				}
		
			}
			return $podata;
		} // end func

		//---------------------------------------------------------------------//
		//---------------------------------------------------------------------//

		function update_partspurchased_delivery($ponum,$ctid)
		{
			$myupd_qry = "UPDATE tbl_rsa_app_offered_items_final SET is_delivered = '0' WHERE po_num = '" . $ponum . "' ";
			if(isset($ctid) && ($ctid != '')) {
			$myupd_qry.= " AND id NOT IN (" . $ctid . ")";
			}
			//echo "=================================================<br><br>".$myupd_qry . "<BR>";
			$this->db->sql_query($myupd_qry);
			return 1; 
		}// end func

		//---------------------------------------------------------------------//

		function con_close(){
			$this->db->sql_close();
		}
		//---------------------------------------------------------------------//
	
	} // end class 
?>