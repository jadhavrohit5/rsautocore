<div id="adminBody">
	<div class="pageheading">
	<span class="fa_icon"><i class="fa fa-cogs"></i></span> <h3>Search By Number Plate / Vehicle Registration Number</h3>
	</div>
	<div class="search_page row">
		<div class="search_results">
			{if $total gt 0}
			<div class="text_align_center">
				<h3>Selected parts from Search Results</p>
			</div>
			<div class="listing">
				<ul>
					{section name=i loop=$gsreqcnt}
					<li class="item">
						{if $gsreqcnt[i].pphoto ne ""}<div class="img"><a href="{$gsreqcnt[i].pphoto}" class="image-link" data-title="{$gsreqcnt[i].rsref}" data-source=""><img src="{$gsreqcnt[i].pphoto}" alt="" /></a></div>{else}<div class="img"><img src="images/no_photo.jpg" alt="" /></div>{/if}
						<div class="info">
							<h4>{$gsreqcnt[i].rsref}</h4>
							<p class="grayText">Part Type:&nbsp;{$gsreqcnt[i].parttype}</p>
							{if $gsreqcnt[i].req_qty gt 0}
							<p>Required Quantity:&nbsp;{$gsreqcnt[i].req_qty}</p>
							{*<!--  -->*}<div><a href="match_part_desc.php?schid={$schid}&carid={$carid}&id={$gsreqcnt[i].itemid}" class="button btn_green">Select this part</a></div>
							{*<!-- <div><a href="#" class="button btn_green">Select this part</a></div> -->*}
							{else}
							<p>Required Quantity:&nbsp;0</p>
							{/if}							
						</div>
					</li>
					{/section}
				</ul>
			</div>
			{else}
			<div class="text_align_center">
				<h3>Selected parts</h3>
				<p>&nbsp;</p>
				<h3 class="redText">No parts selected.</h3>
			</div>
			{/if}
			<div class="search_results text_align_center" >
				<p><a href="matched_results.php?id={$schid}&carid={$carid}" class="button btn_gray uppercase" style="width: 100%; max-width: 250px;"><i class="fa fa-search" ></i> Back to Search Results</a></p>
			</div>
			<div class="search_results text_align_center" >
				<p><a href="home.php" class="button btn_gray uppercase" style="width: 100%; max-width: 250px;"><i class="fa fa-search" ></i> New Search</a></p>
			</div>
		</div>
	</div>
</div>