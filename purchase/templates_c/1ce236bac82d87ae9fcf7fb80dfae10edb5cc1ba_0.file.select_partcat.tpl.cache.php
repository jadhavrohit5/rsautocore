<?php
/* Smarty version 3.1.30, created on 2023-02-13 21:00:39
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/select_partcat.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eaa4f79d8eb0_41628219',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ce236bac82d87ae9fcf7fb80dfae10edb5cc1ba' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/select_partcat.tpl',
      1 => 1649402139,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63eaa4f79d8eb0_41628219 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '141657770363eaa4f79cb872_52794256';
?>
<div class="pageheading">
	<h3>All Categories</h3>
	<p>Select a part type from the following categories</p>
</div>
<div id="parttype_catlist">
	<ul>
		<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['myparttypelist']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
		<?php if ($_smarty_tpl->tpl_vars['myparttypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['chk'] == '1') {?>
		<li>
			<div class="item">
				<div class="thumb"><a href="search.php?type=<?php echo $_smarty_tpl->tpl_vars['myparttypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['typeid'];?>
"><span class="img"><img src="catphotos/<?php echo $_smarty_tpl->tpl_vars['myparttypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['partimg'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['myparttypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttype'];?>
"></span></a></div>
				<div class="title"><a href="search.php?type=<?php echo $_smarty_tpl->tpl_vars['myparttypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['typeid'];?>
"><?php echo $_smarty_tpl->tpl_vars['myparttypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttype'];?>
</a></div>
			</div>
		</li>
		<?php }?>
		<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?> 
	</ul>
</div>

<?php }
}
