<?php
/* Smarty version 3.1.30, created on 2023-02-13 11:37:34
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/import_purchase_data.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63ea20feca1e52_08211896',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d5cd51d81929ac59be7a2236f694d99841a306d' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/import_purchase_data.tpl',
      1 => 1652792925,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63ea20feca1e52_08211896 (Smarty_Internal_Template $_smarty_tpl) {
?>
<script language="javascript" src="js/validatedt.js"></script>

<script language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

		//if(isWhitespace(frm.parttype.value)) {
		//	error += "Please select the part type.\n";
		//}
		if(isWhitespace(frm.orderdate.value)) {
			error += "Please select the date.\n";
		}

		if(isWhitespace(frm.excelfile.value)) {
			error += "Please upload the file.\n";
		}

		if(error.length != 0) {
			alert(error);
			return false;
		} else {
			frm.pageaction.value = 'selectptype';
			return true;
		}

	}
//-->
</script>

<div class="pageheading"><a href="parts.php?mode=show&type=1" class="tooltip back_btn" title="BACK TO PARTS LIST"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Import Purchase Data</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
						<h3 class="redText">&nbsp;7 records successfully imported.</h3>
					</div>
		<div class="GD-70">
			<div class="form_table">
				<form name="frm" method="post" action="import_purchase_data.php?mode=show" onSubmit="return valForm(this)" enctype="multipart/form-data"> 
					<div class="row">
						<table width="100%">
							<thead>
								<tr>
									<th colspan="4" align="left">IMPORT PURCHASE DATA</th>
								</tr>
							</thead>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							
							<tr>
								<td colspan="4">Please select the common order date for imported data</td>
							</tr>
							<tr>
								<td width="120">Order Date:</td>
								<td colspan="3"><input type="text" name="orderdate" value="" class="datepicker input req" maxlength="20" style="max-width: 150px;" /></td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="4">Please select the import file*</td>
							</tr>
							<tr>
								<td width="120">Choose File:</td>
								<td colspan="3"><input type="file" name="excelfile" /></td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="4"><strong>Note:</strong> The import worksheet should have the following columns :-<br>
								PO# ,  Supplier ,  RS Reference ,  Quantity ,  Price ,  Date<br>
								* <em>The date in last column will not be stored and replaced by above selected order date for all records.</em></td>
							</tr>
						</table>
					</div>
					<div class="row">
						<div id="action_bar">
							<input type="submit" name="import_data" value="Import" class="button">
						</div>
					</div>
					<input type="hidden" name="importfor" value="purcahse"  />
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
$(document).ready(function () {
        var today = new Date();
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose:true,
            endDate: "today",
            maxDate: today,
            altFormat: "dd/mm/yy", 
            dateFormat: 'dd/mm/yy'
        }).on('changeDate', function (ev) {
			$(this).datepicker('hide');
		});

	$('.datepicker').keyup(function () {
		if (this.value.match(/[^0-9]/g)) {
			this.value = this.value.replace(/[^0-9^-]/g, '');
		}
	});
});

</script> 
<?php }
}
