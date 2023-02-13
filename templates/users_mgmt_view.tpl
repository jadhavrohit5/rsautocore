{literal}
<script language="JavaScript">
function changestatus(str) 
{
	if(confirm("Are you sure to suspend/disable this User?"))
		location.replace(str);
}
</script>
{/literal}
<div class="pageheading"><a href="users_mgmt.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE USERS"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> View User Details</h1>
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
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th colspan="4" align="left">User Details for "<strong>{$wadmusername}</strong>"</th>
							</tr>
						</thead>
						<tr>
							<td colspan="4" class="spacer">&nbsp;</td>
						</tr>
						<tr>
							<td valign="top" width="18%"><strong>User Login Name:</strong></td>
							<td valign="top" width="32%">{$wadmusername}</td>
						<!-- </tr>
						<tr> -->
							<td valign="top" width="18%"><strong>User Status:</strong></td>
							<td valign="top" width="32%">{if $webadmstatus eq '1'}Active{else}Suspended{/if}</td>
						</tr>
						<tr>
							<td valign="top"><strong>User Type</strong>:</td>
							<td valign="top">{$wadmusertype}</td>
						<!-- </tr>
						<tr> -->
							<td valign="top"><strong>User Created On:</strong></td>
							<td valign="top">{$webcreatedon}</td>
						</tr>
						<tr>
							<td valign="top"><strong>User Full Name:</strong></td>
							<td valign="top"><b>{$contactperson}</b></td>
						<!-- </tr>
						<tr> -->
							<td valign="top"><strong>User Designation:</strong></td>
							<td valign="top">{$designation}</td>
						</tr>
						<tr>
							<td valign="top"><strong><!-- User  -->Contact Email:</strong></td>
							<td valign="top">{$contactemail}</td>
						<!-- </tr>
						<tr> -->
							<td valign="top"><strong><!-- User  -->Contact Phone:</strong></td>
							<td valign="top">{$contactphone}</td>
						</tr>
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
						<tr>
							<td colspan="4" valign="top"><a href="users_mgmt_edit.php?mode=show&id={$webadmid}" class="grLink">Edit User Details</a></td>
						</tr>
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
						<tr>
							<td colspan="4" valign="top"><a href="users_changepwd.php?mode=show&id={$webadmid}" class="grLink">Change Password</a></td>
						</tr>
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
						{if $wadmusertpid ne 3}
						<tr>
							<td colspan="4" valign="top">{if $webadmstatus eq '1'}<a href="JavaScript:changestatus('users_mgmt_view.php?mode=changestatus&id={$webadmid}&status=0');" class="grLink">Suspend this User</a>&nbsp;&nbsp;(<i>for restricting access to RSA Applcation</i>){else}<a href="users_mgmt_view.php?mode=changestatus&id={$webadmid}&status=1" class="grLink">Enable this User</a>&nbsp;&nbsp;(<i>for allowing access to RSA Applcation</i>){/if}</td>
						</tr>
						{/if}
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
						<tr>
							<td colspan="2" align="left" valign="top"><strong>Allowed access to part types</strong>:<br>
								{section name=i loop=$ptypelist}
								{if $ptypelist[i].chk eq '1'} {$ptypelist[i].typenm}<br> {/if}
								{/section}
							</td>
							<td colspan="2" align="left" valign="top"><strong>Allowed access to admin sections</strong>:<br>
								{if $addpart eq '1'} Add Parts<br> {/if}
								{if $imports eq '1'} Imports<br> {/if}
								{if $reports eq '1'} Reports<br> {/if}
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
</div>