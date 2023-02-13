<?php
ob_start();
include('includes/inc_user.php');
include('classes/partsdata.php');
include('queries.php');
/*--------------------------------------------------------------------------------*/
$meta_title = 'Edit Notes';

$obj_partdt=new partsdata;

/*--------------------------------------------------------------------------------*/
$partid = isset($_REQUEST['partid']) ? $_REQUEST['partid'] : "";
$ptypeid = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
$ptypenm = strtoupper(pobe_view_part_type($_REQUEST['type']));

$byuser = "admin";
$refnum = 1;
/*--------------------------------------------------------------------------------*/

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'updatenote') {
	$notes = $_POST['notes'];
	$dateposted = date("Y-m-d H:i:s");
	$obj_partdt->update_partsdata(array('notes'=>addslashes($notes), 'last_updated'=>$dateposted), array('id'=>$partid));
	$msg = "Part notes updated successfully.";
} else {
	$msg = "";
}

if(isset($_REQUEST['partid'])) {  
	$ret_val=$obj_partdt->get_partsdata_details(array('id'=>addslashes($partid)));
	$row_partdt=$obj_partdt->db->sql_fetchrowset();
	$rsac = isset($_REQUEST['rsac']) ? $_REQUEST['rsac'] : stripslashes($row_partdt[0]['rsac']);
	$notes = isset($_REQUEST['notes']) ? $_REQUEST['notes'] : stripslashes($row_partdt[0]['notes']);
}


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
<script>
 	$( function () {
		$( '#notes' ).bind( 'keyup focus mouseup blur mouseleave', function () {
			limitChars( this, 800 );
		} );
	} );
</script>
</head>
<body id="poppupBody">
	<div id="popupMain">
		<div class="pageheading">
			<h3 class="uppercase"><?php echo($meta_title);?></h3>
		</div>
		<div class="row text_align_center">
			<h3 class="redText"><?php echo($msg);?></h3>
		</div>
		<div class="clear">&nbsp;</div>
		<div class="row">
			<form name="frm" method="post" action="edit_note.php?type=<?php echo($ptypeid);?>&partid=<?php echo($partid);?>" class="validate disable" enctype="multipart/form-data"> 
				<p><textarea name="notes" id="notes" class="input" rows="9" style="width:95%; resize:none; "><?php echo($notes);?></textarea>
					<span class="text_align_right charsLimit">Limit: 800 characters</span>
				</p>
				<p>
					<input type="submit" name="save_notes" value="Submit" class="button"/>
				</p>
				<input type="hidden" name="pageaction" value="updatenote">
			</form>
		</div>
	</div>
</body>
</html>