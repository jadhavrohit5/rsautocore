<?php
/* Smarty version 3.1.30, created on 2023-02-11 10:05:50
  from "/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/purchase_mgmt.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e7687eb7a478_02379211',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a41b809b530a4fb08bee0c0854de4590be825446' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/purchase_mgmt.tpl',
      1 => 1647318192,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63e7687eb7a478_02379211 (Smarty_Internal_Template $_smarty_tpl) {
?>

<script language="JavaScript">
function del(str) 
{
	if(confirm("Are you sure you want to delete this PO?"))
		location.replace(str);
}
</script>

<div class="pageheading"> <a href="#" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> MANAGE PURCHASES</h1>
	<div class="add">
		<div class="search_form">
			<div class="adv_search_link">&nbsp;</div>
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
								<th align="center" width="100">Delivery Status</th>
								<th width="200" align="center">Actions</th>
							</tr>
						</thead>
						<tbody>            
														<tr class="odd itemrowODMz" id="item-r1">
								<td align="left" class="col-1" nowrap><span class="counter">1</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000833</td>
								<td align="left"><span class="MOB">Supplier Name:</span> S Das</td>
								<td align="right"><span class="MOB">Total Order:</span> 115.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 11/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODMz" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODMz" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODMz');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowODMy" id="item-r2">
								<td align="left" class="col-1" nowrap><span class="counter">2</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000832</td>
								<td align="left"><span class="MOB">Supplier Name:</span> S Das</td>
								<td align="right"><span class="MOB">Total Order:</span> 83.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 11/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODMy" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODMy" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODMy');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowODMx" id="item-r3">
								<td align="left" class="col-1" nowrap><span class="counter">3</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000831</td>
								<td align="left"><span class="MOB">Supplier Name:</span> S Das</td>
								<td align="right"><span class="MOB">Total Order:</span> 108.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 11/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODMx" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODMx" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODMx');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowODMw" id="item-r4">
								<td align="left" class="col-1" nowrap><span class="counter">4</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000830</td>
								<td align="left"><span class="MOB">Supplier Name:</span> GT Breakers</td>
								<td align="right"><span class="MOB">Total Order:</span> 20.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 10/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODMw" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODMw" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODMw');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowODI5" id="item-r5">
								<td align="left" class="col-1" nowrap><span class="counter">5</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000829</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Danaius</td>
								<td align="right"><span class="MOB">Total Order:</span> 80.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 08/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODI5" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODI5" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODI5');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowODI4" id="item-r6">
								<td align="left" class="col-1" nowrap><span class="counter">6</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000828</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Danaius</td>
								<td align="right"><span class="MOB">Total Order:</span> 60.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 07/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODI4" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODI4" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODI4');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowODI3" id="item-r7">
								<td align="left" class="col-1" nowrap><span class="counter">7</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000827</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Danaius</td>
								<td align="right"><span class="MOB">Total Order:</span> 62.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 06/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODI3" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODI3" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODI3');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowODI2" id="item-r8">
								<td align="left" class="col-1" nowrap><span class="counter">8</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000826</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Danaius</td>
								<td align="right"><span class="MOB">Total Order:</span> 115.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 03/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODI2" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODI2" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODI2');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowODI1" id="item-r9">
								<td align="left" class="col-1" nowrap><span class="counter">9</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000825</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Danaius</td>
								<td align="right"><span class="MOB">Total Order:</span> 153.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 02/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODI1" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODI1" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODI1');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowODI0" id="item-r10">
								<td align="left" class="col-1" nowrap><span class="counter">10</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000824</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Dani</td>
								<td align="right"><span class="MOB">Total Order:</span> 650.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 01/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODI0" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODI0" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODI0');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
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
		<div class="R"><span class="np_control"><span class="pagination-links"><span class="pages">Page(s): </span><span class="paging"> <span class="num">1</span>  <a href="/appadmin/purchase_mgmt.php?mode=show&p=10&pg=2" class="num">2</a>  <a href="/appadmin/purchase_mgmt.php?mode=show&p=10&pg=3" class="num">3</a> </span> <a href="/appadmin/purchase_mgmt.php?mode=show&p=10&pg=2" title="Next" class="btn next"><i class="fa fa-angle-right" ></i></a> <a href="/appadmin/purchase_mgmt.php?mode=show&p=10&pg=8" title="Last" class="btn last"><i class="fa fa-angle-double-right"></i></a></span></span> <br>
			<span class="result_found">1 to 10 of 77 Records</span></div>
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
