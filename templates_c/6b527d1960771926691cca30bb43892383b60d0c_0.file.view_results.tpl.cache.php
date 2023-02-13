<?php
/* Smarty version 3.1.30, created on 2023-02-13 19:07:58
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/view_results.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea8a8e568619_20354383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b527d1960771926691cca30bb43892383b60d0c' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/view_results.tpl',
      1 => 1676217320,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63ea8a8e568619_20354383 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once '/home/storm/sites/rsautocoresystem-co-uk/public/libs/plugins/function.cycle.php';
$_smarty_tpl->compiled->nocache_hash = '191737664563ea8a8e549106_44181730';
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

<div class="pageheading"> <a href="parts.php?mode=show&type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> Search Results - <?php echo $_smarty_tpl->tpl_vars['ptypename']->value;?>
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
		<!-- <div class="row text_align_center">
			<p class="redText"><strong>New Search Results Preview Page</strong> for TURBOCHARGER, AC COMPRESSOR, STARTER MOTOR, ALTERNATOR</p>
		</div> -->
		<?php if ($_smarty_tpl->tpl_vars['total']->value > 0) {?>
		<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								<th width="30" align="left" style="width:30px;">#</th>
								<th align="left"><a href="#">Part Type</a></th>
								<th align="left"><a href="#" class="active">RS Reference</a></th>
								<th align="left"><a href="#">Stock<!-- A Grade --></a></th>
								
								
								<th align="left"><a href="#">Manufacturer</a></th>
								<th align="left"><a href="#">Make</a></th>
								<th align="left"><a href="#">Model</a></th>
								
								<th width="200" align="center">Actions</th>
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
								<td align="left" class="col-1" nowrap><span class="counter"><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
</span></td>
								<td align="left" nowrap><span class="MOB">Part Type:</span>  <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttype'];?>
 </td>
								<td align="left" nowrap><span class="MOB">RS Reference:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['grprsac'];?>
</td>
								
								
								<td align="left"><span class="MOB">Stock:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['totalstock'];?>
</td>
								<td align="left"><span class="MOB">Manufacturer:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['manufacturer'];?>
</td>
								<td align="left"><span class="MOB">Make:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['make'];?>
</td>
								<td align="left"><span class="MOB">Model:</span> <?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['model'];?>
</td>
								
								<td align="center"><span class="action">
									<?php if ($_smarty_tpl->tpl_vars['adminusertype']->value == "delopt") {?>
									<?php if ($_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pphoto'] != '') {?><a href="<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pphoto'];?>
" class="image-link tooltip" data-title="<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rsref'];?>
" data-source="view_part.php?type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['partid'];?>
&schid=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
" title="See Image"><i class="fa fa-picture-o"></i></a><?php } else { ?><i class="fa fa-ellipsis-h"></i><?php }?>
									<a href="view_part.php?type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['partid'];?>
&schid=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									</span>
									<?php } else { ?>
									<?php if ($_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pphoto'] != '') {?><a href="<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pphoto'];?>
" class="image-link tooltip" data-title="<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rsref'];?>
" data-source="update_part.php?type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['partid'];?>
" title="See Image"><i class="fa fa-picture-o"></i></a><?php } else { ?><i class="fa fa-ellipsis-h"></i><?php }?>
									<a href="update_part.php?type=<?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['partid'];?>
" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									<?php }?>
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

	 $("#page").change(function () {
        var schid = <?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
;
        var ptype = <?php echo $_smarty_tpl->tpl_vars['ptype']->value;?>
;
        var ppage = this.value;
        //alert(ppage);
  		var url = 'view_results.php?mode=show&schid='+schid+'&type='+ptype+'&p='+ppage;
		location.replace(url);
     });
		
});

<?php echo '</script'; ?>
> 
<?php }
}
