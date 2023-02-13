<script language="javascript" src="js/validatedt.js"></script>
{literal}
<script language="JavaScript">
<!--
function valForm(frm)
{
	var error = "";

	if(isWhitespace(frm.wadmusertype.value)) {
		error += "Please select the user type.\n";
	}
	if(isWhitespace(frm.wadmusername.value)) {
		error += "Please enter the login name.\n";
	}
	if (isWhitespace(frm.wadmuserpass.value)) {
		error += "Please enter the password.\n";
	} else {			
		if(frm.wadmuserpass.value.length<6) {
			error += "Password must have 6 or more charaters.\n";
		}
	} 
	if(isWhitespace(frm.radmuserpass.value)) {
		error += "Please retype the password.\n";
	} else {
		if(frm.wadmuserpass.value != frm.radmuserpass.value) {
			error += "The password and retype password are not same.\n";
		}
	}
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
		frm.mode.value = 'add';
		frm.pageaction.value = 'add';
		return true;
	}
}
//-->
</script>
{/literal}
<div class="pageheading"><a href="users_mgmt.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE USERS"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Add New User</h1>
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
					<form name="frm" method="post" action="users_mgmt_add.php" onSubmit="return valForm(this)">   
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th colspan="4" align="left">Add User Details</strong>"</th>
							</tr>
						</thead>
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
						<tr>
							<td colspan="4" align="left"> * Fields are mandatory</td>
						</tr>
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
						<tr>
							<td valign="top">User Type:</td>
							<td colspan="3">
								<select name="wadmusertype" class="req" style="width:225px;">
									<option value="" selected>Select User Type</option>
									<option value="adminuser" {if $wadmusertype eq 1}selected{/if}>Admin User</option>
									<option value="siteuser" {if $wadmusertype eq 2}selected{/if}>Warehouse User</option>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="top"><strong>User Login Name</strong>*:</td>
							<td valign="top" colspan="3"><input type="text" name="wadmusername" value="" class="input req" maxlength="40" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top" width="18%"><strong>User Password</strong>*:</td>
							<td valign="top" width="32%"><input type="password" name="wadmuserpass" class="input req" value="" maxlength="20" style="max-width: 150px;" /></td>
						<!-- </tr>
						<tr> -->
							<td valign="top" width="18%"><strong>Repeat Password</strong>*:</td>
							<td valign="top" width="32%"><input type="password" name="radmuserpass" class="input req" value="" maxlength="20" style="max-width: 150px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>User Full Name</strong>*:</td>
							<td valign="top"><input type="text" name="contactperson" value="{$contactperson}" class="input req" maxlength="120" style="max-width: 250px;" /></td>
						<!-- </tr>
						<tr> -->
							<td valign="top"><strong>Designation</strong>:</td>
							<td valign="top"><input type="text" name="designation" value="{$designation}" class="input" maxlength="120" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Contact Email</strong>*:</td>
							<td valign="top"><input type="text" name="contactemail" value="{$contactemail}" class="input req" maxlength="120" style="max-width: 250px;" /></td>
						<!-- </tr>
						<tr> -->
							<td valign="top"><strong>Contact Phone</strong>:</td>
							<td valign="top"><input type="text" name="contactphone" value="{$contactphone}" class="input" maxlength="15" style="max-width: 150px;" /></td>
						</tr>
						<tr>
							<td colspan="4" align="left"><strong>Allow Access to Part Types</strong>:</td>
						</tr>
						<tr>
							<td colspan="4" align="left">
								{section name=i loop=$ptypelist}
								<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="{$ptypelist[i].typeid}">
								{$ptypelist[i].typenm} </label>&nbsp;&nbsp;&nbsp;&nbsp;{if $ptypelist[i].brk eq 1}<br>{/if}
								{/section}
							</td>
						</tr>
						<tr>
							<td colspan="4" align="left"><strong>Allow Access to Admin Sections</strong> (<em>Warehouse User can't access these sections</em>):</td>
						</tr>
						<tr>
							<td colspan="4" align="left">
								<label><input type="checkbox" name="addpart" id="addpart" >Add Parts </label>
								<label><input type="checkbox" name="imports" id="imports" >Imports </label>
								<label><input type="checkbox" name="reports" id="reports" >Reports </label>
								<br><br><em>* Users can access selected Admin Sections only for the selected Part Types</em>
							</td>
						</tr>
					</table>
					<div class="row">
						<div id="action_bar">
							<input type="submit" name="submit" value="Submit" class="button">
							<a href="users_mgmt.php?mode=show" class="button btn_gray">Back</a>
						</div>
					</div>
					<input type="hidden" name="mode" value="">
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div>