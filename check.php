<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'connection.php';//подключаем скрипт
$link = mysqli_connect($host,$user,$password,$database)
	or die("Ошибка ".mysqli_error($link));
	mysqli_set_charset($link, "utf8");
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);//фильтрация введенных данных
$name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$surname = filter_var(trim($_POST['surname']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);


if(mb_strlen($login)<5 || mb_strlen($login)>90) //проверка на длину вводимы символов
{
	echo "Недопустимая длина логина!";
	exit();
}else if(mb_strlen($name)<1 || mb_strlen($name)>50)//имя
{
	echo "Недопустимая длина имени!";
	exit();
}
else if(mb_strlen($surname)<1 || mb_strlen($surname)>60)//фамилия
{
	echo "Недопустимая длина фамилии!";
	exit();
}
else if(mb_strlen($pass)<6 || mb_strlen($pass)>30)//пароль
{
	echo "Недопустимая длина пароля(от 6 до 30 символов)!";
	exit();
}
$pass = md5($pass."hjadsjh4aw2yu");//хешируем пароль


//с какими полями работаем,id -автоинкремент
$link->query("INSERT INTO `worker`(`login`,`pass`,`name`,`surname`) 
VALUES('$login','$pass','$name','$surname')");

$link->close();//закрытие соединения после выполнения запроса на ввод данных в таблицу worker
header('Location:index.php');
exit();	
?>