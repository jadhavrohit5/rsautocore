<?php
/* Smarty version 3.1.30, created on 2023-02-13 21:32:15
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/edit_part.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eaac5faf5352_14260327',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48fa1700027b73302d9981485dce003a87407082' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/edit_part.tpl',
      1 => 1659401631,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63eaac5faf5352_14260327 (Smarty_Internal_Template $_smarty_tpl) {
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

		if(isWhitespace(frm.rsac.value)) {
			error += "Please enter RSAC.\n";
		}

		//if(isWhitespace(frm.make.value)) {
		//	error += "Please select Make.\n";
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

<div class="pageheading"><a href="parts.php?mode=show&type=3" class="tooltip back_btn" title="BACK TO PARTS LIST"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Parts > Edit Part - LHD POWER</h1>
	<div class="add">
		<div class="search_form">
			<form id="search_frm" name="global_search_frm" method="post" action="quick_search.php" class="tooltip" title="Search for fields, categories tables ctc" onSubmit="return valForm(this)">
				<input name="searchKey" class="input req" value="" type="text" placeholder="Global Search" maxlength="100" />
				<input name="search" class="search_btn" value="Search" type="submit" /> 
				<div class="adv_search_link"><a href="advanced_search.php?mode=show&type=3">Advanced search</a></div>
				<input type="hidden" name="type" value="3">
				<input type="hidden" name="pageaction">
			</form> 
		</div>
	</div>
</div>
<div id="adminBody">
	<div id="pageBlock">
		<div class="GD-30 L text_align_left">
			<a class="button btn_gray" href="edit_part.php?type=3&partid=7634">Prev</a>
		</div>		<div class="GD-30 R text_align_right">
			<a class="button btn_gray" href="edit_part.php?type=3&partid=7636">Next</a>
		</div>		<div class="row text_align_center">
					</div>
		<div class="box section_edit">
			<form name="frm" method="post" action="edit_part.php?type=3&partid=7635" class="validate disable" onSubmit="return valupdForm(this)"> 
				<div class="row">
					<div class="GD-50 R text_align_right">
						<a class="button btn_gray" href="javascript:void(0);" onclick="lightbox('incoming_cores.php?type=3&partid=7635&rsac=RSRL470')">Incoming Cores</a>&nbsp;<input name="icqnty" type="text" class="input" value="76" style="max-width: 90px;" disabled />&nbsp;
						<a class="button btn_gray" href="javascript:void(0);" onclick="lightbox('sales_data.php?type=3&partid=7635')">Sales Data</a>
						<input name="save" value="SAVE" class="button btn_green" type="submit">
					</div>
					<div class="GD-50 L">RS Reference: <input name="rsac" type="text" class="input req alphanumeric" value="RSRL470" style="max-width:250px;" />
					</div>
					<p class="clear">&nbsp;</p>
				</div>
				<div class="GD-65">
					<div class="form_table no-border">
						<table width="100%">
														<tr>
								<td align="right">A-Grade:</td>
								<td><input name="a_grade1" type="text" class="input" value="16" style="max-width: 90px;" disabled /><input type="hidden" name="a_grade" value="16">&nbsp;<input name="agrddata" type="number" class="input" value="" maxlength="8" style="max-width: 100px;" /></td>
								<td align="right">B-Grade:</td>
								<td><input name="b_grade1" type="text" class="input" value="8" style="max-width: 90px;" disabled /><input type="hidden" name="b_grade" value="8">&nbsp;<input name="bgrddata" type="number" class="input" value="" maxlength="8" style="max-width: 100px;" /></td>
								<td align="right">Target Stock:</td>
								<td><input name="target_stock" type="text" class="input onlyNumber" value="100" maxlength="8" style="max-width: 100px;" /></td>
							</tr>
							<tr>
								<td align="right">Location:</td>
								<td colspan="5"><input name="location" type="text" class="input" value="LH-123" maxlength="250" style="max-width: 200px;" /></td>
							</tr>
																				</table>
						<div class="clear">&nbsp;</div>
						<div class="GD-94">
							<div class="tab-block">
								<ul class="tabs-nav">
									<li class="GD-50 active"><a href="#part-data">Part Data</a></li>
									<li class="GD-50"><a href="#customer-data">Customer Data</a></li>
								</ul>
								<div class="tabs-container">
									<div id="part-data" class="tab-content">
										<table width="100%">
											<tr>
												<td width="150">Sell Price:</td>
												<td><input name="sell_price" type="text" class="input onlyNumber" value="85.00" maxlength="12" style="max-width: 200px;" /></td>
											</tr>
											<!-- ---------------------------- -->
																						<tr>
												<td valign="top" style="padding-top: 12px;">OE Number:</td>
												<td valign="top"><textarea name="oe_number" id="oe_number" class="input" style="height: 70px;">2044600600, 2044604300, 2044605300, 2044601900, 2044605900, 2044604900, 2044606300, 2044608600</textarea></td>
											</tr>
											<tr>
												<td valign="top" style="padding-top: 12px;">OEM Number:</td>
												<td valign="top"><textarea name="oem_number" id="oem_number" class="input" style="height: 70px;">204 460 06 00, 204 460 43 00, 204 460 53 00 , 204 460 19 00 , 204 460 59 00, 204 460 49 00 , 204 460 63 00, 204 460 86 00</textarea></td>
											</tr>
																						<!-- ---------------------------- -->
											<!-- ---------------------------- -->
											
											<!-- ---------------------------- -->
																																	<tr>
												<td width="150">Purchase Price :</td>
												<td><input name="attr[4]" type="text" class="input" value="40" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Cast :</td>
												<td><input name="attr[8]" type="text" class="input" value="20411011017, 204 1 101 1 017" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Length :</td>
												<td><input name="attr[9]" type="text" class="input" value="1160mm" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Turns :</td>
												<td><input name="attr[10]" type="text" class="input" value="2 3/4" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">T-Rod Thread Size :</td>
												<td><input name="attr[11]" type="text" class="input" value="14mm" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Pinion Length :</td>
												<td><input name="attr[12]" type="text" class="input" value="31mm" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Pinion Type :</td>
												<td><input name="attr[13]" type="text" class="input" value="Splined" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Weight :</td>
												<td><input name="attr[17]" type="text" class="input" value="7.14kg" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Sensor :</td>
												<td><input name="attr[20]" type="text" class="input" value="No" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Lock Stops Size :</td>
												<td><input name="attr[38]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150">Lock Stops Colour :</td>
												<td><input name="attr[39]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																	<!-- ---------------------------- -->
											<tr>
												<td>Manufacturer:</td>
												<td><input name="manufacturer" type="text" class="input" value="Thyssen Krupp" maxlength="250" style="max-width: 200px;" /></td>
											</tr>
											<tr>
												<td>Make:</td>
												<td><input name="make" type="text" class="input" value="Mercedes" maxlength="250" /></td>
											</tr>
											<tr>
												<td>Model:</td>
												<td><textarea name="model" id="model" class="input" style="height: 70px;">C-Class (W204) </textarea></td>
											</tr>
											<tr>
												<td>Years:</td>
												<td><input name="years" type="text" class="input" value="2007 - 2014" maxlength="250" style="max-width: 200px;" /></td>
											</tr>
										</table>
									</div>
									<div id="customer-data" class="tab-content">
										<table width="100%">
																																	<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Cardone :</td>
												<td><input name="cust[2]" type="text" class="input" value="26-4044, 26-4054" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">MS-Group :</td>
												<td><input name="cust[3]" type="text" class="input" value="ME226" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">CPI UK :</td>
												<td><input name="cust[4]" type="text" class="input" value="26G44179" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Dasilva :</td>
												<td><input name="cust[5]" type="text" class="input" value="DA2025" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Delco Remy :</td>
												<td><input name="cust[6]" type="text" class="input" value="DSR1748L" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Motorherz :</td>
												<td><input name="cust[7]" type="text" class="input" value="R2302" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Elstock :</td>
												<td><input name="cust[8]" type="text" class="input" value="11-0828" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">ERA :</td>
												<td><input name="cust[9]" type="text" class="input" value="SR23090" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Lauber :</td>
												<td><input name="cust[11]" type="text" class="input" value="66.9933" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Lenco :</td>
												<td><input name="cust[12]" type="text" class="input" value="SGA038L" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Lizarte :</td>
												<td><input name="cust[13]" type="text" class="input" value="01.56.1520" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Ricambi :</td>
												<td><input name="cust[15]" type="text" class="input" value="ME9047" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Sercore :</td>
												<td><input name="cust[16]" type="text" class="input" value="131050" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Servotec :</td>
												<td><input name="cust[17]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">TRW :</td>
												<td><input name="cust[20]" type="text" class="input" value="JRP964" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">URW :</td>
												<td><input name="cust[21]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">WAT :</td>
												<td><input name="cust[22]" type="text" class="input" value="MR75" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">CF  :</td>
												<td><input name="cust[23]" type="text" class="input" value="5ME040" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">AX :</td>
												<td><input name="cust[39]" type="text" class="input" value="03-00823" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Gidro :</td>
												<td><input name="cust[44]" type="text" class="input" value="2GS4448" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Cevam :</td>
												<td><input name="cust[45]" type="text" class="input" value="113090" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Blockstem :</td>
												<td><input name="cust[46]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Dipasport :</td>
												<td><input name="cust[47]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">BBB Industries :</td>
												<td><input name="cust[48]" type="text" class="input" value="313-0264" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Depa :</td>
												<td><input name="cust[49]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Facar :</td>
												<td><input name="cust[50]" type="text" class="input" value="522049" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Reikanen :</td>
												<td><input name="cust[52]" type="text" class="input" value="R1628" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">ATG :</td>
												<td><input name="cust[53]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Bosch :</td>
												<td><input name="cust[55]" type="text" class="input" value="" maxlength="250" /></td>
											</tr>
																																												<tr>
												<td width="150" valign="top" style="padding-top: 12px;">Bosch 2 :</td>
												<td><input name="cust[56]" type="text" class="input" value="" maxlength="250" /></td>
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
										<p style="color: #f00;">Label MUST start 204. This unit is without sensor DO NOT confuse with RSRL537</p>
									</div>
									<div class="text_align_right"><a class="tooltip fa_edit_btn" title="Edit" href="javascript:void(0);" onclick="lightbox('edit_note.php?type=3&partid=7635')"><i class="fa fa-pencil-square-o" ></i></a>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<div class="box">
						<strong>PART PHOTO</strong><br>
						<div class='rslider'><ul class='rslides'><li><a href='javascript:void(0);' onclick='lightbox(&quot;view-image.php?src=uploads/470L...png&t=NzYzNQ==&quot;)'><img src='uploads/470L...png' alt=''/></a></li></ul></div>						<div class="edit-img-btn"><a class="tooltip fa_edit_btn" title="Edit" href="javascript:void(0);" onclick="lightbox('edit_image.php?type=3&partid=7635')"><i class="fa fa-pencil-square-o " ></i></a>
						</div>
					</div>
				</div>
				<div class="row">
					<input name="save" value="Save" class="button btn_green" type="submit">
					<a href="parts.php?mode=show&type=3" class="button btn_gray">Back</a>
				</div>
				<input type="hidden" name="oeoemopt" value="1">
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
