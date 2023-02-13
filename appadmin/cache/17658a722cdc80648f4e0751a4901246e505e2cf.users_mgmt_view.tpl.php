<?php
/* Smarty version 3.1.30, created on 2023-02-07 07:21:02
  from "/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/users_mgmt_view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e1fbde9093a5_16899169',
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
  'cache_lifetime' => 120,
),true)) {
function content_63e1fbde9093a5_16899169 (Smarty_Internal_Template $_smarty_tpl) {
?>

<script language="JavaScript">
function changestatus(str) 
{
	if(confirm("Are you sure to suspend/disable this User?"))
		location.replace(str);
}
</script>

<div class="pageheading"><a href="users_mgmt.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE USERS"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> View User Details</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
						<h5 class="redText">&nbsp;</h5>
					</div>
		<div class="GD-70">
			<div class="form_table">
				<div class="row">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th colspan="4" align="left">User Details for "<strong>appuser</strong>"</th>
							</tr>
						</thead>
						<tr>
							<td colspan="4" class="spacer">&nbsp;</td>
						</tr>
						<tr>
							<td valign="top" width="20%"><strong>User Login Name:</strong></td>
							<td valign="top" width="30%">appuser</td>
							<td valign="top" width="20%"><strong>User Status:</strong></td>
							<td valign="top" width="30%">Active</td>
						</tr>
						<tr>
							<td valign="top"><strong>User Type</strong>:</td>
							<td valign="top">Vendor</td>
							<td valign="top"><strong>User Created On:</strong></td>
							<td valign="top">4th December 6:45 AM</td>
						</tr>
						<tr>
							<td valign="top"><strong>User Full Name:</strong></td>
							<td valign="top"><b>S Das</b></td>
							<td valign="top"><strong>User Designation:</strong></td>
							<td valign="top"></td>
						</tr>
						<tr>
							<td valign="top"><strong>Contact Email:</strong></td>
							<td valign="top">d.sanatan@advenzia.co.uk</td>
							<td valign="top"><strong>Contact Phone:</strong></td>
							<td valign="top"></td>
						</tr>
						<tr>
							<td valign="top"><strong>Country:</strong></td>
							<td valign="top">France</td>
							<td valign="top" colspan="2">&nbsp;</td>
						</tr>
						<!-- 15-10-2020  -->
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
						<tr>
							<td colspan="4" align="left" valign="top"><strong>Allowed access to part types</strong>:<br>
																 Steering Pumps<br> 																 Brake Calipers<br> 																 LHD Steering<br> 																 RHD Steering<br> 																 EGR Valves<br> 																 Diesel Injectors<br> 																 Diesel Pumps<br> 																 Driveshafts<br> 																 Turbocharger<br> 																 AC Compressor<br> 																 Alternator<br> 																 Starter Motor<br> 															</td>
						</tr>
						<!-- end  -->
																		<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
						<tr>
							<td colspan="4" valign="top"><a href="users_mgmt_edit.php?mode=show&id=MTA=" class="grLink">Edit User Details</a></td>
						</tr>
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
						<tr>
							<td colspan="4" valign="top"><a href="users_changepwd.php?mode=show&id=MTA=" class="grLink">Change Password</a></td>
						</tr>
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
												<tr>
							<td colspan="4" valign="top"><a href="JavaScript:changestatus('users_mgmt_view.php?mode=changestatus&id=MTA=&status=0');" class="grLink">Suspend this User</a>&nbsp;&nbsp;(<i>for restricting access to RSA Applcation</i>)</td>
						</tr>
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
