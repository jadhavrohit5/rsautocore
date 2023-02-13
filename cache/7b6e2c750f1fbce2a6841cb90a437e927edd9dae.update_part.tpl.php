<?php
/* Smarty version 3.1.30, created on 2023-02-13 22:56:32
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/update_part.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eac02078c3b5_98326419',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a502de2495eb3d9c613ccb3af86ab5c81908033' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/update_part.tpl',
      1 => 1651769755,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63eac02078c3b5_98326419 (Smarty_Internal_Template $_smarty_tpl) {
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

<div class="pageheading"><a href="partslist.php?mode=show&type=9" class="tooltip back_btn" title="BACK TO PARTS LIST"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Parts > Edit Part - EGR VALVE</h1>
	<div class="add">
		<div class="search_form">
			<form id="search_frm" name="global_search_frm" method="post" action="quick_search.php" class="tooltip" title="Search for fields, categories tables ctc" onSubmit="return valForm(this)">
				<input name="searchKey" class="input req" value="" type="text" placeholder="Global Search" maxlength="100" />
				<input name="search" class="search_btn" value="Search" type="submit" /> 
				<div class="adv_search_link"><a href="advanced_search.php?mode=show&type=9">Advanced search</a></div>
				<input type="hidden" name="type" value="9">
				<input type="hidden" name="pageaction">
			</form> 
		</div>
	</div>
</div>
<div id="adminBody">
	<div id="pageBlock">
				<div class="GD-30 R text_align_right">
			<a class="button btn_gray" href="update_part.php?type=9&partid=9392">Next</a>
		</div>		<div class="row text_align_center">
					</div>
		<div class="box section_edit">
			<form name="frm" method="post" action="update_part.php?type=9&partid=9391" class="validate disable" onSubmit="return valupdForm(this)"> 
				<div class="row">
					<div class="GD-50 R text_align_right">
						
						<input name="save" value="SAVE" class="button btn_green" type="submit">
					</div>
					<div class="GD-50 L">RS Reference: <input name="rsacdata" type="text" class="input" value="RSEG001" style="max-width:250px;" disabled /><input type="hidden" name="rsac" value="RSEG001">
					</div>
					<p class="clear">&nbsp;</p>
				</div>
				<div class="GD-65">
					<div class="form_table no-border">
						<table width="100%">
														<tr>
								<td align="right">A-Grade:</td>
								<td><input name="a_grade1" type="text" class="input" value="0" style="max-width: 60px;" disabled /><input type="hidden" name="a_grade" value="0">&nbsp;<input name="agrddata" type="number" class="input" value="" maxlength="8" style="max-width: 100px;" /></td>
								<td align="right">B-Grade:</td>
								<td><input name="b_grade1" type="text" class="input" value="1" style="max-width: 60px;" disabled /><input type="hidden" name="b_grade" value="1">&nbsp;<input name="bgrddata" type="number" class="input" value="" maxlength="8" style="max-width: 100px;" /></td>
								<td align="right">Target Stock:</td>
								<td><input name="target_stock" type="text" class="input" value="0" maxlength="8" style="max-width: 100px;" disabled /></td>
							</tr>
							<tr>
								<td align="right">Location:</td>
								<td colspan="5"><input name="location" type="text" class="input" value="EGR-3" maxlength="250" style="max-width: 200px;" /></td>
							</tr>
																				</table>
						<div class="clear">&nbsp;</div>
						<div class="GD-94">
							<div class="tab-block">
								<ul class="tabs-nav">
									<li class="GD-100 active"><a href="#part-data">Part Data</a></li>
								</ul>
								<div class="tabs-container">
									<div id="part-data" class="tab-content">
										<table width="100%">
											<tr>
												<td width="150">Sell Price:</td>
												<td><input name="sell_price" type="text" class="input onlyNumber" value="16.00" maxlength="12" style="max-width: 200px;" disabled /></td>
											<!-- ---------------------------- -->
																						<tr>
												<td valign="top" style="padding-top: 12px;">OE Number:</td>
												<td valign="top"><textarea name="oe_number" id="oe_number" class="input" style="height: 70px;">216040594, 700413, 2002299, 2S6Q9D475BA, 2S6Q9D475BB, 2S6Q9D475BC, 2S6Q9D475BD, 1682736, 1479845, 1333611, 1363591, RE2S6Q9D475BD, 1618PF, 1618N8, 161846, 9673258680, 9658203780, Y42520300, SU00100702, SU00100730, SU00100884</textarea></td>
											</tr>
											<tr>
												<td valign="top" style="padding-top: 12px;">OEM Number:</td>
												<td valign="top"><textarea name="oem_number" id="oem_number" class="input" style="height: 70px;">21604059-4, 700413, 2002299, 2S6Q-9D475-BA, 2S6Q-9D475-BB, 2S6Q-9D475-BC, 2S6Q-9D475-BD, 1682736, 1479845, 1333611, 1363591, RE2S6Q-9D475-BD, 1618PF, 1618N8, 161846, 9673258680, 9658203780, Y42520300, SU001-00702, SU001-00730, SU001-00884</textarea></td>
											</tr>
																						</tr>
											<!-- ---------------------------- -->
											<!-- ---------------------------- -->
											
											<!-- ---------------------------- -->
											<!-- ---------------------------- -->
																																	<tr>
												<td width="150">Type :</td>
												<td><input name="attr[1]" type="text" class="input" value="Electric" maxlength="250" disabled /></td>
											</tr>
																																																																																								<tr>
												<td width="150">Purchase Price :</td>
												<td><input name="attr[4]" type="text" class="input" value="4" maxlength="250" disabled /></td>
											</tr>
																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																			<!-- ---------------------------- -->
											<tr>
												<td>Manufacturer:</td>
												<td><input name="manufacturer" type="text" class="input" value="Valeo" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											<tr>
												<td>Make:</td>
												<td><input name="make" type="text" class="input" value="Citroen, Ford, Mazda, Peugeot, Toyota" maxlength="250" disabled /></td>
											</tr>
											<tr>
												<td>Model:</td>
												<td><input name="" type="text" class="input" value="C1, C2, C3, C3 Pluriel, Nemo, Fiesta, Fiesta Van, Fusion, 2, 1007, 107, 206, 206 SW, 207, 207+, Bipper, Bipper Tepee, Aygo" maxlength="250" disabled /></td>
											</tr>
											<tr>
												<td>Years:</td>
												<td><input name="years" type="text" class="input" value="2001 - " maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
										</table>
									</div>
									<div id="customer-data" class="tab-content">
										<!--  -->
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
						<div class='rslider'><ul class='rslides'><li><a href='javascript:void(0);' onclick='lightbox(&quot;view-image.php?src=uploads/9391_1656356188.jpeg&t=OTM5MQ==&quot;)'><img src='uploads/9391_1656356188.jpeg' alt=''/></a></li></ul></div>						<div class="edit-img-btn"><a class="tooltip fa_edit_btn" title="Edit" href="#"><i class="fa fa-pencil-square-o " ></i></a>
						</div>
					</div>
				</div>
				<div class="row">
					<input name="save" value="Save" class="button btn_green" type="submit">
					<a href="partslist.php?mode=show&type=9" class="button btn_gray">Back</a>
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
