<?php
/* Smarty version 3.1.30, created on 2023-02-14 00:19:47
  from "/Applications/XAMPP/xamppfiles/htdocs/rsautocore/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eac593e1a400_86161633',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f1fd3876a541770b61d39624d97c3d6931525b2' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/rsautocore/templates/login.tpl',
      1 => 1676330037,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63eac593e1a400_86161633 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="login">
	<div id="loginform">
		<form name="login" action="/rsautocore/index.php" method="post" class="validate disable">
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
