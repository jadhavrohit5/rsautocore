<?php
/* Smarty version 3.1.30, created on 2023-02-11 10:04:41
  from "/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/users_mgmt.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e768399feef7_72905025',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '39c8977eff4ed19b6d440fcacf1b2e5389e2e510' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/users_mgmt.tpl',
      1 => 1646670705,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63e768399feef7_72905025 (Smarty_Internal_Template $_smarty_tpl) {
?>

<script language="JavaScript">
function del(str) 
{
	if(confirm("Are you sure you want to delete this user?"))
		location.replace(str);
}
</script>

<div class="pageheading"> <a href="#" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> MANAGE USERS</h1>
	<div class="add">
		<div class="search_form">
			<div class="adv_search_link"><a href="users_mgmt_add.php?mode=show">Add New User</a></div>
		</div>
	</div>
</div>
<div id="main_content">
	<div id="pageBlock"> 
		<div class="row text_align_center">
					</div>
				<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								<th width="30" align="left" style="width:30px;">#</th>
								<th align="left" width="160">User Login Name</th>
								<th align="left" width="260">User Full Name</th>
								<th align="left" width="100">User Type</th>
								<th align="left" width="100">Date Created</th>
								<th align="left" width="100">Last Accessed</th>
								<th width="200" align="center">Actions</th>
							</tr>
						</thead>
						<tbody>            
														<tr class="odd itemrowMTA=" id="item-r1">
								<td align="left" class="col-1" nowrap><span class="counter">1</span></td>
								<td align="left" nowrap><span class="MOB">User Login Name:</span> appuser</td>
								<td align="left"><span class="MOB">User Full Name:</span> S Das</td>
								<td align="left"><span class="MOB">User Type:</span> Vendor</td>
								<td align="right" nowrap><span class="MOB">Date Created:</span> 04/12/2019</td>
								<td align="right" nowrap><span class="MOB">Last Accessed:</span> 11/02/2023</td>
								<td align="center"><span class="action">
								<a href="users_mgmt_view.php?mode=show&id=MTA=" class="tooltip" title="View"><i class="fa fa-search"></i></a> 
								<a href="users_mgmt_edit.php?mode=show&id=MTA=" class="tooltip" title="Edit"><i class="fa fa-file-o"></i></a> 
								<a href="JavaScript:del('users_mgmt.php?mode=show&act=delete&id=MTA=');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowMTQ=" id="item-r2">
								<td align="left" class="col-1" nowrap><span class="counter">2</span></td>
								<td align="left" nowrap><span class="MOB">User Login Name:</span> Tony-dcs</td>
								<td align="left"><span class="MOB">User Full Name:</span> Tony Macbeath</td>
								<td align="left"><span class="MOB">User Type:</span> Vendor</td>
								<td align="right" nowrap><span class="MOB">Date Created:</span> 21/02/2020</td>
								<td align="right" nowrap><span class="MOB">Last Accessed:</span> 06/02/2023</td>
								<td align="center"><span class="action">
								<a href="users_mgmt_view.php?mode=show&id=MTQ=" class="tooltip" title="View"><i class="fa fa-search"></i></a> 
								<a href="users_mgmt_edit.php?mode=show&id=MTQ=" class="tooltip" title="Edit"><i class="fa fa-file-o"></i></a> 
								<a href="JavaScript:del('users_mgmt.php?mode=show&act=delete&id=MTQ=');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowMTU=" id="item-r3">
								<td align="left" class="col-1" nowrap><span class="counter">3</span></td>
								<td align="left" nowrap><span class="MOB">User Login Name:</span> Sonny</td>
								<td align="left"><span class="MOB">User Full Name:</span> Sonny Wymer</td>
								<td align="left"><span class="MOB">User Type:</span> Vendor</td>
								<td align="right" nowrap><span class="MOB">Date Created:</span> 29/03/2020</td>
								<td align="right" nowrap><span class="MOB">Last Accessed:</span> 10/02/2023</td>
								<td align="center"><span class="action">
								<a href="users_mgmt_view.php?mode=show&id=MTU=" class="tooltip" title="View"><i class="fa fa-search"></i></a> 
								<a href="users_mgmt_edit.php?mode=show&id=MTU=" class="tooltip" title="Edit"><i class="fa fa-file-o"></i></a> 
								<a href="JavaScript:del('users_mgmt.php?mode=show&act=delete&id=MTU=');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowMTY=" id="item-r4">
								<td align="left" class="col-1" nowrap><span class="counter">4</span></td>
								<td align="left" nowrap><span class="MOB">User Login Name:</span> Ryan</td>
								<td align="left"><span class="MOB">User Full Name:</span> Ryan Webster</td>
								<td align="left"><span class="MOB">User Type:</span> Vendor</td>
								<td align="right" nowrap><span class="MOB">Date Created:</span> 29/03/2020</td>
								<td align="right" nowrap><span class="MOB">Last Accessed:</span> 07/02/2023</td>
								<td align="center"><span class="action">
								<a href="users_mgmt_view.php?mode=show&id=MTY=" class="tooltip" title="View"><i class="fa fa-search"></i></a> 
								<a href="users_mgmt_edit.php?mode=show&id=MTY=" class="tooltip" title="Edit"><i class="fa fa-file-o"></i></a> 
								<a href="JavaScript:del('users_mgmt.php?mode=show&act=delete&id=MTY=');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowMTk=" id="item-r5">
								<td align="left" class="col-1" nowrap><span class="counter">5</span></td>
								<td align="left" nowrap><span class="MOB">User Login Name:</span> bjjdanidb@gmail.com</td>
								<td align="left"><span class="MOB">User Full Name:</span> Dani</td>
								<td align="left"><span class="MOB">User Type:</span> Vendor</td>
								<td align="right" nowrap><span class="MOB">Date Created:</span> 18/10/2020</td>
								<td align="right" nowrap><span class="MOB">Last Accessed:</span> 02/02/2023</td>
								<td align="center"><span class="action">
								<a href="users_mgmt_view.php?mode=show&id=MTk=" class="tooltip" title="View"><i class="fa fa-search"></i></a> 
								<a href="users_mgmt_edit.php?mode=show&id=MTk=" class="tooltip" title="Edit"><i class="fa fa-file-o"></i></a> 
								<a href="JavaScript:del('users_mgmt.php?mode=show&act=delete&id=MTk=');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowMjA=" id="item-r6">
								<td align="left" class="col-1" nowrap><span class="counter">6</span></td>
								<td align="left" nowrap><span class="MOB">User Login Name:</span> mpt.tadas@gmail.com</td>
								<td align="left"><span class="MOB">User Full Name:</span> Danaius</td>
								<td align="left"><span class="MOB">User Type:</span> Vendor</td>
								<td align="right" nowrap><span class="MOB">Date Created:</span> 23/11/2020</td>
								<td align="right" nowrap><span class="MOB">Last Accessed:</span> 10/02/2023</td>
								<td align="center"><span class="action">
								<a href="users_mgmt_view.php?mode=show&id=MjA=" class="tooltip" title="View"><i class="fa fa-search"></i></a> 
								<a href="users_mgmt_edit.php?mode=show&id=MjA=" class="tooltip" title="Edit"><i class="fa fa-file-o"></i></a> 
								<a href="JavaScript:del('users_mgmt.php?mode=show&act=delete&id=MjA=');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowMjg=" id="item-r7">
								<td align="left" class="col-1" nowrap><span class="counter">7</span></td>
								<td align="left" nowrap><span class="MOB">User Login Name:</span> globalautocore@sky.com</td>
								<td align="left"><span class="MOB">User Full Name:</span> Paul Global auto core</td>
								<td align="left"><span class="MOB">User Type:</span> Vendor</td>
								<td align="right" nowrap><span class="MOB">Date Created:</span> 11/10/2021</td>
								<td align="right" nowrap><span class="MOB">Last Accessed:</span> 08/02/2023</td>
								<td align="center"><span class="action">
								<a href="users_mgmt_view.php?mode=show&id=Mjg=" class="tooltip" title="View"><i class="fa fa-search"></i></a> 
								<a href="users_mgmt_edit.php?mode=show&id=Mjg=" class="tooltip" title="Edit"><i class="fa fa-file-o"></i></a> 
								<a href="JavaScript:del('users_mgmt.php?mode=show&act=delete&id=Mjg=');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowMjk=" id="item-r8">
								<td align="left" class="col-1" nowrap><span class="counter">8</span></td>
								<td align="left" nowrap><span class="MOB">User Login Name:</span> petertest</td>
								<td align="left"><span class="MOB">User Full Name:</span> Peter Smith</td>
								<td align="left"><span class="MOB">User Type:</span> Vendor</td>
								<td align="right" nowrap><span class="MOB">Date Created:</span> 17/11/2021</td>
								<td align="right" nowrap><span class="MOB">Last Accessed:</span> 06/04/2022</td>
								<td align="center"><span class="action">
								<a href="users_mgmt_view.php?mode=show&id=Mjk=" class="tooltip" title="View"><i class="fa fa-search"></i></a> 
								<a href="users_mgmt_edit.php?mode=show&id=Mjk=" class="tooltip" title="Edit"><i class="fa fa-file-o"></i></a> 
								<a href="JavaScript:del('users_mgmt.php?mode=show&act=delete&id=Mjk=');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowMzE=" id="item-r9">
								<td align="left" class="col-1" nowrap><span class="counter">9</span></td>
								<td align="left" nowrap><span class="MOB">User Login Name:</span> carcoreparts@gmail.com</td>
								<td align="left"><span class="MOB">User Full Name:</span> Renars</td>
								<td align="left"><span class="MOB">User Type:</span> Vendor</td>
								<td align="right" nowrap><span class="MOB">Date Created:</span> 14/12/2021</td>
								<td align="right" nowrap><span class="MOB">Last Accessed:</span> 06/02/2023</td>
								<td align="center"><span class="action">
								<a href="users_mgmt_view.php?mode=show&id=MzE=" class="tooltip" title="View"><i class="fa fa-search"></i></a> 
								<a href="users_mgmt_edit.php?mode=show&id=MzE=" class="tooltip" title="Edit"><i class="fa fa-file-o"></i></a> 
								<a href="JavaScript:del('users_mgmt.php?mode=show&act=delete&id=MzE=');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowMzY=" id="item-r10">
								<td align="left" class="col-1" nowrap><span class="counter">10</span></td>
								<td align="left" nowrap><span class="MOB">User Login Name:</span> GT Breakers</td>
								<td align="left"><span class="MOB">User Full Name:</span> GT Breakers</td>
								<td align="left"><span class="MOB">User Type:</span> Vendor</td>
								<td align="right" nowrap><span class="MOB">Date Created:</span> 28/02/2022</td>
								<td align="right" nowrap><span class="MOB">Last Accessed:</span> 10/02/2023</td>
								<td align="center"><span class="action">
								<a href="users_mgmt_view.php?mode=show&id=MzY=" class="tooltip" title="View"><i class="fa fa-search"></i></a> 
								<a href="users_mgmt_edit.php?mode=show&id=MzY=" class="tooltip" title="Edit"><i class="fa fa-file-o"></i></a> 
								<a href="JavaScript:del('users_mgmt.php?mode=show&act=delete&id=MzY=');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
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
		<div class="R"><span class="np_control"><span class="pagination-links"><span class="pages">Page(s): </span><span class="paging"> <span class="num">1</span>  <a href="/appadmin/users_mgmt.php?mode=show&p=10&pg=2" class="num">2</a> </span> <a href="/appadmin/users_mgmt.php?mode=show&p=10&pg=2" title="Next" class="btn next"><i class="fa fa-angle-right" ></i></a> <a href="/appadmin/users_mgmt.php?mode=show&p=10&pg=2" title="Last" class="btn last"><i class="fa fa-angle-double-right"></i></a></span></span> <br>
			<span class="result_found">1 to 10 of 20 Records</span></div>
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
		var agree = confirm('Are you sure you want to delete this item?');
 		if(agree){  
			obj.text('Deleting...');
			//var url = ADMIN_ROOT+"/parts.php?act=delete&id="+id;
			var url = "users_mgmt.php?mode=show&act=delete&id="+id;
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
  		var url = 'users_mgmt.php?mode=show&p='+ppage;
		location.replace(url);
     });
		
});

</script> 
<?php }
}
