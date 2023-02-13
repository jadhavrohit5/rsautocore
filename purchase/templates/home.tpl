<div id="pageBlock">
	{if $schopt_rs eq '1'}
	<div class="search_by">
		<h3>Search by <strong>OE/OEM Number <br>
		or Reference Number</strong></h3>
		<a href="select_partcat.php" class="button rs_btn rs_btn_small">Search by Reference Number</a> 
	</div>
	{/if}
	{if $schopt_td eq '1'}
	<div class="search_by">
		<h3>Search by <strong>Number Plate / <br>
		Vehicle Registration Number</strong></h3>
		<a href="search_bynum.php" class="button rs_btn rs_btn_small">SEARCH BY NUMBER PLATE</a>
	</div>
	{/if}
</div>
{*<!-- <div id="adminBody">
	{if $schopt_rs eq '1'}
	<p>
		<div class="text_align_center" style="padding: 20px;">Search by OE/OEM Number or Reference Number<br><br><a href="select_partcat.php" class="button btn_green"><strong class="fontsize24 uppercase">Search by Reference Number</strong></a></div>
	</p>
	{/if}
	{if $schopt_td eq '1'}
	<p>
		<div class="text_align_center" style="padding: 20px;">Search by Number Plate / Vehicle Registration Number<br><br><a href="search_bynum.php" class="button btn_green"><strong class="fontsize24 uppercase">Search By Number Plate</strong></a></div>
	</p>
	{/if}
</div> -->*}