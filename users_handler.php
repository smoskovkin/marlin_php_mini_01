<?php


session_start();

include 'functions.php';


$user = $_SESSION['user'];

$user_logged = is_logged($user);

if ( ! ($user_logged)) {
    set_flash_message('error', 'Вы не авторизованы');
    redirect_to('page_login.php');
}


$user_admin = is_admin($user);

$users = get_all_users();

