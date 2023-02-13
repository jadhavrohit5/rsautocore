<?php
/* Smarty version 3.1.30, created on 2023-02-13 14:21:16
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/add_new_stock.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea475c6295e1_01256419',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91819d2598e155161189a67d8692965fdf202736' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/add_new_stock.tpl',
      1 => 1673399756,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63ea475c6295e1_01256419 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '39386498463ea475c61f105_43187509';
echo '<script'; ?>
 language="javascript" src="js/validatedt.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

		if(isWhitespace(frm.oeone.value) && isWhitespace(frm.oetwo.value) && isWhitespace(frm.oemone.value) && isWhitespace(frm.oemtwo.value)) {
			error += "Please enter a data.";
		}

		//if(isWhitespace(frm.rsac.value)) {
		//	error += "Please enter RSAC.";
		//}

		if(error.length != 0) {
			alert(error);
			//document.getElementById('warning').innerHTML = error;
			return false;
		} else {
			frm.mode.value = 'addoestock';
			frm.pageaction.value = 'addoestock';
			return true;
		}

	}
//-->
<?php echo '</script'; ?>
>

<div class="pageheading"><a href="edit_item.php?type=<?php echo $_smarty_tpl->tpl_vars['ptypeid']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['partid']->value;?>
" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Parts > Edit Part - <?php echo $_smarty_tpl->tpl_vars['ptypenm']->value;?>
 > Add New OE Stock</h1>
	<div class="add">&nbsp;</div>
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
				<form name="frm" method="post" action="add_new_stock.php?type=<?php echo $_smarty_tpl->tpl_vars['ptypeid']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['partid']->value;?>
" class="validate disable" onSubmit="return valForm(this)"> 
					<div class="row">
						<table width="100%">
							<thead>
								<tr>
									<th colspan="4" align="left">Enter New OE Stock Data</th>
								</tr>
							</thead>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td width="140">RS Reference :</td>
								<td><strong><?php echo $_smarty_tpl->tpl_vars['grouprsac']->value;?>
</strong></td>
							</tr>
							<tr>
								<td>OE 1# :</td>
								<td><input name="oeone" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['oeone']->value;?>
" maxlength="250" style="max-width: 350px;" /></td>
							</tr>
							<tr>
								<td>OE 2# :</td>
								<td><input name="oetwo" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['oetwo']->value;?>
" maxlength="250" style="max-width: 350px;" /></td>
							</tr>
							<tr>
								<td>OEM 1# :</td>
								<td><input name="oemone" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['oemone']->value;?>
" maxlength="250" style="max-width: 350px;" /></td>
							</tr>
							<tr>
								<td>OEM 2# :</td>
								<td><input name="oemtwo" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['oemtwo']->value;?>
" maxlength="250" style="max-width: 350px;" /></td>
							</tr>
							<tr>
								<td>Quantity :</td>
								<td><input name="qtydata" type="text" class="input onlyNumber" value="<?php echo $_smarty_tpl->tpl_vars['qtydata']->value;?>
" maxlength="8" style="max-width: 120px;" /></td>
							</tr>
							<tr>
								<td>Location :</td>
								<td><input name="location" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['location']->value;?>
" maxlength="250" style="max-width: 350px;" /></td>
							</tr>
						</table>
					</div>
					<div class="row">
						<div id="action_bar">
							<input name="addnew" value="Save" class="button" type="submit">
							<a href="edit_item.php?type=<?php echo $_smarty_tpl->tpl_vars['ptypeid']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['partid']->value;?>
" class="button btn_gray">Back</a>
						</div>
					</div>
					<input type="hidden" name="grouprsac" value="<?php echo $_smarty_tpl->tpl_vars['grouprsac']->value;?>
">
					<input type="hidden" name="mode" value="">
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div><?php }
}
