<!DOCTYPE html>
<html lang="ru">
<head>
<title>Просмотр данных</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="shortcut icon" href="../img/ico.png" type="image/png"> 
</head>
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

$link = mysqli_connect($host,$user,$password,$database)//подгружаем данные
or die("Ошибка ".mysqli_error($link));
mysqli_set_charset($link, "utf8");
$query = "SELECT * FROM books";//создаем переменную,в нее записываем запрос

$result = mysqli_query($link,$query) or die ("Ошибка ".mysqli_error($link));//создаем переменную,в нее загружаем результат запроса



if ($result)// если результат не нулевой
{
	$rows = mysqli_num_rows($result); //получаем кол-во полученных строк из таблицы

echo "<table class='table table-hover'><tr><th>Id</th><th>Книга</th><th>Автор</th><th>Жанр</th><th>Издательство</th><th>Год издания</th><th>Читатель</th><th>Дата возврата</th></tr>";//название колонок
	for ($i = 0;$i < $rows;++$i) //делаем цикл для вывода данных
	{
		$row = mysqli_fetch_row($result);// извлекаем отдельную строку в переменную
		echo "</tr>";
			for($j=0; $j<8; ++$j) //выводим данные по каждой из трех ячеек таблицы
			{
				echo "<td>$row[$j]</td>";
			}
		echo"</tr>";
	}
	echo "</table>";
	
	mysqli_free_result($result);//очищаем результат
}
mysqli_close($link);

?>


</form>
<form action = "interface.php" method "GET">
<br><input type="submit" value = "Назад" style="margin-left: 10px">
</form>
<?php endif;?>
</body>
</html>