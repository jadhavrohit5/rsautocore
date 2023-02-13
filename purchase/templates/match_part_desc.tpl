<div id="adminBody">
	<div class="search_page row">
		<div class="search_results text_align_center">
			<h3 style="margin-top: 15px;">{$ptypenm}<br>
			{*{if $parttype eq 2}RS{else}RSAC Ref{/if} <strong class="greenText">{$ptrsac}</strong></h3>*}
			RSAC Ref <strong class="greenText">{$ptrsac}</strong></h3>
			<p><img src="images/thumbs-up.png" alt=""/>
			</p>
			<div class="fontsize20" style="padding:10px 0 10px 0;">
				<p>Required Quantity: {$myreqqty}</p>
				<p>Our Purchase Price: {$vdrcur}{$pprice}</p>
			</div>
			<form name="" action="match_part_desc.php?schid={$schid}&carid={$carid}&id={$itemid}" method="post" class="validate">
				<p class="redText">{$msg}</p>
				{*if $cnt_ofrd eq 0*}
				<p>Total I will supply</p>
				<p><input name="supplyqty" type="text" class="input onlyNumber req text_align_center" required style="max-width: 350px; font-size: 20px;" value="{$supplyqty}"/></p>
				<p><input type="submit" name="purchase" value="Enter Purchase" class="button btn_green" style="width: 100%; max-width: 350px;"/></p>
				{*else}
				<p>Supply quantity already submitted.</p>
				{/if*}
				<p><a href="selected_articles.php?id={$schid}&carid={$carid}" class="button btn_gray uppercase" style="width: 100%; max-width: 350px;"><i class="fa fa-search" ></i> Back to Selected Items</a></p>
				<input type="hidden" name="pageaction" value="partsupply">
				<input type="hidden" name="partid" value="{$partid}">
				<input type="hidden" name="requirqty" value="{$reqqty}">
				<input type="hidden" name="partprice" value="{$pprice}">
				<input type="hidden" name="part_rsac" value="{$ptrsac}">
			</form>
		</div>
	</div>
</div>