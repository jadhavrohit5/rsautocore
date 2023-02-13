<?php
/* Smarty version 3.1.30, created on 2023-02-13 19:07:46
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/view_part.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea8a82590b85_43449325',
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
  'includes' => 
  array (
  ),
),false)) {
function content_63ea8a82590b85_43449325 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '188250551663ea8a8256b953_48564073';
echo '<script'; ?>
 language="javascript" src="js/validatedt.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 language="javascript">
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
<?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 src="js/responsiveslides.min.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="js/responsiveslides.css">
<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="JavaScript">
function del(str) 
{
	if(confirm("Are you sure you want to delete this item?"))
		location.replace(str);
}
<?php echo '</script'; ?>
>

<div class="pageheading"><a href="view_results.php?mode=show&type=<?php echo $_smarty_tpl->tpl_vars['ptypeid']->value;?>
&schid=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
" class="tooltip back_btn" title="BACK TO PARTS LIST"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Parts > Edit Part - <?php echo $_smarty_tpl->tpl_vars['ptypenm']->value;?>
</h1>
	<div class="add">
		<div class="search_form">
			<form id="search_frm" name="global_search_frm" method="post" action="quick_search.php" class="tooltip" title="Search for fields, categories tables ctc" onSubmit="return valForm(this)">
				<input name="searchKey" class="input req" value="" type="text" placeholder="Global Search" maxlength="100" />
				<input name="search" class="search_btn" value="Search" type="submit" /> 
				<div class="adv_search_link"><a href="advanced_search.php?mode=show&type=<?php echo $_smarty_tpl->tpl_vars['ptypeid']->value;?>
">Advanced search</a></div>
				<input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['ptypeid']->value;?>
">
				<input type="hidden" name="pageaction">
			</form> 
		</div>
	</div>
</div>
<div id="adminBody">
	<div id="pageBlock">
		<div class="row text_align_center">
			<?php if ($_smarty_tpl->tpl_vars['msg']->value != '') {?><h3 class="redText"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h3><?php }?>
		</div>
		<div class="box section_edit">
			<form name="frm" method="post" action="view_part.php?type=<?php echo $_smarty_tpl->tpl_vars['ptypeid']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['partid']->value;?>
&schid=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
" class="validate disable" onSubmit="return valupdForm(this)"> 
				<div class="row">
					<div class="GD-40 R text_align_right">
						<a class="button btn_gray" href="javascript:void(0);" onclick="lightbox('incoming_cores.php?type=<?php echo $_smarty_tpl->tpl_vars['ptypeid']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['partid']->value;?>
&rsac=<?php echo $_smarty_tpl->tpl_vars['grprsac']->value;?>
')">Incoming Cores</a>&nbsp;<input name="icqnty" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['icqnty']->value;?>
" style="max-width: 90px;" disabled />&nbsp;
						<a class="button btn_gray" href="javascript:void(0);" onclick="lightbox('sales_data.php?type=<?php echo $_smarty_tpl->tpl_vars['ptypeid']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['partid']->value;?>
')">Sales Data</a>
						<input name="save" value="SAVE" class="button btn_green" type="submit">
					</div>
					<div class="GD-60 L">
						<table width="100%">
							<tr>
								<td align="left">RS Reference:&nbsp;</td>
								<td><input name="grprsac" type="text" class="input req alphanumeric" value="<?php echo $_smarty_tpl->tpl_vars['grprsac']->value;?>
" style="max-width:150px;" disabled /></td>
								<td width="15%" align="right">Total Stock:&nbsp;</td>
								<td width="15%"><input name="total_stock" type="text" class="input onlyNumber" value="<?php echo $_smarty_tpl->tpl_vars['total_stock']->value;?>
" maxlength="8" style="max-width: 100px;" disabled /></td>
								<td width="15%" align="right">Total Target:&nbsp;</td>
								<td width="15%"><input name="target_stock" type="text" class="input onlyNumber" value="<?php echo $_smarty_tpl->tpl_vars['target_stock']->value;?>
" maxlength="8" style="max-width: 100px;" /></td>
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
												<td><input name="sell_price" type="text" class="input onlyNumber" value="<?php echo $_smarty_tpl->tpl_vars['sell_price']->value;?>
" maxlength="12" style="max-width: 200px;" /></td>
											</tr>
											<!-- ---------------------------- -->
											<?php if ($_smarty_tpl->tpl_vars['oeoemopt']->value == '1') {?>
											<tr>
												<td valign="top" style="padding-top: 12px;">OE Number:</td>
												<td valign="top"><textarea name="oe_number" id="oe_number" class="input" style="height: 70px;"><?php echo $_smarty_tpl->tpl_vars['oe_number']->value;?>
</textarea></td>
											</tr>
											<tr>
												<td valign="top" style="padding-top: 12px;">OEM Number:</td>
												<td valign="top"><textarea name="oem_number" id="oem_number" class="input" style="height: 70px;"><?php echo $_smarty_tpl->tpl_vars['oem_number']->value;?>
</textarea></td>
											</tr>
											<?php }?>
											<!-- ---------------------------- -->
											<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['attributelist']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
											<?php if ($_smarty_tpl->tpl_vars['attributelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['chk'] == '1') {?>
											<tr>
												<td width="150"><?php echo $_smarty_tpl->tpl_vars['attributelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attributename'];?>
 :</td>
												<td><input name="attr[<?php echo $_smarty_tpl->tpl_vars['attributelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attrid'];?>
]" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['attributelist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['attrdata'];?>
" maxlength="250" /></td>
											</tr>
											<?php }?>
											<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
											<!-- ---------------------------- -->
											<tr>
												<td>Manufacturer:</td>
												<td><input name="manufacturer" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['manufacturer']->value;?>
" maxlength="250" style="max-width: 200px;" /></td>
											</tr>
											<tr>
												<td>Make:</td>
												<td><input name="make" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['make']->value;?>
" maxlength="250" /></td>
											</tr>
											<tr>
												<td>Model:</td>
												<td><textarea name="model" id="model" class="input" style="height: 70px;"><?php echo $_smarty_tpl->tpl_vars['model']->value;?>
</textarea></td>
											</tr>
											<tr>
												<td>Years:</td>
												<td><input name="years" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['years']->value;?>
" maxlength="250" style="max-width: 200px;" /></td>
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
											<?php
$__section_i_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['grouppartslist']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total != 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
											<tr>
												
												<td valign="top"><input type="hidden" name="pid[<?php echo $_smarty_tpl->tpl_vars['grouppartslist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
][itemid]" id="pid[]" value="<?php echo $_smarty_tpl->tpl_vars['grouppartslist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pid'];?>
"/><input name="pid[<?php echo $_smarty_tpl->tpl_vars['grouppartslist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
][oeone]" id="oeone[]" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['grouppartslist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['itemoeone'];?>
" maxlength="250" /></td>
												<td valign="top"><input name="pid[<?php echo $_smarty_tpl->tpl_vars['grouppartslist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
][oetwo]" id="oetwo[]" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['grouppartslist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['itemoetwo'];?>
" maxlength="250" /></td>
												<td valign="top"><input name="pid[<?php echo $_smarty_tpl->tpl_vars['grouppartslist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
][oemone]" id="oemone[]" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['grouppartslist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['itemoemone'];?>
" maxlength="250" /></td>
												<td valign="top"><input name="pid[<?php echo $_smarty_tpl->tpl_vars['grouppartslist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
][oemtwo]" id="oemtwo[]" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['grouppartslist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['itemoemtwo'];?>
" maxlength="250" /></td>
												<td valign="top"><input name="a_grade1" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['grouppartslist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['itemqty'];?>
" style="max-width: 90px;" disabled /><input type="hidden" name="pid[<?php echo $_smarty_tpl->tpl_vars['grouppartslist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
][itemqty]" id="itemqty[]" value="<?php echo $_smarty_tpl->tpl_vars['grouppartslist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['itemqty'];?>
">&nbsp;<input name="pid[<?php echo $_smarty_tpl->tpl_vars['grouppartslist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
][qtydata]" id="qtydata[]" type="number" class="input" value="<?php echo $_smarty_tpl->tpl_vars['grouppartslist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['qtydata'];?>
" maxlength="8" style="max-width: 100px;" /></td>
												<td valign="top"><input name="pid[<?php echo $_smarty_tpl->tpl_vars['grouppartslist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['cnt'];?>
][location]" id="location[]" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['grouppartslist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['itemloc'];?>
" maxlength="250" /></td>
												<td valign="top"><?php if ($_smarty_tpl->tpl_vars['adminusertype']->value == "delopt") {?><a href="JavaScript:del('edit_item.php?type=<?php echo $_smarty_tpl->tpl_vars['ptypeid']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['partid']->value;?>
&act=delete&psid=<?php echo $_smarty_tpl->tpl_vars['grouppartslist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['pid'];?>
');" class="tooltip del" title="Delete" ><i class="fa fa-trash-o"></i></a></span><?php }?></td>
											</tr>
											<?php
}
}
if ($__section_i_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_1_saved;
}
?>
											<!-- ---------------------------- -->
										</table>
										<div class="text_align_right"><a href="add_new_stock_rec.php?type=<?php echo $_smarty_tpl->tpl_vars['ptypeid']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['partid']->value;?>
&schid=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
">Add New OE Stock</a>
										</div>
									</div>
									<div id="customer-data" class="tab-content">
										<table width="100%">
											<?php
$__section_i_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['customerlist']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_2_total = $__section_i_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_2_total != 0) {
for ($__section_i_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_2_iteration <= $__section_i_2_total; $__section_i_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
											<?php if ($_smarty_tpl->tpl_vars['customerlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['chk'] == '1') {?>
											<tr>
												<td width="150" valign="top" style="padding-top: 12px;"><?php echo $_smarty_tpl->tpl_vars['customerlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['custname'];?>
 :</td>
												<td><input name="cust[<?php echo $_smarty_tpl->tpl_vars['customerlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['custid'];?>
]" type="text" class="input" value="<?php echo $_smarty_tpl->tpl_vars['customerlist']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['crdata'];?>
" maxlength="250" /></td>
											</tr>
											<?php }?>
											<?php
}
}
if ($__section_i_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_2_saved;
}
?>
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
										<p style="color: #f00;"><?php echo $_smarty_tpl->tpl_vars['notes']->value;?>
</p>
									</div>
									<div class="text_align_right"><a class="tooltip fa_edit_btn" title="Edit" href="javascript:void(0);" onclick="lightbox('edit_note.php?type=<?php echo $_smarty_tpl->tpl_vars['ptypeid']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['partid']->value;?>
')"><i class="fa fa-pencil-square-o" ></i></a>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<div class="box">
						<strong>PART PHOTO</strong><br>
						<?php if ($_smarty_tpl->tpl_vars['displayphoto']->value != '') {
echo $_smarty_tpl->tpl_vars['displayphoto']->value;
} else { ?>No photo available<?php }?>
						<div class="edit-img-btn"><a class="tooltip fa_edit_btn" title="Edit" href="javascript:void(0);" onclick="lightbox('edit_image.php?type=<?php echo $_smarty_tpl->tpl_vars['ptypeid']->value;?>
&partid=<?php echo $_smarty_tpl->tpl_vars['partid']->value;?>
')"><i class="fa fa-pencil-square-o " ></i></a>
						</div>
					</div>
				</div>
				<div class="row">
					<input name="save" value="Save" class="button btn_green" type="submit">
					<a href="view_results.php?mode=show&type=<?php echo $_smarty_tpl->tpl_vars['ptypeid']->value;?>
&schid=<?php echo $_smarty_tpl->tpl_vars['schid']->value;?>
" class="button btn_gray">Back</a>
				</div>
				<input type="hidden" name="oeoemopt" value="<?php echo $_smarty_tpl->tpl_vars['oeoemopt']->value;?>
">
				<input type="hidden" name="stockopt" value="<?php echo $_smarty_tpl->tpl_vars['stockopt']->value;?>
">
				<input type="hidden" name="mode" value="">
				<input type="hidden" name="pageaction" value="">
			</form>
		</div>
	</div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
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
<?php echo '</script'; ?>
>
<?php }
}
