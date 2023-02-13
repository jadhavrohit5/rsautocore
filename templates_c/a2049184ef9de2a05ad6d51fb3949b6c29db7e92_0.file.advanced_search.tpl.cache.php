<?php
/* Smarty version 3.1.30, created on 2023-02-13 23:09:47
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/advanced_search.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eac33bd20286_52114113',
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
  'includes' => 
  array (
  ),
),false)) {
function content_63eac33bd20286_52114113 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '12139819263eac33bd0df11_36234050';
echo '<script'; ?>
 language="javascript" src="js/validatedt.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 language="javascript">
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
<?php echo '</script'; ?>
>

<div class="pageheading"><a href="parts.php?mode=show&type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
" class="tooltip back_btn" title="BACK TO PARTS LIST"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Advance Search - <?php echo $_smarty_tpl->tpl_vars['ptypenm']->value;?>
</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value != '') {?>
			<h3 class="redText"><?php echo $_smarty_tpl->tpl_vars['ptypenm']->value;?>
:&nbsp;<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h3>
			<?php } else { ?>
			<h3 class="redText">&nbsp;</h3>
			<?php }?>
		</div>
		<div class="GD-70">
			<div class="form_table">
				<form name="frm" method="post" action="advanced_search.php?mode=show&type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
" onSubmit="return valForm(this)"> 
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
										<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['customerlist']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
										<?php if ($_smarty_tpl->tpl_vars['customerlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['chk'] == '1') {?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['customerlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['custid'];?>
" <?php if ($_smarty_tpl->tpl_vars['customerlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['custid'] == $_smarty_tpl->tpl_vars['custref']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['customerlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['custname'];?>
</option>
										<?php }?>
										<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
									</select>
								&nbsp;&nbsp;<input name="custdata" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['custdata']->value;?>
" maxlength="100" style="width:300px;" /></td>
							</tr>
							<tr>
								<td>Manufacturer:</td>
								<td colspan="3"><input name="manufacturer" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['manufacturer']->value;?>
" maxlength="100" /></td>
							</tr>
							<tr>
								<td>Make:</td>
								<td colspan="3"><input name="make" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['make']->value;?>
" maxlength="100" /></td>
							</tr>
							<tr>
								<td>Model:</td>
								<td colspan="3"><input name="model" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['model']->value;?>
" maxlength="100" /></td>
							</tr>
							
							<tr>
								<td>OE Number:</td>
								<td colspan="3"><input name="oe_number" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['oe_number']->value;?>
" maxlength="100" /></td>
							</tr>
							<tr>
								<td>OEM Number:</td>
								<td colspan="3"><input name="oem_number" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['oem_number']->value;?>
" maxlength="100" /></td>
							</tr>
							<tr>
								<td>Location:</td>
								<td colspan="3"><input name="location" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['location']->value;?>
" maxlength="100" /></td>
							</tr>
							<?php
$__section_i_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['attributelist']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total != 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
							<?php if ($_smarty_tpl->tpl_vars['attributelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['chk'] == '1') {?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['attributelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attributename'];?>
 :</td>
								<td colspan="3"><input name="attr[<?php echo $_smarty_tpl->tpl_vars['attributelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attrid'];?>
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
