<?php

session_start();

include 'functions.php';

$email    = $_POST['email'];
$password = $_POST['password'];

$login = login($email, $password);

if ( ! $login) {
    set_flash_message('error', 'Не правильный логин или пароль');

    redirect_to('page_login.php');
}

redirect_to('users.php');

