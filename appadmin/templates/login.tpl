<div id="login">
	<div id="loginform">
		<form name="login" action="{$self}" method="post" class="validate disable">
			<div class="fromContent">
				<div id="loginLogo"><a href="#"><img src="images/rs-logo.jpg" alt="Logo" /></a></div>
				<div align='center' style="height:30px;">{$message}</div>
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
</div>