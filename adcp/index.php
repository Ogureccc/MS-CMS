<?php
require 'class/auth.php';
global $auth;
 if ($auth->isAuth()) { // ЕСЛИ ВХОД УСПЕШНЫЙ  
 ?>
 <!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
    echo "Здравствуйте, " . $auth->getLogin() ;
    echo "<br/><br/><a href=\"?is_exit=1\">ВЫХОД</a>"; //ВЫЙТИ
?>
</body></html>
<?php
} 
else { //ЕСЛИ ВЫШЛИ ИЛИ НЕ АВТОРИЗОВАЛИСЬ ТО ФОРМА
?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<form method="post" action="">
    ЛОГИН: <input type="text" name="login" value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : null; // ПРОВЕРЯЕМ ПЕРЕМЕННУЮ НА СУЩЕСТВОВАНИЕ ?>" /><br/>
    ПАРОЛЬ: <input type="password" name="password" value="" /><br/>
    <input type="submit" value="ВОЙТИ" />
</form>
</body>
</html>
<?php } ?>