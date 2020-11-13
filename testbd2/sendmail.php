<?php
include 'questions.php';
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');
require_once ('jpgraph/src/jpgraph_bar.php');
require_once ('jpgraph/src/jpgraph_radar.php');
//setlocale(LC_ALL, 'ru_RU.CP1251', 'rus_RUS.CP1251', 'Russian_Russia.1251');
//$counter = 0;
//if ($_POST['counter'] != null && $_POST['counter'] != 0)
//    $counter = $_POST['counter'];

$questionDB = $question;
//if ($counter == 0) {

//переменные для графиков
//Первая методика
$chaptet_1_1_y=$_POST['chaptet_1_1_y'];$chaptet_1_2_y=$_POST['chaptet_1_2_y'];
//Вторая методика
 $_undefined=$_POST['_undefined']; $imposed=$_POST['imposed']; $moratorium=$_POST['moratorium']; $formed=$_POST['formed'];

//Третья методика
$kindness=$_POST['kindness']; $consciousness=$_POST['consciousness']; $openness=$_POST['openness']; $neuroticism=$_POST['neuroticism']; $extroversion=$_POST['extroversion'];

//Четвёртая методика
$self_professional=$_POST['self_professional']; $communicate=$_POST['communicate']; $pragmatical=$_POST['pragmatical']; $status=$_POST['status']; $socia=$_POST['social']; $educational=$_POST['educational']; $external=$_POST['external'];

//Пятая методика
$professional=$_POST['professional']; $financial=$_POST['financial']; $family=$_POST['family']; $sociall=$_POST['sociall']; $publicc=$_POST['publicc']; $spiritual=$_POST['spiritual']; $physical=$_POST['physical']; $intellectual=$_POST['intellectual'];



//-Данные пользователя
$nickname = $_POST['nickname'];
$subject = $_POST['subject'];
$school = $_POST['school'];
$email = $_POST['email'];
$perem_for_BD = $_POST['answer_for_BD'];

$date_d = $_POST['Day'];
$date_F = $_POST['Month'];

     $color = array();
    for ($i=0; $i <=99 ; $i++) { 
        $color[$i]="white";
        //echo $i."эллемент=".$color[$i].'<br>';
    }
    //echo "-------------------------------------.'<br>'";
    for ($i=0; $i <=9 ; $i++) {
   // echo $i.'<br>'; 
        if ($chaptet_1_1_y[$i] == "1") {

            for ($j=0; $j <=9 ; $j++) { 
            if ($chaptet_1_1_y[$j]=="1") {
                if ($i==0) {
                 $color[$j]="lime";
                }
                else
                {
                $sum="$i"+"$j";
                $color[$i.$j]="lime";
        //echo $i.$j."сумма=".$sum.'<br>';
        //echo $i.$j."эллемент=". $color[$i.$j].'<br>';
                }
            }
        }
        }
    }


$trimemail = str_replace(array('@','.'),'_', $email);// получение email с замененными точками и @


if (!filter_var($email, FILTER_VALIDATE_EMAIL))

    echo "Введите правильно данные";
else {


    //echo "Тест отправлен на обработку";
//} else {


// Параметры для подключения
    $db_host = "localhost";
    $db_user = "cb16725_zabez"; // Логин БД
    $db_password = "9:^~&mm2!cVxUQ,[TX"; // Пароль БД
    $db_base = 'cb16725_zabez'; // Имя БД
    $db_table = "results"; // Имя Таблицы БД

/*
careerpotentialtesting.ru
IP:    92.53.123.166
Хост:    vh316.timeweb.ru
Логин:    cb16725
пароль: v6Mkgv3L0diY
Freezbe07.11.2020
https://vh316.timeweb.ru/pma/?
БД
cb16725_zabez
9:^~&mm2!cVxUQ,[TX
*/
// Подключение к базе данных
    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_base);

// Верификация
    $email_test = $email;

// select a user with the posted username
$sql = "SELECT email FROM results WHERE email = '$email_test' LIMIT 1";

// run the query
$res = mysqli_query($mysqli,$sql) or die(mysqli_error());

// see if there's a result
if (mysqli_num_rows($res) > 0) {
  echo 'This email is already taken';
} else {
  // .. do stuff



// Если есть ошибка соединения, выводим её и убиваем подключение
    if ($mysqli->connect_error) {
        //die('Ошибка : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        //echo "Ошибка";
    } else {
        //echo "БД подключена" . '<br>';
    }

//first insert to create primary key //
    $result = $mysqli->query("INSERT INTO " . $db_table . " (name,surname,city,email) VALUES ('$nickname','$subject','$school','$email')");
    if ($result == true) {
        //echo "Информация занесена в базу данных 1.0" . '<br>';
    } else {
        //echo $question[1] . '<br>';
        //echo $perem_for_BD . '<br>';
        // echo $all_answers . '<br>';
        //echo $email . '<br>';
        //echo "Информация не занесена в базу данных 1.0" . '<br>';
    }

    $all_answers = ""; //store all answers from test
    $all_answers = $perem_for_BD;
//$primaryKey = ;   //name+surname+patronymic+school+email?

    //$numberOfQuestions = 117; //117
    for ($i = 1; $i <= 101; $i++) {

        $test_q = $questionDB[$i];
        $iterFromAnswers = $i - 1; // max iterFromAnswers will be 116 due to it starts from 0  (0,1,2,3,4,....116)
        $result_1 = $mysqli->query("UPDATE $db_table SET $test_q ='" . $all_answers[$iterFromAnswers] . "' WHERE email='" . $email . "'");

        if ($result_1 == true) {
            /*
            echo "Информация занесена в базу данных";
            echo $question[1] . '<br>';
            echo $perem_for_BD . '<br>';
            echo $all_answers . '<br>';
            echo $email . '<br>';
            */
           // echo "Информация занесена в базу данных(first cycle)" . '<br>';
        } else {
            /*
            echo $question[1] . '<br>';
            echo $perem_for_BD . '<br>';
            echo $all_answers . '<br>';
            echo $email . '<br>';
            */
            //echo "=========ERROR=========" . '<br>' . "Информация не занесена в базу данных(first cycle)" . '<br>';
        }
    }


    for ($j = 102; $j <= 117; $j++) {

        $test_q5 = $questionDB[$j];
        $iterFromAnswers = $j - 1;
        //$all_answers[$iterFromAnswers] += 1; //in order to have answers from 1 to 10
        $number_DB = intval($all_answers[$iterFromAnswers])+1;
        //echo all_answers[$iterFromAnswers]." хуй";
        $result_2 = $mysqli->query("UPDATE $db_table SET $test_q5 ='" . $number_DB . "' WHERE email='" . $email . "'");


        if ($result_1 == true) {
           // echo "Информация занесена в базу данных(second cycle)" . '<br>';
        } else {
            //echo "=========ERROR=========" . '<br>' . "Информация не занесена в базу данных(second cycle)" . '<br>';
        }

    }



    //-------------------------------------------------------------------------------




//2 методика

    $datay=array($_undefined, $imposed, $moratorium, $formed);
// Create the graph. These two calls are always required
    $graph = new Graph(1000,1000);
    $graph->SetScale('textlin');
// Add a drop shadow
    $graph->SetShadow();
// Adjust the margin a bit to make more room for titles
    $graph->SetMargin(40,30,20,40);
// Create a bar pot
    $bplot = new BarPlot($datay);
// Adjust fill color
    $bplot->SetFillColor('orange');
    $graph->Add($bplot);
// Setup the titles
    //$graph->title->Set('Metodic 2');
    $graph->xaxis->SetTickLabels(array("Неопределённая","Навязанная","Мораторий","Сформированная"));
    //$graph->xaxis->SetTickLabels(array("Unallocated","Imposed","Moratorium","Formed"));
    $graph->title->SetFont(FF_FONT1,FS_BOLD);
    $graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
    $graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
// Display the graph
    $path= "images/"."method_2_".$trimemail.".png";
    $graph->Stroke($path);



 //=====================================



    //3 методика
    $datay=array($kindness ,$consciousness, $openness, $neuroticism, $extroversion);
    $graph = new Graph(1000,1000);
    $graph->SetScale('textlin');
// Add a drop shadow
    $graph->SetShadow();
// Adjust the margin a bit to make more room for titles
    $graph->SetMargin(40,30,20,40);
// Create a bar pot
    $bplot = new BarPlot($datay);
// Adjust fill color
    $bplot->SetFillColor('orange');
    $graph->Add($bplot);
// Setup the titles
    //$graph->title->Set('Metodic 3');
    $graph->xaxis->SetTickLabels(array("Доброжелательность","Сознательность","Открытость","Нейротизм","Экстраверсия"));
    //$graph->xaxis->SetTickLabels(array("Goodwill","Consciousness","Openness","Neuroticism","Extraversion"));
    $graph->title->SetFont(FF_FONT1,FS_BOLD);
    $graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
    $graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
    $path= "images/"."method_3_".$trimemail.".png";
// Display the graph
    $graph->Stroke($path);








//===============================================================
    //4 методика


    $datay=array($self_professional, $communicate, $pragmatical, $status, $socia, $educational, $external);
    $graph = new Graph(1000,1000);
    $graph->SetScale('textlin');
// Add a drop shadow
    $graph->SetShadow();
// Adjust the margin a bit to make more room for titles
    $graph->SetMargin(40,30,20,40);
// Create a bar pot
    $bplot = new BarPlot($datay);
// Adjust fill color
    $bplot->SetFillColor('orange');
    $graph->Add($bplot);
// Setup the titles
    //$graph->title->Set('Metodic 4');
    //$graph->xaxis->SetTickLabels(array("Professional","Communicative","Pragmatic","Status","Social","Training","External"));    
    $graph->xaxis->SetTickLabels(array("Профессиональная","Коммуникативная","Прагматичная","Статусная","Социальная","Учебная","Внешняя"));

    $graph->title->SetFont(FF_FONT1,FS_BOLD);
    $graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
    $graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
    $path= "images/"."method_4_".$trimemail.".png";
// Display the graph
    $graph->Stroke($path);
//==========================================================================
    //5 методика

$datay=array($professional, $financial, $family, $sociall, $publicc, $spiritual, $physical, $intellectual);
        $radar = new RadarGraph(1000,1000);
$radar->SetScale('lin',0,50);
$radar->yscale->ticks->Set(25,5);
$radar->SetColor('white');
$radar->SetShadow();

$radar->SetCenter(0.5,0.55);

$radar->axis->SetFont(FF_FONT1,FS_BOLD);
$radar->axis->SetWeight(2);

// Uncomment the following lines to also show grid lines.
$radar->grid->SetLineStyle('dashed');
$radar->grid->SetColor('navy@0.5');
$radar->grid->Show();
/*
$graph = new PieGraph(500,400,'auto');
$graph->title->SetFont(FF_VERDANA,FS_BOLD,16);

jpg-config.inc:

DEFINE('LANGUAGE_CYRILLIC',true);
DEFINE('DEFAULT_GFORMAT','auto');
возможно еще придеться указать путь к шрифтам (мне не понадобилось)
DEFINE('TTF_DIR',$_SERVER['SystemRoot'].'/fonts/');
*/

$radar->ShowMinorTickMarks();
//$radar->title->Set('Metodic 5');
$radar->title->SetFont(FF_FONT1,FS_BOLD);
//$radar->SetTitles(array("Профессиональные","Финансовые","Семейные","Социальные","Общественные","Духовные","Физические","Интеллектуальные"));
$radar->SetTitles(array("Professional","Financial","Family","Social","Public","Spiritual","Physical","Intellectual"));
$plot = new RadarPlot($datay);
$plot->SetLegend('Goal');
$plot->SetColor('red','lightred');
$plot->SetFillColor('lightblue');
$plot->SetLineWeight(2);

$radar->Add($plot);
$path= "images/"."method_5_".$trimemail.".png";
$radar->Stroke($path);


/*
    $datay  =array($professional, $financial, $family, $sociall, $publicc, $spiritual, $physical, $intellectual);


        
// Create the basic rtadar graph
    $graph5 = new RadarGraph(500,500);

// Set background color and shadow
    $graph5->SetColor("white");
    $graph5->SetShadow();

// Position the graph
    $graph5->SetCenter(0.4,0.55);

// Setup the axis formatting
    $graph5->axis->SetFont(FF_FONT1,FS_BOLD);
    $graph5->axis->SetWeight(2);

// Setup the grid lines
    $graph5->grid->SetLineStyle("longdashed");
    $graph5->grid->SetColor("navy");
    $graph5->grid->Show();
    $graph5->HideTickMarks();

// Setup graph titles
    $graph5->title->Set(iconv('windows-1251','UTF-8','5. Методика'));
    $graph5->title->SetFont(FF_FONT1,FS_BOLD);
    $graph5->yaxis->title->SetFont(FF_FONT1, FS_BOLD);
    $graph5->xaxis->title->SetFont(FF_FONT1, FS_BOLD);
    $graph5->SetTitles(array("Профессиональные","Финансовые","Семейные","Социальные","Общественные","Духовные","Физичекие","Интеллектуальные"));
// Create the first radar plot
   // $professional=$_POST['professional']; $financial=$_POST['financial']; $family=$_POST['family']; $sociall=$_POST['sociall']; $publicc=$_POST['publicc']; $spiritual=$_POST['spiritual']; $physical=$_POST['physical']; $intellectual=$_POST['intellectual'];
    $plot5 = new RadarPlot($datay);
    $plot5->SetLegend("Goal");
    $plot5->SetColor("red","lightred");
    $plot5->SetFill(false);
    $plot5->SetLineWeight(2);
// Add the plots to the graph
    $graph5->Add($plot5);
// And output the graph
    $path= "images/"."method_5_".$trimemail.".png";
    $graph5->Stroke($path) ;
*/


//================================================
require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';


if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    echo "Правильно оформите обязательные поля";
else {
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.mail.ru'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'careerpotentialtesting@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
    $mail->Password = 'bA5i_2hhZpOA'; // Ваш пароль от почты с которой будут отправляться письма
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

    $mail->setFrom('careerpotentialtesting@mail.ru'); // от кого будет уходить письмо?
    $mail->addAddress($email); // Кому будет уходить письмо
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Онлайн тестирование "Карьерный потенциал"';
    //$mail->Body = '' . 'user nickname: ' . $nickname . '<br>User email: ' . $email;


    $mail->AddEmbeddedImage('images/method_2_'.$trimemail.'.png','method_2_');
    $mail->AddEmbeddedImage('images/method_3_'.$trimemail.'.png','method_3_');
    $mail->AddEmbeddedImage('images/method_4_'.$trimemail.'.png','method_4_');
    $mail->AddEmbeddedImage('images/method_5_'.$trimemail.'.png','method_5_');
    /*
    $mail->AddEmbeddedImage('images/method_3_'.$trimemail,'method_3_');
    $mail->AddEmbeddedImage('images/method_4_'.$trimemail,'method_4_');
    $mail->AddEmbeddedImage('images/method_5_'.$trimemail,'method_5_');
    */
    $mail->Body =
        '
    <h1 style="text-align: center;">«Карьерный потенциал»</h1>

    <h2>Результаты тестирования</h2>

    <p>
    Дата тестирования <u>«'.$date_d.'» '.$date_F.' 2020 год</u><br>
    ФИО: <u>'.$nickname.' '.$subject.'</u><br>
    Электронная почта: <u>'.$email.'</u><br>
    Перед вами результаты тестирования «Карьерный потенциал» <br>
    Тестирование проводилось по 5 методикам, которые были разработаны и апробированы авторами ведущих
    профориентационных программ для подростков.<br><br>
    По каждому показателю вы сможете найти свой результат и его расшифровку или краткое пояснение.<br><br>
    Когда вы ознакомитесь с результатами, у вас могут появятся вопросы. Для того, чтобы все стало четко и понятно,
    приглашаем вас на индивидуальную онлайн-консультацию, в ходе которой можно обсудить и уточнить результаты
    теста, получить рекомендации, как можно учесть результаты тестирования в своей личной образовательной и
    профессиональной траектории<br><br>
    Для записи на индивидуальную онлайн-консультацию Вам необходимо отправить заявку на электронную почту info@zabezopasnost.com<br>
    В письме - заявке необходимо указать тему «Онлайн-консультация по диагностике «Карьерный потенциал», Ваше имя, телефон и предпочтительное время консультации. Также необходимо прикрепить файл с результатами диагностики.<br>
    Если у Вас возникли вопросы, звоните или пишите на WhatsApp по телефону: +7 (985) 998 49 81.<br><br>
    </p>

    <p>
    <center><strong><h3>1. Методика «Матрица выбора профессии»</h3></strong></center><br><br>
    Данная методика разработана Московским областным центром профориентации молодежи. Автор методики
    Г.В. Резапкина. Работа с данной методикой поможет Вам уточнить свой выбор, узнать будущую профессию, увидеть
    новые варианты.
    <b><i>     Сферы труда, выбранная Вами:</i></b><br><br>
    Человек (дети и взрослые, ученики и студенты, клиенты и пациенты, покупатели и пассажиры, зрители и
    читатели, сотрудники и т.д.);<br><br>
    Искусство (литература, музыка, театр, кино, балет, живопись и т.д.).<br><br>
    <b><i>     Виды труда, выбранные Вами:</i></b><br><br>
    Образование (воспитание, обучение, формирование личности);<br><br>
    Творчество (создание оригинальных произведений искусства)<br><br>
    <b>Анализ</b> производится с помощью нижеследующей таблицы («Матрица выбора профессии»). Профессии, находящиеся
    на пересечении «сферы труда» и «вида труда», являются (предположительно) наиболее близкими Вашим интересам и
    склонностям.<br><br>
    <center><strong><h3>Матрица выбора профессии</h3></strong></center><br><br>

   <style>    
table {
font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
font-size: 12px;
border-collapse: collapse;
text-align: center;
}
th, td:first-child {
background: #AFCDE7;
color: white;
padding: 10px 20px;
}
th, td {
border-style: solid;
border-width: 0 1px 1px 0;
border-color: black;
}
td {
background: #b0c4de;
}
th:first-child, td:first-child {
text-align: left;
}
 </style>

<center>
<table id="table">
<tr class="x_0">
        <td style="background-color:;">Виды труда</td>
        <td style="background-color:;">Человек</td>
        <td style="background-color:;">Информация</td>
        <td style="background-color:;">Финансы</td>
        <td style="background-color:;">Техника</td>
        <td style="background-color:;">Искусство</td>
        <td style="background-color:;">Животные</td>
        <td style="background-color:;">Растения</td>
        <td style="background-color:;">Продукты</td>
        <td style="background-color:;">Изделия</td>
        <td style="background-color:;">Природные ресурсы</td>
    </tr>
    <tr class="x_1">
        <td style="background-color:;">Управление (руководство чьей-то деятель-ностью)</td>
        <td style="background-color:'.$color[0].';">Менеджер по персоналу Администратор</td>
        <td style="background-color:'.$color[1].';">Маркетолог Диспетчер Статистик</td>
        <td style="background-color:'.$color[2].';">Экономист Аудитор Аналитик</td>
        <td style="background-color:'.$color[3].';">Технолог Авиадиспетчер Инженер</td>
        <td style="background-color:'.$color[4].';">Режиссер Продюсер Дирижер</td>
        <td style="background-color:'.$color[5].';">Кинолог Зоотехник Генный инженер</td>
        <td style="background-color:'.$color[6].';">Агроном Фермер Селекционер</td>
        <td style="background-color:'.$color[7].';">Товаровед Менеджер по продажам</td>
        <td style="background-color:'.$color[8].';">Менеджер по продажам Логистик Товаровед</td>
        <td style="background-color:'.$color[9].';">Энергетик Инженер по кадастру</td>
    </tr>
    <tr class="x_2">
        <td style="background-color:;">Обслуживание (удовлетво-рение чьих-то потребностей)</td>
        <td style="background-color:'.$color[10].';">Продавец Парикмахер Официант</td>
        <td style="background-color:'.$color[11].';">Переводчик Экскурсовод Библиотекарь</td>
        <td style="background-color:'.$color[12].';">Бухгалтер Кассир Инкассатор</td>
        <td style="background-color:'.$color[13].';">Водитель Слесарь Теле-радио-мастер</td>
        <td style="background-color:'.$color[14].';">Гример Костюмер Парик-махер</td>
        <td style="background-color:'.$color[15].';">Животновод Птицевод Скотовод</td>
        <td style="background-color:'.$color[16].';">Овощевод Полевод Садовод</td>
        <td style="background-color:'.$color[17].';">Экспедитор Упаковщик Продавец</td>
        <td style="background-color:'.$color[18].';">Продавец Упаковщик Экспедитор</td>
        <td style="background-color:'.$color[19].';">Егерь Лесник Мелиоратор</td>
    </tr>
    <tr class="x_3">
        <td style="background-color:;">Образование (воспитание и обучение, формирование личности)</td>
        <td style="background-color:'.$color[20].';">Учитель Воспитатель Социальный педагог</td>
        <td style="background-color:'.$color[21].';">Преподаватель Ведущий теле- и радио программ</td>
        <td style="background-color:'.$color[22].';">Консультант Препода-ватель экономики</td>
        <td style="background-color:'.$color[23].';">Мастер производ-ственного обучения</td>
        <td style="background-color:'.$color[24].';">Хореограф Препода-ватель музыки, живописи</td>
        <td style="background-color:'.$color[25].';">Дрессировщик Кинолог Жокей</td>
        <td style="background-color:'.$color[26].';">Преподаватель биологии Эколог</td>
        <td style="background-color:'.$color[27].';">Мастер производ-ственного обучения</td>
        <td style="background-color:'.$color[28].';">Мастер производ-ственного обучения</td>
        <td style="background-color:'.$color[29].';">Преподаватель Эколог</td>
    </tr>
    <tr class="x_4">
        <td style="background-color:;">Оздоровление (избавление от болезней и их преду преждение)</td>
        <td style="background-color:'.$color[30].';">Врач Медсестра Тренер</td>
        <td style="background-color:'.$color[31].';">Рентгенолог Врач (компьютерная диагностика)</td>
        <td style="background-color:'.$color[32].';">Антикризисный управляющий Страховой агент</td>
        <td style="background-color:'.$color[33].';">Мастер авто сервиса Физиотерапевт</td>
        <td style="background-color:'.$color[34].';">Пластический хирург Косметолог Реставратор</td>
        <td style="background-color:'.$color[35].';">Ветеринар Лаборант питомника Зоопсихолог</td>
        <td style="background-color:'.$color[36].';">Фитотерапевт Гомеопат Травник</td>
        <td style="background-color:'.$color[37].';">Диетолог Косметолог Санитарный инспектор</td>
        <td style="background-color:'.$color[38].';">Фармацевт Ортопед Протезист</td>
        <td style="background-color:'.$color[39].';">Бальнеолог Эпидемиолог Лаборант</td>
    </tr>
    <tr class="x_5">
        <td style="background-color:;">Творчество (создание оригинальных произведений искусства)</td>
        <td style="background-color:'.$color[40].';">Режиссер Артист Музыкант</td>
        <td style="background-color:'.$color[41].';">Программист Редактор Web-дизайнер</td>
        <td style="background-color:'.$color[42].';">Менеджер по проектам Продюсер</td>
        <td style="background-color:'.$color[43].';">Коструктор Дизайнер Художник</td>
        <td style="background-color:'.$color[44].';">Художник Писатель Композитор</td>
        <td style="background-color:'.$color[45].';">Дрессировщик Служитель цирка</td>
        <td style="background-color:'.$color[46].';">Фитодизайнер Озеле-нитель Флорист</td>
        <td style="background-color:'.$color[47].';">Кондитер Повар Кулинар</td>
        <td style="background-color:'.$color[48].';">Резчик по дереву Витражист Скульптор</td>
        <td style="background-color:'.$color[49].';">Архитектор Мастерцветово Декоратор</td>
    </tr>
    <tr class="x_6">
        <td style="background-color:;">Производство (изготовление продукции)</td>
        <td style="background-color:'.$color[50].';">Мастер производственного обучения</td>
        <td style="background-color:'.$color[51].';">Корректор Журналист Полиграфист</td>
        <td style="background-color:'.$color[52].';">Экономист Бухгалтер Кассир</td>
        <td style="background-color:'.$color[53].';">Станочник Аппаратчик Машинист</td>
        <td style="background-color:'.$color[54].';">Ювелир График Керамист</td>
        <td style="background-color:'.$color[55].';">Животновод Птицевод Рыбовод</td>
        <td style="background-color:'.$color[56].';">Овощевод Цветовод Садовод</td>
        <td style="background-color:'.$color[57].';">Технолог Калькулятор Повар</td>
        <td style="background-color:'.$color[58].';">Швея Кузнец Столяр</td>
        <td style="background-color:'.$color[59].';">Шахтер Нефтяник Техник</td>
    </tr>
    <tr class="x_7">
        <td style="background-color:;">Констру-ирование (проекти-рование деталей и объектов)</td>
        <td style="background-color:'.$color[60].';">Стилист Пластический хирург</td>
        <td style="background-color:'.$color[61].';">Картограф Программист Web-мастер</td>
        <td style="background-color:'.$color[62].';">Плановик Менеджер по проектам</td>
        <td style="background-color:'.$color[63].';">Инженер-конструктор Телемастер</td>
        <td style="background-color:'.$color[64].';">Архитектор Дизайнер Режиссер</td>
        <td style="background-color:'.$color[65].';">Генный инженер Виварщик Селекционер</td>
        <td style="background-color:'.$color[66].';">Селекционер Ландшафтист Флорист</td>
        <td style="background-color:'.$color[67].';">Инженер-технолог Кулинар</td>
        <td style="background-color:'.$color[68].';">Модельер Закройщик Обувщик</td>
        <td style="background-color:'.$color[69].';">Дизайнер ландшафта Инженер</td>
    </tr>
    <tr class="x_8">
        <td style="background-color:;">Исследование (научное изучение чего-либо или кого-либо)</td>
        <td style="background-color:'.$color[70].';">Психолог Следователь Лаборант</td>
        <td style="background-color:'.$color[71].';">Социолог Математик Аналитик</td>
        <td style="background-color:'.$color[72].';">Аудитор Экономист Аналитик</td>
        <td style="background-color:'.$color[73].';">Испытатель (техники) Хроно-метражист</td>
        <td style="background-color:'.$color[74].';">Искус-ствовед Критик Журналист</td>
        <td style="background-color:'.$color[75].';">Зоопсихолог Орнитолог Ихтиолог</td>
        <td style="background-color:'.$color[76].';">Биолог Ботаник Микро-биолог</td>
        <td style="background-color:'.$color[77].';">Лаборант Дегустатор Санитарный врач</td>
        <td style="background-color:'.$color[78].';">Эргономик Контролер Лаборант</td>
        <td style="background-color:'.$color[79].';">Биолог Метеоролог Агроном</td>
    </tr>
    <tr class="x_9">
        <td style="background-color:;">Защита (охрана от враждебных действий)</td>
        <td style="background-color:'.$color[80].';">Милиционер Военный Адвокат</td>
        <td style="background-color:'.$color[81].';">Арбитр Юрист Патентовед</td>
        <td style="background-color:'.$color[82].';">Инкассатор Охранник Страховой агент</td>
        <td style="background-color:'.$color[83].';">Пожарный Сапер Инженер</td>
        <td style="background-color:'.$color[84].';">Постановщик трюков Каскадер</td>
        <td style="background-color:'.$color[85].';">Егерь Лесничий Инспектор рыбнадзора</td>
        <td style="background-color:'.$color[86].';">Эколог Микро-биолог Миколог</td>
        <td style="background-color:'.$color[87].';">Санитарный врач Лаборант Микро-биолог</td>
        <td style="background-color:'.$color[88].';">Сторож Инспектор</td>
        <td style="background-color:'.$color[89].';">Охрана ресурсов Инженер по ТБ</td>
    </tr>
    <tr class="x_10">
        <td style="background-color:;">Контроль (проверка и наблюдение)</td>
        <td style="background-color:'.$color[90].';">Тамо-женник Прокурор Табельщик</td>
        <td style="background-color:'.$color[91].';">Корректор Системный программист</td>
        <td style="background-color:'.$color[92].';">Ревизор Налоговый полицей-ский</td>
        <td style="background-color:'.$color[93].';">Техник-контролер Обходчик ЖД</td>
        <td style="background-color:'.$color[94].';">Выпускающий редактор Консультант</td>
        <td style="background-color:'.$color[95].';">Консультант Эксперт по экстерьеру</td>
        <td style="background-color:'.$color[96].';">Селекционер Агроном Лаборант</td>
        <td style="background-color:'.$color[97].';">Дегустатор лаборант Санитарный врач</td>
        <td style="background-color:'.$color[98].';">Оценщик Контролер ОТК Приемщик</td>
        <td style="background-color:'.$color[99].';">Радиолог Почвовед Эксперт</td>
    </tr>   
</table>
</center>
</p>

    <p>
    <center><strong><h3>2. Методика изучения статусов профессиональной идентичности (А.А. Абзель)</h3></strong></center><br><br>
    Профессиональная принадлежность – одна из самых значимых характеристик любого человека. Представление о
    себе как о носителе определенной профессии – неотъемлемый компонент представлений большинства взрослых людей о
    самих себе. И чем более любима работа, тем более слиты эти представления, со временем человек уже не мыслит себя
    вне связи со своей профессией. И если он по каким-то причинам не может продолжать заниматься своим любимым делом (безработица, болезни, выход на пенсию), это превращается для него в настоящую жизненную трагедию.
    Профессиональное самоопределение не сводится к одномоментному выбору, оно начинается задолго до самого события,
    продолжается и после него, по мере дальнейшего обучения и освоения профессии. Сложность выбора состоит еще в том,
    что предпочесть одну профессию – значит отказаться от многих других. Можно выделить четыре статуса
    профессиональной идентичности – «ступеньки», на которых человек находится в процессе профессионального
    самоопределения: неопределенная профессиональная идентичность, навязанная профессиональная идентичность,
    мораторий (кризис выбора) профессиональной идентичности, сформированная профессиональная идентичность.<br><br>
    <i>Тестирование показало следующий характер Вашей профессиональной идентичности в настоящий период:</i><br><br>
    <center>Статус профессиональной идентичности</center><br>
    <center><img src= "cid:method_2_" /></center><br>
    Чем выше сумма баллов, набранная по каждому из статусов, тем в большей степени суждения о нем применимы
    к Вам.<br>
    <b><i>Неопределенное состояние профессиональной идентичности</i></b><br>
    Состояние характерно для обучающихся, которые не имеют прочных профессиональных целей и планов и при
    этом не пытаются их сформировать, выстроить варианты своего профессионального развития.<br>
    0-4 Слабо выраженный статус<br>
    5-9 Выраженность ниже среднего уровня<br>
    10-14 Средняя степень выраженности<br>
    15-19 Выраженность выше среднего уровня<br>
    20 баллов и выше Сильно выраженный статус<br><br>
    <b><i>Сформированная профессиональная идентичность</i></b><br>
    На данном этапе Вы готовы совершить осознанный выбор дальнейшего профессионального развития или уже
    его совершили. У Вас присутствует уверенность в правильности принятого решения о своём профессиональном
    будущем. Скорее всего Вы самостоятельно сформировали систему знаний о себе и о своих профессиональных
    ценностях, целях и жизненных убеждениях. Вы можете осознанно выстраивать свою жизнь, потому что определились,
    чего хотите достигнуть.<br>
    0-3 Слабо выраженный статус<br>
    4-7 Выраженность ниже среднего уровня<br>
    8-11 Средняя степень выраженности<br>
    12-15 Выраженность выше среднего уровня<br>
    16 баллов и выше Сильно выраженный статус<br><br>
    <b><i>Мораторий (кризис выбора)</i></b><br>
    Такое состояние характерно для человека, исследующего альтернативные варианты профессионального
    развития и активно пытающегося выйти из этого состояния, приняв осмысленное решение в отношении своего
    будущего. Скорее всего Вы сейчас размышляете о возможных вариантах профессионального развития, примеряете на
    себя различные профессиональные роли, стремитесь как можно больше узнать о разных специальностях и путях их
    получения. На этой стадии нередко складываются неустойчивые отношения с родителями и друзьями: полное
    взаимопонимание может быстро сменяться непониманием, и наоборот. Как правило, большая часть людей после
    «кризиса выбора» переходят к состоянию сформированной идентичности, реже к навязанной идентичности<br>
    0-2 Слабо выраженный статус<br>
    3-5 Выраженность ниже среднего уровня<br>
    6-8 Средняя степень выраженности<br>
    9-11 Выраженность выше среднего уровня<br>
    12 баллов и выше Сильно выраженный статус<br><br>
    <b><i>Навязанная профессиональная идентичность</i></b><br>
    Это состояние характерно для человека, который выбрал свой профессиональный путь, но сделал это не путем
    самостоятельных размышлений, а прислушавшись к мнению авторитетов: родителей или друзей. На какое-то время
    это, как правило, обеспечивает комфортное состояние, позволяя избежать переживаний по поводу собственного
    будущего. Но нет никакой гарантии, что выбранная таким путем профессия будет отвечать интересам и способностям
    самого человека. Вполне возможно, что в дальнейшей жизни это приведет к разочарованию в сделанном выборе.<br>
    0-4 Слабо выраженный статус<br>
    5-9 Выраженность ниже среднего уровня<br>
    10-14 Средняя степень выраженности<br>
    15-19 Выраженность выше среднего уровня<br>
    20 баллов и выше Сильно выраженный статус<br>
    </p>

    <p><center><strong><h3>3. Методика «Большая пятерка личностных качеств» (А.Г. Грецов)</h3></strong></center><br><br>
    В современной психологии выделяют пять главных характеристик личности. Они были выявлены на основе
    обобщения результатов множества исследований. Это так называемая «большая пятерка» личностных качеств:<br><br>
    <b><i>Экстраверсия – интроверсия.</i></b> Это направленность личности на внешний либо на внутренний мир. В первом случае
    человек общительный, оптимистичный, активный, любящий повеселиться, более продуктивно выполняющий свою
    работу в компании, чем в одиночестве. Во втором – сдержанный, трезво мыслящий, отчужденный, ориентированный не
    на общение, а на дело. Такому человеку сложнее в коллективе, он индивидуалист. Такие люди находят себя в
    деятельности, не требующей интенсивного общения. Чем выше показатель, тем ярче выражена экстраверсия.<br><br>
    <b><i>Нейротизм – эмоциональная устойчивость (повышенная эмоциональность реакций).</i></b> Это показатель
    эмоциональной стабильности. Устойчивые люди проявляют спокойствие и уверенность, не склонны к бурному
    излиянию чувств. У них повышенная стрессоустойчивость, они продуктивно работают в напряженных ситуациях. Те же,
    кому свойствен высокий нейротизм, бурно реагируют на любые жизненные события, эмоциональны, менее устойчивы к
    стрессу. Но в то же время — это люди более чуткие, отзывчивые, динамичные. Высокие баллы свидетельствуют о
    нейротизме.<br><br>
    <b><i>Открытость – закрытость к новому опыту.</i></b> В первом случае, человек легко воспринимает все то новое, что
    появляется вокруг, демонстрирует любопытство, гибкость и готовность к изменениям, обычно склонен к творчеству. Но
    это может оборачиваться некоторой «поверхностностью», неустойчивостью убеждений и интересов. Во втором случае
    человек настороженно относится ко всему новому и неожиданному, предпочитает стабильность, тяжело меняет свои
    принципы и убеждения. Ему тяжело ориентироваться в неожиданных ситуациях, он любит стабильность и стремится
    обеспечить ее в своей жизни. Высокие баллы свидетельствуют об открытости к новому опыту.<br><br>
    <b><i>Сознательность – несобранность.</i></b> Люди, проявляющие сознательность, характеризуются как усердные, пунктуальные,
    целеустремленные, надежные, честолюбивые и настойчивые. Но иногда это оборачивается неоправданным упрямством,
    желанием всех и все контролировать, а также мучительным переживанием вины из-за своих реальных или мнимых
    ошибок. Противоположный полюс – беспечность, небрежность, слабоволие, лень и любовь к наслаждениям. Но в то же
    время такие люди более расслабленные, жизнерадостные, приятные в общении, легко переносящие проблемы и
    неприятности. Чем выше показатель, тем ярче выражена сознательность.<br><br>
    <b><i>Доброжелательность – враждебность.</i></b> В первом случае человек доброжелателен, доверчив, готов к бескорыстной
    помощи. Такие качества помогают располагать к себе окружающих, хотя иногда окружающие начинают злоупотреблять
    бескорыстностью такого человека. Во втором случае человек насторожен, недоверчив, склонен воспринимать
    окружающих как конкурентов. Не дает злоупотреблять своим доверием, нередко отталкивает от себя окружающих,
    своими бесконечными подозрениями. Высокие показатели свидетельствуют о преобладании доброжелательности.<br><br>
    <i>Критерии выраженности показателей:<br><br>
    0 – 3 – низкий уровень выраженности;<br><br>
    4 – 6 – ниже среднего;<br><br>
    7 – 9 – средний уровень выраженности;<br><br>
    10 – 12 – выше среднего;<br><br>
    13 – 16 – высокий уровень выраженности;<br><br>
    На графике представлены Ваши показатели<br><br>
    </i>
    <center>Характеристики личности</center><br>
    <center><img src= "cid:method_3_" /></center><br>
    </p>

    <p>
    <center><strong><h3>4. Методика «Мотивация выбора профессии» (Л.А.Ясюкова)</h3></strong></center><br><br>
    Выделяются и анализируются 7 типов мотивации выбора профессии:<br>
    1-собственно профессиональная мотивация (интерес к будущей деятельности);<br>
    2-коммуникативная мотивация (потребность в общении);<br>
    3-прагматичная мотивация (стремление к материальной обеспеченности);<br>
    4-статусная мотивация (забота о престиже);<br>
    5- социальная мотивация (важность мнения значимых людей);<br>
    6-учебная мотивация (познавательные потребности);<br>
    7-внешняя мотивация (случайные причины).<br>
    Если мотивация получает 8-9 баллов, то она является абсолютно доминирующей. Оценка в 7 баллов обозначает
    относительно доминирующую, но не ярко выраженную мотивацию. Если какой-то тип мотивации получает 3-4 балла, то
    он совершенно Вам не свойственен.<br><br>
    <i>На графике представлены Ваши показатели</i><br><br>
    <center>Типы мотивации выбора профессии</center><br>
    <center><img src= "cid:method_4_" /></center><br><br>
    <b>Профессиональная мотивация</b> возникает только тогда, когда уже сложились интеллектуальные задатки к
    какому-либо виду профессиональной деятельности. Ее наличие может свидетельствовать о том, что идет формирование
    профессиональных способностей. При доминировании профессиональной мотивации подросток проявляет
    избирательность в учебе: интересующие его предметы изучает глубоко, с использованием дополнительной информации,
    «непрофильные» - более поверхностно, может запускать совсем.<br>
    Если доминируют любые другие типы мотивации при выборе профессии, то вероятность формирования
    высококвалифицированного специалиста исключительно низка. Если к окончанию школы не сложились интеллектуальные задатки ни к какому виду профессиональной деятельности, то и доминирует один из остальных шести
    типов мотивации.<br>
    Доминирование при выборе профессии <b>коммуникативных потребностей</b> складывается тогда, когда они не
    находят удовлетворения в повседневной жизни подростка. Потребность в общении свойственна в той или иной степени
    всем людям, но когда она начинает доминировать и в профессиональной сфере, то налицо ее гипертрофированность.<br>
    При доминировании <b>прагматичной мотивации</b> при выборе профессии подросток, в первую очередь, учитывает
    наличие материальных выгод от будущей деятельности. Он считает: не так важно, что именно делать, главное - сколько
    денег за это можно будет получать.<br>
    При доминировании <b>статусной мотивации</b> для подростков при выборе профессии особое значение имеет ее
    социальная ценность, престижность в глазах общества, возможность достичь высокого положения, быть на виду.<br>
    При доминировании <b>социальной мотивации</b> подросток при выборе профессии ориентируется, в первую
    очередь, на мнение авторитетных для него людей (родителей, учителей, друзей, психолога). Либо его профессиональный
    выбор предопределяется семейными традициями. В любом случае подросток сам не выбирает, а принимает то, что ему
    предлагают знающие люди.<br>
    При доминировании <b>учебной (познавательной) мотивации</b> подросток выбирает профессию, ориентируясь не на
    то, что ему придется изо дня в день делать, а на то, о чем ему интересно в настоящее время.<br>
    При доминировании <b>внешней мотивации</b> основную роль играют несущественные, случайные факторы (близко
    от дома, за компанию с друзьями и пр.). Чаще такой вариант выбора встречается тогда, когда у подростка не развились и
    не проявились никакие профессиональные способности, т.е. различные интеллектуальные операции развиты равномерно
    средне, при этом какие-либо увлечения тоже отсутствуют.<br><br>
    </p>

    <p>
    <center><strong><h3>5. Экспресс-диагностика социальных ценностей личности</h3></strong></center><br><br>
    Методика способствует выявлению личных, профессиональных и социально-психологических ориентаций и
    предпочтений и может быть полезна как при выборе характера работы, так и при оценке своих жизненных приоритетов,
    и, возможно, для дальнейшей работы над собой.<br>
    Чем выше итоговое количество баллов в обозначенном секторе, тем большую ценность представляет для Вас
    соответствующий ориентир.<br><br>
    <center>Социальные ценности личности</center><br>
    <center><img src= "cid:method_5_" /></center><br><br>
    </p>';



    try {
        $mail->send();
        
    } catch (phpmailerException $e) {
    }
}



}

}


?>
<!DOCTYPE html>
<html style="margin: 0; padding: 0;">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.2.0, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>test</title>
  

</head>
<style type="text/css">
    body{
    color: white;
    style=padding: 0; 
    margin: 0; 
    background-image: url(assets/mobirise/css/images/18-layers.png);
    }
    h1{
    font-family: 'Jost', sans-serif;
    font-size: 3.6rem;
    line-height: 1.1;
    position:absolute;
    width:100%;
    top:30%;
    text-align:center;
    }
    h2{
    position:absolute;
    width:100%;
    top:45%;
    text-align:center;
    }
    h3{
    position:absolute;
    width:100%;
    top:50%;
    text-align:center;    
    }
</style>
<body >
<section class="content15 cid-sfaPXLHJL3 " id="content15-y" >
    <div class="container" style="height:550px;">
        <p></p>
        <center><h1 class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-1" ><strong>Спасибо за прохождение тестирования</strong></h1></center>
        <center><h2 class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-1" ><strong>Результаты тестирования придут на вашу почту в течении трёх дней.</strong></h2></center>
        <h3>По всем вопросам обращаться по электронному адресу - <u>info@zabezopasnost.com</u><br>
            либо по телефону - <u>+7985-998-49-81</u></h3>
    </div> 
</section>
        <div>
    </div>
    <section style=" font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;"><p> <a href="https://mobirise.site" ></a></p></section>
    <script src="assets/web/assets/jquery/jquery.min.js"></script>  
    <script src="assets/popper/popper.min.js"></script>  
    <script src="assets/tether/tether.min.js"></script>  
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>  
    <script src="assets/smoothscroll/smooth-scroll.js"></script>  
    <script src="assets/dropdown/js/nav-dropdown.js"></script>  
    <script src="assets/dropdown/js/navbar-dropdown.js"></script> 
    <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>  
    <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>  
    <script src="assets/theme/js/script.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

  </body>
</html>
