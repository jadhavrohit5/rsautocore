<?php
/* Smarty version 3.1.30, created on 2023-02-11 07:16:37
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/sales_data_report.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e740d5e895b5_54399505',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '829d56926e48e396d7c97dde49617bfc8e02d7b4' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/sales_data_report.tpl',
      1 => 1560146988,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e740d5e895b5_54399505 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '93845984663e740d5e7b4f0_26796387';
echo '<script'; ?>
 language="javascript" src="js/validatedt.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

		if(isWhitespace(frm.ptype.value)) {
			error += "Please select the part type.\n";
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
	<h1><i class="fa fa-cog"></i> Sales Data Reports</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value != '') {?>
			<h3 class="redText">&nbsp;<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h3>
			<?php } else { ?>
			<h3 class="redText">&nbsp;</h3>
			<?php }?>
		</div>
		<div class="GD-70">
			<div class="form_table">
				<form name="frm" method="post" action="sales_purchase_report.php?mode=show" onSubmit="return valForm(this)"> 
					<div class="row">
						<table width="100%">
							<thead>
								<tr>
									<th colspan="4" align="left">SALES DATA REPORTS</th>
								</tr>
							</thead>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="4"><em>Please Select Part Type</em></td>
							</tr>
							<tr>
								<td width="120">Part Type:</td>
								<td colspan="3">
									<select name="type" class="req" style="width:225px;">
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
" <?php if ($_smarty_tpl->tpl_vars['myparttypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['typeid'] == $_smarty_tpl->tpl_vars['parttype']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['myparttypelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttype'];?>
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
						</table>
					</div>
					<div class="row">
						<div id="action_bar">
							<input type="submit" name="submit" value="Continue" class="button">
						</div>
					</div>
					<input type="hidden" name="importfor" value="sale"  />
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div><?php }
}
