<?php
session_start();
require("function.php");



global $mysqli;
$mysqli = new mysqli("localhost", "root", "", "lab_2");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
mysqli_set_charset($mysqli, "utf8");
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
    <p><a href="logout.php?w=exit">Выйти</a></p>
</div>
<div id="content">







<?php
if (isset($_REQUEST['w']))
$w=$_REQUEST['w'];
else
$w="show_news";


switch ($w) {
case "add":
show_add_news();
break;
case "save":
save_news_to_db();
break;
case "delete":
delete_news_from_db();
break;
case "fullText":
show_full_text();
break;
case "edit":
show_edit_news();
break;
case "save_edit":
save_edit();
break;
case "show_news":
default:

show_all_news();

}

?>

</div>
<div id="footer">&copy; 2021 Все права не защищены и являются просто текстом взятым с интернета :(</footer></div>
</div>
</body>
</html>
