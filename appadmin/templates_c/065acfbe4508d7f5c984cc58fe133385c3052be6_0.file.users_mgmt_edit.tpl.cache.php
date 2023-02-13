<?php
/* Smarty version 3.1.30, created on 2023-01-31 11:14:55
  from "/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/users_mgmt_edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63d8f82fbf5043_57176085',
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
  'includes' => 
  array (
  ),
),false)) {
function content_63d8f82fbf5043_57176085 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '205708360563d8f82fbd02e2_74986964';
echo '<script'; ?>
 language="javascript" src="js/validatedt.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 language="JavaScript">
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
<?php echo '</script'; ?>
>

<div class="pageheading"><a href="users_mgmt.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE USERS"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Edit User Details</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value != '') {?>
			<h5 class="redText"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h5>
			<?php } else { ?>
			<h5 class="redText">&nbsp;</h5>
			<?php }?>
		</div>
		<div class="GD-70">
			<div class="form_table">
				<div class="row">
					<form name="frm" method="post" action="users_mgmt_edit.php?id=<?php echo $_smarty_tpl->tpl_vars['webadmid']->value;?>
" onSubmit="return valForm(this)">   
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th colspan="2" align="left">Edit User Details for "<strong><?php echo $_smarty_tpl->tpl_vars['wadmusername']->value;?>
</strong>"</th>
							</tr>
						</thead>
						<tr>
							<td colspan="2" class="spacer">&nbsp;</td>
						</tr>
						<tr>
							<td valign="top" width="160"><strong>User Login Name</strong>:</td>
							<td valign="top"><?php echo $_smarty_tpl->tpl_vars['wadmusername']->value;?>
</td>
						</tr>
						<tr>
							<td valign="top"><strong>User Status</strong>:</td>
							<td valign="top"><?php if ($_smarty_tpl->tpl_vars['webadmstatus']->value == '1') {?>Active<?php } else { ?>Suspended<?php }?></td>
						</tr>
						<tr>
							<td valign="top"><strong>User Type</strong>:</td>
							<td valign="top"><?php echo $_smarty_tpl->tpl_vars['wadmusertpnm']->value;?>
<input type="hidden" name="wadmusertype" value="<?php echo $_smarty_tpl->tpl_vars['wadmusertype']->value;?>
"></td>
						</tr>
						<tr>
							<td colspan="2" class="spacer"></td>
						</tr>
						<tr>
							<td valign="top"><strong>User Full Name</strong>:</td>
							<td valign="top"><input type="text" name="contactperson" value="<?php echo $_smarty_tpl->tpl_vars['contactperson']->value;?>
" class="input req" maxlength="120" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Designation</strong>:</td>
							<td valign="top"><input type="text" name="designation" value="<?php echo $_smarty_tpl->tpl_vars['designation']->value;?>
" class="input" maxlength="120" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Contact Email</strong>:</td>
							<td valign="top"><input type="text" name="contactemail" value="<?php echo $_smarty_tpl->tpl_vars['contactemail']->value;?>
" class="input req" maxlength="120" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Contact Phone</strong>:</td>
							<td valign="top"><input type="text" name="contactphone" value="<?php echo $_smarty_tpl->tpl_vars['contactphone']->value;?>
" class="input" maxlength="15" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Country</strong>*:</td>
							<td valign="top">
								<select name="country" class="req" style="width:255px;">
									<option value="" <?php if ($_smarty_tpl->tpl_vars['country']->value == '') {?>selected<?php }?>>Select country</option>
									<option value="United Kingdom" <?php if ($_smarty_tpl->tpl_vars['country']->value == "United Kingdom") {?>selected<?php }?>>United Kingdom</option>
									<option value="Albania" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Albania") {?>selected<?php }?>>Albania</option>
									<option value="Andorra" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Andorra") {?>selected<?php }?>>Andorra</option>
									<option value="Austria" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Austria") {?>selected<?php }?>>Austria</option>
									<option value="Belarus" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Belarus") {?>selected<?php }?>>Belarus</option>
									<option value="Belgium" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Belgium") {?>selected<?php }?>>Belgium</option>
									<option value="Bosnia and Herzegovina" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Bosnia and Herzegovina") {?>selected<?php }?>>Bosnia and Herzegovina</option>
									<option value="Bulgaria" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Bulgaria") {?>selected<?php }?>>Bulgaria</option>
									<option value="Croatia" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Croatia") {?>selected<?php }?>>Croatia</option>
									<option value="Cyprus" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Cyprus") {?>selected<?php }?>>Cyprus</option>
									<option value="Czech Republic" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Czech Republic") {?>selected<?php }?>>Czech Republic</option>
									<option value="Denmark" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Denmark") {?>selected<?php }?>>Denmark</option>
									<option value="Estonia" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Estonia") {?>selected<?php }?>>Estonia</option>
									<option value="Faroe Islands" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Faroe Islands") {?>selected<?php }?>>Faroe Islands</option>
									<option value="Finland" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Finland") {?>selected<?php }?>>Finland</option>
									<option value="France" <?php if ($_smarty_tpl->tpl_vars['country']->value == "France") {?>selected<?php }?>>France</option>
									<option value="Gibraltar" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Gibraltar") {?>selected<?php }?>>Gibraltar</option>
									<option value="Germany" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Germany") {?>selected<?php }?>>Germany</option>
									<option value="Greece" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Greece") {?>selected<?php }?>>Greece</option>
									<option value="Greenland" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Greenland") {?>selected<?php }?>>Greenland</option>
									<option value="Hungary" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Hungary") {?>selected<?php }?>>Hungary</option>
									<option value="Iceland" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Iceland") {?>selected<?php }?>>Iceland</option>
									<option value="Ireland" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Ireland") {?>selected<?php }?>>Ireland</option>
									<option value="Italy" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Italy") {?>selected<?php }?>>Italy</option>
									<option value="Latvia" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Latvia") {?>selected<?php }?>>Latvia</option>
									<option value="Lithuania" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Lithuania") {?>selected<?php }?>>Lithuania</option>
									<option value="Liechtenstein" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Liechtenstein") {?>selected<?php }?>>Liechtenstein</option>
									<option value="Luxembourg" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Luxembourg") {?>selected<?php }?>>Luxembourg</option>
									<option value="Macedonia" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Macedonia") {?>selected<?php }?>>Macedonia</option>
									<option value="Malta" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Malta") {?>selected<?php }?>>Malta</option>
									<option value="Moldova" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Moldova") {?>selected<?php }?>>Moldova</option>
									<option value="Monaco" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Monaco") {?>selected<?php }?>>Monaco</option>
									<option value="Montenegro" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Montenegro") {?>selected<?php }?>>Montenegro</option>
									<option value="Netherlands" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Netherlands") {?>selected<?php }?>>Netherlands</option>
									<option value="Norway" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Norway") {?>selected<?php }?>>Norway</option>
									<option value="Poland" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Poland") {?>selected<?php }?>>Poland</option>
									<option value="Portugal" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Portugal") {?>selected<?php }?>>Portugal</option>
									<option value="Romania" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Romania") {?>selected<?php }?>>Romania</option>
									<option value="San Marino" <?php if ($_smarty_tpl->tpl_vars['country']->value == "San Marino") {?>selected<?php }?>>San Marino</option>
									<option value="Serbia" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Serbia") {?>selected<?php }?>>Serbia</option>
									<option value="Slovakia" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Slovakia") {?>selected<?php }?>>Slovakia</option>
									<option value="Slovenia" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Slovenia") {?>selected<?php }?>>Slovenia</option>
									<option value="Spain" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Spain") {?>selected<?php }?>>Spain</option>
									<option value="Svalbard and Jan Mayen Islands" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Svalbard and Jan Mayen Islands") {?>selected<?php }?>>Svalbard and Jan Mayen Islands</option>
									<option value="Sweden" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Sweden") {?>selected<?php }?>>Sweden</option>
									<option value="Switzerland" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Switzerland") {?>selected<?php }?>>Switzerland</option>
									<option value="Turkey" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Turkey") {?>selected<?php }?>>Turkey</option>
									<option value="Ukraine" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Ukraine") {?>selected<?php }?>>Ukraine</option>
									<option value="Vatican City" <?php if ($_smarty_tpl->tpl_vars['country']->value == "Vatican City") {?>selected<?php }?>>Vatican City</option>
								</select>
							</td>
						</tr>
						<!-- 15-10-2020  -->
						
						<tr>
							<td colspan="2" align="left"><strong>Allow Access to Part Types</strong>:</td>
						</tr>
						<tr>
							<td colspan="2" align="left">
								<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['ptypelist']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
								<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="<?php echo $_smarty_tpl->tpl_vars['ptypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['typeid'];?>
" <?php if ($_smarty_tpl->tpl_vars['ptypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['chk'] == '1') {?> checked <?php }?>> <?php echo $_smarty_tpl->tpl_vars['ptypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['typenm'];?>
 </label>&nbsp;&nbsp;&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['ptypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['brk'] == 1) {?><br><?php }?>
								<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
							</td>
						</tr>
						<!-- end -->
						<!-- 04-08-2021   -->
						<tr>
							<td colspan="4" align="left"><strong>Allow Access to Searches</strong>:</td>
						</tr>
						<tr>
							<td colspan="4" align="left">
								<label><input type="radio" name="sch_opt" value="1" <?php if ($_smarty_tpl->tpl_vars['sch_opt']->value == '1') {?> checked <?php }?>> RSA Database Search Only&nbsp;&nbsp;&nbsp;&nbsp;
								<label><input type="radio" name="sch_opt" value="2" <?php if ($_smarty_tpl->tpl_vars['sch_opt']->value == '2') {?> checked <?php }?>> Number Plate Search Only&nbsp;&nbsp;&nbsp;&nbsp;
								<label><input type="radio" name="sch_opt" value="3" <?php if ($_smarty_tpl->tpl_vars['sch_opt']->value == '3') {?> checked <?php }?>> Both Searches&nbsp;&nbsp;&nbsp;&nbsp;
							</td>
						</tr>
						<!-- end  -->
					</table>
					<div class="row">
						<div id="action_bar">
							<input type="submit" name="submit" value="Update" class="button">
							<a href="users_mgmt_view.php?mode=show&id=<?php echo $_smarty_tpl->tpl_vars['webadmid']->value;?>
" class="button btn_gray">Back</a>
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
