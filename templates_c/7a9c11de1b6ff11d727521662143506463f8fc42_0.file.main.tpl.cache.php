<?php
/* Smarty version 3.1.30, created on 2023-02-14 00:22:10
  from "/Applications/XAMPP/xamppfiles/htdocs/rsautocore/templates/main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eac6229181d3_92850954',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a9c11de1b6ff11d727521662143506463f8fc42' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/rsautocore/templates/main.tpl',
      1 => 1676330039,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63eac6229181d3_92850954 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '91777431163eac6229077c4_00092591';
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
			<li <?php if ($_smarty_tpl->tpl_vars['mainpage']->value == "parts") {?> class="active" <?php }?>><a href="parts.php?mode=show&type=<?php echo $_smarty_tpl->tpl_vars['parttypelist']->value[0]['typeid'];?>
"><span><i class="fa fa-cogs"></i> Parts</span></a>
				<ul>					
					<?php
$__section_i_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['parttypelist']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total != 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
					<li <?php if ($_smarty_tpl->tpl_vars['parttypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['typeid'] == $_smarty_tpl->tpl_vars['ptype']->value) {?> class="active" <?php }?>><a href="parts.php?mode=show&type=<?php echo $_smarty_tpl->tpl_vars['parttypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['typeid'];?>
"><span><i class="fa fa-circle-o"></i><?php echo $_smarty_tpl->tpl_vars['parttypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttype'];?>
</span></a></li>
					<?php
}
}
if ($__section_i_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_1_saved;
}
?>
				</ul>
			</li>
			<li <?php if ($_smarty_tpl->tpl_vars['mainpage']->value == "manage_site") {?> class="active" <?php }?>><a href="#"><span><i class="fa fa-user"></i> Admin</span></a>
				<ul>			
					<li <?php if ($_smarty_tpl->tpl_vars['subpage']->value == "add_part") {?> class="active" <?php }?>><a href="add_part.php?mode=show"><span><i class="fa fa-plus-square-o"></i>Add New Part</span></a></li>
					<?php if ($_smarty_tpl->tpl_vars['usertypename']->value == "Main Admin User") {?>
					<li <?php if ($_smarty_tpl->tpl_vars['subpage']->value == "add_part_type") {?> class="active" <?php }?>><a href="add_part_type.php?mode=show"><span><i class="fa fa-plus-square-o"></i>Add New Part Category</span></a></li>
					<li <?php if ($_smarty_tpl->tpl_vars['subpage']->value == "manage_part_type") {?> class="active" <?php }?>><a href="manage_part_type.php?mode=show"><span><i class="fa fa-plus-square-o"></i>Manage Part Categories</span></a></li>
					<li <?php if ($_smarty_tpl->tpl_vars['subpage']->value == "manage_customers") {?> class="active" <?php }?>><a href="manage_customers.php?mode=show"><span><i class="fa fa-address-book"></i>Manage Customers</span></a></li>
					<li <?php if ($_smarty_tpl->tpl_vars['subpage']->value == "manage_attributes") {?> class="active" <?php }?>><a href="manage_attributes.php?mode=show"><span><i class="fa fa-address-book"></i>Manage Attributes</span></a></li>
					<li <?php if ($_smarty_tpl->tpl_vars['subpage']->value == "users_mgmt") {?> class="active" <?php }?>><a href="users_mgmt.php?mode=show"><span><i class="fa fa-users"></i>Manage Users</span></a></li>
					<li <?php if ($_smarty_tpl->tpl_vars['subpage']->value == "manage_podata") {?> class="active" <?php }?>><a href="manage_podata.php?mode=show"><span><i class="fa fa-address-book"></i>Manage PO/SO</span></a></li>
					<?php }?>
				</ul>
			</li>
			<li <?php if ($_smarty_tpl->tpl_vars['mainpage']->value == "manage_reports") {?> class="active" <?php }?>><a href="#"><span><i class="fa fa-bar-chart"></i> Reports</span></a>
				<ul>
					<li><a href="sales_data_report.php?mode=show"><span><i class="fa fa-circle-o"></i>Sales Data Reports</span></a></li>
				</ul>			
			</li>			
			<li <?php if ($_smarty_tpl->tpl_vars['mainpage']->value == "manage_imports") {?> class="active" <?php }?>><a href="#"><span><i class="fa fa-cloud-download"></i> Imports</span></a>
				<ul>
					<li <?php if ($_smarty_tpl->tpl_vars['subpage']->value == "import_sales_data") {?> class="active" <?php }?>><a href="import_sales_data.php?mode=show"><span><i class="fa fa-circle-o"></i>Import Sales Data</span></a></li>
					<li <?php if ($_smarty_tpl->tpl_vars['subpage']->value == "import_purchase_data") {?> class="active" <?php }?>><a href="import_purchase_data.php?mode=show"><span><i class="fa fa-circle-o"></i>Import Purchases Data</span></a></li>	
					<li <?php if ($_smarty_tpl->tpl_vars['subpage']->value == "import_parts_data") {?> class="active" <?php }?>><a href="import_parts_data.php?mode=show"><span><i class="fa fa-circle-o"></i>Import Parts Data</span></a></li>	
				</ul>			
			</li>
			<li <?php if ($_smarty_tpl->tpl_vars['mainpage']->value == "export_partdata") {?> class="active" <?php }?>><a href="#"><span><i class="fa fa-bar-chart"></i> Export</span></a>
				<ul>
					<li><a href="export_select_type.php?mode=show"><span><i class="fa fa-circle-o"></i>Export Part Data</span></a></li>
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
