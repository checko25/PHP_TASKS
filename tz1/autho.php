<?php
$_SESSION['count'] = 0;
    if (filter_var(trim($_GET['login']),FILTER_SANITIZE_STRING)) {
    $login = $_GET['login'];
        } else {
            echo("Некорректно введен логин");
        }
    if (filter_var(trim($_GET['email']),FILTER_VALIDATE_EMAIL)) {
        $email = $_GET['email'];
    } else {
        echo("Некорректно введен email");
        }
    if(!preg_match("/^((\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{10,10}$/", $_GET['number']) and
        !preg_match("/^((\+375)[\- ]?)?(\(?\d{2}\)?[\- ]?)?[\d\- ]{9,9}$/", $_GET['number']) and
        !preg_match("/^((\+380)[\- ]?)?(\(?\d{2}\)?[\- ]?)?[\d\- ]{9,9}$/", $_GET['number']))
        {
            echo("Телефон задан в неверном формате");
        } else {
             $phone = preg_replace('/\s|\+|-|\(|\)/','', $_GET['number']);
}
//if (isset($phone, $login, $mail)) {
    $mysql = new mysqli('localhost', 'root', '', 'users');
//} else {
  //  exit();
//}
//$mysql->query("INSERT INTO `maininfo`(`login`, `email`, `phone`) VALUES('$login', '$email', $phone)") or die ("Error1");
$result = $mysql->query("SELECT * FROM `maininfo` WHERE `login` = '$login' AND `phone` = '$phone'") or die ("Error2");
$user = $result->fetch_assoc();
if(($user) == 0){
    header('Location:http://localhost/tz1/error.php');
} else {
    header('Location:http://localhost/tz1/content.php');
}

$mysql->close();

