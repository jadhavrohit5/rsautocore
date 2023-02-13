<script language="javascript" src="js/validatedt.js"></script>
{literal}
<script language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

		if(isWhitespace(frm.attributename.value)) {
			error += "Please enter the Attribute name.";
		}

		if(error.length != 0) {
			alert(error);
			return false;
		} else {
			frm.pageaction.value = 'addattribute';
			return true;
		}

	}
//-->
</script>
{/literal}
<div class="pageheading"><a href="manage_attributes.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE ATTRIBUTES"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Add New Attribute</h1>
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
				<form name="frm" method="post" action="add_attribute.php?mode=show" onSubmit="return valForm(this)"> 
					<div class="row">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th colspan="4" align="left">ADD NEW ATTRIBUTE</th>
								</tr>
							</thead>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td valign="top" width="22%"><strong>Attribute Name</strong>:</td>
								<td valign="top" colspan="3" width="78%"><input name="attributename" type="text" class="input req alphanumeric" value="" maxlength="150" />
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