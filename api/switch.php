<?php
    include_once "../base.php";

    $table = $_POST["table"];
    $id = $_POST['id'];
    
    $row1 = find($table,$id[0]);
    $row2 = find($table,$id[1]);

    $tmp = $row1["rank"];
    $row1['rank'] = $row2['rank'];
    $row2['rank'] =  $tmp;

    save($table,$row1);
    save($table,$row2);
?>