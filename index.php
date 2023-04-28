<?php
header("Content-Type:text/html; charset=UTF-8");

require_once("api/config.php");
require_once("api/core.php");

if (isset($_GET['option'])){ //проверяем get параметр
    $class=trim(strip_tags($_GET['option'])); //очищаем его от HTML и PHP-теги и пробелы из начала и конца строки
    
} 

elseif (isset($_POST['option'])){ //проверяем get параметр
    $class=trim(strip_tags($_POST['option'])); //очищаем его от HTML и PHP-теги и пробелы из начала и конца строки
    
} 

else {
    $class='main';
}


if(file_exists("api/".$class.".php")){
    //проверка сощуствования файла
    include("api/".$class.".php"); //подключаем 
    if (class_exists($class)){
        $obj  = new $class; //создаем объект от класса мейн
        $obj->get_body();
    } else {
        exit("<p>Не верный класс</p>");
    }
}
    else {
        exit("<p>Не верный путь</p>");
    }


































?>