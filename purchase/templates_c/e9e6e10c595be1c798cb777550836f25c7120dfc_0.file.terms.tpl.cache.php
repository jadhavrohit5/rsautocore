<?php
/* Smarty version 3.1.30, created on 2023-02-13 17:09:56
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/terms.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea6ee4b88f75_65070383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9e6e10c595be1c798cb777550836f25c7120dfc' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/terms.tpl',
      1 => 1649472916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63ea6ee4b88f75_65070383 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '157841905163ea6ee4b841b0_68615577';
?>
<div id="adminBody">
	<div class="order row">
		<div class="purchase-order">
			<h3>Terms and Cookie Policy</h3>
			<p>Please accept our Terms & Conditions and Cookie Policy to continue.</p>
		</div>
		<div class="text_align_left">
			<p><strong>Terms And Conditions</strong></p>
			<p>These Terms and Conditions are the standard terms that apply to the use of our Website.</p>
			<p>Please read these Terms and Conditions carefully and ensure that you understand them - you will need to agree that you have read and accepted them before purchasing Services from us. If you do not agree to comply with and be bound by these Terms and Conditions, you will not be able to order from us.</p>
			<p>This website uses cookies to ensure you get the best experience on our website.</p>
			<p><strong>Our Use of Cookies</strong></p>
			<p>Our Site may place and access certain first party Cookies on your computer or device. First party Cookies are those placed directly by us and are used only by us. All Cookies used by and on our Site are used in accordance with current Cookie Law.</p>
			<p>Before Cookies are placed on your computer or device, we need your consent to set those Cookies. By giving your consent to the placing of Cookies, you are enabling us to provide the best possible experience and service to you.</p>
			<p>You can choose to delete Cookies on your computer or device at any time, however you may lose any information that enables you to access our Site more quickly and efficiently.</p>
		</div>
		<div class="text_align_center">
			<form name="" action="terms.php" method="post" class="validate">
				<p class="redText"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
				<p>
				<button type="submit" name="submit" class="button rs_btn" style="max-width: 250px;" >Accept</button>
				</p>
				<input type="hidden" name="pageaction" value="acceptterms">
				<input type="hidden" name="newtoken" value="<?php echo $_smarty_tpl->tpl_vars['newtoken']->value;?>
">
			</form>
		</div>
	</div>
</div>
<!--  --><?php }
}
