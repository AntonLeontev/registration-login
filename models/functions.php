<?php 

function check_login($login, PDO $pdo)
{
    $query = 
    "
        SELECT id FROM users
        WHERE login=?
    ;";

    $stmt = $pdo->prepare($query);
    $stmt->execute([
        $login,
    ]);
    $data = $stmt->fetchAll(PDO::FETCH_NUM);
    return empty($data) ? false : true;
}

function save_user(array $data, PDO $pdo)
{
    // Готовим данные к записи
    $data['login']    = htmlspecialchars($data['login']);
    $data['password'] = sha1($data['password']);
    $data['name']     = htmlspecialchars($data['name']);

    //Формируем запрос
    $query = 
    "
        INSERT users(login, password, name) 
        VALUES (?,?,?)
    ;";

    $stmt = $pdo->prepare($query);
    // отправляем данные в БД
    $stmt->execute([
        $data['login'],
        $data['password'],
        $data['name'],
    ]);
}

function get_user_id($login, PDO $pdo)
{
    $query = 
    "
        SELECT id FROM users
        WHERE login=?
    ;";

    $stmt = $pdo->prepare($query);
    $stmt->execute([
        $login,
    ]);
    $data = $stmt->fetch(PDO::FETCH_NUM);
    return $data[0];
}

function get_user_name($id, PDO $pdo)
{
    $query = 
    "
        SELECT name FROM users
        WHERE id=?
    ;";

    $stmt = $pdo->prepare($query);
    $stmt->execute([
        $id,
    ]);
    $data = $stmt->fetch(PDO::FETCH_NUM);
    return $data[0];
}

function get_user_password($login, PDO $pdo)
{
    // Запрашиваем пароль по логину
    $query = 
    "
        SELECT password FROM users
        WHERE login=?
    ;";

    $stmt = $pdo->prepare($query);
    $stmt->execute([
        $login,
    ]);
    $data = $stmt->fetch(PDO::FETCH_NUM);

    //Если логин найден вернем пароль, если нет - вернем false
    if ($data) return $data[0];
    else return $data;         
}

