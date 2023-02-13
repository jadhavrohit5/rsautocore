<?php
/* Smarty version 3.1.30, created on 2023-02-13 23:09:07
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/main_user.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eac3137e8514_65507464',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f372969d97fdddacef7aa72964e320baca0b82a' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/main_user.tpl',
      1 => 1676018725,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63eac3137e8514_65507464 (Smarty_Internal_Template $_smarty_tpl) {
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
	<div id="headerRight"> <span class="c">Welcome Warehouse User</span>  |  <a href="logout.php" class="logout"> Logout <i class="fa fa-power-off"></i></a>
	</div>
</header>
<aside id="sidebar-left">
	<div class="sidebar-menu">
		<h3>MAIN NAVIGATION</h3>
		<ul class="menu">
			<li  class="active" ><a href="partslist.php?mode=show&type=3"><span><i class="fa fa-cogs"></i> Parts</span></a>
				<ul>					
										<li  class="active" ><a href="partslist.php?mode=show&type=3"><span><i class="fa fa-circle-o"></i>LHD POWER</span></a></li>
										<li ><a href="partslist.php?mode=show&type=8"><span><i class="fa fa-circle-o"></i>LHD ELECTRIC</span></a></li>
										<li ><a href="partslist.php?mode=show&type=9"><span><i class="fa fa-circle-o"></i>EGR VALVE</span></a></li>
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

<div class="pageheading"> <a href="partslist.php?mode=show&type=3" class="tooltip back_btn" title="BACK"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cogs"></i> Parts - LHD POWER</h1>
	<div class="add">
		<div class="search_form">
			<form id="search_frm" name="global_search_frm" method="post" action="quick_search.php" class="tooltip" title="Search for fields, categories tables ctc" onSubmit="return valForm(this)">
				<input name="searchKey" class="input req" value="" type="text" placeholder="Global Search" maxlength="100" />
				<input name="search" class="search_btn" value="Search" type="submit" /> 
				<div class="adv_search_link"><a href="advanced_search.php?mode=show&type=3">Advanced search</a></div>
				<input type="hidden" name="type" value="3">
				<input type="hidden" name="pageaction">
			</form> 
		</div>
	</div>
</div>
<div id="main_content">
	<div id="pageBlock"> 
				<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								
								
								<th align="left"><a href="#" class="active">RS Reference</a></th>
																								<th align="left"><a href="#">A Grade</a></th>
								<th align="left"><a href="#">B Grade</a></th>
																<th align="left"><a href="#">Manufacturer</a></th>
								<th align="left"><a href="#">Make</a></th>
								<th align="left"><a href="#">Model</a></th>
                                																																<th align="left"><a href="#">Length</a></th>
								<th align="left"><a href="#">Turns</a></th>
								<th align="left"><a href="#">T-Rod Thread Size</a></th>
																								<th align="left"><a href="#">Sensor</a></th>
																																								<th align="left"><a href="#">Pinion Length</a></th>
								<th align="left"><a href="#">Pinion type</a></th>
								                                																	<th align="left"><a href="#">Lock Stops Size</a></th>
									<th align="left"><a href="#">Lock Stops Colour</a></th>
																                                																																								<th width="120" align="center">Actions</th>
							</tr>
						</thead>
						<tbody>            
														<tr class="odd itemrow7164" id="item-r1">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSRL001</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> TRW</td>
								<td align="left"><span class="MOB">Make:</span> Alfa Romeo</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="164 (164)"><i class="fa fa-automobile"></i></a></td>
																                                																<td align="left"><span class="MOB">Length:</span> 1130mm</td>
								<td align="left"><span class="MOB">Turns:</span> 3 1/4</td>
								<td align="left"><span class="MOB">T-Rod Thread Size:</span> 14mm</td>
																								<td align="left"><span class="MOB">Sensor:</span> No</td>
																																								<td align="left"><span class="MOB">Pinion Length:</span> 66mm</td>
								<td align="left"><span class="MOB">Pinion type:</span> Splined</td>
								                                																	<td align="left"><span class="MOB">Lock Stops Size:</span> </td>
									<td align="left"><span class="MOB">Lock Stops Colour:</span> </td>
																                                																																								<td align="center"><span class="action">
                                	<a href="update_part.php?type=3&partid=7164" class="tooltip" title="View Details"><i class="fa fa-search"></i></a></span>
									<a href="uploads/RSRSL001...png" class="image-link tooltip" data-title="RSRL001" data-source="update_part.php?type=3&partid=7164" title="See Image"><i class="fa fa-picture-o"></i></a>								</td>
							</tr>
														<tr class=" itemrow7165" id="item-r2">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSRL002</td>
								<td align="left"><span class="MOB">A Grade:</span> 12</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> TRW</td>
								<td align="left"><span class="MOB">Make:</span> Alfa Romeo</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="156 (932)"><i class="fa fa-automobile"></i></a></td>
																                                																<td align="left"><span class="MOB">Length:</span> 1295mm</td>
								<td align="left"><span class="MOB">Turns:</span> 2 1/4</td>
								<td align="left"><span class="MOB">T-Rod Thread Size:</span> 14mm</td>
																								<td align="left"><span class="MOB">Sensor:</span> No</td>
																																								<td align="left"><span class="MOB">Pinion Length:</span> 52mm</td>
								<td align="left"><span class="MOB">Pinion type:</span> Splined (Fine)</td>
								                                																	<td align="left"><span class="MOB">Lock Stops Size:</span> </td>
									<td align="left"><span class="MOB">Lock Stops Colour:</span> </td>
																                                																																								<td align="center"><span class="action">
                                	<a href="update_part.php?type=3&partid=7165" class="tooltip" title="View Details"><i class="fa fa-search"></i></a></span>
									<a href="uploads/7165_1612365732.png" class="image-link tooltip" data-title="RSRL002" data-source="update_part.php?type=3&partid=7165" title="See Image"><i class="fa fa-picture-o"></i></a>								</td>
							</tr>
														<tr class="odd itemrow7166" id="item-r3">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSRL003</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> ZF</td>
								<td align="left"><span class="MOB">Make:</span> Alfa Romeo</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="33 (905, 907)"><i class="fa fa-automobile"></i></a></td>
																                                																<td align="left"><span class="MOB">Length:</span> 730mm</td>
								<td align="left"><span class="MOB">Turns:</span> 3 1/8</td>
								<td align="left"><span class="MOB">T-Rod Thread Size:</span> N/A</td>
																								<td align="left"><span class="MOB">Sensor:</span> No</td>
																																								<td align="left"><span class="MOB">Pinion Length:</span> 42mm</td>
								<td align="left"><span class="MOB">Pinion type:</span> Splined</td>
								                                																	<td align="left"><span class="MOB">Lock Stops Size:</span> </td>
									<td align="left"><span class="MOB">Lock Stops Colour:</span> </td>
																                                																																								<td align="center"><span class="action">
                                	<a href="update_part.php?type=3&partid=7166" class="tooltip" title="View Details"><i class="fa fa-search"></i></a></span>
									<a href="uploads/RSRSL003...png" class="image-link tooltip" data-title="RSRL003" data-source="update_part.php?type=3&partid=7166" title="See Image"><i class="fa fa-picture-o"></i></a>								</td>
							</tr>
														<tr class=" itemrow7167" id="item-r4">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSRL004</td>
								<td align="left"><span class="MOB">A Grade:</span> 20</td>
								<td align="left"><span class="MOB">B Grade:</span> 2</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> TRW</td>
								<td align="left"><span class="MOB">Make:</span> Alfa Romeo</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="147 (937)"><i class="fa fa-automobile"></i></a></td>
																                                																<td align="left"><span class="MOB">Length:</span> 1290mm</td>
								<td align="left"><span class="MOB">Turns:</span> 2 1/4</td>
								<td align="left"><span class="MOB">T-Rod Thread Size:</span> 14mm</td>
																								<td align="left"><span class="MOB">Sensor:</span> No</td>
																																								<td align="left"><span class="MOB">Pinion Length:</span> 48mm</td>
								<td align="left"><span class="MOB">Pinion type:</span> Splined (Course)</td>
								                                																	<td align="left"><span class="MOB">Lock Stops Size:</span> </td>
									<td align="left"><span class="MOB">Lock Stops Colour:</span> </td>
																                                																																								<td align="center"><span class="action">
                                	<a href="update_part.php?type=3&partid=7167" class="tooltip" title="View Details"><i class="fa fa-search"></i></a></span>
									<a href="uploads/7167_1617356477.png" class="image-link tooltip" data-title="RSRL004" data-source="update_part.php?type=3&partid=7167" title="See Image"><i class="fa fa-picture-o"></i></a>								</td>
							</tr>
														<tr class="odd itemrow7168" id="item-r5">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSRL005</td>
								<td align="left"><span class="MOB">A Grade:</span> 10</td>
								<td align="left"><span class="MOB">B Grade:</span> 1</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> TRW</td>
								<td align="left"><span class="MOB">Make:</span> Alfa Romeo/ Fiat/ Lancia</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="145 (930)/ 155 (167)/ Coupe (175)/ Dedra (835)"><i class="fa fa-automobile"></i></a></td>
																                                																<td align="left"><span class="MOB">Length:</span> 1150mm</td>
								<td align="left"><span class="MOB">Turns:</span> 3</td>
								<td align="left"><span class="MOB">T-Rod Thread Size:</span> 12mm</td>
																								<td align="left"><span class="MOB">Sensor:</span> No</td>
																																								<td align="left"><span class="MOB">Pinion Length:</span> 45mm</td>
								<td align="left"><span class="MOB">Pinion type:</span> Splined</td>
								                                																	<td align="left"><span class="MOB">Lock Stops Size:</span> </td>
									<td align="left"><span class="MOB">Lock Stops Colour:</span> </td>
																                                																																								<td align="center"><span class="action">
                                	<a href="update_part.php?type=3&partid=7168" class="tooltip" title="View Details"><i class="fa fa-search"></i></a></span>
									<a href="uploads/7168_1620372812.png" class="image-link tooltip" data-title="RSRL005" data-source="update_part.php?type=3&partid=7168" title="See Image"><i class="fa fa-picture-o"></i></a>								</td>
							</tr>
														<tr class=" itemrow7169" id="item-r6">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSRL006</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> TRW</td>
								<td align="left"><span class="MOB">Make:</span> Alfa Romeo</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="146 (930)/ 155 (167)/ GTV (96)/ Spider (916)"><i class="fa fa-automobile"></i></a></td>
																                                																<td align="left"><span class="MOB">Length:</span> 1110mm</td>
								<td align="left"><span class="MOB">Turns:</span> 2 1/8</td>
								<td align="left"><span class="MOB">T-Rod Thread Size:</span> 12mm</td>
																								<td align="left"><span class="MOB">Sensor:</span> No</td>
																																								<td align="left"><span class="MOB">Pinion Length:</span> 45mm</td>
								<td align="left"><span class="MOB">Pinion type:</span> Splined</td>
								                                																	<td align="left"><span class="MOB">Lock Stops Size:</span> </td>
									<td align="left"><span class="MOB">Lock Stops Colour:</span> </td>
																                                																																								<td align="center"><span class="action">
                                	<a href="update_part.php?type=3&partid=7169" class="tooltip" title="View Details"><i class="fa fa-search"></i></a></span>
									<a href="uploads/7169_1612515105.png" class="image-link tooltip" data-title="RSRL006" data-source="update_part.php?type=3&partid=7169" title="See Image"><i class="fa fa-picture-o"></i></a>								</td>
							</tr>
														<tr class="odd itemrow7170" id="item-r7">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSRL007</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> ZF</td>
								<td align="left"><span class="MOB">Make:</span> Alfa Romeo</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="75 (162B)/ 90 (162)"><i class="fa fa-automobile"></i></a></td>
																                                																<td align="left"><span class="MOB">Length:</span> 1075mm</td>
								<td align="left"><span class="MOB">Turns:</span> 3</td>
								<td align="left"><span class="MOB">T-Rod Thread Size:</span> 14mm</td>
																								<td align="left"><span class="MOB">Sensor:</span> No</td>
																																								<td align="left"><span class="MOB">Pinion Length:</span> 37mm</td>
								<td align="left"><span class="MOB">Pinion type:</span> Splined</td>
								                                																	<td align="left"><span class="MOB">Lock Stops Size:</span> No Stops</td>
									<td align="left"><span class="MOB">Lock Stops Colour:</span> No Stops</td>
																                                																																								<td align="center"><span class="action">
                                	<a href="update_part.php?type=3&partid=7170" class="tooltip" title="View Details"><i class="fa fa-search"></i></a></span>
									<a href="uploads/RSRSL007...png" class="image-link tooltip" data-title="RSRL007" data-source="update_part.php?type=3&partid=7170" title="See Image"><i class="fa fa-picture-o"></i></a>								</td>
							</tr>
														<tr class=" itemrow7171" id="item-r8">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSRL008</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> TRW</td>
								<td align="left"><span class="MOB">Make:</span> Alfa Romeo</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="155 (167)"><i class="fa fa-automobile"></i></a></td>
																                                																<td align="left"><span class="MOB">Length:</span> 1100mm</td>
								<td align="left"><span class="MOB">Turns:</span> 2 5/8</td>
								<td align="left"><span class="MOB">T-Rod Thread Size:</span> 12mm</td>
																								<td align="left"><span class="MOB">Sensor:</span> No</td>
																																								<td align="left"><span class="MOB">Pinion Length:</span> 45mm</td>
								<td align="left"><span class="MOB">Pinion type:</span> Splined</td>
								                                																	<td align="left"><span class="MOB">Lock Stops Size:</span> </td>
									<td align="left"><span class="MOB">Lock Stops Colour:</span> </td>
																                                																																								<td align="center"><span class="action">
                                	<a href="update_part.php?type=3&partid=7171" class="tooltip" title="View Details"><i class="fa fa-search"></i></a></span>
									<a href="uploads/RSRSL008...png" class="image-link tooltip" data-title="RSRL008" data-source="update_part.php?type=3&partid=7171" title="See Image"><i class="fa fa-picture-o"></i></a>								</td>
							</tr>
														<tr class="odd itemrow7172" id="item-r9">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSRL009</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> TRW</td>
								<td align="left"><span class="MOB">Make:</span> Alfa Romeo</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="145 (930)/ 146 (930)/ 155 (167)/ GTV (916)/ Spider (916)"><i class="fa fa-automobile"></i></a></td>
																                                																<td align="left"><span class="MOB">Length:</span> 1150mm</td>
								<td align="left"><span class="MOB">Turns:</span> 2 1/8</td>
								<td align="left"><span class="MOB">T-Rod Thread Size:</span> 14mm</td>
																								<td align="left"><span class="MOB">Sensor:</span> No</td>
																																								<td align="left"><span class="MOB">Pinion Length:</span> 45mm</td>
								<td align="left"><span class="MOB">Pinion type:</span> Splined</td>
								                                																	<td align="left"><span class="MOB">Lock Stops Size:</span> </td>
									<td align="left"><span class="MOB">Lock Stops Colour:</span> </td>
																                                																																								<td align="center"><span class="action">
                                	<a href="update_part.php?type=3&partid=7172" class="tooltip" title="View Details"><i class="fa fa-search"></i></a></span>
									<a href="uploads/7172_1612515809.png" class="image-link tooltip" data-title="RSRL009" data-source="update_part.php?type=3&partid=7172" title="See Image"><i class="fa fa-picture-o"></i></a>								</td>
							</tr>
														<tr class=" itemrow7173" id="item-r10">
								
								
																<td align="left" nowrap><span class="MOB">RS Reference:</span> RSRL010</td>
								<td align="left"><span class="MOB">A Grade:</span> 0</td>
								<td align="left"><span class="MOB">B Grade:</span> 0</td>
																
								<td align="left"><span class="MOB">Manufacturer:</span> TRW</td>
								<td align="left"><span class="MOB">Make:</span> Fiat</td>
								
								<td align="center" nowrap><span class="action"><a href="#" class="tooltip" title="Barchetta (183)"><i class="fa fa-automobile"></i></a></td>
																                                																<td align="left"><span class="MOB">Length:</span> 1035mm</td>
								<td align="left"><span class="MOB">Turns:</span> 2 3/8</td>
								<td align="left"><span class="MOB">T-Rod Thread Size:</span> 12mm</td>
																								<td align="left"><span class="MOB">Sensor:</span> No</td>
																																								<td align="left"><span class="MOB">Pinion Length:</span> </td>
								<td align="left"><span class="MOB">Pinion type:</span> Splined</td>
								                                																	<td align="left"><span class="MOB">Lock Stops Size:</span> </td>
									<td align="left"><span class="MOB">Lock Stops Colour:</span> </td>
																                                																																								<td align="center"><span class="action">
                                	<a href="update_part.php?type=3&partid=7173" class="tooltip" title="View Details"><i class="fa fa-search"></i></a></span>
									<a href="uploads/RSRL010...png" class="image-link tooltip" data-title="RSRL010" data-source="update_part.php?type=3&partid=7173" title="See Image"><i class="fa fa-picture-o"></i></a>								</td>
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
		<div class="R"><span class="np_control"><span class="pagination-links"><span class="pages">Page(s): </span><span class="paging"> <span class="num">1</span>  <a href="/partslist.php?mode=show&type=3&p=10&pg=2" class="num">2</a>  <a href="/partslist.php?mode=show&type=3&p=10&pg=3" class="num">3</a> </span> <a href="/partslist.php?mode=show&type=3&p=10&pg=2" title="Next" class="btn next"><i class="fa fa-angle-right" ></i></a> <a href="/partslist.php?mode=show&type=3&p=10&pg=105" title="Last" class="btn last"><i class="fa fa-angle-double-right"></i></a></span></span> <br>
			<span class="result_found">1 to 10 of 1045 Records</span></div>
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

	//Delete item
 	$(document).on('click', 'a.del', function(event){
		event.preventDefault(); // Stop form from submitting normally
		var obj = $(this);
 		var id = $(this).attr('href').replace('#del-',''); 
		var agree = confirm('Are you sure you want to delete this item?');
 		if(agree){  
			obj.text('Deleting...');
			//var url = ADMIN_ROOT+"/partslist.php?act=delete&id="+id;
			var url = "partslist.php?mode=show&type=3&act=delete&id="+id;
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

	 $("#page").change(function () {
        var ptype = 3;
        var ppage = this.value;
        //alert(ppage);
  		var url = 'partslist.php?mode=show&type='+ptype+'&p='+ppage;
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
