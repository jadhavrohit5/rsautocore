<?php
/* Smarty version 3.1.30, created on 2023-02-13 19:18:25
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/home.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea8d0120d901_04891702',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4bda75819eb63295894b0f73ab7c40295bb09c8d' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/home.tpl',
      1 => 1649395928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63ea8d0120d901_04891702 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '87527245563ea8d01200754_04619292';
?>
<div id="pageBlock">
	<?php if ($_smarty_tpl->tpl_vars['schopt_rs']->value == '1') {?>
	<div class="search_by">
		<h3>Search by <strong>OE/OEM Number <br>
		or Reference Number</strong></h3>
		<a href="select_partcat.php" class="button rs_btn rs_btn_small">Search by Reference Number</a> 
	</div>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['schopt_td']->value == '1') {?>
	<div class="search_by">
		<h3>Search by <strong>Number Plate / <br>
		Vehicle Registration Number</strong></h3>
		<a href="search_bynum.php" class="button rs_btn rs_btn_small">SEARCH BY NUMBER PLATE</a>
	</div>
	<?php }?>
</div>
<?php }
}
