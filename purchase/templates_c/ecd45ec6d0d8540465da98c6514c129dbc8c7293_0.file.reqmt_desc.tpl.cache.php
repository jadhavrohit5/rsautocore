<?php
/* Smarty version 3.1.30, created on 2023-02-13 17:36:33
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/reqmt_desc.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea752120f070_07237939',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ecd45ec6d0d8540465da98c6514c129dbc8c7293' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/reqmt_desc.tpl',
      1 => 1649470571,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63ea752120f070_07237939 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '177474442363ea7521206154_39584211';
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
		<p><img src="images/thumbs-up.png" alt=""/></p>
		<p class="fontsize20">Required Quantity: <?php echo $_smarty_tpl->tpl_vars['myreqqty']->value;?>
</p>
		<p class="fontsize20">Our Purchase Price: <?php echo $_smarty_tpl->tpl_vars['vdrcur']->value;
echo $_smarty_tpl->tpl_vars['pprice']->value;?>
</p>
	</div>
	<div class="text_align_center">
		<form name="" action="reqmt_desc.php?type=<?php echo $_smarty_tpl->tpl_vars['parttype']->value;?>
&schid=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['partid']->value;?>
" method="post" class="validate">
			<p class="redText"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
			<p>Total I will supply</p>
			<p><input name="supplyqty" type="text" class="input onlyNumber req text_align_center"  required style="max-width: 350px; font-size: 20px;" value="<?php echo $_smarty_tpl->tpl_vars['supplyqty']->value;?>
" /><p>
			<button type="submit" name="purchase" class="button rs_btn" style="max-width: 250px;" >Enter Purchase</button>
			</p>
			<input type="hidden" name="pageaction" value="partsupply">
			<input type="hidden" name="requirqty" value="<?php echo $_smarty_tpl->tpl_vars['reqqty']->value;?>
">
			<input type="hidden" name="partprice" value="<?php echo $_smarty_tpl->tpl_vars['pprice']->value;?>
">
			<input type="hidden" name="part_rsac" value="<?php echo $_smarty_tpl->tpl_vars['ptrsac']->value;?>
">
		</form>
	</div>
	<div class="text_align_center row">
		<p>Search results for <strong class="yelloText"><?php echo $_smarty_tpl->tpl_vars['searchkey']->value;?>
</strong></p>
		<p><a href="search_results.php?type=<?php echo $_smarty_tpl->tpl_vars['parttype']->value;?>
&schid=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
" class="button rs_btn new_search_btn" style="width: 100%; max-width: 250px;">Back to Search Results</a></p>
	</div>
</div>
<?php }
}
