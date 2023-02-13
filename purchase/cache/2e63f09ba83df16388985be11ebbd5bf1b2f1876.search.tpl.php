<?php
/* Smarty version 3.1.30, created on 2023-02-13 17:36:25
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/search.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea75197d7d18_38469534',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e18c0451893e0754e09dc66ac0186eb581288d0' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/search.tpl',
      1 => 1649402665,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63ea75197d7d18_38469534 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="pageheading">
	<div class="img"><img src="catphotos/RHD_Steering_rack.jpg" alt="RHD STEERING" width="60"></div>
	<h3>RHD STEERING</h3>
	<p>Search by Reference or OE/OEM Number</p>
</div>
<div id="pageBlock" style="padding-top: 0;">
	<div class="search_by">
	<form name="search" action="search.php?type=4" method="post" class="validate disable">
		<p class="redText"></p>
		<p class="uppercase">Enter Reference or OE/OEM Number</p>
		<p>
		<input name="ref_num" type="text" class="input" placeholder="E.g. 1234"/>
		</p>
		<div>
		<button type="submit" name="submit" class="button rs_btn">SEARCH</button>
		</div>
		<input type="hidden" name="pageaction" value="partsearch">
	</form>
	</div>
</div>
<?php }
}
