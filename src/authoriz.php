<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'connection.php';//подключаем скрипт
$link = mysqli_connect($host,$user,$password,$database)
	or die("Ошибка ".mysqli_error($link));
	mysqli_set_charset($link, "utf8");

$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);//фильтрация введенных данных
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

$pass = md5($pass."hjadsjh4aw2yu");//хешируем пароль

//с какими полями работаем,id -автоинкремент
$result= $link->query("SELECT * FROM `worker` WHERE `login`='$login' AND `pass` = '$pass'");
$user=$result->fetch_assoc();//полученные из запроса данные конвертируем в массив
//проверка на наличие пользователя в бд
if (count ((array)$user) == 0){
  echo "Не удалось найти пользователя";
  exit();
}

setcookie('user',$user['name'], time()+3600,"/");//храним введенные данные в куки в течении часа

$link->close();
header('Location:interface.php');
exit();	

?>