<?php


function db_query($sql_query)
{
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $name = 'merlin-mini';

    $link = mysqli_connect($host, $user, $pass, $name);
    mysqli_query($link, "SET NAMES 'utf8'");

    $result = mysqli_query($link, $sql_query) or die(mysqli_error($link));

    return $result;
}


function get_user_by_email($email)
{
    $sql_query = "SELECT id FROM users WHERE email = '$email'";
    $result    = db_query($sql_query);
    $row       = mysqli_fetch_assoc($result);

    return $row['id'];
}


function add_user($email, $password)
{
    $sql_query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

    db_query($sql_query);
}


function set_flash_message($name, $message)
{
    $_SESSION[$name] = $message;
}


function redirect_to($path)
{
    header("Location: $path");

    exit;
}


function login($email, $password)
{
    $sql_query = "SELECT id, email, password FROM users WHERE (email = '$email') AND (password = '$password')";
    $result    = db_query($sql_query);
    $row       = mysqli_fetch_assoc($result);

    if ( ! ($email == $row['email'] && $password == $row['password'])) {
        return false;
    }g

    $_SESSION['user']['id'] = $row['id'];
    $_SESSION['user']['email'] = $row['email'];
    $_SESSION['user']['password'] = $row['password'];
    // тут вот вопрос  - лучше сразу все данные подгружать или нет?
    // ведь пользователь может просто захотеть посмотреть других пользователей (телефон или емейл) и выйти
    // а если соберется делать какие-то другие действия, то создать уже другой запрос

    return true;
}

