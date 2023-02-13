<?php
/* Smarty version 3.1.30, created on 2023-02-11 12:55:05
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/users_mgmt_edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e79029ed8031_28290235',
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
  'includes' => 
  array (
  ),
),false)) {
function content_63e79029ed8031_28290235 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '53199440863e79029ec43a4_92321768';
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
						<tr>
							<td colspan="2" align="left"><strong>Allow Access to Admin Sections</strong> (<em>Warehouse User can't access these sections</em>):</td>
						</tr>
						<tr>
							<td colspan="2" align="left">
								<label><input type="checkbox" name="addpart" id="addpart" <?php if ($_smarty_tpl->tpl_vars['addpart']->value == '1') {?> checked <?php }?>>Add Parts </label>
								<label><input type="checkbox" name="imports" id="imports" <?php if ($_smarty_tpl->tpl_vars['imports']->value == '1') {?> checked <?php }?>>Imports </label>
								<label><input type="checkbox" name="reports" id="reports" <?php if ($_smarty_tpl->tpl_vars['reports']->value == '1') {?> checked <?php }?>>Reports </label>
							</td>
						</tr>
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
