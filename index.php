<?php
    session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Авторизация</title>
    <link rel="stylesheet" href="autif.css">
</head>
<body>

<form action="inc/singin.php" method="post">
    <lable>Логин</lable>
    <input type="text" name="login" id="" placeholder="Введите логин">
    <lable>Пароль</lable>
    <input type="password" name="password" id="" placeholder="Введите пароль">
    <button type="submit">Войти</button>
    <p>
        Нет аккаунта? - <a href="/lab2/register.php">Зарегистрироваться</a>
    </p>
        <?php
        if ($_SESSION['message']) {
            echo '<p class="msg"> ' . $_SESSION['message'] . '</p>';  // вот так вот не надо, нужно через подготовленные...
        }
        unset($_SESSION['message']);
        ?>
</form>


</body>
</html>
