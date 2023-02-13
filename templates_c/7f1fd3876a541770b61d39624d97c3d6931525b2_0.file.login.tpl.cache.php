<?php
/* Smarty version 3.1.30, created on 2023-02-14 00:19:47
  from "/Applications/XAMPP/xamppfiles/htdocs/rsautocore/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eac593e12300_88187300',
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
  'includes' => 
  array (
  ),
),false)) {
function content_63eac593e12300_88187300 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '97238943563eac593df69f7_13469000';
?>
<div id="login">
	<div id="loginform">
		<form name="login" action="<?php echo $_smarty_tpl->tpl_vars['self']->value;?>
" method="post" class="validate disable">
			<div class="fromContent">
				<div id="loginLogo"><a href="#"><img src="images/rs-logo.jpg" alt="Logo" /></a></div>
				<div align='center' style="height:30px;"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>
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
