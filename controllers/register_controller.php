<?php 

//Проверяем была ли передача данных
if (isset($_POST['name']) && isset($_POST['login']) &&
    isset($_POST['password']) && isset($_POST['repeat_password'])) {
    //Подключаемся к БД
    require_once '../models/connect_db.php';
    require_once '../models/functions.php';

    $name            = htmlspecialchars($_POST['name']);
    $login           = htmlspecialchars($_POST['login']);
    $password        = ($_POST['password']);
    $repeat_password = ($_POST['repeat_password']);

    //Проверяем совпадение паролей
    if ($password !== $repeat_password) {
        $message = 'Пароли не совпадают';

        //Проверяем сложность пароля
    } elseif (preg_match("/[A-Z].*[a-z]|[a-z].*[A-Z]/", $password) !== 0 && 
              mb_strlen($password) >= 8) {
        
        //проверяем наличие логина в БД
        if (check_login($_POST["login"], $pdo)) {
            $message = "Этот логин занят";
        } else {
            // Если логин не занят и пароль подходит, записываем в базу 
            // пользователя, авторизуем и редиректим на контент
            session_start();
            save_user($_POST, $pdo);
            $_SESSION['uid'] = get_user_id($_POST['login'], $pdo);
            header("Location: /index.php");
            exit();
        }    
    } else $message = 'Пароль должен содержать хотя бы две буквы латинского' . 
    ' алфавита в нижнем и верхнем регистре. И быть не менее 8 символов';
} else {
    $message         = '';
    $name            = '';
    $login           = '';
    $password        = '';
    $repeat_password = '';
}
