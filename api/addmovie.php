<?php
    include_once "../base.php";

    if(!empty($_FILES["poster"]['tmp_name'])){
        $data['poster'] = $_FILES["poster"]['name'];
        move_uploaded_file($_FILES["poster"]['tmp_name'],"../movie/".$data['poster']);
    }
    if(!empty($_FILES["trailer"]['tmp_name'])){
        $data['trailer'] = $_FILES["trailer"]['name'];
        move_uploaded_file($_FILES["trailer"]['tmp_name'],"../movie/".$data['trailer']);
    }
    // 日期要另外存
    foreach($_POST as $key => $value){
        switch($key){
            case "year":
            case "month":
            case "day":
            break;
            default:
                $data[$key] = $value;
        }
    }
    $data['ondate'] = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
    $data['sh'] = 1;
    $data['rank']= q("select max(`id`) from  movie")[0][0]+1;
    save("movie",$data);
    to("../admin.php?do=movie");


?>