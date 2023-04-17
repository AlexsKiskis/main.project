<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
    <title>Клиент-серверное приложение</title>
</head>
<body class="theme">

<form id="form-insert-student">
<input type="text" name="fname" id="fname" placeholder="Введите имя" required><br>
<input type="text" name="lname" id="lname" placeholder="Введите фамилию" required><br>
<input type="number" name="age" id="age" placeholder="Ваш возраст" required><br>
<input type="radio" name="gender" id="m" value="m" checked>
<label for="m">Мужской</label>
<input type="radio" name="gender" id="f" value="f">
<label for="f">Женский</label><br>
<input type="submit" value="Добавить">
</form>
<div class="block"></div>
<div class="message"></div>


<div class="content">
<?php
require_once("config.php");
//соединение с БД
$connect = new mysqli(HOST, USER, PASSWORD, DB);
if($connect->connect_error){
    exit("Ошибка подключения к БД: ".$connect->connect_error);
}
//установить кодировку
$connect->set_charset("utf8");
//код запроса
$sql = "SELECT * FROM `students`";
//выполнить запрос
$result = $connect->query($sql);
//вести результаты запроса на страницу
while ($row = $result->fetch_assoc()){
    echo "<div>
            $row[lname], $row[fname], $row[gender], $row[age]
        </div>";
}
?>
</div>

    
</body>
</html>