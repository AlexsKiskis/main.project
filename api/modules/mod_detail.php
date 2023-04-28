<?php
   $result = $this->connect->prepare("SELECT * FROM students WHERE student_id=?");
   $result->bind_param("i", $id);
   $result->execute();
   $rows = $result->get_result();
   $result = $this->connect->query("SELECT * FROM students WHERE student_id=$id");
    
   
   if (!$rows) {
        echo "<p>Нет данных</p>";
    } else {
    
        echo "<p class='back'><a href = './'>Назад</a></p>";
        $myrow  =  $rows->fetch_assoc();

        echo "<div>
            $myrow[lname],$myrow[fname],$myrow[age]
        </div>"; 
    }
