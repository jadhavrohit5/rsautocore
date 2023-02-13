<?php 
$img_src = isset($_GET['src']) ? $_GET['src'] : ''; // Get image path from url
$img_title = isset($_GET['t']) ? $_GET['t'] : ''; // Get image title from url

$meta_title = 'Image: ' . base64_decode($img_title); 
?>
<!doctype html>
<html>
<head>
<?php include("head.php"); ?>
<script type="text/javascript">
	$(window).load(function() {
		$('.loader').hide();
	});
	jQuery(document).ready(function ($) {
		$('.item').click(function(){
			$(this).find('img').toggleClass('fullwidth');
		});
	});
</script>
<style>
#popupMain{padding:0;}
#largeview {text-align: center;}
#largeview .item {  }
#largeview .item img {
 transition: all .2s ease-in-out;
 cursor: zoom-in;
 display: block;
 margin: 0 auto;	 
}
#largeview .item img.fullwidth {
 max-width: none !important;
 width: auto;
 height: auto;
 transform: scale(1);
 cursor: zoom-out;
}
</style>
</head>
<body id="poppupBody">
	<div id="popupMain">	
		<div id="largeview">
			<?php if(file_exists($img_src)): ?>
			<p><?= $meta_title ?></p>
			<div class="item"><span class="loader"></span><img src="<?= urldecode($img_src); ?>" alt="<?= base64_decode($img_title) ?>" title="<?= base64_decode($img_title) ?>" /></div>     
			<?php else: ?>
			<div class="redMsg"><span>Sorry, there was a problem loading the image.</span></div>
			<?php endif; ?>
		</div>
	</div>
</body>
</html>