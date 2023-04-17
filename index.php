<?php
header("Content-Type:text/html; charset=UTF-8");

require_once("api/config.php");
require_once("api/core.php");


if(file_exists("api/main.php")){
    //проверка сощуствования файла
    include("api/main.php"); //подключаем 
    if (class_exists("Main")){
        $obj  = new Main; //создаем объект от класса мейн
        $obj->get_body();
    } else {
        exit("<p>Не верный класс</p>");
    }
}
    else {
        exit("<p>Не верный путь</p>");
    }


































?>