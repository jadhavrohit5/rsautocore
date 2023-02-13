<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{$title}</title>
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<link rel="stylesheet" type="text/css" href="css/jk-grid100.css"/>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-3.0.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.12.1.min.js"></script>
<script type="text/javascript" src="js/jk-sidebar-menu.js"></script>
<script type="text/javascript" src="js/default.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/jk_lightbox/lightbox.js"></script>
<script type="text/javascript">var ADMIN_ROOT = ''; var ROOT = ''; var VIEW = ''; var ACT = ''; var TASK = ''; var ID = ''; </script>
<link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
{literal}<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
<![endif]-->{/literal}

<!--[if lt IE 8]><div style='clear: both; text-align:center; position: relative; background:#333;'><a href="//windows.microsoft.com/en-us/internet-explorer/download-ie" style="color:#fff;">You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.</a></div>
<![endif]-->

{literal}
<script type="text/javascript">
	jQuery( document ).ready( function ( $ ) {
		$( document ).tooltip( {
			items: '.tooltip',
			content: function () {
				return $( this ).prop( 'title' )
			}
		} );
	} );
</script>
{/literal}
</head>
<body>
<div id="main">
{$MAIN_CONTENT}<!-- MAIN CONTENT -->
</div>
<!-- Footer Start----------->
<footer id="footer">   
	<p>&copy; {date('Y')} Sony AutoParts. All Rights Reserved.</p>        
</footer>
<!-- Footer end----------->
</body>
</html>