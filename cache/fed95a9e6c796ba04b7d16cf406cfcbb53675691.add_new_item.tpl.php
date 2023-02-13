<?php
/* Smarty version 3.1.30, created on 2023-02-13 14:18:50
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/add_new_item.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea46ca0f4495_87656477',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ffdcced14a10a6b5d73a5f87ee0335dca1d1297' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/add_new_item.tpl',
      1 => 1674727790,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63ea46ca0f4495_87656477 (Smarty_Internal_Template $_smarty_tpl) {
?>
<script language="javascript" src="js/validatedt.js"></script>

<script language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

		if(isWhitespace(frm.rsac.value)) {
			error += "Please enter RSAC.";
		}

		//if(isWhitespace(frm.make.value)) {
		//	error += "Please select Make.";
		//}

		if(error.length != 0) {
			alert(error);
			//document.getElementById('warning').innerHTML = error;
			return false;
		} else {
			frm.mode.value = 'postnewpart';
			frm.pageaction.value = 'postnewpart';
			return true;
		}

	}
//-->
</script>

<div class="pageheading"><a href="add_part.php?mode=show" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Add Part - AC COMPRESSOR</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
					</div>
		<div class="GD-70">
			<div class="form_table">
				<form name="frm" method="post" action="add_new_item.php" class="validate disable" onSubmit="return valForm(this)"> 
					<div class="row">
						<table width="100%">
							<thead>
								<tr>
									<th colspan="4" align="left">Enter New Part Details</th>
								</tr>
							</thead>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td width="140">RSAC :</td>
								<td><input name="rsac" type="text" class="input req alphanumeric" value="" maxlength="250" /></td>
								<td width="140">Part Type :</td>
								<td><strong>AC COMPRESSOR</strong></td>
							</tr>
							<tr>
								<td>Total Target :</td>
								<td><input name="target_stock" type="text" class="input onlyNumber" value="" maxlength="8" /></td>
								<td colspan="2">&nbsp;</td>
							</tr>
						</table>
						<table width="100%">
							<thead>
								<tr>
									<th colspan="4" align="left">PART DATA</th>
								</tr>
							</thead>
							<tr>
								<td width="140">Sell Price :</td>
								<td><input name="sell_price" type="text" class="input onlyNumber" value="" maxlength="12" /></td>
								<td width="140">&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
																																										<tr>
								<td>Pulley Diameter :</td>
								<td><input name="attr[2]" type="text" class="input" value="" maxlength="250" /></td>
								<td colspan="2">&nbsp;</td>
							</tr>
																																										<tr>
								<td>Purchase Price :</td>
								<td><input name="attr[4]" type="text" class="input" value="" maxlength="250" /></td>
								<td colspan="2">&nbsp;</td>
							</tr>
																																																																																																																																																										<tr>
								<td>Pulley Grooves :</td>
								<td><input name="attr[14]" type="text" class="input" value="" maxlength="250" /></td>
								<td colspan="2">&nbsp;</td>
							</tr>
																												<tr>
								<td>Pulley Type :</td>
								<td><input name="attr[15]" type="text" class="input" value="" maxlength="250" /></td>
								<td colspan="2">&nbsp;</td>
							</tr>
																												<tr>
								<td>Plug Pins :</td>
								<td><input name="attr[16]" type="text" class="input" value="" maxlength="250" /></td>
								<td colspan="2">&nbsp;</td>
							</tr>
																												<tr>
								<td>Weight :</td>
								<td><input name="attr[17]" type="text" class="input" value="" maxlength="250" /></td>
								<td colspan="2">&nbsp;</td>
							</tr>
																																																																																																																																																										<tr>
								<td>Mounting Points :</td>
								<td><input name="attr[27]" type="text" class="input" value="" maxlength="250" /></td>
								<td colspan="2">&nbsp;</td>
							</tr>
																																																																																				<tr>
								<td>Compressor ID :</td>
								<td><input name="attr[32]" type="text" class="input" value="" maxlength="250" /></td>
								<td colspan="2">&nbsp;</td>
							</tr>
																												<tr>
								<td>Gas Type :</td>
								<td><input name="attr[33]" type="text" class="input" value="" maxlength="250" /></td>
								<td colspan="2">&nbsp;</td>
							</tr>
																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																								<tr>
								<td>Rear Head No :</td>
								<td><input name="attr[71]" type="text" class="input" value="" maxlength="250" /></td>
								<td colspan="2">&nbsp;</td>
							</tr>
																												<tr>
								<td>Clutch Number :</td>
								<td><input name="attr[72]" type="text" class="input" value="" maxlength="250" /></td>
								<td colspan="2">&nbsp;</td>
							</tr>
																																																	<tr>
								<td>Manufacturer :</td>
								<td><input name="manufacturer" type="text" class="input" value="" maxlength="250" /></td>
								<td>Make :</td>
								<td><input name="make" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
							<tr>
								<td>Model :</td>
								<td><input name="model" type="text" class="input" value="" maxlength="250" /></td>
								<td>Years :</td>
								<td><input name="years" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
							<tr>
								<td valign="top">Notes :</td>
								<td colspan="3" valign="top"><textarea name="notes" id="notes" class="input" style="height: 70px;"></textarea></td>
							</tr>
						</table>
						<table width="100%">
							<thead>
								<tr>
									<th colspan="2" align="left">OE STOCK DATA</th>
								</tr>
							</thead>
							<tr>
								<td width="140">OE 1# :</td>
								<td><input name="oeone" type="text" class="input" value="" maxlength="250" /></td>
								<td width="140">OE 2# :</td>
								<td><input name="oetwo" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
							<tr>
								<td>OEM 1# :</td>
								<td><input name="oemone" type="text" class="input" value="" maxlength="250" /></td>
								<td>OEM 2# :</td>
								<td><input name="oemtwo" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
							<tr>
								<td>Quantity :</td>
								<td><input name="qtydata" type="text" class="input onlyNumber" value="" maxlength="12" /></td>
								<td>Location :</td>
								<td><input name="location" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
						</table>					
						<table width="100%">
							<thead>
								<tr>
									<th colspan="2" align="left">CUSTOMER DATA</th>
								</tr>
							</thead>
																																																																																																																							<tr>
								<td width="140" valign="middle">Elstock :</td>
								<td><input name="cust[8]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
																																																																						<tr>
								<td width="140" valign="middle">Lizarte :</td>
								<td><input name="cust[13]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
																																																																																																																																																																																																																																																																																																																																																																																																																																																																<tr>
								<td width="140" valign="middle">Cevam :</td>
								<td><input name="cust[45]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
																																																																																																																																																																																																																																																																																																																																																														<tr>
								<td width="140" valign="middle">Airstal :</td>
								<td><input name="cust[69]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
																																																																																																																																																																																																																																																																																																																				<tr>
								<td width="140" valign="middle">Four Seasons :</td>
								<td><input name="cust[90]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
																												<tr>
								<td width="140" valign="middle">Valeo :</td>
								<td><input name="cust[91]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
																				</table>
					</div>
					<div class="row">
						<div id="action_bar">
							<input name="addnew" value="Save" class="button" type="submit">
							<a href="add_part.php?mode=show" class="button btn_gray">Back</a> 
						</div>
					</div>
					<input type="hidden" name="parttype" value="15">
					<input type="hidden" name="oeoemopt" value="0">
					<input type="hidden" name="stockopt" value="1">
					<input type="hidden" name="mode" value="">
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div><?php }
}
