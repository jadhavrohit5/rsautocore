<?php
/* Smarty version 3.1.30, created on 2023-02-07 07:22:27
  from "/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/onway_data_mgmt.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e1fc333de082_51561212',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cea38c5e92e58418e2c772c20e0034b2c1a529a5' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/onway_data_mgmt.tpl',
      1 => 1648198333,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63e1fc333de082_51561212 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_cycle')) require_once '/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/libs/plugins/function.cycle.php';
$_smarty_tpl->compiled->nocache_hash = '180238566363e1fc333c8905_19790950';
?>

<?php echo '<script'; ?>
 language="JavaScript">
function del(str) 
{
	if(confirm("Are you sure you want to delete this record?"))
		location.replace(str);
}
<?php echo '</script'; ?>
>

<div class="pageheading"> <a href="#" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> MANAGE ON-WAY DATA</h1>
	<div class="add">
		<div class="search_form">
			<div class="adv_search_link"><a href="import_onway_data.php?mode=show" class="button btn_gray">Import On-way Data</a></div>
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
								<th align="center" width="120">Upload No#</th>
								<th align="center" width="200">PO No#</th>
								<th align="center" width="200">Supplier</th>
								<th align="center" width="120">No. of Records</th>
								<th align="center" width="120">Total Quantity</th>
								<th align="center" width="120">Date Imported </th>
								<th width="120" align="center">&nbsp;</th>
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
 itemrow<?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['poid'];?>
" id="item-r<?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
">
								<td align="left" class="col-1" nowrap><span class="counter"><?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
</span></td>
								<td align="center" nowrap><span class="MOB">Upload No#:</span> <?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['uploadno'];?>
</td>
								<td align="left"><span class="MOB">PO No#:</span> <?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['ponums'];?>
</td>
								<td align="left"><span class="MOB">Supplier:</span> <?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['suppliers'];?>
</td>
								<td align="center"><span class="MOB">No. of Records:</span> <?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['numrecs'];?>
</td>
								<td align="center"><span class="MOB">Total Quantity:</span> <?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['quantity'];?>
</td>
								<td align="center" nowrap><span class="MOB">Date Imported:</span> <?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['importdon'];?>
</td>
								<td align="center"><a href="onway_data_upload.php?mode=show&updno=<?php echo $_smarty_tpl->tpl_vars['gswebadm']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['uploadno'];?>
" class="tooltip" title="View"><i class="fa fa-search"></i></a></td>
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
		var agree = confirm('Are you sure you want to delete this record?');
 		if(agree){  
			obj.text('Deleting...');
			//var url = ADMIN_ROOT+"/parts.php?act=delete&id="+id;
			var url = "onway_data_mgmt.php?mode=show&act=delete&id="+id;
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
  		var url = 'onway_data_mgmt.php?mode=show&p='+ppage;
		location.replace(url);
     });
		
});

<?php echo '</script'; ?>
> 
<?php }
}
