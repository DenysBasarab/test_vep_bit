<?php
session_start();
if(!$_SESSION['user']){
	header('Location: index.php');
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

<form>
    <div class="form-row">
        <div class="form-group col-md-8">
            <h1>Profile</h1>
        </div>
        <div class="form-group col-md-4">
            <a href="vendor/logout.php" class="btn btn-danger mt-2 btn-lg btn-block" type="submit">Exit</a>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-11">
            <label for="inputEmail4">Email</label>
            <p id="style_p"><?= $_SESSION['user']['email'] ?></p>
        </div>
        <div class="form-group col-md-1">
            <label for="inputEmail4">Id</label>
            <p id="style_p"><?= $_SESSION['user']['id'] ?></p>
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Password (MD5)</label>
        <p id="style_p"><?= $_SESSION['user']['password'] ?></p>
    </div>
    <div class="form-group">
        <label for="inputAddress">Address</label>
        <p id="style_p"><?= $_SESSION['user']['address'] ?></p>
    </div>
    <div class="form-group">
        <label for="inputAddress2">Address 2</label>
        <p id="style_p"><?= $_SESSION['user']['address_2'] ?></p>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <p id="style_p"><?= $_SESSION['user']['city'] ?></p>
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <p id="style_p"><?= $_SESSION['user']['state'] ?></p>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <p id="style_p"><?= $_SESSION['user']['zip'] ?></p>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <a href='/edit.php' class="btn btn-primary btn-lg btn-block">Edit</a>
        </div>
        <div class="form-group col-md-6">
            <a href='/logs.php' class="btn btn-warning btn-lg btn-block">Logs</a>
        </div>
    </div>
    <?php
    if ($_SESSION['message']) {
        echo '<p class="msg"> ' .$_SESSION['message']. ' </p>';
    }
    unset($_SESSION['message']);
    ?>
</form>

</body>
</html>
