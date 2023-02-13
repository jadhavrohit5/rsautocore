<?php
	function pobe_session_start()
	{
		return session_start();
	}
	
	function pobe_session_name($name = '') 
	{
		if (!empty($name)) {
			return session_name($name);
		} else {
			return session_name();
		}
	}
  
	function pobe_session_register($name, $value) 
	{
		return isset($_SESSION[$name]) ? $_SESSION[$name] : "";
	} 
 
	function pobe_session_unregister($name)
	{
		unset($_SESSION[$name]);
	}

	function pobe_session_save_path($path = '') 
	{
		if (!empty($path)) {
			return session_save_path($path);
		} else {
			return session_save_path();
		}
	}
?>