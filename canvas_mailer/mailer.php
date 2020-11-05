<?php
session_start();

if(!empty($_POST['email'])){

    //Here the session variables are converted back into standard variables.
    $name = $_POST['name'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $size = $_POST['size'];
    $colour = $_POST['colour'];
    $lid = $_POST['lid'];
    $quantity = $_POST['quantity'];

    $image = $_POST['image'];
    $_SESSION['finalImage'] = $image;

    $img = str_replace('data:image/png;base64,', '', $image);

    $subject = "Bottle Design Quote";
    $message = "Customer Name: $name<br/> Customer Email: $email<br/> Company Name: $company<br/> Bottle Size: $size<br/> Bottle Color: $colour<br/> Bottle Lid: $lid<br/> Quantity: $quantity<br/> Design: $image";
    $to = "crazban1@mail.ru";
    $headers = "From: \"$name\"<$email>\n";
    $headers .= "Reply-To: $email\n";
    $headers .= 'Content-Type: multipart/related; boundary="boundary-bottle"; type="text/html"';
    $headers .= "MIME-Version: 1.0\r\n";

    $body = "

--boundary-bottle
Content-Type: text/html; charset='US-ASCII'

Customer Name: $name<br/> Customer Email: $email<br/> Company Name: $company<br/> Bottle Size: $size<br/> Bottle Color: $colour<br/> Bottle Lid: $lid<br/> Quantity: $quantity<br/> Design:

<IMG SRC='cid:bottle-design' ALT='Bottle Design'>

--boundary-bottle
Content-Location: CID:somethingatelse ; this header is disregarded
Content-ID: <bottle-design>
Content-Type: IMAGE/PNG
Content-Transfer-Encoding: BASE64

$img

--boundary-bottle--";

    mail($to,$subject,$body,$headers);

    header('Location: ../success.php');

}
else
{
    header('Location: ../builder.php'); //We direct the user to the error page if a session does not exist - or if they have refreshed the page.
}
?>