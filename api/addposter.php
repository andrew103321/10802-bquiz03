<?php
    include_once "../base.php";

    if(!empty($_FILES['poster']['tmp_name'])){
        $data['poster'] = $_FILES['poster']['name'];

        move_uploaded_file($_FILES['poster']['tmp_name'],"../poster/".$data['poster']);

        $data['name'] = $_POST['name'];

        $data['sh'] = 1;
        $data['ani'] = 1;

        $data['rank'] = q("select max(id) from `poster`")[0][0]+1;
        
        save("poster",$data);

        to("../admin.php?do=poster");
    }
?>