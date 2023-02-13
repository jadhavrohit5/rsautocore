<?php
/* Smarty version 3.1.30, created on 2023-02-11 10:05:50
  from "/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e7687eb83025_76854025',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd4b540fa77b44808fa4eb39e571631b0d782673' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/main.tpl',
      1 => 1647318208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e7687eb83025_76854025 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '101062521263e7687eb7dac3_27791333';
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
 type="text/javascript" src="js/jk-sidebar-menu.js"><?php echo '</script'; ?>
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
<?php echo '<script'; ?>
 type="text/javascript">var ADMIN_ROOT = ''; var ROOT = ''; var VIEW = ''; var ACT = ''; var TASK = ''; var ID = ''; <?php echo '</script'; ?>
>
<link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>

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

<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="js/magnific-popup/magnific-popup.css">
<!-- Magnific Popup core JS file -->
<?php echo '<script'; ?>
 src="js/magnific-popup/jquery.magnific-popup.min.js"><?php echo '</script'; ?>
>
	

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

</head>
<body>
<header id="header">
	<a href="#" class="sidebar-toggle close"><span>Toggle navigation</span></a>
	<div class="logo"><a href="#"><img src="images/logo.png" align="" alt="" /></a>
	</div>
	<div class="sitename"></div>
	<div id="headerRight"> <span class="c">Welcome <?php echo $_smarty_tpl->tpl_vars['usertypename']->value;?>
</span> <!-- <a href="#"> Manage Profile</a> --> |  <a href="logout.php" class="logout"> Logout <i class="fa fa-power-off"></i></a>
	</div>
</header>
<aside id="sidebar-left">
	<div class="sidebar-menu">
		<h3>MAIN NAVIGATION</h3>
		<ul class="menu">
			<li <?php if ($_smarty_tpl->tpl_vars['mainpage']->value == "manage_site") {?> class="active" <?php }?>><a href="#"><span><i class="fa fa-user"></i> Admin</span></a>
				<ul>			
					<li <?php if ($_smarty_tpl->tpl_vars['subpage']->value == "users_mgmt") {?> class="active" <?php }?>><a href="users_mgmt.php?mode=show"><span><i class="fa fa-users"></i>Manage Users</span></a></li>
					<li <?php if ($_smarty_tpl->tpl_vars['subpage']->value == "purchase_mgmt") {?> class="active" <?php }?>><a href="purchase_mgmt.php?mode=show"><span><i class="fa fa-address-book"></i>Manage Purchases</span></a></li>
					<li <?php if ($_smarty_tpl->tpl_vars['subpage']->value == "users_activities") {?> class="active" <?php }?>><a href="users_activities.php?mode=show"><span><i class="fa fa-bar-chart"></i>Users Activities</span></a></li>
					<li <?php if ($_smarty_tpl->tpl_vars['subpage']->value == "export_po") {?> class="active" <?php }?>><a href="export_po_data.php?mode=show"><span><i class="fa fa-bar-chart"></i>Export PO By Supplier</span></a></li>
					<li <?php if ($_smarty_tpl->tpl_vars['subpage']->value == "onway_data_mgmt") {?> class="active" <?php }?>><a href="onway_data_mgmt.php?mode=show"><span><i class="fa fa-bar-chart"></i>Manage On-way Data</span></a></li><!--  -->
				</ul>
			</li>
		</ul>
	</div>
</aside> 
<div id="main">
<?php echo $_smarty_tpl->tpl_vars['MAIN_CONTENT']->value;?>
<!-- MAIN CONTENT -->
</div>
<footer id="footer">   
	<p>&copy; <?php echo date('Y');?>
 Sony AutoParts. All Rights Reserved.</p>        
</footer>
</body>
</html><?php }
}
