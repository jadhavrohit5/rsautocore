<script language="javascript" src="js/validatedt.js"></script>
{literal}
<script language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

		var oeoemopts = document.getElementsByName('oeoemopt');
        var genValu1 = false;

		if(isWhitespace(frm.parttype.value)) {
			error += "Please enter the part type name.";
		}

        for(var i=0; i<oeoemopts.length;i++){
            if(oeoemopts[i].checked == true){
                genValu1 = true;
            }
        }
        if(!genValu1){
 			error += "Please select the OE/OEM Number option.\n";
        }
//
		if(error.length != 0) {
			alert(error);
			return false;
		} else {
			frm.pageaction.value = 'selectptype';
			return true;
		}

	}
//-->
</script>
{/literal}
<div class="pageheading"><a href="manage_part_type.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE PART CATEGORIES"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Add New Part Category</h1>
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
				<form name="frm" method="post" action="add_part_type.php?mode=show" onSubmit="return valForm(this)"> 
					<div class="row">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th colspan="4" align="left">ADD NEW PART CATEGORY</th>
								</tr>
							</thead>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td valign="top" width="22%"><strong>Part Type</strong>:</td>
								<td valign="top" colspan="3" width="78%"><input name="parttype" type="text" class="input req alphanumeric" value="" maxlength="150" />
								</td>
							</tr>
							<tr>
								<td valign="top">Select Part Attributes:</td>
								<td valign="top" colspan="3">
									{section name=i loop=$attributelist}
									<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="{$attributelist[i].attrid}">
									{$attributelist[i].attributename} </label>&nbsp;&nbsp;&nbsp;&nbsp;{if $attributelist[i].brk eq 1}<br>{/if}
									{/section}
								</td>
							</tr>
							{*<!-- <tr>
								<td valign="top">Select Part Attributes:</td>
								<td valign="top" colspan="3">
									<label>
									<input type="checkbox" name="prtype" id="prtype">
									Type </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="pulley_size" id="pulley_size">
									Pulley Size </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="bar_pressure" id="bar_pressure">
									Bar Pressure </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="purchase_price" id="purchase_price">
									Purchase Price </label><br>
									<label>
									<input type="checkbox" name="piston_mm" id="piston_mm">
									Piston MM </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="pad_gap" id="pad_gap">
									Pad Gap </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="fr_opt" id="fr_opt">
									F/R </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="cast" id="cast">
									Cast </label><br>
									<label>
									<input type="checkbox" name="length" id="length">
									Length </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="turns" id="turns">
									Turns </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="trod_threadsize" id="trod_threadsize">
									T-Rod Thread Size </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="pinion_length" id="pinion_length">
									Pinion Length </label><br>
									<label>
									<input type="checkbox" name="pinion_type" id="pinion_type">
									Pinion Type </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="pulley_grooves" id="pulley_grooves">
									Pulley Grooves </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="pulley_type" id="pulley_type">
									Pulley Type </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="plug_pins" id="plug_pins">
									Plug Pins </label><br>
									<label>
									<input type="checkbox" name="weight" id="weight">
									Weight </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="bolt_diameter" id="bolt_diameter">
									Bolt Diameter </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="pinhole_diameter" id="pinhole_diameter">
									Pin Hole Diameter </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="sensor" id="sensor">
									Sensor </label>
								</td>
							</tr> -->*}
							<tr>
								<td valign="top">Have OE/OEM Number?</td>
								<td valign="top" colspan="3">
									<label>
									<input type="radio" name="oeoemopt" id="radio12" value="1">
									Yes </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="radio" name="oeoemopt" id="radio22" value="0">
									No</label>
								</td>
							</tr>
							<tr>
								<td valign="top">Select Customers:</td>
								<td valign="top" colspan="3">
									{section name=i loop=$customerlist}
									<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="{$customerlist[i].custid}">
									{$customerlist[i].custname} </label>&nbsp;&nbsp;&nbsp;&nbsp;{if $customerlist[i].brk eq 1}<br>{/if}
									{/section}
								</td>
							</tr>
						</table>
 					</div>
					<div class="row">
						<div id="action_bar">
							<input name="addnew" value="Submit" class="button" type="submit">
						</div>
					</div>
					<input type="hidden" name="stockopt" value="1">
					{*<!-- <input type="hidden" name="customercnt" value="{$customercnt}"> -->*}
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div>