{literal}
<script language="JavaScript">
function del(str) 
{
	if(confirm("Are you sure you want to delete this item?"))
		location.replace(str);
}
</script>
{/literal}
<div class="pageheading"> <a href="parts.php?mode=show&type=1" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> MANAGE CAR MANUFACTURERS</h1>
	<div class="add">
		<div class="search_form">
			<div class="adv_search_link"><a href="add_manufacturer.php?mode=show">Add New Car Manufacturer</a></div>
		</div>
	</div>
</div>
<div id="main_content">
	<div id="pageBlock"> 
		<div class="row text_align_center">
			{if $msg ne ""}
			<h4 class="redText">&nbsp;{$msg}</h4>
			{/if}
		</div>
		{if $total gt 0}
		<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								<th width="30" align="left" style="width:30px;">#</th>
								<th align="left"><a href="#">Car Manufacturer Name </a></th>
								<th width="200" align="center">Actions</th>
							</tr>
						</thead>
						<tbody>            
							{section name=i loop=$gsreqcnt}
							<tr class="{cycle values="odd,"} itemrow{$gsreqcnt[i].cmid}" id="item-r{$gsreqcnt[i].cnt}">
								<td align="left" class="col-1" nowrap><span class="counter">{$gsreqcnt[i].cnt}</span></td>
								<td align="left">{$gsreqcnt[i].manufacturernm} </td>
								<td align="center"><span class="action">
									<a href="edit_manufacturer.php?mode=show&cmid={$gsreqcnt[i].cmid}" class="tooltip" title="Edit"><i class="fa fa-search"></i></a> 
									<a href="JavaScript:del('manage_manufacturers.php?mode=show&act=delete&id={$gsreqcnt[i].cmid}');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
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
			<p>&nbsp;</p>
		</div>
		{/if}
	</div>
</div>
{literal}
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
			var url = "manage_manufacturers.php?mode=show&act=delete&id="+id;
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
  		var url = 'manage_manufacturers.php?mode=show&p='+ppage;
		location.replace(url);
     });
		
});

</script> 
{/literal}