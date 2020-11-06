<?php

$nickname = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
$canvasTest = $_POST[''];

$email = $_POST['email'];
if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {

   header('location: index.html');

}
else
    header('location: test.html');
?>

