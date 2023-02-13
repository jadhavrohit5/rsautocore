<script language="javascript" src="js/validatedt.js"></script>
{literal}
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
{/literal}
<div class="pageheading"><a href="partslist.php?mode=show&type={$ptypeid}" class="tooltip back_btn" title="BACK TO PARTS LIST"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Parts > Edit Part - {$ptypenm}</h1>
	<div class="add">
		<div class="search_form">
			<form id="search_frm" name="global_search_frm" method="post" action="quick_search.php" class="tooltip" title="Search for fields, categories tables ctc" onSubmit="return valForm(this)">
				<input name="searchKey" class="input req" value="" type="text" placeholder="Global Search" maxlength="100" />
				<input name="search" class="search_btn" value="Search" type="submit" /> 
				<div class="adv_search_link"><a href="advanced_search.php?mode=show&type={$ptypeid}">Advanced search</a></div>
				<input type="hidden" name="type" value="{$ptypeid}">
				<input type="hidden" name="pageaction">
			</form> 
		</div>
	</div>
</div>
<div id="adminBody">
	<div id="pageBlock">
		{if $previd ne ""}<div class="GD-30 L text_align_left">
			<a class="button btn_gray" href="update_part.php?type={$ptypeid}&partid={$previd}">Prev</a>
		</div>{/if}
		{if $nextid ne ""}<div class="GD-30 R text_align_right">
			<a class="button btn_gray" href="update_part.php?type={$ptypeid}&partid={$nextid}">Next</a>
		</div>{/if}
		<div class="row text_align_center">
			{if $msg ne ""}<h3 class="redText">{$msg}</h3>{/if}
		</div>
		<div class="box section_edit">
			<form name="frm" method="post" action="update_part.php?type={$ptypeid}&partid={$partid}" class="validate disable" onSubmit="return valupdForm(this)"> 
				<div class="row">
					<div class="GD-50 R text_align_right">
						{*<!-- <a class="button btn_gray" href="javascript:void(0);" onclick="lightbox('sales_data.php?type={$ptypeid}&partid={$partid}')">Sales Data</a> -->*}
						<input name="save" value="SAVE" class="button btn_green" type="submit">
					</div>
					<div class="GD-50 L">RS Reference: <input name="rsacdata" type="text" class="input" value="{$rsac}" style="max-width:250px;" disabled /><input type="hidden" name="rsac" value="{$rsac}">
					</div>
					<p class="clear">&nbsp;</p>
				</div>
				<div class="GD-65">
					<div class="form_table no-border">
						<table width="100%">
							{if $stockopt eq "1"}
							<tr>
								<td align="right">A-Grade:</td>
								<td><input name="a_grade1" type="text" class="input" value="{$a_grade}" style="max-width: 60px;" disabled /><input type="hidden" name="a_grade" value="{$a_grade}">&nbsp;<input name="agrddata" type="number" class="input" value="{$agrddata}" maxlength="8" style="max-width: 100px;" /></td>
								<td align="right">B-Grade:</td>
								<td><input name="b_grade1" type="text" class="input" value="{$b_grade}" style="max-width: 60px;" disabled /><input type="hidden" name="b_grade" value="{$b_grade}">&nbsp;<input name="bgrddata" type="number" class="input" value="{$bgrddata}" maxlength="8" style="max-width: 100px;" /></td>
								<td align="right">Target Stock:</td>
								<td><input name="target_stock" type="text" class="input" value="{$target_stock}" maxlength="8" style="max-width: 100px;" disabled /></td>
							</tr>
							<tr>
								<td align="right">Location:</td>
								<td colspan="5"><input name="location" type="text" class="input" value="{$location}" maxlength="250" style="max-width: 200px;" /></td>
							</tr>
							{/if}
							{if $stockopt eq "2"}
							<!--  -->
							{/if}
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
												<td><input name="sell_price" type="text" class="input onlyNumber" value="{$sell_price}" maxlength="12" style="max-width: 200px;" disabled /></td>
											<!-- ---------------------------- -->
											{if $oeoemopt eq '1'}
											<tr>
												<td valign="top" style="padding-top: 12px;">OE Number:</td>
												<td valign="top"><textarea name="oe_number" id="oe_number" class="input" style="height: 70px;">{$oe_number}</textarea></td>
											</tr>
											<tr>
												<td valign="top" style="padding-top: 12px;">OEM Number:</td>
												<td valign="top"><textarea name="oem_number" id="oem_number" class="input" style="height: 70px;">{$oem_number}</textarea></td>
											</tr>
											{/if}
											</tr>
											<!-- ---------------------------- -->
											<!-- ---------------------------- -->
											{*<!-- 
											{if $prtype_opt eq '1'}
											<tr>
												<td>Type:</td>
												<td><input name="prtype" type="text" class="input" value="{$prtype}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $pulley_size_opt eq '1'}
											<tr>
												<td>Pulley Size:</td>
												<td><input name="pulley_size" type="text" class="input" value="{$pulley_size}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $bar_pressure_opt eq '1'}<tr>
												<td>Bar Pressure:</td>
												<td><input name="bar_pressure" type="text" class="input" value="{$bar_pressure}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $oeoemopt eq '1'}
											<tr>
												<td valign="top" style="padding-top: 12px;">OE Number:</td>
												<td><input name="oe_number" type="text" class="input" value="{$oe_number}" maxlength="250" disabled /></td>
											</tr>
											<tr>
												<td valign="top" style="padding-top: 12px;">OEM Number:</td>
												<td><input name="oem_number" type="text" class="input" value="{$oem_number}" maxlength="250" disabled /></td>
											</tr>
											{/if}
											{if $piston_mm_opt eq '1'}
											<tr>
												<td valign="top" style="padding-top: 12px;">Piston MM:</td>
												<td><input name="piston_mm" type="text" class="input" value="{$piston_mm}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $pad_gap_opt eq '1'}
											<tr>
												<td valign="top" style="padding-top: 12px;">Pad Gap:</td>
												<td><input name="pad_gap" type="text" class="input" value="{$pad_gap}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $max_stock_opt eq '1'}
											<tr>
												<td valign="top" style="padding-top: 12px;">Max Stock:</td>
												<td><input name="max_stock" type="text" class="input onlyNumber" value="{$max_stock}" maxlength="8" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $fr_opt eq '1'}
											<tr>
												<td valign="top" style="padding-top: 12px;">F/R:</td>
												<td><input name="f_r" type="text" class="input" value="{$f_r}" maxlength="2" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $cast_opt eq '1'}
											<tr>
												<td valign="top" style="padding-top: 12px;">Cast:</td>
												<td><input name="cast" type="text" class="input" value="{$cast}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $purchase_price_opt eq '1'}
											<tr>
												<td>Purchase Price :</td>
												<td><input name="purchase_price" type="text" class="input" value="{$purchase_price}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $length_opt eq '1'}
											<tr>
												<td>Length :</td>
												<td><input name="length" type="text" class="input" value="{$length}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $turns_opt eq '1'}
											<tr>
												<td>Turns :</td>
												<td><input name="turns" type="text" class="input" value="{$turns}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $trod_threadsize_opt eq '1'}
											<tr>
												<td>T-Rod Thread Size :</td>
												<td><input name="trod_threadsize" type="text" class="input" value="{$trod_threadsize}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $pinion_length_opt eq '1'}
											<tr>
												<td>Pinion Length :</td>
												<td><input name="pinion_length" type="text" class="input" value="{$pinion_length}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $pinion_type_opt eq '1'}
											<tr>
												<td>Pinion Type :</td>
												<td><input name="pinion_type" type="text" class="input" value="{$pinion_type}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $pulley_grooves_opt eq '1'}
											<tr>
												<td>Pulley Grooves :</td>
												<td><input name="pulley_grooves" type="text" class="input" value="{$pulley_grooves}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $pulley_type_opt eq '1'}
											<tr>
												<td>Pulley Type :</td>
												<td><input name="pulley_type" type="text" class="input" value="{$pulley_type}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $plug_pins_opt eq '1'}
											<tr>
												<td>Plug Pins :</td>
												<td><input name="plug_pins" type="text" class="input" value="{$plug_pins}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $weight_opt eq '1'}
											<tr>
												<td>Weight :</td>
												<td><input name="weight" type="text" class="input" value="{$weight}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $bolt_diameter_opt eq '1'}
											<tr>
												<td>Bolt Diameter :</td>
												<td><input name="bolt_diameter" type="text" class="input" value="{$bolt_diameter}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $pinhole_diameter_opt eq '1'}
											<tr>
												<td>Pin Hole Diameter :</td>
												<td><input name="pinhole_diameter" type="text" class="input" value="{$pinhole_diameter}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if}
											{if $sensor_opt eq '1'}
											<tr>
												<td>Sensor :</td>
												<td><input name="sensor" type="text" class="input" value="{$sensor}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											{/if} -->*}
											<!-- ---------------------------- -->
											<!-- ---------------------------- -->
											{section name=i loop=$attributelist}
											{if $attributelist[i].chk eq '1'}
											<tr>
												<td width="150">{$attributelist[i].attributename} :</td>
												<td><input name="attr[{$attributelist[i].attrid}]" type="text" class="input" value="{$attributelist[i].attrdata}" maxlength="250" disabled /></td>
											</tr>
											{/if}
											{/section}
											<!-- ---------------------------- -->
											<tr>
												<td>Manufacturer:</td>
												<td><input name="manufacturer" type="text" class="input" value="{$manufacturer}" maxlength="250" style="max-width: 200px;" disabled /></td>
											</tr>
											<tr>
												<td>Make:</td>
												<td><input name="make" type="text" class="input" value="{$make}" maxlength="250" disabled /></td>
											</tr>
											<tr>
												<td>Model:</td>
												<td><input name="" type="text" class="input" value="{$model}" maxlength="250" disabled /></td>
											</tr>
											<tr>
												<td>Years:</td>
												<td><input name="years" type="text" class="input" value="{$years}" maxlength="250" style="max-width: 200px;" disabled /></td>
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
										<p style="color: #f00;">{$notes}</p>
									</div>
									<div class="text_align_right"><a class="tooltip fa_edit_btn" title="Edit" href="#"><i class="fa fa-pencil-square-o" ></i></a>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<div class="box">
						<strong>PART PHOTO</strong><br>
						{if $displayphoto ne ""}{$displayphoto}{else}No photo available{/if}
						<div class="edit-img-btn"><a class="tooltip fa_edit_btn" title="Edit" href="#"><i class="fa fa-pencil-square-o " ></i></a>
						</div>
					</div>
				</div>
				<div class="row">
					<input name="save" value="Save" class="button btn_green" type="submit">
					<a href="partslist.php?mode=show&type={$ptypeid}" class="button btn_gray">Back</a>
				</div>
				<input type="hidden" name="oeoemopt" value="{$oeoemopt}">
				<input type="hidden" name="stockopt" value="{$stockopt}">
				<input type="hidden" name="mode" value="">
				<input type="hidden" name="pageaction" value="">
			</form>
		</div>
	</div>
</div>
{literal}
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
{/literal}