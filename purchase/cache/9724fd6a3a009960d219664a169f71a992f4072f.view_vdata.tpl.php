<?php
/* Smarty version 3.1.30, created on 2023-02-13 19:19:08
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/view_vdata.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea8d2c623915_25234133',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3512c61b691d993a32dfd61a8032e9bc6555d288' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/view_vdata.tpl',
      1 => 1649442305,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63ea8d2c623915_25234133 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="pageheading">
	<h3>Search By Number Plate / Vehicle Registration Number</h3>
</div>
<div id="pageBlock" style="padding-top: 0;">
	<div class="search_results text_align_left" style="margin-left: auto;">
		<div class="fontsize20" style="padding: 20px;">
			<p><em>Reg. Number:</em> <strong>HN59GDK</strong></p>
			<em>Manufacturer:</em> CITROËN<br>
			<em>Model:</em> C4 PICASSO I MPV (UD_)<br>
			<em>Year:</em> 02/2007 - 08/2013<br>
			<em>Type:</em> MPV<br>
			<em>Engine:</em> 1560<br>
			<em>Fuel:</em> Diesel</p>
		</div>
		<div class="search_results text_align_center">
			<form name="srhFrm" method="post" action="search_matchdata.php">
				<p><button type="submit" name="submit" class="button rs_btn" style="max-width: 250px;" >Continue</button></p>
				<input type="hidden" name="schid" value="1693">
				<input type="hidden" name="carid" value="19749">
				<input type="hidden" name="regnum" value="HN59GDK">
				<input type="hidden" name="pageaction" value="getarticles">
			</form>
		</div>
	</div>
</div><?php }
}
