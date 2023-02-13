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
			frm.pageaction.value = 'updateptype';
			return true;
		}

	}
//-->
</script>
{/literal}
<div class="pageheading"><a href="manage_part_type.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE PART CATEGORIES"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Edit Part Category</h1>
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
				<form name="frm" method="post" action="edit_part_type.php?mode=show&ptype={$ptype}" onSubmit="return valForm(this)"> 
					<div class="row">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th colspan="4" align="left">EDIT PART CATEGORY</th>
								</tr>
							</thead>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td valign="top" width="22%"><strong>Part Type</strong>:</td>
								<td valign="top" colspan="3" width="78%"><input name="parttype" type="text" class="input req alphanumeric" value="{$parttype}" maxlength="150" />
								</td>
							</tr>
							<tr>
								<td valign="top">Select Part Attributes:</td>
								<td valign="top" colspan="3">
									{section name=i loop=$attributelist}
									<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="{$attributelist[i].attrid}" {if $attributelist[i].chk eq '1'} checked {/if}>
									{$attributelist[i].attributename} </label>&nbsp;&nbsp;&nbsp;&nbsp;{if $attributelist[i].brk eq 1}<br>{/if}
									{/section}
								</td>
							</tr>
							{*<!-- <tr>
								<td valign="top">Select Part Attributes:</td>
								<td valign="top" colspan="3">
									<label>
									<input type="checkbox" name="prtype" id="prtype" {if $prtype eq '1'} checked {/if}>
									Type </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="pulley_size" id="pulley_size" {if $pulley_size eq '1'} checked {/if}>
									Pulley Size </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="bar_pressure" id="bar_pressure" {if $bar_pressure eq '1'} checked {/if}>
									Bar Pressure </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="purchase_price" id="purchase_price" {if $purchase_price eq '1'} checked {/if}>
									Purchase Price </label><br>
									<label>
									<input type="checkbox" name="piston_mm" id="piston_mm" {if $piston_mm eq '1'} checked {/if}>
									Piston MM </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="pad_gap" id="pad_gap" {if $pad_gap eq '1'} checked {/if}>
									Pad Gap </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="fr_opt" id="fr_opt" {if $fr_opt eq '1'} checked {/if}>
									F/R </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="cast" id="cast" {if $cast eq '1'} checked {/if}>
									Cast </label><br>
									<label>
									<input type="checkbox" name="length" id="length" {if $length eq '1'} checked {/if}>
									Length </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="turns" id="turns" {if $turns eq '1'} checked {/if}>
									Turns </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="trod_threadsize" id="trod_threadsize" {if $trod_threadsize eq '1'} checked {/if}>
									T-Rod Thread Size </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="pinion_length" id="pinion_length" {if $pinion_length eq '1'} checked {/if}>
									Pinion Length </label><br>
									<label>
									<input type="checkbox" name="pinion_type" id="pinion_type" {if $pinion_type eq '1'} checked {/if}>
									Pinion Type </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="pulley_grooves" id="pulley_grooves" {if $pulley_grooves eq '1'} checked {/if}>
									Pulley Grooves </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="pulley_type" id="pulley_type" {if $pulley_type eq '1'} checked {/if}>
									Pulley Type </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="plug_pins" id="plug_pins" {if $plug_pins eq '1'} checked {/if}>
									Plug Pins </label><br>
									<label>
									<input type="checkbox" name="weight" id="weight" {if $weight eq '1'} checked {/if}>
									Weight </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="bolt_diameter" id="bolt_diameter" {if $bolt_diameter eq '1'} checked {/if}>
									Bolt Diameter </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="pinhole_diameter" id="pinhole_diameter" {if $pinhole_diameter eq '1'} checked {/if}>
									Pin Hole Diameter </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="checkbox" name="sensor" id="sensor" {if $sensor eq '1'} checked {/if}>
									Sensor </label>
								</td>
							</tr> -->*}
							<tr>
								<td valign="top">Have OE/OEM Number?</td>
								<td valign="top" colspan="3">
									<label>
									<input type="radio" name="oeoemopt" id="radio12" value="1" {if $stockopt eq "1"} checked {/if}>
									Yes </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="radio" name="oeoemopt" id="radio22" value="0" {if $oeoemopt eq "0"} checked {/if}>
									No</label>
								</td>
							</tr>
							<tr>
								<td valign="top">Select Customers:</td>
								<td valign="top" colspan="3">
									{section name=i loop=$customerlist}
									<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="{$customerlist[i].custid}" {if $customerlist[i].chk eq '1'} checked {/if}>
									{$customerlist[i].custname} </label>&nbsp;&nbsp;&nbsp;&nbsp;{if $customerlist[i].brk eq 1}<br>{/if}
									{/section}
								</td>
							</tr>
						</table>
 					</div>
					<div class="row">
						<div id="action_bar">
							<input name="addnew" value="Update" class="button" type="submit">
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