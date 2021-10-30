<?php

session_start();

include 'functions.php';

$email    = $_POST['email'];
$password = $_POST['password'];

//echo $email . ' ' . $password;

$login = login($email, $password);

if ( ! $login) {
    set_flash_message('error', 'Не правильный логин или пароль');

    redirect_to('page_login.php');
}

//echo $_SESSION['user']['id'];
//echo $_SESSION['user']['email'];
//echo $_SESSION['user']['password'];

redirect_to('users.php');

