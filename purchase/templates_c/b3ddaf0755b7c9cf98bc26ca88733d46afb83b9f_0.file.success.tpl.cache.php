<?php
/* Smarty version 3.1.30, created on 2023-02-13 17:36:39
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/success.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea7527c4ad79_15342870',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b3ddaf0755b7c9cf98bc26ca88733d46afb83b9f' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/success.tpl',
      1 => 1649406335,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63ea7527c4ad79_15342870 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '140289118363ea7527c43aa7_38142186';
?>
<div class="pageheading">&nbsp;</div>
<div class="order">
	<div class="purchase-order">
		<h3>Your PO <strong class="yelloText bold"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</strong></h3>
		<p class="fontsize20" style="padding:10px 0 30px 0;">Your purchase offer successfully posted.</p>
	</div>
	<div class="text_align_center">
		<p><a href="home.php" class="button rs_btn rs_back_btn" style="max-width: 250px;">Back to Home</a></p>
	</div>
	<p>&nbsp;</p>
	<div class="text_align_center">
		<p><a href="logout.php" class="button btn_gray uppercase" style="width: 100%; max-width: 250px;">Logout</a></p>
	</div>
</div>
<?php }
}
