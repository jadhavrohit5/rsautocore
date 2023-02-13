<?php
/* Smarty version 3.1.30, created on 2023-02-13 23:08:50
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/error_page.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eac3022f64c9_41320661',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73a2e0d0540cbcdf76632126cac74639a15df750' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/error_page.tpl',
      1 => 1560147488,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63eac3022f64c9_41320661 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '153547734263eac3022ebb16_31030323';
?>
<div class="pageheading"><a href="parts.php?mode=show&type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
" class="tooltip back_btn" title="BACK TO PARTS LIST"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Error Page</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
		</div>
		<div class="GD-70">
			<div class="form_table">
				<div class="row">
					<table width="100%">
						<thead>
							<tr>
								<th colspan="4" align="left">ERROR</th>
							</tr>
						</thead>
						<tr>
							<td colspan="4" class="spacer">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="4">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value != '') {?>
			<h3 class="redText">&nbsp;<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h3>
			<?php } else { ?>
			<h3 class="redText">&nbsp;</h3>
			<?php }?>

							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div><?php }
}
