<?php
/* Smarty version 3.1.30, created on 2023-02-13 17:36:31
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/search_results.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea751f6644a2_15212079',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7bc707e0eab64c86801d1263054393dcb97e2ce5' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/search_results.tpl',
      1 => 1649411192,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63ea751f6644a2_15212079 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '164816245163ea751f6560c2_54870593';
?>
<div class="pageheading">
	<div class="img"><img src="catphotos/<?php echo $_smarty_tpl->tpl_vars['ptypeph']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['ptypenm']->value;?>
" width="60"></div>
	<h3><?php echo $_smarty_tpl->tpl_vars['ptypenm']->value;?>
</h3>
	<p>Search results for <strong class="yelloText"><?php echo $_smarty_tpl->tpl_vars['searchkey']->value;?>
</strong></p>
</div>
<div id="pageBlock" style="padding-top: 0;">
	<div class="search_results">
		<?php if ($_smarty_tpl->tpl_vars['total']->value > 0) {?>
		<p>There are several parts which match the part number you entered.
		Please select from the image below to confirm part.</p>
		<div class="listing">
			<ul>
				<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['gsreqcnt']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
				<li class="item">
					<?php if ($_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pphoto'] != '') {?><div class="img"><a href="<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pphoto'];?>
" class="image-link" data-title="<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rsref'];?>
" data-source=""><img src="<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pphoto'];?>
" alt="" /></a></div><?php } else { ?><div class="img"><img src="images/no_photo.jpg" alt="" /></div><?php }?>
					<div class="info">
						<h4><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rsref'];?>
</h4>
						<?php if ($_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['req_qty'] > 0) {?>
						<p>Required Quantity:&nbsp;<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['req_qty'];?>
</p>
						<div><a href="reqmt_desc.php?type=<?php echo $_smarty_tpl->tpl_vars['parttype']->value;?>
&schid=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['partid'];?>
" class="button rs_btn">Select this part</a></div>
						<?php } else { ?>
						<p>Required Quantity:&nbsp;0</p>
						<div><a href="reqmt_data.php?type=<?php echo $_smarty_tpl->tpl_vars['parttype']->value;?>
&schid=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['partid'];?>
" class="button rs_btn">Select this part</a></div>
						<?php }?>
					</div>
				</li>
				<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?> 
			</ul>
		</div>
		<div class="pagination">
			<p class="result_found">Found <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 items</p>
			<p class="np_control">
				<?php if ($_smarty_tpl->tpl_vars['prevpg']->value != 0) {?><a href="search_results.php?type=<?php echo $_smarty_tpl->tpl_vars['parttype']->value;?>
&schid=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
&pg=<?php echo $_smarty_tpl->tpl_vars['prevpg']->value;?>
"> <i class="fa fa-angle-left"></i> Prev</a><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['nextpg']->value != 0) {?><a href="search_results.php?type=<?php echo $_smarty_tpl->tpl_vars['parttype']->value;?>
&schid=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
&pg=<?php echo $_smarty_tpl->tpl_vars['nextpg']->value;?>
">Next <i class="fa fa-angle-right"></i></a><?php }?>
			</p>
		</div>
		<?php } else { ?>
		<div class="text_align_center">
			<h3>Search results for <strong class="yelloText"><?php echo $_smarty_tpl->tpl_vars['searchkey']->value;?>
</strong></h3>
			<p>&nbsp;</p>
			<h3 class="redText">No items found.</h3>
			<p>Please modify your search and try again.</p>
		</div>
		<?php }?>
		<div class="row" >
			<p><a href="select_partcat.php?mode=show" class="button rs_btn new_search_btn"> New Search </a></p>
		</div>
	</div>
</div>
<?php }
}
