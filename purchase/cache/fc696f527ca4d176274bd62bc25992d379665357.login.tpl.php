<?php
/* Smarty version 3.1.30, created on 2023-02-13 21:00:37
  from "/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_63eaa4f5f02364_79752734',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e5e8614ff52d7aea18c6aec72688d208b86e043c' => 
    array (
      0 => '/home/storm/sites/rsautocoresystem-co-uk/public/purchase/templates/login.tpl',
      1 => 1649395187,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_63eaa4f5f02364_79752734 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="login">
	<div id="loginform">
		<form name="login" action="/purchase/index.php" method="post" class="validate disable">
		<div class="fromContent">
			<h3 class="title">Please login with your user data </h3>
			<p class="redText"></p>
			<fieldset>
			<p>
			<label>Username</label>
			<input name="user_name" type="text" class="input req" required/>
			</p>
			<p>
			<label>Password</label>
			<input name="usrpasswd" type="password" class="input req" required/>
			</p>
			<p class="login_btn">
			<button type="submit" name="login" class="button rs_btn">Login</button>
			</p>
			</fieldset>
		</div>
		</form>
	</div>
</div>
<?php }
}
