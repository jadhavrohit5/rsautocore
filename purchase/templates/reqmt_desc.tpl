<div class="pageheading">
	<div class="img"><img src="catphotos/{$ptypeph}" alt="{$ptypenm}" width="60"></div>
	<h3>{$ptypenm}</h3>
</div>
<div class="order">
	<div class="text_align_center">
		<h3>RSAC Ref <strong class="greenText">{$ptrsac}</strong></h3>
		<p><img src="images/thumbs-up.png" alt=""/></p>
		<p class="fontsize20">Required Quantity: {$myreqqty}</p>
		<p class="fontsize20">Our Purchase Price: {$vdrcur}{$pprice}</p>
	</div>
	<div class="text_align_center">
		<form name="" action="reqmt_desc.php?type={$parttype}&schid={$schid}&id={$partid}" method="post" class="validate">
			<p class="redText">{$msg}</p>
			<p>Total I will supply</p>
			<p><input name="supplyqty" type="text" class="input onlyNumber req text_align_center"  required style="max-width: 350px; font-size: 20px;" value="{$supplyqty}" /><p>
			<button type="submit" name="purchase" class="button rs_btn" style="max-width: 250px;" >Enter Purchase</button>
			</p>
			<input type="hidden" name="pageaction" value="partsupply">
			<input type="hidden" name="requirqty" value="{$reqqty}">
			<input type="hidden" name="partprice" value="{$pprice}">
			<input type="hidden" name="part_rsac" value="{$ptrsac}">
		</form>
	</div>
	<div class="text_align_center row">
		<p>Search results for <strong class="yelloText">{$searchkey}</strong></p>
		<p><a href="search_results.php?type={$parttype}&schid={$schid}" class="button rs_btn new_search_btn" style="width: 100%; max-width: 250px;">Back to Search Results</a></p>
	</div>
</div>
{*<!-- <div id="adminBody">
	<div class="search_page row">
		<div class="search_results text_align_center">
			<h3 style="margin-top: 15px;">{$ptypenm}<br>
			RSAC Ref <strong class="greenText">{$ptrsac}</strong></h3>
			<p><img src="images/thumbs-up.png" alt=""/>
			</p>
			<div class="fontsize20" style="padding:10px 0 10px 0;">
				<p>Required Quantity: {$myreqqty}</p>
				<p>Our Purchase Price: {$vdrcur}{$pprice}</p>
			</div>
			<form name="" action="reqmt_desc.php?type={$parttype}&schid={$schid}&id={$partid}" method="post" class="validate">
				<p class="redText">{$msg}</p>
				<p>Total I will supply</p>
				<p><input name="supplyqty" type="text" class="input onlyNumber req text_align_center" required style="max-width: 350px; font-size: 20px;" value="{$supplyqty}"/></p>
				<p><input type="submit" name="purchase" value="Enter Purchase" class="button btn_green" style="width: 100%; max-width: 350px;"/></p>
				<p>Search results for <strong class="yelloText">{$searchkey}</strong></p>
				<p><a href="search_results.php?type={$parttype}&schid={$schid}" class="button btn_gray uppercase" style="width: 100%; max-width: 250px;"><i class="fa fa-search" ></i> Back to Search Results</a></p>
				<input type="hidden" name="pageaction" value="partsupply">
				<input type="hidden" name="requirqty" value="{$reqqty}">
				<input type="hidden" name="partprice" value="{$pprice}">
				<input type="hidden" name="part_rsac" value="{$ptrsac}">
			</form>
		</div>
	</div>
</div> -->*}