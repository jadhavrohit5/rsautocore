<?php
/* Smarty version 3.1.30, created on 2023-02-13 17:36:33
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/reqmt_desc.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea7521213730_78471524',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ecd45ec6d0d8540465da98c6514c129dbc8c7293' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/reqmt_desc.tpl',
      1 => 1649470571,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63ea7521213730_78471524 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="pageheading">
	<div class="img"><img src="catphotos/RHD_Steering_rack.jpg" alt="RHD STEERING" width="60"></div>
	<h3>RHD STEERING</h3>
</div>
<div class="order">
	<div class="text_align_center">
		<h3>RSAC Ref <strong class="greenText">RSR194</strong></h3>
		<p><img src="images/thumbs-up.png" alt=""/></p>
		<p class="fontsize20">Required Quantity: 75</p>
		<p class="fontsize20">Our Purchase Price: &pound;20.00</p>
	</div>
	<div class="text_align_center">
		<form name="" action="reqmt_desc.php?type=4&schid=23193&id=8351" method="post" class="validate">
			<p class="redText"></p>
			<p>Total I will supply</p>
			<p><input name="supplyqty" type="text" class="input onlyNumber req text_align_center"  required style="max-width: 350px; font-size: 20px;" value="" /><p>
			<button type="submit" name="purchase" class="button rs_btn" style="max-width: 250px;" >Enter Purchase</button>
			</p>
			<input type="hidden" name="pageaction" value="partsupply">
			<input type="hidden" name="requirqty" value="75">
			<input type="hidden" name="partprice" value="20.00">
			<input type="hidden" name="part_rsac" value="RSR194">
		</form>
	</div>
	<div class="text_align_center row">
		<p>Search results for <strong class="yelloText">Rsr194</strong></p>
		<p><a href="search_results.php?type=4&schid=23193" class="button rs_btn new_search_btn" style="width: 100%; max-width: 250px;">Back to Search Results</a></p>
	</div>
</div>
<?php }
}
