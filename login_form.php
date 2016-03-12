<div id="form_login">
    <form action="index.php" method="POST">
       		<div class="form-group">
            <!-- <label>Email Id</label> -->
            <input class="form-control" id="email-input" name="email" type="email" placeholder="Email" value=<?php if(isset($_SESSION[ 'email'])) echo $_SESSION[ 'email'];?>>
            <!-- <label>Password</label> -->
            <input class="form-control" id="password-input" name="password" type="password" placeholder="Password">
            <button class="btn btn-primary" id="signIN">Sign In</button>
		</div>
        <p id="navbar-p" class="color"><b>Don't have an account?</b><a href="register.php"><b>Sign Up</b></a></p>
    </form>
</div>
