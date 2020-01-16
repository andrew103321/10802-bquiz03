<?php
    include_once "../base.php";

    // 法1
    // switch($_POST['type']){
    //     case 1:
    //         del("ord",["date"=>$_POST['date']]);
    //     break;

    //     case 2:
    //         del("ord",["movie"=>$_POST['movie']]);
    //     break;
    // }


    // 法2
    del("ord",$_POST);

?>