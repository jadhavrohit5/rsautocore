<?php
ob_start();
include('includes/rsconnect.php');
//---------------------------------
/*
//database details 
define('DB_TYPE','mysql');
define('DB_HOST','localhost');
define('DB_NAME','MNqD8JNM');
define('DB_USER','8xG4Wv4C');
define('DB_PASS','SrhqY02eGwE0hKEi');

// Create connection
//$ndbconn = mysqli_connect($servername, $username, $password, $dbname);
$ndbconn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$ndbconn) {
    die("Connection failed: " . mysqli_connect_error());
} 
*/
//------------------------------------------------------------

$type = trim($_GET['type']);	
$partid = trim($_GET['partid']);	
$i=0;
$msg = "";

//------------------------------------------------------------
function getExtension($str) 
{
	$i = strrpos($str,".");
	if (!$i) { return ""; } 
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
}

//------------------------------------------------------------
//echo "============================================flag-0<br>";
//print_r($_REQUEST);
$dateposted = date("Y-m-d H:i:s");

if(isset($_POST['pageaction']) && $_POST['pageaction'] == 'updatephoto') {
	$description = $_POST['description'];
	$currphdataa = $_POST['currphdata'];
	$name = $_FILES['b_photo']['name'];
	$size = $_FILES['b_photo']['size'];
	$photosize = $_FILES['b_photo']['size'];	

	$valid_formats = array("jpg", "png", "jpeg", "PNG", "JPG", "JPEG");
	$maxDim = 1024;
	$max_file_size = 3*1024*1024; // 1Mb

	if(strlen($name)) {
		$ext = getExtension($name);
		if(in_array($ext,$valid_formats)) {

			if($size<(3*1024*1024)) {

				$partphoto = $partid."_".time().substr(str_replace(" ", "_", $ext), 5).".".$ext;
				$target_filename = "uploads/".$partphoto;
				list($width, $height, $type, $attr) = getimagesize( $_FILES['b_photo']['tmp_name'] );
				if ( $width > $maxDim || $height > $maxDim ) {
					$fn = $_FILES['b_photo']['tmp_name'];
					$size = getimagesize( $fn );
					$ratio = $size[0]/$size[1]; // width/height
					if( $ratio > 1) {
						$width = $maxDim;
						$height = $maxDim/$ratio;
					} else {
						$width = $maxDim*$ratio;
						$height = $maxDim;
					}
				} else {
					$fn = $_FILES['b_photo']['tmp_name'];
					$size = getimagesize( $fn );
				}

				$src = imagecreatefromstring( file_get_contents( $fn ) );
				$dst = imagecreatetruecolor( $width, $height );
				imagecopyresampled( $dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );
				imagedestroy( $src );
				imagejpeg( $dst, $target_filename ); // adjust format as needed
				imagedestroy( $dst );

				if($currphdataa != ""){
					$photodata = $currphdataa.',"uploads/'.$partphoto.'"';	
				} else {
					$photodata = '"uploads/'.$partphoto.'"';	
				}

				if(file_exists("uploads/".$partphoto)){
					$addSQL = "UPDATE tbl_rsa_parts_desc SET description = '" . addslashes($description) . "', image = '" . addslashes($photodata) . "', last_updated = '" . $dateposted . "' WHERE partid = '" . addslashes($partid) . "'";
					//echo "UPDATE tbl_rsa_parts_desc SET description = '" . addslashes($description) . "', image = '" . addslashes($photodata) . "' WHERE partid = '" . addslashes($partid) . "'<br>";
					$resultst = mysqli_query($ndbconn, $addSQL); // Run the query.
					$msg = "Part photo uploaded successfully.";
				} else {
					$msg = "Error in uploading image.";
				}
			} else {
				$msg = "Image file size should be maximum 1 MB.";
			}
		} else {
			$msg = "Invalid file format. Please upload only jpg or png image.";
		}
	}
}


//------------------------------------------------------------
//echo "============================================flag-3<br>";

$purcSQL = "SELECT description,image FROM tbl_rsa_parts_desc WHERE status = '1' AND partid = '" . addslashes($partid) . "'";
$resultpp = mysqli_query($ndbconn, $purcSQL); // Run the query.
$cntrec = mysqli_num_rows($resultpp);
//echo "SELECT description,image FROM tbl_rsa_parts_desc WHERE status = '1' AND partid = '" . addslashes($partid) . "'<br>";
//echo $cntrec . "<br>";
if($cntrec > 0) {
	$rowpp = mysqli_fetch_array($resultpp);
	$partdesc = stripslashes($rowpp['description']); 
	$currphdata = stripslashes($rowpp['image']); 
	$imagepath = str_replace(array('[',']','"'),'',stripslashes($rowpp['image']));
} else {
	$partdesc = ""; 
	$imagepath = "";
	$currphdata = "";
}

if(isset($_GET['act']) && $_GET['act'] == 'delete') {
$imgpth = trim($_GET['img']);
//echo "<br>" . $imgpth . "  imgpth<br>" . $currphdata ."  currphdata<br>";
$currphdata2 = str_replace($imgpth, '', $currphdata);
$currphdata2 = str_replace('""', '', $currphdata2);
//$currphdata2 = str_replace(',,', ',', $currphdata2);
$currphdata2 = rtrim($currphdata2, ', ');
$currphdata2 = rtrim($currphdata2, ',');
$currphdata2 = ltrim($currphdata2, ', ');		//	added on 02-10-2019 
$currphdata2 = ltrim($currphdata2, ',');		//	added on 02-10-2019 
$updSQL = "UPDATE tbl_rsa_parts_desc SET image = '" . addslashes($currphdata2) . "', last_updated = '" . $dateposted . "' WHERE partid = '" . addslashes($partid) . "'";
//echo "UPDATE tbl_rsa_parts_desc SET image = '" . addslashes($currphdata2) . "' WHERE partid = '" . addslashes($partid) . "'<br>";
$resultup = mysqli_query($ndbconn, $updSQL); // Run the query.
$msg = "Part photo deleted successfully.";
$imagepath = str_replace(array('[',']','"'),'',$currphdata2);
}

//------------------------------------------------------------
//echo "============================================flag-4<br>";

$meta_title = 'Edit Image';
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
		$( '#description' ).bind( 'keyup focus mouseup blur mouseleave', function () {
			limitChars( this, 500 );
		} );
	} );
</script>
</head>
<body id="poppupBody">
	<div id="popupMain">
		<div class="pageheading">
			<h3 class="uppercase">
				<?php echo($meta_title);?>
			</h3>
		</div>
		<div class="clear">&nbsp;</div>
		<div class="row">
			<div class="GD-50">
				<div class="GD-95">
					<div class="box text_align_center">
						<div class="uppercase bold fontsize20">Part Photo</div>
<?php
//echo "============================================flag-5<br>";
if(isset($imagepath)) {  
	$img = explode(",", $imagepath);
	foreach ($img as $item) {
		if (isset($item) && $item != ''){
			//echo "uploads/".basename($item) . "<br>";
			////$imgnm = "uploads/".basename($item);
			// updated on 09-08-2022 
			$imgnm = $item;
			if (file_exists($imgnm)) {
				echo "<p><img src='".$imgnm."' alt=''/></p>";
				echo "<p class='fontsize14'><a href='edit_image.php?type=".$type."&partid=".$partid."&act=delete&img=".$imgnm."'>Delete photo</a> </p>";
			}
		}
	}
}
?>
					</div>
				</div>
			</div>
			<div class="GD-50">
				<div class="row text_align_center">
					<h3 class="redText"><?php echo($msg);?></h3>
				</div>
				<div class="box">
					<form name="frm" method="post" action="edit_image.php?type=<?php echo($type);?>&partid=<?php echo($partid);?>" class="validate disable" enctype="multipart/form-data"> 
						<h3>Upload New image</h3>
						<p>You can upload a JPG or PNG file. File size limit is 2MB. Picture size must be 700 pixels wide by 700 pixels tall, 72 dpi.</p>
						<p><input type="file" name="b_photo" class="input req" /></p>
						<p><textarea name="description" id="description" rows="4" class="input" placeholder="Description" style="width:95%; resize:none; "><?php echo($partdesc);?></textarea>
							<span class="text_align_right charsLimit">Limit: 500 characters</span>
						</p>
						<br/>
						<p>
							<input name="edit_photo" value="Upload Photo" type="submit" class="button">
						</p>
						<input type="hidden" name="pageaction" value="updatephoto">
						<input type="hidden" name="currphdata" value='<?php echo $currphdata; ?>'>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	$ndbconn->close();
	exit;
?>