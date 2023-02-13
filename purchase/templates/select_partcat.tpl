<div class="pageheading">
	<h3>All Categories</h3>
	<p>Select a part type from the following categories</p>
</div>
<div id="parttype_catlist">
	<ul>
		{section name=i loop=$myparttypelist}
		{if $myparttypelist[i].chk eq '1'}
		<li>
			<div class="item">
				<div class="thumb"><a href="search.php?type={$myparttypelist[i].typeid}"><span class="img"><img src="catphotos/{$myparttypelist[i].partimg}" alt="{$myparttypelist[i].parttype}"></span></a></div>
				<div class="title"><a href="search.php?type={$myparttypelist[i].typeid}">{$myparttypelist[i].parttype}</a></div>
			</div>
		</li>
		{/if}
		{/section} 
	</ul>
</div>
{*<!-- <div id="adminBody">
	<div id="parttype_catlist">
		<h2>Select Part Type</h2>
		<ul>
			{section name=i loop=$myparttypelist}
			{if $myparttypelist[i].chk eq '1'}
			<li>
				<div class="item">
					<div class="thumb"><a href="search.php?type={$myparttypelist[i].typeid}"><span class="img"><img src="catphotos/{$myparttypelist[i].partimg}" alt="{$myparttypelist[i].parttype}"></span></a></div>
					<div class="title"><a href="search.php?type={$myparttypelist[i].typeid}">{$myparttypelist[i].parttype}</a></div>
				</div>
			</li>
			{/if}
			{/section} 
		</ul>
	</div>
</div> -->*}
