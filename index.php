<?php
error_reporting(-1);

//require_once "sys/db.php";
include_once "sys/config.php";
include_once "sys/class/Engine.php"; //ПОДКЛЮЧАЕМ КЛАСС ЯДРА
$engine = new Engine(); //СОЗДАЕМ НОВЫЙ ОБЪЕКТ ENGINE

include_once "templates/header.php"; //ШАПКА САЙТА

if ($engine->getError()) { //ВЫВОД ОШИБКИ
    echo "<div style=\"border:1px solid red;padding:10px;margin: 10px auto; 
        width: 500px;\">" . $engine->getError() . "</div>";
}
echo $engine->getContentPage(); //ВЫВОД КОНТЕНТА

include_once "templates/footer.php";//ВЫВОД ФУТЕРА
?>