<script language="javascript" src="js/validatedt.js"></script>
{literal}
<script language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

		if(isWhitespace(frm.parttype.value)) {
			error += "Please select the part type.";
		}

		if(error.length != 0) {
			alert(error);
			return false;
		} else {
			//frm.mode.value = 'selectptype';
			frm.pageaction.value = 'selectptype';
			return true;
		}

	}
//-->
</script>
{/literal}
<div class="pageheading"><a href="parts.php?mode=show&type=1" class="tooltip back_btn" title="BACK TO PARTS LIST"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Add Part</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
			{if $msg ne ""}
			<h3 class="redText">{$ptypenm}:&nbsp;{$msg}</h3>
			{else}
			<h3 class="redText">&nbsp;</h3>
			{/if}
		</div>
		<div class="GD-70">
			<div class="form_table">
				<form name="frm" method="post" action="add_part.php" onSubmit="return valForm(this)"> 
					<div class="row">
						<table width="100%">
							<thead>
								<tr>
									<th colspan="4" align="left">ADD NEW PART</th>
								</tr>
							</thead>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="4"><em>Please Select Part Type</em></td>
							</tr>
							<tr>
								<td width="120">Part Type:</td>
								<td colspan="3">
									<select name="parttype" class="req" style="width:225px;">
										<option value="" selected>Select Part Type</option>
										{section name=i loop=$myparttypelist}
										<option value="{$myparttypelist[i].typeid}">{$myparttypelist[i].parttype}</option>
										{/section}
									</select>
								</td>
							</tr>
						</table>
					</div>
					<div class="row">
						<div id="action_bar">
							<input name="addnew" value="Continue" class="button" type="submit">
						</div>
					</div>
					<input type="hidden" name="mode" value="">
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
			{*<!-- <div class="form_table">
				<form name="frm" method="post" action="add_new_part1.php" onSubmit="return valForm(this)"> 
					<div class="row">
						<table width="100%">
							<thead>
								<tr>
									<th colspan="4" align="left">ADD NEW PART</th>
								</tr>
							</thead>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="4"><em>Please Select Part Type</em></td>
							</tr>
							<tr>
								<td width="120">Part Type:</td>
								<td colspan="3">
									<select name="parttype" class="req" style="width:225px;">
										<option value="" selected>Select Part Type</option>
										{section name=i loop=$parttypelist}
										<option value="{$parttypelist[i].typeid}">{$parttypelist[i].parttype}</option>
										{/section}
									</select>
								</td>
							</tr>
						</table>
					</div>
					<div class="row">
						<div id="action_bar">
							<input name="addnew" value="Continue" class="button" type="submit">
						</div>
					</div>
					<input type="hidden" name="mode" value="">
					<input type="hidden" name="pageaction" value="">
				</form>
			</div> -->*}
		</div>
	</div>
</div>