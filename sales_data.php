<?php
ob_start();
include('includes/rsconnect.php');
//---------------------------------

$meta_title = 'Sales/Purchases Data';

$partid = isset($_GET['partid']) ? $_GET['partid'] : "";
$type = isset($_GET['type']) ? $_GET['type'] : "";
$ponum = isset($_GET['ponum']) ? $_GET['ponum'] : "";
$sonum = isset($_GET['sonum']) ? $_GET['sonum'] : "";

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

if(isset($_GET['mode']) && $_GET['mode']=="delete")	{
	$sno = trim($_GET['sno']);	
	$delstSQL = "DELETE FROM tbl_rsa_parts_stock2 WHERE status = '1' AND id = '" . addslashes($sno) . "' AND partid = '" . addslashes($partid) . "'";
	$resultst = mysqli_query($ndbconn, $delstSQL); // Run the query.
	$MSG = 'Record deleted successfully.';
}

//---------------------------------
?>
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
			var url = "sales_data.php?act=delete&id="+id;
			$.post( url, function( data ) {
				if(data.success == 1){
					$(document).find('#item-r'+id).fadeOut('slow', function(){ $(this).remove();}); 				
				}else{
					alert(data.errorMsg); 
					obj.text('Delete'); 
				}
			}, "json");	
 		}
 	 }); 
		
});
</script> 
</head>
<body id="poppupBody">
	<div id="popupMain">
		<div class="pageheading">
			<h3 class="uppercase"><?php echo($meta_title);?></h3>
		</div>
<?php
//---------------------------------
if(isset($_GET['ponum']) && $_GET['mode']=="show")	{
//---------------------------------
$ponumSQL = "SELECT SUM(po_quantity) as sum_pqnty, SUM(po_quantity * po_price) as sum_pprice FROM tbl_rsa_parts_stock2 WHERE is_purchase = '1' AND status = '1' AND is_deleted = '0' AND po_num = '" . addslashes($ponum) . "'";
$resultpn = mysqli_query($ndbconn, $ponumSQL); // Run the query.
$rowpn = mysqli_fetch_array($resultpn);
$sumnqnty = $rowpn['sum_pqnty']; 
$sumnprice = number_format($rowpn['sum_pprice'], 2, '.', ''); 
if($sumnqnty==0) {
$avgpn = 0.00; 
} else {
$avgpn = $sumnprice/$sumnqnty; 
}
?>
		<div class="sales_data_head">
			<ul>
				<li><a href="sales_data.php?type=<?php echo $_GET['type']; ?>&partid=<?php echo $_GET['partid']; ?>"  class="button btn_gray" title="Back"><i class="fa fa-angle-left"></i> Back</a></li>
				<li>Avg Purchase Price: &pound;<?php echo number_format(($avgpn), 2, '.', ''); ?></li>
				<li>Total Quantity Purchase:&nbsp;<?php echo $sumnqnty; ?></li>
			</ul>
		</div>
		<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								<th width="55" align="left">#</th>
								<th align="left">PO Number</th>
								<th align="left">Supplier</th>
								<th align="left">RS Ref </th>
								<th align="left">Quantity</th>
								<th align="left">Price</th>
								<th align="left">Date</th>
								<th width="100" align="center">Actions</th>
							</tr>
						</thead>
						<tbody>
<?php
$i=1;
$sql = "SELECT id,partid, po_num,so_num,supplier,customer,rsac_ref,po_quantity,po_price,ord_date,is_sale,is_purchase FROM tbl_rsa_parts_stock2 WHERE is_purchase = '1' AND status = '1' AND is_deleted = '0' AND po_num = '" . addslashes($ponum) . "' ORDER by ord_date DESC";
//echo $sql." <br />=================================================<br />";
$result_set = mysqli_query($ndbconn, $sql);
while($row = mysqli_fetch_array($result_set)){
?>
							<tr class="{cycle values=" odd, "} itemrow{<?php echo $i; ?>}" id="item-r<?php echo $i; ?>" style="background-color: #fbc8bb;">
								<td align="left" class="col-1"><span class="counter"><?php echo $i++; ?></span></td>
								<td align="left"><span class="MOB">PO Number:</span> <?php echo $row['po_num']; ?></td>
								<td align="left"><span class="MOB">Supplier:</span> <?php echo $row['supplier']; ?></td>
								<td align="left"><span class="MOB">RS Ref:</span> <?php echo $row['rsac_ref']; ?></td>
								<td align="left"><span class="MOB">Quantity:</span> <?php echo $row['po_quantity']; ?></td>
								<td align="left"><span class="MOB">Price:</span> &pound;<?php echo $row['po_price']; ?></td>
								<td align="left"><span class="MOB">Date:</span> <?php echo pobe_format_dt($row['ord_date']); ?></td>
								<td align="center"><span class="action"><!-- <a href="sales_data.php?mode=delete&ponum=<?php //echo $_GET['ponum']; ?>&type=<?php //echo $_GET['type']; ?>&partid=<?php //echo $row['partid']; ?>" title="Delete"><i class="fa fa-trash-o"></i></a> --></span></td>
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
//---------------------------------
} elseif(isset($_GET['sonum']) && $_GET['mode']=="show"){
//---------------------------------
$sonumSQL = "SELECT SUM(so_quantity) as sum_pqnty, SUM(so_quantity * so_price) as sum_pprice FROM tbl_rsa_parts_stock2 WHERE is_sale = '1' AND status = '1' AND is_deleted = '0' AND so_num = '" . addslashes($sonum) . "'";
$resultsn = mysqli_query($ndbconn, $sonumSQL); // Run the query.
$rowsn = mysqli_fetch_array($resultsn);
$sumnqnty = $rowsn['sum_pqnty']; 
$sumnprice = number_format($rowsn['sum_pprice'], 2, '.', ''); 
if($sumnqnty==0) {
$avgpn = 0.00; 
} else {
$avgpn = $sumnprice/$sumnqnty; 
}
?>
		<div class="sales_data_head">
			<ul>
				<li><a href="sales_data.php?type=<?php echo $_GET['type']; ?>&partid=<?php echo $_GET['partid']; ?>"  class="button btn_gray" title="Back"><i class="fa fa-angle-left"></i> Back</a></li>
				<li>Avg Sale Price: &pound;<?php echo number_format(($avgpn), 2, '.', ''); ?></li>
				<li>Total Quantity Sold:&nbsp;<?php echo $sumnqnty; ?></li>
			</ul>
		</div>
		<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								<th width="55" align="left" style="">#</th>
								<th align="left">PO Number</th>
								<th align="left">Supplier</th>
								<th align="left">RS Ref </th>
								<th align="left">Quantity</th>
								<th align="left">Price</th>
								<th align="left">Date</th>
								<th width="100" align="center">Actions</th>
							</tr>
						</thead>
						<tbody>
<?php
$i=1;
$sql = "SELECT id,partid, po_num,so_num,supplier,customer,rsac_ref,so_quantity,so_price,ord_date,is_sale,is_purchase FROM tbl_rsa_parts_stock2 WHERE is_sale = '1' AND status = '1' AND is_deleted = '0' AND so_num = '" . addslashes($sonum) . "' ORDER by ord_date DESC";
//echo $sql." <br />=================================================<br />";
$result_set = mysqli_query($ndbconn, $sql);
while($row = mysqli_fetch_array($result_set)){
?>
							<tr class="{cycle values=" odd, "} itemrow{<?php echo $i; ?>}" id="item-r<?php echo $i; ?>" style="background-color: #fbc8bb;">
								<td align="left" class="col-1"><span class="counter"><?php echo $i++; ?></span></td>
								<td align="left"><span class="MOB">PO Number:</span> <?php echo $row['so_num']; ?></td>
								<td align="left"><span class="MOB">Customerr:</span> <?php echo $row['customer']; ?></td>
								<td align="left"><span class="MOB">RS Ref:</span> <?php echo $row['rsac_ref']; ?></td>
								<td align="left"><span class="MOB">Quantity:</span> <?php echo $row['so_quantity']; ?></td>
								<td align="left"><span class="MOB">Price:</span> &pound;<?php echo $row['so_price']; ?></td>
								<td align="left"><span class="MOB">Date:</span> <?php echo pobe_format_dt($row['ord_date']); ?></td>
								<td align="center"><span class="action"><!-- <a href="sales_data.php?mode=delete&sonum=<?php //echo $_GET['sonum']; ?>&type=<?php //echo $_GET['type']; ?>&partid=<?php //echo $row['partid']; ?>" title="Delete"><i class="fa fa-trash-o"></i></a> --></span></td>
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
//---------------------------------
} else {
//---------------------------------
$purcSQL = "SELECT SUM(po_quantity) as sum_pqnty, SUM(po_quantity*po_price) as sum_pprice FROM tbl_rsa_parts_stock2 WHERE is_purchase = '1' AND status = '1' AND is_deleted = '0' AND partid = '" . addslashes($partid) . "'";
$resultpp = mysqli_query($ndbconn, $purcSQL); // Run the query.
$rowpp = mysqli_fetch_array($resultpp);
$sumpqnty = $rowpp['sum_pqnty']; 
$sumpprice = number_format($rowpp['sum_pprice'], 2, '.', ''); 
if($sumpqnty==0) {
$avgpp = 0.00; 
} else {
$avgpp = $sumpprice/$sumpqnty; 
}

$saleSQL = "SELECT SUM(so_quantity) as sum_sqnty, SUM(so_price*so_quantity) as sum_sprice FROM tbl_rsa_parts_stock2 WHERE is_sale = '1' AND status = '1' AND is_deleted = '0' AND partid = '" . addslashes($partid) . "'";
$resultsp = mysqli_query($ndbconn, $saleSQL); // Run the query.
$rowsp = mysqli_fetch_array($resultsp);
$sumsqnty = $rowsp['sum_sqnty']; 
$sumsprice = number_format($rowsp['sum_sprice'], 2, '.', ''); 
if($sumsqnty==0) {
$avgsp = 0.00; 
} else {
$avgsp = $sumsprice/$sumsqnty; 
}
?>
		<div class="sales_data_head">
			<ul>
				<li>Avg Purchase Price: &pound;<?php echo number_format(($avgpp), 2, '.', ''); ?></li>
				<li>Avg Sale Price: &pound;<?php echo number_format(($avgsp), 2, '.', ''); ?></li>
				<li>Total Quantity Purchase:&nbsp;<?php echo $sumpqnty; ?></li>
				<li>Total Quantity Sold:&nbsp;<?php echo $sumsqnty; ?></li>
			</ul>
		</div>
		<div id="listing_block">
			<div id="order_history">
				<div class="chart">
					<table>
						<thead>
							<tr>
								<th width="55" align="left" style="">#</th>
								<th align="left">PO Number</th>
								<th align="left">Supplier/Customer</th>
								<th align="left">RS Ref </th>
								<th align="left">Quantity</th>
								<th align="left">Price</th>
								<th align="left">Date</th>
								<th width="100" align="center">Actions</th>
							</tr>
						</thead>
						<tbody>
<?php
$i=1;
///$sql = "SELECT id,po_num,so_num,supplier,customer,rsac_ref,quantity,price,ord_date,is_sale,is_purchase FROM tbl_rsa_parts_stock WHERE status = '1' AND partid = '" . addslashes($partid) . "' ORDER by ord_date DESC";
//	id	partid	type	po_num	so_num	supplier	customer	rsac_ref	partname	po_quantity	so_quantity	po_price	so_price	ord_date	postdate	status	sp_type	is_sale	is_purchase	oldpartid
$sql = "SELECT id,po_num,so_num,supplier,customer,rsac_ref,po_quantity,so_quantity,po_price,so_price,ord_date,sp_type,is_sale,is_purchase FROM tbl_rsa_parts_stock2 WHERE status = '1' AND is_deleted = '0' AND partid = '" . addslashes($partid) . "' ORDER by ord_date DESC";
//echo $sql." <br />=================================================<br />";
$result_set = mysqli_query($ndbconn, $sql);
while($row = mysqli_fetch_array($result_set)){
	if ($row['is_sale'] == '1'){
?>
							<tr class="odd" id="item-r<?php echo $i; ?>" style="background-color: #befcc1;">
								<td align="left" class="col-1"><span class="counter"><?php echo $i++; ?></span></td>
								<td align="left"><span class="MOB">PO Number:</span>  <a href="sales_data.php?mode=show&sonum=<?php echo $row['so_num']; ?>&type=<?php echo $_GET['type']; ?>&partid=<?php echo $_GET['partid']; ?>"><?php echo $row['so_num']; ?></a></td>
								<td align="left"><span class="MOB">Customer:</span> <?php echo $row['customer']; ?></td>
								<td align="left"><span class="MOB">RS Ref:</span> <?php echo $row['rsac_ref']; ?></td>
								<td align="left"><span class="MOB">Quantity:</span> <?php echo $row['so_quantity']; ?></td>
								<td align="left"><span class="MOB">Price:</span> &pound;<?php echo $row['so_price']; ?></td>
								<td align="left"><span class="MOB">Date:</span> <?php echo pobe_format_dt($row['ord_date']); ?></td>
								<td align="center"><span class="action"><a href="sales_data.php?mode=delete&sno=<?php echo $row['id']; ?>&type=<?php echo $_GET['type']; ?>&partid=<?php echo $_GET['partid']; ?>" title="Delete"><i class="fa fa-trash-o"></i></a></span></td>
							</tr>
<?php
	} elseif ($row['is_purchase'] == '1'){
?>
							<tr class="odd" id="item-r<?php echo $i; ?>" style="background-color: #fbc8bb;">
								<td align="left" class="col-1"><span class="counter"><?php echo $i++; ?></span></td>
								<td align="left"><span class="MOB">PO Number:</span> <a href="sales_data.php?mode=show&ponum=<?php echo $row['po_num']; ?>&type=<?php echo $_GET['type']; ?>&partid=<?php echo $_GET['partid']; ?>"><?php echo $row['po_num']; ?></a></td>
								<td align="left"><span class="MOB">Supplier:</span> <?php echo $row['supplier']; ?></td>
								<td align="left"><span class="MOB">RS Ref:</span> <?php echo $row['rsac_ref']; ?></td>
								<td align="left"><span class="MOB">Quantity:</span> <?php echo $row['po_quantity']; ?></td>
								<td align="left"><span class="MOB">Price:</span> &pound;<?php echo $row['po_price']; ?></td>
								<td align="left"><span class="MOB">Date:</span> <?php echo pobe_format_dt($row['ord_date']); ?></td>
								<td align="center"><span class="action"><a href="sales_data.php?mode=delete&sno=<?php echo $row['id']; ?>&type=<?php echo $_GET['type']; ?>&partid=<?php echo $_GET['partid']; ?>" title="Delete"><i class="fa fa-trash-o"></i></a></span>								
								</td>
							</tr>
<?php
	}
}
?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
<?php
//---------------------------------
}
//---------------------------------
?>
	</div>
</body>
</html>
<?php
	$ndbconn->close();
	exit;
?>