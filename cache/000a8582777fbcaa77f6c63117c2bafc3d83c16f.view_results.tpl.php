<?php
/* Smarty version 3.1.30, created on 2023-02-13 19:07:58
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/view_results.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea8a8e56ed99_16821726',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b527d1960771926691cca30bb43892383b60d0c' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/view_results.tpl',
      1 => 1676217320,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63ea8a8e56ed99_16821726 (Smarty_Internal_Template $_smarty_tpl) {
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

<div class="pageheading"> <a href="parts.php?mode=show&type=16" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> Search Results - ALTERNATOR</h1>
	<div class="add">
		<div class="search_form">
			<form id="search_frm" name="global_search_frm" method="post" action="quick_search.php" class="tooltip" title="Search for fields, categories tables ctc" onSubmit="return valForm(this)">
				<input name="searchKey" class="input req" value="" type="text" placeholder="Global Search" maxlength="100" />
				<input name="search" class="search_btn" value="Search" type="submit" /> 
				<div class="adv_search_link"><a href="advanced_search.php?mode=show&type=16">Advanced search</a></div>
				<input type="hidden" name="type" value="16">
				<input type="hidden" name="pageaction">
			</form> 
		</div>
	</div>
</div>
<div id="main_content">
	<div id="pageBlock"> 
		<!-- <div class="row text_align_center">
			<p class="redText"><strong>New Search Results Preview Page</strong> for TURBOCHARGER, AC COMPRESSOR, STARTER MOTOR, ALTERNATOR</p>
		</div> -->
				<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								<th width="30" align="left" style="width:30px;">#</th>
								<th align="left"><a href="#">Part Type</a></th>
								<th align="left"><a href="#" class="active">RS Reference</a></th>
								<th align="left"><a href="#">Stock<!-- A Grade --></a></th>
								
								
								<th align="left"><a href="#">Manufacturer</a></th>
								<th align="left"><a href="#">Make</a></th>
								<th align="left"><a href="#">Model</a></th>
								
								<th width="200" align="center">Actions</th>
							</tr>
						</thead>
						<tbody>            
														<tr class="odd itemrow36412" id="item-r1">
								<td align="left" class="col-1" nowrap><span class="counter">1</span></td>
								<td align="left" nowrap><span class="MOB">Part Type:</span>  ALTERNATOR </td>
								<td align="left" nowrap><span class="MOB">RS Reference:</span> RSAL3792</td>
								
								
								<td align="left"><span class="MOB">Stock:</span> 2</td>
								<td align="left"><span class="MOB">Manufacturer:</span> Bosch</td>
								<td align="left"><span class="MOB">Make:</span> Opel, Vauxhall</td>
								<td align="left"><span class="MOB">Model:</span> Astra, Astra Classic, Astra Family, Astra GTC, Astra Van, Meriva, Signum, Vectra, Zafira, Zafira Family, Zafira Van, Astra, Astra Coupe, Astra Sport Hatch, Astra Van, Meriva, Signum, Vectra, Zafira</td>
								
								<td align="center"><span class="action">
																		<a href="uploads/16/28-6513.png" class="image-link tooltip" data-title="RSAL10923" data-source="view_part.php?type=16&partid=36412&schid=347856" title="See Image"><i class="fa fa-picture-o"></i></a>									<a href="view_part.php?type=16&partid=36412&schid=347856" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									</span>
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

	 $("#page").change(function () {
        var schid = 347856;
        var ptype = 16;
        var ppage = this.value;
        //alert(ppage);
  		var url = 'view_results.php?mode=show&schid='+schid+'&type='+ptype+'&p='+ppage;
		location.replace(url);
     });
		
});

</script> 
<?php }
}
