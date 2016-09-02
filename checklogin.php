<?php
	include_once('./config.php');
	session_start();
	// $check = 1;
	$nameError ="";
	$emailError ="";
	$adressError ="";
	$phoneError ="";
	if(isset($_POST['email'])) {
			//header('Location: i.php');
			//session_start();
			mysql_connect(HOST,DB_USER) or die(mysql_error());
			mysql_select_db('checkout');
			$email_id = mysql_real_escape_string($_POST['email']);
			$ph_id = mysql_real_escape_string($_POST['number']);
			$fname = mysql_real_escape_string($_POST['name']);
			$add = mysql_real_escape_string($_POST['address']);
			//$add = mysql_real_escape_string($_POST['address']);
			$query = "INSERT INTO `check` (fullname,phone,email,addres) VALUES ('$fname','$ph_id','$email_id','$add')";
			$query_result = mysql_query($query) or die(mysql_error());
			if ($query_result) {
				$_SESSION['email'] = $email_id;
				$_SESSION['name'] = $fname;
				$_SESSION['phone']  = $ph_id;
				$_SESSION['address'] = $add;
				
				header('Location: checklogin.php');
				# code...
			} else {
				$error = 1;
			}
			} else {
		$_SESSION['temp_email'] = "";
		$error = 0;
	}
	/*$headers = "From:  noreply@gmail.com" . "\r\n" .
	$body= "Email: ".$_SESSION['email']."Full name: ".$_SESSION['fname']."Phone: ".$_SESSION['phone'];
    //mail($to,"Text mail","Test message",$from);
	if(mail($to,"Text mail","Test message",$from)) {
	echo "Your message is sent";
	}else {
	echo "Fail";
	}*/
require('./PHPMailer/PHPMailerAutoload.php');
$mail=new PHPMailer();
$mail->CharSet = 'UTF-8';
$order = [];
                        // echo "<p>".$_COOKIE['order']."</p>";
                        // $order = $_COOKIE['order'].split("", string)
                        $order = explode("|", $_COOKIE['order']);
                        // print_r($order);	
                        $total = 0;
                        //echo "Order Id: ".$order[0],"<br>";
						$list ='';
                        for ($i=1; $i < sizeof($order); $i+=3) { 
                           $list .= $order[$i]."  x".$order[$i+1]."  Rs.".$order[$i+2]. "<br>";
                            $total += $order[$i+2];
                        }
                        //echo "<br>Your Total: Rs.".$total,"/-<br><br>";

$body =	"Email: " .$_SESSION['email']."<br>"."Full name: ".$_SESSION['name']."<br>"."Phone: ".$_SESSION['phone']."<br>"."Address: ".$_SESSION['address']."<br>"."Order Id: ".$order[0]."<br>"."Order: ".$list."<br>"."Total: Rs.".$total;;
		 

$mail->IsSMTP();
$mail->Host       = 'smtp.gmail.com';

$mail->SMTPSecure = 'tls';
$mail->Port       = 587;
$mail->SMTPDebug  = 3;
$mail->Debugoutput = 'html';
$mail->SMTPAuth   = true;

$mail->Username   = "delhibasefc@gmail.com";
$mail->Password   = "khanaachahai";
$name = '';
$mail->SetFrom('me.delhibasefc@gmail.com', $name);
$mail->AddReplyTo('no-reply@mycomp.com','no-reply');
$mail->Subject    = 'subject';
$mail->MsgHTML($body);

$mail->AddAddress('delhibasefc@gmail.com', 'Order');
//$mail->AddAddress('a@', 'title2'); /* ... */
$fileName = '';
$mail->AddAttachment($fileName);
$mail->send();
	
	
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
				<a href="index.php"><h2>DELHI BASE</h2><h6>Sri Food Court</h6></a>
			 </div>
			<div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
		 </div>  
	 </div>
	 <div  align="center"><img src = "order.jpg" ></div>
	
	 
	 
</body>
</html>