<?php
require_once("index.php");

echo "<strong>Список страниц, которые Вы посетили на нашем сайте:</strong><br>";


if (isset($_SESSION['pages']))
{}


foreach ($_SESSION['pages'] as $page)
{
    print ' - '. $page.'<br>';
}