<?php
/* Smarty version 3.1.30, created on 2023-02-11 08:14:17
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/manage_attributes.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e74e59a7b500_98357994',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2bdf108e6d55f6f9f8198b905785594906f139fa' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/manage_attributes.tpl',
      1 => 1654794232,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63e74e59a7b500_98357994 (Smarty_Internal_Template $_smarty_tpl) {
?>

<script language="JavaScript">
function del(str) 
{
	if(confirm("Are you sure you want to delete this item?"))
		location.replace(str);
}
</script>

<div class="pageheading"> <a href="parts.php?mode=show&type=1" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> MANAGE ATTRIBUTES</h1>
	<div class="add">
		<div class="search_form">
			<div class="adv_search_link"><a href="add_attribute.php?mode=show">Add New Attributes</a></div>
		</div>
	</div>
</div>
<div id="main_content">
	<div id="pageBlock"> 
		<div class="row text_align_center">
					</div>
				<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								<th width="30" align="left" style="width:30px;">#</th>
								<th align="left"><a href="#">Attribute Name </a></th>
								<th width="200" align="center">Actions</th>
							</tr>
						</thead>
						<tbody>            
														<tr class="odd itemrowMQ==" id="item-r1">
								<td align="left" class="col-1" nowrap><span class="counter">1</span></td>
								<td align="left">Type </td>
								<td align="center"><span class="action">
									<a href="edit_attribute.php?mode=show&attrid=MQ==" class="tooltip" title="Edit"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_attributes.php?mode=show&act=delete&id=MQ==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowMg==" id="item-r2">
								<td align="left" class="col-1" nowrap><span class="counter">2</span></td>
								<td align="left">Pulley Diameter </td>
								<td align="center"><span class="action">
									<a href="edit_attribute.php?mode=show&attrid=Mg==" class="tooltip" title="Edit"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_attributes.php?mode=show&act=delete&id=Mg==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowMw==" id="item-r3">
								<td align="left" class="col-1" nowrap><span class="counter">3</span></td>
								<td align="left">Bar Pressure </td>
								<td align="center"><span class="action">
									<a href="edit_attribute.php?mode=show&attrid=Mw==" class="tooltip" title="Edit"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_attributes.php?mode=show&act=delete&id=Mw==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowNA==" id="item-r4">
								<td align="left" class="col-1" nowrap><span class="counter">4</span></td>
								<td align="left">Purchase Price </td>
								<td align="center"><span class="action">
									<a href="edit_attribute.php?mode=show&attrid=NA==" class="tooltip" title="Edit"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_attributes.php?mode=show&act=delete&id=NA==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowNQ==" id="item-r5">
								<td align="left" class="col-1" nowrap><span class="counter">5</span></td>
								<td align="left">Piston MM </td>
								<td align="center"><span class="action">
									<a href="edit_attribute.php?mode=show&attrid=NQ==" class="tooltip" title="Edit"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_attributes.php?mode=show&act=delete&id=NQ==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowNg==" id="item-r6">
								<td align="left" class="col-1" nowrap><span class="counter">6</span></td>
								<td align="left">Pad Gap </td>
								<td align="center"><span class="action">
									<a href="edit_attribute.php?mode=show&attrid=Ng==" class="tooltip" title="Edit"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_attributes.php?mode=show&act=delete&id=Ng==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowNw==" id="item-r7">
								<td align="left" class="col-1" nowrap><span class="counter">7</span></td>
								<td align="left">F/R </td>
								<td align="center"><span class="action">
									<a href="edit_attribute.php?mode=show&attrid=Nw==" class="tooltip" title="Edit"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_attributes.php?mode=show&act=delete&id=Nw==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowOA==" id="item-r8">
								<td align="left" class="col-1" nowrap><span class="counter">8</span></td>
								<td align="left">Cast </td>
								<td align="center"><span class="action">
									<a href="edit_attribute.php?mode=show&attrid=OA==" class="tooltip" title="Edit"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_attributes.php?mode=show&act=delete&id=OA==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowOQ==" id="item-r9">
								<td align="left" class="col-1" nowrap><span class="counter">9</span></td>
								<td align="left">Length </td>
								<td align="center"><span class="action">
									<a href="edit_attribute.php?mode=show&attrid=OQ==" class="tooltip" title="Edit"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_attributes.php?mode=show&act=delete&id=OQ==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowMTA=" id="item-r10">
								<td align="left" class="col-1" nowrap><span class="counter">10</span></td>
								<td align="left">Turns </td>
								<td align="center"><span class="action">
									<a href="edit_attribute.php?mode=show&attrid=MTA=" class="tooltip" title="Edit"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_attributes.php?mode=show&act=delete&id=MTA=');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
							 
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
						<option value="50" >50</option>
						<option value="100" >100</option>                      
					</select>records
					<input type="hidden" name="mode" value="show">
				</form>
			</span>
		</div>
		<div class="R"><span class="np_control"><span class="pagination-links"><span class="pages">Page(s): </span><span class="paging"> <span class="num">1</span>  <a href="/manage_attributes.php?mode=show&type=1&p=10&pg=2" class="num">2</a>  <a href="/manage_attributes.php?mode=show&type=1&p=10&pg=3" class="num">3</a> </span> <a href="/manage_attributes.php?mode=show&type=1&p=10&pg=2" title="Next" class="btn next"><i class="fa fa-angle-right" ></i></a> <a href="/manage_attributes.php?mode=show&type=1&p=10&pg=8" title="Last" class="btn last"><i class="fa fa-angle-double-right"></i></a></span></span> <br>
			<span class="result_found">1 to 10 of 71 Records</span></div>
		</div>
			</div>
</div>

<script type="text/javascript">
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
			var url = "manage_attributes.php?mode=show&act=delete&id="+id;
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
  		var url = 'manage_attributes.php?mode=show&p='+ppage;
		location.replace(url);
     });
		
});

</script> 
<?php }
}
