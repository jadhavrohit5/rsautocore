<div id="login">
	<div id="loginform">
		<form name="login" action="{$self}" method="post" class="validate disable">
		<div class="fromContent">
			<h3 class="title">Please login with your user data </h3>
			<p class="redText">{$message}</p>
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
{*<!-- <div id="login">
	<div id="loginLogo">
		<p><a href="index.php"><img src="images/rs-logo.jpg" alt="Logo" /></a></p>	
	</div>
	<div id="loginform">
		<form name="login" action="{$self}" method="post" class="validate disable">
			<div class="fromContent">
				<p class="redText">{$message}</p>	
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
						<input type="submit" name="login" value="Login" class="button btn_red"/>
					</p>
				</fieldset>
			</div>
		</form>
		</div>
	</div>
</div> -->*}