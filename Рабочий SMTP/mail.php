<?php

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';
$nickname = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];

if (strlen($nickname) < 3 || !filter_var($email, FILTER_VALIDATE_EMAIL))
    echo "Правильно оформите обязательные поля";
else {
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.mail.ru'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'toxa699@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
    $mail->Password = '55561999275556y'; // Ваш пароль от почты с которой будут отправляться письма
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

    $mail->setFrom('toxa699@mail.ru'); // от кого будет уходить письмо?
    $mail->addAddress('toxa699@mail.ru'); // Кому будет уходить письмо
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Заявка с тестового сайта';
    $mail->Body = '' . 'user nickname: ' . $nickname . '<br>User email: ' . $email;
    $mail->AltBody = '';
    try {
        $mail->send();
        header('location: thank-you.html');
    } catch (phpmailerException $e) {
    }
}

?>