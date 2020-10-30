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

<form action="vendor/signup.php" method="post" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputEmail4">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Enter email">
        </div>
        <div class="form-group col-md-12">
            <label for="inputPassword4">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
        </div>
        <div class="form-group col-md-12">
            <label for="inputPassword4">Password Confirm</label>
            <input type="password" name="password_confirm" class="form-control" id="inputPassword4" placeholder="Password confirm">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Address 2</label>
        <input type="text" name="address_2" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
    </div>
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="inputCity">City</label>
            <input type="text" name="city" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" name="state" class="form-control">
                <option selected>Dnipro</option>
                <option>Kiev</option>
                <option>Odessa</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputZip">Zip</label>
            <input type="text" name="zip" class="form-control" id="inputZip">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Registration</button>
    <p class="mt-2">
        Do you have account? - <a href='/'>Authorization</a>
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
