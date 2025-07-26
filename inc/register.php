<?php

$name = htmlspecialchars(trim($_POST['name']),ENT_QUOTES);
$email = $_POST['email'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $error='Invalid email address.';
    require_once 'index.php';
    exit;
}
if(empty($email)){
    $error = 'Please enter your email address.';
    require 'index.php';
    exit;
}
if(empty($pass1) || empty($pass2)){
    $error='Please enter and confirm your password.';
    require_once 'index.php';
    exit;
}
if ($pass1 != $pass2) {
    $error = 'Passwords do not match.';
    require_once 'index.php';
    exit;
}
if(strlen($pass1)<=3){
    $error='Password must be at least 3 characters.';
    require_once 'index.php';
    exit;
}
require_once 'db.php';
$check = mysqli_query($con, "SELECT * FROM `users` WHERE `email` = '$email'");
if ($check) {
    if (mysqli_num_rows($check) > 0) {
        $error = 'Email is already registered.';
        require_once 'index.php';
        exit;
    }
}
