<script language="javascript" src="js/validatedt.js"></script>
{literal}
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
{/literal}
<div class="pageheading"><a href="add_part.php?mode=show" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Add Part - {$ptypenm}</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
			{if $msg ne ""}
			<h3 class="redText">{$msg}</h3>
			{/if}
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
								<td><strong>{$ptypenm}</strong></td>
							</tr>
							<tr>
								<td>Total Target :</td>
								<td><input name="target_stock" type="text" class="input onlyNumber" value="{$target_stock}" maxlength="8" /></td>
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
								<td><input name="sell_price" type="text" class="input onlyNumber" value="{$sell_price}" maxlength="12" /></td>
								<td width="140">&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							{if $oeoemopt eq '1'}
							<tr>
								<td valign="top">OE Number :</td>
								<td colspan="3" valign="top"><textarea name="oe_number" id="oe_number" class="input" style="height: 70px;">{$oe_number}</textarea>{*<!-- <input name="oe_number" type="text" class="input" value="{$oe_number}" maxlength="250" /> -->*}</td>
							</tr>
							<tr>
								<td valign="top">OEM Number :</td>
								<td colspan="3" valign="top"><textarea name="oem_number" id="oem_number" class="input" style="height: 70px;">{$oem_number}</textarea>{*<!-- <input name="oem_number" type="text" class="input" value="{$oem_number}" maxlength="250" /> -->*}</td>
							</tr>
							{/if}
							{section name=i loop=$attributelist}
							{if $attributelist[i].chk eq '1'}
							<tr>
								<td>{$attributelist[i].attributename} :</td>
								<td><input name="attr[{$attributelist[i].attrid}]" type="text" class="input" value="" maxlength="250" /></td>
								<td colspan="2">&nbsp;</td>
							</tr>
							{/if}
							{/section}
							<tr>
								<td>Manufacturer :</td>
								<td><input name="manufacturer" type="text" class="input" value="{$manufacturer}" maxlength="250" /></td>
								<td>Make :</td>
								<td><input name="make" type="text" class="input" value="{$make}" maxlength="250" /></td>
							</tr>
							<tr>
								<td>Model :</td>
								<td><input name="model" type="text" class="input" value="{$model}" maxlength="250" /></td>
								<td>Years :</td>
								<td><input name="years" type="text" class="input" value="{$years}" maxlength="250" /></td>
							</tr>
							<tr>
								<td valign="top">Notes :</td>
								<td colspan="3" valign="top"><textarea name="notes" id="notes" class="input" style="height: 70px;">{$notes}</textarea></td>
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
							{section name=i loop=$customerlist}
							{if $customerlist[i].chk eq '1'}
							<tr>
								<td width="140" valign="middle">{$customerlist[i].custname} :</td>
								<td><input name="cust[{$customerlist[i].custid}]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
							{/if}
							{/section}
						</table>
					</div>
					<div class="row">
						<div id="action_bar">
							<input name="addnew" value="Save" class="button" type="submit">
							<a href="add_part.php?mode=show" class="button btn_gray">Back</a> 
						</div>
					</div>
					<input type="hidden" name="parttype" value="{$parttype}">
					<input type="hidden" name="oeoemopt" value="{$oeoemopt}">
					<input type="hidden" name="stockopt" value="{$stockopt}">
					<input type="hidden" name="mode" value="">
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div>