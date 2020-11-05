<?php

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';
$nickname = $_POST['user_name'];

$email = $_POST['user_email'];

if (strlen($nickname) < 3 || !filter_var($email, FILTER_VALIDATE_EMAIL))
    echo "Правильно оформите обязательные поля";
else {
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.mail.ru'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'crazban1@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
    $mail->Password = 'noso4k99'; // Ваш пароль от почты с которой будут отправляться письма
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

    $mail->setFrom('crazban1@mail.ru'); // от кого будет уходить письмо?
    $mail->addAddress('crazban1@mail.ru'); // Кому будет уходить письмо
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Заявка с тестового сайта';
    //$mail->Body = '' . 'user nickname: ' . $nickname . '<br>User email: ' . $email;


    $mail->Body .=
        "<html>
<h1>serer</h1>
<script src='https://quickchart.io/chart'></script>
<img src='https://quickchart.io/chart?c={type:'bar',data:{labels:[2012,2013,2014,2015,2016],datasets:[{label:'Users',data:[120,60,50,180,120]}]}}' />
</html>";









    $mail->AltBody = '';
    try {
        $mail->send();
        header('location: thank-you.html');
    } catch (phpmailerException $e) {
    }
}

?>