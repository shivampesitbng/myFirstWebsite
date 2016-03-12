<?php
session_start(); 
	include_once('./config.php');
	if(isset($_POST['email']) && isset($_POST['password'])) {
		$usr_email = mysql_real_escape_string($_POST['email']);
		$usr_password = mysql_real_escape_string($_POST['password']);
		$usr_password_hash = md5($usr_password);
		mysql_connect(HOST,DB_USER) or die(mysql_error());
		mysql_select_db('register') or die(mysql_error());
		$usr_login_query = "select * from signup where email='$usr_email' and pass='$usr_password_hash'";
		$query_result = mysql_query($usr_login_query) or die(mysql_error());
		if($query_result) {
			$usr_array = mysql_fetch_assoc($query_result) or die(mysql_error());
			$login_flag = 1;
		//echo "After query";
		} else {
			$login_flag = 0;
			// session_destroy();
		}
		if(is_array($usr_array)) {
			if($usr_array['pass'] == $usr_password_hash) {
				$login_flag = 1;
				$_SESSION['name'] = $usr_array['fullname'];
				$_SESSION['email'] = $usr_email;
				$_SESSION['password'] = $usr_password_hash;
			} else {
				$login_flag = 0;
			}
		} else {
			// session_destroy();
			$login_flag = 0;
		}
	} else {
		$login_flag = 0;
	}
	if(isset($_SESSION['email']) /*&& $_SESSION['password']*/) {
		$login_flag = 1;
	} else {
		$login_flag = 0;
	}
 ?>


<!DOCTYPE HTML>
<html>
<head>
<title>Delhi Base | Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Luxury Furnish Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<script src="js/simpleCart.min.js"> </script>
<script src="js/jquery.min.js"></script>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script src="js/jquery.easydropdown.js"></script>
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
				<a href="index.html"><h1>DELHI BASE</h1></br><h6>Sri Food Court</h6></a>
			 </div>
		   <div>
			 <ul class="social">
				<!--?php 
				
				if($login_flag==1 || isset($_SESSION['email'])) { include_once( './logged_in.php'); } else { include_once( './login_form.php'); } ?-->
			 </ul>
		    
			<div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
		 </div>  
		 <div class="banner_wrap">
			<div class="bannertop_box">
				<div class="welcome_box">
	  				<h3>Welcome to </br></br> DELHI BASE </br> SRI FOOD COURT</h3>
	  				<p>Restaurant in Electronic City </br> Open: 9.00 am - 10.30 pm <br> Call at 9916802329/7259201822 to Order Now </p>
	  			</div>
   		 	</div>
   		 	<div class="banner_right">
   		 		<h1>Serving you today..</br>Serve you for ever..<br></h1>
   		 		<p>Get Delicious Food at your door within 40 min</p><form name="hop" id="dd">
<p>
<select name="choose" class="banner_btn" id="dd">
<option value="index.html" >YOUR LOCATION</option>
<!--option value="menu.html">Electronic City</option-->
<option value="menu.html">ELECTRONIC CITY PHASE - I</option>
<option value="menu.html">ELECTRONIC CITY PHASE - II</option>
<!--option value="menu.html">Celebrity Housing Layout</option-->
<option value="menu.html">HOSA ROAD</option>
</select>
<input type="button" class="banner_btn" onClick="location=document.hop.choose.options[document.hop.choose.selectedIndex].value;" value="ORDER ONLINE"></p>
</form>
   		 		</div>
   		 	<div class='clearfix'></div>
	    </div>
		<font color="BLACK"><marquee direction="left" scrollamount="10"><b>Served within 40 minutes from the time of order.Items subject to availability.</b></marquee></font>
	   </div>
	</div>
		<div class="footer_bottom">
		<div class="container">
			<div class="copy">
			   <p align="right">&copy Delhi Base</p>
			</div>
		</div>
	</div>
</body>
</html>		