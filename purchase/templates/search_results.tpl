<div class="pageheading">
	<div class="img"><img src="catphotos/{$ptypeph}" alt="{$ptypenm}" width="60"></div>
	<h3>{$ptypenm}</h3>
	<p>Search results for <strong class="yelloText">{$searchkey}</strong></p>
</div>
<div id="pageBlock" style="padding-top: 0;">
	<div class="search_results">
		{if $total gt 0}
		<p>There are several parts which match the part number you entered.
		Please select from the image below to confirm part.</p>
		<div class="listing">
			<ul>
				{section name=i loop=$gsreqcnt}
				<li class="item">
					{if $gsreqcnt[i].pphoto ne ""}<div class="img"><a href="{$gsreqcnt[i].pphoto}" class="image-link" data-title="{$gsreqcnt[i].rsref}" data-source=""><img src="{$gsreqcnt[i].pphoto}" alt="" /></a></div>{else}<div class="img"><img src="images/no_photo.jpg" alt="" /></div>{/if}
					<div class="info">
						<h4>{$gsreqcnt[i].rsref}</h4>
						{if $gsreqcnt[i].req_qty gt 0}
						<p>Required Quantity:&nbsp;{$gsreqcnt[i].req_qty}</p>
						<div><a href="reqmt_desc.php?type={$parttype}&schid={$schid}&id={$gsreqcnt[i].partid}" class="button rs_btn">Select this part</a></div>
						{else}
						<p>Required Quantity:&nbsp;0</p>
						<div><a href="reqmt_desc.php?type={$parttype}&schid={$schid}&id={$gsreqcnt[i].partid}" class="button rs_btn">Select this part</a></div>
						{/if}
					</div>
				</li>
				{/section} 
			</ul>
		</div>
		<div class="pagination">
			<p class="result_found">Found {$total} items</p>
			<p class="np_control">
				{if $prevpg ne 0}<a href="search_results.php?type={$parttype}&schid={$schid}&pg={$prevpg}"> <i class="fa fa-angle-left"></i> Prev</a>{/if}
				{if $nextpg ne 0}<a href="search_results.php?type={$parttype}&schid={$schid}&pg={$nextpg}">Next <i class="fa fa-angle-right"></i></a>{/if}
			</p>
		</div>
		{else}
		<div class="text_align_center">
			<h3>Search results for <strong class="yelloText">{$searchkey}</strong></h3>
			<p>&nbsp;</p>
			<h3 class="redText">No items found.</h3>
			<p>Please modify your search and try again.</p>
		</div>
		{/if}
		<div class="row" >
			<p><a href="select_partcat.php?mode=show" class="button rs_btn new_search_btn"> New Search </a></p>
		</div>
	</div>
</div>
{*<!-- <div id="adminBody">
	<div class="pageheading">
	<span class="fa_icon"><i class="fa fa-cogs"></i></span> <h3>{$ptypenm}</h3>
	</div>
	<div class="search_page row">
		<div class="search_results">
			{if $total gt 0}
			<div class="text_align_center">
				<h3>Search results for <strong class="yelloText">{$searchkey}</strong></h3>
				<p>There are several parts which match the part number you entered. <br>
				Please select from the image below to confirm part.</p>
			</div>
			<div class="listing">
				<ul>
					{section name=i loop=$gsreqcnt}
					<li class="item">
						{if $gsreqcnt[i].pphoto ne ""}<div class="img"><a href="{$gsreqcnt[i].pphoto}" class="image-link" data-title="{$gsreqcnt[i].rsref}" data-source=""><img src="{$gsreqcnt[i].pphoto}" alt="" /></a></div>{else}<div class="img"><img src="images/no_photo.jpg" alt="" /></div>{/if}
						<div class="info">
							<h4>{$gsreqcnt[i].rsref}</h4>
							{if $gsreqcnt[i].req_qty gt 0}
							<p>Required Quantity:&nbsp;{$gsreqcnt[i].req_qty}</p>
							<div><a href="reqmt_desc.php?type={$parttype}&schid={$schid}&id={$gsreqcnt[i].partid}" class="button btn_green">Select this part</a></div>
							{else}
							<p>Required Quantity:&nbsp;0</p>
							<div><a href="reqmt_data.php?type={$parttype}&schid={$schid}&id={$gsreqcnt[i].partid}" class="button btn_green">Select this part</a></div>
							{/if}
						</div>
					</li>
					{/section} 
				</ul>
			</div>
			<div class="pagination">
				<p class="result_found">Found {$total} items</p>
				<p class="np_control">
					{if $prevpg ne 0}<a href="search_results.php?type={$parttype}&schid={$schid}&pg={$prevpg}" class="button"><i class="fa fa-angle-left"></i> Prev</a>{/if}
					{if $nextpg ne 0}<a href="search_results.php?type={$parttype}&schid={$schid}&pg={$nextpg}" class="button">Next <i class="fa fa-angle-right"></i></a>{/if}
				</p>
			</div>
			{else}
			<div class="text_align_center">
				<h3>Search results for <strong class="yelloText">{$searchkey}</strong></h3>
				<p>&nbsp;</p>
				<h3 class="redText">No items found.</h3>
				<p>Please modify your search and try again.</p>
			</div>
			{/if}
			<div class="search_results text_align_center" >
				<p><a href="select_partcat.php?mode=show&type={$parttype}" class="button btn_gray uppercase" style="width: 100%; max-width: 250px;"><i class="fa fa-search" ></i> New Search</a></p>
			</div>
		</div>
	</div>
</div> -->*}