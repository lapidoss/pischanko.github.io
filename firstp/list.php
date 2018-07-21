<?php
require_once("index.php");

echo "<strong>Список страниц, которые Вы посетили на нашем сайте:</strong><br>";


if (isset($_SESSION['pages']))
{} else {}


foreach ($_SESSION['pages'] as $page)
{
    print ' - '. $page.'<br>';
}