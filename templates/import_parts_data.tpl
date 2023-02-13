<script language="javascript" src="js/validatedt.js"></script>
{literal}
<script language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

		if(isWhitespace(frm.parttype.value)) {
			error += "Please select the part type.";
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
	<h1><i class="fa fa-cog"></i> Import Parts Data</h1>
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
				<form name="frm" method="post" action="import_parts_data.php?mode=show" onSubmit="return valForm(this)" enctype="multipart/form-data" class="validate disable"> 
					<!-- <div class="row"> -->
						<table width="100%">
							<thead>
								<tr>
									<th colspan="4" align="left">IMPORT PARTS DATA</th>
								</tr>
							</thead>
							<tr>
								<td colspan="4" class="spacer">*&nbsp;<em>This section is for importing parts data for selected part type.</em></td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">*&nbsp;<em>This section will import parts data for one part type only.</em></td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">*&nbsp;<em>The import file should be a Excel worksheet with part data in multiple columns.</em></td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">*&nbsp;<em>RSAC or RS Ref No# must be in first column In the worksheet, if RSAC data is missing for a record, then that record will be skipped.</em></td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">*&nbsp;<em>For empty cells (no data), the import will do nothing. Only data from the populated cells will update the database.</em></td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">*&nbsp;<em>Processing time depend on the size of the uploaded worksheet.</em></td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td colspan="4"><em>Please Select Part Type and Upload worksheet for this Part Type</em></td>
							</tr>
							<tr>
								<td width="140">Part Type:</td>
								<td colspan="3">
									<select name="parttype" class="req" style="width:225px;">
										<option value="" selected>Select Part Type</option>
										{section name=i loop=$myparttypelist}
										<option value="{$myparttypelist[i].typeid}">{$myparttypelist[i].parttype}</option>
										{/section}
									</select>
								</td>
							</tr>
							<tr>
								<td width="140">Choose File:</td>
								<td colspan="3"><input type="file" name="excelfile" /></td>
							</tr>
						</table>
					<!-- </div> -->
					<div class="row">
						<div id="action_bar">
							<input type="submit" name="import_data" value="Import" class="button">
						</div>
					</div>
					<input type="hidden" name="importfor" value="partslist"  />
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div>