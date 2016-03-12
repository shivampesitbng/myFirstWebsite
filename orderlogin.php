<div class="login pull-left">
			
			<div class="register" id="form_login"><br><br>
			<form action="checklogin.php" method="POST">
			<div class="register-top-grid">
			<p>Already have an account?</p><br>
				<input class="form-control" id="email-input" name="email" type="email" placeholder="Email" value=<?php if(isset($_SESSION[ 'email'])) echo $_SESSION[ 'email'];?>><br><br>
				<input class="form-control" id="password-input" name="password" type="password" placeholder="Password"><br><br>
				<input class="btn btn-primary" type="submit" value="Login">
			</form>
			</div>
		</div>
	</div>