<?php
/* Smarty version 3.1.30, created on 2022-03-10 20:21:52
  from "/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/purchase_mgmt_deleted.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_622a5de05fa833_43521528',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f02f848260de648b8df1594cef8c4d85708da64a' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/purchase_mgmt_deleted.tpl',
      1 => 1645684245,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_622a5de05fa833_43521528 (Smarty_Internal_Template $_smarty_tpl) {
?>

<script language="JavaScript">
function del(str) 
{
	if(confirm("Are you sure you want to delete this PO?"))
		location.replace(str);
}
</script>

<div class="pageheading"> <a href="purchase_mgmt.php?mode=show" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> MANAGE PURCHASES - DELETED POs</h1>
	<div class="add">
		<div class="search_form">
			<div class="adv_search_link"><a href="purchase_mgmt.php?mode=show">Back to Active POs List</a>&nbsp;</div>
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
								<th align="center" width="160">PO NO#</th>
								<th align="center" width="260">Supplier Name</th>
								<th align="center" width="100">Total Order</th>
								<th align="center" width="100">Date Posted</th>
								<th align="center" width="100">Date Deleted</th>
								<th align="center" width="100">Delivery Status</th>
								<th width="200" align="center">Actions</th>
							</tr>
						</thead>
						<tbody>            
														<tr class="odd itemrowNTcz" id="item-r1">
								<td align="left" class="col-1" nowrap><span class="counter">1</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000573</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Sonny Wymer</td>
								<td align="right"><span class="MOB">Total Order:</span> 56.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 04/03/2022</td>
								<td align="center"><span class="MOB">Date Deleted:</span> 04/03/2022</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=NTcz" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=NTcz" class="tooltip" title="Download"><i class="fa fa-download"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowNTY0" id="item-r2">
								<td align="left" class="col-1" nowrap><span class="counter">2</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000564</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Peter Smith</td>
								<td align="right"><span class="MOB">Total Order:</span> 30.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 21/02/2022</td>
								<td align="center"><span class="MOB">Date Deleted:</span> 21/02/2022</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=NTY0" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=NTY0" class="tooltip" title="Download"><i class="fa fa-download"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowNTUz" id="item-r3">
								<td align="left" class="col-1" nowrap><span class="counter">3</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000553</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Sonny Wymer</td>
								<td align="right"><span class="MOB">Total Order:</span> 133.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 03/02/2022</td>
								<td align="center"><span class="MOB">Date Deleted:</span> 03/02/2022</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=NTUz" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=NTUz" class="tooltip" title="Download"><i class="fa fa-download"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowNTUy" id="item-r4">
								<td align="left" class="col-1" nowrap><span class="counter">4</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000552</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Sonny Wymer</td>
								<td align="right"><span class="MOB">Total Order:</span> 667.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 28/01/2022</td>
								<td align="center"><span class="MOB">Date Deleted:</span> 18/02/2022</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=NTUy" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=NTUy" class="tooltip" title="Download"><i class="fa fa-download"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowNTUx" id="item-r5">
								<td align="left" class="col-1" nowrap><span class="counter">5</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000551</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Tony Macbeath</td>
								<td align="right"><span class="MOB">Total Order:</span> 558.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 27/01/2022</td>
								<td align="center"><span class="MOB">Date Deleted:</span> 31/01/2022</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=NTUx" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=NTUx" class="tooltip" title="Download"><i class="fa fa-download"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowNTQ5" id="item-r6">
								<td align="left" class="col-1" nowrap><span class="counter">6</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000549</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Andrew wilson</td>
								<td align="right"><span class="MOB">Total Order:</span> 24.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 26/01/2022</td>
								<td align="center"><span class="MOB">Date Deleted:</span> 28/01/2022</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=NTQ5" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=NTQ5" class="tooltip" title="Download"><i class="fa fa-download"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowNTQ4" id="item-r7">
								<td align="left" class="col-1" nowrap><span class="counter">7</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000548</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Andrew wilson</td>
								<td align="right"><span class="MOB">Total Order:</span> 16.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 26/01/2022</td>
								<td align="center"><span class="MOB">Date Deleted:</span> 28/01/2022</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=NTQ4" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=NTQ4" class="tooltip" title="Download"><i class="fa fa-download"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowNTQ3" id="item-r8">
								<td align="left" class="col-1" nowrap><span class="counter">8</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000547</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Andrew wilson</td>
								<td align="right"><span class="MOB">Total Order:</span> 36.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 26/01/2022</td>
								<td align="center"><span class="MOB">Date Deleted:</span> 28/01/2022</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=NTQ3" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=NTQ3" class="tooltip" title="Download"><i class="fa fa-download"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowNTQ2" id="item-r9">
								<td align="left" class="col-1" nowrap><span class="counter">9</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000546</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Andrew wilson</td>
								<td align="right"><span class="MOB">Total Order:</span> 10.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 26/01/2022</td>
								<td align="center"><span class="MOB">Date Deleted:</span> 28/01/2022</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=NTQ2" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=NTQ2" class="tooltip" title="Download"><i class="fa fa-download"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowNTQ1" id="item-r10">
								<td align="left" class="col-1" nowrap><span class="counter">10</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000545</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Andrew wilson</td>
								<td align="right"><span class="MOB">Total Order:</span> 25.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 26/01/2022</td>
								<td align="center"><span class="MOB">Date Deleted:</span> 28/01/2022</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=NTQ1" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=NTQ1" class="tooltip" title="Download"><i class="fa fa-download"></i></a></span>
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
		<div class="R"><span class="np_control"><span class="pagination-links"><span class="pages">Page(s): </span><span class="paging"> <span class="num">1</span>  <a href="/appadmin/purchase_mgmt_deleted.php?mode=show&p=10&pg=2" class="num">2</a>  <a href="/appadmin/purchase_mgmt_deleted.php?mode=show&p=10&pg=3" class="num">3</a> </span> <a href="/appadmin/purchase_mgmt_deleted.php?mode=show&p=10&pg=2" title="Next" class="btn next"><i class="fa fa-angle-right" ></i></a> <a href="/appadmin/purchase_mgmt_deleted.php?mode=show&p=10&pg=56" title="Last" class="btn last"><i class="fa fa-angle-double-right"></i></a></span></span> <br>
			<span class="result_found">1 to 10 of 554 Records</span></div>
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
			var url = "purchase_mgmt.php?mode=show&act=delete&id="+id;
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
  		var url = 'purchase_mgmt.php?mode=show&p='+ppage;
		location.replace(url);
     });
		
});

</script> 
<?php }
}
