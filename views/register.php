<?php 

require_once '../controllers/register_controller.php';

?>

<html>
    <head>
        <meta charset="utf-8">

        <title>Форма регистрации</title>
    </head>
    <body>
        <p>Форма регистрации</p>
        
        <form method="POST" action="">
            <label>Имя:</label>
            <input type="text" name="name" value="<?=$name?>" required><br/>

            <label>Логин:</label>
            <input type="text" name="login" value="<?=$login?>" required><br/>

            <label>Пароль:</label>
            <input type="password" name="password" required><br/>

            <label>Повторите пароль:</label>
            <input type="password" name="repeat_password" required><br/>

            <span style="color: red;"><?=$message?></span><br/>

            <input type="submit" value="Войти">
        </form>
    </body>
</html>
