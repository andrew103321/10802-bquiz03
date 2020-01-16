<style>
    .row{
            list-style-type:none;
            margin:2px auto;
            width:95%;
            background:white;
            color:black;
            display:flex;
            align-items: center;
        }
     .row li{
         width: calc(100% / 7);
         text-align: center;
         margin: 3px 1px;
     }   
     .row:nth-of-type(1){
         background:#ccc;
     }

</style>
<?php
        include_once "../base.php";

        $order = all("ord",[],"order by  no desc ");

?>
<ul class="row">
    <li>訂單編號</li>
    <li>電影名稱</li>
    <li>日期</li>
    <li>場次時間</li>
    <li>訂購數量</li>
    <li>訂購位置</li>
    <li>操作</li>
</ul>
<?php
    foreach($order as $ord){
?>

<ul class="row">
    <li><?=$ord['no'];?></li>
    <li><?=$ord['movie'];?></li>
    <li><?=$ord['date'];?></li>
    <li><?=$ord['session'];?></li>
    <li><?=$ord['qt'];?></li>
    <li>
     <?php   
        // unserialize()  序列化后的字符串變回陣列
        $seats = unserialize($ord['seat']);
        foreach($seats as $seat){
                    echo (floor($seat/5)+1)."排".($seat%5+1)."號<br>";
                }
       ?>     
    </li>
    <li><button data-del="<?=$ord['id']?>" class='delBtn'>刪除</button></li>
</ul>

<?php
    }
?>