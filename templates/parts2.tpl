<script language="javascript" src="js/validatedt.js"></script>
{literal}
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
{/literal}
<div class="pageheading"> <a href="parts.php?mode=show&type={$ptypeid}" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> Parts - {$ptypename}</h1>
	<div class="add">
		<div class="search_form">
			<form id="search_frm" name="global_search_frm" method="post" action="quick_search.php" class="tooltip" title="Search for fields, categories tables ctc" onSubmit="return valForm(this)">
				<input name="searchKey" class="input req" value="" type="text" placeholder="Global Search" maxlength="100" />
				<input name="search" class="search_btn" value="Search" type="submit" /> 
				<div class="adv_search_link"><a href="advanced_search.php?mode=show&type={$ptype}">Advanced search</a></div>
				<input type="hidden" name="type" value="{$ptype}">
				<input type="hidden" name="pageaction">
			</form> 
		</div>
	</div>
</div>
<div id="main_content">
	<div id="pageBlock"> 
		{if $total gt 0}
		<div class="GD-30 R text_align_right">
			<p><a class="button btn_gray" href="export_datas.php?type={$ptype}" target="_blank">Export To CSV</a></p>
		</div>
		<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								<th width="30" align="left" style="width:30px;">#</th>
								<th align="left"><a href="#">Part Type <!-- <i class="fa fa-angle-up"></i> --></a></th>
								<th align="left"><a href="#" class="active">RS Reference <!-- <i class="fa fa-angle-down"></i> --></a></th>
								<th align="left"><a href="#">A Grade <!-- <i class="fa fa-angle-down"></i> --></a></th>
								<th align="left"><a href="#">B Grade <!-- <i class="fa fa-angle-down"></i> --></a></th>
								{*<!-- <th align="left"><a href="#">Stock <i class="fa fa-angle-down"></i></a></th> -->*}
								<th align="left"><a href="#">Manufacturer</a></th>
								<th align="left"><a href="#">Make</a></th>
								<th align="left"><a href="#">Model</a></th>
								{*<!-- {if $ptype eq 1}
								<th align="left"><a href="#">Pulley Grooves</a></th>
								<th align="left"><a href="#">Pulley Size</a></th>
								<th align="left"><a href="#">Bar Pressure</a></th>
								{/if}
								{if $ptype eq 3 or $ptype eq 4 or $ptype eq 5 or $ptype eq 6 or $ptype eq 7 or $ptype eq 8}
								<th align="left"><a href="#">Length</a></th>
								<th align="left"><a href="#">Turns</a></th>
								<th align="left"><a href="#">T-Rod Thread Size</a></th>
								{/if}
								{if $ptype eq 1 or $ptype eq 3 or $ptype eq 4 or $ptype eq 5 or $ptype eq 6}
								<th align="left"><a href="#">Sensor</a></th>
								{/if}
								{if $ptype eq 2 or $ptype eq 9}
								<th align="left"><a href="#">Type</a></th>
								{/if}
								{if $ptype eq 2}
								<th align="left"><a href="#">Cast</a></th>
								{/if}
								{if $ptype eq 9 or $ptype eq 7 or $ptype eq 8}
								<th align="left"><a href="#">Plug Pins</a></th>
								{/if}
								{if $ptype eq 3 or $ptype eq 4 or $ptype eq 5 or $ptype eq 6 or $ptype eq 7 or $ptype eq 8}
								<th align="left"><a href="#">Pinion Length</a></th>
								<th align="left"><a href="#">Pinion type</a></th>
								{/if} -->*}
								{if $ptype eq 1 or $ptype eq 2 or $ptype eq 9 or $ptype eq 10 or $ptype eq 11}
								<th width="150" align="left">Notes</th>
								{/if}
								<th width="120" align="center">Actions</th>
							</tr>
						</thead>
						<tbody>            
							{section name=i loop=$gsreqcnt}
							<tr class="{cycle values="odd,"} itemrow{$gsreqcnt[i].partid}" id="item-r{$gsreqcnt[i].cnt}">
								<td align="left" class="col-1" nowrap><span class="counter">{$gsreqcnt[i].cnt}</span></td>
								<td align="left" nowrap><span class="MOB">Part Type:</span>  {$gsreqcnt[i].parttype} </td>
								<td align="left" nowrap><span class="MOB">RS Reference:</span> {$gsreqcnt[i].rsref}</td>
								<td align="left"><span class="MOB">A Grade:</span> {$gsreqcnt[i].a_grade}</td>
								<td align="left"><span class="MOB">B Grade:</span> {$gsreqcnt[i].b_grade}</td>
								{*<!-- <td align="left"><span class="MOB">Stock:</span> {$gsreqcnt[i].stock}</td> -->*}
								<td align="left"><span class="MOB">Manufacturer:</span> {$gsreqcnt[i].manufacturer}</td>
								<td align="left"><span class="MOB">Make:</span> {$gsreqcnt[i].make}</td>
								<td align="left"><span class="MOB">Model:</span> {$gsreqcnt[i].model}</td>
								{*<!-- {if $ptype eq 1}
								<td align="left"><span class="MOB">Pulley Grooves:</span> {$gsreqcnt[i].pulley_grooves}</td>
								<td align="left"><span class="MOB">Pulley Size:</span> {$gsreqcnt[i].pulley_size}</td>
								<td align="left"><span class="MOB">Bar Pressure:</span> {$gsreqcnt[i].bar_pressure}</td>
								{/if}
								{if $ptype eq 3 or $ptype eq 4 or $ptype eq 5 or $ptype eq 6 or $ptype eq 7 or $ptype eq 8}
								<td align="left"><span class="MOB">Length:</span> {$gsreqcnt[i].length}</td>
								<td align="left"><span class="MOB">Turns:</span> {$gsreqcnt[i].turns}</td>
								<td align="left"><span class="MOB">T-Rod Thread Size:</span> {$gsreqcnt[i].trod_threadsize}</td>
								{/if}
								{if $ptype eq 1 or $ptype eq 3 or $ptype eq 4 or $ptype eq 5 or $ptype eq 6}
								<td align="left"><span class="MOB">Sensor:</span> {$gsreqcnt[i].sensor}</td>
								{/if}
								{if $ptype eq 2 or $ptype eq 9}
								<td align="left"><span class="MOB">Type:</span> {$gsreqcnt[i].type}</td>
								{/if}
								{if $ptype eq 2}
								<td align="left"><span class="MOB">Cast:</span> {$gsreqcnt[i].cast}</td>
								{/if}
								{if $ptype eq 9 or $ptype eq 7 or $ptype eq 8}
								<td align="left"><span class="MOB">Plug Pins:</span> {$gsreqcnt[i].plug_pins}</td>
								{/if}
								{if $ptype eq 3 or $ptype eq 4 or $ptype eq 5 or $ptype eq 6 or $ptype eq 7 or $ptype eq 8}
								<td align="left"><span class="MOB">Pinion Length:</span> {$gsreqcnt[i].pinion_length}</td>
								<td align="left"><span class="MOB">Pinion type:</span> {$gsreqcnt[i].pinion_type}</td>
								{/if} -->*}
								{if $ptype eq 1 or $ptype eq 2 or $ptype eq 9 or $ptype eq 10 or $ptype eq 11}
								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> {$gsreqcnt[i].notes}</td>
								{/if}
								<td align="center" nowrap><span class="action">
									{if $gsreqcnt[i].pphoto ne ""}<a href="{$gsreqcnt[i].pphoto}" class="image-link tooltip" data-title="{$gsreqcnt[i].rsref}" data-source="edit_part.php?type={$ptype}&partid={$gsreqcnt[i].partid}" title="See Image"><i class="fa fa-picture-o"></i></a>{else}<i class="fa fa-ellipsis-h"></i>{/if}
									<a href="edit_part.php?type={$ptype}&partid={$gsreqcnt[i].partid}" class="tooltip" title="View Details"><i class="fa fa-search"></i></a> 
									{if $adminusertype eq "delopt"}<a href="JavaScript:del('parts.php?mode=show&type={$ptype}&p={$ppage}&pg={$page}&act=delete&partid={$gsreqcnt[i].partid}');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>{/if}
								</td>
							</tr>
							{/section} 
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
						<option value="50" {if $ppage eq 50} selected {/if}>50</option>
						<option value="100" {if $ppage eq 100} selected {/if}>100</option>                      
					</select>records
					<input type="hidden" name="mode" value="show">
				</form>
			</span>
		</div>
		<div class="R"><span class="np_control">{$showpagination}</span> <br>
			<span class="result_found">{$frshow} to {$toshow} of {$total} Records</span></div>
		</div>
		{else}
		<div class="row text_align_center">
			<p>&nbsp;</p>
			<h3 class="redText">No Records Found.</h3>
			<p>Please modify your search and try again.</p>
		</div>
		{/if}
	</div>
</div>
{literal}
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
			var url = "parts.php?mode=show&type={/literal}{$ptype}{literal}&act=delete&id="+id;
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
        var ptype = {/literal}{$ptype}{literal};
        var ppage = this.value;
        //alert(ppage);
  		var url = 'parts.php?mode=show&type='+ptype+'&p='+ppage;
		location.replace(url);
     });
		
});

</script> 
{/literal}