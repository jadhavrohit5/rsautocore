<div class="pageheading">{if $isdeletd eq '1'}<a href="purchase_mgmt_deleted.php?mode=show" class="tooltip back_btn" title="BACK TO DELETED POs"><i class="fa fa-angle-left"></i></a>{else}<a href="purchase_mgmt.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE PURCHASES"><i class="fa fa-angle-left"></i></a>{/if}
	<h1><i class="fa fa-cog"></i> View PO Details</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
			{if $msg ne ""}
			<h5 class="redText">{$msg}</h5>
			{else}
			<h5 class="redText">&nbsp;</h5>
			{/if}
		</div>
		<div class="GD-70">
			<div class="form_table">
				<div class="row">
					<form name="frm" method="post" action="purchase_mgmt_view.php??mode=show&id={$poid}">   
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th colspan="2" align="left">PO No# "<strong>{$ponum}</strong>"</th>
							</tr>
						</thead>
						<tr>
							<td colspan="2" class="spacer">&nbsp;</td>
						</tr>
						<tr>
							<td valign="top" width="18%"><strong>Supplier Name:</strong></td>
							<td valign="top" width="82%">{$vendorname}</td>
						</tr>
						<tr>
							<td valign="top"><strong>Total Order:</strong></td>
							<td valign="top"><!-- &pound; -->{$vndrcur}{$totalorder}</td>
						</tr>
						<tr>
							<td valign="top"><strong>Date Posted:</strong></td>
							<td valign="top">{$dateposted}</td>
						</tr>
						<tr>
							<td colspan="4" class="spacer"></td>
						</tr>
					</table><!-- <br> -->
					<div class="chart">
					<table border="0" cellspacing="0" cellpadding="0">
						<thead>
							<tr>
								<th width="30" align="left" style="width:30px;">#</th>
								<th>OE Number</th>
								<th>RSAC Ref</th>
								<th>Part Type</th>
								<th>Purchase Price</th>
								<th>Offered Quantity</th>
								<th>Total Amount</th>
								<th>Delivered</th>
							</tr>
						</thead>
						<tbody>
							{section name=i loop=$pordlist}
							<tr class="{cycle values="odd,"} itemrow{$pordlist[i].cid}" id="item-r{$pordlist[i].cnt}">
								<td align="left" class="col-1" nowrap><span class="counter">{$pordlist[i].cnt}</span></td>
								<td align="left"><span class="MOB">OE Number:</span> {$pordlist[i].oenumber}</td>
								<td align="left"><span class="MOB">RSAC Ref:</span> {$pordlist[i].rsacref}</td>
								<td align="left"><span class="MOB">Part Type:</span> {$pordlist[i].parttype}</td>
								<td align="right"><span class="MOB">Purchase Price:</span> {*<!-- &pound; -->*}{$vndrcur}{$pordlist[i].buyprice}</td>
								<td align="right"><span class="MOB">Offered Quantity:</span> {$pordlist[i].ofrstock}</td>
								<td align="left"><span class="MOB">Total Amount:</span> {$pordlist[i].ofrstock} X {$vndrcur}{$pordlist[i].buyprice}{*<!-- &pound;{$pordlist[i].ofrprice} -->*}</td>
								<td align="center"><span class="MOB">Delivered:</span>
								<input type="checkbox" name="delvopt[]" id="delvopt[]" value="{$pordlist[i].cid}" {if $pordlist[i].delvrd eq '1'} checked {/if}> 
								{*<!-- {if $pordlist[i].delvrd eq '1'}Yes{else}No{/if} -->*}</td>
							</tr>
							{/section} 
						</tbody>
					</table>
					</div>
					<div class="row">
						<div id="action_bar">
						<strong>Update Delivery Status of Parts: </strong> <input type="submit" name="submit" value="Update" class="button">
						<input type="hidden" name="mode" value="itmdelivered">
						<input type="hidden" name="pageaction" value="itmdelivered">
						<input type="hidden" name="ponumbr" value="{$ponum}">
						</div>
					</div>
					</form>
				</div>
					<div class="row text_align_center">
						<div id="action_bar">
							<p><a class="button" href="download_po.php?id={$poid}">Download PO Details</a><!-- added new -->
							{if $isdeletd eq '1'}
							<a href="purchase_mgmt_deleted.php?mode=show" class="button btn_gray" style="width:100px;">Back</a></p>
							{else}
							<a href="purchase_mgmt.php?mode=show" class="button btn_gray" style="width:100px;">Back</a></p>
							{/if}
						</div>
					</div>
			</div>
		</div>
	</div>
</div>