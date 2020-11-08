<?php
include 'questions.php';

//$counter = 0;
//if ($_POST['counter'] != null && $_POST['counter'] != 0)
//    $counter = $_POST['counter'];

$questionDB = $question;
//if ($counter == 0) {
$nickname = $_POST['nickname'];
$subject = $_POST['subject'];
$school = $_POST['school'];
$email = $_POST['email'];
$perem_for_BD = $_POST['answer_for_BD'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    echo "Введите правильно данные";
else {


    echo "Тест отправлен на обработку";
//} else {


// Параметры для подключения
    $db_host = "localhost";
    $db_user = "root"; // Логин БД
    $db_password = "root"; // Пароль БД
    $db_base = 'redbull'; // Имя БД
    $db_table = "test"; // Имя Таблицы БД

// Подключение к базе данных
    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_base);

// Если есть ошибка соединения, выводим её и убиваем подключение
    if ($mysqli->connect_error) {
        die('Ошибка : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        echo "Ошибка";
    } else {
        echo "БД подключена".'<br>';
    }
$test_question="wewe";
$test_str = "nickname";
//first insert to create primary key //
    $result = $mysqli->query("INSERT INTO " . $db_table . " ($test_str,subject,school,email,$test_question) VALUES ('$nickname','$subject','$school','$email',0)");
if ($result == true) {
            echo "Информация занесена в базу данных 1.0".'<br>';
        } else {
            echo $question[1].'<br>' ;
            echo $perem_for_BD.'<br>' ;
            echo $all_answers.'<br>' ;
            echo $email.'<br>' ;
            echo "Информация не занесена в базу данных 1.0".'<br>';
        }

    $all_answers = ""; //store all answers from test
    $all_answers = $perem_for_BD;
    // echo $all_answers;
//$primaryKey = ;   //name+surname+patronymic+school+email?

    $numberOfQuestions = 2; //117
    for ($i = 1; $i <= $numberOfQuestions; $i++) {

        $test_q = $questionDB[$i];
        //$result_1 = $mysqli->query("INSERT INTO " . $db_table . " ($test_str,subject,school,email,$test_question) VALUES ('$nickname','$subject','$school','$email',0)");



        
        $iterFromAnswers = $i - 1; // max iterFromAnswers will be 116 due to it starts from 0  (0,1,2,3,4,....116)

        $result_1 = $mysqli->query("UPDATE $db_table SET $test_q ='" . $all_answers[$iterFromAnswers] . "' WHERE email='" . $email . "'");
        $query = "UPDATE uchet SET caunt='". $new . "' WHERE caunt='". $row[2]. "'";

       // $result_1 = $mysqli->query("UPDATE test SET nickname= '$all_answers[$iterFromAnswers]' WHERE email = $email");
        

        /*$result = $mysqli->query("UPDATE " . $db_table .
            " SET email =" . "'$all_answers[$iterFromAnswers]'"  . " WHERE email =" . $email); // email here is something like primary key*/


        

        if ($result_1 == true) {
            echo "Информация занесена в базу данных";
            echo $question[1].'<br>' ;
            echo $perem_for_BD.'<br>' ;
            echo $all_answers.'<br>' ;
            echo $email.'<br>' ;
            echo "Информация занесена в базу данных".'<br>';
        } else {
            echo $question[1].'<br>' ;
            echo $perem_for_BD.'<br>' ;
            echo $all_answers.'<br>' ;
            echo $email.'<br>' ;
            echo "Информация не занесена в базу данных".'<br>';
        }
    }

}
//}

?>