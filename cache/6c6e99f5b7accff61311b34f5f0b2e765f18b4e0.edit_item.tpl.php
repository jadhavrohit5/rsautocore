<?php
/* Smarty version 3.1.30, created on 2023-02-13 21:14:19
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/edit_item.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eaa82baa6111_68635531',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d6d37ca69d28c395b089622247faae412c13bad' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/edit_item.tpl',
      1 => 1674635572,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63eaa82baa6111_68635531 (Smarty_Internal_Template $_smarty_tpl) {
?>
<script language="javascript" src="js/validatedt.js"></script>

<script language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

		if(isWhitespace(frm.searchKey.value)) {
			error += "Please enter the search key.";
		}

		if(error.length != 0) {
			alert(error);
			return false;
		} else {
			frm.pageaction.value = 'quicksearch';
			return true;
		}

	}

	function valupdForm(frm)
	{
		var error = "";

		//if(isWhitespace(frm.rsac.value)) {
		//	error += "Please enter RSAC.\n";
		//}

		if(error.length != 0) {
			alert(error);
			//document.getElementById('warning').innerHTML = error;
			return false;
		} else {
			frm.mode.value = 'updatepart';
			frm.pageaction.value = 'updatepart';
			return true;
		}

	}
//-->
</script>


<script src="js/responsiveslides.min.js"></script>
<link rel="stylesheet" href="js/responsiveslides.css">
<script>
  $(function() {
	$(".rslides").responsiveSlides({
	  auto: false,             // Boolean: Animate automatically, true or false
	  speed: 500,            // Integer: Speed of the transition, in milliseconds
	  timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
	  pager: true,           // Boolean: Show pager, true or false
	  nav: true,             // Boolean: Show navigation, true or false
	  random: false,          // Boolean: Randomize the order of the slides, true or false
	  pause: true,           // Boolean: Pause on hover, true or false
	  pauseControls: true,    // Boolean: Pause when hovering controls, true or false
	  prevText: "<",   // String: Text for the "previous" button
	  nextText: ">",       // String: Text for the "next" button
	  //maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
	  //navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
	  //manualControls: "",     // Selector: Declare custom pager navigation
	  //namespace: "rslides",   // String: Change the default namespace used
	  //before: function(){},   // Function: Before callback
	  //after: function(){}     // Function: After callback
	});
  });
</script>
<script language="JavaScript">
function del(str) 
{
	if(confirm("Are you sure you want to delete this item?"))
		location.replace(str);
}
</script>

<div class="pageheading"><a href="parts.php?mode=show&type=14" class="tooltip back_btn" title="BACK TO PARTS LIST"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Parts > Edit Part - TURBOCHARGER</h1>
	<div class="add">
		<div class="search_form">
			<form id="search_frm" name="global_search_frm" method="post" action="quick_search.php" class="tooltip" title="Search for fields, categories tables ctc" onSubmit="return valForm(this)">
				<input name="searchKey" class="input req" value="" type="text" placeholder="Global Search" maxlength="100" />
				<input name="search" class="search_btn" value="Search" type="submit" /> 
				<div class="adv_search_link"><a href="advanced_search.php?mode=show&type=14">Advanced search</a></div>
				<input type="hidden" name="type" value="14">
				<input type="hidden" name="pageaction">
			</form> 
		</div>
	</div>
</div>
<div id="adminBody">
	<div id="pageBlock">
				<div class="GD-30 R text_align_right">
			<a class="button btn_gray" href="edit_item.php?type=14&partid=13511">Next</a>
		</div>		<div class="row text_align_center">
					</div>
		<div class="box section_edit">
			<form name="frm" method="post" action="edit_item.php?type=14&partid=13486" class="validate disable" onSubmit="return valupdForm(this)"> 
				<div class="row">
					<div class="GD-50 R text_align_right">
						<a class="button btn_gray" href="javascript:void(0);" onclick="lightbox('incoming_cores.php?type=14&partid=13486&rsac=RSTC001')">Incoming Cores</a>&nbsp;<input name="icqnty" type="text" class="input" value="0" style="max-width: 90px;" disabled />&nbsp;
						<a class="button btn_gray" href="javascript:void(0);" onclick="lightbox('sales_data.php?type=14&partid=13486')">Sales Data</a>
						<input name="save" value="SAVE" class="button btn_green" type="submit">
					</div>
					
					<div class="GD-60 L">
						<table width="100%">
							<tr>
								<td align="left">RS Reference:&nbsp;</td>
								<td><input name="grprsac" type="text" class="input req alphanumeric" value="RSTC001" style="max-width:150px;" disabled /></td>
								<td width="15%" align="right">Total Stock:&nbsp;</td>
								<td width="15%"><input name="total_stock" type="text" class="input onlyNumber" value="0" maxlength="8" style="max-width: 100px;" disabled /></td>
								<td width="15%" align="right">Total Target:&nbsp;</td>
								<td width="15%"><input name="target_stock" type="text" class="input onlyNumber" value="25" maxlength="8" style="max-width: 100px;" /></td>
							</tr>
						</table>
					</div>
					<p class="clear">&nbsp;</p>
				</div>
				<div class="GD-65">
					<div class="form_table no-border">
						
						<div class="clear">&nbsp;</div>
						<div class="GD-94">
							<div class="tab-block">
								<ul class="tabs-nav">
									<li class="GD-33 active"><a href="#part-data">Part Data</a></li>
									<li class="GD-33"><a href="#oestock-data">OE STOCK</a></li>
									<li class="GD-34"><a href="#customer-data">Customer Data</a></li>
								</ul>
								<div class="tabs-container">
									<div id="part-data" class="tab-content">
										<table width="100%">
											<tr>
												<td width="150">Sell Price:</td>
												<td><input name="sell_price" type="text" class="input onlyNumber" value="90.00" maxlength="12" style="max-width: 200px;" /></td>
											</tr>
											<!-- ---------------------------- -->
																						<!-- ---------------------------- -->
																																	<tr>
												<td width="150">Type :</td>
												<td><input name="attr[1]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Purchase Price :</td>
												<td><input name="attr[4]" type="text" class="input" value="30" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Cast :</td>
												<td><input name="attr[8]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Weight :</td>
												<td><input name="attr[17]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Actuator Type :</td>
												<td><input name="attr[54]" type="text" class="input" value="Electronic" maxlength="250" /></td>
											</tr>
																																	<!-- ---------------------------- -->
											<tr>
												<td>Manufacturer:</td>
												<td><input name="manufacturer" type="text" class="input" value="IHI" maxlength="250" style="max-width: 200px;" /></td>
											</tr>
											<tr>
												<td>Make:</td>
												<td><input name="make" type="text" class="input" value="Audi, Seat, Skoda, Volkswagen" maxlength="250" /></td>
											</tr>
											<tr>
												<td>Model:</td>
												<td><textarea name="model" id="model" class="input" style="height: 70px;">A1, A3, Altea, Ibiza, Leon, Fabia, Octavia, Roomster, Yeti, Caddy, Golf, Polo, Touran</textarea></td>
											</tr>
											<tr>
												<td>Years:</td>
												<td><input name="years" type="text" class="input" value="2010 - 2015" maxlength="250" style="max-width: 200px;" /></td>
											</tr>
										</table>
									</div>
									<div id="oestock-data" class="tab-content">
										<table width="100%">
											<tr>
												<td valign="top">OE 1#</td>
												<td valign="top">OE 2#</td>
												<td valign="top">OEM 1#</td>
												<td valign="top">OEM 2#</td>
												<td valign="top">QTY</td>
												<td valign="top">Location</td>
												<td valign="top">&nbsp;</td>
											</tr>
											<!-- ---------------------------- -->
																						<tr>
												<td valign="top"><input type="hidden" name="pid[1][itemid]" id="pid[]" value="1"/><input name="pid[1][oeone]" id="oeone[]" type="text" class="input" value="03F145701E" maxlength="250" /></td>
												<td valign="top"><input name="pid[1][oetwo]" id="oetwo[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="pid[1][oemone]" id="oemone[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="pid[1][oemtwo]" id="oemtwo[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="a_grade1" type="text" class="input" value="0" style="max-width: 90px;" disabled /><input type="hidden" name="pid[1][itemqty]" id="itemqty[]" value="0">&nbsp;<input name="pid[1][qtydata]" id="qtydata[]" type="number" class="input" value="0" maxlength="8" style="max-width: 100px;" /><!--  --></td>
												<td valign="top"><input name="pid[1][location]" id="location[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><a href="JavaScript:del('edit_item.php?type=14&partid=13486&act=delete&psid=1');" class="tooltip del" title="Delete" ><i class="fa fa-trash-o"></i></a></span></td>
											</tr>
																						<tr>
												<td valign="top"><input type="hidden" name="pid[2][itemid]" id="pid[]" value="2"/><input name="pid[2][oeone]" id="oeone[]" type="text" class="input" value="03F145701F" maxlength="250" /></td>
												<td valign="top"><input name="pid[2][oetwo]" id="oetwo[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="pid[2][oemone]" id="oemone[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="pid[2][oemtwo]" id="oemtwo[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="a_grade1" type="text" class="input" value="0" style="max-width: 90px;" disabled /><input type="hidden" name="pid[2][itemqty]" id="itemqty[]" value="0">&nbsp;<input name="pid[2][qtydata]" id="qtydata[]" type="number" class="input" value="0" maxlength="8" style="max-width: 100px;" /><!--  --></td>
												<td valign="top"><input name="pid[2][location]" id="location[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><a href="JavaScript:del('edit_item.php?type=14&partid=13486&act=delete&psid=2');" class="tooltip del" title="Delete" ><i class="fa fa-trash-o"></i></a></span></td>
											</tr>
																						<tr>
												<td valign="top"><input type="hidden" name="pid[3][itemid]" id="pid[]" value="3"/><input name="pid[3][oeone]" id="oeone[]" type="text" class="input" value="03F145701G" maxlength="250" /></td>
												<td valign="top"><input name="pid[3][oetwo]" id="oetwo[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="pid[3][oemone]" id="oemone[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="pid[3][oemtwo]" id="oemtwo[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="a_grade1" type="text" class="input" value="0" style="max-width: 90px;" disabled /><input type="hidden" name="pid[3][itemqty]" id="itemqty[]" value="0">&nbsp;<input name="pid[3][qtydata]" id="qtydata[]" type="number" class="input" value="0" maxlength="8" style="max-width: 100px;" /><!--  --></td>
												<td valign="top"><input name="pid[3][location]" id="location[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><a href="JavaScript:del('edit_item.php?type=14&partid=13486&act=delete&psid=3');" class="tooltip del" title="Delete" ><i class="fa fa-trash-o"></i></a></span></td>
											</tr>
																						<tr>
												<td valign="top"><input type="hidden" name="pid[4][itemid]" id="pid[]" value="4"/><input name="pid[4][oeone]" id="oeone[]" type="text" class="input" value="03F145701L" maxlength="250" /></td>
												<td valign="top"><input name="pid[4][oetwo]" id="oetwo[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="pid[4][oemone]" id="oemone[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="pid[4][oemtwo]" id="oemtwo[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="a_grade1" type="text" class="input" value="0" style="max-width: 90px;" disabled /><input type="hidden" name="pid[4][itemqty]" id="itemqty[]" value="0">&nbsp;<input name="pid[4][qtydata]" id="qtydata[]" type="number" class="input" value="0" maxlength="8" style="max-width: 100px;" /><!--  --></td>
												<td valign="top"><input name="pid[4][location]" id="location[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><a href="JavaScript:del('edit_item.php?type=14&partid=13486&act=delete&psid=4');" class="tooltip del" title="Delete" ><i class="fa fa-trash-o"></i></a></span></td>
											</tr>
																						<tr>
												<td valign="top"><input type="hidden" name="pid[5][itemid]" id="pid[]" value="5"/><input name="pid[5][oeone]" id="oeone[]" type="text" class="input" value="03F145701M" maxlength="250" /></td>
												<td valign="top"><input name="pid[5][oetwo]" id="oetwo[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="pid[5][oemone]" id="oemone[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="pid[5][oemtwo]" id="oemtwo[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="a_grade1" type="text" class="input" value="0" style="max-width: 90px;" disabled /><input type="hidden" name="pid[5][itemqty]" id="itemqty[]" value="0">&nbsp;<input name="pid[5][qtydata]" id="qtydata[]" type="number" class="input" value="0" maxlength="8" style="max-width: 100px;" /><!--  --></td>
												<td valign="top"><input name="pid[5][location]" id="location[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><a href="JavaScript:del('edit_item.php?type=14&partid=13486&act=delete&psid=5');" class="tooltip del" title="Delete" ><i class="fa fa-trash-o"></i></a></span></td>
											</tr>
																						<tr>
												<td valign="top"><input type="hidden" name="pid[6][itemid]" id="pid[]" value="6"/><input name="pid[6][oeone]" id="oeone[]" type="text" class="input" value="03F145701S" maxlength="250" /></td>
												<td valign="top"><input name="pid[6][oetwo]" id="oetwo[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="pid[6][oemone]" id="oemone[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="pid[6][oemtwo]" id="oemtwo[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="a_grade1" type="text" class="input" value="0" style="max-width: 90px;" disabled /><input type="hidden" name="pid[6][itemqty]" id="itemqty[]" value="0">&nbsp;<input name="pid[6][qtydata]" id="qtydata[]" type="number" class="input" value="0" maxlength="8" style="max-width: 100px;" /><!--  --></td>
												<td valign="top"><input name="pid[6][location]" id="location[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><a href="JavaScript:del('edit_item.php?type=14&partid=13486&act=delete&psid=6');" class="tooltip del" title="Delete" ><i class="fa fa-trash-o"></i></a></span></td>
											</tr>
																						<tr>
												<td valign="top"><input type="hidden" name="pid[7][itemid]" id="pid[]" value="7"/><input name="pid[7][oeone]" id="oeone[]" type="text" class="input" value="03F145701T" maxlength="250" /></td>
												<td valign="top"><input name="pid[7][oetwo]" id="oetwo[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="pid[7][oemone]" id="oemone[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="pid[7][oemtwo]" id="oemtwo[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="a_grade1" type="text" class="input" value="0" style="max-width: 90px;" disabled /><input type="hidden" name="pid[7][itemqty]" id="itemqty[]" value="0">&nbsp;<input name="pid[7][qtydata]" id="qtydata[]" type="number" class="input" value="0" maxlength="8" style="max-width: 100px;" /><!--  --></td>
												<td valign="top"><input name="pid[7][location]" id="location[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><a href="JavaScript:del('edit_item.php?type=14&partid=13486&act=delete&psid=7');" class="tooltip del" title="Delete" ><i class="fa fa-trash-o"></i></a></span></td>
											</tr>
																						<!-- ---------------------------- -->
										</table>
										<div class="text_align_right"><a href="add_new_stock.php?type=14&partid=13486">Add New OE Stock</a>
										</div>
									</div>
									<div id="customer-data" class="tab-content">
										<table width="100%">
																																	<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Elstock :</td>
												<td><input name="cust[8]" type="text" class="input" value="91-0001" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Servotec :</td>
												<td><input name="cust[17]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Vege :</td>
												<td><input name="cust[38]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Dipasport :</td>
												<td><input name="cust[47]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Reikanen :</td>
												<td><input name="cust[52]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Alanko :</td>
												<td><input name="cust[61]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Remante :</td>
												<td><input name="cust[72]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Borg Warner :</td>
												<td><input name="cust[86]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">TurboTec :</td>
												<td><input name="cust[87]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">TMI :</td>
												<td><input name="cust[88]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="GD-35">
					<div class="form_table dark" style="margin-bottom: 20px;">
						<table width="100%">
							<thead>
								<tr>
									<th align="left">NOTES</th>
								</tr>
							</thead>
							<tr>
								<td class="spacer"></td>
							</tr>
							<tr>
								<td>
									<div class="PAD-3">
										<p style="color: #f00;"></p>
									</div>
									<div class="text_align_right"><a class="tooltip fa_edit_btn" title="Edit" href="javascript:void(0);" onclick="lightbox('edit_note.php?type=14&partid=13486')"><i class="fa fa-pencil-square-o" ></i></a>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<div class="box">
						<strong>PART PHOTO</strong><br>
						<div class='rslider'><ul class='rslides'><li><a href='javascript:void(0);' onclick='lightbox(&quot;view-image.php?src=uploads/13486_1669544348.jpeg&t=MTM0ODY=&quot;)'><img src='uploads/13486_1669544348.jpeg' alt=''/></a></li></ul></div>						<div class="edit-img-btn"><a class="tooltip fa_edit_btn" title="Edit" href="javascript:void(0);" onclick="lightbox('edit_image.php?type=14&partid=13486')"><i class="fa fa-pencil-square-o " ></i></a>
						</div>
					</div>
				</div>
				<div class="row">
					<input name="save" value="Save" class="button btn_green" type="submit">
					<a href="parts.php?mode=show&type=14" class="button btn_gray">Back</a>
				</div>
				<input type="hidden" name="oeoemopt" value="0">
				<input type="hidden" name="stockopt" value="1">
				<input type="hidden" name="mode" value="">
				<input type="hidden" name="pageaction" value="">
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	jQuery( document ).ready( function ( $ ) {
		var active_tab = $( ".tabs-nav .active a" ).attr( 'href' );
		$( ".tab-block .tabs-container " + active_tab ).show();
		$( ".tabs-nav a" ).click( function ( e ) {
			var $this = $( this );
			var $tabid = $( this ).attr( 'href' );
			$( ".tabs-nav li" ).removeClass( 'active' );
			$this.parent().addClass( 'active' );
			$( '.tab-content' ).stop( true, true ).hide().siblings( $this.attr( 'href' ) ).fadeIn();
			e.preventDefault();
		} );

		// Add new input text fields
		$( ".dyn_input_fields" ).on( 'click', ' a.addInput', function ( e ) {
			var field_name = $( this ).parent().data( 'id' );
			var field_htmls = '';

			for ( i = 0; i < 3; i++ ) {
				field_htmls += '<input name="' + field_name + '[]" type="text" class="input" value=""/> ';
			}

			$( field_htmls ).insertBefore( this );
			e.preventDefault();
		} );

	} );
</script>
<?php }
}
