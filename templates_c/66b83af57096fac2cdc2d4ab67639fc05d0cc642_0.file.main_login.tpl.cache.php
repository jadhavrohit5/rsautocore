<?php
/* Smarty version 3.1.30, created on 2023-02-13 23:09:19
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/main_login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eac31fc12dd9_03754265',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66b83af57096fac2cdc2d4ab67639fc05d0cc642' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/main_login.tpl',
      1 => 1546831422,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63eac31fc12dd9_03754265 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '147586099263eac31fc0ce71_61179833';
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
<div id="main">
<?php echo $_smarty_tpl->tpl_vars['MAIN_CONTENT']->value;?>
<!-- MAIN CONTENT -->
</div>
<!-- Footer Start----------->
<footer id="footer">   
	<p>&copy; <?php echo date('Y');?>
 Sony AutoParts. All Rights Reserved.</p>        
</footer>
<!-- Footer end----------->
</body>
</html><?php }
}
