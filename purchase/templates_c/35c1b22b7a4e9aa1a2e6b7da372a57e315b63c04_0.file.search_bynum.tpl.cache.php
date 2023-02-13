<?php
/* Smarty version 3.1.30, created on 2023-02-13 19:19:00
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/search_bynum.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea8d24845f57_23025720',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35c1b22b7a4e9aa1a2e6b7da372a57e315b63c04' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/search_bynum.tpl',
      1 => 1649399025,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63ea8d24845f57_23025720 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '131460345263ea8d24842197_35123033';
echo '<script'; ?>
 language="javascript" src="includes/validate.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 language="javascript">
<!--
	function valTwForm(frm)
	{
		var error = "";

		if(isWhitespace(frm.regnumber.value)) {
			error += "Please enter the vehicle registration number.\n";
		}
		if(error.length != 0) {
			alert(error);
			return false;
		} else {
			frm.pageaction.value = 'vnpsearch';
			return true;
		}

	}
//-->
<?php echo '</script'; ?>
>

<div id="pageBlock">
	<div class="search_by" style="margin-left: auto;">
	<h3>Search by <strong>Number Plate / <br>
	Vehicle Registration Number</strong></h3>
	<form name="srhFrm" method="post" action="search_bynum.php" onSubmit="return valTwForm(this)">
		<p class="redText"><?php echo $_smarty_tpl->tpl_vars['errmsg']->value;?>
</p>
		<p class="uppercase">Enter Vehicle Number Plate No.</p>
		<div class="Number_Plate">
			<div class="regnumber">
				<input name="regnumber" type="text" class="input" value="" placeholder="gf57 xwd"/>
			</div>
		</div>
		<div>
			<button type="submit" name="submit" class="button rs_btn">SEARCH</button>
		</div>
		<input type="hidden" name="stepno" value="1">
		<input type="hidden" name="pageaction" value="">
	</form>
	</div>
</div>
<?php }
}
