<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{$title}</title>
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
{literal}<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
<![endif]-->{/literal}

<!--[if lt IE 8]><div style='clear: both; text-align:center; position: relative; background:#333;'><a href="//windows.microsoft.com/en-us/internet-explorer/download-ie" style="color:#fff;">You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.</a></div>
<![endif]-->

<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="js/magnific-popup/magnific-popup.css">
<!-- Magnific Popup core JS file -->
<script src="js/magnific-popup/jquery.magnific-popup.min.js"></script>
	
{literal}
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
{/literal}
</head>
<body>
<header id="header">
	<a href="#" class="sidebar-toggle close"><span>Toggle navigation</span></a>
	<div class="logo"><a href="#"><img src="images/logo.png" align="" alt="" /></a>
	</div>
	<div class="sitename"></div>
	<div id="headerRight"> <span class="c">Welcome {$usertypename}</span> <!-- <a href="#"> Manage Profile</a> --> |  <a href="logout.php" class="logout"> Logout <i class="fa fa-power-off"></i></a>
	</div>
</header>
<aside id="sidebar-left">
	<div class="sidebar-menu">
		<h3>MAIN NAVIGATION</h3>
		<ul class="menu">
			<li {if $mainpage eq "parts"} class="active" {/if}><a href="parts.php?mode=show&type={$parttypelist[0].typeid}"><span><i class="fa fa-cogs"></i> Parts</span></a>
				<ul>					
					{section name=i loop=$parttypelist}
					<li {if $parttypelist[i].typeid eq $ptype} class="active" {/if}><a href="parts.php?mode=show&type={$parttypelist[i].typeid}"><span><i class="fa fa-circle-o"></i>{$parttypelist[i].parttype}</span></a></li>
					{/section}
				</ul>
			</li>
			<li {if $mainpage eq "manage_site"} class="active" {/if}><a href="#"><span><i class="fa fa-user"></i> Admin</span></a>
				<ul>			
					<li {if $subpage eq "add_part"} class="active" {/if}><a href="add_part.php?mode=show"><span><i class="fa fa-plus-square-o"></i>Add New Part</span></a></li>
					{if $usertypename eq "Main Admin User"}
					<li {if $subpage eq "add_part_type"} class="active" {/if}><a href="add_part_type.php?mode=show"><span><i class="fa fa-plus-square-o"></i>Add New Part Category</span></a></li>
					<li {if $subpage eq "manage_part_type"} class="active" {/if}><a href="manage_part_type.php?mode=show"><span><i class="fa fa-plus-square-o"></i>Manage Part Categories</span></a></li>
					<li {if $subpage eq "manage_customers"} class="active" {/if}><a href="manage_customers.php?mode=show"><span><i class="fa fa-address-book"></i>Manage Customers</span></a></li>
					<li {if $subpage eq "manage_attributes"} class="active" {/if}><a href="manage_attributes.php?mode=show"><span><i class="fa fa-address-book"></i>Manage Attributes</span></a></li>
					<li {if $subpage eq "users_mgmt"} class="active" {/if}><a href="users_mgmt.php?mode=show"><span><i class="fa fa-users"></i>Manage Users</span></a></li>
					<li {if $subpage eq "manage_podata"} class="active" {/if}><a href="manage_podata.php?mode=show"><span><i class="fa fa-address-book"></i>Manage PO/SO</span></a></li>
					{/if}
				</ul>
			</li>
			<li {if $mainpage eq "manage_reports"} class="active" {/if}><a href="#"><span><i class="fa fa-bar-chart"></i> Reports</span></a>
				<ul>
					<li><a href="sales_data_report.php?mode=show"><span><i class="fa fa-circle-o"></i>Sales Data Reports</span></a></li>
				</ul>			
			</li>			
			<li {if $mainpage eq "manage_imports"} class="active" {/if}><a href="#"><span><i class="fa fa-cloud-download"></i> Imports</span></a>
				<ul>
					<li {if $subpage eq "import_sales_data"} class="active" {/if}><a href="import_sales_data.php?mode=show"><span><i class="fa fa-circle-o"></i>Import Sales Data</span></a></li>
					<li {if $subpage eq "import_purchase_data"} class="active" {/if}><a href="import_purchase_data.php?mode=show"><span><i class="fa fa-circle-o"></i>Import Purchases Data</span></a></li>	
					<li {if $subpage eq "import_parts_data"} class="active" {/if}><a href="import_parts_data.php?mode=show"><span><i class="fa fa-circle-o"></i>Import Parts Data</span></a></li>	
				</ul>			
			</li>
			<li {if $mainpage eq "export_partdata"} class="active" {/if}><a href="#"><span><i class="fa fa-bar-chart"></i> Export</span></a>
				<ul>
					<li><a href="export_select_type.php?mode=show"><span><i class="fa fa-circle-o"></i>Export Part Data</span></a></li>
				</ul>			
			</li>			
		</ul>
	</div>
</aside> 
<div id="main">
{$MAIN_CONTENT}<!-- MAIN CONTENT -->
</div>
<footer id="footer">   
	<p>&copy; {date('Y')} Sony AutoParts. All Rights Reserved.</p>        
</footer>
</body>
</html>