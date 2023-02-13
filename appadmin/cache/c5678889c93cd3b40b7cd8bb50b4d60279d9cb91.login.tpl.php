<?php
/* Smarty version 3.1.30, created on 2023-02-12 09:22:52
  from "/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63e8afec4617e7_00253001',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0dbaa5551f8ceabe9c8bcd4d405074e09706c151' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/appadmin/templates/login.tpl',
      1 => 1556677750,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63e8afec4617e7_00253001 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="login">
	<div id="loginform">
		<form name="login" action="/appadmin/index.php" method="post" class="validate disable">
			<div class="fromContent">
				<div id="loginLogo"><a href="#"><img src="images/rs-logo.jpg" alt="Logo" /></a></div>
				<div align='center' style="height:30px;"></div>
				<fieldset>
					<p>
						<label>Username</label>
						<input name="user_name" type="text" class="input req" required />
					</p>
					<p>
						<label>Password</label>
						<input name="usrpasswd" type="password" class="input req" required />
					</p>
					<p class="login_btn">
						<input type="submit" name="login" value="Login" class="button btn_red" />
					</p>
				</fieldset>
			</div>
		</form>
	</div>
</div><?php }
}
