<?php

session_start();

include 'functions.php';


$email    = $_POST['email'];
$password = $_POST['password'];
$status   = $_POST['status'];
$avatar   = $_POST['avatar'];


$user = $_SESSION['user'];

$user_logged = is_logged($user);

$user_admin = is_admin($user);

if ( ! ($user_logged and $user_admin)) {
    redirect_to('page_login.php');
}

$new_user = get_user_by_email($email);

if (!($new_user)) {
    add_user($email, $password);
}

//ну а дальше мелочи