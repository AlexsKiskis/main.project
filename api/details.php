<?php
    class details extends core {   
        public function get_content(){
            if (isset($_GET['id'])) {
                $id=$this->formatstr($_GET['id']);
                include ("modules/mod_detail.php");             
            } else {            
                echo "<p>Данные не верны</p>";
            }           
        }
    }
