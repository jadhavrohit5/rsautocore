<script language="javascript" src="js/validatedt.js"></script>
{literal}
<script language="JavaScript">
<!--
function valForm(frm)
{
	var error = "";

	if(isWhitespace(frm.contactperson.value)) {
		error += "Please enter the user full name.\n";
	}
	if (isWhitespace(frm.contactemail.value)) {
		error += "Please enter the user contact email.\n";
	} else {
		if(!isEmail(frm.contactemail.value)) {
			error += "Please enter valid email address.\n";
		}
	}
	if(frm.wadmusertype.value == "siteuser") {
		if(frm.addpart.checked || frm.imports.checked || frm.reports.checked) {
			error += "Warehouse user not allowed access to admin sections.\n";
		}
	}

	if(error.length != 0) {
		alert(error);
		return false;
	} else {
		frm.mode.value = 'update';
		frm.pageaction.value = 'update';
		return true;
	}
}
//-->
</script>
{/literal}
<div class="pageheading"><a href="users_mgmt.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE USERS"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Edit User Details</h1>
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
				<div class="row">
					<form name="frm" method="post" action="users_mgmt_edit.php?id={$webadmid}" onSubmit="return valForm(this)">   
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th colspan="2" align="left">Edit User Details for "<strong>{$wadmusername}</strong>"</th>
							</tr>
						</thead>
						<tr>
							<td colspan="2" class="spacer">&nbsp;</td>
						</tr>
						<tr>
							<td valign="top" width="160"><strong>User Login Name</strong>:</td>
							<td valign="top">{$wadmusername}</td>
						</tr>
						<tr>
							<td valign="top"><strong>User Status</strong>:</td>
							<td valign="top">{if $webadmstatus eq '1'}Active{else}Suspended{/if}</td>
						</tr>
						<tr>
							<td valign="top"><strong>User Type</strong>:</td>
							<td valign="top">{$wadmusertpnm}<input type="hidden" name="wadmusertype" value="{$wadmusertype}"></td>
						</tr>
						<tr>
							<td colspan="2" class="spacer"></td>
						</tr>
						<tr>
							<td valign="top"><strong>User Full Name</strong>:</td>
							<td valign="top"><input type="text" name="contactperson" value="{$contactperson}" class="input req" maxlength="120" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Designation</strong>:</td>
							<td valign="top"><input type="text" name="designation" value="{$designation}" class="input" maxlength="120" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Contact Email</strong>:</td>
							<td valign="top"><input type="text" name="contactemail" value="{$contactemail}" class="input req" maxlength="120" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Contact Phone</strong>:</td>
							<td valign="top"><input type="text" name="contactphone" value="{$contactphone}" class="input" maxlength="15" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td colspan="2" align="left"><strong>Allow Access to Part Types</strong>:</td>
						</tr>
						<tr>
							<td colspan="2" align="left">
								{section name=i loop=$ptypelist}
								<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="{$ptypelist[i].typeid}" {if $ptypelist[i].chk eq '1'} checked {/if}> {$ptypelist[i].typenm} </label>&nbsp;&nbsp;&nbsp;&nbsp;{if $ptypelist[i].brk eq 1}<br>{/if}
								{/section}
							</td>
						</tr>
						<tr>
							<td colspan="2" align="left"><strong>Allow Access to Admin Sections</strong> (<em>Warehouse User can't access these sections</em>):</td>
						</tr>
						<tr>
							<td colspan="2" align="left">
								<label><input type="checkbox" name="addpart" id="addpart" {if $addpart eq '1'} checked {/if}>Add Parts </label>
								<label><input type="checkbox" name="imports" id="imports" {if $imports eq '1'} checked {/if}>Imports </label>
								<label><input type="checkbox" name="reports" id="reports" {if $reports eq '1'} checked {/if}>Reports </label>
							</td>
						</tr>
					</table>
					<div class="row">
						<div id="action_bar">
							<input type="submit" name="submit" value="Update" class="button">
							<a href="users_mgmt_view.php?mode=show&id={$webadmid}" class="button btn_gray">Back</a>
						</div>
					</div>
					<input type="hidden" name="mode" value="">
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div>