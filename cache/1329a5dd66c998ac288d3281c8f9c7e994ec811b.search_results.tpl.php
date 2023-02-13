<?php
/* Smarty version 3.1.30, created on 2023-02-13 23:09:36
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/search_results.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eac33054a555_67609420',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9daa6cf1bfbc179482ad48e3794723e92b9fb5b' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/search_results.tpl',
      1 => 1676329687,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63eac33054a555_67609420 (Smarty_Internal_Template $_smarty_tpl) {
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
	<h1><i class="fa fa-cogs"></i> Search Results - BRAKE CALIPER</h1>
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
				<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>


								<th align="left"><a href="#" class="active">RS Reference</a></th>
								<th align="left"><a href="#">A Grade</a></th>
								<th align="left"><a href="#">B Grade</a></th>
								
								<th align="left"><a href="#">Manufacturer</a></th>
								<th align="left"><a href="#">Make</a></th>
								<th align="left"><a href="#">Model</a></th>
																	<th align="left"><a href="#">Type</a></th>
																																																								<th align="left"><a href="#">Cast</a></th>
								<th align="left"><a href="#">Piston</a></th>
								<th align="left"><a href="#">Pad Gap</a></th>
																																																								<th width="150" align="left">Notes</th>
																																																								<th width="200" align="center">Actions</th>
							</tr>
						</thead>
						<tbody>            
														<tr class="odd itemrow2305" id="item-r1">


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
																																																								<td align="center"><span class="action">
																		<a href="edit_part.php?type=2&partid=2305" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>
									<a href="uploads/2305_1589734244.png" class="image-link tooltip" data-title="34005" data-source="edit_part.php?type=2&partid=2305" title="See Image"><i class="fa fa-picture-o"></i></a>									<a href="JavaScript:del('search_results.php?mode=show&type=2&p=10&pg=1&schid=348006&act=delete&partid=2305');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
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
		<div class="R"><span class="np_control"><span class="pagination-links"><span class="pages">Page(s): </span><span class="paging"> <span class="num">1</span> </span></span></span> <br>
			<span class="result_found">1 to 1 of 1 Records</span></div>
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
        var schid = 348006;
        var ptype = 2;
        var ppage = this.value;
        //alert(ppage);
  		var url = 'search_results.php?mode=show&schid='+schid+'&type='+ptype+'&p='+ppage;
		location.replace(url);
     });
		
});

</script> 
<?php }
}
