<div class="pageheading">
	<h3>You have <strong class="yelloText">{$total}</strong> items in your cart</h3>
	<p>This is the list you agree to supply... Click finalise Purchase to receive Purchase order</p>
	<p class="redText">{$msg}</p>
</div>
<div class="order">
	<form name="" action="myoffers.php" method="post" class="validate">
		{if $total gt 0}
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
					{section name=i loop=$gsoffrcnt}
					<tr>
						<td align="center">{$gsoffrcnt[i].parttype}</td>
						<td align="center">{if $gsoffrcnt[i].pphoto ne ""}<a href="{$gsoffrcnt[i].pphoto}" class="image-link" data-title="{$gsoffrcnt[i].rsac_ref}" data-source="">{$gsoffrcnt[i].rsac_ref}</a>{else}{$gsoffrcnt[i].rsac_ref}{/if}</td>
						<td align="center">{$gsoffrcnt[i].oenumber}</td>
						<td align="center">{$vdrcur}{$gsoffrcnt[i].buyprice}</td>
						<td align="center">{$gsoffrcnt[i].ofrstock}</td>
						<td align="left">&nbsp;{$vdrcur}{$gsoffrcnt[i].ofrprice}</td>
						<td align="center" class="action"><a href="order_list.php?id={$schid}&carid={$carid}&itmid={$gsoffrcnt[i].offrid}&pageaction=delete" class="tooltip" title="Remove"><i class="fa fa-trash-o" ></i></a></td>
					</tr>
					{/section} 
				</tbody>
			</table>
		</div>
		{/if} 
		<div class="text_align_center row" style="padding: 20px 0;">
			{if $total gt 0}
			<p>
			<button type="submit" name="purchase" class="button rs_btn" style="max-width: 250px;" >Enter Purchase</button>
			</p>
			<p class="fontsize24 text_align_center">OR</p>
			{else}<h3 class="redText">No items found.</h3>{/if} 
			{if $schid ne "" and $carid ne ""}
			<p><a href="matched_results.php?id={$schid}&carid={$carid}" class="button rs_btn new_search_btn" style="width: 100%; max-width: 250px;">Back to Search Results</a></p>
			{else}
			<p><a href="home.php" class="button rs_btn new_search_btn" style="width: 100%; max-width: 250px;">Start a New Search</a></p>
			{/if} 
		</div>
		<input type="hidden" name="pageaction" value="finalorder">
		<input type="hidden" name="id" value="{$schid}">
		<input type="hidden" name="carid" value="{$carid}">
	</form>
</div>