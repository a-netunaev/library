<!DOCTYPE html>
<html lang="ru">
<head>
<title>Ввод данных</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css" > 
 <link rel="shortcut icon" href="../img/ico.png" type="image/png">
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="shortcut icon" href="../img/ico.png" type="image/png">
<link rel="stylesheet" href="css/style.css">
<body style="background-image: url(../img/bg.png);background-repeat: no-repeat; background-position: bottom; background-attachment: fixed;background-size:65% auto"">
<?php
   if($_COOKIE['user']==''):
   echo "Вы зашли как не авторизованный пользователь!";
   header('Location:index.php');
   exit();	
  ?>

<?php else: 
header('Content-Type: text/html; charset=utf-8');
require_once 'connection.php';//подключаем скрипт
$link = mysqli_connect($host,$user,$password,$database)
	or die("Ошибка ".mysqli_error($link));
	mysqli_set_charset($link, "utf8");
if (isset($_POST['title']) && isset($_POST['author'])&& isset($_POST['genre'])&& isset($_POST['publisher'])&& isset($_POST['year'])&& isset($_POST['chitatel'])&& isset($_POST['vozvrat']))
{
	//подкл к серверу
	$link = mysqli_connect($host,$user,$password,$database)
	or die("Ошибка ".mysqli_error($link));
	mysqli_set_charset($link, "utf8");
	//экранирование символов для mysql_affected_rows
	$title = htmlentities(mysqli_real_escape_string($link,$_POST['title']));
	$author = htmlentities(mysqli_real_escape_string($link,$_POST['author']));
	$genre = htmlentities(mysqli_real_escape_string($link,$_POST['genre']));
	$publisher = htmlentities(mysqli_real_escape_string($link,$_POST['publisher']));
	$year = htmlentities(mysqli_real_escape_string($link,$_POST['year']));
	$chitatel = htmlentities(mysqli_real_escape_string($link,$_POST['chitatel']));
	$vozvrat = htmlentities(mysqli_real_escape_string($link,$_POST['vozvrat']));
	//создаем строки запроса
	if($chitatel ==="")
	{
		$today = date('m-d-Y');
		$vozvrat = $today;
		$query = "INSERT INTO books VALUES(NULL,'$title','$author','$genre','$publisher','$year','В наличии',NOW() )";
		
		}
	else 
	{
		$query = "INSERT INTO books VALUES(NULL,'$title','$author','$genre','$publisher','$year','$chitatel','$vozvrat')";
	}
	
	//выполняем запроса
	$result = mysqli_query($link,$query) or die("Ошибка ".mysqli_error($link));
	if ($result)
	{
		echo "<span style = 'color:blue;'>Данные добавлены!</span>";
		
	}
	mysqli_close($link);
}
?>
<h2 style="margin-left: 10px">Добавить новую запись в библиотеку</h2>
<form method = "POST">
<p style="margin-left: 10px">Введите название книги:<br>
<input type = "text" name = "title" /></p>
<p style="margin-left: 10px">Введите фамилию и инициалы автора:<br>
<input type = "text" name = "author" /></p>
<p style="margin-left: 10px">Введите жанр книги:<br>
<input type = "text" name = "genre" /></p>
<p style="margin-left: 10px">Введите название издательства:<br>
<input type = "text" name = "publisher" /></p>
<p style="margin-left: 10px">Введите год издания книги:<br>
<input type = "text" name = "year" /></p>
<p style="margin-left: 10px">Введите фамилию и инициалы читателя:<br>
<input type = "text" name = "chitatel" /></p>
<p style="margin-left: 10px">Введите дату возврата книги:<br>
<input type = "date" name = "vozvrat" /></p>
<input type = "submit" value = "Добавить" style="margin-left: 10px">
</form>
<form action = "interface.php" method "GET">
<br><input type="submit" value = "Назад" style="margin-left: 10px">
</form>
<?php endif;?>
</body>
</html>