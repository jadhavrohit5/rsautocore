<?php
ob_start();
include('includes/rsconnect.php');
//---------------------------------

$meta_title = 'Incoming Cores';

$partid = isset($_GET['partid']) ? $_GET['partid'] : "";
$type = isset($_GET['type']) ? $_GET['type'] : "";
$rsac = isset($_GET['rsac']) ? $_GET['rsac'] : "";
//---------------------------------

function pobe_format_dt($date)
{
	if(!empty($date) && $date != '0000-00-00') {
		$date = date('Y-m-d', strtotime(str_replace('-','/', $date)));
		list($year, $month, $day) = explode("-", $date);
		$new_date = date("M d", mktime(0, 0, 0, $month, $day)) . ", " . $year;
	} else {
		$new_date = "";
	}
	
	return $new_date;
}

//---------------------------------
// updated on 23-02-2022 
//$sonumSQL = "SELECT SUM(offered_stock) as sum_pqnty FROM tbl_rsa_app_offered_items_final WHERE partid = '" . addslashes($partid) . "' AND status = '1' AND is_deleted = '0' AND is_offered='1' AND is_delivered = '0' ";
$sonumSQL = "SELECT SUM(cp.offered_stock) as sum_pqnty FROM tbl_rsa_app_offered_items_final cp, tbl_rsa_app_po_data po WHERE cp.po_num = po.po_num AND cp.partid = '". addslashes($partid) ."' AND cp.status = '1' AND cp.is_deleted = '0' AND cp.is_offered='1' AND cp.is_delivered = '0' AND po.is_deleted = '0' ";
$resultsn = mysqli_query($ndbconn, $sonumSQL); // Run the query.
$rowsn = mysqli_fetch_array($resultsn);
$sumnqnty = number_format($rowsn['sum_pqnty']); 
//---------------------------------
// added on // updated on 23-02-2022 
$impcSQL = "SELECT SUM(po_quantity) as sum_qnty FROM tbl_rsa_app_onway_stock WHERE partid = '".addslashes($partid)."' AND status = '1' AND is_deleted = '0' ";
$resultimp = mysqli_query($ndbconn, $impcSQL); // Run the query.
$rowimp = mysqli_fetch_array($resultimp);
$impcqnty = number_format($rowimp['sum_qnty']); 
//---------------------------------
$toticqnty = $sumnqnty + $impcqnty; 
?>
<!doctype html>
<html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $meta_title; ?></title>
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
<body id="poppupBody">
	<div id="popupMain">
		<div class="sales_data_head">
			<ul>
				<li>RS Ref:&nbsp;<?php echo $rsac; ?></li>
				<li>Total Quantity:&nbsp;<?php echo $toticqnty; //$sumnqnty; ?></li>
			</ul>
		</div>
		<div class="pageheading">
			<h3 class="uppercase"><?php echo($meta_title);?></h3>
		</div>
		<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								<th width="55" align="left">#</th>
								<th width="200" align="left">PO Number</th>
								<th width="300" align="left">Supplier</th>
								<th width="155" align="left">Quantity</th>
								<th width="155" align="left">Price</th>
								<th align="left">Purchase Date</th>
							</tr>
						</thead>
						<tbody>
<?php
$i=1;
//$sql = "SELECT ofp.id,ofp.po_num,ofp.rsac_ref,ofp.purchase_price,ofp.offered_stock,ofp.offered_price,ofp.postdate,ofp.is_delivered,sup.contact_person as supplier,sup.country as vdrcountry FROM tbl_rsa_app_offered_items_final ofp, tbl_rsa_app_users sup WHERE ofp.userid = sup.id AND ofp.partid = '" . addslashes($partid) . "' AND ofp.status = '1' AND ofp.is_deleted = '0' AND ofp.is_offered='1' AND ofp.is_delivered = '0' ORDER by ofp.id DESC";
// updated on 23-02-2022 
$sql  = "SELECT cp.id, cp.po_num, cp.rsac_ref, cp.purchase_price, cp.offered_stock, cp.offered_price, cp.postdate, cp.is_delivered, su.contact_person as supplier, su.country as vdrcountry ";
$sql .= "FROM tbl_rsa_app_offered_items_final cp "; 
$sql .= "LEFT JOIN tbl_rsa_app_po_data po on cp.po_num = po.po_num ";
$sql .= "LEFT JOIN tbl_rsa_app_users su on cp.userid = su.id ";
$sql .= "WHERE po.is_deleted = '0' AND cp.partid = '" . addslashes($partid) . "' "; 
$sql .= "AND cp.status = '1' AND cp.is_deleted = '0' AND cp.is_offered='1' AND cp.is_delivered = '0' ";
$sql .= "ORDER by cp.id DESC";

//echo $sql." <br />=================================================<br />";
$result_set = mysqli_query($ndbconn, $sql);
while($row = mysqli_fetch_array($result_set)){

	if ($row['vdrcountry'] == "United Kingdom"){
		$vdrcur = "&pound;"; 
	} else {
		$vdrcur = "&euro;"; 
	}
?>
							<tr class="{cycle values=" odd, "} itemrow{<?php echo $i; ?>}" id="item-r<?php echo $i; ?>">
								<td align="left" class="col-1"><span class="counter"><?php echo $i++; ?></span></td>
								<td align="left"><span class="MOB">PO Number:</span> <?php echo $row['po_num']; ?></td>
								<td align="left"><span class="MOB">Supplier:</span> <?php echo $row['supplier']; ?></td>
								<td align="left"><span class="MOB">Quantity:</span> <?php echo $row['offered_stock']; ?></td>
								<td align="left"><span class="MOB">Price:</span> <?php echo $vdrcur ." ". $row['offered_price']; ?></td>
								<td align="left"><span class="MOB">Purchase Date:</span> <?php echo pobe_format_dt($row['postdate']); ?></td>
							</tr>
<?php
}
?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
<?php
if($impcqnty > 0) {
?>
		<div class="pageheading">
			<h3 class="uppercase">Imported Cores</h3>
		</div>
		<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								<th width="55" align="left">#</th>
								<th width="200" align="left">PO Number</th>
								<th width="300" align="left">Supplier</th>
								<th width="155" align="left">Quantity</th>
								<th width="155" align="left">Price</th>
								<th align="left">Purchase Date</th>
							</tr>
						</thead>
						<tbody>
<?php
$i=1;
// added on 24-03-2022 
$sqlimp  = "SELECT id, po_num, supplier, rsac_ref, po_quantity, po_price, ord_date FROM tbl_rsa_app_onway_stock WHERE partid = '" . addslashes($partid) . "' AND status = '1' AND is_deleted = '0' ORDER by id DESC ";

//echo $sql." <br />=================================================<br />";
$result_set = mysqli_query($ndbconn, $sqlimp);
while($row = mysqli_fetch_array($result_set)){
?>
							<tr class="{cycle values=" odd, "} itemrow{<?php echo $i; ?>}" id="item-r<?php echo $i; ?>">
								<td align="left" class="col-1"><span class="counter"><?php echo $i++; ?></span></td>
								<td align="left"><span class="MOB">PO Number:</span> <?php echo $row['po_num']; ?></td>
								<td align="left"><span class="MOB">Supplier:</span> <?php echo $row['supplier']; ?></td>
								<td align="left"><span class="MOB">Quantity:</span> <?php echo $row['po_quantity']; ?></td>
								<td align="left"><span class="MOB">Price:</span> &pound;<?php echo $row['po_price']; ?></td>
								<td align="left"><span class="MOB">Purchase Date:</span> <?php echo pobe_format_dt($row['ord_date']); ?></td>
							</tr>
<?php
}
?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
<?php
}
?>
	</div>
</body>
</html>
<?php
	$ndbconn->close();
	exit;
?>