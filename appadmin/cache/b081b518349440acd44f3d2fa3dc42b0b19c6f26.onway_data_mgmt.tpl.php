<?php
/* Smarty version 3.1.30, created on 2023-02-07 07:22:27
  from "/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/onway_data_mgmt.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e1fc333e1f17_18597595',
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
  'cache_lifetime' => 120,
),true)) {
function content_63e1fc333e1f17_18597595 (Smarty_Internal_Template $_smarty_tpl) {
?>

<script language="JavaScript">
function del(str) 
{
	if(confirm("Are you sure you want to delete this record?"))
		location.replace(str);
}
</script>

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
					</div>
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
														<tr class="odd itemrow" id="item-r1">
								<td align="left" class="col-1" nowrap><span class="counter">1</span></td>
								<td align="center" nowrap><span class="MOB">Upload No#:</span> 1675069526</td>
								<td align="left"><span class="MOB">PO No#:</span> PO-5611<br/></td>
								<td align="left"><span class="MOB">Supplier:</span> MCI<br/></td>
								<td align="center"><span class="MOB">No. of Records:</span> 88</td>
								<td align="center"><span class="MOB">Total Quantity:</span> 1472</td>
								<td align="center" nowrap><span class="MOB">Date Imported:</span> 30/01/2023</td>
								<td align="center"><a href="onway_data_upload.php?mode=show&updno=1675069526" class="tooltip" title="View"><i class="fa fa-search"></i></a></td>
							</tr>
														<tr class=" itemrow" id="item-r2">
								<td align="left" class="col-1" nowrap><span class="counter">2</span></td>
								<td align="center" nowrap><span class="MOB">Upload No#:</span> 1660634271</td>
								<td align="left"><span class="MOB">PO No#:</span> PO-5546<br/></td>
								<td align="left"><span class="MOB">Supplier:</span> MCI<br/></td>
								<td align="center"><span class="MOB">No. of Records:</span> 48</td>
								<td align="center"><span class="MOB">Total Quantity:</span> 479</td>
								<td align="center" nowrap><span class="MOB">Date Imported:</span> 16/08/2022</td>
								<td align="center"><a href="onway_data_upload.php?mode=show&updno=1660634271" class="tooltip" title="View"><i class="fa fa-search"></i></a></td>
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
		<div class="R"><span class="np_control"><span class="pagination-links"><span class="pages">Page(s): </span><span class="paging"> <span class="num">1</span> </span></span></span> <br>
			<span class="result_found">1 to 2 of 2 Records</span></div>
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

</script> 
<?php }
}
