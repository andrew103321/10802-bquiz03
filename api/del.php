<?php
       include_once "../base.php";
       
       $id = $_POST['id'];
       $table = $_POST['table'];
       del($table,$id);
       

?>