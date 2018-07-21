<?php
    require "db.php";
?>

<?php
    if (isset($_SESSION['logged_user'])) : ?>
    Вы авторизованы!<br>
    Привет, <?php echo $_SESSION['logged_user']->login;?>!

        <div >
            <ul>
                <li><a href="index.php">Главная</a></li>
                <li><a href="images.php">Изображения</a></li>
                <li><a href="about.php">Текст</a></li>
                <li><a href="contact.php">Контакты</a></li>
                <li><a href="list.php">Список страниц</a></li>
            </ul>

        </div>

        <hr>
    <a href="logout.php">Выйти</a>
        <hr>
<?php else:?>
        Вы не Авторизованы!<br>

        Нажмите <a href="hello.php">Вход</a><br><br>
        Или <a href="singup.php">Зарегистрируйтесь</a>
<?php endif; ?>


