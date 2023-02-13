<?php
/* Smarty version 3.1.30, created on 2023-02-13 11:06:39
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/errorpage.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea19bfd9b8e8_67855024',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '514f1ac938f3ff6405adfe6e609d074ffbfea9f9' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/errorpage.tpl',
      1 => 1582080394,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63ea19bfd9b8e8_67855024 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '205459529463ea19bfd96a20_23220048';
?>
<div id="adminBody">
	<div class="search_page row">
		<div class="search_results text_align_center">
			<h3 style="margin-top: 15px;">ERROR</h3>
			<p><img src="images/error.png" alt=""/></p>
			<p class="fontsize20" style="padding:10px 0 30px 0;"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
			<p><a href="index.php" class="button btn_gray" style="width: 100%; max-width: 150px;"><i class="fa fa-chevron-left" ></i> &nbsp; Back to Home</a></p>
		</div>
	</div>
</div><?php }
}
