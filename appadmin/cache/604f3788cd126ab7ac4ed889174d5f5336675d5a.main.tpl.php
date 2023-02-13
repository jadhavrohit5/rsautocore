<?php
/* Smarty version 3.1.30, created on 2023-02-11 10:05:50
  from "/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e7687eb86274_97828292',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd4b540fa77b44808fa4eb39e571631b0d782673' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/main.tpl',
      1 => 1647318208,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63e7687eb86274_97828292 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Manage Purchases Page - Sony AutoParts</title>
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<link rel="stylesheet" type="text/css" href="css/jk-grid100.css"/>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" type="text/css" href="css/responsive.css"/>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-3.0.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.12.1.min.js"></script>
<script type="text/javascript" src="js/jk-sidebar-menu.js"></script>
<script type="text/javascript" src="js/default.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="js/jk_lightbox/lightbox.js"></script>
<script type="text/javascript">var ADMIN_ROOT = ''; var ROOT = ''; var VIEW = ''; var ACT = ''; var TASK = ''; var ID = ''; </script>
<link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon"/>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
<![endif]-->

<!--[if lt IE 8]><div style='clear: both; text-align:center; position: relative; background:#333;'><a href="//windows.microsoft.com/en-us/internet-explorer/download-ie" style="color:#fff;">You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.</a></div>
<![endif]-->

<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="js/magnific-popup/magnific-popup.css">
<!-- Magnific Popup core JS file -->
<script src="js/magnific-popup/jquery.magnific-popup.min.js"></script>
	

<script type="text/javascript">
	jQuery( document ).ready( function ( $ ) {
		$( document ).tooltip( {
			items: '.tooltip',
			content: function () {
				return $( this ).prop( 'title' )
			}
		} );
	} );
</script>

</head>
<body>
<header id="header">
	<a href="#" class="sidebar-toggle close"><span>Toggle navigation</span></a>
	<div class="logo"><a href="#"><img src="images/logo.png" align="" alt="" /></a>
	</div>
	<div class="sitename"></div>
	<div id="headerRight"> <span class="c">Welcome Main Admin User</span> <!-- <a href="#"> Manage Profile</a> --> |  <a href="logout.php" class="logout"> Logout <i class="fa fa-power-off"></i></a>
	</div>
</header>
<aside id="sidebar-left">
	<div class="sidebar-menu">
		<h3>MAIN NAVIGATION</h3>
		<ul class="menu">
			<li  class="active" ><a href="#"><span><i class="fa fa-user"></i> Admin</span></a>
				<ul>			
					<li ><a href="users_mgmt.php?mode=show"><span><i class="fa fa-users"></i>Manage Users</span></a></li>
					<li  class="active" ><a href="purchase_mgmt.php?mode=show"><span><i class="fa fa-address-book"></i>Manage Purchases</span></a></li>
					<li ><a href="users_activities.php?mode=show"><span><i class="fa fa-bar-chart"></i>Users Activities</span></a></li>
					<li ><a href="export_po_data.php?mode=show"><span><i class="fa fa-bar-chart"></i>Export PO By Supplier</span></a></li>
					<li ><a href="onway_data_mgmt.php?mode=show"><span><i class="fa fa-bar-chart"></i>Manage On-way Data</span></a></li><!--  -->
				</ul>
			</li>
		</ul>
	</div>
</aside> 
<div id="main">

<script language="JavaScript">
function del(str) 
{
	if(confirm("Are you sure you want to delete this PO?"))
		location.replace(str);
}
</script>

<div class="pageheading"> <a href="#" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> MANAGE PURCHASES</h1>
	<div class="add">
		<div class="search_form">
			<div class="adv_search_link">&nbsp;</div>
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
								<th align="center" width="160">PO NO#</th>
								<th align="center" width="260">Supplier Name</th>
								<th align="center" width="100">Total Order</th>
								<th align="center" width="100">Date Posted</th>
								<th align="center" width="100">Delivery Status</th>
								<th width="200" align="center">Actions</th>
							</tr>
						</thead>
						<tbody>            
														<tr class="odd itemrowODMz" id="item-r1">
								<td align="left" class="col-1" nowrap><span class="counter">1</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000833</td>
								<td align="left"><span class="MOB">Supplier Name:</span> S Das</td>
								<td align="right"><span class="MOB">Total Order:</span> 115.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 11/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODMz" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODMz" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODMz');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowODMy" id="item-r2">
								<td align="left" class="col-1" nowrap><span class="counter">2</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000832</td>
								<td align="left"><span class="MOB">Supplier Name:</span> S Das</td>
								<td align="right"><span class="MOB">Total Order:</span> 83.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 11/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODMy" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODMy" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODMy');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowODMx" id="item-r3">
								<td align="left" class="col-1" nowrap><span class="counter">3</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000831</td>
								<td align="left"><span class="MOB">Supplier Name:</span> S Das</td>
								<td align="right"><span class="MOB">Total Order:</span> 108.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 11/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODMx" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODMx" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODMx');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowODMw" id="item-r4">
								<td align="left" class="col-1" nowrap><span class="counter">4</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000830</td>
								<td align="left"><span class="MOB">Supplier Name:</span> GT Breakers</td>
								<td align="right"><span class="MOB">Total Order:</span> 20.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 10/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODMw" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODMw" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODMw');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowODI5" id="item-r5">
								<td align="left" class="col-1" nowrap><span class="counter">5</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000829</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Danaius</td>
								<td align="right"><span class="MOB">Total Order:</span> 80.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 08/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODI5" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODI5" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODI5');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowODI4" id="item-r6">
								<td align="left" class="col-1" nowrap><span class="counter">6</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000828</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Danaius</td>
								<td align="right"><span class="MOB">Total Order:</span> 60.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 07/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODI4" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODI4" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODI4');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowODI3" id="item-r7">
								<td align="left" class="col-1" nowrap><span class="counter">7</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000827</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Danaius</td>
								<td align="right"><span class="MOB">Total Order:</span> 62.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 06/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODI3" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODI3" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODI3');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowODI2" id="item-r8">
								<td align="left" class="col-1" nowrap><span class="counter">8</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000826</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Danaius</td>
								<td align="right"><span class="MOB">Total Order:</span> 115.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 03/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODI2" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODI2" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODI2');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class="odd itemrowODI1" id="item-r9">
								<td align="left" class="col-1" nowrap><span class="counter">9</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000825</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Danaius</td>
								<td align="right"><span class="MOB">Total Order:</span> 153.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 02/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODI1" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODI1" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODI1');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
								</td>
							</tr>
														<tr class=" itemrowODI0" id="item-r10">
								<td align="left" class="col-1" nowrap><span class="counter">10</span></td>
								<td align="left" nowrap><span class="MOB">PO NO#:</span> PO-M000824</td>
								<td align="left"><span class="MOB">Supplier Name:</span> Dani</td>
								<td align="right"><span class="MOB">Total Order:</span> 650.00</td>
								<td align="center"><span class="MOB">Date Posted:</span> 01/02/2023</td>
								<td align="center"><span class="MOB">Delivery Status:</span> NO</td>
								<td align="center"><span class="action">
								<a href="purchase_mgmt_view.php?mode=show&id=ODI0" class="tooltip" title="View"><i class="fa fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="download_po.php?id=ODI0" class="tooltip" title="Download"><i class="fa fa-download"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="JavaScript:del('purchase_mgmt.php?mode=show&act=delete&id=ODI0');" class="tooltip" title="Delete" ><i class="fa fa-trash-o"></i></a></span>
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
		<div class="R"><span class="np_control"><span class="pagination-links"><span class="pages">Page(s): </span><span class="paging"> <span class="num">1</span>  <a href="/appadmin/purchase_mgmt.php?mode=show&p=10&pg=2" class="num">2</a>  <a href="/appadmin/purchase_mgmt.php?mode=show&p=10&pg=3" class="num">3</a> </span> <a href="/appadmin/purchase_mgmt.php?mode=show&p=10&pg=2" title="Next" class="btn next"><i class="fa fa-angle-right" ></i></a> <a href="/appadmin/purchase_mgmt.php?mode=show&p=10&pg=8" title="Last" class="btn last"><i class="fa fa-angle-double-right"></i></a></span></span> <br>
			<span class="result_found">1 to 10 of 77 Records</span></div>
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
			var url = "purchase_mgmt.php?mode=show&act=delete&id="+id;
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
  		var url = 'purchase_mgmt.php?mode=show&p='+ppage;
		location.replace(url);
     });
		
});

</script> 
<!-- MAIN CONTENT -->
</div>
<footer id="footer">   
	<p>&copy; 2023 Sony AutoParts. All Rights Reserved.</p>        
</footer>
</body>
</html><?php }
}
