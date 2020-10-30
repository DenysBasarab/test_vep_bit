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
    <title>Редактирование</title> <!-- Задаем заголовок документа -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css"> <!-- Подключаем внешнюю таблицу стилей -->
    <link rel="stylesheet" href="assets/framework/bootstrap-4.4.1/css/bootstrap.min.css">

</head>
<body>

<form action="vendor/update.php" method="post" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-12">
            <h1>Edit profile</h1>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputEmail4">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail4" value="<?= $_SESSION['user']['email'] ?>">
        </div>
        <div class="form-group col-md-12">
            <label for="inputPassword4">Old password</label>
            <input type="password" name="old_password" class="form-control" id="inputPassword4">
        </div>
        <div class="form-group col-md-12">
            <label for="inputPassword4">New password</label>
            <input type="password" name="new_password" class="form-control" id="inputPassword4">
        </div>
        <div class="form-group col-md-12">
            <label for="inputPassword4">Confirm password</label>
            <input type="password" name="new_password_confirm" class="form-control" id="inputPassword4">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" name="address" class="form-control" id="inputAddress" value="<?= $_SESSION['user']['address'] ?>">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Address 2</label>
        <input type="text" name="address_2" class="form-control" id="inputAddress2" value="<?= $_SESSION['user']['address_2'] ?>">
    </div>
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="inputCity">City</label>
            <input type="text" name="city" class="form-control" id="inputCity" value="<?= $_SESSION['user']['city'] ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" name="state" class="form-control">
                <option selected><?= $_SESSION['user']['state'] ?></option>
                <?php
                if($_SESSION['user']['state'] == 'Dnipro'){
                    echo '<option>Kiev</option><option>Odessa</option>';
                }
                if($_SESSION['user']['state'] == 'Odessa'){
                    echo '<option>Dnipro</option><option>Kiev</option>';
                }
                if($_SESSION['user']['state'] == 'Kiev'){
                    echo '<option>Odessa</option><option>Dnipro</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputZip">Zip</label>
            <input type="text" name="zip" class="form-control" id="inputZip" value="<?= $_SESSION['user']['zip'] ?>">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
    <p class="mt-2">
        Don't you have edit profile? - <a href='/profile.php'>Profile</a>
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
