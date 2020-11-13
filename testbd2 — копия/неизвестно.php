<?php




// Подключаем библиотеку
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');

// Пишем SQL-запрос к базе
// Структура базы может быть разной, поэтому заменю его тестовыми значениями
$ydata = array("2.5", "2.7", "2.8", "3.0");
$xdata = array("12:00", "12:05", "12:10", "12:15");

$graph = new Graph(450,200,"auto");
$graph->SetScale("textlin");
$graph->SetMarginColor('white');
$graph->SetFrame(true,'#B3BCCB', 1);
$graph->SetTickDensity(TICKD_DENSE);
$graph->img->SetMargin(50,20,20,60);
$graph->title->SetMargin(10);
$graph->xaxis->SetTickLabels($xdata);
$graph->xaxis->SetLabelAngle(90);
$graph->xaxis->SetPos('min');

// Обычно значений много, не менее 250 в сутки,
// поэтому нельзя выводить все значения из массива $xdata на шкалу X
// Это будет сильным нагромождением, поэтому я вывожу каждое 30-е значение.
$my_interval = ceil(1 / 30);
$graph->xaxis->SetTextTickInterval($my_interval);

$lineplot=new LinePlot($ydata);
$graph->Add($lineplot);

 $img= null;

 $graph->Stroke($img) ;




//================================================
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
    $mail->Username = 'toxa699@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
    $mail->Password = '55561999275556a'; // Ваш пароль от почты с которой будут отправляться письма
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

    $mail->setFrom('toxa699@mail.ru'); // от кого будет уходить письмо?
    $mail->addAddress('toxa699@mail.ru'); // Кому будет уходить письмо
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Заявка с тестового сайта';
    //$mail->Body = '' . 'user nickname: ' . $nickname . '<br>User email: ' . $email;



    require_once('showgraph.php');


    $mail->AddEmbeddedImage('images/mail.png', 'mail');
    $mail->Body = "<h1>Test 1 of PHPMailer html</h1><p>This is a test</p>";
    "<p>This is a test picture: <img src= "$img" /></p>";






    $mail->AltBody = '';
    try {
        $mail->send();
        header('location: thank-you.html');
    } catch (phpmailerException $e) {
    }
}

?>