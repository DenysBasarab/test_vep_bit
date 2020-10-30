<?php
session_start();
require_once 'connect.php';

$email = $_POST['email'];
$password = htmlspecialchars($_POST['password'], ENT_QUOTES);
$password_confirm = htmlspecialchars($_POST['password_confirm'], ENT_QUOTES);
$address = htmlspecialchars($_POST['address'], ENT_QUOTES);
$address_2 = htmlspecialchars($_POST['address_2'], ENT_QUOTES);
$city = htmlspecialchars($_POST['city'], ENT_QUOTES);
$state = htmlspecialchars($_POST['state'], ENT_QUOTES);
$zip = htmlspecialchars($_POST['zip'], ENT_QUOTES);

if ($password === $password_confirm) {

	$password = md5($password);
    mysqli_set_charset($connect, 'utf8');
	mysqli_query($connect, "INSERT INTO `users` (`id`, `email`, `password`, `address`, `address_2`, `city`, `state`, `zip`) 
VALUES (NULL, '$email', '$password', '$address', '$address_2', '$city', '$state', '$zip')");
	$_SESSION['message'] = 'Регистрация прошла успешно';
	header('Location: ../index.php');
	
} else {
	$_SESSION['message'] = 'Пароли не совпадают';
	header('Location: ../register.php');
}
