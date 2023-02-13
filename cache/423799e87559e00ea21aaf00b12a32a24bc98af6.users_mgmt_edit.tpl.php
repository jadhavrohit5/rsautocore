<?php
/* Smarty version 3.1.30, created on 2023-02-11 12:55:05
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/users_mgmt_edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e79029edda25_39196379',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59044b5da5a6c2ebb9903a6eae95eaab750846fa' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/users_mgmt_edit.tpl',
      1 => 1560135905,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63e79029edda25_39196379 (Smarty_Internal_Template $_smarty_tpl) {
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
					<form name="frm" method="post" action="users_mgmt_edit.php?id=Mg==" onSubmit="return valForm(this)">   
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th colspan="2" align="left">Edit User Details for "<strong>rsacuser</strong>"</th>
							</tr>
						</thead>
						<tr>
							<td colspan="2" class="spacer">&nbsp;</td>
						</tr>
						<tr>
							<td valign="top" width="160"><strong>User Login Name</strong>:</td>
							<td valign="top">rsacuser</td>
						</tr>
						<tr>
							<td valign="top"><strong>User Status</strong>:</td>
							<td valign="top">Active</td>
						</tr>
						<tr>
							<td valign="top"><strong>User Type</strong>:</td>
							<td valign="top">Warehouse User<input type="hidden" name="wadmusertype" value="siteuser"></td>
						</tr>
						<tr>
							<td colspan="2" class="spacer"></td>
						</tr>
						<tr>
							<td valign="top"><strong>User Full Name</strong>:</td>
							<td valign="top"><input type="text" name="contactperson" value="Peter Smith" class="input req" maxlength="120" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Designation</strong>:</td>
							<td valign="top"><input type="text" name="designation" value="" class="input" maxlength="120" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Contact Email</strong>:</td>
							<td valign="top"><input type="text" name="contactemail" value="peter.smith@linkdigital.co.uk" class="input req" maxlength="120" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Contact Phone</strong>:</td>
							<td valign="top"><input type="text" name="contactphone" value="" class="input" maxlength="15" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td colspan="2" align="left"><strong>Allow Access to Part Types</strong>:</td>
						</tr>
						<tr>
							<td colspan="2" align="left">
																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="1"  checked > STEERING PUMP </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="2"  checked > BRAKE CALIPER </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="3"  checked > LHD POWER </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="4"  checked > LHD MANUAL </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="5" > RHD POWER </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="6" > RHD MANUAL </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="7" > RHD ELECTRIC </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="8"  checked > LHD ELECTRIC </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="9" > EGR VALVE </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="10" > INJECTOR </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="11" > DIESEL PUMP </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="13" > DRIVESHAFT </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="14"  checked > TURBOCHARGER </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="15" > AC COMPRESSOR </label>&nbsp;&nbsp;&nbsp;&nbsp;																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="16" > ALTERNATOR </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="17" > STARTER MOTOR </label>&nbsp;&nbsp;&nbsp;&nbsp;															</td>
						</tr>
						<tr>
							<td colspan="2" align="left"><strong>Allow Access to Admin Sections</strong> (<em>Warehouse User can't access these sections</em>):</td>
						</tr>
						<tr>
							<td colspan="2" align="left">
								<label><input type="checkbox" name="addpart" id="addpart" >Add Parts </label>
								<label><input type="checkbox" name="imports" id="imports" >Imports </label>
								<label><input type="checkbox" name="reports" id="reports" >Reports </label>
							</td>
						</tr>
					</table>
					<div class="row">
						<div id="action_bar">
							<input type="submit" name="submit" value="Update" class="button">
							<a href="users_mgmt_view.php?mode=show&id=Mg==" class="button btn_gray">Back</a>
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
