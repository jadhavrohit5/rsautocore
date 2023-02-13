<?php
/* Smarty version 3.1.30, created on 2023-02-13 19:07:46
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/view_part.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea8a82598655_86109585',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8954629f4640212b3aba4270746728907d43a0e' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/view_part.tpl',
      1 => 1674635597,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63ea8a82598655_86109585 (Smarty_Internal_Template $_smarty_tpl) {
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

<div class="pageheading"><a href="view_results.php?mode=show&type=16&schid=347855" class="tooltip back_btn" title="BACK TO PARTS LIST"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Parts > Edit Part - ALTERNATOR</h1>
	<div class="add">
		<div class="search_form">
			<form id="search_frm" name="global_search_frm" method="post" action="quick_search.php" class="tooltip" title="Search for fields, categories tables ctc" onSubmit="return valForm(this)">
				<input name="searchKey" class="input req" value="" type="text" placeholder="Global Search" maxlength="100" />
				<input name="search" class="search_btn" value="Search" type="submit" /> 
				<div class="adv_search_link"><a href="advanced_search.php?mode=show&type=16">Advanced search</a></div>
				<input type="hidden" name="type" value="16">
				<input type="hidden" name="pageaction">
			</form> 
		</div>
	</div>
</div>
<div id="adminBody">
	<div id="pageBlock">
		<div class="row text_align_center">
					</div>
		<div class="box section_edit">
			<form name="frm" method="post" action="view_part.php?type=16&partid=36412&schid=347855" class="validate disable" onSubmit="return valupdForm(this)"> 
				<div class="row">
					<div class="GD-40 R text_align_right">
						<a class="button btn_gray" href="javascript:void(0);" onclick="lightbox('incoming_cores.php?type=16&partid=36412&rsac=RSAL3792')">Incoming Cores</a>&nbsp;<input name="icqnty" type="text" class="input" value="0" style="max-width: 90px;" disabled />&nbsp;
						<a class="button btn_gray" href="javascript:void(0);" onclick="lightbox('sales_data.php?type=16&partid=36412')">Sales Data</a>
						<input name="save" value="SAVE" class="button btn_green" type="submit">
					</div>
					<div class="GD-60 L">
						<table width="100%">
							<tr>
								<td align="left">RS Reference:&nbsp;</td>
								<td><input name="grprsac" type="text" class="input req alphanumeric" value="RSAL3792" style="max-width:150px;" disabled /></td>
								<td width="15%" align="right">Total Stock:&nbsp;</td>
								<td width="15%"><input name="total_stock" type="text" class="input onlyNumber" value="2" maxlength="8" style="max-width: 100px;" disabled /></td>
								<td width="15%" align="right">Total Target:&nbsp;</td>
								<td width="15%"><input name="target_stock" type="text" class="input onlyNumber" value="50" maxlength="8" style="max-width: 100px;" /></td>
							</tr>
						</table>
					</div>
					<p class="clear">&nbsp;</p>
				</div>
				<div class="GD-65">
					<div class="form_table no-border">
						<!-- <div class="clear">&nbsp;</div> -->
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
												<td><input name="sell_price" type="text" class="input onlyNumber" value="14.00" maxlength="12" style="max-width: 200px;" /></td>
											</tr>
											<!-- ---------------------------- -->
																						<!-- ---------------------------- -->
																																	<tr>
												<td width="150">Pulley Diameter :</td>
												<td><input name="attr[2]" type="text" class="input" value="54" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Purchase Price :</td>
												<td><input name="attr[4]" type="text" class="input" value="4" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Pulley Grooves :</td>
												<td><input name="attr[14]" type="text" class="input" value="5" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Pulley Type :</td>
												<td><input name="attr[15]" type="text" class="input" value="Bolt-on" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Plug Pins :</td>
												<td><input name="attr[16]" type="text" class="input" value="2" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Weight :</td>
												<td><input name="attr[17]" type="text" class="input" value="6.2" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Amps (A) :</td>
												<td><input name="attr[25]" type="text" class="input" value="120" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Volts (V) :</td>
												<td><input name="attr[26]" type="text" class="input" value="12" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Mounting Points :</td>
												<td><input name="attr[27]" type="text" class="input" value="4" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Bosch Need :</td>
												<td><input name="attr[67]" type="text" class="input" value="Yes" maxlength="250" /></td>
											</tr>
																																	<!-- ---------------------------- -->
											<tr>
												<td>Manufacturer:</td>
												<td><input name="manufacturer" type="text" class="input" value="Bosch" maxlength="250" style="max-width: 200px;" /></td>
											</tr>
											<tr>
												<td>Make:</td>
												<td><input name="make" type="text" class="input" value="Opel, Vauxhall" maxlength="250" /></td>
											</tr>
											<tr>
												<td>Model:</td>
												<td><textarea name="model" id="model" class="input" style="height: 70px;">Astra, Astra Classic, Astra Family, Astra GTC, Astra Van, Meriva, Signum, Vectra, Zafira, Zafira Family, Zafira Van, Astra, Astra Coupe, Astra Sport Hatch, Astra Van, Meriva, Signum, Vectra, Zafira</textarea></td>
											</tr>
											<tr>
												<td>Years:</td>
												<td><input name="years" type="text" class="input" value="2000-" maxlength="250" style="max-width: 200px;" /></td>
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
												
												<td valign="top"><input type="hidden" name="pid[1][itemid]" id="pid[]" value="27516"/><input name="pid[1][oeone]" id="oeone[]" type="text" class="input" value="0124425050" maxlength="250" /></td>
												<td valign="top"><input name="pid[1][oetwo]" id="oetwo[]" type="text" class="input" value="0 124 425 050" maxlength="250" /></td>
												<td valign="top"><input name="pid[1][oemone]" id="oemone[]" type="text" class="input" value="13229985" maxlength="250" /></td>
												<td valign="top"><input name="pid[1][oemtwo]" id="oemtwo[]" type="text" class="input" value="13 229 985" maxlength="250" /></td>
												<td valign="top"><input name="a_grade1" type="text" class="input" value="2" style="max-width: 90px;" disabled /><input type="hidden" name="pid[1][itemqty]" id="itemqty[]" value="2">&nbsp;<input name="pid[1][qtydata]" id="qtydata[]" type="number" class="input" value="0" maxlength="8" style="max-width: 100px;" /></td>
												<td valign="top"><input name="pid[1][location]" id="location[]" type="text" class="input" value="D2B" maxlength="250" /></td>
												<td valign="top"><a href="JavaScript:del('edit_item.php?type=16&partid=36412&act=delete&psid=27516');" class="tooltip del" title="Delete" ><i class="fa fa-trash-o"></i></a></span></td>
											</tr>
																						<!-- ---------------------------- -->
										</table>
										<div class="text_align_right"><a href="add_new_stock_rec.php?type=16&partid=36412&schid=347855">Add New OE Stock</a>
										</div>
									</div>
									<div id="customer-data" class="tab-content">
										<table width="100%">
																																	<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Dasilva :</td>
												<td><input name="cust[5]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Delco Remy :</td>
												<td><input name="cust[6]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Elstock :</td>
												<td><input name="cust[8]" type="text" class="input" value="28-6513" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">ERA :</td>
												<td><input name="cust[9]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Lauber :</td>
												<td><input name="cust[11]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Sorea :</td>
												<td><input name="cust[35]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Cevam :</td>
												<td><input name="cust[45]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Bosch :</td>
												<td><input name="cust[55]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Bosch 2 :</td>
												<td><input name="cust[56]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Denso :</td>
												<td><input name="cust[60]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Alanko :</td>
												<td><input name="cust[61]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">HC :</td>
												<td><input name="cust[66]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Lucas :</td>
												<td><input name="cust[67]" type="text" class="input" value="LRA03401" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Hella :</td>
												<td><input name="cust[70]" type="text" class="input" value="CA1960IR" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Remante :</td>
												<td><input name="cust[72]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Eurotec :</td>
												<td><input name="cust[84]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">AS PL :</td>
												<td><input name="cust[85]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Valeo :</td>
												<td><input name="cust[91]" type="text" class="input" value="" maxlength="250" /></td>
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
									<div class="text_align_right"><a class="tooltip fa_edit_btn" title="Edit" href="javascript:void(0);" onclick="lightbox('edit_note.php?type=16&partid=36412')"><i class="fa fa-pencil-square-o" ></i></a>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<div class="box">
						<strong>PART PHOTO</strong><br>
						<div class='rslider'><ul class='rslides'><li><a href='javascript:void(0);' onclick='lightbox(&quot;view-image.php?src=uploads/16/28-6513.png&t=MzY0MTI=&quot;)'><img src='uploads/16/28-6513.png' alt=''/></a></li></ul></div>						<div class="edit-img-btn"><a class="tooltip fa_edit_btn" title="Edit" href="javascript:void(0);" onclick="lightbox('edit_image.php?type=16&partid=36412')"><i class="fa fa-pencil-square-o " ></i></a>
						</div>
					</div>
				</div>
				<div class="row">
					<input name="save" value="Save" class="button btn_green" type="submit">
					<a href="view_results.php?mode=show&type=16&schid=347855" class="button btn_gray">Back</a>
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
