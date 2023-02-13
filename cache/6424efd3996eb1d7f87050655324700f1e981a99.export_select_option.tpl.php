<?php
/* Smarty version 3.1.30, created on 2023-02-13 21:54:16
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/export_select_option.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eab188d8dc88_50639935',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'abb445af2220be96ccf96dbb0290c5b1fc130051' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/export_select_option.tpl',
      1 => 1675515131,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63eab188d8dc88_50639935 (Smarty_Internal_Template $_smarty_tpl) {
?>
<script language="javascript" src="js/validatedt.js"></script>

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

<div class="pageheading"><a href="export_select_type.php?mode=show" class="tooltip back_btn" title="SELECT PART TYPE"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> EXPORT DATA</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		
		<div class="GD-70">
			<p class="text_align_right"><a class="button btn_gray" href="export_datas.php?type=8" target="_blank">Export All</a></p>
			<p>*&nbsp;<em>Form below is for Exporting Parts Data to Worksheet for selected part type (LHD ELECTRIC).</em>
			<br>*&nbsp;<em>Please select the columns you want in your Export file by checking the respective checkboxes.</em>
			<br>*&nbsp;<em>Few columns are pre checked, you can uncheck them if you don't want any of them in your Export file.</em></p>
			<div class="form_table">
								<form name="frm" method="post" action="export_parts_data.php" onSubmit="return valForm(this)"> 
									<div class="row">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th colspan="2" align="left">Select Column Options For&nbsp;&nbsp;<strong>LHD ELECTRIC</strong></th>
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
<label>
<input type="checkbox" name="a_grade" id="a_grade" checked>
A Grade </label><br>
<label>
<input type="checkbox" name="b_grade" id="b_grade" checked>
B Grade </label><br>
<label>
<input type="checkbox" name="location" id="location" checked>
Location </label><br>
<label>
<input type="checkbox" name="target_stock" id="target_stock" checked>
Target Stock </label><br>
<label>
<input type="checkbox" name="sell_price" id="sell_price" checked>
Sell Price </label><br>
<label>
<input type="checkbox" name="oeoemopt" id="oeoemopt" >
OE/OEM Number </label><br><label>
<input type="checkbox" name="notes" id="notes" >
Notes </label><br>
								</td>
							</tr>
							<tr>
								<td valign="top"><strong>Part Attributes:</strong></td>
								<td valign="top">
<label>
<input type="checkbox" name="attr[]" id="attr[]" value="4" >
Purchase Price </label><br>
<label>
<input type="checkbox" name="attr[]" id="attr[]" value="8" >
Cast </label><br>
<label>
<input type="checkbox" name="attr[]" id="attr[]" value="9" >
Length </label><br>
<label>
<input type="checkbox" name="attr[]" id="attr[]" value="10" >
Turns </label><br>
<label>
<input type="checkbox" name="attr[]" id="attr[]" value="11" >
T-Rod Thread Size </label><br>
<label>
<input type="checkbox" name="attr[]" id="attr[]" value="12" >
Pinion Length </label><br>
<label>
<input type="checkbox" name="attr[]" id="attr[]" value="13" >
Pinion Type </label><br>
<label>
<input type="checkbox" name="attr[]" id="attr[]" value="16" >
Plug Pins </label><br>
<label>
<input type="checkbox" name="attr[]" id="attr[]" value="17" >
Weight </label><br>
<label>
<input type="checkbox" name="attr[]" id="attr[]" value="38" >
Lock Stops Size </label><br>
<label>
<input type="checkbox" name="attr[]" id="attr[]" value="39" >
Lock Stops Colour </label><br>
<label>
<input type="checkbox" name="attr[]" id="attr[]" value="69" >
Plug Wires </label><br>

								</td>
							</tr>
							<tr>
								<td valign="top"><strong>Customer References:</strong></td>
								<td valign="top"><!-- <br> -->
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="2" >
Cardone </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="3" >
MS-Group </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="4" >
CPI UK </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="5" >
Dasilva </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="6" >
Delco Remy </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="7" >
Motorherz </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="8" >
Elstock </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="9" >
ERA </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="11" >
Lauber </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="12" >
Lenco </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="13" >
Lizarte </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="15" >
Ricambi </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="16" >
Sercore </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="17" >
Servotec </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="20" >
TRW </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="21" >
URW </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="22" >
WAT </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="23" >
CF  </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="39" >
AX </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="44" >
Gidro </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="45" >
Cevam </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="46" >
Blockstem </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="47" >
Dipasport </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="48" >
BBB Industries </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="49" >
Depa </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="50" >
Facar </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="52" >
Reikanen </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="53" >
ATG </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="55" >
Bosch </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="56" >
Bosch 2 </label><br>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="57" >
TREEZER </label><br>
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
					<input name="parttype" type="hidden" value="LHD ELECTRIC" />
					<input type="hidden" name="stockopt" value="1">
					<input type="hidden" name="ptype" value="8">
					<input type="hidden" name="customercnt" value="89">
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div><?php }
}
