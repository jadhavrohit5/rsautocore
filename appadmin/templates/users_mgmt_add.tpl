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
	if(isWhitespace(frm.country.value)) {
		error += "Please select the country.\n";
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
							<td colspan="3">Vendor <input type="hidden" name="wadmusertype" value="Vendor"></td>
						</tr>
						<tr>
							<td valign="top"><strong>User Login Name</strong>*:</td>
							<td valign="top" colspan="3"><input type="text" name="wadmusername" value="{$wadmusername}" class="input req" maxlength="40" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top" width="18%"><strong>User Password</strong>*:</td>
							<td valign="top" width="32%"><input type="password" name="wadmuserpass" class="input req" value="{$wadmuserpass}" maxlength="20" style="max-width: 150px;" /></td>
							<td valign="top" width="18%"><strong>Repeat Password</strong>*:</td>
							<td valign="top" width="32%"><input type="password" name="radmuserpass" class="input req" value="" maxlength="20" style="max-width: 150px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>User Full Name</strong>*:</td>
							<td valign="top"><input type="text" name="contactperson" value="{$contactperson}" class="input req" maxlength="120" style="max-width: 250px;" /></td>
							<td valign="top"><strong>Designation</strong>:</td>
							<td valign="top"><input type="text" name="designation" value="{$designation}" class="input" maxlength="120" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Contact Email</strong>*:</td>
							<td valign="top"><input type="text" name="contactemail" value="{$contactemail}" class="input req" maxlength="120" style="max-width: 250px;" /></td>
							<td valign="top"><strong>Contact Phone</strong>:</td>
							<td valign="top"><input type="text" name="contactphone" value="{$contactphone}" class="input" maxlength="15" style="max-width: 150px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Country</strong>*:</td>
							<td valign="top">
								<select name="country" class="req">
									<option value="" selected>Select country</option>
										<option value="United Kingdom">United Kingdom</option>
										<option value="Albania">Albania</option>
										<option value="Andorra">Andorra</option>
										<option value="Austria">Austria</option>
										<option value="Belarus">Belarus</option>
										<option value="Belgium">Belgium</option>
										<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
										<option value="Bulgaria">Bulgaria</option>
										<option value="Croatia">Croatia</option>
										<option value="Cyprus">Cyprus</option>
										<option value="Czech Republic">Czech Republic</option>
										<option value="Denmark">Denmark</option>
										<option value="Estonia">Estonia</option>
										<option value="Faroe Islands">Faroe Islands</option>
										<option value="Finland">Finland</option>
										<option value="France">France</option>
										<option value="Gibraltar">Gibraltar</option>
										<option value="Germany">Germany</option>
										<option value="Greece">Greece</option>
										<option value="Greenland">Greenland</option>
										<option value="Hungary">Hungary</option>
										<option value="Iceland">Iceland</option>
										<option value="Ireland">Ireland</option>
										<option value="Italy">Italy</option>
										<option value="Latvia">Latvia</option>
										<option value="Lithuania">Lithuania</option>
										<option value="Liechtenstein">Liechtenstein</option>
										<option value="Luxembourg">Luxembourg</option>
										<option value="Macedonia">Macedonia</option>
										<option value="Malta">Malta</option>
										<option value="Moldova">Moldova</option>
										<option value="Monaco">Monaco</option>
										<option value="Montenegro">Montenegro</option>
										<option value="Netherlands">Netherlands</option>
										<option value="Norway">Norway</option>
										<option value="Poland">Poland</option>
										<option value="Portugal">Portugal</option>
										<option value="Romania">Romania</option>
										<option value="San Marino">San Marino</option>
										<option value="Serbia">Serbia</option>
										<option value="Slovakia">Slovakia</option>
										<option value="Slovenia">Slovenia</option>
										<option value="Spain">Spain</option>
										<option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
										<option value="Sweden">Sweden</option>
										<option value="Switzerland">Switzerland</option>
										<option value="Turkey">Turkey</option>
										<option value="Ukraine">Ukraine</option>
										<option value="Vatican City">Vatican City</option>
								</select>
							</td>
							<td valign="top" colspan="2">&nbsp;</td>
						</tr>
						<!-- 15-10-2020  -->
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
						<!-- end  -->
						<!-- 04-08-2021   -->
						<tr>
							<td colspan="4" align="left"><strong>Allow Access to Searches</strong>:</td>
						</tr>
						<tr>
							<td colspan="4" align="left">
								<label><input type="radio" name="sch_opt" value="1"> RSA Database Search Only&nbsp;&nbsp;&nbsp;&nbsp;
								<label><input type="radio" name="sch_opt" value="2"> Number Plate Search Only&nbsp;&nbsp;&nbsp;&nbsp;
								<label><input type="radio" name="sch_opt" value="3"> Both Searches&nbsp;&nbsp;&nbsp;&nbsp;
							</td>
						</tr>
						<tr>
							<td colspan="4" align="left"><strong>Pricing Display on APP</strong>:</td>
						</tr>
						<tr>
							<td colspan="4" align="left">
								<label><input type="radio" name="app_price_display" value="4"> RSA Purchase Price&nbsp;&nbsp;&nbsp;&nbsp;
								<label><input type="radio" name="app_price_display" value="77"> Garage Price&nbsp;&nbsp;&nbsp;&nbsp;
								<label><input type="radio" name="app_price_display" value="78"> Motor Factor Price&nbsp;&nbsp;&nbsp;&nbsp;
								<label><input type="radio" name="app_price_display" value="79"> Dismantler Price&nbsp;&nbsp;&nbsp;&nbsp;
							</td>
						</tr>
						<!-- end  -->
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