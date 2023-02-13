<?php
/* Smarty version 3.1.30, created on 2023-02-13 17:36:37
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/order_list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea752583b4a7_44056174',
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
  'cache_lifetime' => 120,
),true)) {
function content_63ea752583b4a7_44056174 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="pageheading">
	<h3>You have <strong class="yelloText">2</strong> items in your cart</h3>
	<p>This is the list you agree to supply... Click finalise Purchase to receive Purchase order</p>
	<p class="redText"></p>
</div>
<div class="order">
	<form name="" action="myoffers.php" method="post" class="validate">
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
										<tr>
						<td align="center">BRAKE CALIPER</td>
						<td align="center"><a href="https://rsautocoresystem.co.uk/uploads/5610_1591966213.png" class="image-link" data-title="RSBC-2594" data-source="">RSBC-2594</a></td>
						<td align="center">343362</td>
						<td align="center">&pound;2.00</td>
						<td align="center">1</td>
						<td align="left">&nbsp;&pound;2.00</td>
						<td align="center" class="action"><a href="order_list.php?id=23193&carid=&itmid=NDU1OQ==&pageaction=delete" class="tooltip" title="Remove"><i class="fa fa-trash-o" ></i></a></td>
					</tr>
										<tr>
						<td align="center">RHD POWER</td>
						<td align="center"><a href="https://rsautocoresystem.co.uk/uploads/8351_1623424054.png" class="image-link" data-title="RSR194" data-source="">RSR194</a></td>
						<td align="center">Rsr194</td>
						<td align="center">&pound;20.00</td>
						<td align="center">2</td>
						<td align="left">&nbsp;&pound;40.00</td>
						<td align="center" class="action"><a href="order_list.php?id=23193&carid=&itmid=NDU2MA==&pageaction=delete" class="tooltip" title="Remove"><i class="fa fa-trash-o" ></i></a></td>
					</tr>
					 
				</tbody>
			</table>
		</div>
		 
		<div class="text_align_center row" style="padding: 20px 0;">
						<p>
			<button type="submit" name="purchase" class="button rs_btn" style="max-width: 250px;" >Enter Purchase</button>
			</p>
			<p class="fontsize24 text_align_center">OR</p>
			 
						<p><a href="home.php" class="button rs_btn new_search_btn" style="width: 100%; max-width: 250px;">Start a New Search</a></p>
			 
		</div>
		<input type="hidden" name="pageaction" value="finalorder">
		<input type="hidden" name="id" value="23193">
		<input type="hidden" name="carid" value="">
	</form>
</div><?php }
}
