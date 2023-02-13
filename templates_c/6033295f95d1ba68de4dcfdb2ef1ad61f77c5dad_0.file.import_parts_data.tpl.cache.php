<?php
/* Smarty version 3.1.30, created on 2023-02-11 06:52:27
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/import_parts_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e73b2b459fa2_22246905',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6033295f95d1ba68de4dcfdb2ef1ad61f77c5dad' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/import_parts_data.tpl',
      1 => 1615373526,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e73b2b459fa2_22246905 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '61801946463e73b2b451256_70260992';
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
			error += "Please select the part type.";
		}
		if(isWhitespace(frm.excelfile.value)) {
			error += "Please upload the file.\n";
		}

		if(error.length != 0) {
			alert(error);
			return false;
		} else {
			frm.pageaction.value = 'selectptype';
			return true;
		}

	}
//-->
<?php echo '</script'; ?>
>

<div class="pageheading"><a href="parts.php?mode=show&type=1" class="tooltip back_btn" title="BACK TO PARTS LIST"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Import Parts Data</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
			<?php if ($_smarty_tpl->tpl_vars['errmsg']->value != '') {?>
			<p class="redText">&nbsp;<?php echo $_smarty_tpl->tpl_vars['errmsg']->value;?>
</p>
			<?php } elseif ($_smarty_tpl->tpl_vars['msg']->value != '') {?>
			<h3 class="redText">&nbsp;<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h3>
			<?php } else { ?>
			<h3 class="redText">&nbsp;</h3>
			<?php }?>
		</div>
		<div class="GD-70">
			<div class="form_table">
				<form name="frm" method="post" action="import_parts_data.php?mode=show" onSubmit="return valForm(this)" enctype="multipart/form-data" class="validate disable"> 
					<!-- <div class="row"> -->
						<table width="100%">
							<thead>
								<tr>
									<th colspan="4" align="left">IMPORT PARTS DATA</th>
								</tr>
							</thead>
							<tr>
								<td colspan="4" class="spacer">*&nbsp;<em>This section is for importing parts data for selected part type.</em></td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">*&nbsp;<em>This section will import parts data for one part type only.</em></td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">*&nbsp;<em>The import file should be a Excel worksheet with part data in multiple columns.</em></td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">*&nbsp;<em>RSAC or RS Ref No# must be in first column In the worksheet, if RSAC data is missing for a record, then that record will be skipped.</em></td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">*&nbsp;<em>For empty cells (no data), the import will do nothing. Only data from the populated cells will update the database.</em></td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">*&nbsp;<em>Processing time depend on the size of the uploaded worksheet.</em></td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="4"><em>Please Select Part Type and Upload worksheet for this Part Type</em></td>
							</tr>
							<tr>
								<td width="140">Part Type:</td>
								<td colspan="3">
									<select name="parttype" class="req" style="width:225px;">
										<option value="" selected>Select Part Type</option>
										<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['myparttypelist']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['myparttypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['typeid'];?>
"><?php echo $_smarty_tpl->tpl_vars['myparttypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttype'];?>
</option>
										<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
									</select>
								</td>
							</tr>
							<tr>
								<td width="140">Choose File:</td>
								<td colspan="3"><input type="file" name="excelfile" /></td>
							</tr>
						</table>
					<!-- </div> -->
					<div class="row">
						<div id="action_bar">
							<input type="submit" name="import_data" value="Import" class="button">
						</div>
					</div>
					<input type="hidden" name="importfor" value="partslist"  />
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div><?php }
}
