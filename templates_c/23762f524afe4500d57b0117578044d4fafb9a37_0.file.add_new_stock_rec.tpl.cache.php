<?php
/* Smarty version 3.1.30, created on 2023-02-11 06:07:18
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/add_new_stock_rec.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e73096a6a154_10123486',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '23762f524afe4500d57b0117578044d4fafb9a37' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/add_new_stock_rec.tpl',
      1 => 1673399612,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e73096a6a154_10123486 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '165042458163e73096a622a6_34255337';
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

<div class="pageheading"><a href="view_part.php?type=<?php echo $_smarty_tpl->tpl_vars['ptypeid']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['partid']->value;?>
&schid=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
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
				<form name="frm" method="post" action="add_new_stock_rec.php?type=<?php echo $_smarty_tpl->tpl_vars['ptypeid']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['partid']->value;?>
&schid=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
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
							<a href="view_part.php?type=<?php echo $_smarty_tpl->tpl_vars['ptypeid']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['partid']->value;?>
&schid=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
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
