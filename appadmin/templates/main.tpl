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
			<li {if $mainpage eq "manage_site"} class="active" {/if}><a href="#"><span><i class="fa fa-user"></i> Admin</span></a>
				<ul>			
					<li {if $subpage eq "users_mgmt"} class="active" {/if}><a href="users_mgmt.php?mode=show"><span><i class="fa fa-users"></i>Manage Users</span></a></li>
					<li {if $subpage eq "purchase_mgmt"} class="active" {/if}><a href="purchase_mgmt.php?mode=show"><span><i class="fa fa-address-book"></i>Manage Purchases</span></a></li>
					<li {if $subpage eq "users_activities"} class="active" {/if}><a href="users_activities.php?mode=show"><span><i class="fa fa-bar-chart"></i>Users Activities</span></a></li>
					<li {if $subpage eq "export_po"} class="active" {/if}><a href="export_po_data.php?mode=show"><span><i class="fa fa-bar-chart"></i>Export PO By Supplier</span></a></li>
					<li {if $subpage eq "onway_data_mgmt"} class="active" {/if}><a href="onway_data_mgmt.php?mode=show"><span><i class="fa fa-bar-chart"></i>Manage On-way Data</span></a></li><!-- {* *} -->
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