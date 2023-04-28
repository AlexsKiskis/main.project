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
require_once("api/config.php");
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
    echo "<div class='student' data-id='$row[student_id]'>
            $row[lname], $row[fname], $row[gender], $row[age]
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-activity like' viewBox='0 0 16 16'>
  <path fill-rule='evenodd' d='M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z'/>
</svg>
        
<span class='num-like'>$row[num_like]</span>
</div>";

}
?>
</div>

<svg height="210" width="500">
   <line x1="0" y1="0" x2="500" y2="0" style="stroke:rgb(255,0,0);stroke-width:2" />
</svg> 

<form method="POST" action="api/auth.php" id="form-fetch">
    <input type="text" id="login" name="login" placeholder="enter a login" required><br>
    <input type="password" id="password" name="password" placeholder="enter a password" required><br>
    <input type="submit" value="Log In">
</form>
</body>
</html>