<?php

class AuthClass {
    private $_login = "demo"; 
    private $_password = "demo"; 

    /**
 @return boolean 
     */
    public function isAuth() {
        if (isset($_SESSION["is_auth"])) { //ПРОВЕРЯЕМ НАЛИЧИЕ ЗНАЧЕНИЯ
            return $_SESSION["is_auth"]; 
        }
        else return false; 
    }
    
    /*
	  @param string $login
      @param string $passwors 
     */
    public function auth($login, $passwors) {
        if ($login == $this->_login && $passwors == $this->_password) { //���� ����� � ������ ������� ���������
            $_SESSION["is_auth"] = true; //������ ������������ ��������������
            $_SESSION["login"] = $login; //���������� � ������ ����� ������������
            return true;
        }
        else { 
            $_SESSION["is_auth"] = false;
            return false; 
        }
    }
    
    
    public function getLogin() {
        if ($this->isAuth()) { //���� ������������ �����������
            return $_SESSION["login"]; //���������� �����, ������� ������� � ������
        }
    }
    
    
    public function out() {
        $_SESSION = array(); 
        session_destroy(); //ЗАКРЫТЬ СЕССИЮ
    }
}

$auth = new AuthClass();

if (isset($_POST["login"]) && isset($_POST["password"])) { //ПРОВЕРЯЕМ НА ПУСТОТУ
    if (!$auth->auth($_POST["login"], $_POST["password"])) { //ПРОВЕРЯЕМ НА ПУСТОТУ
        echo "<h2 style=\"color:red;\">ПРОВЕРЬТЕ УЧЕТНЫЕ ДАННЫЕ!</h2>";
    }
}

if (isset($_GET["is_exit"])) { //ФУНКЦИЯ ВЫХОДА
    if ($_GET["is_exit"] == 1) {
        $auth->out(); //ВЫХОД
        header("Location: ?is_exit=0"); //РЕДИРЕКТ
    }
}
?>