<?php
/* Smarty version 3.1.30, created on 2023-02-13 14:18:55
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/add_part.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea46cf5fd5d2_18372255',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6a51b844d81540f6eac2ee984069b8e12e2b57a' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/add_part.tpl',
      1 => 1674705253,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63ea46cf5fd5d2_18372255 (Smarty_Internal_Template $_smarty_tpl) {
?>
<script language="javascript" src="js/validatedt.js"></script>

<script language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

		if(isWhitespace(frm.parttype.value)) {
			error += "Please select the part type.";
		}

		if(error.length != 0) {
			alert(error);
			return false;
		} else {
			//frm.mode.value = 'selectptype';
			frm.pageaction.value = 'selectptype';
			return true;
		}

	}
//-->
</script>

<div class="pageheading"><a href="parts.php?mode=show&type=1" class="tooltip back_btn" title="BACK TO PARTS LIST"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Add Part</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
						<h3 class="redText">AC COMPRESSOR:&nbsp;New part added successfully.</h3>
					</div>
		<div class="GD-70">
			<div class="form_table">
				<form name="frm" method="post" action="add_part.php" onSubmit="return valForm(this)"> 
					<div class="row">
						<table width="100%">
							<thead>
								<tr>
									<th colspan="4" align="left">ADD NEW PART</th>
								</tr>
							</thead>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="4"><em>Please Select Part Type</em></td>
							</tr>
							<tr>
								<td width="120">Part Type:</td>
								<td colspan="3">
									<select name="parttype" class="req" style="width:225px;">
										<option value="" selected>Select Part Type</option>
																				<option value="1">STEERING PUMP</option>
																				<option value="2">BRAKE CALIPER</option>
																				<option value="3">LHD POWER</option>
																				<option value="4">LHD MANUAL</option>
																				<option value="5">RHD POWER</option>
																				<option value="6">RHD MANUAL</option>
																				<option value="7">RHD ELECTRIC</option>
																				<option value="8">LHD ELECTRIC</option>
																				<option value="9">EGR VALVE</option>
																				<option value="10">INJECTOR</option>
																				<option value="11">DIESEL PUMP</option>
																				<option value="13">DRIVESHAFT</option>
																				<option value="14">TURBOCHARGER</option>
																				<option value="15">AC COMPRESSOR</option>
																				<option value="16">ALTERNATOR</option>
																				<option value="17">STARTER MOTOR</option>
																			</select>
								</td>
							</tr>
						</table>
					</div>
					<div class="row">
						<div id="action_bar">
							<input name="addnew" value="Continue" class="button" type="submit">
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
