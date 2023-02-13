<script language="javascript" src="js/validatedt.js"></script>
{literal}
<script language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

		if(isWhitespace(frm.parttype.value)) {
			error += "Please enter the part type name.";
		}

		if(error.length != 0) {
			alert(error);
			return false;
		} else {
			frm.pageaction.value = 'exporttocsv';
			return true;
		}

	}
function check_uncheck_checkbox(isChecked) {
	if(isChecked) {
		$(':checkbox').each(function() {
			this.checked = true;
		});
	} else {
		$(':checkbox').each(function(index , checked) {
			var arr = [1,2,3,4,5,6,7,8,9,10];
			if($.inArray(index,arr) === -1 ){
				checked.checked = false;
			}
		});
	}
}
//-->
</script>
{/literal}
<div class="pageheading"><a href="export_select_type.php?mode=show" class="tooltip back_btn" title="SELECT PART TYPE"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> EXPORT DATA</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		{*<!-- <div class="row text_align_center">
			{if $msg ne ""}
			<h5 class="redText">{$msg}</h5>
			{else}
			<h5 class="redText">&nbsp;</h5>
			{/if}
		</div> -->  <!-- class="validate disable" --> *}
		<div class="GD-70">
			<p class="text_align_right">{if $oestockopt eq '1'}<a class="button btn_gray" href="export_datas_grp.php?type={$ptype}" target="_blank">Export All</a>{else}<a class="button btn_gray" href="export_datas.php?type={$ptype}" target="_blank">Export All</a>{/if}</p>
			<p>*&nbsp;<em>Form below is for Exporting Parts Data to Worksheet for selected part type ({$parttype}).</em>
			<br>*&nbsp;<em>Please select the columns you want in your Export file by checking the respective checkboxes.</em>
			<br>*&nbsp;<em>Few columns are pre checked, you can uncheck them if you don't want any of them in your Export file.</em></p>
			<div class="form_table">
				{if $oestockopt eq '1'}
				<form name="frm" method="post" action="export_parts_data_oes.php" onSubmit="return valForm(this)"> 
				{else}
				<form name="frm" method="post" action="export_parts_data.php" onSubmit="return valForm(this)"> 
				{/if}
					<div class="row">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th colspan="2" align="left">Select Column Options For&nbsp;&nbsp;<strong>{$parttype}</strong></th>
								</tr>
							</thead>
							<tr>
								<td valign="top" width="10%"><strong>Part Data:</strong></td>
								<td valign="top" width="90%"><!-- <br> -->
<label>
	<input type="checkbox" name="checkall" id="checkall" onClick="check_uncheck_checkbox(this.checked);">Check All
</label><br>
<label>
<input type="checkbox" name="rsacno" id="rsacno" checked disabled>
RSAC </label><br>
<label>
<input type="checkbox" name="manufacturer" id="manufacturer" checked>
Manufacturer </label><br>
<label>
<input type="checkbox" name="make" id="make" checked>
Make </label><br>
<label>
<input type="checkbox" name="model" id="model" checked>
Model </label><br>
<label>
<input type="checkbox" name="years" id="years" checked>
Years </label><br>
{if $oestockopt eq '0'}
<label>
<input type="checkbox" name="a_grade" id="a_grade" checked>
A Grade </label><br>
<label>
<input type="checkbox" name="b_grade" id="b_grade" checked>
B Grade </label><br>
<label>
<input type="checkbox" name="location" id="location" checked>
Location </label><br>
{/if}
<label>
<input type="checkbox" name="target_stock" id="target_stock" checked>
Target Stock </label><br>
<label>
<input type="checkbox" name="sell_price" id="sell_price" checked>
Sell Price </label><br>
{if $oeoemopt eq "1"}<label>
<input type="checkbox" name="oeoemopt" id="oeoemopt" >
OE/OEM Number </label><br>{/if}
<label>
<input type="checkbox" name="notes" id="notes" >
Notes </label><br>
{if $oestockopt eq '1'}
<label>
<input type="checkbox" name="oestocks" id="oestocks" checked>
OE Stock Data </label><br>
{/if}
								</td>
							</tr>
							<tr>
								<td valign="top"><strong>Part Attributes:</strong></td>
								<td valign="top">
{section name=i loop=$attributelist}
{if $attributelist[i].chk eq '1'}
<label>
<input type="checkbox" name="attr[]" id="attr[]" value="{$attributelist[i].attrid}" >
{$attributelist[i].attributename} </label><br>
{/if}
{/section}
{*<!--  -->*}
								</td>
							</tr>
							<tr>
								<td valign="top"><strong>Customer References:</strong></td>
								<td valign="top"><!-- <br> -->
{section name=i loop=$customerlist}
{if $customerlist[i].chk eq '1'}
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="{$customerlist[i].custid}" >
{$customerlist[i].custname} </label><br>
{/if}
{/section}
								</td>
							</tr>
							<!-- <tr>
								<td colspan="4">&nbsp;</td>
							</tr> -->
						</table>
 					</div>
					<div class="row">
						<div id="action_bar">
							<input type="submit" name="export" value="Export" class="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="export_select_type.php?mode=show" class="button btn_gray">Back</a>
						</div>
					</div>
					<input name="parttype" type="hidden" value="{$parttype}" />
					<input type="hidden" name="stockopt" value="1">
					<input type="hidden" name="ptype" value="{$ptype}">
					<input type="hidden" name="customercnt" value="{$customercnt}">
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div>