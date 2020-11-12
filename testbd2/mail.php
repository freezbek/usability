<?php

$a= $_GET['a'];
$b= $_GET['b'];
$c= $_GET['c'];
$k= $_GET['k'];

$nickname = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
$canvasTest = $_POST[''];

$login = $_POST['login'];
$password = $_POST['password'];
$login_answer = 'zabezopasnost';
$password_answer = '9:^~&mm2!cVxUQ,[TX';
if ($login != $login_answer || $password != $password_answer) {
    header('location: index.html');

}
else

    header('location: rezalts_for_admin.html');
 	 //echo($k);

?>

