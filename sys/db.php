<?php
error_reporting(-1);

//MAIN CONFIG
define('DB_DRIVER','mysql');
define('DB_HOST','localhost');
define('DB_NAME','c2cms');
define('DB_USER','c2cms');
define('DB_PASS','W1zVa6Xq');
//СОЕДИНЕНИЕ С БАЗОЙ ДАННЫХ
$connect_str = DB_DRIVER . ':host='. DB_HOST . ';dbname=' . DB_NAME;
$db = new PDO($connect_str,DB_USER,DB_PASS);
//СЕССИИ ПОЛЬЗОВАТЕЛЕЙ
$login = isset($_SESSION['login']);
$password = isset($_SESSION['password']);
$id_user = isset($_SESSION['id']);

?>