<?php
session_start();
require_once 'connect.php';

$email = $_POST['email'];
$password = md5($_POST['password']);
mysqli_set_charset($connect, 'utf8');
$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");

if (mysqli_num_rows($check_user) > 0){
	
	$user = mysqli_fetch_assoc($check_user);
	$_SESSION['user'] = [
        "id" => $user['id'],
		"email" => $user['email'],
        "password" => $user['password'],
        "address" => $user['address'],
        "address_2" => $user['address_2'],
        "city" => $user['city'],
        "state" => $user['state'],
        "zip" => $user['zip']
	];
	header('Location: ../profile.php');
	
} else {
	$_SESSION['message'] = 'Неверный пароль или логин';
		header('Location: ../index.php');
}
?>