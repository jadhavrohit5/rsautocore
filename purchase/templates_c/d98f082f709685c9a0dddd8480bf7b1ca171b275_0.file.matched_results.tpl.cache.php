<?php
/* Smarty version 3.1.30, created on 2023-02-13 19:19:18
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/matched_results.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea8d3647f593_30349851',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd98f082f709685c9a0dddd8480bf7b1ca171b275' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/matched_results.tpl',
      1 => 1649469084,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63ea8d3647f593_30349851 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '126312262963ea8d3645d802_68293408';
?>
<style type="text/css">
.ntooltip {
	position: relative;
	display: inline-block;
}
.ntooltip .tooltiptext {
	visibility: hidden;
	width: 150px; 
	font-size: 14px;
	background-color: #eeeeee;
	color: #000000;
	text-align: left;
	border-radius: 6px;
	padding: 10px;
	position: absolute;
	z-index: 1;
	top: 0;
	left: 105%;
	opacity: 0;
	transition: opacity 1s;
}
.ntooltip .tooltiptext::after {
	content: "";
	position: absolute;
	top: 5%;
	left: 0;
	margin-left: -10px;
	border-width: 5px;
	border-style: solid;
	border-color: transparent #555 transparent transparent;
}
.ntooltip:hover .tooltiptext {
	visibility: visible;
	opacity: 1;
}
</style>
<div class="pageheading">
	<h3>Search By Number Plate / Vehicle Registration Number</h3>
	<p>Search results for <strong class="redText"><?php echo $_smarty_tpl->tpl_vars['reg_num']->value;?>
</strong></p>
</div>
<div id="pageBlock" style="padding-top: 0;">
	<div class="search_results">
		<?php if ($_smarty_tpl->tpl_vars['total']->value > 0) {?>
		<div class="text_align_center">
			<p>There are <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 matched parts. Please select to confirm part.</p>
		</div>
		<form name="frm" method="post" action="my_items.php">   
		<div class="listing">
			<ul>
				<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['gsreqcnt']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
				<li id="item-<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
" class="item">
					<?php if ($_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pphoto'] != '') {?><div class="img"><a href="<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pphoto'];?>
" class="image-link" data-title="<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rsref'];?>
" data-source=""><img src="<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pphoto'];?>
" alt="" /></a></div><?php } else { ?><div class="img"><img src="images/no_photo.jpg" alt="" /></div><?php }?>
					<div class="info text_align_left">
						<h4><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttype'];?>
</h4>
						<p>RS Ref:&nbsp;<strong class="RS_Ref"><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rsref'];?>
</strong><br>
						
						Manufacturer:&nbsp;<strong><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['itm_manu'];?>
</strong><br>
						<?php if ($_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttp'] == 9 || $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttp'] == 10 || $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttp'] == 11) {?>
						Type:&nbsp;<strong><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['itm_type'];?>
</strong><br>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttp'] >= 3 && $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttp'] <= 8) {?>
						Turns:&nbsp;<strong><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['itm_turn'];?>
</strong><br>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttp'] == 1 || $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttp'] == 3 || $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttp'] == 4 || $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttp'] == 5 || $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttp'] == 6 || $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttp'] == 7 || $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttp'] == 8) {?>
						Sensor:&nbsp;<strong><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['sensor'];?>
</strong><br>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttp'] == 2) {?>
						Position:&nbsp;<strong><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['itm_position'];?>
</strong><br>
						Disc Diameter:&nbsp;<strong><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['disc_diameter'];?>
</strong><br>
						Disc Width:&nbsp;<strong><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['disc_width'];?>
</strong><br>
						
						<?php }?>
						<div class="ntooltip"><span class="button rs_btn">OE INFO</span>
						<span class="tooltiptext"><strong>OE Numbers</strong>:&nbsp;<br><?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['oenumbers'];?>
<br></span> 
						</div>
						</p>
						<?php if ($_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['parttp'] == 10) {?>
						<p>
						<input type="text" name="spqty[<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['itemid'];?>
]" id="spqty-<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
" data-id="item-<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
" data-min="1" value="" class="input onlyNumber spqty"  inputmode="numeric" autocomplete="off"/>
						<input type="hidden" name="reqdqty[]" class="req_qty" value="<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['req_qty'];?>
"/>
						</p>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['req_qty'] > 0) {?>
						<p>Price:&nbsp;<strong><?php echo $_smarty_tpl->tpl_vars['vdrcur']->value;
echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['p_price'];?>
</strong></p>
						<?php }?>
					</div>
					<div class="ckbox">
						<?php if ($_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['req_qty'] > 0) {?>
						<p><input type="checkbox" name="pid[]" id="pid[]" data-id="item-<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['gsreqcnt']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['itemid'];?>
"></p>
						<?php } else { ?>
						<p>&nbsp;</p>
						<?php }?>
					</div>
				</li>
				<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
			</ul>
		</div>
		<div class="row">
			<div id="action_bar" class="text_align_center">
				<button type="submit" name="submit" class="button rs_btn" style="max-width: 250px;" >Select Parts</button>
				<p>&nbsp;</p>
			</div>
		</div>
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
">
		<input type="hidden" name="carid" value="<?php echo $_smarty_tpl->tpl_vars['carid']->value;?>
">
		<input type="hidden" name="regnum" value="<?php echo $_smarty_tpl->tpl_vars['reg_num']->value;?>
">
		<input type="hidden" name="mode" value="selectitems">
		<input type="hidden" name="pageaction" value="selectarticles">
		</form>
		<?php } else { ?>
		<div class="text_align_center">
			<h3>Search results for <strong class="yelloText"><?php echo $_smarty_tpl->tpl_vars['reg_num']->value;?>
</strong></h3>
			<p>&nbsp;</p>
			<h3 class="redText">No items found.</h3>
		</div>
		<?php }?>
		<div class="search_results text_align_center">
			<p><a href="home.php" class="button rs_btn new_search_btn" style="width: 100%; max-width: 250px;" > New Search</a><?php if ($_smarty_tpl->tpl_vars['numofcartitems']->value > 0) {?>&nbsp;&nbsp;<a href="order_list.php?id=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
&carid=<?php echo $_smarty_tpl->tpl_vars['carid']->value;?>
" class="button rs_btn new_search_btn" style="width: 100%; max-width: 250px;"><i class="fa fa-shopping-cart" ></i> View Cart</a><?php }?></p>
		</div>
	</div>
</div>
<!--  -->
<div class="supplier_notice rs_dialog">
<div class="rs_dialogbox">
<h4 class="h">SUPPLIER NOTICE <span class="close">X</span></h4>
<div class="c"></div>
<p class="text_align_center"><span class="button btn_green close">OK</span></p>
</div>
<div class="overlay">&nbsp;</div>
</div>
<!--  -->

<?php echo '<script'; ?>
 type="text/javascript">
jQuery( document ).ready( function ( $ ) {

 $('.listing li.item :checkbox:checked').prop('checked',false); // uncheck all checkbox on window reload in Firefox

 $('.listing li.item').on('blur keyup focus mouseleave','.spqty',function() {
  $(this).removeClass('error');
  $(this).removeClass('no-error');
  const list_id = '#' + $( this ).data( 'id' );
  const req_qty = parseFloat( $( list_id ).find( '.req_qty' ).val() );
  const spqty = parseFloat( $(this).val() );
  const min = parseFloat( $(this).data('min') );

  if(isNaN(spqty) || spqty < min) {
   //$(this).val(min); // Force change Minimum quantity
   $(this).val(''); // Force change Minimum quantity
  }

  ////if(spqty > req_qty) {
  if(spqty > req_qty || isNaN(spqty)) {
   $(this).addClass('error');
   $(list_id).find('.ckbox :checkbox').prop('checked',false); // Uncheck checkbox
  }else{
   $(this).addClass('no-error');
  }
  //console.log( list_id );
 });

 // Show Alert on checkbox click 
 $('.listing li.item .ckbox').on('change',':checkbox',function() {
 const list_id = '#' + $( this ).data( 'id' );
 const spqty_el = $( list_id ).find( '.spqty' );
 const req_qty = parseFloat( $( list_id ).find( '.req_qty' ).val() );
 //const reqdqty = parseFloat( $( list_id ).find( '.reqdqty' ).val() );
 const spqty = parseFloat( spqty_el.val() );
 const RS_Ref = $( list_id ).find( '.RS_Ref' ).text();

  if ( spqty_el.length > 0 ) {  
   if($(this).is(':checked')){ 
    //console.log(spqty);
    if(spqty_el.length > 0 && spqty > req_qty || isNaN(spqty) || spqty <= 0) {
     $( list_id ).find( '.spqty' ).removeClass('no-error').addClass('error');
     $(this).prop('checked',false); // Uncheck checkbox

   let content = '<p>'+RS_Ref+': Quantity Required exceeded. </p>'; 
   //content += '<p>'+RS_Ref+' Required Quantity: '+reqdqty+' </p>'; 
   content += '<p>'+RS_Ref+' Required Quantity: '+req_qty+' </p>'; 
   content += '<p>Please alter quantity in highlighted box in order to continue.</p>'; 
   $('.supplier_notice .c').html(content)
   $('.supplier_notice').addClass('rs_dialog open');
    }     
  } 
 }

 });
});
<?php echo '</script'; ?>
>
<?php }
}
