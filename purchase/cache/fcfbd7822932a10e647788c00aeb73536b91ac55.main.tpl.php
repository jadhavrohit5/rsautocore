<?php
/* Smarty version 3.1.30, created on 2023-02-13 21:00:39
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eaa4f79ed808_46565238',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c112242cb0691f98f5258e8ab845302cd27fb9fe' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/main.tpl',
      1 => 1649411560,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63eaa4f79ed808_46565238 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Select Part Type - Sony AutoParts</title>
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
<!--[if lt IE 9]>
  <script src="js/html5shiv.min.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->

<!--[if lt IE 8]><div style='clear: both; text-align:center; position: relative; background:#333;'><a href="//windows.microsoft.com/en-us/internet-explorer/download-ie" style="color:#fff;">You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.</a></div>
<![endif]-->


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


<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="js/magnific-popup/magnific-popup.css">
<!-- Magnific Popup core JS file -->
<script src="js/magnific-popup/jquery.magnific-popup.min.js"></script>


<script type="text/javascript">
	jQuery( document ).ready( function ( $ ) {
		//Popup image
		$( '.image-link' ).magnificPopup( {
			type: 'image',

			image: {
				verticalFit: true,
				titleSrc: function ( item ) {
					return item.el.attr( 'data-title' );
				}
			}
		} );
	} );
</script>

</head>
<body>
<header id="header">
	<div class="container">
		<div class="logo"><a href="#"><img src="images/logo.png" align="" alt="" /></a></div>
		<div id="headerRight"><a href="order_list.php" class="minicart"><span>Cart</span><img src="images/cart-icon.png" /><em>0</em></a></div>
	</div>
	<div class="menu">
		<ul>
			<li><a href="home.php">Home <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
			<li class="logout"><a href="logout.php">Logout <i class="fa fa-power-off" aria-hidden="true"></i></a></li>
		</ul>
	</div>
</header>
<div id="main">
<div class="back_row">
	<div class="container"><!-- <a href="home.php" class="back_btn"><i class="fa fa-angle-left"></i> Back</a> --></div>
</div>
<!-- <div class="select_partcat"> -->
<div class="select_partcat">	<div class="container">
	<div class="pageheading">
	<h3>All Categories</h3>
	<p>Select a part type from the following categories</p>
</div>
<div id="parttype_catlist">
	<ul>
						<li>
			<div class="item">
				<div class="thumb"><a href="search.php?type=1"><span class="img"><img src="catphotos/Steering_Pump.jpg" alt="Steering Pumps"></span></a></div>
				<div class="title"><a href="search.php?type=1">Steering Pumps</a></div>
			</div>
		</li>
								<li>
			<div class="item">
				<div class="thumb"><a href="search.php?type=2"><span class="img"><img src="catphotos/Brake_Caliper.jpg" alt="Brake Calipers"></span></a></div>
				<div class="title"><a href="search.php?type=2">Brake Calipers</a></div>
			</div>
		</li>
												<li>
			<div class="item">
				<div class="thumb"><a href="search.php?type=4"><span class="img"><img src="catphotos/RHD_Steering_rack.jpg" alt="RHD Steering"></span></a></div>
				<div class="title"><a href="search.php?type=4">RHD Steering</a></div>
			</div>
		</li>
								<li>
			<div class="item">
				<div class="thumb"><a href="search.php?type=5"><span class="img"><img src="catphotos/EGR_Valve.jpg" alt="EGR Valves"></span></a></div>
				<div class="title"><a href="search.php?type=5">EGR Valves</a></div>
			</div>
		</li>
								<li>
			<div class="item">
				<div class="thumb"><a href="search.php?type=6"><span class="img"><img src="catphotos/Diesel_Injector.jpg" alt="Diesel Injectors"></span></a></div>
				<div class="title"><a href="search.php?type=6">Diesel Injectors</a></div>
			</div>
		</li>
								<li>
			<div class="item">
				<div class="thumb"><a href="search.php?type=7"><span class="img"><img src="catphotos/Diesel_Pump.jpg" alt="Diesel Pumps"></span></a></div>
				<div class="title"><a href="search.php?type=7">Diesel Pumps</a></div>
			</div>
		</li>
								<li>
			<div class="item">
				<div class="thumb"><a href="search.php?type=8"><span class="img"><img src="catphotos/Drive_shaft.jpg" alt="Driveshafts"></span></a></div>
				<div class="title"><a href="search.php?type=8">Driveshafts</a></div>
			</div>
		</li>
								<li>
			<div class="item">
				<div class="thumb"><a href="search.php?type=9"><span class="img"><img src="catphotos/Turbocharger.jpg" alt="Turbocharger"></span></a></div>
				<div class="title"><a href="search.php?type=9">Turbocharger</a></div>
			</div>
		</li>
								<li>
			<div class="item">
				<div class="thumb"><a href="search.php?type=10"><span class="img"><img src="catphotos/AC_Compressor.jpg" alt="AC Compressor"></span></a></div>
				<div class="title"><a href="search.php?type=10">AC Compressor</a></div>
			</div>
		</li>
								<li>
			<div class="item">
				<div class="thumb"><a href="search.php?type=11"><span class="img"><img src="catphotos/Alternator.jpg" alt="Alternator"></span></a></div>
				<div class="title"><a href="search.php?type=11">Alternator</a></div>
			</div>
		</li>
								<li>
			<div class="item">
				<div class="thumb"><a href="search.php?type=12"><span class="img"><img src="catphotos/Starter_Motor.jpg" alt="Starter Motor"></span></a></div>
				<div class="title"><a href="search.php?type=12">Starter Motor</a></div>
			</div>
		</li>
				 
	</ul>
</div>

<!-- MAIN CONTENT -->
	</div>
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
		<div id="back_top"><a href="#header"><i class="fa fa-angle-up" aria-hidden="true"></i></a></div>
	</div>
</footer>

</body>
</html><?php }
}
