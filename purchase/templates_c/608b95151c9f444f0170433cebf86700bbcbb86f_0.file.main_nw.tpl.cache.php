<?php
/* Smarty version 3.1.30, created on 2023-02-13 19:19:00
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/main_nw.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea8d24850269_40434608',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '608b95151c9f444f0170433cebf86700bbcbb86f' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/main_nw.tpl',
      1 => 1649441737,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63ea8d24850269_40434608 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '4197897063ea8d2484c0b4_87402376';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<link rel="stylesheet" type="text/css" href="css/jk-grid100.css"/>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-migrate-3.0.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-ui-1.12.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/default.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/validate.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/jk_lightbox/lightbox.js"><?php echo '</script'; ?>
>
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
  <?php echo '<script'; ?>
 src="js/html5shiv.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="js/respond.min.js"><?php echo '</script'; ?>
>
<![endif]-->

<!--[if lt IE 8]><div style='clear: both; text-align:center; position: relative; background:#333;'><a href="//windows.microsoft.com/en-us/internet-explorer/download-ie" style="color:#fff;">You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.</a></div>
<![endif]-->


<?php echo '<script'; ?>
 type="text/javascript">
	jQuery( document ).ready( function ( $ ) {
		$( document ).tooltip( {
			items: '.tooltip',
			content: function () {
				return $( this ).prop( 'title' )
			}
		} );
	} );
<?php echo '</script'; ?>
>


<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="js/magnific-popup/magnific-popup.css">
<!-- Magnific Popup core JS file -->
<?php echo '<script'; ?>
 src="js/magnific-popup/jquery.magnific-popup.min.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript">
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
<?php echo '</script'; ?>
>

</head>
<body>
<header id="header">
	<div class="container">
		<div class="logo"><a href="#"><img src="images/logo.png" align="" alt="" /></a></div>
		<div id="headerRight"><a href="order_list.php" class="minicart"><span>Cart</span><img src="images/cart-icon.png" /><em><?php echo $_smarty_tpl->tpl_vars['numofcartitems']->value;?>
</em></a></div>
	</div>
	<div class="menu">
		<ul>
			<li><a href="home.php">Home <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
			<li class="logout"><a href="logout.php">Logout <i class="fa fa-power-off" aria-hidden="true"></i></a></li>
		</ul>
	</div>
</header>
<div id="main">
<?php if ($_smarty_tpl->tpl_vars['pagenm']->value == "search_home") {?><div class="search_home"><?php }
if ($_smarty_tpl->tpl_vars['pagenm']->value == "search_bynum") {?><div class="search_bynum"><?php }?>
	<div class="container">
	<?php echo $_smarty_tpl->tpl_vars['MAIN_CONTENT']->value;?>
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
