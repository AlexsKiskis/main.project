<?php
require_once ("config.php");

//соединение с БД
$connect = new mysqli(HOST, USER, PASSWORD, DB);
if($connect->connect_error){
    exit("Ошибка подключения к БД: ".$connect->connect_error);
}
//установить кодировку

$id = $_GET['id'];
$connect->set_charset("utf8");
$sql = "UPDATE `students`
SET `num_like`= `num_like` + 1
WHERE `student_id` = $id";

$result = $connect->query($sql);

if($result){
    echo "Ok";
}
else{
    echo "Error";
}