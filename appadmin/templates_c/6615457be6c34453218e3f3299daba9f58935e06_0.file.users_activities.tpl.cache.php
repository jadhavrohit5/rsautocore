<?php
/* Smarty version 3.1.30, created on 2023-02-09 06:45:03
  from "/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/users_activities.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e4966f21e228_64295690',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6615457be6c34453218e3f3299daba9f58935e06' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/users_activities.tpl',
      1 => 1643348936,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e4966f21e228_64295690 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once '/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/libs/plugins/function.cycle.php';
$_smarty_tpl->compiled->nocache_hash = '90862811963e4966f203ff2_08822396';
?>

<?php echo '<script'; ?>
 language="JavaScript">
function del(str) 
{
	if(confirm("Are you sure you want to delete this item?"))
		location.replace(str);
}
<?php echo '</script'; ?>
>

<div class="pageheading"> <a href="#" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> SEARCH ACTIVITIES</h1>
	<div class="add">
		<div class="search_form">
			<div class="adv_search_link">&nbsp;</div>
		</div>
	</div>
</div>
<div id="main_content">
	<div id="pageBlock"> 
		<div class="row text_align_center">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value != '') {?>
			<h4 class="redText">&nbsp;<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h4>
			<?php }?>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['total']->value > 0) {?>
		<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								<th width="30" align="left" style="width:30px;">#</th>
								<th align="left" width="240">User Full Name</th>
								<th align="left" width="100">Total Searches</th>
								<th align="left" width="120">Total<br>Search Sessions</th>
								<th align="left" width="120">Searches<br>(last 30 days)</th>
								<th align="left" width="120">Search Sessions<br>(last 30 days)</th>
								<th align="left" width="120">Number of Purchase Orders</th>
								<th align="left" width="100">Last Accessed</th>
								<th width="30" align="center">&nbsp;</th>
							</tr>
						</thead>
						<tbody>            
							<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['gswebadm']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
							<tr class="<?php echo smarty_function_cycle(array('values'=>"odd,"),$_smarty_tpl);?>
 itemrow<?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['webusrid'];?>
" id="item-r<?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
">
								<td align="left" class="col-1" nowrap><span class="counter"><?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
</span></td>
								<td align="left" nowrap><span class="MOB">User Full Name:</span> <?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['contactname'];?>
</td>
								<td align="center"><span class="MOB">Total Searches:</span> <?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['numofsearches'];?>
</td>
								<td align="center"><span class="MOB">Total Search Sessions:</span> <?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['numofsessions'];?>
</td>
								<td align="center"><span class="MOB">Searches (last 30 days):</span> <?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['30daysearches'];?>
</td>
								<td align="center"><span class="MOB">Search Sessions (last 30 days):</span> <?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['30daysessions'];?>
</td>
								<td align="center"><span class="MOB">Number of Purchase Orders:</span> <?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['numofpporders'];?>
</td>
								<td align="center" nowrap><span class="MOB">Last Accessed:</span> <?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['lastlogin'];?>
</td>
								<td align="center"><span class="action">
								<a href="user_search_log.php?mode=show&id=<?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['webusrid'];?>
" class="tooltip" title="View Log"><i class="fa fa-search"></i></a></span></td>
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
			<p>&nbsp;</p>
		</div>
		<?php }?>
	</div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
jQuery(document).ready(function ($) {
	//Delete item
 	$(document).on('click', 'a.del', function(event){
		event.preventDefault(); // Stop form from submitting normally
		var obj = $(this);
 		var id = $(this).attr('href').replace('#del-',''); 
		var agree = confirm('Are you sure you want to delete this item?');
 		if(agree){  
			obj.text('Deleting...');
			//var url = ADMIN_ROOT+"/parts.php?act=delete&id="+id;
			var url = "users_activities.php?mode=show&act=delete&id="+id;
			$.post( url, function( data ) {
				if(data.success == 1){
					alert(data.successMsg);
					$(document).find('#item-r'+id).fadeOut('slow', function(){ $(this).remove();}); 				
					//$(document).find('#item-m'+id).remove();
				}else{
					alert(data.errorMsg); 
					obj.text('Delete'); 
				}
			}, "json");	
 		}
 	 }); 

	 $("#page").change(function () {
        var ppage = this.value;
        //alert(ppage);
  		var url = 'users_activities.php?mode=show&p='+ppage;
		location.replace(url);
     });
		
});

<?php echo '</script'; ?>
> 
<?php }
}
