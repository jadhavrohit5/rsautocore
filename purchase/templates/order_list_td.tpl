<div id="adminBody">
	<div class="pageheading">
		<span class="fa_icon"><i class="fa fa-cogs"></i></span>
		<h3>Cart</h3>
	</div>
	<div class="order row">
		<div class="text_align_center">
			<h3>You have <strong class="yelloText">{$total}</strong> items in your cart</h3>
			<p>This is the list you agree to supply... Click Enter Purchase to receive Purchase Order</p>
			<p class="redText text_align_center">{$msg}</p>
		</div>
		<form name="" action="myoffers_td.php" method="post" class="validate">
			{if $total gt 0}
			<div class="chart" style="overflow: auto;">
				<table border="0" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>Part Type</th>
							<th>RSAC</th>
							<th>Price</th>
							<th>Qty</th>
							<th>Total</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						{section name=i loop=$gsoffrcnt}
						<tr>
							<td align="center">{$gsoffrcnt[i].parttype}</td>
							<td align="center">{if $gsoffrcnt[i].pphoto ne ""}<a href="{$gsoffrcnt[i].pphoto}" class="image-link" data-title="{$gsoffrcnt[i].rsac_ref}" data-source="">{$gsoffrcnt[i].rsac_ref}</a>{else}{$gsoffrcnt[i].rsac_ref}{/if}</td>
							<td align="center">{$vdrcur}{$gsoffrcnt[i].buyprice}</td>
							<td align="center">{$gsoffrcnt[i].ofrstock}</td>
							<td align="center">{$vdrcur}{$gsoffrcnt[i].ofrprice}</td>
							<td align="center" class="action"><a href="order_list_td.php?id={$schid}&carid={$carid}&itmid={$gsoffrcnt[i].offrid}&pageaction=delete" class="tooltip" title="Remove"><i class="fa fa-trash-o" ></i></a></td>
						</tr>
						{/section} 
					</tbody>
				</table>
			</div>
			{/if} 
			<div class="text_align_center row" style="padding: 20px 0;">
				{if $total gt 0}
				<p><input type="submit" name="purchase" value="Enter Purchase" class="button btn_green" style="width: 100%; max-width: 350px;" /></p>
				<p><strong><em>This is Test Cart page for Number Plate Search. Above button will generate TEST PO.</em></strong></p>
				<p class="fontsize24 text_align_center">OR</p>
				{else}<h3 class="redText">No items found.</h3>{/if} 
				<p><a href="matched_results.php?id={$schid}&carid={$carid}" class="button btn_gray uppercase" style="width: 100%; max-width: 350px;"><i class="fa fa-search" ></i> Back to Search Results</a></p>
			</div>
			<input type="hidden" name="pageaction" value="finalorder">
			<input type="hidden" name="id" value="{$schid}">
			<input type="hidden" name="carid" value="{$carid}">
		</form>
	</div>
</div>