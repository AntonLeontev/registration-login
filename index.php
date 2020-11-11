<?php 

require_once 'models/connect_db.php';
require_once 'models/functions.php';
// Инициализируем сессию
session_start();
 
 // Проверка на авторизацию
if (!isset($_SESSION['uid'])) {
    // если не авторизован - показать меню входа
    require_once 'views/enter_menu.php';
} else {
    // Если авторизован - запросить имя и показать персональный контент
    $name = get_user_name($_SESSION['uid'], $pdo);
    require_once 'views/content.php';
}


    

