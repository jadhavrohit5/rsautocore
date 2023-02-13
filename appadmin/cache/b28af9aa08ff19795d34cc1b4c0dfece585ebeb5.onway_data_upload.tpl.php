<?php
/* Smarty version 3.1.30, created on 2023-02-07 07:22:12
  from "/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/onway_data_upload.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e1fc243faea4_58718349',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7a687648737272be59b36484eacb837e3eec1d1' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/onway_data_upload.tpl',
      1 => 1648138345,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63e1fc243faea4_58718349 (Smarty_Internal_Template $_smarty_tpl) {
?>

<script language="JavaScript">
function delall(str) 
{
	if(confirm("Are you sure you want to delete all records?"))
		location.replace(str);
}
function del(str) 
{
	if(confirm("Are you sure you want to delete this record?"))
		location.replace(str);
}
</script>

<div class="pageheading"> <a href="onway_data_mgmt.php?mode=show" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> ON-WAY DATA BY UPLOAD LIST</h1>
	<div class="add">
		<div class="search_form">
			<div class="adv_search_link">&nbsp;</div>
		</div>
	</div>
</div>
<div id="main_content">
	<div id="pageBlock"> 
		<div class="row text_align_center">
			<p><a href="onway_data_mgmt.php?mode=show"><strong>Back to Main List</strong></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="JavaScript:delall('onway_data_upload.php?mode=show&act=deleteall&updno=1660634271');" class="tooltip" title="Delete All"><strong>Delete All Records In this List</strong></a></p>
					</div>
				<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								<th width="30" align="left" style="width:30px;">#</th>
								<th align="center" width="100">Upload No#</th>
								<th align="center" width="100">PO No#</th>
								<th align="center" width="260">Supplier Name</th>
								<th align="center" width="100">RS Reference</th>
								<th align="center" width="100">Quantity</th>
								<th align="center" width="100">Price</th>
								<th align="center" width="100">Order Date </th>
								<th align="center" width="100">Date Imported </th>
								<th width="100" align="center">&nbsp;</th>
							</tr>
						</thead>
						<tbody>            
														<tr class="odd itemrowMTkxMA==" id="item-r1">
								<td align="left" class="col-1" nowrap><span class="counter">1</span></td>
								<td align="center" nowrap>1660634271</td>
								<td align="left" nowrap>PO-5546</td>
								<td align="left">MCI</td>
								<td align="left">RSSP0715</td>
								<td align="right">6</td>
								<td align="right">12.53</td>
								<td align="center" nowrap>22/07/2022</td>
								<td align="center" nowrap>16/08/2022</td>
								<td align="center"><a href="JavaScript:del('onway_data_upload.php?mode=show&act=delete&updno=1660634271&id=MTkxMA==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></td>
							</tr>
														<tr class=" itemrowMTkwOQ==" id="item-r2">
								<td align="left" class="col-1" nowrap><span class="counter">2</span></td>
								<td align="center" nowrap>1660634271</td>
								<td align="left" nowrap>PO-5546</td>
								<td align="left">MCI</td>
								<td align="left">RSSP0921</td>
								<td align="right">1</td>
								<td align="right">12.53</td>
								<td align="center" nowrap>22/07/2022</td>
								<td align="center" nowrap>16/08/2022</td>
								<td align="center"><a href="JavaScript:del('onway_data_upload.php?mode=show&act=delete&updno=1660634271&id=MTkwOQ==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></td>
							</tr>
														<tr class="odd itemrowMTkwOA==" id="item-r3">
								<td align="left" class="col-1" nowrap><span class="counter">3</span></td>
								<td align="center" nowrap>1660634271</td>
								<td align="left" nowrap>PO-5546</td>
								<td align="left">MCI</td>
								<td align="left">RSSP0223</td>
								<td align="right">4</td>
								<td align="right">4.18</td>
								<td align="center" nowrap>22/07/2022</td>
								<td align="center" nowrap>16/08/2022</td>
								<td align="center"><a href="JavaScript:del('onway_data_upload.php?mode=show&act=delete&updno=1660634271&id=MTkwOA==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></td>
							</tr>
														<tr class=" itemrowMTkwNw==" id="item-r4">
								<td align="left" class="col-1" nowrap><span class="counter">4</span></td>
								<td align="center" nowrap>1660634271</td>
								<td align="left" nowrap>PO-5546</td>
								<td align="left">MCI</td>
								<td align="left">RSSP0493</td>
								<td align="right">1</td>
								<td align="right">12.53</td>
								<td align="center" nowrap>22/07/2022</td>
								<td align="center" nowrap>16/08/2022</td>
								<td align="center"><a href="JavaScript:del('onway_data_upload.php?mode=show&act=delete&updno=1660634271&id=MTkwNw==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></td>
							</tr>
														<tr class="odd itemrowMTkwNg==" id="item-r5">
								<td align="left" class="col-1" nowrap><span class="counter">5</span></td>
								<td align="center" nowrap>1660634271</td>
								<td align="left" nowrap>PO-5546</td>
								<td align="left">MCI</td>
								<td align="left">RSSP1701</td>
								<td align="right">10</td>
								<td align="right">8.36</td>
								<td align="center" nowrap>22/07/2022</td>
								<td align="center" nowrap>16/08/2022</td>
								<td align="center"><a href="JavaScript:del('onway_data_upload.php?mode=show&act=delete&updno=1660634271&id=MTkwNg==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></td>
							</tr>
														<tr class=" itemrowMTkwNQ==" id="item-r6">
								<td align="left" class="col-1" nowrap><span class="counter">6</span></td>
								<td align="center" nowrap>1660634271</td>
								<td align="left" nowrap>PO-5546</td>
								<td align="left">MCI</td>
								<td align="left">RSSP0814</td>
								<td align="right">1</td>
								<td align="right">10.03</td>
								<td align="center" nowrap>22/07/2022</td>
								<td align="center" nowrap>16/08/2022</td>
								<td align="center"><a href="JavaScript:del('onway_data_upload.php?mode=show&act=delete&updno=1660634271&id=MTkwNQ==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></td>
							</tr>
														<tr class="odd itemrowMTkwNA==" id="item-r7">
								<td align="left" class="col-1" nowrap><span class="counter">7</span></td>
								<td align="center" nowrap>1660634271</td>
								<td align="left" nowrap>PO-5546</td>
								<td align="left">MCI</td>
								<td align="left">RSSP1482</td>
								<td align="right">5</td>
								<td align="right">5.85</td>
								<td align="center" nowrap>22/07/2022</td>
								<td align="center" nowrap>16/08/2022</td>
								<td align="center"><a href="JavaScript:del('onway_data_upload.php?mode=show&act=delete&updno=1660634271&id=MTkwNA==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></td>
							</tr>
														<tr class=" itemrowMTkwMw==" id="item-r8">
								<td align="left" class="col-1" nowrap><span class="counter">8</span></td>
								<td align="center" nowrap>1660634271</td>
								<td align="left" nowrap>PO-5546</td>
								<td align="left">MCI</td>
								<td align="left">RSSP0076</td>
								<td align="right">7</td>
								<td align="right">12.53</td>
								<td align="center" nowrap>22/07/2022</td>
								<td align="center" nowrap>16/08/2022</td>
								<td align="center"><a href="JavaScript:del('onway_data_upload.php?mode=show&act=delete&updno=1660634271&id=MTkwMw==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></td>
							</tr>
														<tr class="odd itemrowMTkwMg==" id="item-r9">
								<td align="left" class="col-1" nowrap><span class="counter">9</span></td>
								<td align="center" nowrap>1660634271</td>
								<td align="left" nowrap>PO-5546</td>
								<td align="left">MCI</td>
								<td align="left">RSSP1429</td>
								<td align="right">4</td>
								<td align="right">8.36</td>
								<td align="center" nowrap>22/07/2022</td>
								<td align="center" nowrap>16/08/2022</td>
								<td align="center"><a href="JavaScript:del('onway_data_upload.php?mode=show&act=delete&updno=1660634271&id=MTkwMg==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></td>
							</tr>
														<tr class=" itemrowMTkwMQ==" id="item-r10">
								<td align="left" class="col-1" nowrap><span class="counter">10</span></td>
								<td align="center" nowrap>1660634271</td>
								<td align="left" nowrap>PO-5546</td>
								<td align="left">MCI</td>
								<td align="left">RSSP0675</td>
								<td align="right">3</td>
								<td align="right">6.68</td>
								<td align="center" nowrap>22/07/2022</td>
								<td align="center" nowrap>16/08/2022</td>
								<td align="center"><a href="JavaScript:del('onway_data_upload.php?mode=show&act=delete&updno=1660634271&id=MTkwMQ==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></td>
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
					<input type="hidden" name="updno" value="1660634271">
				</form>
			</span>
		</div>
		<div class="R"><span class="np_control"><span class="pagination-links"><span class="pages">Page(s): </span><span class="paging"> <span class="num">1</span>  <a href="/appadmin/onway_data_upload.php?mode=show&updno=1660634271&p=10&pg=2" class="num">2</a>  <a href="/appadmin/onway_data_upload.php?mode=show&updno=1660634271&p=10&pg=3" class="num">3</a> </span> <a href="/appadmin/onway_data_upload.php?mode=show&updno=1660634271&p=10&pg=2" title="Next" class="btn next"><i class="fa fa-angle-right" ></i></a> <a href="/appadmin/onway_data_upload.php?mode=show&updno=1660634271&p=10&pg=5" title="Last" class="btn last"><i class="fa fa-angle-double-right"></i></a></span></span> <br>
			<span class="result_found">1 to 10 of 48 Records</span></div>
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
			var url = "onway_data_upload.php?mode=show&act=delete&id="+id;
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
  		var url = 'onway_data_upload.php?mode=show&updno=1660634271&p='+ppage;
		location.replace(url);
     });
		
});

</script> 
<?php }
}
