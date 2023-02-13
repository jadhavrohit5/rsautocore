<?php
/* Smarty version 3.1.30, created on 2023-02-13 19:19:08
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/view_vdata.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea8d2c61e705_21829419',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3512c61b691d993a32dfd61a8032e9bc6555d288' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/view_vdata.tpl',
      1 => 1649442305,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63ea8d2c61e705_21829419 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '47375989963ea8d2c6141f8_16368175';
?>
<div class="pageheading">
	<h3>Search By Number Plate / Vehicle Registration Number</h3>
</div>
<div id="pageBlock" style="padding-top: 0;">
	<div class="search_results text_align_left" style="margin-left: auto;">
		<div class="fontsize20" style="padding: 20px;">
			<p><em>Reg. Number:</em> <strong><?php echo $_smarty_tpl->tpl_vars['regnum']->value;?>
</strong></p>
			<em>Manufacturer:</em> <?php echo $_smarty_tpl->tpl_vars['manuName']->value;?>
<br>
			<em>Model:</em> <?php echo $_smarty_tpl->tpl_vars['modelName']->value;?>
<br>
			<em>Year:</em> <?php echo $_smarty_tpl->tpl_vars['yearCons']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['yearCoTo']->value;?>
<br>
			<em>Type:</em> <?php echo $_smarty_tpl->tpl_vars['consType']->value;?>
<br>
			<em>Engine:</em> <?php echo $_smarty_tpl->tpl_vars['ccmTech']->value;?>
<br>
			<em>Fuel:</em> <?php echo $_smarty_tpl->tpl_vars['fuelType']->value;?>
</p>
		</div>
		<div class="search_results text_align_center">
			<form name="srhFrm" method="post" action="search_matchdata.php">
				<p><button type="submit" name="submit" class="button rs_btn" style="max-width: 250px;" >Continue</button></p>
				<input type="hidden" name="schid" value="<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
">
				<input type="hidden" name="carid" value="<?php echo $_smarty_tpl->tpl_vars['ktypno']->value;?>
">
				<input type="hidden" name="regnum" value="<?php echo $_smarty_tpl->tpl_vars['regnum']->value;?>
">
				<input type="hidden" name="pageaction" value="getarticles">
			</form>
		</div>
	</div>
</div><?php }
}
