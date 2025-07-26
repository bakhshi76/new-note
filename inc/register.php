<?php
require_once 'loader.php';
$name=htmlspecialchars(trim($_POST['name']),ENT_QUOTES);
$email=$_POST['email'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   $error= "Invalid email address.";
   require_once 'index.php';
    exit;
}