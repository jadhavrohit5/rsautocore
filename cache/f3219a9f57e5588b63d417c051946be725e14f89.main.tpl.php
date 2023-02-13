<?php
/* Smarty version 3.1.30, created on 2023-02-14 00:22:10
  from "/Applications/XAMPP/xamppfiles/htdocs/rsautocore/templates/main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eac622921b67_24200313',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a9c11de1b6ff11d727521662143506463f8fc42' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/rsautocore/templates/main.tpl',
      1 => 1676330039,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63eac622921b67_24200313 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Panel Parts Page - Sony AutoParts</title>
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
			<li  class="active" ><a href="parts.php?mode=show&type=2"><span><i class="fa fa-cogs"></i> Parts</span></a>
				<ul>					
										<li ><a href="parts.php?mode=show&type=2"><span><i class="fa fa-circle-o"></i>BRAKE CALIPER</span></a></li>
										<li  class="active" ><a href="parts.php?mode=show&type=1"><span><i class="fa fa-circle-o"></i>STEERING PUMP</span></a></li>
										<li ><a href="parts.php?mode=show&type=3"><span><i class="fa fa-circle-o"></i>LHD POWER</span></a></li>
										<li ><a href="parts.php?mode=show&type=4"><span><i class="fa fa-circle-o"></i>LHD MANUAL</span></a></li>
										<li ><a href="parts.php?mode=show&type=8"><span><i class="fa fa-circle-o"></i>LHD ELECTRIC</span></a></li>
										<li ><a href="parts.php?mode=show&type=5"><span><i class="fa fa-circle-o"></i>RHD POWER</span></a></li>
										<li ><a href="parts.php?mode=show&type=6"><span><i class="fa fa-circle-o"></i>RHD MANUAL</span></a></li>
										<li ><a href="parts.php?mode=show&type=7"><span><i class="fa fa-circle-o"></i>RHD ELECTRIC</span></a></li>
										<li ><a href="parts.php?mode=show&type=17"><span><i class="fa fa-circle-o"></i>STARTER MOTOR</span></a></li>
										<li ><a href="parts.php?mode=show&type=16"><span><i class="fa fa-circle-o"></i>ALTERNATOR</span></a></li>
										<li ><a href="parts.php?mode=show&type=15"><span><i class="fa fa-circle-o"></i>AC COMPRESSOR</span></a></li>
										<li ><a href="parts.php?mode=show&type=14"><span><i class="fa fa-circle-o"></i>TURBOCHARGER</span></a></li>
										<li ><a href="parts.php?mode=show&type=10"><span><i class="fa fa-circle-o"></i>INJECTOR</span></a></li>
										<li ><a href="parts.php?mode=show&type=11"><span><i class="fa fa-circle-o"></i>DIESEL PUMP</span></a></li>
										<li ><a href="parts.php?mode=show&type=9"><span><i class="fa fa-circle-o"></i>EGR VALVE</span></a></li>
										<li ><a href="parts.php?mode=show&type=13"><span><i class="fa fa-circle-o"></i>DRIVESHAFT</span></a></li>
									</ul>
			</li>
			<li ><a href="#"><span><i class="fa fa-user"></i> Admin</span></a>
				<ul>			
					<li ><a href="add_part.php?mode=show"><span><i class="fa fa-plus-square-o"></i>Add New Part</span></a></li>
										<li ><a href="add_part_type.php?mode=show"><span><i class="fa fa-plus-square-o"></i>Add New Part Category</span></a></li>
					<li ><a href="manage_part_type.php?mode=show"><span><i class="fa fa-plus-square-o"></i>Manage Part Categories</span></a></li>
					<li ><a href="manage_customers.php?mode=show"><span><i class="fa fa-address-book"></i>Manage Customers</span></a></li>
					<li ><a href="manage_attributes.php?mode=show"><span><i class="fa fa-address-book"></i>Manage Attributes</span></a></li>
					<li ><a href="users_mgmt.php?mode=show"><span><i class="fa fa-users"></i>Manage Users</span></a></li>
					<li ><a href="manage_podata.php?mode=show"><span><i class="fa fa-address-book"></i>Manage PO/SO</span></a></li>
									</ul>
			</li>
			<li ><a href="#"><span><i class="fa fa-bar-chart"></i> Reports</span></a>
				<ul>
					<li><a href="sales_data_report.php?mode=show"><span><i class="fa fa-circle-o"></i>Sales Data Reports</span></a></li>
				</ul>			
			</li>			
			<li ><a href="#"><span><i class="fa fa-cloud-download"></i> Imports</span></a>
				<ul>
					<li ><a href="import_sales_data.php?mode=show"><span><i class="fa fa-circle-o"></i>Import Sales Data</span></a></li>
					<li ><a href="import_purchase_data.php?mode=show"><span><i class="fa fa-circle-o"></i>Import Purchases Data</span></a></li>	
					<li ><a href="import_parts_data.php?mode=show"><span><i class="fa fa-circle-o"></i>Import Parts Data</span></a></li>	
				</ul>			
			</li>
			<li ><a href="#"><span><i class="fa fa-bar-chart"></i> Export</span></a>
				<ul>
					<li><a href="export_select_type.php?mode=show"><span><i class="fa fa-circle-o"></i>Export Part Data</span></a></li>
				</ul>			
			</li>			
		</ul>
	</div>
</aside> 
<div id="main">
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

<div class="pageheading"> <a href="parts.php?mode=show&type=2" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> Parts - STEERING PUMP</h1>
	<div class="add">
		<div class="search_form">
			<form id="search_frm" name="global_search_frm" method="post" action="quick_search.php" class="tooltip" title="Search for fields, categories tables ctc" onSubmit="return valForm(this)">
				<input name="searchKey" class="input req" value="" type="text" placeholder="Global Search" maxlength="100" />
				<input name="search" class="search_btn" value="Search" type="submit" /> 
				<div class="adv_search_link"><a href="advanced_search.php?mode=show&type=1">Advanced search</a></div>
				<input type="hidden" name="type" value="1">
				<input type="hidden" name="pageaction">
			</form> 
		</div>
	</div>
</div>
<div id="main_content">
	<div id="pageBlock"> 
				<div class="GD-30 R text_align_right">
			<p><a class="button btn_gray" href="export_datas.php?type=1" target="_blank">Export To CSV</a></p>		</div>
		<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								
								
								<th align="left"><a href="#" class="active">RS Reference <!-- <i class="fa fa-angle-down"></i> --></a></th>
																								<th align="left"><a href="#">A Grade <!-- <i class="fa fa-angle-down"></i> --></a></th>
								<th align="left"><a href="#">B Grade <!-- <i class="fa fa-angle-down"></i> --></a></th>
																
								<th align="left"><a href="#">Manufacturer</a></th>
								<th align="left"><a href="#">Make</a></th>
								<th align="left"><a href="#">Model</a></th>
                                									<th align="left"><a href="#">Type</a></th>
																																<th align="left"><a href="#">Pulley Grooves</a></th>
								<th align="left"><a href="#">Pulley Size</a></th>
								<th align="left"><a href="#">Bar Pressure</a></th>
																																<th align="left"><a href="#">Sensor</a></th>
																																                                																								<th width="150" align="left">Notes</th>
								                                																																								<th width="120" align="center">Actions</th>
							</tr>
						</thead>
						<tbody>            
														<tr class="odd itemrow1" id="item-r1">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSSP0590</td>
								<td align="left"><span class="MOB">A Grade:</span> 51</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> Visteon</td>
								<td align="left"><span class="MOB">Make:</span> Ford</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="Transit (FA, FB, FC, FD, FM, FN, FS, FZ)"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Hydraulic</td>
																                                								<td align="left"><span class="MOB">Pulley Grooves:</span> 7</td>
								<td align="left"><span class="MOB">Pulley Size:</span> 126mm</td>
								<td align="left"><span class="MOB">Bar Pressure:</span> 95</td>
																																<td align="left"><span class="MOB">Sensor:</span> No</td>
																																                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> MUST Check OE and pipe angle. DO NOT Confuse with RSSP0590A or RSSP0590B</td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=1&partid=1" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<i class="fa fa-ellipsis-h"></i> 
									<a href="JavaScript:del('parts.php?mode=show&type=1&p=10&pg=1&act=delete&partid=1');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
							</tr>
														<tr class=" itemrow2" id="item-r2">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSSP0767</td>
								<td align="left"><span class="MOB">A Grade:</span> 41</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> Visteon</td>
								<td align="left"><span class="MOB">Make:</span> Ford</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="KA (RB)"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Hydraulic</td>
																                                								<td align="left"><span class="MOB">Pulley Grooves:</span> 6</td>
								<td align="left"><span class="MOB">Pulley Size:</span> 125mm</td>
								<td align="left"><span class="MOB">Bar Pressure:</span> 65 - 75</td>
																																<td align="left"><span class="MOB">Sensor:</span> No</td>
																																                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> MUST Check OE or Cast.</td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=1&partid=2" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<i class="fa fa-ellipsis-h"></i> 
									<a href="JavaScript:del('parts.php?mode=show&type=1&p=10&pg=1&act=delete&partid=2');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
							</tr>
														<tr class="odd itemrow3" id="item-r3">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSSP0106</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> Visteon</td>
								<td align="left"><span class="MOB">Make:</span> Ford</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="Focus (DAW, DBW, DFW, DNW)"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Hydraulic</td>
																                                								<td align="left"><span class="MOB">Pulley Grooves:</span> 6</td>
								<td align="left"><span class="MOB">Pulley Size:</span> 125mm</td>
								<td align="left"><span class="MOB">Bar Pressure:</span> 70</td>
																																<td align="left"><span class="MOB">Sensor:</span> No</td>
																																                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> MUST Check OE or Cast.</td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=1&partid=3" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<i class="fa fa-ellipsis-h"></i> 
									<a href="JavaScript:del('parts.php?mode=show&type=1&p=10&pg=1&act=delete&partid=3');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
							</tr>
														<tr class=" itemrow4" id="item-r4">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSSP0531</td>
								<td align="left"><span class="MOB">A Grade:</span> 16</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> Visteon</td>
								<td align="left"><span class="MOB">Make:</span> Ford/ Mazda</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="Fiesta (JH, JD)/ Fusion (JU)/ 2 (DY)"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Hydraulic</td>
																                                								<td align="left"><span class="MOB">Pulley Grooves:</span> 5</td>
								<td align="left"><span class="MOB">Pulley Size:</span> 77mm</td>
								<td align="left"><span class="MOB">Bar Pressure:</span> 95</td>
																																<td align="left"><span class="MOB">Sensor:</span> No</td>
																																                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> MUST Check OE or Cast.</td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=1&partid=4" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<i class="fa fa-ellipsis-h"></i> 
									<a href="JavaScript:del('parts.php?mode=show&type=1&p=10&pg=1&act=delete&partid=4');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
							</tr>
														<tr class="odd itemrow5" id="item-r5">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSSP2173</td>
								<td align="left"><span class="MOB">A Grade:</span> 54</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> TRW</td>
								<td align="left"><span class="MOB">Make:</span> Vauxhall</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="Astra H (A04)/ Zafira B (A05)"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Electric</td>
																                                								<td align="left"><span class="MOB">Pulley Grooves:</span> N/A</td>
								<td align="left"><span class="MOB">Pulley Size:</span> N/A</td>
								<td align="left"><span class="MOB">Bar Pressure:</span> 85</td>
																																<td align="left"><span class="MOB">Sensor:</span> No</td>
																																                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> MUST Check Cable connector and length of cable, MUST BE short. Do NOT confuse with RSSP2172, RSSP1546, RSSP1547, RSSP0541 or RSSP0541A.</td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=1&partid=5" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<i class="fa fa-ellipsis-h"></i> 
									<a href="JavaScript:del('parts.php?mode=show&type=1&p=10&pg=1&act=delete&partid=5');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
							</tr>
														<tr class=" itemrow6" id="item-r6">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSSP1483</td>
								<td align="left"><span class="MOB">A Grade:</span> 1</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> Toyoda</td>
								<td align="left"><span class="MOB">Make:</span> Toyota</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="Land Cruiser Colorado (J9)"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Hydraulic</td>
																                                								<td align="left"><span class="MOB">Pulley Grooves:</span> Gear Driven</td>
								<td align="left"><span class="MOB">Pulley Size:</span> Gear Driven</td>
								<td align="left"><span class="MOB">Bar Pressure:</span> N/A</td>
																																<td align="left"><span class="MOB">Sensor:</span> No</td>
																																                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> MUST Check OE or Cast. DO NOT Confuse with RSSP0818, RSSP0902 or RSSP0903 different pipe.</td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=1&partid=6" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<i class="fa fa-ellipsis-h"></i> 
									<a href="JavaScript:del('parts.php?mode=show&type=1&p=10&pg=1&act=delete&partid=6');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
							</tr>
														<tr class="odd itemrow7" id="item-r7">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSSP1202</td>
								<td align="left"><span class="MOB">A Grade:</span> 6</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> Honda</td>
								<td align="left"><span class="MOB">Make:</span> Honda</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="Shuttle (RA)"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Hydraulic</td>
																                                								<td align="left"><span class="MOB">Pulley Grooves:</span> 4</td>
								<td align="left"><span class="MOB">Pulley Size:</span> </td>
								<td align="left"><span class="MOB">Bar Pressure:</span> </td>
																																<td align="left"><span class="MOB">Sensor:</span> No</td>
																																                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> MUST Check OE or Cast.</td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=1&partid=7" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<i class="fa fa-ellipsis-h"></i> 
									<a href="JavaScript:del('parts.php?mode=show&type=1&p=10&pg=1&act=delete&partid=7');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
							</tr>
														<tr class=" itemrow8" id="item-r8">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSSP1525</td>
								<td align="left"><span class="MOB">A Grade:</span> 62</td>
								<td align="left"><span class="MOB">B Grade:</span> 1</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> TRW</td>
								<td align="left"><span class="MOB">Make:</span> Ford</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="Focus (DA, DB)/ C-Max"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Electric</td>
																                                								<td align="left"><span class="MOB">Pulley Grooves:</span> N/A</td>
								<td align="left"><span class="MOB">Pulley Size:</span> N/A</td>
								<td align="left"><span class="MOB">Bar Pressure:</span> 106 - 116</td>
																																<td align="left"><span class="MOB">Sensor:</span> No</td>
																																                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> MUST Check OE. 3 Plugs. DO NOT Confuse with RSSP1525A or RSSP0788.</td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=1&partid=8" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<i class="fa fa-ellipsis-h"></i> 
									<a href="JavaScript:del('parts.php?mode=show&type=1&p=10&pg=1&act=delete&partid=8');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
							</tr>
														<tr class="odd itemrow9" id="item-r9">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSSP0034</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> ZF</td>
								<td align="left"><span class="MOB">Make:</span> Audi</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="A8 (4D)"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Hydraulic</td>
																                                								<td align="left"><span class="MOB">Pulley Grooves:</span> N/A</td>
								<td align="left"><span class="MOB">Pulley Size:</span> N/A</td>
								<td align="left"><span class="MOB">Bar Pressure:</span> 120</td>
																																<td align="left"><span class="MOB">Sensor:</span> No</td>
																																                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> MUST Check OE. Triangular hub. Two hydraulic ports.</td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=1&partid=9" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<i class="fa fa-ellipsis-h"></i> 
									<a href="JavaScript:del('parts.php?mode=show&type=1&p=10&pg=1&act=delete&partid=9');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
							</tr>
														<tr class=" itemrow10" id="item-r10">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSSP1265</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> ZF</td>
								<td align="left"><span class="MOB">Make:</span> Audi</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="A8 (4E)"><i class="fa fa-automobile"></i></a></td>
																	<td align="left"><span class="MOB">Type:</span> Hydraulic</td>
																                                								<td align="left"><span class="MOB">Pulley Grooves:</span> N/A</td>
								<td align="left"><span class="MOB">Pulley Size:</span> N/A</td>
								<td align="left"><span class="MOB">Bar Pressure:</span> 130</td>
																																<td align="left"><span class="MOB">Sensor:</span> No</td>
																																                                																								<td align="left" class="fontsize12"><span class="MOB">Notes:</span> Triangular Hub, MUST Check OE and bar pressure.</td>
								                                																																								<td align="center" nowrap><span class="action">
 									<a href="edit_part.php?type=1&partid=10" class="tooltip" title="View Details"><i class="fa fa-search"></i></a>									<i class="fa fa-ellipsis-h"></i> 
									<a href="JavaScript:del('parts.php?mode=show&type=1&p=10&pg=1&act=delete&partid=10');" class="tooltip redText del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>								</td>
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
		<div class="R"><span class="np_control"><span class="pagination-links"><span class="pages">Page(s): </span><span class="paging"> <span class="num">1</span>  <a href="/rsautocore/parts.php?mode=show&type=1&p=10&pg=2" class="num">2</a>  <a href="/rsautocore/parts.php?mode=show&type=1&p=10&pg=3" class="num">3</a> </span> <a href="/rsautocore/parts.php?mode=show&type=1&p=10&pg=2" title="Next" class="btn next"><i class="fa fa-angle-right" ></i></a> <a href="/rsautocore/parts.php?mode=show&type=1&p=10&pg=244" title="Last" class="btn last"><i class="fa fa-angle-double-right"></i></a></span></span> <br>
			<span class="result_found">1 to 10 of 2432 Records</span></div>
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
			var url = "parts.php?mode=show&type=1&act=delete&id="+id;
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
        var ptype = 1;
        var ppage = this.value;
        //alert(ppage);
  		var url = 'parts.php?mode=show&type='+ptype+'&p='+ppage;
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
