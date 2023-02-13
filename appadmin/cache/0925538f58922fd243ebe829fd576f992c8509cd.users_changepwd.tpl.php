<?php
/* Smarty version 3.1.30, created on 2023-01-30 17:53:53
  from "/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/users_changepwd.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63d80431d55065_55155467',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf06e283d66e9eecfee097a9b60f33ffac97adc1' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/users_changepwd.tpl',
      1 => 1556678188,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63d80431d55065_55155467 (Smarty_Internal_Template $_smarty_tpl) {
?>
<script language="javascript" src="js/validatedt.js"></script>

<script language="JavaScript">
<!--
function valForm(frm)
{
	var error = "";

	if(isWhitespace(frm.wadmuserpass.value)) {
		error += "Please enter the new password.\n";
	} else {			
		if(frm.wadmuserpass.value.length<6) {
		//if(!validPassword(frm.wadmuserpass.value)) {
			//error += "Please enter valid password.\n";
			error += "Password must have 6 or more charaters.<br>";
		}			
	} 

	if(isWhitespace(frm.radmuserpass.value)) {
		error += "Please retype the password.\n";
	} else {
		if(frm.wadmuserpass.value != frm.radmuserpass.value) {
			error += "The password and retype password are not same.\n";
		}
	}

	if(error.length != 0) {
		alert(error);
		//document.getElementById('warning').innerHTML = error;
		return false;
	} else {
		frm.mode.value = 'updatepwd';
		frm.pageaction.value = 'updatepwd';
		return true;
	}
}
//-->
</script>

<div class="pageheading"><a href="users_mgmt.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE USERS"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> User Details <strong>Change Password</strong></h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
						<h5 class="redText">&nbsp;</h5>
					</div>
		<div class="GD-70">
			<div class="form_table">
				<form name="frm" method="post" action="users_changepwd.php?id=MTk=" onSubmit="return valForm(this)">
					<div class="row">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th colspan="2" align="left">CHANGE PASSWORD</th>
								</tr>
							</thead>
							<tr>
								<td colspan="2" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td valign="top" width="22%"><strong>User Login Name:</strong></td>
								<td valign="top" width="78%">bjjdanidb@gmail.com</td>
							</tr>
							<tr>
								<td valign="top"><strong>New User Password</strong>:</td>
								<td valign="top"><input type="password" name="wadmuserpass" class="input req" value="" maxlength="20" style="max-width: 200px;" />
								</td>
							</tr>
							<tr>
								<td valign="top"><strong>Repeat Password</strong>:</td>
								<td valign="top"><input type="password" name="radmuserpass" class="input req" value="" maxlength="20" style="max-width: 200px;" />
								</td>
							</tr>
						</table>
 					</div>
					<div class="row">
						<div id="action_bar">
							<input type="submit" name="submit" value="Submit" class="button">
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
