<script language="javascript" src="js/validatedt.js"></script>
{literal}
<script language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

		if(isWhitespace(frm.manufacturernm.value)) {
			error += "Please enter the Car Manufacturer name.";
		}

		if(error.length != 0) {
			alert(error);
			return false;
		} else {
			frm.pageaction.value = 'addcarmanf';
			return true;
		}

	}
//-->
</script>
{/literal}
<div class="pageheading"><a href="manage_manufacturers.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE MANUFACTURERS"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Add New Car Manufacturer</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
			{if $msg ne ""}
			<h5 class="redText">{$msg}</h5>
			{else}
			<h5 class="redText">&nbsp;</h5>
			{/if}
		</div>
		<div class="GD-70">
			<div class="form_table">
				<form name="frm" method="post" action="add_manufacturer.php?mode=show" onSubmit="return valForm(this)"> 
					<div class="row">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th colspan="4" align="left">ADD NEW CAR MANUFACTURER</th>
								</tr>
							</thead>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td valign="top" width="22%"><strong>Car Manufacturer Name</strong>:</td>
								<td valign="top" colspan="3" width="78%"><input name="manufacturernm" type="text" class="input req alphanumeric" value="" maxlength="150" />
								</td>
							</tr>
						</table>
 					</div>
					<div class="row">
						<div id="action_bar">
							<input name="addnew" value="Submit" class="button" type="submit">
						</div>
					</div>
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div>