<?php


session_start();

$_SESSION['name'] = $_POST['name'];
echo 'Привет, '.$_SESSION['name']."<br>";

