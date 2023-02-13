<script language="javascript" src="js/validatedt.js"></script>
{literal}
<script language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

		if(isWhitespace(frm.custid.value)) {
			error += "Please select the Customer.\n";
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
	<h1><i class="fa fa-cog"></i> Import Customer Data</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
			{if $errmsg ne ""}
			<p class="redText">&nbsp;{$errmsg}</p>
			{elseif $msg ne ""}
			<h3 class="redText">&nbsp;{$msg}</h3>
			{else}
			<h3 class="redText">&nbsp;</h3>
			{/if}
		</div>
		<div class="GD-70">
			<div class="form_table">
				<form name="frm" method="post" action="import_customer_data.php?mode=show" onSubmit="return valForm(this)" enctype="multipart/form-data"> 
					<div class="row">
						<table width="100%">
							<thead>
								<tr>
									<th colspan="4" align="left">IMPORT CUSTOMER DATA</th>
								</tr>
							</thead>
							<tr>
								<td colspan="4" class="spacer">*&nbsp;<em>This section is for importing customer reference data for parts.</em></td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">*&nbsp;<em>This section will import customer reference data for one customer only, irrespective of the Part Type.</em></td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">*&nbsp;<em>The import file should be a Excel worksheet with 2 columns. First column for the Part RS Ref. and second column for the customer reference data.</em></td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">*&nbsp;<em>Processing time depend on the size of the uploaded worksheet.</em></td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="4"><strong>Please Select Customer and Upload worksheet for this Customer</strong></td>
							</tr>
							<tr>
								<td width="120">Customer:</td>
								<td colspan="3">
									<select name="custid" class="req" style="width:225px;">
										<option value="" selected>Select Customer</option>
										{section name=i loop=$customerlist}
										<option value="{$customerlist[i].custid}" {if $customerlist[i].custid eq $custid}selected{/if}>{$customerlist[i].custname}</option>
										{/section}
									</select>
								</td>
							</tr>
							<tr>
								<td width="120">Choose File:</td>
								<td colspan="3"><input type="file" name="excelfile" /></td>
							</tr>
						</table>
					</div>
					<div class="row">
						<div id="action_bar">
							<input type="submit" name="import_data" value="Import" class="button">
						</div>
					</div>
					<input type="hidden" name="importfor" value="sale"  />
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div>