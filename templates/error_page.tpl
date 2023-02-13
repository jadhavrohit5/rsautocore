<div class="pageheading"><a href="parts.php?mode=show&type={$ptype}" class="tooltip back_btn" title="BACK TO PARTS LIST"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Error Page</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
		</div>
		<div class="GD-70">
			<div class="form_table">
				<div class="row">
					<table width="100%">
						<thead>
							<tr>
								<th colspan="4" align="left">ERROR</th>
							</tr>
						</thead>
						<tr>
							<td colspan="4" class="spacer">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="4">
			{if $msg ne ""}
			<h3 class="redText">&nbsp;{$msg}</h3>
			{else}
			<h3 class="redText">&nbsp;</h3>
			{/if}

							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>