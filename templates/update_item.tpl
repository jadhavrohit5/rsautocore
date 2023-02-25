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
			<a class="button btn_gray" href="update_item.php?type={$ptypeid}&partid={$previd}">Prev</a>
		</div>{/if}
		{if $nextid ne ""}<div class="GD-30 R text_align_right">
			<a class="button btn_gray" href="update_item.php?type={$ptypeid}&partid={$nextid}">Next</a>
		</div>{/if}
		<div class="row text_align_center">
			{if $msg ne ""}<h3 class="redText">{$msg}</h3>{/if}
		</div>
		<div class="box section_edit">
			<form name="frm" method="post" action="update_item.php?type={$ptypeid}&partid={$partid}" class="validate disable" onSubmit="return valupdForm(this)"> 
				<div class="row">
					<div class="GD-50 R text_align_right">
						<input name="save" value="SAVE" class="button btn_green" type="submit">
					</div>
					<div class="GD-50 L">&nbsp;</div>
					<p class="clear">&nbsp;</p>
				</div>
				<div class="GD-65" id="main_table_view">
					<div class="form_table no-border">
						<table width="100%">
							<tr>
								<td align="left">RS Reference:&nbsp;</td>
								<td><input name="grprsac" type="text" class="input req alphanumeric" value="{$grprsac}" style="max-width:150px;" disabled /></td>
								<td width="15%" align="right">Total Stock:&nbsp;</td>
								<td width="15%"><input name="total_stock" type="text" class="input onlyNumber" value="{$total_stock}" maxlength="8" style="max-width: 100px;" disabled /></td>
								<td width="15%" align="right">Total Target:&nbsp;</td>
								<td width="15%"><input name="target_stock" type="text" class="input onlyNumber" value="{$target_stock}" maxlength="8" style="max-width: 100px;" disabled /></td>
							</tr>
						</table>
						<div class="clear">&nbsp;</div>
						<div class="GD-94" id="sub_main_table_view">
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
									<div id="oestock-data" class="tab-content">
										<table width="100%">
											<tr>
												<td valign="top">OE 1#</td>
												<td valign="top">OE 2#</td>
												<td valign="top">OEM 1#</td>
												<td valign="top">OEM 2#</td>
												{if $ptypeid eq 17}
													<td valign="top">Cast Number</td>
												{/if}
												<td valign="top">A Grade</td>
												<td valign="top">Location</td>
												{if $ptypeid eq 15 or $ptypeid eq 14}
													<td valign="top">B Grade</td>
													<td valign="top">B Location</td>
												{/if}
												{if $ptypeid eq 14}
													<td valign="top">C Grade</td>
													<td valign="top">C Location</td>
												{/if}
												<td valign="top">&nbsp;</td>
											</tr>
											<!-- ---------------------------- -->
											{section name=i loop=$grouppartslist}
											<tr>
												<td valign="top"><input type="hidden" name="pid[{$grouppartslist[i].cnt}][itemid]" id="pid[]" value="{$grouppartslist[i].pid}"/><input name="pid[{$grouppartslist[i].cnt}][oeone]" id="oeone[]" type="text" class="input" value="{$grouppartslist[i].itemoeone}" maxlength="250" /></td>
												<td valign="top"><input name="pid[{$grouppartslist[i].cnt}][oetwo]" id="oetwo[]" type="text" class="input" value="{$grouppartslist[i].itemoetwo}" maxlength="250" /></td>
												<td valign="top"><input name="pid[{$grouppartslist[i].cnt}][oemone]" id="oemone[]" type="text" class="input" value="{$grouppartslist[i].itemoemone}" maxlength="250" /></td>
												<td valign="top"><input name="pid[{$grouppartslist[i].cnt}][oemtwo]" id="oemtwo[]" type="text" class="input" value="{$grouppartslist[i].itemoemtwo}" maxlength="250" /></td>
												{if $ptypeid eq 17}
													<td valign="top"><input name="pid[{$grouppartslist[i].cnt}][castnumber]" id="castnumber[]" type="text" class="input" value="{$grouppartslist[i].itemcastnumber}" maxlength="250" /></td>
												{/if}
												<td valign="top"><input name="a_grade1" type="text" class="input" value="{$grouppartslist[i].itemqty}" style="max-width: 90px;" disabled /><input type="hidden" name="pid[{$grouppartslist[i].cnt}][itemqty]" id="itemqty[]" value="{$grouppartslist[i].itemqty}">&nbsp;<input name="pid[{$grouppartslist[i].cnt}][qtydata]" id="qtydata[]" type="number" class="input" value="" maxlength="8" style="max-width: 100px;" /><!--  --></td>
												<td valign="top"><input name="pid[{$grouppartslist[i].cnt}][location]" id="location[]" type="text" class="input" value="{$grouppartslist[i].itemloc}" maxlength="250" /></td>
												{*only if part= 14 or 15 i.e TURBOCHARGER or AC COMPRESSOR*}
												{if $ptypeid eq 15 or $ptypeid eq 14}
													<td valign="top">
														<input name="b_grade" type="text" class="input" value="{$grouppartslist[i].b_grade_itemqty}" style="max-width: 90px;" disabled />
														<input type="hidden" name="pid[{$grouppartslist[i].cnt}][b_grade_itemqty]" id="b_grade_itemqty[]" value="{$grouppartslist[i].b_grade_itemqty}">
														<input name="pid[{$grouppartslist[i].cnt}][b_grade_qty]" id="b_grade_qty[]" type="number" class="input" value="{$grouppartslist[i].b_grade_qty}" maxlength="8" style="max-width: 100px;" /><!--  -->
													</td>
													<td valign="top"><input name="pid[{$grouppartslist[i].cnt}][b_grade_location]" id="b_grade_location[]" type="text" class="input" value="{$grouppartslist[i].bgradeitemloc}" maxlength="250" /></td>
												{/if}
												{*only if part= 14 i.e TURBOCHARGER*}
												{if $ptypeid eq 14}
													<td valign="top">
														<input name="c_grade" type="text" class="input" value="{$grouppartslist[i].c_grade_itemqty}" style="max-width: 90px;" disabled />
														<input type="hidden" name="pid[{$grouppartslist[i].cnt}][c_grade_itemqty]" id="b_grade_itemqty[]" value="{$grouppartslist[i].c_grade_itemqty}">
														<input name="pid[{$grouppartslist[i].cnt}][c_grade_qty]" id="c_grade_qty[]" type="number" class="input" value="{$grouppartslist[i].c_grade_qty}" maxlength="8" style="max-width: 100px;" /><!--  -->
													</td>
													<td valign="top"><input name="pid[{$grouppartslist[i].cnt}][c_grade_location]" id="c_grade_location[]" type="text" class="input" value="{$grouppartslist[i].cgradeitemloc}" maxlength="250" /></td>
												{/if}
												<td valign="top">{if $adminusertype eq "delopt"}<a href="JavaScript:del('edit_item.php?type={$ptypeid}&partid={$partid}&act=delete&psid={$grouppartslist[i].pid}');" class="tooltip del" title="Delete" ><i class="fa fa-trash-o"></i></a></span>{/if}</td>
											</tr>
											{/section}
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
			if($tabid === '#oestock-data'){
				$('#main_table_view').removeClass('GD-65').addClass('GD-100');
				$('#sub_main_table_view').removeClass('GD-94').addClass('GD-100');

			} else {
				$('#main_table_view').removeClass('GD-100').addClass('GD-65');
				$('#sub_main_table_view').removeClass('GD-100').addClass('GD-94');
			}
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