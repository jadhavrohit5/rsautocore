<?php
/* Smarty version 3.1.30, created on 2023-02-13 23:09:47
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/advanced_search.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eac33bd257f9_16038216',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a2049184ef9de2a05ad6d51fb3949b6c29db7e92' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/advanced_search.tpl',
      1 => 1644388285,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63eac33bd257f9_16038216 (Smarty_Internal_Template $_smarty_tpl) {
?>
<script language="javascript" src="js/validatedt.js"></script>

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

<div class="pageheading"><a href="parts.php?mode=show&type=2" class="tooltip back_btn" title="BACK TO PARTS LIST"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Advance Search - BRAKE CALIPER</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
						<h3 class="redText">&nbsp;</h3>
					</div>
		<div class="GD-70">
			<div class="form_table">
				<form name="frm" method="post" action="advanced_search.php?mode=show&type=2" onSubmit="return valForm(this)"> 
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
							<!--  -->
							<tr>
								<td width="190">Customer References:</td>
								<td colspan="3">
									<select name="custref" class="req" style="width:225px;">
										<option value="" selected>Any</option>
																																																																																																																																																																										<option value="8" >Elstock</option>
																																																												<option value="11" >Lauber</option>
																																																																																																																																																																<option value="18" >Shaftec</option>
																																																												<option value="20" >TRW</option>
																																																																																																																																																																																																																												<option value="30" >Brake Engineering</option>
																																								<option value="31" >SBS</option>
																																								<option value="32" >Cardone USA</option>
																																																												<option value="34" >ABS</option>
																																																																																																																																												<option value="41" >RS Internal</option>
																																																																																																																																																																																																																												<option value="51" >FTE</option>
																																																																																																																																																																																																																																																																																																																																																																																																																																																																												<option value="73" >Apec</option>
																																								<option value="74" >Rolling Components</option>
																																								<option value="75" >ECP</option>
																																								<option value="76" >Pagid</option>
																																								<option value="77" >Parts Aliance</option>
																																								<option value="78" >Brake Fit</option>
																																								<option value="79" >Juratek</option>
																																								<option value="80" >Brake Engineering 2</option>
																																								<option value="81" >Einbach</option>
																																																																																																																																																																																																																																					</select>
								&nbsp;&nbsp;<input name="custdata" type="text" class="input" value="" maxlength="100" style="width:300px;" /></td>
							</tr>
							<tr>
								<td>Manufacturer:</td>
								<td colspan="3"><input name="manufacturer" type="text" class="input" value="" maxlength="100" /></td>
							</tr>
							<tr>
								<td>Make:</td>
								<td colspan="3"><input name="make" type="text" class="input" value="" maxlength="100" /></td>
							</tr>
							<tr>
								<td>Model:</td>
								<td colspan="3"><input name="model" type="text" class="input" value="" maxlength="100" /></td>
							</tr>
							
							<tr>
								<td>OE Number:</td>
								<td colspan="3"><input name="oe_number" type="text" class="input" value="" maxlength="100" /></td>
							</tr>
							<tr>
								<td>OEM Number:</td>
								<td colspan="3"><input name="oem_number" type="text" class="input" value="" maxlength="100" /></td>
							</tr>
							<tr>
								<td>Location:</td>
								<td colspan="3"><input name="location" type="text" class="input" value="" maxlength="100" /></td>
							</tr>
																					<tr>
								<td>Type :</td>
								<td colspan="3"><input name="attr[1]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
																																																								<tr>
								<td>Purchase Price :</td>
								<td colspan="3"><input name="attr[4]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
																												<tr>
								<td>Piston MM :</td>
								<td colspan="3"><input name="attr[5]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
																												<tr>
								<td>Pad Gap :</td>
								<td colspan="3"><input name="attr[6]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
																																										<tr>
								<td>Cast :</td>
								<td colspan="3"><input name="attr[8]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
																																																																																																																																																																																																				<tr>
								<td>Position :</td>
								<td colspan="3"><input name="attr[21]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
																												<tr>
								<td>Disc Diameter :</td>
								<td colspan="3"><input name="attr[22]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
																												<tr>
								<td>Disc Width :</td>
								<td colspan="3"><input name="attr[23]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
																																																																																																																																																																																																																																																																																																																																																														<tr>
								<td>OE 1 (Clean) :</td>
								<td colspan="3"><input name="attr[50]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
																																																																																																																																																																																																																																																																																																																																																<tr>
								<td>Scrap Price :</td>
								<td colspan="3"><input name="attr[73]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
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
</div><?php }
}
