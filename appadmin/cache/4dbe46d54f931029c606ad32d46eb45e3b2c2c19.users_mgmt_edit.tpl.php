<?php
/* Smarty version 3.1.30, created on 2023-01-31 11:14:55
  from "/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/users_mgmt_edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63d8f82fbfaf21_16146048',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '065acfbe4508d7f5c984cc58fe133385c3052be6' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/users_mgmt_edit.tpl',
      1 => 1637062219,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63d8f82fbfaf21_16146048 (Smarty_Internal_Template $_smarty_tpl) {
?>
<script language="javascript" src="js/validatedt.js"></script>

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
	if(isWhitespace(frm.country.value)) {
		error += "Please select the country.\n";
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

<div class="pageheading"><a href="users_mgmt.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE USERS"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Edit User Details</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
						<h5 class="redText">&nbsp;</h5>
					</div>
		<div class="GD-70">
			<div class="form_table">
				<div class="row">
					<form name="frm" method="post" action="users_mgmt_edit.php?id=MTk=" onSubmit="return valForm(this)">   
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th colspan="2" align="left">Edit User Details for "<strong>bjjdanidb@gmail.com</strong>"</th>
							</tr>
						</thead>
						<tr>
							<td colspan="2" class="spacer">&nbsp;</td>
						</tr>
						<tr>
							<td valign="top" width="160"><strong>User Login Name</strong>:</td>
							<td valign="top">bjjdanidb@gmail.com</td>
						</tr>
						<tr>
							<td valign="top"><strong>User Status</strong>:</td>
							<td valign="top">Active</td>
						</tr>
						<tr>
							<td valign="top"><strong>User Type</strong>:</td>
							<td valign="top">Vendor<input type="hidden" name="wadmusertype" value=""></td>
						</tr>
						<tr>
							<td colspan="2" class="spacer"></td>
						</tr>
						<tr>
							<td valign="top"><strong>User Full Name</strong>:</td>
							<td valign="top"><input type="text" name="contactperson" value="Dani" class="input req" maxlength="120" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Designation</strong>:</td>
							<td valign="top"><input type="text" name="designation" value="" class="input" maxlength="120" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Contact Email</strong>:</td>
							<td valign="top"><input type="text" name="contactemail" value="bjjdanidb@gmail.com" class="input req" maxlength="120" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Contact Phone</strong>:</td>
							<td valign="top"><input type="text" name="contactphone" value="" class="input" maxlength="15" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Country</strong>*:</td>
							<td valign="top">
								<select name="country" class="req" style="width:255px;">
									<option value="" >Select country</option>
									<option value="United Kingdom" >United Kingdom</option>
									<option value="Albania" >Albania</option>
									<option value="Andorra" >Andorra</option>
									<option value="Austria" >Austria</option>
									<option value="Belarus" >Belarus</option>
									<option value="Belgium" >Belgium</option>
									<option value="Bosnia and Herzegovina" >Bosnia and Herzegovina</option>
									<option value="Bulgaria" >Bulgaria</option>
									<option value="Croatia" >Croatia</option>
									<option value="Cyprus" >Cyprus</option>
									<option value="Czech Republic" >Czech Republic</option>
									<option value="Denmark" >Denmark</option>
									<option value="Estonia" >Estonia</option>
									<option value="Faroe Islands" >Faroe Islands</option>
									<option value="Finland" >Finland</option>
									<option value="France" >France</option>
									<option value="Gibraltar" >Gibraltar</option>
									<option value="Germany" >Germany</option>
									<option value="Greece" >Greece</option>
									<option value="Greenland" >Greenland</option>
									<option value="Hungary" >Hungary</option>
									<option value="Iceland" >Iceland</option>
									<option value="Ireland" >Ireland</option>
									<option value="Italy" >Italy</option>
									<option value="Latvia" >Latvia</option>
									<option value="Lithuania" >Lithuania</option>
									<option value="Liechtenstein" >Liechtenstein</option>
									<option value="Luxembourg" >Luxembourg</option>
									<option value="Macedonia" >Macedonia</option>
									<option value="Malta" >Malta</option>
									<option value="Moldova" >Moldova</option>
									<option value="Monaco" >Monaco</option>
									<option value="Montenegro" >Montenegro</option>
									<option value="Netherlands" >Netherlands</option>
									<option value="Norway" >Norway</option>
									<option value="Poland" >Poland</option>
									<option value="Portugal" >Portugal</option>
									<option value="Romania" >Romania</option>
									<option value="San Marino" >San Marino</option>
									<option value="Serbia" >Serbia</option>
									<option value="Slovakia" >Slovakia</option>
									<option value="Slovenia" >Slovenia</option>
									<option value="Spain" selected>Spain</option>
									<option value="Svalbard and Jan Mayen Islands" >Svalbard and Jan Mayen Islands</option>
									<option value="Sweden" >Sweden</option>
									<option value="Switzerland" >Switzerland</option>
									<option value="Turkey" >Turkey</option>
									<option value="Ukraine" >Ukraine</option>
									<option value="Vatican City" >Vatican City</option>
								</select>
							</td>
						</tr>
						<!-- 15-10-2020  -->
						
						<tr>
							<td colspan="2" align="left"><strong>Allow Access to Part Types</strong>:</td>
						</tr>
						<tr>
							<td colspan="2" align="left">
																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="1"  checked > Steering Pumps </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="2"  checked > Brake Calipers </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="3"  checked > LHD Steering </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="4"  checked > RHD Steering </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="5"  checked > EGR Valves </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="6"  checked > Diesel Injectors </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="7"  checked > Diesel Pumps </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="8"  checked > Driveshafts </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="9"  checked > Turbocharger </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="10"  checked > AC Compressor </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="11"  checked > Alternator </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="12"  checked > Starter Motor </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>															</td>
						</tr>
						<!-- end -->
						<!-- 04-08-2021   -->
						<tr>
							<td colspan="4" align="left"><strong>Allow Access to Searches</strong>:</td>
						</tr>
						<tr>
							<td colspan="4" align="left">
								<label><input type="radio" name="sch_opt" value="1"  checked > RSA Database Search Only&nbsp;&nbsp;&nbsp;&nbsp;
								<label><input type="radio" name="sch_opt" value="2" > Number Plate Search Only&nbsp;&nbsp;&nbsp;&nbsp;
								<label><input type="radio" name="sch_opt" value="3" > Both Searches&nbsp;&nbsp;&nbsp;&nbsp;
							</td>
						</tr>
						<!-- end  -->
					</table>
					<div class="row">
						<div id="action_bar">
							<input type="submit" name="submit" value="Update" class="button">
							<a href="users_mgmt_view.php?mode=show&id=MTk=" class="button btn_gray">Back</a>
						</div>
					</div>
					<input type="hidden" name="mode" value="">
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div><?php }
}
