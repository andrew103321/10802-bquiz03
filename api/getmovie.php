<?php
    include_once "../base.php";

    $id=$_GET['id'];
    $today = date("Y-m-d");
    $startDay = date("Y-m-d",strtotime("-2 days"));
 
    $sql = "select * from movie where sh='1'&& ondate >= '$startDay' && ondate <= '$today'";
   

    $movies = q($sql);

 
    foreach($movies as $m){
        $selected=($m['id']==$id)?"selected":"";
       echo "<option value='".$m['id']."' $selected>".$m['name']."</option>";
    }
?>


  
