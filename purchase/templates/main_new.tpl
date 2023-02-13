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
<script type="text/javascript" src="js/default.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/jk_lightbox/lightbox.js"></script>
<link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>

<!--  -->
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="favicon-2/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="favicon-2/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="favicon-2/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="favicon-2/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="favicon-2/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="favicon-2/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="favicon-2/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="favicon-2/apple-touch-icon-152x152.png" />
<link rel="icon" type="image/png" href="favicon-2/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="favicon-2/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="favicon-2/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="favicon-2/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="favicon-2/favicon-128.png" sizes="128x128" />
<meta name="application-name" content="RS AUTO"/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="favicon-2/mstile-144x144.png" />
<meta name="msapplication-square70x70logo" content="favicon-2/mstile-70x70.png" />
<meta name="msapplication-square150x150logo" content="favicon-2/mstile-150x150.png" />
<meta name="msapplication-wide310x150logo" content="favicon-2/mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="favicon-2/mstile-310x310.png" />
<!--  -->

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
<header id="header">
	<div class="container">
		<div class="logo"><a href="#"><img src="images/logo.png" align="" alt="" /></a></div>
		<div id="headerRight">&nbsp;</div>
	</div>
	<div class="menu">
		<ul>
			<li><a href="home.php">Home <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
			{if $loggedin eq '1'}
			<li class="logout"><a href="logout.php">Logout <i class="fa fa-power-off" aria-hidden="true"></i></a></li>
			{/if}
		</ul>
	</div>
</header>
<div id="main">
<div class="container">
{$MAIN_CONTENT}<!-- MAIN CONTENT -->
</div>
</div>
<footer id="footer">
	<div class="container">
		<ul id="footer-nav">
			<li><a href="#">Privacy Statement</a></li>
			<li><a href="#">Disclaimer</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
		<div class="chat_icon"><a href="#"><img src="images/chat.png" align="" alt="" /></a></div>
		<div id="back_top"><a href="#heder"><i class="fa fa-angle-up" aria-hidden="true"></i></a></div>
	</div>
</footer>
</body>
</html>