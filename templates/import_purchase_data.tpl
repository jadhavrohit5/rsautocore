<script language="javascript" src="js/validatedt.js"></script>
{literal}
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
{/literal}
<div class="pageheading"><a href="parts.php?mode=show&type=1" class="tooltip back_btn" title="BACK TO PARTS LIST"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Import Purchase Data</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
			{if $msg ne ""}
			<h3 class="redText">&nbsp;{$msg}</h3>
			{else}
			<h3 class="redText">&nbsp;</h3>
			{/if}
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
							{*<!-- <tr>
								<td colspan="4"><em>Please Select Part Type</em></td>
							</tr>
							<tr>
								<td width="120">Part Type:</td>
								<td colspan="3">
									<select name="parttype" class="req" style="width:225px;">
										<option value="" selected>Select Part Type</option>
										{section name=i loop=$myparttypelist}
										<option value="{$myparttypelist[i].typeid}" {if $myparttypelist[i].typeid eq $parttype}selected{/if}>{$myparttypelist[i].parttype}</option>
										{/section}
									</select>
								</td>
							</tr> -->*}
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
{literal}
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
{/literal}