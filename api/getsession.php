<?php
    include_once "../base.php";

    // date_default_timezone_set("Asia/taipei"); xmpp有設定就不用


    $id=$_GET['id'];
    $date=$_GET['date'];
    $movie=find("movie",$id)['name'];

    $today = date("Y-m-d");
    $now = date("H");

    // $start = ($date==$today && $now >= 14)?floor(($now-10)/2):1;

    if($date==$today){
        if($now>=14){
              $start=floor(($now-10)/2);
        }else{
            $start=1;
        }
    
    }else{
          $start=1;
    }

    for($i=$start;$i<=5;$i++){
        //    $qt=q("select sum(qt) from ord where movie='$movie' && date='$date' && session='".$sess[$i]."'")[0][0];
           $qt=q("SELECT sum(qt) FROM ord WHERE movie='$movie' && date='$date' && session='".$sess[$i]."'")[0][0];
        echo "<option value='".$sess[$i]."'>".$sess[$i]."剩餘座位".(20-$qt)."人</open>";
    }   
    
?>


  
