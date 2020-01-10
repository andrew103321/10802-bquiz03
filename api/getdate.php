<?php
    include_once "../base.php";

    $id=$_GET['id'];
    $movie = find("movie",$id);

    $today = strtotime(date("Y-m-d"));
    


    $ondate = strtotime($movie['ondate']);
//上映期間為上映日起算的三天，因此使用for迴圈來跑三次
        for($i=0;$i<3;$i++){
 
         $showDate = strtotime("+$i days",$ondate);   
        
  //將上映日期與今天相比，只有今天以後的日期才能被訂票
            if($showDate>=$today){
                echo  "<option value='".date("Y-m-d",$showDate)."'>".date("m月d日 l",$showDate)."</option>";
             
          }
            
        }
    
?>


  
