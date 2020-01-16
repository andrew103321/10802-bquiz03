<style>
/* -- */
    .room{
        width:540px;
        height:370px;
        margin:auto;
        background:url(./icon/03D04.png) no-repeat;
        display:flex;
        flex-wrap:wrap;
        padding:18px 110px;
        align-content:end;
        box-sizing:border-box;
    }
    .info{
        width:540px;
        margin:auto;
        background:#ccc;

        box-sizing:border-box;
        padding-left:10px 100px;
    }
    .seat{
        /* background:green; */
        width:64px;
        height:86px;
        position:relative;

    }
    .chk{
        position:absolute;
        bottom:5px;
        right:5px;
    }
    .null{
        background:url("./icon/03D02.png") no-repeat center;
        
    }
    .pick{
        background:url("./icon/03D03.png") no-repeat center;
    }
</style>
<?php
    include_once "../base.php";
    $movie = find("movie",$_GET['id'])['name'];
    $date = $_GET['date'];
    $session = $_GET['session'];


   $orders = q("select  *from ord where movie='$movie' && date='$date' && session='$session'");
    //    座位顯示有人 方法一

    // array_merge 結合同場次被訂走座位陣列
    $merge = [];
    foreach($orders as $o){
        $merge = array_merge($merge,unserialize($o['seat']));
    }
    //  echo "<pre>";print_r($merge);"</pre>";

       //    座位顯示有人 方法二
    // 建一個陣列 array_fill(起始,要幾個, 要填入字);
       $new=array_fill(0,20,0);

       foreach($merge as $m){
        // echo "$m<br>";
        $new[$m]=1;
    }
    //    echo "<pre>";print_r($new);"</pre>";
?>
    <div class="room">
        <?php
         // 配合方法一
            // for($i=0;$i<20;$i++){
            //     if(in_array($i,$merge)){
        // 配合方法二
            foreach($new as $i => $n){
                if($n==1){    
                    echo "<div class='seat pick'>";
                }else{
                    echo "<div class='seat null'>";
                    echo "<input type='checkbox' value='$i' class='chk'>";
                }
                // echo  "<div class='seat null'>";
                echo "<div class='ct'>".(floor($i/5)+1)."排".($i%5+1)."號</div>";              
                echo "</div>";
            }
        ?>
    </div>

    <div class="info">
        <div>你選擇的電影是:<?=$movie;?></div>
        <div>你選擇的時刻是: <?=$date."  ".$session;?></div>
        <div>你已經勾選<span class="ticket"></span>張票，最多可以選四張票</div>
        <button class="pre">上一步</button><button class="order">訂購</button>
    </div>
<script>
    let num = 0
    let seat = []
    // let seat = new Array()
    $(".chk").on("click",function(){
        // 取得屬性值 attr
        // 返回值是true/false的屬性，建議使用prop()
        let chk = $(this).prop("checked")
        if(chk==true){
            if(num<4){
                num++;
                seat.push($(this).val())

                //  可以不用做的炫技
                $(this).parent().removeClass("null")
                $(this).parent().addClass("pick")
            }else{

                alert("最多只能四張張票");
                $(this).prop("cheked",false)

                //可以不用做的炫技
                $(this).parent().removeClass("pick")
                $(this).parent().addClass("null")
            }
           
        }else{
            num--;
            // indexOf() 方法會回傳給定元素於陣列中第一個被找到之索引
            seat.splice(seat.indexOf($(this).val()),1)
        }
        $(".ticket").html(num);
        console.log(seat)
        
    })

    $(".pre").on("click",function(){
        $("form").show()
        $(".load").html("")
    })

    $(".order").on("click",function(){
        let result = {
            "seat":seat,
            "movie":"<?=$movie;?>",
            "date":"<?=$date;?>",
            "session":"<?=$session;?>",
            "qt":seat.length,
        }
 

        $.get("./front/result.php",result,function(res){
            $(".load").html(res)
        })
    })




</script>
