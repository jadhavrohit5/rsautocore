<?php
/* Smarty version 3.1.30, created on 2023-02-11 09:46:56
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/reqmt_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e764101e8784_35194541',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e173ef44b2d509be8d454aacc7e4849cf569157' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/reqmt_data.tpl',
      1 => 1649470568,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e764101e8784_35194541 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '78460003863e764101e1bd7_56228866';
?>
<div class="pageheading">
	<div class="img"><img src="catphotos/<?php echo $_smarty_tpl->tpl_vars['ptypeph']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['ptypenm']->value;?>
" width="60"></div>
	<h3><?php echo $_smarty_tpl->tpl_vars['ptypenm']->value;?>
</h3>
</div>
<div class="order">
	<div class="text_align_center">
		<h3>RSAC Ref <strong class="greenText"><?php echo $_smarty_tpl->tpl_vars['ptrsac']->value;?>
</strong></h3>
		<p><img src="images/thumbs-down.png" alt=""/></p>
		<p class="fontsize20" style="padding:10px 0 30px 0;">Required Quantity: 0</p>
		<p>Search results for <strong class="yelloText"><?php echo $_smarty_tpl->tpl_vars['searchkey']->value;?>
</strong></p>
	</div>
	<div class="text_align_center row">
		<p><a href="search_results.php?type=<?php echo $_smarty_tpl->tpl_vars['parttype']->value;?>
&schid=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
" class="button rs_btn new_search_btn" style="width: 100%; max-width: 250px;">Back to Search Results</a></p>
	</div>
</div>
<?php }
}
