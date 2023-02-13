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
	<p>Search results for <strong class="redText">{$reg_num}</strong></p>
</div>
<div id="pageBlock" style="padding-top: 0;">
	<div class="search_results">
		{if $total gt 0}
		<div class="text_align_center">
			<p>There are {$total} matched parts. Please select to confirm part.</p>
		</div>
		<form name="frm" method="post" action="my_items.php">{*<!-- ?id={$schid}&carid={$carid} -->*}   
		<div class="listing">
			<ul>
				{section name=i loop=$gsreqcnt}
				<li id="item-{$gsreqcnt[i].cnt}" class="item">
					{if $gsreqcnt[i].pphoto ne ""}<div class="img"><a href="{$gsreqcnt[i].pphoto}" class="image-link" data-title="{$gsreqcnt[i].rsref}" data-source=""><img src="{$gsreqcnt[i].pphoto}" alt="" /></a></div>{else}<div class="img"><img src="images/no_photo.jpg" alt="" /></div>{/if}
					<div class="info text_align_left">
						<h4>{$gsreqcnt[i].parttype}</h4>
						<p>RS Ref:&nbsp;<strong class="RS_Ref">{$gsreqcnt[i].rsref}</strong><br>
						{* <!-- Brand:&nbsp;<strong>{$gsreqcnt[i].brandnm}</strong><br> --> *}
						Manufacturer:&nbsp;<strong>{$gsreqcnt[i].itm_manu}</strong><br>
						{if $gsreqcnt[i].parttp eq 9 or $gsreqcnt[i].parttp eq 10 or $gsreqcnt[i].parttp eq 11}
						Type:&nbsp;<strong>{$gsreqcnt[i].itm_type}</strong><br>
						{/if}
						{if $gsreqcnt[i].parttp ge 3 and $gsreqcnt[i].parttp le 8}
						Turns:&nbsp;<strong>{$gsreqcnt[i].itm_turn}</strong><br>
						{/if}
						{if $gsreqcnt[i].parttp eq 1 or $gsreqcnt[i].parttp eq 3 or $gsreqcnt[i].parttp eq 4 or $gsreqcnt[i].parttp eq 5 or $gsreqcnt[i].parttp eq 6 or $gsreqcnt[i].parttp eq 7 or $gsreqcnt[i].parttp eq 8}
						Sensor:&nbsp;<strong>{$gsreqcnt[i].sensor}</strong><br>
						{/if}
						{if $gsreqcnt[i].parttp eq 2}
						Position:&nbsp;<strong>{$gsreqcnt[i].itm_position}</strong><br>
						Disc Diameter:&nbsp;<strong>{$gsreqcnt[i].disc_diameter}</strong><br>
						Disc Width:&nbsp;<strong>{$gsreqcnt[i].disc_width}</strong><br>
						{* <!-- Leading/Trailing:&nbsp;<strong>{$gsreqcnt[i].leading_trailing}</strong><br> --> *}
						{/if}
						<div class="ntooltip"><span class="button rs_btn">OE INFO</span>
						<span class="tooltiptext"><strong>OE Numbers</strong>:&nbsp;<br>{$gsreqcnt[i].oenumbers}<br></span> 
						</div>
						</p>
						{if $gsreqcnt[i].parttp eq 10}
						<p>
						<input type="text" name="spqty[{$gsreqcnt[i].itemid}]" id="spqty-{$gsreqcnt[i].cnt}" data-id="item-{$gsreqcnt[i].cnt}" data-min="1" value="" class="input onlyNumber spqty"  inputmode="numeric" autocomplete="off"/>
						<input type="hidden" name="reqdqty[]" class="req_qty" value="{$gsreqcnt[i].req_qty}"/>
						</p>
						{/if}
						{if $gsreqcnt[i].req_qty gt 0}
						<p>Price:&nbsp;<strong>{$vdrcur}{$gsreqcnt[i].p_price}</strong></p>
						{/if}
					</div>
					<div class="ckbox">
						{if $gsreqcnt[i].req_qty gt 0}
						<p><input type="checkbox" name="pid[]" id="pid[]" data-id="item-{$gsreqcnt[i].cnt}" value="{$gsreqcnt[i].itemid}"></p>
						{else}
						<p>&nbsp;</p>
						{/if}
					</div>
				</li>
				{/section}
			</ul>
		</div>
		<div class="row">
			<div id="action_bar" class="text_align_center">
				<button type="submit" name="submit" class="button rs_btn" style="max-width: 250px;" >Select Parts</button>
				<p>&nbsp;</p>
			</div>
		</div>
		<input type="hidden" name="id" value="{$schid}">
		<input type="hidden" name="carid" value="{$carid}">
		<input type="hidden" name="regnum" value="{$reg_num}">
		<input type="hidden" name="mode" value="selectitems">
		<input type="hidden" name="pageaction" value="selectarticles">
		</form>
		{else}
		<div class="text_align_center">
			<h3>Search results for <strong class="yelloText">{$reg_num}</strong></h3>
			<p>&nbsp;</p>
			<h3 class="redText">No items found.</h3>
		</div>
		{/if}
		<div class="search_results text_align_center">
			<p><a href="home.php" class="button rs_btn new_search_btn" style="width: 100%; max-width: 250px;" > New Search</a>{if $numofcartitems gt 0}&nbsp;&nbsp;<a href="order_list.php?id={$schid}&carid={$carid}" class="button rs_btn new_search_btn" style="width: 100%; max-width: 250px;"><i class="fa fa-shopping-cart" ></i> View Cart</a>{/if}</p>
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
{literal}
<script type="text/javascript">
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
</script>
{/literal}