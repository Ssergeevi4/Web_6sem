<?php
function show_all_news()
{
    $result = $GLOBALS["mysqli"]->query('SELECT * FROM news ORDER BY data DESC LIMIT 10'); // запрос на выборку
    while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
    {
        ?>
        <section class="news">
            <h2><?=$row["title"] ?></h2>

            <div class="flex">

                <image class="image" src="<?=$row["image"]?>" alt="<?=$row["title"] ?>">
                    <div>
                        <p class="text"><strong> <?=$row["preview"] ?></strong>
                        <form action="index2.php?w=fullText" method="post">
                            <input type="hidden" name="fullText" value="<?=$row['id'] ?>">
                            <input type="submit" value="Подробнее"></p>
                        </form>
                        <form action="index2.php?w=edit" method="post">
                            <input type="hidden" name="title" value="<?=$row["title"] ?>">
                            <input type="hidden" name="image" value="<?=$row["image"] ?>">
                            <input type="hidden" name="review" value="<?=$row["preview"] ?>">
                            <input type="hidden" name="text" value="<?=$row["text"] ?>">
                            <input type="hidden" name="edit" value="<?=$row["id"] ?>">
                            <input type="submit" value="Редактировать">
                        </form>
                        <form action="index2.php?w=delete" method="post">
                            <input type="hidden" name="delete" value="<?=$row["id"] ?>">
                            <input type="submit" value="Удалить">
                        </form>
                    </div>

            </div>
            <div align="right"> <strong><?=$row["data"]?></strong></div>
        </section>
        <?php
    }
}
?>





<?php
function save_news_to_db()
{
    $saveNews = $GLOBALS["mysqli"]->prepare("INSERT INTO news (data, title, preview, text, image) VALUES (?, ?, ?, ?, ?)");
    $data = date("Y-m-d H:i:s");
    $title = $_REQUEST["title"];
    $preview = $_REQUEST["preview"];
    $text = $_REQUEST["text"];
    $image = $_REQUEST["image"];	
    $saveNews->bind_param('sssss', $data, $title, $preview, $text, $image);
    if ($saveNews->execute()) {
        echo'';
    } else {
        echo'';
    }
}
?>

<?php
function show_add_news()
{
    ?>
    <form action="index2.php?w=save" method="post">
        <p>Заголовок: <input type="text" name="title"></p>
        <p>Анонс: <input type="text" name="preview"></p>
        <p>Полный текст:<br>
            <textarea type="text" name="text"></textarea></p>
        <p>Изображение: <input type="text" name="image"></p>
        <p><input type="submit"></p>
    </form>
    <?php
}
?>

<?php
function delete_news_from_db(){
    $deleteNews = $GLOBALS["mysqli"]->prepare("DELETE FROM news WHERE id = ?");
    $delete = $_REQUEST["delete"];
    $deleteNews->bind_param('i', $delete);
    if ($deleteNews->execute()) {
        echo'';
    } else {
        echo'';
    }
}
?>

<?php
function show_full_text(){
    $showFull = $GLOBALS["mysqli"]->prepare("SELECT * FROM news WHERE id=?");
    $fullText = $_REQUEST["fullText"];
    $showFull->bind_param('i', $fullText);
    $showFull->execute();
    $result = $showFull->get_result();
    while($row = $result->fetch_assoc()) {
        ?>
        <h2><?=$row["title"] ?></h2>
        <div class="flex">
            <image class="image" src="<?=$row["image"] ?>" alt="<?=$row["title"] ?>">
                <div>
                    <p><?=$row["text"] ?></p>
                    <a href="index2.php">Назад</a>
                </div>
        </div>
        <?php
    }
}
?>

<?php
function show_edit_news()
{
    ?>
    <form action="index2.php?w=save_edit" method="post">
        <p>Заголовок: <input type="text" name="newTitle" value="<?=$_REQUEST["title"]?>"></p>
        <p>Анонс: <input type="text" name="newpreview" value="<?=$_REQUEST["preview"]?>"></p>
        <p>Полный текст: <textarea type="text" name="newText"><?=$_REQUEST["text"]?></textarea></p>
        <p>Изображение: <input type="text" name="newimage" value="<?=$_REQUEST["image"]?>"></p>
        <input type="hidden" name="edit" value="<?=$_REQUEST["edit"] ?>">
        <p><input type="submit"></p>
    </form>
    <?php
}
?>
<?php
function save_edit()
{
    $editNews = $GLOBALS["mysqli"]->prepare("UPDATE news SET data = ?, title = ?, preview = ?, text = ?, image = ? WHERE id = ?");
    $edit = $_REQUEST["edit"];
    $data = date("Y-m-d H:i:s");
    $newTitle = $_REQUEST["newTitle"];
    $newpreview = $_REQUEST["newpreview"];
    $newText = $_REQUEST["newText"];
    $newimage = $_REQUEST["newimage"];
    $editNews->bind_param('sssssi', $data, $newTitle, $newpreview, $newText, $newimage, $edit);
    if ($editNews->execute()) {
        echo '';
    } else {
        echo '';
    }
}?>


