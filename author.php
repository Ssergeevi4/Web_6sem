<?php
session_start();
require("function.php");

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Новости К</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="header"><h1>Самые свежие новости К</h1></div>
<div id="sidebar">
    <p><a href="index2.php">Все новости</a></p>
    <p><a href="index2.php?w=add">Добавить новость</a></p>
    <p><a href="author.php">Об авторе</a></p>
    <p><a href="cats.php">Котики</a></p>
</div>
<div id="content">

</div>
<div id="footer">&copy; 2021 Все права не защищены и являются просто текстом взятым с интернета :(</footer></div>
</div>
</body>
</html>
