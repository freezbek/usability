<?php




$email = $_POST['email'];
if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {

   header('location: index.html');

}
else
    header('location: test.html');
?>

