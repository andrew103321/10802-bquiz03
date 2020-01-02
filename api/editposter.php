<?php
    include_once "../base.php";
 
    foreach($_POST['id'] as $key => $id){
        if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
            del("poster",$id);
        }else{
            $row = find("poster",$id);
            
            $row['name'] = $_POST['name'][$key];            
            $row['sh'] = !empty($_POST['sh']) && in_array( $id,$_POST['sh'])?1:0;
            $row['ani'] = $_POST['ani'][$key]; 
            print_r($row);
            save("poster",$row);
        }
    }     
            to("../admin.php?do=poster");
  
 



?>