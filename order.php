<?php
session_start();
$from = "noreply@gmail.com";
$to = "ankitcool583@gmail.com";
$body= "Email: ".$_SESSION['email']."Full name: ".$_SESSION['fname']."Phone: ".$_SESSION['phone'];
mail($to,$body,$from);

?>