<?php
	include_once('./config.php');
	// $check = 1;
//order = [];
                        // echo "<p>".$_COOKIE['order']."</p>";
                        // $order = $_COOKIE['order'].split("", string)
  //                    $order = explode("|", $_COOKIE['order']);
                        // print_r($order);
    //                  $total = 0;
                        //echo "Order Id: ".$order[0],"<br>";
		//		$list = '';
          //            for ($i=1; $i < sizeof($order); $i+=3) { 
            //              $list.= $order[$i]."  x".$order[$i+1]."  Rs.".$order[$i+2]. "<br>";
              //            $total += $order[$i+2];
                //      }
                        //echo "<br>Your Total: Rs.".$total,"/-<br><br>";
	$nameError ="";
	$emailError ="";
	$addressError ="";
	$phoneError ="";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["number"]) || empty($_POST["address"])) {
		$nameError = "All field is required";
	} else {
		session_start();
			mysql_connect(HOST,DB_USER) or die(mysql_error());
			mysql_select_db('checkout');
			$email_id = mysql_real_escape_string($_POST['email']);
			$ph_id = mysql_real_escape_string($_POST['number']);
			$fname = mysql_real_escape_string($_POST['name']);
			//$add = mysql_real_escape_string($_POST['address']);
			$query_result = mysql_query("INSERT INTO `check` (fullname,phone,email) VALUES ('$fname','$ph_id','$email_id')") or die(mysql_error());
			if ($query_result) {
				$_SESSION['email'] = $email_id;
				$_SESSION['name'] = $fname;
				header('Location: checklogin.php');
				# code...
			}
	//$fname = mysql_real_escape_string($_POST['name']);
// check name only contains letters and whitespace
		
	}
		/*if (empty($_POST["email"])) {
		$emailError = "Email is required";
		} else {
		test_input();
		$email_id = mysql_real_escape_string($_POST['email']);
		// check if e-mail address syntax is valid or not
		}
		if (empty($_POST["number"])) {
		$phoneError = "Number is required";
		} else {
		$ph_id = mysql_real_escape_string($_POST['number']);
		// check address syntax is valid or not(this regular expression also allows dashes in the URL)
		}
		if (empty($_POST["address"])) {
		$addressError = "Address is required";
		} else {
		$address = test_input($_POST["address"]);
		}*/
	}
	//if(isset($_POST['email'])) {
			//header('Location: i.php');
	/*function test_function(){
			session_start();
			mysql_connect(HOST,DB_USER) or die(mysql_error());
			mysql_select_db('checkout');
			$email_id = mysql_real_escape_string($_POST['email']);
			$ph_id = mysql_real_escape_string($_POST['number']);
			$fname = mysql_real_escape_string($_POST['name']);
			//$add = mysql_real_escape_string($_POST['address']);
			$query_result = mysql_query("INSERT INTO `check` (fullname,phone,email) VALUES ('$fname','$ph_id','$email_id')") or die(mysql_error());
			if ($query_result) {
				$_SESSION['email'] = $email_id;
				$_SESSION['name'] = $fname;
				header('Location: checklogin.php');
				# code...
			} 
			}/* else {
				$error = 1;
			}
			 else {
		$_SESSION['temp_email'] = "";
		$error = 0;
	}*/
 ?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Midnite Hunger</title>
    <link href="css/stylenew.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Luxury Furnish Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
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
    <div class="header1">
        <div class="container">
            <div class="header-top1">
                <div class="logo1">
                    <a href="index.php"><h2>DELHI BASE</h2><h6>Sri Food Court</h6></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <!-- <center> -->
           

            <!-- <i class="fa fa-inr fa-2x"></i> -->
            <div class="customer-details pull-left">
                <div class="register">
                    <a href="menu.html"> &lt; <b>Back to menu</b></a>
                    <br>
                    <br>
                    <p>Check out as a guest</p>
                    
                    <section class="col-md-9">
					<!--form method="POST" action="check1()"-->
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="register-top-grid">
                            <div>
                                <span>Name<label>*</label></span>
                                <input type="text" name="name" autofocus value=>
                                <!--span class="error"><?php echo $nameError;?></span-->
                            </div>
                            <div>
                                <span>Mobile Number<label>*</label></span>
                                <input type="text" name="number">
                                <!--span class="error"><?php echo $phoneError;?></span-->
                            </div>
                            <div>
                                <span>Email Address<label>*</label></span>
                                <input type="text" name="email">
                                <!--span class="error"><?php echo $emailError;?></span-->
                            </div>
                            <div><span>
				<div  class="addres">
						<span>Address<label>*</label></span>
						<!--span class="error"><?php echo $addressError;?></span-->
                            </div>
                            </span>
                        </div>
                        <textarea name="address" rows="4" cols="35"></textarea>
                        <br>
                        <span class="error"><?php echo $nameError;?></span>
                        <input type="radio" selected>
                        <label>Cash on Delivery</label>
                        <br>
                        <input type="radio" disabled>
                        <label>Online Payement(Coming Soon..)</label>
                        <br>
                        <br>
                        <!--?php if ($error == 1) {
						echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Please check if you have entered same password in both the fields</div>';
						} 
					 ?-->
                    		<input class="btn btn-primary" name="Place Order" type="submit" value="submit">
                    </form>
                    </section>

                    <section class="col-md-3">	
                        <!-- n fdhnfg -->
                        <div class="sidebar Orderlist" id="Orderlist">
                            <!-- hidden-xs hidden-sm -->
                            <div class="text-center shopping-cart   sh-cart" style="width:350px;">
                                <div class="cart-header"><b>Your Order</b></div>
                                <section class="cart">
                                    <div class="cart-heading">
                                        <h1><b>Cart</b></h1>
                                    </div>
                                    <div class="cart-items">
                                    <?php
                        			$order = [];
                        			// echo "<p>".$_COOKIE['order']."</p>";
                      				  // $order = $_COOKIE['order'].split("", string)
                      				 $order = explode("|", $_COOKIE['order']);
                        			// print_r($order);
                        			$total = 0;
                        			echo "Order Id: ".$order[0],"<br>";
                        			for ($i=1; $i < sizeof($order); $i+=3) { 
                            		echo $order[$i]."  x".$order[$i+1]."  Rs.".$order[$i+2], "<br>";
                            			$total += $order[$i+2];
                        			}
									$total +=10;
									//echo "Delivery Charges: Rs.10/-"
                        			echo "<br>Your Total: Rs.".$total,"/-<br><br>";
                    				?>
                                    </div><br>
									<div  class="cart-total">
									<p>Delivery Charges : Rs.10/-</p><br><br><br>
									</div>
                                    <div  class="cart-total">
                                        <p>Total: &nbsp;</p>
                                        <p  id="value"></p>
                                    </div>
                                </section>
                    </section>
                    	

                    </div>
                </div>
                <!-- </center> -->
            </div>
        </div>
    </div>
    </div>
</body>
</html>
