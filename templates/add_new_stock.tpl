<script language="javascript" src="js/validatedt.js"></script>
{literal}
<script language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

		if(isWhitespace(frm.oeone.value) && isWhitespace(frm.oetwo.value) && isWhitespace(frm.oemone.value) && isWhitespace(frm.oemtwo.value)) {
			error += "Please enter a data.";
		}

		//if(isWhitespace(frm.rsac.value)) {
		//	error += "Please enter RSAC.";
		//}

		if(error.length != 0) {
			alert(error);
			//document.getElementById('warning').innerHTML = error;
			return false;
		} else {
			frm.mode.value = 'addoestock';
			frm.pageaction.value = 'addoestock';
			return true;
		}

	}
//-->
</script>
{/literal}
<div class="pageheading"><a href="edit_item.php?type={$ptypeid}&partid={$partid}" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Parts > Edit Part - {$ptypenm} > Add New OE Stock</h1>
	<div class="add">&nbsp;</div>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
			{if $msg ne ""}
			<h3 class="redText">{$msg}</h3>
			{/if}
		</div>
		<div class="GD-70">
			<div class="form_table">
				<form name="frm" method="post" action="add_new_stock.php?type={$ptypeid}&partid={$partid}" class="validate disable" onSubmit="return valForm(this)"> 
					<div class="row">
						<table width="100%">
							<thead>
								<tr>
									<th colspan="4" align="left">Enter New OE Stock Data</th>
								</tr>
							</thead>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td width="140">RS Reference :</td>
								<td><strong>{$grouprsac}</strong></td>
							</tr>
							<tr>
								<td>OE 1# :</td>
								<td><input name="oeone" type="text" class="input" value="{$oeone}" maxlength="250" style="max-width: 350px;" /></td>
							</tr>
							<tr>
								<td>OE 2# :</td>
								<td><input name="oetwo" type="text" class="input" value="{$oetwo}" maxlength="250" style="max-width: 350px;" /></td>
							</tr>
							<tr>
								<td>OEM 1# :</td>
								<td><input name="oemone" type="text" class="input" value="{$oemone}" maxlength="250" style="max-width: 350px;" /></td>
							</tr>
							<tr>
								<td>OEM 2# :</td>
								<td><input name="oemtwo" type="text" class="input" value="{$oemtwo}" maxlength="250" style="max-width: 350px;" /></td>
							</tr>
							<tr>
								<td>Quantity :</td>
								<td><input name="qtydata" type="text" class="input onlyNumber" value="{$qtydata}" maxlength="8" style="max-width: 120px;" /></td>
							</tr>
							<tr>
								<td>Location :</td>
								<td><input name="location" type="text" class="input" value="{$location}" maxlength="250" style="max-width: 350px;" /></td>
							</tr>
						</table>
					</div>
					<div class="row">
						<div id="action_bar">
							<input name="addnew" value="Save" class="button" type="submit">
							<a href="edit_item.php?type={$ptypeid}&partid={$partid}" class="button btn_gray">Back</a>
						</div>
					</div>
					<input type="hidden" name="grouprsac" value="{$grouprsac}">
					<input type="hidden" name="mode" value="">
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div>