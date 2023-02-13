<?php
/* Smarty version 3.1.30, created on 2023-02-11 06:52:15
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/manage_podata.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e73b1f9968c5_15372469',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '130fc35a11f7f887b76cbca176ac90e097f441a2' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/manage_podata.tpl',
      1 => 1581308049,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63e73b1f9968c5_15372469 (Smarty_Internal_Template $_smarty_tpl) {
?>
<script language="javascript" src="js/validatedt.js"></script>

<script language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

		if(isWhitespace(frm.ponum.value)) {
			error += "Please enter the PO number.";
		}

		if(error.length != 0) {
			alert(error);
			return false;
		} else {
			frm.pageaction.value = 'deleteporder';
			return true;
		}

	}

	function valFormso(frm)
	{
		var error = "";

		if(isWhitespace(frm.sonum.value)) {
			error += "Please enter the SO number.";
		}

		if(error.length != 0) {
			alert(error);
			return false;
		} else {
			frm.pageaction.value = 'deletesorder';
			return true;
		}

	}
//-->
</script>

<div class="pageheading"> <a href="parts.php?mode=show&type=1" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> MANAGE PURCHASE/SALES ORDER</h1>
	<div class="add">
		<div class="search_form">&nbsp;</div>
	</div>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
						<h5 class="redText">&nbsp;</h5>
					</div>
		<div class="GD-70">
			<div class="form_table">
				<form name="frm" method="post" action="manage_podata.php?mode=show" onSubmit="return valForm(this)"> 
					<div class="row">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th align="left">DELETE A PURCHASE ORDER</th>
								</tr>
							</thead>
							<tr>
								<td class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td valign="top"><strong>Enter PO Number you want to delete</strong>:&nbsp;&nbsp;<input name="ponum" type="text" class="input req" value="" maxlength="50" style="max-width: 250px;" />&nbsp;&nbsp;<input type="submit" name="delete" value="Delete" class="button">
								</td>
							</tr>
						</table>
 					</div>
					<!-- <div class="row">
						<div id="action_bar">
							
						</div>
					</div> -->
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
		<div class="GD-70">
			<div class="form_table">
				<form name="frmso" method="post" action="manage_podata.php?mode=show" onSubmit="return valFormso(this)"> 
					<div class="row">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th align="left">DELETE A SALES ORDER</th>
								</tr>
							</thead>
							<tr>
								<td class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td valign="top"><strong>Enter Sales Order No. you want to delete</strong>:&nbsp;&nbsp;<input name="sonum" type="text" class="input req" value="" maxlength="50" style="max-width: 250px;" />&nbsp;&nbsp;<input type="submit" name="deleteso" value="Delete" class="button">
								</td>
							</tr>
						</table>
 					</div>
					<!-- <div class="row">
						<div id="action_bar">
							
						</div>
					</div> -->
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div><?php }
}
