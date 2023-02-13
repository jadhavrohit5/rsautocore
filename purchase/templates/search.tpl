<div class="pageheading">
	<div class="img"><img src="catphotos/{$ptypeph}" alt="{$ptypenm}" width="60"></div>
	<h3>{$ptypenm}</h3>
	<p>{if $parttype eq 2}Search by Reference or Casting Number{else}Search by Reference or OE/OEM Number{/if}</p>
</div>
<div id="pageBlock" style="padding-top: 0;">
	<div class="search_by">
	<form name="search" action="search.php?type={$parttype}" method="post" class="validate disable">
		<p class="redText">{$msg}</p>
		<p class="uppercase">{if $parttype eq 2}Enter Reference or or Casting Number{else}Enter Reference or OE/OEM Number{/if}</p>
		<p>
		<input name="ref_num" type="text" class="input" placeholder="E.g. 1234"/>
		</p>
		<div>
		<button type="submit" name="submit" class="button rs_btn">SEARCH</button>
		</div>
		<input type="hidden" name="pageaction" value="partsearch">
	</form>
	</div>
</div>
{*<!-- <div id="adminBody">
	<div class="pageheading">
		<span class="fa_icon"><i class="fa fa-search"></i></span> <h3>{$ptypenm}</h3>
	</div>
	<div class="search_page row">
		<div class="search_form">
			<form name="search" action="search.php?type={$parttype}" method="post" class="validate disable">
				<div class="fromContent">
					<fieldset>
						<p class="redText">{$msg}</p>
						<p>
							{if $parttype eq 2}<label>Search by Reference or Casting Number</label>{else}<label>Search by Reference or OE/OEM Number</label>{/if}
							<input name="ref_num" type="text" class="input"/>
						</p>
						<p class="search_btn">
							<input type="submit" name="login" value="GO!" class="button btn_red"/>
						</p>
					</fieldset>
				</div>
				<input type="hidden" name="pageaction" value="partsearch">
			</form>
		</div>
	</div>
</div> -->*}