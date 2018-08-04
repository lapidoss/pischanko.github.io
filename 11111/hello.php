<?php


session_start();

$_SESSION['name'] = $_POST['name'];
echo 'Привет, '.$_SESSION['name']."<br>";

/*

if(!isset($_SESSION['name'])) {
    echo "Твой ник: " . $_SESSION['name'] . "<br>";

}*/