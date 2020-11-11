<?php 

require_once '../controllers/login_controller.php';

?>

<html>
    <head>
        <meta charset="utf-8">

        <title>Форма авторизации</title>
    </head>
    <body>
        <p>Форма авторизации</p>

        <form method="POST" action="login.php">
            <label>Логин:</label>
            <input type="text" name="login" value="<?=$login?>" required><br/>

            <label>Пароль:</label>
            <input type="password" name="password" required><br/>

             <span style="color: red;"><?=$message?></span><br/>

            <input type="submit" value="Войти">
        </form>
    </body>
</html>
