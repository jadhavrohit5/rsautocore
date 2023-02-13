<?php
/* Smarty version 3.1.30, created on 2023-02-11 08:15:09
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/add_customer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e74e8d0b54f5_36739308',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '226be7f6fabaeeb41c3624e5ebbeb73a5f1b4adb' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/add_customer.tpl',
      1 => 1552931376,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e74e8d0b54f5_36739308 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '53625345863e74e8d0afcf2_66113302';
echo '<script'; ?>
 language="javascript" src="js/validatedt.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

		if(isWhitespace(frm.custname.value)) {
			error += "Please enter the customer name.";
		}

		if(error.length != 0) {
			alert(error);
			return false;
		} else {
			frm.pageaction.value = 'addcustomer';
			return true;
		}

	}
//-->
<?php echo '</script'; ?>
>

<div class="pageheading"><a href="manage_customers.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE CUSTOMERS"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Add New Customer</h1>
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
				<form name="frm" method="post" action="add_customer.php?mode=show" onSubmit="return valForm(this)"> 
					<div class="row">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th colspan="4" align="left">ADD NEW CUSTOMER</th>
								</tr>
							</thead>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td valign="top" width="22%"><strong>Customer Name</strong>:</td>
								<td valign="top" colspan="3" width="78%"><input name="custname" type="text" class="input req alphanumeric" value="" maxlength="150" />
								</td>
							</tr>
						</table>
 					</div>
					<div class="row">
						<div id="action_bar">
							<input name="addnew" value="Submit" class="button" type="submit">
						</div>
					</div>
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div><?php }
}
