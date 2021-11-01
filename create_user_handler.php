<?php

session_start();

include 'functions.php';


$email    = $_POST['email'];
$password = $_POST['password'];
$status   = $_POST['status'];
//$avatar   = $_POST['avatar'];


$user = $_SESSION['user'];

$user_logged = is_logged($user);

$user_admin = is_admin($user);

if ( ! ($user_logged and $user_admin)) {
    redirect_to('page_login.php');
}

$new_user = get_user_by_email($email);

if ($new_user) {
    set_flash_message('error', '<strong>Уведомление!</strong> Этот эл. адрес уже занят другим пользователем');
    redirect_to('create_user.php');
}

add_user($email, $password);

redirect_to('create_user.php');
