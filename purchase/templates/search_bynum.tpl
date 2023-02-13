<script language="javascript" src="includes/validate.js"></script>
{literal}
<script language="javascript">
<!--
	function valTwForm(frm)
	{
		var error = "";

		if(isWhitespace(frm.regnumber.value)) {
			error += "Please enter the vehicle registration number.\n";
		}
		if(error.length != 0) {
			alert(error);
			return false;
		} else {
			frm.pageaction.value = 'vnpsearch';
			return true;
		}

	}
//-->
</script>
{/literal}
<div id="pageBlock">
	<div class="search_by" style="margin-left: auto;">
	<h3>Search by <strong>Number Plate / <br>
	Vehicle Registration Number</strong></h3>
	<form name="srhFrm" method="post" action="search_bynum.php" onSubmit="return valTwForm(this)">
		<p class="redText">{$errmsg}</p>
		<p class="uppercase">Enter Vehicle Number Plate No.</p>
		<div class="Number_Plate">
			<div class="regnumber">
				<input name="regnumber" type="text" class="input" value="" placeholder="gf57 xwd"/>
			</div>
		</div>
		<div>
			<button type="submit" name="submit" class="button rs_btn">SEARCH</button>
		</div>
		<input type="hidden" name="stepno" value="1">
		<input type="hidden" name="pageaction" value="">
	</form>
	</div>
</div>
{*<!-- <div id="adminBody">
	<h3 style="padding: 20px;">Search By Number Plate / Vehicle Registration Number<br></h3>
	<div class="text_align_center" style="padding: 20px;">&nbsp;</div>
	<div class="text_align_center" style="padding: 20px;">
		<form name="srhFrm" method="post" action="search_bynum.php" onSubmit="return valTwForm(this)">
		    <p class="redText">{$errmsg}</p>
			<p>Enter Vehicle Number Plate No.</p>
			<p><input name="regnumber" type="text" class="input" style="max-width: 250px; font-size: 20px;" value=""/></p>
			<p><input type="submit" name="submit" value="SEARCH" class="button btn_green" style="width: 100%; max-width: 150px;"/></p>
			<input type="hidden" name="stepno" value="1">
			<input type="hidden" name="pageaction" value="">
		</form>
	</div>
</div> -->*}