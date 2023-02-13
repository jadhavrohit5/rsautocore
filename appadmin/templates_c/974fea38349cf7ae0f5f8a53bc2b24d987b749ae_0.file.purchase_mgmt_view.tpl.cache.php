<?php
/* Smarty version 3.1.30, created on 2023-02-11 10:05:46
  from "/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/purchase_mgmt_view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e7687ab87692_59684884',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '974fea38349cf7ae0f5f8a53bc2b24d987b749ae' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/purchase_mgmt_view.tpl',
      1 => 1645656569,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e7687ab87692_59684884 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once '/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/libs/plugins/function.cycle.php';
$_smarty_tpl->compiled->nocache_hash = '83645671063e7687ab70359_77920320';
?>
<div class="pageheading"><?php if ($_smarty_tpl->tpl_vars['isdeletd']->value == '1') {?><a href="purchase_mgmt_deleted.php?mode=show" class="tooltip back_btn" title="BACK TO DELETED POs"><i class="fa fa-angle-left"></i></a><?php } else { ?><a href="purchase_mgmt.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE PURCHASES"><i class="fa fa-angle-left"></i></a><?php }?>
	<h1><i class="fa fa-cog"></i> View PO Details</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value != '') {?>
			<h5 class="redText"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h5>
			<?php } else { ?>
			<h5 class="redText">&nbsp;</h5>
			<?php }?>
		</div>
		<div class="GD-70">
			<div class="form_table">
				<div class="row">
					<form name="frm" method="post" action="purchase_mgmt_view.php??mode=show&id=<?php echo $_smarty_tpl->tpl_vars['poid']->value;?>
">   
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th colspan="2" align="left">PO No# "<strong><?php echo $_smarty_tpl->tpl_vars['ponum']->value;?>
</strong>"</th>
							</tr>
						</thead>
						<tr>
							<td colspan="2" class="spacer">&nbsp;</td>
						</tr>
						<tr>
							<td valign="top" width="18%"><strong>Supplier Name:</strong></td>
							<td valign="top" width="82%"><?php echo $_smarty_tpl->tpl_vars['vendorname']->value;?>
</td>
						</tr>
						<tr>
							<td valign="top"><strong>Total Order:</strong></td>
							<td valign="top"><!-- &pound; --><?php echo $_smarty_tpl->tpl_vars['vndrcur']->value;
echo $_smarty_tpl->tpl_vars['totalorder']->value;?>
</td>
						</tr>
						<tr>
							<td valign="top"><strong>Date Posted:</strong></td>
							<td valign="top"><?php echo $_smarty_tpl->tpl_vars['dateposted']->value;?>
</td>
						</tr>
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
					</table><!-- <br> -->
					<div class="chart">
					<table border="0" cellspacing="0" cellpadding="0">
						<thead>
							<tr>
								<th width="30" align="left" style="width:30px;">#</th>
								<th>OE Number</th>
								<th>RSAC Ref</th>
								<th>Part Type</th>
								<th>Purchase Price</th>
								<th>Offered Quantity</th>
								<th>Total Amount</th>
								<th>Delivered</th>
							</tr>
						</thead>
						<tbody>
							<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['pordlist']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
							<tr class="<?php echo smarty_function_cycle(array('values'=>"odd,"),$_smarty_tpl);?>
 itemrow<?php echo $_smarty_tpl->tpl_vars['pordlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cid'];?>
" id="item-r<?php echo $_smarty_tpl->tpl_vars['pordlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
">
								<td align="left" class="col-1" nowrap><span class="counter"><?php echo $_smarty_tpl->tpl_vars['pordlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
</span></td>
								<td align="left"><span class="MOB">OE Number:</span> <?php echo $_smarty_tpl->tpl_vars['pordlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['oenumber'];?>
</td>
								<td align="left"><span class="MOB">RSAC Ref:</span> <?php echo $_smarty_tpl->tpl_vars['pordlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rsacref'];?>
</td>
								<td align="left"><span class="MOB">Part Type:</span> <?php echo $_smarty_tpl->tpl_vars['pordlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttype'];?>
</td>
								<td align="right"><span class="MOB">Purchase Price:</span> <?php echo $_smarty_tpl->tpl_vars['vndrcur']->value;
echo $_smarty_tpl->tpl_vars['pordlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['buyprice'];?>
</td>
								<td align="right"><span class="MOB">Offered Quantity:</span> <?php echo $_smarty_tpl->tpl_vars['pordlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['ofrstock'];?>
</td>
								<td align="left"><span class="MOB">Total Amount:</span> <?php echo $_smarty_tpl->tpl_vars['pordlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['ofrstock'];?>
 X <?php echo $_smarty_tpl->tpl_vars['vndrcur']->value;
echo $_smarty_tpl->tpl_vars['pordlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['buyprice'];?>
</td>
								<td align="center"><span class="MOB">Delivered:</span>
								<input type="checkbox" name="delvopt[]" id="delvopt[]" value="<?php echo $_smarty_tpl->tpl_vars['pordlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cid'];?>
" <?php if ($_smarty_tpl->tpl_vars['pordlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['delvrd'] == '1') {?> checked <?php }?>> 
								</td>
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
					<div class="row">
						<div id="action_bar">
						<strong>Update Delivery Status of Parts: </strong> <input type="submit" name="submit" value="Update" class="button">
						<input type="hidden" name="mode" value="itmdelivered">
						<input type="hidden" name="pageaction" value="itmdelivered">
						<input type="hidden" name="ponumbr" value="<?php echo $_smarty_tpl->tpl_vars['ponum']->value;?>
">
						</div>
					</div>
					</form>
				</div>
					<div class="row text_align_center">
						<div id="action_bar">
							<p><a class="button" href="download_po.php?id=<?php echo $_smarty_tpl->tpl_vars['poid']->value;?>
">Download PO Details</a><!-- added new -->
							<?php if ($_smarty_tpl->tpl_vars['isdeletd']->value == '1') {?>
							<a href="purchase_mgmt_deleted.php?mode=show" class="button btn_gray" style="width:100px;">Back</a></p>
							<?php } else { ?>
							<a href="purchase_mgmt.php?mode=show" class="button btn_gray" style="width:100px;">Back</a></p>
							<?php }?>
						</div>
					</div>
			</div>
		</div>
	</div>
</div><?php }
}
