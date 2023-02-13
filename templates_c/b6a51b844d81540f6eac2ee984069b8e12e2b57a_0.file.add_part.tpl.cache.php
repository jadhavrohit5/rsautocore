<?php
/* Smarty version 3.1.30, created on 2023-02-13 14:18:55
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/add_part.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea46cf5f9073_57920879',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6a51b844d81540f6eac2ee984069b8e12e2b57a' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/add_part.tpl',
      1 => 1674705253,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63ea46cf5f9073_57920879 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '162406415563ea46cf5ef579_31376442';
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

		if(error.length != 0) {
			alert(error);
			return false;
		} else {
			//frm.mode.value = 'selectptype';
			frm.pageaction.value = 'selectptype';
			return true;
		}

	}
//-->
<?php echo '</script'; ?>
>

<div class="pageheading"><a href="parts.php?mode=show&type=1" class="tooltip back_btn" title="BACK TO PARTS LIST"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Add Part</h1>
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
				<form name="frm" method="post" action="add_part.php" onSubmit="return valForm(this)"> 
					<div class="row">
						<table width="100%">
							<thead>
								<tr>
									<th colspan="4" align="left">ADD NEW PART</th>
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
						</table>
					</div>
					<div class="row">
						<div id="action_bar">
							<input name="addnew" value="Continue" class="button" type="submit">
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
