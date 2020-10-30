<?php
session_start();
require_once 'connect.php';

$id = $_SESSION['user']['id'];
$email = $_POST['email'];
$old_password = htmlspecialchars($_POST['old_password'], ENT_QUOTES);
$password = htmlspecialchars($_POST['new_password'], ENT_QUOTES);
$password_confirm = htmlspecialchars($_POST['new_password_confirm'], ENT_QUOTES);
$address = htmlspecialchars($_POST['address'], ENT_QUOTES);
$address_2 = htmlspecialchars($_POST['address_2'], ENT_QUOTES);
$city = htmlspecialchars($_POST['city'], ENT_QUOTES);
$state = htmlspecialchars($_POST['state'], ENT_QUOTES);
$zip = htmlspecialchars($_POST['zip'], ENT_QUOTES);

if ($password === $password_confirm) {

    mysqli_set_charset($connect, 'utf8');
    $check_password = mysqli_query($connect, "SELECT password FROM `users` WHERE id='$id'");
    $bd_password = mysqli_fetch_assoc($check_password);
    $old_password = md5($_POST['old_password']);

    if ($bd_password['password'] == $old_password){

        $password = md5($_POST['new_password']);
        mysqli_set_charset($connect, 'utf8');
        mysqli_query($connect, "UPDATE `users` SET `email`='$email',`password`='$password',`address`='$address',`address_2`='$address_2',`city`='$city',`state`='$state',`zip`='$zip' WHERE id='$id'");

        $old_id = $_SESSION['user']['id'];
        $old_email = $_SESSION['user']['email'];
        $old1_password = $_SESSION['user']['password'];
        $old_address = htmlspecialchars($_SESSION['user']['address'], ENT_QUOTES);
        $old_address_2 = htmlspecialchars($_SESSION['user']['address_2'], ENT_QUOTES);
        $old_city = htmlspecialchars($_SESSION['user']['city'], ENT_QUOTES);
        $old_state = htmlspecialchars($_SESSION['user']['state'], ENT_QUOTES);
        $old_zip = htmlspecialchars($_SESSION['user']['zip'], ENT_QUOTES);

        $_SESSION['user'] = [
            "id" => $id,
            "email" => $_POST['email'],
            "password" => $password,
            "address" => htmlspecialchars($_POST['address'], ENT_QUOTES),
            "address_2" => htmlspecialchars($_POST['address_2'], ENT_QUOTES),
            "city" => htmlspecialchars($_POST['city'], ENT_QUOTES),
            "state" => htmlspecialchars($_POST['state'], ENT_QUOTES),
            "zip" => htmlspecialchars($_POST['zip'], ENT_QUOTES)
        ];

        $new_email = $_SESSION['user']['email'];
        $new1_password = $_SESSION['user']['password'];
        $new_address = htmlspecialchars($_SESSION['user']['address'], ENT_QUOTES);
        $new_address_2 = htmlspecialchars($_SESSION['user']['address_2'], ENT_QUOTES);
        $new_city = htmlspecialchars($_SESSION['user']['city'], ENT_QUOTES);
        $new_state = htmlspecialchars($_SESSION['user']['state'], ENT_QUOTES);
        $new_zip = htmlspecialchars($_SESSION['user']['zip'], ENT_QUOTES);

        mysqli_query($connect, "INSERT INTO `logs` (`time_edit`, `id`, `old_email`, `new_email`, `old_password`, `new_password`, `old_address`, `new_address`, `old_address_2`, `new_address_2`, `old_city`, `new_city`, `old_state`, `new_state`, `old_zip`, `new_zip`) VALUES (CURRENT_TIMESTAMP, '$old_id', '$old_email', '$new_email', '$old1_password', '$new1_password', '$old_address', '$new_address', '$old_address_2', '$new_address_2', '$old_city', '$new_city', '$old_state', '$new_state', '$old_zip', '$new_zip')");

        $_SESSION['message'] = 'Успешно!';
        header('Location: ../profile.php');
    }else{
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../profile.php');
    }
}else{
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../profile.php');
}