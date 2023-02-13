<?php
/* Smarty version 3.1.30, created on 2023-02-11 07:14:56
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/sales_purchase_report.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e7407077a0c4_66863678',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7aee6364686dadfb359ea3a252ec0cbb0ed55c3c' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/sales_purchase_report.tpl',
      1 => 1560405901,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e7407077a0c4_66863678 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once '/home/storm/sites/rsautocoresystem-co-uk/public/libs/plugins/function.cycle.php';
$_smarty_tpl->compiled->nocache_hash = '110606370763e7407076ae04_53779976';
?>
<div class="pageheading"> <a href="sales_data_report.php?mode=show" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> SALES DATA REPORT</h1>
	<div class="add">
		<div class="search_form">
			&nbsp;
		</div>
	</div>
</div>
<div id="main_content">
	<div id="pageBlock"> 
		<div class="row text_align_center">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value != '') {?>
			<h4 class="redText">&nbsp;<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h4>
			<?php }?>
			<p><strong><?php echo $_smarty_tpl->tpl_vars['ptypename']->value;?>
</strong> : Sales/Purchase Report from <?php echo $_smarty_tpl->tpl_vars['startday']->value;?>
 to <?php echo $_smarty_tpl->tpl_vars['today']->value;?>
</p>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['total']->value > 0) {?>
		<div class="GD-30 R text_align_right">
			<p><a class="button btn_gray" href="export_report.php?type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
">Export Report</a></p>
		</div>
		<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								<th width="30" align="left" style="width:30px;">#</th>
								<th align="left"><a href="#">RSA Ref No. </a></th> 
								<th align="left"><a href="#">Quantity Purchased </a></th>
								<th align="left"><a href="#">Quantity Sold </a></th>
								<th align="left"><a href="#">Average Purchase Price </a></th>
								<th align="left"><a href="#">Average Sale Price </a></th> 
								<th align="left"><a href="#">Present Quantity Total </a></th>
							</tr>
						</thead>
						<tbody>            
							<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['gsreqcnt']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
							<tr class="<?php echo smarty_function_cycle(array('values'=>"odd,"),$_smarty_tpl);?>
 itemrow<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pid'];?>
" id="item-r<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
">
								<td align="left" class="col-1" nowrap><span class="counter"><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
</span></td>
								<td align="left"><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rsac'];?>
 </td>
								<td align="left"><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['purchased'];?>
 </td>
								<td align="left"><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['sold'];?>
 </td>
								<td align="left"><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['purchaseprice'];?>
 </td>
								<td align="left"><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['saleprice'];?>
 </td>
								<td align="left"><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['totalqnty'];?>
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
			</div>
		</div>
		<div class="pagination">
			<div class="L"><span class="filter">
				<form action="" method="post" method="post" class="R">
					View:
					<select name="p" class="page_dropdown" id="page">
						<!-- <option value="10">10</option> -->
						<option value="50" <?php if ($_smarty_tpl->tpl_vars['ppage']->value == 50) {?> selected <?php }?>>50</option>
						<option value="100" <?php if ($_smarty_tpl->tpl_vars['ppage']->value == 100) {?> selected <?php }?>>100</option>                      
					</select>records
					<input type="hidden" name="mode" value="show">
				</form>
			</span>
		</div>
		<div class="R"><span class="np_control"><?php echo $_smarty_tpl->tpl_vars['showpagination']->value;?>
</span> <br>
			<span class="result_found"><?php echo $_smarty_tpl->tpl_vars['frshow']->value;?>
 to <?php echo $_smarty_tpl->tpl_vars['toshow']->value;?>
 of <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 Records</span></div>
		</div>
		<?php } else { ?>
		<div class="row text_align_center">
			<p>&nbsp;</p>
			<h3 class="redText">No Records Found.</h3>
			<p>&nbsp;</p>
		</div>
		<?php }?>
	</div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
jQuery(document).ready(function ($) {
	 $("#page").change(function () {
        var ptype = <?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
;
        var ppage = this.value;
        //alert(ppage);
  		var url = 'sales_purchase_report.php?mode=show&type='+ptype+'&p='+ppage;
		location.replace(url);
     });
		
});

<?php echo '</script'; ?>
> 
<?php }
}
