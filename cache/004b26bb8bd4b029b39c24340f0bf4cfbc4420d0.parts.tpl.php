<?php
/* Smarty version 3.1.30, created on 2023-02-13 23:10:35
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/parts.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eac36bde2423_27675981',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0435850b70ec85ad2577fa4bad365eccf551b823' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/parts.tpl',
      1 => 1676327591,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63eac36bde2423_27675981 (Smarty_Internal_Template $_smarty_tpl) {
?>
<script language="javascript" src="js/validatedt.js"></script>

<script language="javascript">
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
</script>
<script language="JavaScript">
function del(str) 
{
	if(confirm("Are you sure you want to delete this item?"))
		location.replace(str);
}
</script>

<div class="pageheading"> <a href="parts.php?mode=show&type=2" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> Parts - BRAKE CALIPER</h1>
	<div class="add">
		<div class="search_form">
			<form id="search_frm" name="global_search_frm" method="post" action="quick_search.php" class="tooltip" title="Search for fields, categories tables ctc" onSubmit="return valForm(this)">
				<input name="searchKey" class="input req" value="" type="text" placeholder="Global Search" maxlength="100" />
				<input name="search" class="search_btn" value="Search" type="submit" /> 
				<div class="adv_search_link"><a href="advanced_search.php?mode=show&type=2">Advanced search</a></div>
				<input type="hidden" name="type" value="2">
				<input type="hidden" name="pageaction">
			</form> 
		</div>
	</div>
</div>
<div id="main_content">
	<div id="pageBlock"> 
				<div class="GD-30 R text_align_right">
			<p><a class="button btn_gray" href="export_datas.php?type=2" target="_blank">Export To CSV</a></p>		</div>
		<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								
								
								<th align="left"><a href="#" class="active">RS Reference <!-- <i class="fa fa-angle-down"></i> --></a></th>
																								<th align="left"><a href="#">A Grade <!-- <i class="fa fa-angle-down"></i> --></a></th>
								<th align="left"><a href="#">B Grade <!-- <i class="fa fa-angle-down"></i> --></a></th>
																
								<th align="left"><a href="#">Manufacturer</a></th>
								<th align="left"><a href="#">Make</a></th>
								<th align="left"><a href="#">Model</a></th>
                                									<th align="left"><a href="#">Type</a></th>
																																																								<th align="left"><a href="#">Cast</a></th>
                                <th align="left"><a href="#">Piston</a></th>
								<th align="left"><a href="#">Pad Gap</a></th>
																								                                																								<th width="150" align="left">Notes</th>
								                                																																								<th width="120" align="center">Actions</th>
							</tr>
						</thead>
						<tbody>            
														<tr class="odd itemrow2302" id="item-r1">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> 34002</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> ATE</td>
								<td align="left"><span class="MOB">Make:</span> Alfa Romeo, Bmw</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="GTV 116, 320"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Front</td>
																                                																																<td align="left"><span class="MOB">Cast:</span> ATE</td>
                                <td align="left"><span class="MOB">Piston MM:</span> 48mm</td>
								<td align="left"><span class="MOB">Pad Gap:</span> 59mm</td>
																								                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> </td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=2&partid=2302" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<a href="uploads/2302_1596787182.png" class="image-link tooltip" data-title="34002" data-source="edit_part.php?type=2&partid=2302" title="See Image"><i class="fa fa-picture-o"></i></a> 
									<a href="JavaScript:del('parts.php?mode=show&type=2&p=10&pg=1&act=delete&partid=2302');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
							</tr>
														<tr class=" itemrow2303" id="item-r2">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> 34003</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> ATE</td>
								<td align="left"><span class="MOB">Make:</span> Alfa Romeo, Bmw</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="GTV 116, 320"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Front</td>
																                                																																<td align="left"><span class="MOB">Cast:</span> ATE</td>
                                <td align="left"><span class="MOB">Piston MM:</span> 48mm</td>
								<td align="left"><span class="MOB">Pad Gap:</span> 59mm</td>
																								                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> </td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=2&partid=2303" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<a href="uploads/2303_1596787195.png" class="image-link tooltip" data-title="34003" data-source="edit_part.php?type=2&partid=2303" title="See Image"><i class="fa fa-picture-o"></i></a> 
									<a href="JavaScript:del('parts.php?mode=show&type=2&p=10&pg=1&act=delete&partid=2303');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
							</tr>
														<tr class="odd itemrow2304" id="item-r3">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> 34004</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> BENDIX</td>
								<td align="left"><span class="MOB">Make:</span> Volvo</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="740760"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Front</td>
																                                																																<td align="left"><span class="MOB">Cast:</span> 330037</td>
                                <td align="left"><span class="MOB">Piston MM:</span> 40mm</td>
								<td align="left"><span class="MOB">Pad Gap:</span> 59mm</td>
																								                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> CHECK PAD GAP</td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=2&partid=2304" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<a href="uploads/2304_1589734226.png" class="image-link tooltip" data-title="34004" data-source="edit_part.php?type=2&partid=2304" title="See Image"><i class="fa fa-picture-o"></i></a> 
									<a href="JavaScript:del('parts.php?mode=show&type=2&p=10&pg=1&act=delete&partid=2304');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
							</tr>
														<tr class=" itemrow2305" id="item-r4">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> 34005</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> BENDIX</td>
								<td align="left"><span class="MOB">Make:</span> Volvo</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="740760"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Front</td>
																                                																																<td align="left"><span class="MOB">Cast:</span> 330038</td>
                                <td align="left"><span class="MOB">Piston MM:</span> 40mm</td>
								<td align="left"><span class="MOB">Pad Gap:</span> 59mm</td>
																								                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> CHECK PAD GAP</td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=2&partid=2305" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<a href="uploads/2305_1589734244.png" class="image-link tooltip" data-title="34005" data-source="edit_part.php?type=2&partid=2305" title="See Image"><i class="fa fa-picture-o"></i></a> 
									<a href="JavaScript:del('parts.php?mode=show&type=2&p=10&pg=1&act=delete&partid=2305');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
							</tr>
														<tr class="odd itemrow2306" id="item-r5">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> 34006</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> ATE</td>
								<td align="left"><span class="MOB">Make:</span> Alfa Romeo</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="6, 75"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Front</td>
																                                																																<td align="left"><span class="MOB">Cast:</span> ATE</td>
                                <td align="left"><span class="MOB">Piston MM:</span> 40mm</td>
								<td align="left"><span class="MOB">Pad Gap:</span> 58mm</td>
																								                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> </td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=2&partid=2306" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<a href="uploads/34006.jpg" class="image-link tooltip" data-title="34006" data-source="edit_part.php?type=2&partid=2306" title="See Image"><i class="fa fa-picture-o"></i></a> 
									<a href="JavaScript:del('parts.php?mode=show&type=2&p=10&pg=1&act=delete&partid=2306');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
							</tr>
														<tr class=" itemrow2307" id="item-r6">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> 34007</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> ATE</td>
								<td align="left"><span class="MOB">Make:</span> Alfa Romeo</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="6, 75"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Front</td>
																                                																																<td align="left"><span class="MOB">Cast:</span> ATE</td>
                                <td align="left"><span class="MOB">Piston MM:</span> 40mm</td>
								<td align="left"><span class="MOB">Pad Gap:</span> 58mm</td>
																								                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> </td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=2&partid=2307" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<a href="uploads/2307_1596787333.png" class="image-link tooltip" data-title="34007" data-source="edit_part.php?type=2&partid=2307" title="See Image"><i class="fa fa-picture-o"></i></a> 
									<a href="JavaScript:del('parts.php?mode=show&type=2&p=10&pg=1&act=delete&partid=2307');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
							</tr>
														<tr class="odd itemrow2308" id="item-r7">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> 34008</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> ATE</td>
								<td align="left"><span class="MOB">Make:</span> Alfa Romeo</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="6"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Rear</td>
																                                																																<td align="left"><span class="MOB">Cast:</span> ATE</td>
                                <td align="left"><span class="MOB">Piston MM:</span> 42mm</td>
								<td align="left"><span class="MOB">Pad Gap:</span> 43mm</td>
																								                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> </td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=2&partid=2308" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<a href="uploads/2308_1607372152.png" class="image-link tooltip" data-title="34008" data-source="edit_part.php?type=2&partid=2308" title="See Image"><i class="fa fa-picture-o"></i></a> 
									<a href="JavaScript:del('parts.php?mode=show&type=2&p=10&pg=1&act=delete&partid=2308');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
							</tr>
														<tr class=" itemrow2309" id="item-r8">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> 34009</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> ATE</td>
								<td align="left"><span class="MOB">Make:</span> Alfa Romeo</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="6"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Rear</td>
																                                																																<td align="left"><span class="MOB">Cast:</span> ATE</td>
                                <td align="left"><span class="MOB">Piston MM:</span> 42mm</td>
								<td align="left"><span class="MOB">Pad Gap:</span> 43mm</td>
																								                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> </td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=2&partid=2309" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<a href="uploads/2309_1607372183.png" class="image-link tooltip" data-title="34009" data-source="edit_part.php?type=2&partid=2309" title="See Image"><i class="fa fa-picture-o"></i></a> 
									<a href="JavaScript:del('parts.php?mode=show&type=2&p=10&pg=1&act=delete&partid=2309');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
							</tr>
														<tr class="odd itemrow2310" id="item-r9">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> 34010</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> TOYOTA</td>
								<td align="left"><span class="MOB">Make:</span> Toyota</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="Corolla"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Front</td>
																                                																																<td align="left"><span class="MOB">Cast:</span> 14</td>
                                <td align="left"><span class="MOB">Piston MM:</span> 48mm</td>
								<td align="left"><span class="MOB">Pad Gap:</span> 43mm</td>
																								                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> </td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=2&partid=2310" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<a href="uploads/2310_1607372359.png" class="image-link tooltip" data-title="34010" data-source="edit_part.php?type=2&partid=2310" title="See Image"><i class="fa fa-picture-o"></i></a> 
									<a href="JavaScript:del('parts.php?mode=show&type=2&p=10&pg=1&act=delete&partid=2310');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
							</tr>
														<tr class=" itemrow2311" id="item-r10">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> 34011</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> TOYOTA</td>
								<td align="left"><span class="MOB">Make:</span> Toyota</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="Corolla"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Front</td>
																                                																																<td align="left"><span class="MOB">Cast:</span> 14</td>
                                <td align="left"><span class="MOB">Piston MM:</span> 48mm</td>
								<td align="left"><span class="MOB">Pad Gap:</span> 43mm</td>
																								                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> </td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=2&partid=2311" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<a href="uploads/2311_1607372385.png" class="image-link tooltip" data-title="34011" data-source="edit_part.php?type=2&partid=2311" title="See Image"><i class="fa fa-picture-o"></i></a> 
									<a href="JavaScript:del('parts.php?mode=show&type=2&p=10&pg=1&act=delete&partid=2311');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
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
		<div class="R"><span class="np_control"><span class="pagination-links"><span class="pages">Page(s): </span><span class="paging"> <span class="num">1</span>  <a href="/parts.php?mode=show&type=2&p=10&pg=2" class="num">2</a>  <a href="/parts.php?mode=show&type=2&p=10&pg=3" class="num">3</a> </span> <a href="/parts.php?mode=show&type=2&p=10&pg=2" title="Next" class="btn next"><i class="fa fa-angle-right" ></i></a> <a href="/parts.php?mode=show&type=2&p=10&pg=492" title="Last" class="btn last"><i class="fa fa-angle-double-right"></i></a></span></span> <br>
			<span class="result_found">1 to 10 of 4920 Records</span></div>
		</div>
			</div>
</div>

<script type="text/javascript">
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
			var url = "parts.php?mode=show&type=2&act=delete&id="+id;
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
        var ptype = 2;
        var ppage = this.value;
        //alert(ppage);
  		var url = 'parts.php?mode=show&type='+ptype+'&p='+ppage;
		location.replace(url);
     });
		
});

</script> 
<?php }
}
