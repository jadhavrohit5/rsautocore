<div class="pageheading"> <a href="users_activities.php?mode=show" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> SEARCH ACTIVITIES</h1>
	<div class="add">
		<div class="search_form">
			<div class="adv_search_link">&nbsp;</div>
		</div>
	</div>
</div>
<div id="main_content">
	<div id="pageBlock"> 
		<div class="row text_align_center">
			<p class="fontsize18">Search log for&nbsp;<strong>{$vndrname}&nbsp;({$username})</strong>&nbsp;&nbsp;&nbsp;[Search Activities for last 30 days]</p>
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
								<th align="left" width="100">Part <!-- Type -->Group</th>
								<th align="left" width="100">Search Key</th>
								<th align="left" width="100">Search Date</th>
								<th align="left" width="100">Number of Results</th>
								<th align="left" width="100">Have Yes Results?</th>
								<th width="30" align="center">&nbsp;</th>
							</tr>
						</thead>
						<tbody>            
							{section name=i loop=$gswebadm}
							<tr class="{cycle values="odd,"} itemrow{$gswebadm[i].schid}" id="item-r{$gswebadm[i].cnt}">
								<td align="left" class="col-1" nowrap><span class="counter">{$gswebadm[i].cnt}</span></td>
								<td align="left" nowrap><span class="MOB">Part Group:</span> {$gswebadm[i].parttype}</td>
								<td align="left"><span class="MOB">Search Key:</span> {$gswebadm[i].srchtext}</td>
								<td align="center" nowrap><span class="MOB">Search Date:</span> {$gswebadm[i].srchdate}</td>
								<td align="center" nowrap><span class="MOB">Number of Results:</span> {$gswebadm[i].numresults}</td>
								<td align="center" nowrap><span class="MOB">Have Yes Results?:</span> {if $gswebadm[i].yesresult eq '1'}YES{else}-{/if}</td>
								<td align="center">&nbsp;</td>
							</tr>
							{/section} 
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="pagination">
			<div class="L"><span class="filter">&nbsp;</span>
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
        var vnid = {/literal}{$vndrid}{literal};
        var ppage = this.value;
        //alert(ppage);
  		var url = 'user_search_log.php?mode=show&id='+vnid+'&p='+ppage;
		location.replace(url);
     });
		
});

</script> 
{/literal}