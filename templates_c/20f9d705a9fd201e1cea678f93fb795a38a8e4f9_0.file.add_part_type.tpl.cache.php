<?php
/* Smarty version 3.1.30, created on 2023-02-11 06:51:35
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/add_part_type.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e73af71149c9_16827313',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20f9d705a9fd201e1cea678f93fb795a38a8e4f9' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/add_part_type.tpl',
      1 => 1643456857,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e73af71149c9_16827313 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '189926555663e73af71043f8_16476844';
echo '<script'; ?>
 language="javascript" src="js/validatedt.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 language="javascript">
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
<?php echo '</script'; ?>
>

<div class="pageheading"><a href="manage_part_type.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE PART CATEGORIES"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Add New Part Category</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value != '') {?>
			<h5 class="redText"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h5>
			<?php } else { ?>
			<h5 class="redText">&nbsp;</h5>
			<?php }?>
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
									<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['attributelist']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
									<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="<?php echo $_smarty_tpl->tpl_vars['attributelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attrid'];?>
">
									<?php echo $_smarty_tpl->tpl_vars['attributelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attributename'];?>
 </label>&nbsp;&nbsp;&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['attributelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['brk'] == 1) {?><br><?php }?>
									<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
								</td>
							</tr>
							
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
									<?php
$__section_i_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['customerlist']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total != 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
									<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="<?php echo $_smarty_tpl->tpl_vars['customerlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['custid'];?>
">
									<?php echo $_smarty_tpl->tpl_vars['customerlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['custname'];?>
 </label>&nbsp;&nbsp;&nbsp;&nbsp;<?php if ($_smarty_tpl->tpl_vars['customerlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['brk'] == 1) {?><br><?php }?>
									<?php
}
}
if ($__section_i_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_1_saved;
}
?>
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
					
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div><?php }
}
