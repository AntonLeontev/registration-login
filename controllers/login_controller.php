<?php 

//Проверяем была ли передача данных
if (isset($_POST['login']) && isset($_POST['password'])) {
    //Подключаемся к БД
    require_once '../models/connect_db.php';
    require_once '../models/functions.php';

    $login    = htmlspecialchars($_POST['login']);
    $password = $_POST['password'];

    //проверяем наличие логина в БД
    $pass = get_user_password($login, $pdo);
    if ($pass) {
        
        //Если есть - проверяем правильность пароля
        if ($pass === sha1($password)) {
            // Если пароль подходит, авторизуем и редиректим на контент
            session_start();
            $_SESSION['uid'] = get_user_id($_POST['login'], $pdo);
            header("Location: /index.php");
            exit();    
        } else $message = 'Неверный логин или пароль';
        
    } else $message = 'Неверный логин или пароль';  
    
} else {
    $message = '';
    $login   = '';
}
