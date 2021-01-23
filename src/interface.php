<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<link rel="shortcut icon" href="../img/ico.png" type="image/png">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Регистрация книг в библиотеке</title>



</head>

<body style="background-image: url(../img/bg.png);background-repeat: no-repeat; background-position: bottom; background-attachment: fixed;background-size:65% auto"">

  <div class="d-flex" id="wrapper">
   <?php
   if($_COOKIE['user']==''):
   echo "Вы зашли как не авторизованный пользователь!";
   header('Location:index.php');
   exit();	
   ?>
   <?php else: ?>
   <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
		<p>Вы зашли как: <?=$_COOKIE['user']?></p>
      <div class="sidebar-heading">Регистрация книг в библиотеке </div>
      <div class="list-group list-group-flush">
        <a href="input_date.php" class="list-group-item list-group-item-action bg-light">Ввод данных</a>
        <a href="show_table.php" class="list-group-item list-group-item-action bg-light">Просмотр данных</a>
        <a href="exit.php" class="list-group-item list-group-item-action bg-light">Выход</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

  

      <div class="container-fluid">
        <h1 class="mt-4">Библиотека</h1>
        <p>Библиотеки - хранилища памяти человечества, главный источник информации - от древних рукописей до электронных ресурсов. Как говорил Д. Лихачев, "библиотеки важнее всего в культуре… пока жива библиотека - жив народ, умрет она - умрет прошлое и будущее".</p>
        <p>Современная библиотека - учреждение, призванное собирать, хранить знания, а также предоставлять читателям и пользователям доступ к знаниям.</p>     
		<p>Электронная библиотека - распределенная информационная система, позволяющая надежно сохранять и эффективно использовать разнородные коллекции электронных документов через глобальные сети передачи данных в удобном для конечного пользователя виде.</p>	 
			 </div>
    </div>


  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   
   <?php endif;?>
    

 
  

</body>

</html>





