<?php
/* Smarty version 3.1.30, created on 2023-02-13 14:18:50
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/add_new_item.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea46ca0edec7_21669503',
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
  'includes' => 
  array (
  ),
),false)) {
function content_63ea46ca0edec7_21669503 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '183841160763ea46ca0db172_05781864';
echo '<script'; ?>
 language="javascript" src="js/validatedt.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 language="javascript">
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
<?php echo '</script'; ?>
>

<div class="pageheading"><a href="add_part.php?mode=show" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Add Part - <?php echo $_smarty_tpl->tpl_vars['ptypenm']->value;?>
</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value != '') {?>
			<h3 class="redText"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h3>
			<?php }?>
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
								<td><strong><?php echo $_smarty_tpl->tpl_vars['ptypenm']->value;?>
</strong></td>
							</tr>
							<tr>
								<td>Total Target :</td>
								<td><input name="target_stock" type="text" class="input onlyNumber" value="<?php echo $_smarty_tpl->tpl_vars['target_stock']->value;?>
" maxlength="8" /></td>
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
								<td><input name="sell_price" type="text" class="input onlyNumber" value="<?php echo $_smarty_tpl->tpl_vars['sell_price']->value;?>
" maxlength="12" /></td>
								<td width="140">&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<?php if ($_smarty_tpl->tpl_vars['oeoemopt']->value == '1') {?>
							<tr>
								<td valign="top">OE Number :</td>
								<td colspan="3" valign="top"><textarea name="oe_number" id="oe_number" class="input" style="height: 70px;"><?php echo $_smarty_tpl->tpl_vars['oe_number']->value;?>
</textarea></td>
							</tr>
							<tr>
								<td valign="top">OEM Number :</td>
								<td colspan="3" valign="top"><textarea name="oem_number" id="oem_number" class="input" style="height: 70px;"><?php echo $_smarty_tpl->tpl_vars['oem_number']->value;?>
</textarea></td>
							</tr>
							<?php }?>
							<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['attributelist']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
							<?php if ($_smarty_tpl->tpl_vars['attributelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['chk'] == '1') {?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['attributelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attributename'];?>
 :</td>
								<td><input name="attr[<?php echo $_smarty_tpl->tpl_vars['attributelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attrid'];?>
]" type="text" class="input" value="" maxlength="250" /></td>
								<td colspan="2">&nbsp;</td>
							</tr>
							<?php }?>
							<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
							<tr>
								<td>Manufacturer :</td>
								<td><input name="manufacturer" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['manufacturer']->value;?>
" maxlength="250" /></td>
								<td>Make :</td>
								<td><input name="make" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['make']->value;?>
" maxlength="250" /></td>
							</tr>
							<tr>
								<td>Model :</td>
								<td><input name="model" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['model']->value;?>
" maxlength="250" /></td>
								<td>Years :</td>
								<td><input name="years" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['years']->value;?>
" maxlength="250" /></td>
							</tr>
							<tr>
								<td valign="top">Notes :</td>
								<td colspan="3" valign="top"><textarea name="notes" id="notes" class="input" style="height: 70px;"><?php echo $_smarty_tpl->tpl_vars['notes']->value;?>
</textarea></td>
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
							<?php
$__section_i_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['customerlist']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total != 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
							<?php if ($_smarty_tpl->tpl_vars['customerlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['chk'] == '1') {?>
							<tr>
								<td width="140" valign="middle"><?php echo $_smarty_tpl->tpl_vars['customerlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['custname'];?>
 :</td>
								<td><input name="cust[<?php echo $_smarty_tpl->tpl_vars['customerlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['custid'];?>
]" type="text" class="input" value="" maxlength="250" /></td>
							</tr>
							<?php }?>
							<?php
}
}
if ($__section_i_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_1_saved;
}
?>
						</table>
					</div>
					<div class="row">
						<div id="action_bar">
							<input name="addnew" value="Save" class="button" type="submit">
							<a href="add_part.php?mode=show" class="button btn_gray">Back</a> 
						</div>
					</div>
					<input type="hidden" name="parttype" value="<?php echo $_smarty_tpl->tpl_vars['parttype']->value;?>
">
					<input type="hidden" name="oeoemopt" value="<?php echo $_smarty_tpl->tpl_vars['oeoemopt']->value;?>
">
					<input type="hidden" name="stockopt" value="<?php echo $_smarty_tpl->tpl_vars['stockopt']->value;?>
">
					<input type="hidden" name="mode" value="">
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div><?php }
}
