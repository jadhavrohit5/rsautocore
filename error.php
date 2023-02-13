<?php
include('includes/inc_user.php');

if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
	unset($_SESSION['user_id']);			
	pobe_session_unregister('user_id');      //session_destroy();	
	pobe_session_unregister('adminnm');      //session_destroy();	
	pobe_session_unregister('admintp');      //session_destroy();	
}
$_SESSION['global_logged_in'] = "false";
$_SESSION['user_id'] = "";
$_SESSION['adminnm'] = "";
$_SESSION['admintp'] = md5(time());
$_SESSION['userac'] = md5(time());
?>
<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset=utf-8>
    <meta http-equiv=X-UA-Compatible content=IE=edge>
    <title>Error</title>
    <meta name=viewport content=width=1040>
    <link href=https://fonts.googleapis.com/css?family=Roboto:300 rel=stylesheet>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            background-color: #EDEDED;
            font-family: Roboto, sans-serif;
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            text-align: center;
            margin: 0;
        }

        h1 {
            margin: 0 0 8px 0;
            color: #FF0000;
            font-size: 24px;
            font-weight: 300;
        }

        p {
            margin: 0;
            color: #FF0000;
            font-size: 18px;
            font-weight: 300;
        }

        .wrap {
            display: table;
            width: 100%;
            height: 100%;
        }

        .inner {
            display: table-cell;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class=wrap>
        <div class=inner>
            <h1>ERROR</h1>
            <p>Unauthorized Access</p>
			<p>&nbsp;</p>
			<p><a href="index.php" title="BACK">Back to login page</p>
        </div>
    </div>
</body>
</html>


