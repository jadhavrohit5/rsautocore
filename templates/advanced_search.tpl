<script language="javascript" src="js/validatedt.js"></script>
{literal}
<script language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

//		if(!isWhitespace(frm.attrval.value) && isWhitespace(frm.attrdata.value)) {
//			error += "Please enter Attribute data.";
//		}
 
		if(!isWhitespace(frm.custref.value) && isWhitespace(frm.custdata.value)) {
			error += "Please enter Customer Reference data.";
		}
 
		//if(isWhitespace(frm.custref.value) && isWhitespace(frm.custdata.value) && isWhitespace(frm.manufacturer.value) && isWhitespace(frm.make.value) && isWhitespace(frm.model.value) && isWhitespace(frm.pulley_size.value) && isWhitespace(frm.bar_pressure.value) && isWhitespace(frm.oe_number.value) && isWhitespace(frm.oem_number.value) && isWhitespace(frm.prtype.value) && isWhitespace(frm.cast.value) && isWhitespace(frm.location.value) && isWhitespace(frm.piston_mm.value) && isWhitespace(frm.pad_gap.value) && isWhitespace(frm.f_r.value) && isWhitespace(frm.purchase_price.value) && isWhitespace(frm.length.value) && isWhitespace(frm.turns.value) && isWhitespace(frm.trod_threadsize.value) && isWhitespace(frm.pinion_length.value) && isWhitespace(frm.pinion_type.value) && isWhitespace(frm.pulley_grooves.value) && isWhitespace(frm.pulley_type.value) && isWhitespace(frm.plug_pins.value) && isWhitespace(frm.weight.value) && isWhitespace(frm.bolt_diameter.value) && isWhitespace(frm.pinhole_diameter.value) && isWhitespace(frm.sensor.value)) {
		//	error += "Please enter atleast one search condition.";
		//}

//		if(isWhitespace(frm.attrval.value) && isWhitespace(frm.attrdata.value) && isWhitespace(frm.custref.value) && isWhitespace(frm.custdata.value) && isWhitespace(frm.manufacturer.value) && isWhitespace(frm.make.value) && isWhitespace(frm.model.value) && isWhitespace(frm.oe_number.value) && isWhitespace(frm.oem_number.value) && isWhitespace(frm.location.value)) {
//			error += "Please enter atleast one search condition.";
//		}

		if(error.length != 0) {
			alert(error);
			return false;
		} else {
			frm.pageaction.value = 'advsearch';
			return true;
		}

	}
//-->
</script>
{/literal}
<div class="pageheading"><a href="parts.php?mode=show&type={$ptype}" class="tooltip back_btn" title="BACK TO PARTS LIST"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Advance Search - {$ptypenm}</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
			{if $msg ne ""}
			<h3 class="redText">{$ptypenm}:&nbsp;{$msg}</h3>
			{else}
			<h3 class="redText">&nbsp;</h3>
			{/if}
		</div>
		<div class="GD-70">
			<div class="form_table">
				<form name="frm" method="post" action="advanced_search.php?mode=show&type={$ptype}" onSubmit="return valForm(this)"> 
					<div class="row">
						<table width="100%">
							<thead>
								<tr>
									<th colspan="4" align="left">ADVANCE SEARCH</th>
								</tr>
							</thead>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<!-- {*<tr>
								<td width="190">Attribute:</td>
								<td colspan="3">
									<select name="attrval" class="req" style="width:225px;">
										<option value="" selected>Any</option>
										{section name=i loop=$attributelist}
										{if $attributelist[i].chk eq '1'}
										<option value="{$attributelist[i].attrid}" {if $attributelist[i].attrid eq $attrval}selected{/if}>{$attributelist[i].attributename}</option>
										{/if}
										{/section}
									</select>
								&nbsp;&nbsp;<input name="attrdata" type="text" class="input" value="{$attrdata}" maxlength="100" style="width:300px;" /></td>
							</tr>*} -->
							<tr>
								<td width="190">Customer References:</td>
								<td colspan="3">
									<select name="custref" class="req" style="width:225px;">
										<option value="" selected>Any</option>
										{section name=i loop=$customerlist}
										{if $customerlist[i].chk eq '1'}
										<option value="{$customerlist[i].custid}" {if $customerlist[i].custid eq $custref}selected{/if}>{$customerlist[i].custname}</option>
										{/if}
										{/section}
									</select>
								&nbsp;&nbsp;<input name="custdata" type="text" class="input" value="{$custdata}" maxlength="100" style="width:300px;" /></td>
							</tr>
							<tr>
								<td>Manufacturer:</td>
								<td colspan="3"><input name="manufacturer" type="text" class="input" value="{$manufacturer}" maxlength="100" /></td>
							</tr>
							<tr>
								<td>Make:</td>
								<td colspan="3"><input name="make" type="text" class="input" value="{$make}" maxlength="100" /></td>
							</tr>
							<tr>
								<td>Model:</td>
								<td colspan="3"><input name="model" type="text" class="input" value="{$model}" maxlength="100" /></td>
							</tr>
							{*<!-- {if $pulley_size_opt eq '1'}
							<tr>
								<td>Pulley Size:</td>
								<td colspan="3"><input name="pulley_size" type="text" class="input" value="{$pulley_size}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="pulley_size" type="hidden" value="" />
							{/if}
							{if $bar_pressure_opt eq '1'}<tr>
							<tr>
								<td>Bar Pressue:</td>
								<td colspan="3"><input name="bar_pressure" type="text" class="input" value="{$bar_pressure}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="bar_pressure" type="hidden" value="" />
							{/if}
							{if $piston_mm_opt eq '1'}
							<tr>
								<td>Piston MM:</td>
								<td colspan="3"><input name="piston_mm" type="text" class="input" value="{$piston_mm}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="piston_mm" type="hidden" value="" />
							{/if}
							{if $pad_gap_opt eq '1'}
							<tr>
								<td>Pad Gap:</td>
								<td colspan="3"><input name="pad_gap" type="text" class="input" value="{$pad_gap}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="pad_gap" type="hidden" value="" />
							{/if}
							{if $fr_opt eq '1'}
							<tr>
								<td>F/R:</td>
								<td colspan="3"><input name="f_r" type="text" class="input" value="{$f_r}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="f_r" type="hidden" value="" />
							{/if}
							{if $prtype_opt eq '1'}
							<tr>
								<td>Type:</td>
								<td colspan="3"><input name="prtype" type="text" class="input" value="{$prtype}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="prtype" type="hidden" value="" />
							{/if}
							{if $cast_opt eq '1'}
							<tr>
								<td>Cast:</td>
								<td colspan="3"><input name="cast" type="text" class="input" value="{$cast}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="cast" type="hidden" value="" />
							{/if}
							{if $purchase_price_opt eq '1'}
							<tr>
								<td>Purchase Price :</td>
								<td colspan="3"><input name="purchase_price" type="text" class="input" value="{$purchase_price}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="purchase_price" type="hidden" value="" />
							{/if}
							{if $length_opt eq '1'}
							<tr>
								<td>Length :</td>
								<td colspan="3"><input name="length" type="text" class="input" value="{$length}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="length" type="hidden" value="" />
							{/if}
							{if $turns_opt eq '1'}
							<tr>
								<td>Turns :</td>
								<td colspan="3"><input name="turns" type="text" class="input" value="{$turns}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="turns" type="hidden" value="" />
							{/if}
							{if $trod_threadsize_opt eq '1'}
							<tr>
								<td>T-Rod Thread Size :</td>
								<td colspan="3"><input name="trod_threadsize" type="text" class="input" value="{$trod_threadsize}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="trod_threadsize" type="hidden" value="" />
							{/if}
							{if $pinion_length_opt eq '1'}
							<tr>
								<td>Pinion Length :</td>
								<td colspan="3"><input name="pinion_length" type="text" class="input" value="{$pinion_length}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="pinion_length" type="hidden" value="" />
							{/if}
							{if $pinion_type_opt eq '1'}
							<tr>
								<td>Pinion Type :</td>
								<td colspan="3"><input name="pinion_type" type="text" class="input" value="{$pinion_type}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="pinion_type" type="hidden" value="" />
							{/if}
							{if $pulley_grooves_opt eq '1'}
							<tr>
								<td>Pulley Grooves :</td>
								<td colspan="3"><input name="pulley_grooves" type="text" class="input" value="{$pulley_grooves}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="pulley_grooves" type="hidden" value="" />
							{/if}
							{if $pulley_type_opt eq '1'}
							<tr>
								<td>Pulley Type :</td>
								<td colspan="3"><input name="pulley_type" type="text" class="input" value="{$pulley_type}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="pulley_type" type="hidden" value="" />
							{/if}
							{if $plug_pins_opt eq '1'}
							<tr>
								<td>Plug Pins :</td>
								<td colspan="3"><input name="plug_pins" type="text" class="input" value="{$plug_pins}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="plug_pins" type="hidden" value="" />
							{/if}
							{if $weight_opt eq '1'}
							<tr>
								<td>Weight :</td>
								<td colspan="3"><input name="weight" type="text" class="input" value="{$weight}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="weight" type="hidden" value="" />
							{/if}
							{if $bolt_diameter_opt eq '1'}
							<tr>
								<td>Bolt Diameter :</td>
								<td colspan="3"><input name="bolt_diameter" type="text" class="input" value="{$bolt_diameter}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="bolt_diameter" type="hidden" value="" />
							{/if}
							{if $pinhole_diameter_opt eq '1'}
							<tr>
								<td>Pin Hole Diameter :</td>
								<td colspan="3"><input name="pinhole_diameter" type="text" class="input" value="{$pinhole_diameter}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="pinhole_diameter" type="hidden" value="" />
							{/if}
							{if $sensor_opt eq '1'}
							<tr>
								<td>Sensor :</td>
								<td colspan="3"><input name="sensor" type="text" class="input" value="{$sensor}" maxlength="100" /></td>
							</tr>
							{else}
								<input name="sensor" type="hidden" value="" />
							{/if} -->*}
							<tr>
								<td>OE Number:</td>
								<td colspan="3"><input name="oe_number" type="text" class="input" value="{$oe_number}" maxlength="100" /></td>
							</tr>
							<tr>
								<td>OEM Number:</td>
								<td colspan="3"><input name="oem_number" type="text" class="input" value="{$oem_number}" maxlength="100" /></td>
							</tr>
							<tr>
								<td>Location:</td>
								<td colspan="3"><input name="location" type="text" class="input" value="{$location}" maxlength="100" /></td>
							</tr>
							{section name=i loop=$attributelist}
							{if $attributelist[i].chk eq '1'}
							<tr>
								<td>{$attributelist[i].attributename} :</td>
								<td colspan="3"><input name="attr[{$attributelist[i].attrid}]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
							{/if}
							{/section}
						</table>
					</div>
					<div class="row">
						<div id="action_bar">
							<input name="addnew" value="Search" class="button" type="submit">
						</div>
					</div>
					<input type="hidden" name="mode" value="">
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div>