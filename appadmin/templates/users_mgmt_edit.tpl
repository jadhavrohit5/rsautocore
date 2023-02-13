<script language="javascript" src="js/validatedt.js"></script>
{literal}
<script language="JavaScript">
<!--
function valForm(frm)
{
	var error = "";

	if(isWhitespace(frm.contactperson.value)) {
		error += "Please enter the user full name.\n";
	}
	if (isWhitespace(frm.contactemail.value)) {
		error += "Please enter the user contact email.\n";
	} else {
		if(!isEmail(frm.contactemail.value)) {
			error += "Please enter valid email address.\n";
		}
	}
	if(isWhitespace(frm.country.value)) {
		error += "Please select the country.\n";
	}

	if(error.length != 0) {
		alert(error);
		return false;
	} else {
		frm.mode.value = 'update';
		frm.pageaction.value = 'update';
		return true;
	}
}
//-->
</script>
{/literal}
<div class="pageheading"><a href="users_mgmt.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE USERS"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Edit User Details</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
			{if $msg ne ""}
			<h5 class="redText">{$msg}</h5>
			{else}
			<h5 class="redText">&nbsp;</h5>
			{/if}
		</div>
		<div class="GD-70">
			<div class="form_table">
				<div class="row">
					<form name="frm" method="post" action="users_mgmt_edit.php?id={$webadmid}" onSubmit="return valForm(this)">   
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th colspan="2" align="left">Edit User Details for "<strong>{$wadmusername}</strong>"</th>
							</tr>
						</thead>
						<tr>
							<td colspan="2" class="spacer">&nbsp;</td>
						</tr>
						<tr>
							<td valign="top" width="160"><strong>User Login Name</strong>:</td>
							<td valign="top">{$wadmusername}</td>
						</tr>
						<tr>
							<td valign="top"><strong>User Status</strong>:</td>
							<td valign="top">{if $webadmstatus eq '1'}Active{else}Suspended{/if}</td>
						</tr>
						<tr>
							<td valign="top"><strong>User Type</strong>:</td>
							<td valign="top">{$wadmusertpnm}<input type="hidden" name="wadmusertype" value="{$wadmusertype}"></td>
						</tr>
						<tr>
							<td colspan="2" class="spacer"></td>
						</tr>
						<tr>
							<td valign="top"><strong>User Full Name</strong>:</td>
							<td valign="top"><input type="text" name="contactperson" value="{$contactperson}" class="input req" maxlength="120" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Designation</strong>:</td>
							<td valign="top"><input type="text" name="designation" value="{$designation}" class="input" maxlength="120" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Contact Email</strong>:</td>
							<td valign="top"><input type="text" name="contactemail" value="{$contactemail}" class="input req" maxlength="120" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Contact Phone</strong>:</td>
							<td valign="top"><input type="text" name="contactphone" value="{$contactphone}" class="input" maxlength="15" style="max-width: 250px;" /></td>
						</tr>
						<tr>
							<td valign="top"><strong>Country</strong>*:</td>
							<td valign="top">
								<select name="country" class="req" style="width:255px;">
									<option value="" {if $country eq ""}selected{/if}>Select country</option>
									<option value="United Kingdom" {if $country eq "United Kingdom"}selected{/if}>United Kingdom</option>
									<option value="Albania" {if $country eq "Albania"}selected{/if}>Albania</option>
									<option value="Andorra" {if $country eq "Andorra"}selected{/if}>Andorra</option>
									<option value="Austria" {if $country eq "Austria"}selected{/if}>Austria</option>
									<option value="Belarus" {if $country eq "Belarus"}selected{/if}>Belarus</option>
									<option value="Belgium" {if $country eq "Belgium"}selected{/if}>Belgium</option>
									<option value="Bosnia and Herzegovina" {if $country eq "Bosnia and Herzegovina"}selected{/if}>Bosnia and Herzegovina</option>
									<option value="Bulgaria" {if $country eq "Bulgaria"}selected{/if}>Bulgaria</option>
									<option value="Croatia" {if $country eq "Croatia"}selected{/if}>Croatia</option>
									<option value="Cyprus" {if $country eq "Cyprus"}selected{/if}>Cyprus</option>
									<option value="Czech Republic" {if $country eq "Czech Republic"}selected{/if}>Czech Republic</option>
									<option value="Denmark" {if $country eq "Denmark"}selected{/if}>Denmark</option>
									<option value="Estonia" {if $country eq "Estonia"}selected{/if}>Estonia</option>
									<option value="Faroe Islands" {if $country eq "Faroe Islands"}selected{/if}>Faroe Islands</option>
									<option value="Finland" {if $country eq "Finland"}selected{/if}>Finland</option>
									<option value="France" {if $country eq "France"}selected{/if}>France</option>
									<option value="Gibraltar" {if $country eq "Gibraltar"}selected{/if}>Gibraltar</option>
									<option value="Germany" {if $country eq "Germany"}selected{/if}>Germany</option>
									<option value="Greece" {if $country eq "Greece"}selected{/if}>Greece</option>
									<option value="Greenland" {if $country eq "Greenland"}selected{/if}>Greenland</option>
									<option value="Hungary" {if $country eq "Hungary"}selected{/if}>Hungary</option>
									<option value="Iceland" {if $country eq "Iceland"}selected{/if}>Iceland</option>
									<option value="Ireland" {if $country eq "Ireland"}selected{/if}>Ireland</option>
									<option value="Italy" {if $country eq "Italy"}selected{/if}>Italy</option>
									<option value="Latvia" {if $country eq "Latvia"}selected{/if}>Latvia</option>
									<option value="Lithuania" {if $country eq "Lithuania"}selected{/if}>Lithuania</option>
									<option value="Liechtenstein" {if $country eq "Liechtenstein"}selected{/if}>Liechtenstein</option>
									<option value="Luxembourg" {if $country eq "Luxembourg"}selected{/if}>Luxembourg</option>
									<option value="Macedonia" {if $country eq "Macedonia"}selected{/if}>Macedonia</option>
									<option value="Malta" {if $country eq "Malta"}selected{/if}>Malta</option>
									<option value="Moldova" {if $country eq "Moldova"}selected{/if}>Moldova</option>
									<option value="Monaco" {if $country eq "Monaco"}selected{/if}>Monaco</option>
									<option value="Montenegro" {if $country eq "Montenegro"}selected{/if}>Montenegro</option>
									<option value="Netherlands" {if $country eq "Netherlands"}selected{/if}>Netherlands</option>
									<option value="Norway" {if $country eq "Norway"}selected{/if}>Norway</option>
									<option value="Poland" {if $country eq "Poland"}selected{/if}>Poland</option>
									<option value="Portugal" {if $country eq "Portugal"}selected{/if}>Portugal</option>
									<option value="Romania" {if $country eq "Romania"}selected{/if}>Romania</option>
									<option value="San Marino" {if $country eq "San Marino"}selected{/if}>San Marino</option>
									<option value="Serbia" {if $country eq "Serbia"}selected{/if}>Serbia</option>
									<option value="Slovakia" {if $country eq "Slovakia"}selected{/if}>Slovakia</option>
									<option value="Slovenia" {if $country eq "Slovenia"}selected{/if}>Slovenia</option>
									<option value="Spain" {if $country eq "Spain"}selected{/if}>Spain</option>
									<option value="Svalbard and Jan Mayen Islands" {if $country eq "Svalbard and Jan Mayen Islands"}selected{/if}>Svalbard and Jan Mayen Islands</option>
									<option value="Sweden" {if $country eq "Sweden"}selected{/if}>Sweden</option>
									<option value="Switzerland" {if $country eq "Switzerland"}selected{/if}>Switzerland</option>
									<option value="Turkey" {if $country eq "Turkey"}selected{/if}>Turkey</option>
									<option value="Ukraine" {if $country eq "Ukraine"}selected{/if}>Ukraine</option>
									<option value="Vatican City" {if $country eq "Vatican City"}selected{/if}>Vatican City</option>
								</select>
							</td>
						</tr>
						<!-- 15-10-2020  -->
						{*<!-- <tr>
							<td colspan="2" align="left">
								{section name=i loop=$ptypelistold}
								{if $ptypelistold[i].chk eq '1'}<label>{$ptypelistold[i].typeid}-{$ptypelistold[i].typenm}&nbsp;&nbsp;,&nbsp;&nbsp;</label>{/if}
								{/section}
							</td>
						</tr> -->*}
						<tr>
							<td colspan="2" align="left"><strong>Allow Access to Part Types</strong>:</td>
						</tr>
						<tr>
							<td colspan="2" align="left">
								{section name=i loop=$ptypelist}
								<label>
								<input type="checkbox" name="ptypeopt[]" id="ptypeopt[]" value="{$ptypelist[i].typeid}" {if $ptypelist[i].chk eq '1'} checked {/if}> {$ptypelist[i].typenm} </label>&nbsp;&nbsp;&nbsp;&nbsp;{if $ptypelist[i].brk eq 1}<br>{/if}
								{/section}
							</td>
						</tr>
						<!-- end -->
						<!-- 04-08-2021   -->
						<tr>
							<td colspan="4" align="left"><strong>Allow Access to Searches</strong>:</td>
						</tr>
						<tr>
							<td colspan="4" align="left">
								<label><input type="radio" name="sch_opt" value="1" {if $sch_opt eq '1'} checked {/if}> RSA Database Search Only&nbsp;&nbsp;&nbsp;&nbsp;
								<label><input type="radio" name="sch_opt" value="2" {if $sch_opt eq '2'} checked {/if}> Number Plate Search Only&nbsp;&nbsp;&nbsp;&nbsp;
								<label><input type="radio" name="sch_opt" value="3" {if $sch_opt eq '3'} checked {/if}> Both Searches&nbsp;&nbsp;&nbsp;&nbsp;
							</td>
						</tr>
						<!-- end  -->
					</table>
					<div class="row">
						<div id="action_bar">
							<input type="submit" name="submit" value="Update" class="button">
							<a href="users_mgmt_view.php?mode=show&id={$webadmid}" class="button btn_gray">Back</a>
						</div>
					</div>
					<input type="hidden" name="mode" value="">
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div>