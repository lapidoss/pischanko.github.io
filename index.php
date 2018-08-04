<?php

session_start();
?>
    <form method="POST" action="hello.php">
        <fieldset>
            <legend >Как Вас зовут?</legend>
            <p><label for="name">Меня зовут </label><input type="text" name='name' placeholder="Name"></p>
        </fieldset>
        <p><input type="submit" value="Отправить"></p>
    </form>

