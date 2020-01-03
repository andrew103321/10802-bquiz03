<?php
       include_once "../base.php";
       
       $id = $_POST['id'];
       $row = find("movie",$id);
    
       $row['sh'] = (($row['sh']+1)%2);
       save("movie",$row);
?>