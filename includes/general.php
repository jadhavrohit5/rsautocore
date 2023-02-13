<?php

	// Make sure all $_POST data is run through stripslashes
	function pobe_check_input($data)
	{
		if ($data) {
			if (get_magic_quotes_gpc()) {
				if (is_array($data)) {
					foreach ($data as $key => $value) {
						$array[$key] = stripslashes($value);
					}
					return $array;
				} else {
					return stripslashes($data);
				}
			} else {
				return $data;
			}
		} else {
			return "";
		}
	}

  	// Return a random value
	function pobe_rand($min = null, $max = null) {
   	static $seeded;

    	if (!isset($seeded)) {
      	mt_srand((double)microtime()*1000000);
      	$seeded = true;
    	}

    	if (isset($min) && isset($max)) {
      	if ($min >= $max) {
        		return $min;
      	} else {
        		return mt_rand($min, $max);
      	}
    	} else {
      	return mt_rand();
    	}
  	}
  	
  	// Rewrite date
  	function pobe_format_date($date)
  	{
  		if(!empty($date) && $date != '0000-00-00') {
			$date = date('Y-m-d', strtotime(str_replace('-','/', $date)));
  			list($year, $month, $day) = explode("-", $date);
  			$new_date = date("jS F", mktime(0, 0, 0, $month, $day)) . ", " . $year;
  		} else {
  			$new_date = "";
  		}
  		
  		return $new_date;
  	}
  	
  	function pobe_format_dt($date)
  	{
  		if(!empty($date) && $date != '0000-00-00') {
			$date = date('Y-m-d', strtotime(str_replace('-','/', $date)));
  			list($year, $month, $day) = explode("-", $date);
  			$new_date = date("jS M", mktime(0, 0, 0, $month, $day)) . ", " . $year;
  		} else {
  			$new_date = "";
  		}
  		
  		return $new_date;
  	}
  	
   	function pobe_format_full_date($date)
  	{
  		if(!empty($date) && $date != '0000-00-00 00:00:00') {
  			list($dt1, $dt2) = explode(" ", $date);
  			list($year, $month, $day) = explode("-", $dt1);
   			list($hour, $min, $sec) = explode(":", $dt2);
 			$new_date = date("jS F g:i A", mktime($hour,  $min, $sec, $month, $day, $year));
  		} else {
  			$new_date = "";
  		}
  		
  		return $new_date;
  	}
  	
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
  	
   	function pobe_format_long_to_sort_date($date)
  	{
  		if(!empty($date) && $date != '0000-00-00 00:00:00') {
  			list($dt1, $dt2) = explode(" ", $date);
  			list($year, $month, $day) = explode("-", $dt1);
 			$new_date = date("Y-m-d", mktime(0, 0, 0, $month, $day, $year));
  		} else {
  			$new_date = "";
  		}
  		
  		return $new_date;
  	}
  	
 	function pobe_format_fullmonth($date)
  	{
  		if(!empty($date) && $date != '0000-00-00') {
  			list($year, $month, $day) = explode("-", $date);
  			$new_date = date("j F", mktime(0, 0, 0, $month, $day)) . ", " . $year;
  		} else {
  			$new_date = "";
  		}
  		
  		return $new_date;
  	}
  	
  	function pobe_format_sortmonth($date)
  	{
  		if(!empty($date) && $date != '0000-00-00') {
  			list($year, $month, $day) = explode("-", $date);
  			$new_date = date("j M", mktime(0, 0, 0, $month, $day, $year)) . ", " . $year;
 		} else {
  			$new_date = "";
  		}
  		
  		return $new_date;
  	}
  	  	
  	// Rewrite date
  	function pobe_format_datetime($date)
  	{
  		if(!empty($date) && $date != '0000-00-00 00:00:00') {
  			list($dt1, $dt2) = explode(" ", $date);
  			list($year, $month, $day) = explode("-", $dt1);
  			$new_date = date("jS F", mktime(0, 0, 0, $month, $day)) . ", " . $year;
  		} else {
  			$new_date = "";
  		}
  		
  		return $new_date;
  	}
  	
  	// Rewrite date
  	function pobe_format_full_datetime($date)
  	{
  		if(!empty($date) && $date != '0000-00-00 00:00:00') {
  			list($dt1, $dt2) = explode(" ", $date);
  			list($year, $month, $day) = explode("-", $dt1);
   			list($hour, $min, $sec) = explode(":", $dt2);
 			$new_date = date("jS M, Y g:i A", mktime($hour,  $min, $sec, $month, $day, $year));
  		} else {
  			$new_date = "";
  		}
  		
  		return $new_date;
  	}
  	
  	// Rewrite date
  	function pobe_format_schedule_date($date)
  	{
  		if(!empty($date) && $date != '0000-00-00') {
  			list($year, $month, $day) = explode("-", $date);
  			$new_date = date("l jS F", mktime(0, 0, 0, $month, $day)) . ", " . $year;
  		} else {
  			$new_date = "";
  		}
  		
  		return $new_date;
  	}
  	
  	// Format text from DB
  	function pobe_output($string)
  	{
   	$string = str_replace("\n", "<br />", $string);
    	$string = stripslashes($string);
    	
    	return $string;
  	}

	// Drop down calender with specified time period 
	function pobe_date_drop_down($size, $selected_date)
	{
		for ($i = 0; $i <= $size; $i++) 
		{
			$theday = mktime(0, 0, 0, date("m"), date("d")+$i, date("Y"));
			$option = date("D M j, Y", $theday);
			$value  = date("Y-m-d", $theday);
			$dow    = date("D", $theday);
			
			if ($value == $selected_date) 
			{
				$selected = "SELECTED";
			} 
			else 
			{
				$selected = "";
			}
				
			echo "<option value=\"$value\" $selected>$option</option>\n";
		}
		
	}

	function age_now($birth_date) {
	  list($year,$mon,$day) = explode("-",$birth_date);
	  $today = getdate(time());
	  // find the difference in the years of the two dates
	  $yeardiff = $today['year'] - $year;
	  // if the current date occurs before the birthday, subtract one
	  $birth_jd = gregoriantojd($mon,$day,$today['year']);
	  $today_jd = gregoriantojd($today['mon'],$today['mday'],$today['year']);
	  if ($today_jd < $birth_jd) {
		$yeardiff--;
	  }
	  return($yeardiff);
	} 

  	// date difference - added on 8/12/2013
	function timedifference($start,$end=false)
	{
		$return = array();

		try {
			$start = new DateTime($start);
			$end = new DateTime($end);
			$form = $start->diff($end);
		} catch (Exception $e){
			return $e->getMessage();
		}

		$display = array('y'=>'year',
			'm'=>'month',
			'd'=>'day',
			'h'=>'hour',
			'i'=>'minute',
			's'=>'second');
		foreach($display as $key => $value){
			if ($value == "day"){
				$return[] = $form->$key.' '.($form->$key > 1 ? $value.'s' : $value);
			}
			if ($value == "hour"){
				$return[] = $form->$key.' '.($form->$key > 1 ? $value.'s' : $value);
			}
			if ($value == "minute"){
				$return[] = $form->$key.' '.($form->$key > 1 ? $value.'s' : $value);
			}
		}
		//print_r($return);
		if ($return[0] > 0){
			return $return[0];
		} elseif ($return[1] < 1){
			return $return[2];
		} elseif ($return[1] < 24){
			return $return[1];
		}  
	}


?>