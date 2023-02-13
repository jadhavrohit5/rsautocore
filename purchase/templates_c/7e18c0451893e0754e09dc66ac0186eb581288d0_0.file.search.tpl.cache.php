<?php
/* Smarty version 3.1.30, created on 2023-02-13 17:36:25
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/search.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea75197d4341_21885299',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e18c0451893e0754e09dc66ac0186eb581288d0' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/search.tpl',
      1 => 1649402665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63ea75197d4341_21885299 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '162363618263ea75197ca203_53770331';
?>
<div class="pageheading">
	<div class="img"><img src="catphotos/<?php echo $_smarty_tpl->tpl_vars['ptypeph']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['ptypenm']->value;?>
" width="60"></div>
	<h3><?php echo $_smarty_tpl->tpl_vars['ptypenm']->value;?>
</h3>
	<p><?php if ($_smarty_tpl->tpl_vars['parttype']->value == 2) {?>Search by Reference or Casting Number<?php } else { ?>Search by Reference or OE/OEM Number<?php }?></p>
</div>
<div id="pageBlock" style="padding-top: 0;">
	<div class="search_by">
	<form name="search" action="search.php?type=<?php echo $_smarty_tpl->tpl_vars['parttype']->value;?>
" method="post" class="validate disable">
		<p class="redText"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
		<p class="uppercase"><?php if ($_smarty_tpl->tpl_vars['parttype']->value == 2) {?>Enter Reference or or Casting Number<?php } else { ?>Enter Reference or OE/OEM Number<?php }?></p>
		<p>
		<input name="ref_num" type="text" class="input" placeholder="E.g. 1234"/>
		</p>
		<div>
		<button type="submit" name="submit" class="button rs_btn">SEARCH</button>
		</div>
		<input type="hidden" name="pageaction" value="partsearch">
	</form>
	</div>
</div>
<?php }
}
