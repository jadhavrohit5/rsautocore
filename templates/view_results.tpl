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
<div class="pageheading"> <a href="parts.php?mode=show&type={$ptype}" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> Search Results - {$ptypename}</h1>
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
		<!-- <div class="row text_align_center">
			<p class="redText"><strong>New Search Results Preview Page</strong> for TURBOCHARGER, AC COMPRESSOR, STARTER MOTOR, ALTERNATOR</p>
		</div> -->
		{if $total gt 0}
		<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								{*<th width="30" align="left" style="width:30px;">#</th>*}
								{*<th align="left"><a href="#">Part Type</a></th>*}
								<th align="left"><a href="#" class="active">RS Reference</a></th>
								<th align="left"><a href="#">Stock<!-- A Grade --></a></th>
								{*<!-- <th align="left"><a href="#">B Grade</a></th> -->*}
								{*<!-- <th align="left"><a href="#">Stock <i class="fa fa-angle-down"></i></a></th> -->*}
								<th align="left"><a href="#">Manufacturer</a></th>
								<th align="left"><a href="#">Make</a></th>
								<th align="left"><a href="#">Model</a></th>
								{*<!--{if $ptype eq 1}
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
								{/if}
								{if $ptype eq 1 or $ptype eq 2 or $ptype eq 9 or $ptype eq 10 or $ptype eq 11}
								<th width="150" align="left">Notes</th>
								{/if}  -->*}
								{if $ptype eq 14}
									<th align="left"><a href="#">Type</a></th>
								{/if}
								{if $ptype eq 15 or $ptype eq 16}
									<th align="left"><a href="#">Pulley Diameter</a></th>
									<th align="left"><a href="#">Pulley Grooves</a></th>
								{/if}
								{if $ptype eq 15 or $ptype eq 16}
									<th align="left"><a href="#">Plug Pins</a></th>
								{/if}
								{if $ptype eq 14}
									<th width="150" align="left">Actuator Type</th>
								{/if}
								{if $ptype eq 15}
									<th width="150" align="left">Pulley Type</th>
									<th width="150" align="left">Mounting Points</th>
									<th width="150" align="left">Rear Head No</th>
								{/if}
								{if $ptype eq 16}
									<th width="150" align="left">Pulley Type</th>
									<th width="150" align="left">Amps (A)</th>
									<th width="150" align="left">Mounting Points</th>
								{/if}
								{if $ptype eq 17}
									<th width="150" align="left">Mounting Points</th>
									<th width="150" align="left">Teeth</th>
									<th width="150" align="left">Rotation</th>
								{/if}
								<th width="200" align="center">Actions</th>
							</tr>
						</thead>
						<tbody>            
							{section name=i loop=$gsreqcnt}
							<tr class="{cycle values="odd,"} itemrow{$gsreqcnt[i].partid}" id="item-r{$gsreqcnt[i].cnt}">
								{*<td align="left" class="col-1" nowrap><span class="counter">{$gsreqcnt[i].cnt}</span></td>*}
								{*<td align="left" nowrap><span class="MOB">Part Type:</span>  {$gsreqcnt[i].parttype} </td>*}
								<td align="left" nowrap><span class="MOB">RS Reference:</span> {$gsreqcnt[i].grprsac}{*{$gsreqcnt[i].rsref}*}</td>
								{*<!-- <td align="left"><span class="MOB">A Grade:</span> {$gsreqcnt[i].a_grade}</td> -->*}
								{*<!-- <td align="left"><span class="MOB">B Grade:</span> {$gsreqcnt[i].b_grade}</td> -->*}
								<td align="left"><span class="MOB">Stock:</span> {$gsreqcnt[i].totalstock}</td>
								<td align="left"><span class="MOB">Manufacturer:</span> {$gsreqcnt[i].manufacturer}</td>
								<td align="left"><span class="MOB">Make:</span> {$gsreqcnt[i].make}</td>
								{*<td align="left"><span class="MOB">Model:</span> {$gsreqcnt[i].model}</td>*}
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="{$gsreqcnt[i].model}"><i class="fa fa-automobile"></i></a></td>
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
								{/if}
								{if $ptype eq 1 or $ptype eq 2 or $ptype eq 9 or $ptype eq 10 or $ptype eq 11}
								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> {$gsreqcnt[i].notes}</td>
								{/if} -->*}
								{if $ptype eq 14 }
								<td align="left"><span class="MOB">Type:</span> {$gsreqcnt[i].type}</td>
								{/if}
								{if $ptype eq 15 or $ptype eq 16}
								<td align="left"><span class="MOB">Type:</span> {$gsreqcnt[i].pulley_size}</td>
								<td align="left"><span class="MOB">Pulley Grooves:</span> {$gsreqcnt[i].pulley_grooves}</td>
								{/if}
								{if $ptype eq 15 or $ptype eq 16}
								<td align="left"><span class="MOB">Plug Pins:</span> {$gsreqcnt[i].plug_pins}</td>
								{/if}
								{if $ptype eq 14}
								<td align="left"><span class="MOB">Actuator Type:</span> {$gsreqcnt[i].actuator_type}</td>
								{/if}
								{if $ptype eq 13}
								<td align="left"><span class="MOB">Length:</span> {$gsreqcnt[i].length}</td>
								<td align="left"><span class="MOB">Length:</span> {$gsreqcnt[i].overall_length}</td>
								<td align="left"><span class="MOB">Length:</span> {$gsreqcnt[i].flange}</td>
								<td align="left"><span class="MOB">Length:</span> {$gsreqcnt[i].abs_ring}</td>
								<td align="left"><span class="MOB">Length:</span> {$gsreqcnt[i].teeth_abs_ring}</td>
								<td align="left"><span class="MOB">Length:</span> {$gsreqcnt[i].outer_teething_wheel_side}</td>
								{/if}
								{if $ptype eq 15}
								<td align="left"><span class="MOB">Pulley Type:</span> {$gsreqcnt[i].pulley_type}</td>
								<td align="left"><span class="MOB">Mounting Points:</span> {$gsreqcnt[i].mounting_points}</td>
								<td align="left"><span class="MOB">Rear Head No:</span> {$gsreqcnt[i].rear_head_no}</td>
								{/if}
								{if $ptype eq 16}
								<td align="left"><span class="MOB">Pulley Type:</span> {$gsreqcnt[i].pulley_type}</td>
								<td align="left"><span class="MOB">Amps:</span> {$gsreqcnt[i].amps}</td>
								<td align="left"><span class="MOB">Mounting Points:</span> {$gsreqcnt[i].mounting_points}</td>
								{/if}
								{if $ptype eq 17}
								<td align="left"><span class="MOB">Mounting Points:</span> {$gsreqcnt[i].mounting_points}</td>
								<td align="left"><span class="MOB">Teeth:</span> {$gsreqcnt[i].teeth}</td>
								<td align="left"><span class="MOB">Rotation:</span> {$gsreqcnt[i].rotation}</td>
								{/if}
								<td align="center"><span class="action">
									{if $adminusertype eq "delopt"}
									<a href="view_part.php?type={$ptype}&partid={$gsreqcnt[i].partid}&schid={$schid}" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>
									{if $gsreqcnt[i].pphoto ne ""}<a href="{$gsreqcnt[i].pphoto}" class="image-link tooltip" data-title="{$gsreqcnt[i].rsref}" data-source="view_part.php?type={$ptype}&partid={$gsreqcnt[i].partid}&schid={$schid}" title="See Image"><i class="fa fa-picture-o"></i></a>{else}<i class="fa fa-ellipsis-h"></i>{/if}
									</span>
									{else}
									<a href="update_part.php?type={$ptype}&partid={$gsreqcnt[i].partid}" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>
									{if $gsreqcnt[i].pphoto ne ""}<a href="{$gsreqcnt[i].pphoto}" class="image-link tooltip" data-title="{$gsreqcnt[i].rsref}" data-source="update_part.php?type={$ptype}&partid={$gsreqcnt[i].partid}" title="See Image"><i class="fa fa-picture-o"></i></a>{else}<i class="fa fa-ellipsis-h"></i>{/if}
									{/if}
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

	 $("#page").change(function () {
        var schid = {/literal}{$schid}{literal};
        var ptype = {/literal}{$ptype}{literal};
        var ppage = this.value;
        //alert(ppage);
  		var url = 'view_results.php?mode=show&schid='+schid+'&type='+ptype+'&p='+ppage;
		location.replace(url);
     });
		
});

</script> 
{/literal}