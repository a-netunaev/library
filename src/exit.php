<?php


setcookie('user',$user['name'], time()- 3600,"/");//храним введенные данные в куки в течении часа
header('Location:index.php');




?>