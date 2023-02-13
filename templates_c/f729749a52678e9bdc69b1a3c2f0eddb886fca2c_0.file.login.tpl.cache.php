<?php
/* Smarty version 3.1.30, created on 2023-02-13 23:09:19
  from "/home/storm/sites/rsautocoresystem-co-uk/public/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eac31fc04116_06609200',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f729749a52678e9bdc69b1a3c2f0eddb886fca2c' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/templates/login.tpl',
      1 => 1556677750,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63eac31fc04116_06609200 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '141100002663eac31fbfbce3_60685918';
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
