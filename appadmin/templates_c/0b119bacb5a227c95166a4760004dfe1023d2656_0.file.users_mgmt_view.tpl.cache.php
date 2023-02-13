<?php
/* Smarty version 3.1.30, created on 2023-02-07 07:21:02
  from "/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/users_mgmt_view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e1fbde905203_10635415',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b119bacb5a227c95166a4760004dfe1023d2656' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/users_mgmt_view.tpl',
      1 => 1602736716,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e1fbde905203_10635415 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '139651588063e1fbde8f77b2_53936189';
?>

<?php echo '<script'; ?>
 language="JavaScript">
function changestatus(str) 
{
	if(confirm("Are you sure to suspend/disable this User?"))
		location.replace(str);
}
<?php echo '</script'; ?>
>

<div class="pageheading"><a href="users_mgmt.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE USERS"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> View User Details</h1>
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
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th colspan="4" align="left">User Details for "<strong><?php echo $_smarty_tpl->tpl_vars['wadmusername']->value;?>
</strong>"</th>
							</tr>
						</thead>
						<tr>
							<td colspan="4" class="spacer">&nbsp;</td>
						</tr>
						<tr>
							<td valign="top" width="20%"><strong>User Login Name:</strong></td>
							<td valign="top" width="30%"><?php echo $_smarty_tpl->tpl_vars['wadmusername']->value;?>
</td>
							<td valign="top" width="20%"><strong>User Status:</strong></td>
							<td valign="top" width="30%"><?php if ($_smarty_tpl->tpl_vars['webadmstatus']->value == '1' && $_smarty_tpl->tpl_vars['usrsuspend']->value == '0') {?>Active<?php } else { ?>Suspended<?php }?></td>
						</tr>
						<tr>
							<td valign="top"><strong>User Type</strong>:</td>
							<td valign="top"><?php echo $_smarty_tpl->tpl_vars['wadmusertype']->value;?>
</td>
							<td valign="top"><strong>User Created On:</strong></td>
							<td valign="top"><?php echo $_smarty_tpl->tpl_vars['webcreatedon']->value;?>
</td>
						</tr>
						<tr>
							<td valign="top"><strong>User Full Name:</strong></td>
							<td valign="top"><b><?php echo $_smarty_tpl->tpl_vars['contactperson']->value;?>
</b></td>
							<td valign="top"><strong>User Designation:</strong></td>
							<td valign="top"><?php echo $_smarty_tpl->tpl_vars['designation']->value;?>
</td>
						</tr>
						<tr>
							<td valign="top"><strong>Contact Email:</strong></td>
							<td valign="top"><?php echo $_smarty_tpl->tpl_vars['contactemail']->value;?>
</td>
							<td valign="top"><strong>Contact Phone:</strong></td>
							<td valign="top"><?php echo $_smarty_tpl->tpl_vars['contactphone']->value;?>
</td>
						</tr>
						<tr>
							<td valign="top"><strong>Country:</strong></td>
							<td valign="top"><?php echo $_smarty_tpl->tpl_vars['country']->value;?>
</td>
							<td valign="top" colspan="2">&nbsp;</td>
						</tr>
						<!-- 15-10-2020  -->
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
						<tr>
							<td colspan="4" align="left" valign="top"><strong>Allowed access to part types</strong>:<br>
								<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['ptypelist']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
								<?php if ($_smarty_tpl->tpl_vars['ptypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['chk'] == '1') {?> <?php echo $_smarty_tpl->tpl_vars['ptypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['typenm'];?>
<br> <?php }?>
								<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
							</td>
						</tr>
						<!-- end  -->
						<?php if ($_smarty_tpl->tpl_vars['webadmstatus']->value == '1' && $_smarty_tpl->tpl_vars['usrsuspend']->value == '1') {?>
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
						<tr>
							<td colspan="4" valign="top"><em>User suspended for over use of application</em></td>
						</tr>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['webadmstatus']->value == '1' && $_smarty_tpl->tpl_vars['usrblocked']->value == '1') {?>
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
						<tr>
							<td colspan="4" valign="top"><em>User temporarily blocked for too many search attempts.</em></td>
						</tr>
						<?php }?>
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
						<tr>
							<td colspan="4" valign="top"><a href="users_mgmt_edit.php?mode=show&id=<?php echo $_smarty_tpl->tpl_vars['webadmid']->value;?>
" class="grLink">Edit User Details</a></td>
						</tr>
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
						<tr>
							<td colspan="4" valign="top"><a href="users_changepwd.php?mode=show&id=<?php echo $_smarty_tpl->tpl_vars['webadmid']->value;?>
" class="grLink">Change Password</a></td>
						</tr>
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
						<?php if ($_smarty_tpl->tpl_vars['wadmusertpid']->value != 3) {?>
						<tr>
							<td colspan="4" valign="top"><?php if ($_smarty_tpl->tpl_vars['webadmstatus']->value == '1' && $_smarty_tpl->tpl_vars['usrsuspend']->value == '0') {?><a href="JavaScript:changestatus('users_mgmt_view.php?mode=changestatus&id=<?php echo $_smarty_tpl->tpl_vars['webadmid']->value;?>
&status=0');" class="grLink">Suspend this User</a>&nbsp;&nbsp;(<i>for restricting access to RSA Applcation</i>)<?php } else { ?><a href="users_mgmt_view.php?mode=changestatus&id=<?php echo $_smarty_tpl->tpl_vars['webadmid']->value;?>
&status=1" class="grLink">Enable this User</a>&nbsp;&nbsp;(<i>for allowing access to RSA Applcation</i>)<?php }?></td>
						</tr>
						<?php }?>
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
					</table>
				</div>
				<div class="row">
					<div id="action_bar">&nbsp;</div>
				</div>
			</div>
		</div>
	</div>
</div><?php }
}
