<?php

require "libs/rb.php";
//подключаем БД
R::setup( 'mysql:host=localhost;dbname=firstp',
    'root', '' );



session_start();

if (isset($_SESSION['pages']))
{
    if (count($_SESSION['pages']) < 5)
    {
        //Дописываем в массив адрес страницы
        $_SESSION['pages'][] = $_SERVER['REQUEST_URI'];
    }
    else {
        //Если в списке уже есть 5 страниц, надо передвинуть список назад
        for ($i=1; $i<5; $i++)
        {
            $_SESSION['pages'][$i-1] = $_SESSION['pages'][$i];
        }
        $_SESSION['pages'][4] = $_SERVER['REQUEST_URI'];
    }
//Если ключа pages нет, его надо создать как массив
} else {
    $_SESSION['pages'] = array();
    $_SESSION['pages'][] = $_SERVER['REQUEST_URI'];
}

foreach ($_SESSION['pages'] as $page)
{

}
