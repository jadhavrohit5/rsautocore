<?php
/* Smarty version 3.1.30, created on 2023-02-11 13:33:32
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/users_mgmt_view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e7992ca72a47_65081736',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12038667889cde734b699a8e4a56a35f2147e5bd' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/users_mgmt_view.tpl',
      1 => 1560137358,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63e7992ca72a47_65081736 (Smarty_Internal_Template $_smarty_tpl) {
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
								<th colspan="4" align="left">User Details for "<strong>admin</strong>"</th>
							</tr>
						</thead>
						<tr>
							<td colspan="4" class="spacer">&nbsp;</td>
						</tr>
						<tr>
							<td valign="top" width="18%"><strong>User Login Name:</strong></td>
							<td valign="top" width="32%">admin</td>
						<!-- </tr>
						<tr> -->
							<td valign="top" width="18%"><strong>User Status:</strong></td>
							<td valign="top" width="32%">Active</td>
						</tr>
						<tr>
							<td valign="top"><strong>User Type</strong>:</td>
							<td valign="top">Main Admin User</td>
						<!-- </tr>
						<tr> -->
							<td valign="top"><strong>User Created On:</strong></td>
							<td valign="top">6th December 1:16 PM</td>
						</tr>
						<tr>
							<td valign="top"><strong>User Full Name:</strong></td>
							<td valign="top"><b>admin</b></td>
						<!-- </tr>
						<tr> -->
							<td valign="top"><strong>User Designation:</strong></td>
							<td valign="top">admin</td>
						</tr>
						<tr>
							<td valign="top"><strong><!-- User  -->Contact Email:</strong></td>
							<td valign="top">Sonny@rsautocore.co.uk</td>
						<!-- </tr>
						<tr> -->
							<td valign="top"><strong><!-- User  -->Contact Phone:</strong></td>
							<td valign="top">7715859828</td>
						</tr>
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
						<tr>
							<td colspan="4" valign="top"><a href="users_mgmt_edit.php?mode=show&id=MQ==" class="grLink">Edit User Details</a></td>
						</tr>
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
						<tr>
							<td colspan="4" valign="top"><a href="users_changepwd.php?mode=show&id=MQ==" class="grLink">Change Password</a></td>
						</tr>
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
												<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
						<tr>
							<td colspan="2" align="left" valign="top"><strong>Allowed access to part types</strong>:<br>
																 STEERING PUMP<br> 																 BRAKE CALIPER<br> 																 LHD POWER<br> 																 LHD MANUAL<br> 																 RHD POWER<br> 																 RHD MANUAL<br> 																 RHD ELECTRIC<br> 																 LHD ELECTRIC<br> 																 EGR VALVE<br> 																 INJECTOR<br> 																 DIESEL PUMP<br> 																 DRIVESHAFT<br> 																 TURBOCHARGER<br> 																 AC COMPRESSOR<br> 																 ALTERNATOR<br> 																 STARTER MOTOR<br> 															</td>
							<td colspan="2" align="left" valign="top"><strong>Allowed access to admin sections</strong>:<br>
																															</td>
						</tr>
					</table>
				</div>
				<div class="row">
					<div id="action_bar">
						&nbsp;<!-- <a href="users_mgmt.php?mode=show" class="button btn_gray">Back</a> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div><?php }
}
