<?php
/* Smarty version 3.1.30, created on 2023-02-11 12:40:43
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/edit_part_type.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e78ccbdff894_74020581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a8d1ad057583e25e7606d3c2106fae8095e8888' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/edit_part_type.tpl',
      1 => 1643456907,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63e78ccbdff894_74020581 (Smarty_Internal_Template $_smarty_tpl) {
?>
<script language="javascript" src="js/validatedt.js"></script>

<script language="javascript">
<!--
	function valForm(frm)
	{
		var error = "";

		var oeoemopts = document.getElementsByName('oeoemopt');
        var genValu1 = false;

		if(isWhitespace(frm.parttype.value)) {
			error += "Please enter the part type name.";
		}

        for(var i=0; i<oeoemopts.length;i++){
            if(oeoemopts[i].checked == true){
                genValu1 = true;
            }
        }
        if(!genValu1){
 			error += "Please select the OE/OEM Number option.\n";
        }
//
		if(error.length != 0) {
			alert(error);
			return false;
		} else {
			frm.pageaction.value = 'updateptype';
			return true;
		}

	}
//-->
</script>

<div class="pageheading"><a href="manage_part_type.php?mode=show" class="tooltip back_btn" title="BACK TO MANAGE PART CATEGORIES"><i class="fa fa-angle-left"></i></a>
	<h1><i class="fa fa-cog"></i> Edit Part Category</h1>
</div>
<div id="adminBody" class="sec_addpart">
	<div id="pageBlock">
		<div class="row text_align_center">
						<h5 class="redText">&nbsp;</h5>
					</div>
		<div class="GD-70">
			<div class="form_table">
				<form name="frm" method="post" action="edit_part_type.php?mode=show&ptype=MTc=" onSubmit="return valForm(this)"> 
					<div class="row">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<thead>
								<tr>
									<th colspan="4" align="left">EDIT PART CATEGORY</th>
								</tr>
							</thead>
							<tr>
								<td colspan="4" class="spacer">&nbsp;</td>
							</tr>
							<tr>
								<td valign="top" width="22%"><strong>Part Type</strong>:</td>
								<td valign="top" colspan="3" width="78%"><input name="parttype" type="text" class="input req alphanumeric" value="STARTER MOTOR" maxlength="150" />
								</td>
							</tr>
							<tr>
								<td valign="top">Select Part Attributes:</td>
								<td valign="top" colspan="3">
																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="1" >
									Type </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="2" >
									Pulley Diameter </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="3" >
									Bar Pressure </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="4"  checked >
									Purchase Price </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="5" >
									Piston MM </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="6" >
									Pad Gap </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="7" >
									F/R </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="8"  checked >
									Cast </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="9" >
									Length </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="10" >
									Turns </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="11" >
									T-Rod Thread Size </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="12" >
									Pinion Length </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="13" >
									Pinion Type </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="14" >
									Pulley Grooves </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="15" >
									Pulley Type </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="16" >
									Plug Pins </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="17"  checked >
									Weight </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="18" >
									Bolt Diameter </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="19" >
									Pin Hole Diameter </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="20" >
									Sensor </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="21" >
									Position </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="22" >
									Disc Diameter </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="23" >
									Disc Width </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="24" >
									Leading/Trailing </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="25" >
									Amps (A) </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="26"  checked >
									Volts (V) </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="27"  checked >
									Mounting Points </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="28" >
									Actuator </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="29"  checked >
									KW </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="30"  checked >
									Teeth </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="31"  checked >
									Rotation </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="32" >
									Compressor ID </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="33" >
									Gas Type </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="34" >
									MCI Price </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="35" >
									BPS Price </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="36" >
									Pulley Number </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="37" >
									Hub Shape </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="38" >
									Lock Stops Size </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="39" >
									Lock Stops Colour </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="40" >
									Outer teething wheel side </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="41" >
									Numb.of teeth,ABS ring </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="43" >
									Seal diam. </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="44" >
									Wheel Side Joint Ø </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="46" >
									Thread Size </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="47" >
									Bore Ø </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="48" >
									Number of bores </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="50" >
									OE 1 (Clean) </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="51" >
									OE 2 </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="52" >
									OEM 1 (Clean) </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="53" >
									OEM 2 </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="54" >
									Actuator Type </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="55" >
									Engine Code </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="56" >
									ABS Ring Ø (mm/ </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="57" >
									Flange Ø (mm) </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="58" >
									Inner Joint Stub Length </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="59" >
									Tooth Gaps, Transmisson side </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="60" >
									Length 1 (mm) </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="61" >
									Length 2 (mm) </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="62" >
									Teeth, ABS ring </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="63" >
									Outer teething differential side </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="64" >
									Overall Length (mm) </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="65" >
									Tripod Roller Ø  (mm) </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="66" >
									Pulley Diameter (mm) </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="67"  checked >
									Bosch Need </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="68" >
									Ewa Target </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="69" >
									Plug Wires </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="70" >
									Green Price </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="71" >
									Rear Head No </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="72" >
									Clutch Number </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="73" >
									Scrap Price </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="attr[]" id="attr[]" value="74" >
									Manufacturer Reference </label>&nbsp;&nbsp;&nbsp;&nbsp;																	</td>
							</tr>
							
							<tr>
								<td valign="top">Have OE/OEM Number?</td>
								<td valign="top" colspan="3">
									<label>
									<input type="radio" name="oeoemopt" id="radio12" value="1"  checked >
									Yes </label>&nbsp;&nbsp;&nbsp;&nbsp;
									<label>
									<input type="radio" name="oeoemopt" id="radio22" value="0"  checked >
									No</label>
								</td>
							</tr>
							<tr>
								<td valign="top">Select Customers:</td>
								<td valign="top" colspan="3">
																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="1" >
									AMK </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="2" >
									Cardone </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="3" >
									MS-Group </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="4" >
									CPI UK </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="5"  checked >
									Dasilva </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="6"  checked >
									Delco Remy </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="7" >
									Motorherz </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="8"  checked >
									Elstock </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="9"  checked >
									ERA </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="11"  checked >
									Lauber </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="12" >
									Lenco </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="13" >
									Lizarte </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="14" >
									LUK </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="15" >
									Ricambi </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="16" >
									Sercore </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="17" >
									Servotec </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="18" >
									Shaftec </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="19" >
									Tecnosir </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="20" >
									TRW </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="21" >
									URW </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="22" >
									WAT </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="23" >
									CF  </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="24" >
									Cardone US  </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="25" >
									Drivelink  </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="26" >
									General Ricambi </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="27" >
									Sismak  </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="28" >
									Hirsche  </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="29" >
									CPI Belgium </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="30" >
									Brake Engineering </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="31" >
									SBS </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="32" >
									Cardone USA </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="33" >
									Cedregsa </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="34" >
									ABS </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="35"  checked >
									Sorea </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="36" >
									TRW ZF </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="37" >
									Teamec </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="38" >
									Vege </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="39" >
									AX </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="41" >
									RS Internal </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="42" >
									LHD REF </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="43" >
									RHD REF </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="44" >
									Gidro </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="45"  checked >
									Cevam </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="46" >
									Blockstem </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="47" >
									Dipasport </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="48" >
									BBB Industries </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="49" >
									Depa </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="50" >
									Facar </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="51" >
									FTE </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="52" >
									Reikanen </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="53" >
									ATG </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="54" >
									Demex </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="55"  checked >
									Bosch </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="56"  checked >
									Bosch 2 </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="57" >
									TREEZER </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="58" >
									Delphi </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="59" >
									Continental VDO </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="60"  checked >
									Denso </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="61"  checked >
									Alanko </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="62" >
									Shaftec 2 </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="63" >
									Buchli </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="64" >
									Wilmink Group </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="65" >
									GKN </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="66"  checked >
									HC </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="67"  checked >
									Lucas </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="68" >
									EAI </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="69" >
									Airstal </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="70"  checked >
									Hella </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="71" >
									Spidan </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="72"  checked >
									Remante </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="73" >
									Apec </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="74" >
									Rolling Components </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="75" >
									ECP </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="76" >
									Pagid </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="77" >
									Parts Aliance </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="78" >
									Brake Fit </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="79" >
									Juratek </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="80" >
									Brake Engineering 2 </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="81" >
									Einbach </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="82" >
									CPS / ODM </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="83" >
									BGA </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="84"  checked >
									Eurotec </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="85"  checked >
									AS PL </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="86" >
									Borg Warner </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="87" >
									TurboTec </label>&nbsp;&nbsp;&nbsp;&nbsp;<br>																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="88" >
									TMI </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="89" >
									Denso 2 </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="90" >
									Four Seasons </label>&nbsp;&nbsp;&nbsp;&nbsp;																		<label>
									<input type="checkbox" name="cust[]" id="cust[]" value="91"  checked >
									Valeo </label>&nbsp;&nbsp;&nbsp;&nbsp;																	</td>
							</tr>
						</table>
 					</div>
					<div class="row">
						<div id="action_bar">
							<input name="addnew" value="Update" class="button" type="submit">
						</div>
					</div>
					<input type="hidden" name="stockopt" value="1">
					
					<input type="hidden" name="pageaction" value="">
				</form>
			</div>
		</div>
	</div>
</div><?php }
}
