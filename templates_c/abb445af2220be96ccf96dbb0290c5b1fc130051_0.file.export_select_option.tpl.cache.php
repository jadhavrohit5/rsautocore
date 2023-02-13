<?php
/* Smarty version 3.1.30, created on 2023-02-13 21:54:16
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/export_select_option.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eab188d87962_50818301',
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
  'includes' => 
  array (
  ),
),false)) {
function content_63eab188d87962_50818301 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '135545577863eab188d71611_75921709';
echo '<script'; ?>
 language="javascript" src="js/validatedt.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 language="javascript">
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
<?php echo '</script'; ?>
>

<div class="pageheading"><a href="export_select_type.php?mode=show" class="tooltip back_btn" title="SELECT PART TYPE"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> EXPORT DATA</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		
		<div class="GD-70">
			<p class="text_align_right"><?php if ($_smarty_tpl->tpl_vars['oestockopt']->value == '1') {?><a class="button btn_gray" href="export_datas_grp.php?type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
" target="_blank">Export All</a><?php } else { ?><a class="button btn_gray" href="export_datas.php?type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
" target="_blank">Export All</a><?php }?></p>
			<p>*&nbsp;<em>Form below is for Exporting Parts Data to Worksheet for selected part type (<?php echo $_smarty_tpl->tpl_vars['parttype']->value;?>
).</em>
			<br>*&nbsp;<em>Please select the columns you want in your Export file by checking the respective checkboxes.</em>
			<br>*&nbsp;<em>Few columns are pre checked, you can uncheck them if you don't want any of them in your Export file.</em></p>
			<div class="form_table">
				<?php if ($_smarty_tpl->tpl_vars['oestockopt']->value == '1') {?>
				<form name="frm" method="post" action="export_parts_data_oes.php" onSubmit="return valForm(this)"> 
				<?php } else { ?>
				<form name="frm" method="post" action="export_parts_data.php" onSubmit="return valForm(this)"> 
				<?php }?>
					<div class="row">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th colspan="2" align="left">Select Column Options For&nbsp;&nbsp;<strong><?php echo $_smarty_tpl->tpl_vars['parttype']->value;?>
</strong></th>
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
<?php if ($_smarty_tpl->tpl_vars['oestockopt']->value == '0') {?>
<label>
<input type="checkbox" name="a_grade" id="a_grade" checked>
A Grade </label><br>
<label>
<input type="checkbox" name="b_grade" id="b_grade" checked>
B Grade </label><br>
<label>
<input type="checkbox" name="location" id="location" checked>
Location </label><br>
<?php }?>
<label>
<input type="checkbox" name="target_stock" id="target_stock" checked>
Target Stock </label><br>
<label>
<input type="checkbox" name="sell_price" id="sell_price" checked>
Sell Price </label><br>
<?php if ($_smarty_tpl->tpl_vars['oeoemopt']->value == "1") {?><label>
<input type="checkbox" name="oeoemopt" id="oeoemopt" >
OE/OEM Number </label><br><?php }?>
<label>
<input type="checkbox" name="notes" id="notes" >
Notes </label><br>
<?php if ($_smarty_tpl->tpl_vars['oestockopt']->value == '1') {?>
<label>
<input type="checkbox" name="oestocks" id="oestocks" checked>
OE Stock Data </label><br>
<?php }?>
								</td>
							</tr>
							<tr>
								<td valign="top"><strong>Part Attributes:</strong></td>
								<td valign="top">
<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['attributelist']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
if ($_smarty_tpl->tpl_vars['attributelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['chk'] == '1') {?>
<label>
<input type="checkbox" name="attr[]" id="attr[]" value="<?php echo $_smarty_tpl->tpl_vars['attributelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attrid'];?>
" >
<?php echo $_smarty_tpl->tpl_vars['attributelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attributename'];?>
 </label><br>
<?php }
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>

								</td>
							</tr>
							<tr>
								<td valign="top"><strong>Customer References:</strong></td>
								<td valign="top"><!-- <br> -->
<?php
$__section_i_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['customerlist']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total != 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
if ($_smarty_tpl->tpl_vars['customerlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['chk'] == '1') {?>
<label>
<input type="checkbox" name="cust[]" id="cust[]" value="<?php echo $_smarty_tpl->tpl_vars['customerlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['custid'];?>
" >
<?php echo $_smarty_tpl->tpl_vars['customerlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['custname'];?>
 </label><br>
<?php }
}
}
if ($__section_i_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_1_saved;
}
?>
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
					<input name="parttype" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['parttype']->value;?>
" />
					<input type="hidden" name="stockopt" value="1">
					<input type="hidden" name="ptype" value="<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
">
					<input type="hidden" name="customercnt" value="<?php echo $_smarty_tpl->tpl_vars['customercnt']->value;?>
">
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div><?php }
}
