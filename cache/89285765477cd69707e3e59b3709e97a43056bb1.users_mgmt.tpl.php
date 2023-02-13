<?php
/* Smarty version 3.1.30, created on 2023-02-14 00:20:31
  from "/Applications/XAMPP/xamppfiles/htdocs/rsautocore/templates/users_mgmt.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eac5bfac8f05_90331074',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd765847d643e4941c80d740552a99c2ba2e926a0' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/rsautocore/templates/users_mgmt.tpl',
      1 => 1676330038,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63eac5bfac8f05_90331074 (Smarty_Internal_Template $_smarty_tpl) {
?>

<script language="JavaScript">
function del(str) 
{
	if(confirm("Are you sure you want to delete this item?"))
		location.replace(str);
}
</script>

<div class="pageheading"> <a href="parts.php?mode=show&type=1" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
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
														<tr class="odd itemrowMQ==" id="item-r1">
								<td align="left" class="col-1" nowrap><span class="counter">1</span></td>
								<td align="left" nowrap>admin</td>
								<td align="left">admin</td>
								<td align="left">Main Admin User</td>
								<td align="right" nowrap>06/12/2018</td>
								<td align="right" nowrap>14/02/2023</td>
								<td align="center"><span class="action">
								<a href="users_mgmt_view.php?mode=show&id=MQ==" class="tooltip" title="View"><i class="fa fa-search"></i></a>
								<a href="users_mgmt_edit.php?mode=show&id=MQ==" class="tooltip" title="Edit"><i class="fa fa-file-o"></i></a></span>								
								<a href="JavaScript:del('users_mgmt.php?mode=delete&act=delete&id=MQ==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowMg==" id="item-r2">
								<td align="left" class="col-1" nowrap><span class="counter">2</span></td>
								<td align="left" nowrap>rsacuser</td>
								<td align="left">Peter Smith</td>
								<td align="left">Warehouse User</td>
								<td align="right" nowrap>06/12/2018</td>
								<td align="right" nowrap>03/02/2023</td>
								<td align="center"><span class="action">
								<a href="users_mgmt_view.php?mode=show&id=Mg==" class="tooltip" title="View"><i class="fa fa-search"></i></a>
								<a href="users_mgmt_edit.php?mode=show&id=Mg==" class="tooltip" title="Edit"><i class="fa fa-file-o"></i></a></span>								
								<a href="JavaScript:del('users_mgmt.php?mode=delete&act=delete&id=Mg==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowMw==" id="item-r3">
								<td align="left" class="col-1" nowrap><span class="counter">3</span></td>
								<td align="left" nowrap>test</td>
								<td align="left">Testing</td>
								<td align="left">Warehouse User</td>
								<td align="right" nowrap>03/02/2023</td>
								<td align="right" nowrap>10/02/2023</td>
								<td align="center"><span class="action">
								<a href="users_mgmt_view.php?mode=show&id=Mw==" class="tooltip" title="View"><i class="fa fa-search"></i></a>
								<a href="users_mgmt_edit.php?mode=show&id=Mw==" class="tooltip" title="Edit"><i class="fa fa-file-o"></i></a></span>								
								<a href="JavaScript:del('users_mgmt.php?mode=delete&act=delete&id=Mw==');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
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
			<span class="result_found">1 to 3 of 3 Records</span></div>
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
