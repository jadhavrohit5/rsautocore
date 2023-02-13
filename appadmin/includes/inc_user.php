<?php
	require('../config.php');

	// Include DB classes
	require("db_class.php"); 

	// Include general functions
	require('general.php');

	// Include session functions
	require('sessions.php');
	
	// Start the Session
	pobe_session_start();
	$session_started = true;

	include("build_sql.php"); 
?>