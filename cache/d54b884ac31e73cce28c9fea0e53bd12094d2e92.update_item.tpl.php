<?php
/* Smarty version 3.1.30, created on 2023-02-11 08:39:51
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/update_item.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e754571ecba3_12038488',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd5faeb45b728d8cac03bd960c549fd53ac1eca3' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/update_item.tpl',
      1 => 1676104270,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63e754571ecba3_12038488 (Smarty_Internal_Template $_smarty_tpl) {
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

		if(isWhitespace(frm.make.value)) {
			error += "Please select Make.\n";
		}

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

<div class="pageheading"><a href="partslist.php?mode=show&type=14" class="tooltip back_btn" title="BACK TO PARTS LIST"><i class="fa fa-angle-left"></i></a>
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
		<div class="GD-30 L text_align_left">
			<a class="button btn_gray" href="update_item.php?type=14&partid=54548">Prev</a>
		</div>		<div class="GD-30 R text_align_right">
			<a class="button btn_gray" href="update_item.php?type=14&partid=54550">Next</a>
		</div>		<div class="row text_align_center">
			<h3 class="redText">Part updated successfully.</h3>		</div>
		<div class="box section_edit">
			<form name="frm" method="post" action="update_item.php?type=14&partid=54549" class="validate disable" onSubmit="return valupdForm(this)"> 
				<div class="row">
					<div class="GD-50 R text_align_right">
						<input name="save" value="SAVE" class="button btn_green" type="submit">
					</div>
					<div class="GD-50 L">&nbsp;</div>
					<p class="clear">&nbsp;</p>
				</div>
				<div class="GD-65">
					<div class="form_table no-border">
						<table width="100%">
							<tr>
								<td align="left">RS Reference:&nbsp;</td>
								<td><input name="grprsac" type="text" class="input req alphanumeric" value="RSTC004" style="max-width:150px;" disabled /></td>
								<td width="15%" align="right">Total Stock:&nbsp;</td>
								<td width="15%"><input name="total_stock" type="text" class="input onlyNumber" value="0" maxlength="8" style="max-width: 100px;" disabled /></td>
								<td width="15%" align="right">Total Target:&nbsp;</td>
								<td width="15%"><input name="target_stock" type="text" class="input onlyNumber" value="0" maxlength="8" style="max-width: 100px;" disabled /></td>
							</tr>
						</table>
						<div class="clear">&nbsp;</div>
						<div class="GD-94">
							<div class="tab-block">
								<ul class="tabs-nav">
									<li class="GD-50 active"><a href="#part-data">Part Data</a></li>
									<li class="GD-50"><a href="#oestock-data">OE STOCK</a></li>
								</ul>
								<div class="tabs-container">
									<div id="part-data" class="tab-content">
										<table width="100%">
											<tr>
												<td width="150">Sell Price:</td>
												<td><input name="sell_price" type="text" class="input onlyNumber" value="0.00" maxlength="12" style="max-width: 200px;" disabled /></td>
											<!-- ---------------------------- -->
																						</tr>
											<!-- ---------------------------- -->
																																	<tr>
												<td width="150">Type :</td>
												<td><input name="attr[1]" type="text" class="input" value="" maxlength="250" disabled /></td>
											</tr>
																																												<tr>
												<td width="150">Purchase Price :</td>
												<td><input name="attr[4]" type="text" class="input" value="0" maxlength="250" disabled /></td>
											</tr>
																																												<tr>
												<td width="150">Cast :</td>
												<td><input name="attr[8]" type="text" class="input" value="" maxlength="250" disabled /></td>
											</tr>
																																												<tr>
												<td width="150">Weight :</td>
												<td><input name="attr[17]" type="text" class="input" value="" maxlength="250" disabled /></td>
											</tr>
																																												<tr>
												<td width="150">Actuator Type :</td>
												<td><input name="attr[54]" type="text" class="input" value="" maxlength="250" disabled /></td>
											</tr>
																																	<!-- ---------------------------- -->
											<tr>
												<td>Manufacturer:</td>
												<td><input name="manufacturer" type="text" class="input" value="IHI" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											<tr>
												<td>Make:</td>
												<td><input name="make" type="text" class="input" value="-" maxlength="250" disabled /></td>
											</tr>
											<tr>
												<td>Model:</td>
												<td><input name="" type="text" class="input" value="-" maxlength="250" disabled /></td>
											</tr>
											<tr>
												<td>Years:</td>
												<td><input name="years" type="text" class="input" value="-" maxlength="250" style="max-width: 200px;" disabled /></td>
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
												<td valign="top"><input type="hidden" name="pid[1][itemid]" id="pid[]" value="12"/><input name="pid[1][oeone]" id="oeone[]" type="text" class="input" value="04B253016A" maxlength="250" /></td>
												<td valign="top"><input name="pid[1][oetwo]" id="oetwo[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="pid[1][oemone]" id="oemone[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="pid[1][oemtwo]" id="oemtwo[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"><input name="a_grade1" type="text" class="input" value="0" style="max-width: 90px;" disabled /><input type="hidden" name="pid[1][itemqty]" id="itemqty[]" value="0">&nbsp;<input name="pid[1][qtydata]" id="qtydata[]" type="number" class="input" value="0" maxlength="8" style="max-width: 100px;" /><!--  --></td>
												<td valign="top"><input name="pid[1][location]" id="location[]" type="text" class="input" value="" maxlength="250" /></td>
												<td valign="top"></td>
											</tr>
																						<!-- ---------------------------- -->
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
									<div class="text_align_right"><a class="tooltip fa_edit_btn" title="Edit" href="#"><i class="fa fa-pencil-square-o" ></i></a>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<div class="box">
						<strong>PART PHOTO</strong><br>
						<div class='rslider'><ul class='rslides'></ul></div>						<div class="edit-img-btn"><a class="tooltip fa_edit_btn" title="Edit" href="#"><i class="fa fa-pencil-square-o " ></i></a>
						</div>
					</div>
				</div>
				<div class="row">
					<input name="save" value="Save" class="button btn_green" type="submit">
					<a href="partslist.php?mode=show&type=14" class="button btn_gray">Back</a>
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
