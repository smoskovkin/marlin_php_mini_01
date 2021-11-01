<?php

session_start();

include 'functions.php';

$email    = $_POST['email'];
$password = $_POST['password'];

$user = get_user_by_email($email);

if (isset($user)) {
    set_flash_message('error', '<strong>Уведомление!</strong> Этот эл. адрес уже занят другим пользователем');
    redirect_to('page_register.php');
}

add_user($email, $password);

login($email, $password);

set_flash_message('success', 'Регистрация успешна');

redirect_to('page_login.php');




