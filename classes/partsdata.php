<?php
	
	class partsdata
	{
		var $db; //Instance of The DB class
		
		//Class Constructer
		function __construct(){
			$this->db = new build_sql();
			$this->db->build_sql();
		}
		
		//Function to retrieve partsdata details for display
		function get_partsdata_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id ASC ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to count total
		function count_partsdata()
		{
			$this->db->tablename = " tbl_rsa_parts ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to count total 
		function count_partsdata_details($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts ";
			$this->db->where_clause($input_value);
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve partsdata order by requestid for display
		function get_partsdata($limit,$to_show,$input_value="")
		{
			$this->db->tablename = " tbl_rsa_parts ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id ASC LIMIT $limit,$to_show";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func
		  
		//Function to update partsdata
		function update_partsdata($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_parts ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
//			echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to delete partsdata
		function delete_partsdata($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts ";
			$this->db->where_clause($input_value);
			$this->db->delete_sql();
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//Function to add new partsdata
		function add_partsdata($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
//			echo $this->db->sql . "<BR>";
//			exit;
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//---------------------------------------------------------------------//

		//Function to count total by group - added on 03-01-2023 
		function count_partsdata_details_bygroup($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts ";
			$this->db->where_clause($input_value);
			$this->db->extra_sql=" GROUP BY group_rsac ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve partsdata order by groups - added on 03-01-2023 
		function get_partsdata_bygroup($limit,$to_show,$input_value="")
		{
			$this->db->tablename = " tbl_rsa_parts ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" GROUP BY group_rsac ORDER BY id ASC LIMIT $limit,$to_show";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			if($this->db->sql_numrows()>0) return 1;
			else return 0;
		} // end func
		  
		//---------------------------------------------------------------------//

		//Function to retrieve part details for display
		function get_partsdata_more($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts_more ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id ASC ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to add part details
		function add_partsdata_more($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts_more ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
//			echo $this->db->sql . "<BR>";
//			exit;
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//---------------------------------------------------------------------//

		//Function to retrieve part customer references for display
		function get_partsdata_cref($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts_customerref ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY crid ASC ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to update partsdata
		function update_partsdata_cref($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_parts_customerref ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
//			echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to add part customer references
		function add_partsdata_cref($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts_customerref ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
//			echo $this->db->sql . "<BR>";
//			exit;
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//---------------------------------------------------------------------//

		//Function to retrieve part image and desc for display
		function get_partsdata_desc($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts_desc ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id ASC ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to update partsdata
		function update_partsdata_desc($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_parts_desc ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
//			echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to add part image and desc
		function add_partsdata_desc($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts_desc ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
//			echo $this->db->sql . "<BR>";
//			exit;
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//---------------------------------------------------------------------//

		function count_partsdata_oeref($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts_oeref ";
			$this->db->where_clause($input_value);
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			//exit;
			$this->db->sql_query($this->db->sql);
			return $this->db->sql_numrows();
		} // end func

		//Function to retrieve oe/oem references for display
		function get_partsdata_oeref($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts_oeref ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id ASC ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to update partsdata
		function update_partsdata_oeref($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_parts_oeref ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
//			echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to add oe/oem references
		function add_partsdata_oeref($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts_oeref ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
//			echo $this->db->sql . "<BR>";
//			exit;
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//---------------------------------------------------------------------//
		//	added on 04-01-2021 
		//---------------------------------------------------------------------//

		//Function to retrieve partstype details for display
		function get_partsdata_parttype($input_value)
		{
			$this->db->tablename = " tbl_rsa_part_type ";
			if($input_value!="") $this->db->where_clause($input_value);
			$this->db->extra_sql=" ORDER BY id ASC ";
			$this->db->select_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function 

		//Function to update partsdata - for import
		function update_partsdata_import($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_parts ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to update partsdata - import
		function update_partsdata_oeref_import($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_parts_oeref ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//Function to add oe/oem references - import
		function add_partsdata_oeref_import($input_value)
		{
			$this->db->tablename = " tbl_rsa_parts_oeref ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		// added on 23-01-2023 
		function update_partsdata_import_stock($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_oe_stock_data ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//---------------------------------------------------------------------//
		//---------------------------------------------------------------------//

		//Function to update partsdata - for import
		function update_partsdata_import_pt($partid, $parttype, $rsac, $make, $manufacturer, $model, $years, $location, $a_grade, $b_grade, $target_stock, $sell_price, $pa_type, $pulley_size, $bar_pressure, $piston_mm, $pad_gap, $f_r, $cast, $purchase_price, $length, $turns, $trod_threadsize, $pinion_length, $pinion_type, $pulley_grooves, $pulley_type, $plug_pins, $weight, $bolt_diameter, $pinhole_diameter, $sensor, $notes, $dateposted)
		{
			//UPDATE tbl_rsa_parts SET make='Renault' , manufacturer='TRW' , model='Megane (BM0/1, CM0/1)/ Scenic (JM0/1)/ Grand Scenic (JM0/1)' , years='2003 - ' , location='YB-6, YB-7' , a_grade='100' , b_grade='0' , target_stock='100' , sell_price='5' , type='' , pulley_size='' , bar_pressure='' , piston_mm='' , pad_gap='' , f_r='' , cast='' , purchase_price='' , length='216mm' , turns='' , trod_threadsize='14mm' , pinion_length='' , pinion_type='' , pulley_grooves='' , pulley_type='' , plug_pins='' , weight='0.84kg' , bolt_diameter='' , pinhole_diameter='' , sensor='' , notes='' , last_updated='2021-02-11 16:43:04' WHERE id='11487' AND rsac='TR041M' AND part_type='12' 
			$my_qry  = "UPDATE tbl_rsa_parts SET ";
			if (isset($make) && trim($make) != '')  {
				$my_qry .= "make='".addslashes($make)."', ";
			} 
			if (isset($manufacturer) && trim($manufacturer) != '')  {
				$my_qry .= "manufacturer='".addslashes($manufacturer)."', ";
			} 
			if (isset($model) && trim($model) != '')  {
				$my_qry .= "model='".addslashes($model)."', ";
			} 
			if (isset($years) && trim($years) != '')  {
				$my_qry .= "years='".addslashes($years)."', ";
			} 
			if (isset($location) && trim($location) != '')  {
				$my_qry .= "location='".addslashes($location)."', ";
			} 
			if (isset($a_grade) && ($a_grade > 0)) {
				$my_qry .= "a_grade='".addslashes($a_grade)."', ";
			} 
			if (isset($b_grade) && ($b_grade > 0)) {
				$my_qry .= "b_grade='".addslashes($b_grade)."', ";
			} 
			if (isset($target_stock) && ($target_stock > 0)) {
				$my_qry .= "target_stock='".addslashes($target_stock)."', ";
			} 
			if (isset($sell_price) && ($sell_price > 0)) {
				$my_qry .= "sell_price='".addslashes($sell_price)."', ";
			} 
			if (isset($pa_type) && trim($pa_type) != '')  {
				$my_qry .= "type='".addslashes($pa_type)."', ";
			} 
			if (isset($pulley_size) && trim($pulley_size) != '')  {
				$my_qry .= "pulley_size='".addslashes($pulley_size)."', ";
			} 
			if (isset($bar_pressure) && trim($bar_pressure) != '')  {
				$my_qry .= "bar_pressure='".addslashes($bar_pressure)."', ";
			} 
			if (isset($piston_mm) && trim($piston_mm) != '')  {
				$my_qry .= "piston_mm='".addslashes($piston_mm)."', ";
			} 
			if (isset($pad_gap) && trim($pad_gap) != '')  {
				$my_qry .= "pad_gap='".addslashes($pad_gap)."', ";
			} 
			if (isset($f_r) && trim($f_r) != '')  {
				$my_qry .= "f_r='".addslashes($f_r)."', ";
			} 
			if (isset($cast) && trim($cast) != '')  {
				$my_qry .= "cast='".addslashes($cast)."', ";
			} 
			if (isset($purchase_price) && trim($purchase_price) != '')  {
				$my_qry .= "purchase_price='".addslashes($purchase_price)."', ";
			} 
			if (isset($length) && trim($length) != '')  {
				$my_qry .= "length='".addslashes($length)."', ";
			} 
			if (isset($turns) && trim($turns) != '')  {
				$my_qry .= "turns='".addslashes($turns)."', ";
			} 
			if (isset($trod_threadsize) && trim($trod_threadsize) != '')  {
				$my_qry .= "trod_threadsize='".addslashes($trod_threadsize)."', ";
			} 
			if (isset($pinion_length) && trim($pinion_length) != '')  {
				$my_qry .= "pinion_length='".addslashes($pinion_length)."', ";
			} 
			if (isset($pinion_type) && trim($pinion_type) != '')  {
				$my_qry .= "pinion_type='".addslashes($pinion_type)."', ";
			} 
			if (isset($pulley_grooves) && trim($pulley_grooves) != '')  {
				$my_qry .= "pulley_grooves='".addslashes($pulley_grooves)."', ";
			} 
			if (isset($pulley_type) && trim($pulley_type) != '')  {
				$my_qry .= "pulley_type='".addslashes($pulley_type)."', ";
			} 
			if (isset($plug_pins) && trim($plug_pins) != '')  {
				$my_qry .= "plug_pins='".addslashes($plug_pins)."', ";
			} 
			if (isset($weight) && trim($weight) != '')  {
				$my_qry .= "weight='".addslashes($weight)."', ";
			} 
			if (isset($bolt_diameter) && trim($bolt_diameter) != '')  {
				$my_qry .= "bolt_diameter='".addslashes($bolt_diameter)."', ";
			} 
			if (isset($pinhole_diameter) && trim($pinhole_diameter) != '')  {
				$my_qry .= "pinhole_diameter='".addslashes($pinhole_diameter)."', ";
			} 
			if (isset($sensor) && trim($sensor) != '')  {
				$my_qry .= "sensor='".addslashes($sensor)."', ";
			} 
			if (isset($notes) && trim($notes) != '')  {
				$my_qry .= "notes='".addslashes($notes)."', ";
			} 
			$my_qry .= " last_updated='".$dateposted."' WHERE id='".addslashes($partid)."' AND rsac='".addslashes($rsac)."' AND part_type='".addslashes($parttype)."' ";
			//echo $my_qry . "<BR>";
			$this->db->sql_query($my_qry);
			return 1; 
		}// end func

		//---------------------------------------------------------------------//
		//---------------------------------------------------------------------//

		//Function to get part ids for advance search results
		function get_partsdata_export_data($ptype, $partoptt, $custoptt, $oeoemopt)
		{
			$pdata = array();
			$j=0;
			$part_opt = explode(",", $partoptt);
			$cust_opt = explode(",", $custoptt);

			$my_qry  = "SELECT p.id as partid, p.rsac, p.manufacturer, p.make, p.model, p.years, p.a_grade, p.b_grade, p.location, p.target_stock, p.sell_price, oe.oe_number, oe.oem_number, p.notes, p.type, p.pulley_size, p.bar_pressure, p.piston_mm, p.pad_gap, p.f_r, p.cast ";
			foreach ($cust_opt as $cust) {
			$my_qry .= " , cr".$cust.".crdata as crd".$cust;
			}
			$my_qry .= " FROM tbl_rsa_parts p ";
			$my_qry .= "LEFT JOIN tbl_rsa_parts_oeref oe on oe.partid = p.id ";
			foreach ($cust_opt as $cust) {
			$my_qry .= "LEFT JOIN tbl_rsa_parts_customerref cr".$cust." on cr".$cust.".partid = p.id AND cr".$cust.".custid = '" . addslashes($cust) . "' ";
			}
			$my_qry .= "WHERE p.status = '1' AND p.is_deleted = '0' AND p.part_type = '" . addslashes($ptype) . "'  "; 
			$my_qry .= "GROUP BY p.id ";
			$my_qry .= "ORDER BY p.id ASC ";

			//echo "<br>".$my_qry;
			//exit;

			$this->db->sql_query($my_qry);
			if($this->db->sql_numrows()>0) {
				$parts=$this->db->sql_fetchrowset();

				for($i=0;$i<count($parts);$i++){
					//$pdata[$j][] = $parts[$i]['partid'];
					$pdata[$j][] = stripslashes($parts[$i]['rsac']);
					$pdata[$j][] = stripslashes($parts[$i]['manufacturer']);
					$pdata[$j][] = stripslashes($parts[$i]['make']);
					$pdata[$j][] = stripslashes($parts[$i]['model']);
					$pdata[$j][] = stripslashes($parts[$i]['years']);
					$pdata[$j][] = stripslashes($parts[$i]['a_grade']);
					$pdata[$j][] = stripslashes($parts[$i]['b_grade']);
					$pdata[$j][] = stripslashes($parts[$i]['location']);
					$pdata[$j][] = stripslashes($parts[$i]['target_stock']);
					$pdata[$j][] = stripslashes($parts[$i]['sell_price']);
					if ($oeoemopt == '1') {
						$pdata[$j][] = stripslashes($parts[$i]['oe_number']);
						$pdata[$j][] = stripslashes($parts[$i]['oem_number']);
					}
					$pdata[$j][] = stripslashes($parts[$i]['notes']);

					foreach ($part_opt as $item) {
						if ($item == "type") $pdata[$j][] = stripslashes($parts[$i]['type']);
						if ($item == "pulley_size") $pdata[$j][] = stripslashes($parts[$i]['pulley_size']);
						if ($item == "bar_pressure") $pdata[$j][] = stripslashes($parts[$i]['bar_pressure']);
						if ($item == "piston_mm") $pdata[$j][] = stripslashes($parts[$i]['piston_mm']);
						if ($item == "pad_gap") $pdata[$j][] = stripslashes($parts[$i]['pad_gap']);
						if ($item == "f_r") $pdata[$j][] = stripslashes($parts[$i]['f_r']);
						if ($item == "cast") $pdata[$j][] = stripslashes($parts[$i]['cast']);
					}

					foreach ($cust_opt as $cust) {
//---------------------------------------------------------------------//
						$pdata[$j][] = stripslashes($parts[$i]["crd".$cust]);
//---------------------------------------------------------------------//
					}

					$j++;
				}
		
			}
			return $pdata;
		} // end func

		//---------------------------------------------------------------------//

		// added on 26-01-2022 
		function add_partsdata_attr($input_value)
		{
			$this->db->tablename = " tbl_rsa_attributes_data ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
//			echo $this->db->sql . "<BR>";
//			exit;
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		//---------------------------------------------------------------------//
	
		// added on 08-01-2023 
		function add_partsdata_oe_stock($input_value)
		{
			$this->db->tablename = " tbl_rsa_oe_stock_data ";
			$this->db->query_string($input_value);
			$this->db->insert_sql();
//			echo $this->db->sql . "<BR>";
//			exit;
			$this->db->sql_query($this->db->sql);
			return 1;
		}//end function

		// added on 08-01-2023 
		function update_partsdata_oe_stock($input_value,$input_val)
		{
			$this->db->tablename = " tbl_rsa_oe_stock_data ";
			$this->db->query_string($input_value);
			$this->db->where_clause($input_val);
			$this->db->update_sql();
			//echo $this->db->sql . "<BR>";
			$this->db->sql_query($this->db->sql);
			return 1; 
		}// end func

		//---------------------------------------------------------------------//
	
		function con_close(){
			$this->db->sql_close();
		}
		//---------------------------------------------------------------------//
	
	} // end class 
?>