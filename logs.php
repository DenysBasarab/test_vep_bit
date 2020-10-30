<?php
session_start();
require_once 'vendor/connect.php';
if(!$_SESSION['user']){
    header('Location: index.php');
}
?>
<!DOCTYPE html> <!-- Объявление формата документа -->
<html lang="en">
<head> <!-- Техническая информация о документе -->
    <meta charset="UTF-8"> <!-- Определяем кодировку символов документа -->
    <title>Logs</title> <!-- Задаем заголовок документа -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/framework/bootstrap-4.4.1/css/bootstrap.min.css">
</head>
<body> <!-- Основная часть документа -->

<div class="containerDiv">

    <div class="rowDivHeader">
        <div class="cellDivHeader">Time edit</div>
        <div class="cellDivHeader">Id</div>
        <div class="cellDivHeader">old_Email</div>
        <div class="cellDivHeader">new_Email</div>
        <div class="cellDivHeader">old_Password</div>
        <div class="cellDivHeader">new_Password</div>
        <div class="cellDivHeader">old_Address</div>
        <div class="cellDivHeader">new_Address</div>
        <div class="cellDivHeader">old_Address_2</div>
        <div class="cellDivHeader">new_Address_2</div>
        <div class="cellDivHeader">old_City</div>
        <div class="cellDivHeader">new_City</div>
        <div class="cellDivHeader">old_State</div>
        <div class="cellDivHeader">new_State</div>
        <div class="cellDivHeader">old_Zip</div>
        <div class="cellDivHeader lastCell">new_Zip</div>
    </div>

    <?php
            mysqli_set_charset($connect, 'utf8');
            $logs = mysqli_query($connect, "SELECT * FROM `logs`");

            if (mysqli_num_rows($logs) > 0) {

                for($i = 1; $i <= mysqli_num_rows($logs); $i++){

                    mysqli_set_charset($connect, 'utf8');
                    $log = mysqli_query($connect, "SELECT * FROM `logs`");
                    $log = mysqli_fetch_assoc($logs);

                    $time_edit = $log['time_edit'];
                    $id = $log['id'];
                    $old_email = $log['old_email'];
                    $new_email = $log['new_email'];
                    $old_password = $log['old_password'];
                    $new_password = $log['new_password'];
                    $old_address = $log['old_address'];
                    $new_address = $log['new_address'];
                    $old_address_2 = $log['old_address_2'];
                    $new_address_2 = $log['new_address_2'];
                    $old_city = $log['old_city'];
                    $new_city = $log['new_city'];
                    $old_state = $log['old_state'];
                    $new_state = $log['new_state'];
                    $old_zip = $log['old_zip'];
                    $new_zip = $log['new_zip'];

                    echo '<div class="rowDiv">';
                    echo '<div class="cellDiv">'.$time_edit.'</div>';
                    echo '<div class="cellDiv">'.$id.'</div>';
                    echo '<div class="cellDiv">'.$old_email.'</div>';
                    echo '<div class="cellDiv">'.$new_email.'</div>';
                    echo '<div class="cellDiv">'.$old_password.'</div>';
                    echo '<div class="cellDiv">'.$new_password.'</div>';
                    echo '<div class="cellDiv">'.$old_address.'</div>';
                    echo '<div class="cellDiv">'.$new_address.'</div>';
                    echo '<div class="cellDiv">'.$old_address_2.'</div>';
                    echo '<div class="cellDiv">'.$new_address_2.'</div>';
                    echo '<div class="cellDiv">'.$old_city.'</div>';
                    echo '<div class="cellDiv">'.$new_city.'</div>';
                    echo '<div class="cellDiv">'.$old_state.'</div>';
                    echo '<div class="cellDiv">'.$new_state.'</div>';
                    echo '<div class="cellDiv">'.$old_zip.'</div>';
                    echo '<div class="cellDiv lastCell">'.$new_zip.'</div>';
                    echo '</div>';
                }

            }
     ?>
    <a href='/profile.php' class="btn btn-primary btn-lg btn-block">Profile</a>
</div>

</body>
</html>
