<?php
error_reporting(-1);

include 'sys/db.php';
include 'adcp/class/auth.php';

class Engine {
    
    private $_page_file = null;
    private $_error = null;

    public function __construct() {
		global $db;
        if (isset($_GET["page"])) { //ПРОВЕРЯЕМ ЗАПРОС 
            $this->_page_file = $_GET["page"]; 
            //ЗАЩИТА
            $this->_page_file = str_replace(".", null, $_GET["page"]);
            $this->_page_file = str_replace("/", null, $_GET["page"]);
            $this->_page_file = str_replace("\\", null, $_GET["page"]);

             //ПРОВЕРКА СУЩЕСТВОВАНИЯ СТРАНИЦЫ
            if (!file_exists("templates/" . $this->_page_file . ".php")) {
                $this->_setError("Нет такой страницы!"); //если нет страницы
                $this->_page_file = "main"; //редирект на главную
            }
        }
         //ПРИСВАИВАЕМ main СТРАНИЦУ ПРИ НЕУДАЧЕ
        else $this->_page_file = "main";
    }

    /**
    ОШИБКИ
     */
    private function _setError($error) {
		global $db;
        $this->_error = $error;
    }

    /**
     ОШИБКИ
     */
    public function getError() {
		global $db;
        return $this->_error;
    }

    /**
     * ФУНКЦИЯ ВЫЗОВА СТРАНИЦЫ КОНТЕНТА
     */
    public function getContentPage() {
		global $db;
       // 
	   if(empty($_GET['page'])) {
		   $name_page = "main"; 
		   $_GET['page'] = $name_page;
		 
	   } else {
		   $name_page = $_GET['page'];
		  
	   }
	   echo '<br>';
	   
    $result = $db->prepare("SELECT name FROM pages WHERE name='".$_GET['page']."'");
	$result->bindParam(':'.$_GET['page'].'',$name_page, PDO::PARAM_STR);
	$result->execute();
 
	  while($row = $result->fetch())
	  {
		return file_get_contents("templates/" . $row['name'] . ".php");
	  }
	
	}

    /**
     ЗАГОЛОВКИ СТРАНИЦ
     */
    public function getTitle() {
        switch ($this->_page_file) {
            case "main":
                return "Типа главная";
                break;
            case "about":
                return "О нас типа";
                break;
            case "ox2":
                return "ох2";
                break;
            default:
                break;
        }
    }

}