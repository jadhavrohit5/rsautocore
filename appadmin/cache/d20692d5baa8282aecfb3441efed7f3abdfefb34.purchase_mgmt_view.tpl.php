<?php
/* Smarty version 3.1.30, created on 2023-02-11 10:05:46
  from "/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/purchase_mgmt_view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e7687ab8c721_60178971',
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
  'cache_lifetime' => 120,
),true)) {
function content_63e7687ab8c721_60178971 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="pageheading"><a href="purchase_mgmt.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE PURCHASES"><i class="fa fa-angle-left"></i></a>	<h1><i class="fa fa-cog"></i> View PO Details</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
						<h5 class="redText">&nbsp;</h5>
					</div>
		<div class="GD-70">
			<div class="form_table">
				<div class="row">
					<form name="frm" method="post" action="purchase_mgmt_view.php??mode=show&id=ODMx">   
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th colspan="2" align="left">PO No# "<strong>PO-M000831</strong>"</th>
							</tr>
						</thead>
						<tr>
							<td colspan="2" class="spacer">&nbsp;</td>
						</tr>
						<tr>
							<td valign="top" width="18%"><strong>Supplier Name:</strong></td>
							<td valign="top" width="82%">S Das</td>
						</tr>
						<tr>
							<td valign="top"><strong>Total Order:</strong></td>
							<td valign="top"><!-- &pound; -->&euro;108.00</td>
						</tr>
						<tr>
							<td valign="top"><strong>Date Posted:</strong></td>
							<td valign="top">11th February 9:51 AM</td>
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
														<tr class="odd itemrow3707" id="item-r1">
								<td align="left" class="col-1" nowrap><span class="counter">1</span></td>
								<td align="left"><span class="MOB">OE Number:</span> </td>
								<td align="left"><span class="MOB">RSAC Ref:</span> RSTC043</td>
								<td align="left"><span class="MOB">Part Type:</span> TURBOCHARGER</td>
								<td align="right"><span class="MOB">Purchase Price:</span> &euro;35.00</td>
								<td align="right"><span class="MOB">Offered Quantity:</span> 1</td>
								<td align="left"><span class="MOB">Total Amount:</span> 1 X &euro;35.00</td>
								<td align="center"><span class="MOB">Delivered:</span>
								<input type="checkbox" name="delvopt[]" id="delvopt[]" value="3707" > 
								</td>
							</tr>
							 
						</tbody>
					</table>
					</div>
					<div class="row">
						<div id="action_bar">
						<strong>Update Delivery Status of Parts: </strong> <input type="submit" name="submit" value="Update" class="button">
						<input type="hidden" name="mode" value="itmdelivered">
						<input type="hidden" name="pageaction" value="itmdelivered">
						<input type="hidden" name="ponumbr" value="PO-M000831">
						</div>
					</div>
					</form>
				</div>
					<div class="row text_align_center">
						<div id="action_bar">
							<p><a class="button" href="download_po.php?id=ODMx">Download PO Details</a><!-- added new -->
														<a href="purchase_mgmt.php?mode=show" class="button btn_gray" style="width:100px;">Back</a></p>
													</div>
					</div>
			</div>
		</div>
	</div>
</div><?php }
}
