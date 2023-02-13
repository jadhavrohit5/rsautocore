<?php
/* Smarty version 3.1.30, created on 2023-02-13 17:36:37
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/order_list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea7525837503_34887357',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd202ad87fe23fedafb19f166bd3cf979cd5ba4ac' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/order_list.tpl',
      1 => 1649407628,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63ea7525837503_34887357 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '110566188163ea7525825ec9_58921283';
?>
<div class="pageheading">
	<h3>You have <strong class="yelloText"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</strong> items in your cart</h3>
	<p>This is the list you agree to supply... Click finalise Purchase to receive Purchase order</p>
	<p class="redText"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
</div>
<div class="order">
	<form name="" action="myoffers.php" method="post" class="validate">
		<?php if ($_smarty_tpl->tpl_vars['total']->value > 0) {?>
		<div class="chart" style="overflow: auto;">
			<table border="0" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th>Part Type</th>
						<th>RSAC</th>
						<th>Search</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Total</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['gsoffrcnt']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
					<tr>
						<td align="center"><?php echo $_smarty_tpl->tpl_vars['gsoffrcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttype'];?>
</td>
						<td align="center"><?php if ($_smarty_tpl->tpl_vars['gsoffrcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pphoto'] != '') {?><a href="<?php echo $_smarty_tpl->tpl_vars['gsoffrcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pphoto'];?>
" class="image-link" data-title="<?php echo $_smarty_tpl->tpl_vars['gsoffrcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rsac_ref'];?>
" data-source=""><?php echo $_smarty_tpl->tpl_vars['gsoffrcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rsac_ref'];?>
</a><?php } else {
echo $_smarty_tpl->tpl_vars['gsoffrcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rsac_ref'];
}?></td>
						<td align="center"><?php echo $_smarty_tpl->tpl_vars['gsoffrcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['oenumber'];?>
</td>
						<td align="center"><?php echo $_smarty_tpl->tpl_vars['vdrcur']->value;
echo $_smarty_tpl->tpl_vars['gsoffrcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['buyprice'];?>
</td>
						<td align="center"><?php echo $_smarty_tpl->tpl_vars['gsoffrcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['ofrstock'];?>
</td>
						<td align="left">&nbsp;<?php echo $_smarty_tpl->tpl_vars['vdrcur']->value;
echo $_smarty_tpl->tpl_vars['gsoffrcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['ofrprice'];?>
</td>
						<td align="center" class="action"><a href="order_list.php?id=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
&carid=<?php echo $_smarty_tpl->tpl_vars['carid']->value;?>
&itmid=<?php echo $_smarty_tpl->tpl_vars['gsoffrcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['offrid'];?>
&pageaction=delete" class="tooltip" title="Remove"><i class="fa fa-trash-o" ></i></a></td>
					</tr>
					<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?> 
				</tbody>
			</table>
		</div>
		<?php }?> 
		<div class="text_align_center row" style="padding: 20px 0;">
			<?php if ($_smarty_tpl->tpl_vars['total']->value > 0) {?>
			<p>
			<button type="submit" name="purchase" class="button rs_btn" style="max-width: 250px;" >Enter Purchase</button>
			</p>
			<p class="fontsize24 text_align_center">OR</p>
			<?php } else { ?><h3 class="redText">No items found.</h3><?php }?> 
			<?php if ($_smarty_tpl->tpl_vars['schid']->value != '' && $_smarty_tpl->tpl_vars['carid']->value != '') {?>
			<p><a href="matched_results.php?id=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
&carid=<?php echo $_smarty_tpl->tpl_vars['carid']->value;?>
" class="button rs_btn new_search_btn" style="width: 100%; max-width: 250px;">Back to Search Results</a></p>
			<?php } else { ?>
			<p><a href="home.php" class="button rs_btn new_search_btn" style="width: 100%; max-width: 250px;">Start a New Search</a></p>
			<?php }?> 
		</div>
		<input type="hidden" name="pageaction" value="finalorder">
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
">
		<input type="hidden" name="carid" value="<?php echo $_smarty_tpl->tpl_vars['carid']->value;?>
">
	</form>
</div><?php }
}
