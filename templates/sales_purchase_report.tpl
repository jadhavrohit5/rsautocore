<div class="pageheading"> <a href="sales_data_report.php?mode=show" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> SALES DATA REPORT</h1>
	<div class="add">
		<div class="search_form">
			&nbsp;
		</div>
	</div>
</div>
<div id="main_content">
	<div id="pageBlock"> 
		<div class="row text_align_center">
			{if $msg ne ""}
			<h4 class="redText">&nbsp;{$msg}</h4>
			{/if}
			<p><strong>{$ptypename}</strong> : Sales/Purchase Report from {$startday} to {$today}</p>
		</div>
		{if $total gt 0}
		<div class="GD-30 R text_align_right">
			<p><a class="button btn_gray" href="export_report.php?type={$ptype}">Export Report</a></p>
		</div>
		<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								<th width="30" align="left" style="width:30px;">#</th>
								<th align="left"><a href="#">RSA Ref No. </a></th> 
								<th align="left"><a href="#">Quantity Purchased </a></th>
								<th align="left"><a href="#">Quantity Sold </a></th>
								<th align="left"><a href="#">Average Purchase Price </a></th>
								<th align="left"><a href="#">Average Sale Price </a></th> 
								<th align="left"><a href="#">Present Quantity Total </a></th>
							</tr>
						</thead>
						<tbody>            
							{section name=i loop=$gsreqcnt}
							<tr class="{cycle values="odd,"} itemrow{$gsreqcnt[i].pid}" id="item-r{$gsreqcnt[i].cnt}">
								<td align="left" class="col-1" nowrap><span class="counter">{$gsreqcnt[i].cnt}</span></td>
								<td align="left">{$gsreqcnt[i].rsac} </td>
								<td align="left">{$gsreqcnt[i].purchased} </td>
								<td align="left">{$gsreqcnt[i].sold} </td>
								<td align="left">{$gsreqcnt[i].purchaseprice} </td>
								<td align="left">{$gsreqcnt[i].saleprice} </td>
								<td align="left">{$gsreqcnt[i].totalqnty} </td>
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
						<!-- <option value="10">10</option> -->
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
	 $("#page").change(function () {
        var ptype = {/literal}{$ptype}{literal};
        var ppage = this.value;
        //alert(ppage);
  		var url = 'sales_purchase_report.php?mode=show&type='+ptype+'&p='+ppage;
		location.replace(url);
     });
		
});

</script> 
{/literal}