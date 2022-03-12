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

<form action="inc/sing.php" method="post">
    <lable>Логин</lable>
    <label for=""></label>
    <input type="text" name="login" id="" placeholder="Введите логин">
    <lable>Почта</lable>
    <input type="email" name="email" id="" placeholder="Введите почту">
    <lable>Пароль</lable>
    <input type="password" name="password" id="" placeholder="Введите пароль">
    <lable>Подтверждение пароль</lable>
    <input type="password" name="password_confirm" id="" placeholder="Подтвердите пароль">
    <button type="submit">Войти</button>
    <p>
        Есть аккаунта? - <a href="/lab2/index.php">Войдите</a>
    </p>

    <?php
        if ($_SESSION['message']) {
            echo "<p class=\"msg\"> " . $_SESSION['message'] . "</p>";
        }
        unset($_SESSION['message']);
    ?>
</form>


</body>
</html>
