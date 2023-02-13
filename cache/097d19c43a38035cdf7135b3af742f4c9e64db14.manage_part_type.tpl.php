<?php
/* Smarty version 3.1.30, created on 2023-02-11 12:40:47
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/manage_part_type.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e78ccf890944_88854452',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3bebcd4f0ff770ff186f9fcf7f6535691bc562d7' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/manage_part_type.tpl',
      1 => 1674705847,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63e78ccf890944_88854452 (Smarty_Internal_Template $_smarty_tpl) {
?>

<script language="JavaScript">
function del(str) 
{
	if(confirm("Are you sure you want to delete this item?"))
		location.replace(str);
}
</script>

<div class="pageheading"> <a href="parts.php?mode=show&type=1" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> MANAGE PART CATEGORIES</h1>
	<div class="add">
		<div class="search_form">
			<!-- <form id="search_frm" name="global_search_frm" method="post" class="tooltip" title="Search for fields, categories tables ctc">
				<input name="searchKey" class="input" value="" type="text" placeholder="Global Search" />
				<input name="search" class="search_btn" value="Search" type="submit" /> 
				<div class="adv_search_link"><a href="#">Advanced search</a></div>
			</form>  -->
			<div class="adv_search_link"><a href="add_part_type.php?mode=show">Add New Part Category</a></div>
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
								<th align="left"><a href="#">Part Type </a></th>
								<th width="200" align="center"><a href="#">No. of parts </a></th>
								<th width="200" align="center">Actions</th>
							</tr>
						</thead>
						<tbody>            
														<tr class="odd itemrowMQ==" id="item-r1">
								<td align="left" class="col-1" nowrap><span class="counter">1</span></td>
								<td align="left"><span class="MOB">Part Type:</span>  STEERING PUMP </td>
								<td align="center"> 2432 </td>
								<td align="center"><span class="action">
									<a href="edit_part_type.php?mode=show&ptype=MQ==" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_part_type.php?mode=show&act=delete&id=MQ==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowMg==" id="item-r2">
								<td align="left" class="col-1" nowrap><span class="counter">2</span></td>
								<td align="left"><span class="MOB">Part Type:</span>  BRAKE CALIPER </td>
								<td align="center"> 4920 </td>
								<td align="center"><span class="action">
									<a href="edit_part_type.php?mode=show&ptype=Mg==" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_part_type.php?mode=show&act=delete&id=Mg==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowMw==" id="item-r3">
								<td align="left" class="col-1" nowrap><span class="counter">3</span></td>
								<td align="left"><span class="MOB">Part Type:</span>  LHD POWER </td>
								<td align="center"> 1045 </td>
								<td align="center"><span class="action">
									<a href="edit_part_type.php?mode=show&ptype=Mw==" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_part_type.php?mode=show&act=delete&id=Mw==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowNA==" id="item-r4">
								<td align="left" class="col-1" nowrap><span class="counter">4</span></td>
								<td align="left"><span class="MOB">Part Type:</span>  LHD MANUAL </td>
								<td align="center"> 416 </td>
								<td align="center"><span class="action">
									<a href="edit_part_type.php?mode=show&ptype=NA==" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_part_type.php?mode=show&act=delete&id=NA==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowNQ==" id="item-r5">
								<td align="left" class="col-1" nowrap><span class="counter">5</span></td>
								<td align="left"><span class="MOB">Part Type:</span>  RHD POWER </td>
								<td align="center"> 1003 </td>
								<td align="center"><span class="action">
									<a href="edit_part_type.php?mode=show&ptype=NQ==" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_part_type.php?mode=show&act=delete&id=NQ==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowNg==" id="item-r6">
								<td align="left" class="col-1" nowrap><span class="counter">6</span></td>
								<td align="left"><span class="MOB">Part Type:</span>  RHD MANUAL </td>
								<td align="center"> 410 </td>
								<td align="center"><span class="action">
									<a href="edit_part_type.php?mode=show&ptype=Ng==" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_part_type.php?mode=show&act=delete&id=Ng==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowNw==" id="item-r7">
								<td align="left" class="col-1" nowrap><span class="counter">7</span></td>
								<td align="left"><span class="MOB">Part Type:</span>  RHD ELECTRIC </td>
								<td align="center"> 321 </td>
								<td align="center"><span class="action">
									<a href="edit_part_type.php?mode=show&ptype=Nw==" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_part_type.php?mode=show&act=delete&id=Nw==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowOA==" id="item-r8">
								<td align="left" class="col-1" nowrap><span class="counter">8</span></td>
								<td align="left"><span class="MOB">Part Type:</span>  LHD ELECTRIC </td>
								<td align="center"> 329 </td>
								<td align="center"><span class="action">
									<a href="edit_part_type.php?mode=show&ptype=OA==" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_part_type.php?mode=show&act=delete&id=OA==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowOQ==" id="item-r9">
								<td align="left" class="col-1" nowrap><span class="counter">9</span></td>
								<td align="left"><span class="MOB">Part Type:</span>  EGR VALVE </td>
								<td align="center"> 442 </td>
								<td align="center"><span class="action">
									<a href="edit_part_type.php?mode=show&ptype=OQ==" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_part_type.php?mode=show&act=delete&id=OQ==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowMTA=" id="item-r10">
								<td align="left" class="col-1" nowrap><span class="counter">10</span></td>
								<td align="left"><span class="MOB">Part Type:</span>  INJECTOR </td>
								<td align="center"> 454 </td>
								<td align="center"><span class="action">
									<a href="edit_part_type.php?mode=show&ptype=MTA=" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_part_type.php?mode=show&act=delete&id=MTA=');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowMTE=" id="item-r11">
								<td align="left" class="col-1" nowrap><span class="counter">11</span></td>
								<td align="left"><span class="MOB">Part Type:</span>  DIESEL PUMP </td>
								<td align="center"> 600 </td>
								<td align="center"><span class="action">
									<a href="edit_part_type.php?mode=show&ptype=MTE=" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_part_type.php?mode=show&act=delete&id=MTE=');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowMTM=" id="item-r12">
								<td align="left" class="col-1" nowrap><span class="counter">12</span></td>
								<td align="left"><span class="MOB">Part Type:</span>  DRIVESHAFT </td>
								<td align="center"> 3468 </td>
								<td align="center"><span class="action">
									<a href="edit_part_type.php?mode=show&ptype=MTM=" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_part_type.php?mode=show&act=delete&id=MTM=');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowMTQ=" id="item-r13">
								<td align="left" class="col-1" nowrap><span class="counter">13</span></td>
								<td align="left"><span class="MOB">Part Type:</span>  TURBOCHARGER </td>
								<td align="center"> 2417 </td>
								<td align="center"><span class="action">
									<a href="edit_part_type.php?mode=show&ptype=MTQ=" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_part_type.php?mode=show&act=delete&id=MTQ=');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowMTU=" id="item-r14">
								<td align="left" class="col-1" nowrap><span class="counter">14</span></td>
								<td align="left"><span class="MOB">Part Type:</span>  AC COMPRESSOR </td>
								<td align="center"> 1480 </td>
								<td align="center"><span class="action">
									<a href="edit_part_type.php?mode=show&ptype=MTU=" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_part_type.php?mode=show&act=delete&id=MTU=');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowMTY=" id="item-r15">
								<td align="left" class="col-1" nowrap><span class="counter">15</span></td>
								<td align="left"><span class="MOB">Part Type:</span>  ALTERNATOR </td>
								<td align="center"> 7008 </td>
								<td align="center"><span class="action">
									<a href="edit_part_type.php?mode=show&ptype=MTY=" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_part_type.php?mode=show&act=delete&id=MTY=');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowMTc=" id="item-r16">
								<td align="left" class="col-1" nowrap><span class="counter">16</span></td>
								<td align="left"><span class="MOB">Part Type:</span>  STARTER MOTOR </td>
								<td align="center"> 4859 </td>
								<td align="center"><span class="action">
									<a href="edit_part_type.php?mode=show&ptype=MTc=" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_part_type.php?mode=show&act=delete&id=MTc=');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
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
						<option value="20">20</option>
						<option value="50" >50</option>
						<option value="100" >100</option>                      
					</select>records
					<input type="hidden" name="mode" value="show">
				</form>
			</span>
		</div>
		<div class="R"><span class="np_control"><span class="pagination-links"><span class="pages">Page(s): </span><span class="paging"> <span class="num">1</span> </span></span></span> <br>
			<span class="result_found">1 to 16 of 16 Records</span></div>
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
			var url = "manage_part_type.php?mode=show&act=delete&id="+id;
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
  		var url = 'manage_part_type.php?mode=show&p='+ppage;
		location.replace(url);
     });
		
});

</script> 
<?php }
}
