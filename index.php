<?php
session_start();
if($_SESSION['user']){
	header('Location: profile.php');
}

?>
<!DOCTYPE html> <!-- Объявление формата документа -->
<html lang="en">
<head> <!-- Техническая информация о документе -->
	<meta charset="UTF-8"> <!-- Определяем кодировку символов документа -->
	<title>Авторизация</title> <!-- Задаем заголовок документа -->
	<link rel="stylesheet" type="text/css" href="assets/css/main.css"> <!-- Подключаем внешнюю таблицу стилей -->
    <link rel="stylesheet" href="assets/framework/bootstrap-4.4.1/css/bootstrap.min.css">
</head>
<body> <!-- Основная часть документа -->

<form action="vendor/signin.php" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Enter</button>
    <p class="mt-2">
        Don't you have account ? - <a href='/register.php'>Register now</a>
    </p>
    <?php
    if ($_SESSION['message']) {
        echo '<p class="msg"> ' .$_SESSION['message']. ' </p>';
    }
    unset($_SESSION['message']);
    ?>
</form>

</body>
</html>
