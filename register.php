<?php
	include_once('./config.php');
	// $check = 1;
	if(isset($_POST['email']) && isset($_POST['password'])) {
		
		if(($_POST['password']) == $_POST['password2']) {
			//header('Location: i.php');
			session_start();
			mysql_connect(HOST,DB_USER) or die(mysql_error());
			mysql_select_db('register');
			$email_id = mysql_real_escape_string($_POST['email']);
			$password_hash = md5(mysql_real_escape_string($_POST['password']));
			$ph_id = mysql_real_escape_string($_POST['number']);
			$fname = mysql_real_escape_string($_POST['name']);
			$add = mysql_real_escape_string($_POST['address']);
			$query_result = mysql_query("INSERT INTO signup (fullname,phone,address,email,pass) VALUES ('$fname','$ph_id','$add','$email_id', '$password_hash')") or die(mysql_error());
			if ($query_result) {
				$_SESSION['email'] = $email_id;
				$_SESSION['name'] = $fname;
				header('Location: index.php');
				# code...
			} else {
				$error = 1;
			}
		} else {
			$_SESSION['temp_email'] = $_POST['email'];
			$error = 1;
		}
	} else {
		$_SESSION['temp_email'] = "";
		$error = 0;
	}
 ?>

<!DOCTYPE HTML>
<html>
<head>
<title>Midnite Hunger</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Luxury Furnish Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<!--//webfont-->
<script src="js/jquery.easydropdown.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
		<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
			});
		});
		</script>
</head>
<body>
   <div class="header">
	<div class="container">
		<div class="header-top">
      		<div class="logo">
				<a href="index.php"><h6>MIDNITE</h6><h2>Hunger</h2></a>
			 </div>
			<div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
		 </div>  
	 </div>
    <div class="main">
	   <div class="container">
		  <div class="register">
		  	  <form action="register.php" method="POST"> 
				 <div class="register-top-grid">
					<h3>PERSONAL INFORMATION</h3>
					 <div>
						<span>Name<label>*</label></span>
						<input type="text" name="name" autofocus value=> 
					 </div>
					 <div>
						<span>Mobile Number<label>*</label></span>
						<input type="text" name="number"> 
					 </div>
					 <div>
						<span>Address<label>*</label></span>
						<input type="text" name="address"> 
					 </div>
					 <div>
						 <span>Email Address<label>*</label></span>
						 <input type="text" name="email"> 
					 </div>
					 <div>
						<span>Password<label>*</label></span>
						<input type="password" name="password">
					 </div>
					 <div>
						 <span>Confirm Password<label>*</label></span>
						 <input type="password" name="password2">
					</div>
					 <?php if ($error == 1) {
						echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Please check if you have entered same password in both the fields</div>';
						} 
					 ?>
					 
					 <button class="btn btn-primary" type="submit">Sign Up</button>
					 </div>

				</form>
			</div>
		   </div>
	     </div>
	    </div>
		
</body>
</html>		