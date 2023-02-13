<?php
/* Smarty version 3.1.30, created on 2023-02-14 00:22:10
  from "/Applications/XAMPP/xamppfiles/htdocs/rsautocore/templates/parts.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eac6228f3884_55211019',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d63969c97e949523c11ee6b1338092ef89abd9c' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/rsautocore/templates/parts.tpl',
      1 => 1676330038,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63eac6228f3884_55211019 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once '/Applications/XAMPP/xamppfiles/htdocs/rsautocore/libs/plugins/function.cycle.php';
$_smarty_tpl->compiled->nocache_hash = '91127242463eac622886ca7_64053408';
echo '<script'; ?>
 language="javascript" src="js/validatedt.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

		if(isWhitespace(frm.searchKey.value)) {
			error += "Please enter the search key.";
		}

		if(error.length != 0) {
			alert(error);
			return false;
		} else {
			frm.pageaction.value = 'quicksearch';
			return true;
		}

	}
//-->
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="JavaScript">
function del(str) 
{
	if(confirm("Are you sure you want to delete this item?"))
		location.replace(str);
}
<?php echo '</script'; ?>
>

<div class="pageheading"> <a href="parts.php?mode=show&type=<?php echo $_smarty_tpl->tpl_vars['ptypeid']->value;?>
" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> Parts - <?php echo $_smarty_tpl->tpl_vars['ptypename']->value;?>
</h1>
	<div class="add">
		<div class="search_form">
			<form id="search_frm" name="global_search_frm" method="post" action="quick_search.php" class="tooltip" title="Search for fields, categories tables ctc" onSubmit="return valForm(this)">
				<input name="searchKey" class="input req" value="" type="text" placeholder="Global Search" maxlength="100" />
				<input name="search" class="search_btn" value="Search" type="submit" /> 
				<div class="adv_search_link"><a href="advanced_search.php?mode=show&type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
">Advanced search</a></div>
				<input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
">
				<input type="hidden" name="pageaction">
			</form> 
		</div>
	</div>
</div>
<div id="main_content">
	<div id="pageBlock"> 
		<?php if ($_smarty_tpl->tpl_vars['total']->value > 0) {?>
		<div class="GD-30 R text_align_right">
			<?php if ($_smarty_tpl->tpl_vars['hvGroups']->value == '1') {?><p><a class="button btn_gray" href="export_datas_grp.php?type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
" target="_blank">Export To CSV</a></p><?php } else { ?><p><a class="button btn_gray" href="export_datas.php?type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
" target="_blank">Export To CSV</a></p><?php }?>
		</div>
		<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								
								
								<th align="left"><a href="#" class="active">RS Reference <!-- <i class="fa fa-angle-down"></i> --></a></th>
								<?php if ($_smarty_tpl->tpl_vars['hvGroups']->value == '1') {?><th align="left"><a href="#">Stock <!-- <i class="fa fa-angle-down"></i> --></a></th><?php }?>
								<?php if ($_smarty_tpl->tpl_vars['hvGroups']->value == '0') {?>
								<th align="left"><a href="#">A Grade <!-- <i class="fa fa-angle-down"></i> --></a></th>
								<th align="left"><a href="#">B Grade <!-- <i class="fa fa-angle-down"></i> --></a></th>
								<?php }?>
								
								<th align="left"><a href="#">Manufacturer</a></th>
								<th align="left"><a href="#">Make</a></th>
								<th align="left"><a href="#">Model</a></th>
                                <?php if ($_smarty_tpl->tpl_vars['ptype']->value == 2 || $_smarty_tpl->tpl_vars['ptype']->value == 9 || $_smarty_tpl->tpl_vars['ptype']->value == 1 || $_smarty_tpl->tpl_vars['ptype']->value == 10 || $_smarty_tpl->tpl_vars['ptype']->value == 11 || $_smarty_tpl->tpl_vars['ptype']->value == 14) {?>
									<th align="left"><a href="#">Type</a></th>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 15 || $_smarty_tpl->tpl_vars['ptype']->value == 16) {?>
									<th align="left"><a href="#">Pulley Diameter</a></th>
									<th align="left"><a href="#">Pulley Grooves</a></th>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 1) {?>
								<th align="left"><a href="#">Pulley Grooves</a></th>
								<th align="left"><a href="#">Pulley Size</a></th>
								<th align="left"><a href="#">Bar Pressure</a></th>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 3 || $_smarty_tpl->tpl_vars['ptype']->value == 4 || $_smarty_tpl->tpl_vars['ptype']->value == 5 || $_smarty_tpl->tpl_vars['ptype']->value == 6 || $_smarty_tpl->tpl_vars['ptype']->value == 7 || $_smarty_tpl->tpl_vars['ptype']->value == 8) {?>
								<th align="left"><a href="#">Length</a></th>
								<th align="left"><a href="#">Turns</a></th>
								<th align="left"><a href="#">T-Rod Thread Size</a></th>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 1 || $_smarty_tpl->tpl_vars['ptype']->value == 3 || $_smarty_tpl->tpl_vars['ptype']->value == 4 || $_smarty_tpl->tpl_vars['ptype']->value == 5 || $_smarty_tpl->tpl_vars['ptype']->value == 6) {?>
								<th align="left"><a href="#">Sensor</a></th>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 2) {?>
								<th align="left"><a href="#">Cast</a></th>
                                <th align="left"><a href="#">Piston</a></th>
								<th align="left"><a href="#">Pad Gap</a></th>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 9 || $_smarty_tpl->tpl_vars['ptype']->value == 15 || $_smarty_tpl->tpl_vars['ptype']->value == 16) {?>
								<th align="left"><a href="#">Plug Pins</a></th>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 3 || $_smarty_tpl->tpl_vars['ptype']->value == 4 || $_smarty_tpl->tpl_vars['ptype']->value == 5 || $_smarty_tpl->tpl_vars['ptype']->value == 6 || $_smarty_tpl->tpl_vars['ptype']->value == 7 || $_smarty_tpl->tpl_vars['ptype']->value == 8) {?>
								<th align="left"><a href="#">Pinion Length</a></th>
								<th align="left"><a href="#">Pinion type</a></th>
								<?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['ptype']->value == 7 || $_smarty_tpl->tpl_vars['ptype']->value == 8) {?>
									<th align="left"><a href="#">Plug Wires</a></th>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 3 || $_smarty_tpl->tpl_vars['ptype']->value == 4 || $_smarty_tpl->tpl_vars['ptype']->value == 5 || $_smarty_tpl->tpl_vars['ptype']->value == 6) {?>
									<th align="left"><a href="#">Lock Stops Size</a></th>
									<th align="left"><a href="#">Lock Stops Colour</a></th>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 1 || $_smarty_tpl->tpl_vars['ptype']->value == 2 || $_smarty_tpl->tpl_vars['ptype']->value == 9 || $_smarty_tpl->tpl_vars['ptype']->value == 10 || $_smarty_tpl->tpl_vars['ptype']->value == 11) {?>
								<th width="150" align="left">Notes</th>
								<?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['ptype']->value == 14) {?>
									<th width="150" align="left">Actuator Type</th>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 13) {?>
									<th align="left"><a href="#">Length</a></th>
									<th align="left"><a href="#">Overall Length</a></th>
									<th align="left"><a href="#">Flange</a></th>
									<th align="left"><a href="#">ABS Ring</a></th>
									<th align="left"><a href="#">Teeth, ABS ring</a></th>
									<th align="left"><a href="#">Outer teething wheel side</a></th>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 15) {?>
									<th width="150" align="left">Pulley Type</th>
									<th width="150" align="left">Mounting Points</th>
									<th width="150" align="left">Rear Head No</th>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 16) {?>
									<th width="150" align="left">Pulley Type</th>
									<th width="150" align="left">Amps (A)</th>
									<th width="150" align="left">Mounting Points</th>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 17) {?>
									<th width="150" align="left">Mounting Points</th>
									<th width="150" align="left">Teeth</th>
									<th width="150" align="left">Rotation</th>
								<?php }?>
								<th width="120" align="center">Actions</th>
							</tr>
						</thead>
						<tbody>            
							<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['gsreqcnt']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
							<tr class="<?php echo smarty_function_cycle(array('values'=>"odd,"),$_smarty_tpl);?>
 itemrow<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['partid'];?>
" id="item-r<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
">
								
								
								<?php if ($_smarty_tpl->tpl_vars['hvGroups']->value == '1') {?>
								<td align="left" nowrap><span class="MOB">RS Reference:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['grprsac'];?>
</td>
								<td align="left"><span class="MOB">Stock:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['totalstock'];?>
</td>
								<?php } else { ?>
								<td align="left" nowrap><span class="MOB">RS Reference:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rsref'];?>
</td>
								<td align="left"><span class="MOB">A Grade:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['a_grade'];?>
</td>
								<td align="left"><span class="MOB">B Grade:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['b_grade'];?>
</td>
								<?php }?>
								
								<td align="left"><span class="MOB">Manufacturer:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['manufacturer'];?>
</td>
								<td align="left"><span class="MOB">Make:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['make'];?>
</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['model'];?>
"><i class="fa fa-automobile"></i></a></td>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 2 || $_smarty_tpl->tpl_vars['ptype']->value == 9 || $_smarty_tpl->tpl_vars['ptype']->value == 1 || $_smarty_tpl->tpl_vars['ptype']->value == 10 || $_smarty_tpl->tpl_vars['ptype']->value == 11 || $_smarty_tpl->tpl_vars['ptype']->value == 14) {?>
									<td align="left"><span class="MOB">Type:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['type'];?>
</td>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 15 || $_smarty_tpl->tpl_vars['ptype']->value == 16) {?>
									<td align="left"><span class="MOB">Type:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pulley_size'];?>
</td>
									<td align="left"><span class="MOB">Pulley Grooves:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pulley_grooves'];?>
</td>
								<?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['ptype']->value == 1) {?>
								<td align="left"><span class="MOB">Pulley Grooves:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pulley_grooves'];?>
</td>
								<td align="left"><span class="MOB">Pulley Size:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pulley_size'];?>
</td>
								<td align="left"><span class="MOB">Bar Pressure:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['bar_pressure'];?>
</td>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 3 || $_smarty_tpl->tpl_vars['ptype']->value == 4 || $_smarty_tpl->tpl_vars['ptype']->value == 5 || $_smarty_tpl->tpl_vars['ptype']->value == 6 || $_smarty_tpl->tpl_vars['ptype']->value == 7 || $_smarty_tpl->tpl_vars['ptype']->value == 8) {?>
								<td align="left"><span class="MOB">Length:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['length'];?>
</td>
								<td align="left"><span class="MOB">Turns:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['turns'];?>
</td>
								<td align="left"><span class="MOB">T-Rod Thread Size:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['trod_threadsize'];?>
</td>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 1 || $_smarty_tpl->tpl_vars['ptype']->value == 3 || $_smarty_tpl->tpl_vars['ptype']->value == 4 || $_smarty_tpl->tpl_vars['ptype']->value == 5 || $_smarty_tpl->tpl_vars['ptype']->value == 6) {?>
								<td align="left"><span class="MOB">Sensor:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['sensor'];?>
</td>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 2) {?>
								<td align="left"><span class="MOB">Cast:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cast'];?>
</td>
                                <td align="left"><span class="MOB">Piston MM:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['piston_mm'];?>
</td>
								<td align="left"><span class="MOB">Pad Gap:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pad_gap'];?>
</td>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 9 || $_smarty_tpl->tpl_vars['ptype']->value == 15 || $_smarty_tpl->tpl_vars['ptype']->value == 16) {?>
								<td align="left"><span class="MOB">Plug Pins:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['plug_pins'];?>
</td>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 3 || $_smarty_tpl->tpl_vars['ptype']->value == 4 || $_smarty_tpl->tpl_vars['ptype']->value == 5 || $_smarty_tpl->tpl_vars['ptype']->value == 6 || $_smarty_tpl->tpl_vars['ptype']->value == 7 || $_smarty_tpl->tpl_vars['ptype']->value == 8) {?>
								<td align="left"><span class="MOB">Pinion Length:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pinion_length'];?>
</td>
								<td align="left"><span class="MOB">Pinion type:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pinion_type'];?>
</td>
								<?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['ptype']->value == 7 || $_smarty_tpl->tpl_vars['ptype']->value == 8) {?>
									<td align="left"><span class="MOB">Plug Wires:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['plug_wires'];?>
</td>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 3 || $_smarty_tpl->tpl_vars['ptype']->value == 4 || $_smarty_tpl->tpl_vars['ptype']->value == 5 || $_smarty_tpl->tpl_vars['ptype']->value == 6) {?>
									<td align="left"><span class="MOB">Lock Stops Size:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['lock_stops_size'];?>
</td>
									<td align="left"><span class="MOB">Lock Stops Colour:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['lock_stops_colour'];?>
</td>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 1 || $_smarty_tpl->tpl_vars['ptype']->value == 2 || $_smarty_tpl->tpl_vars['ptype']->value == 9 || $_smarty_tpl->tpl_vars['ptype']->value == 10 || $_smarty_tpl->tpl_vars['ptype']->value == 11) {?>
								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['notes'];?>
</td>
								<?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['ptype']->value == 14) {?>
									<td align="left"><span class="MOB">Actuator Type:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['actuator_type'];?>
</td>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 13) {?>
									<td align="left"><span class="MOB">Length:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['length'];?>
</td>
									<td align="left"><span class="MOB">Length:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['overall_length'];?>
</td>
									<td align="left"><span class="MOB">Length:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['flange'];?>
</td>
									<td align="left"><span class="MOB">Length:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['abs_ring'];?>
</td>
									<td align="left"><span class="MOB">Length:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['teeth_abs_ring'];?>
</td>
									<td align="left"><span class="MOB">Length:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['outer_teething_wheel_side'];?>
</td>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 15) {?>
									<td align="left"><span class="MOB">Pulley Type:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pulley_type'];?>
</td>
									<td align="left"><span class="MOB">Mounting Points:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['mounting_points'];?>
</td>
									<td align="left"><span class="MOB">Rear Head No:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rear_head_no'];?>
</td>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 16) {?>
									<td align="left"><span class="MOB">Pulley Type:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pulley_type'];?>
</td>
									<td align="left"><span class="MOB">Amps:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['amps'];?>
</td>
									<td align="left"><span class="MOB">Mounting Points:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['mounting_points'];?>
</td>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['ptype']->value == 17) {?>
									<td align="left"><span class="MOB">Mounting Points:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['mounting_points'];?>
</td>
									<td align="left"><span class="MOB">Teeth:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['teeth'];?>
</td>
									<td align="left"><span class="MOB">Rotation:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rotation'];?>
</td>
								<?php }?>
								<td align="center" nowrap><span class="action">
 									<?php if ($_smarty_tpl->tpl_vars['hvGroups']->value == '1') {?><a href="edit_item.php?type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['partid'];?>
" class="tooltip" title="View Details"><i class="fa fa-search"></i></a><?php } else { ?><a href="edit_part.php?type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['partid'];?>
" class="tooltip" title="View Details"><i class="fa fa-search"></i></a><?php }?>
									<?php if ($_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pphoto'] != '') {?><a href="<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pphoto'];?>
" class="image-link tooltip" data-title="<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rsref'];?>
" data-source="edit_part.php?type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['partid'];?>
" title="See Image"><i class="fa fa-picture-o"></i></a><?php } else { ?><i class="fa fa-ellipsis-h"></i><?php }?> 
									<?php if ($_smarty_tpl->tpl_vars['adminusertype']->value == "delopt") {?><a href="JavaScript:del('parts.php?mode=show&type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
&p=<?php echo $_smarty_tpl->tpl_vars['ppage']->value;?>
&pg=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&act=delete&partid=<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['partid'];?>
');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span><?php }?>
								</td>
							</tr>
							<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?> 
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="pagination">
			<div class="L"><span class="filter">
				<form action="" method="post" method="post" class="R">
					View:
					<select name="p" class="page_dropdown" id="page">
						<option value="10">10</option>
						<option value="50" <?php if ($_smarty_tpl->tpl_vars['ppage']->value == 50) {?> selected <?php }?>>50</option>
						<option value="100" <?php if ($_smarty_tpl->tpl_vars['ppage']->value == 100) {?> selected <?php }?>>100</option>                      
					</select>records
					<input type="hidden" name="mode" value="show">
				</form>
			</span>
		</div>
		<div class="R"><span class="np_control"><?php echo $_smarty_tpl->tpl_vars['showpagination']->value;?>
</span> <br>
			<span class="result_found"><?php echo $_smarty_tpl->tpl_vars['frshow']->value;?>
 to <?php echo $_smarty_tpl->tpl_vars['toshow']->value;?>
 of <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 Records</span></div>
		</div>
		<?php } else { ?>
		<div class="row text_align_center">
			<p>&nbsp;</p>
			<h3 class="redText">No Records Found.</h3>
			<p>Please modify your search and try again.</p>
		</div>
		<?php }?>
	</div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
jQuery(document).ready(function ($) {
	//Popup image
	 $('.image-link').magnificPopup({
		 type:'image',
		 image: {
            verticalFit: true,
            titleSrc: function(item) {
              return item.el.attr('data-title') + ' &nbsp; | &nbsp; <a class="button" href="'+item.el.attr('data-source')+'" target="_top">VIEW ITEM</a>';
            }
          }
	 });

	/*
	//Delete item
 	$(document).on('click', 'a.del', function(event){
		event.preventDefault(); // Stop form from submitting normally
		var obj = $(this);
 		var id = $(this).attr('href').replace('#del-',''); 
		var agree = confirm('Are you sure you want to delete this item?');
 		if(agree){  
			obj.text('Deleting...');
			//var url = ADMIN_ROOT+"/parts.php?act=delete&id="+id;
			var url = "parts.php?mode=show&type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
&act=delete&id="+id;
			$.post( url, function( data ) {
				if(data.success == 1){
					//alert(data.successMsg);
					$(document).find('#item-r'+id).fadeOut('slow', function(){ $(this).remove();}); 				
					//$(document).find('#item-m'+id).remove();
				}else{
					alert(data.errorMsg); 
					obj.text('Delete'); 
				}
			}, "json");	
 		}
 	 }); 
	 */

	 $("#page").change(function () {
        var ptype = <?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
;
        var ppage = this.value;
        //alert(ppage);
  		var url = 'parts.php?mode=show&type='+ptype+'&p='+ppage;
		location.replace(url);
     });
		
});

<?php echo '</script'; ?>
> 
<?php }
}
