<div class="pageheading">
	<h3>Search By Number Plate / Vehicle Registration Number</h3>
</div>
<div id="pageBlock" style="padding-top: 0;">
	<div class="search_results text_align_left" style="margin-left: auto;">
		<div class="fontsize20" style="padding: 20px;">
			<p><em>Reg. Number:</em> <strong>{$regnum}</strong></p>
			<em>Manufacturer:</em> {$manuName}<br>
			<em>Model:</em> {$modelName}<br>
			<em>Year:</em> {$yearCons} - {$yearCoTo}<br>
			<em>Type:</em> {$consType}<br>
			<em>Engine:</em> {$ccmTech}<br>
			<em>Fuel:</em> {$fuelType}</p>
		</div>
		<div class="search_results text_align_center">
			<form name="srhFrm" method="post" action="search_matchdata.php">
				<p><button type="submit" name="submit" class="button rs_btn" style="max-width: 250px;" >Continue</button></p>
				<input type="hidden" name="schid" value="{$schid}">
				<input type="hidden" name="carid" value="{$ktypno}">
				<input type="hidden" name="regnum" value="{$regnum}">
				<input type="hidden" name="pageaction" value="getarticles">
			</form>
		</div>
	</div>
</div>