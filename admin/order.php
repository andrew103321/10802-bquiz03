<style>
h3{
        margin:0;
        padding:5px;
        background:#555;
        color:white;
        text-align:center;
        border:1px solid black;
}
.orederlist{
        width:100%;
        height:400px;
        overflow:auto;
}

 </style>
<h3>訂單清單</h3>
<div class="fun">
    快速刪除
    <input type="radio" name="type" class="type" value='1' checked>依日期
    <input type="text" name="type" id="date">
    <input type="radio" name="type" class="type" value='2'>依電影
    <select name="movie" id="movie">
        <?php
            $mlist = q("select movie from `ord` group by movie");
            foreach($mlist as $m){
                echo "<option value='".$m['movie']."'>".$m['movie']."</option>";
            }


        ?>
    </select>
    <button id='qdel' onclick="qDel()">刪除</button>
</div>

<div class="orderlist">
</div>

<script>
getlist()
    function getlist(){
        $.get("./admin/orderlist.php",function(list){
            $(".orderlist").html(list)
    

        $(".delBtn").on("click",function(){
           
              let id = $(this).data('del')
     
              $.post("./api/del.php",{"table":"ord",id},function(){
                    getlist()
                 })
            })
        })
    }

    function qDel(){
         let type= $(".type:checked").val()
        //  console.log(type)
        //  let chk
         switch(type){
             case "1":
                // 法1
                // date = $("#date").val();
                //     console.log(date)

                //  chk = confirm(`你真的要刪除全部${date}的訂單嗎`)
                // if(chk==true){
                //     $.post('./api/qdel.php',{"type":type,"date":date},function(){
                //     getlist()
                //      })
                // }

                   // 法2
                     data={"date":$("#date").val()}
             break;

             case "2":
                // 法1
                // movie = $("#movie").val();
                // console.log(movie)
                //  chk = confirm(`你真的要刪除全部${movie}的訂單嗎`)
                //  if(chk==true){

                //  $.post('./api/qdel.php',{"type":type,"movie":movie},function(){
                //      getlist()
                // })
                // }

                   // 法2

                   data={"movie":$("#movie").val()}
             break;
         }

        
         let chk = confirm(`你確定要刪除${Object.values(data)[0]}的資料嗎?`)
              if(chk==true){
                 $.post("./api/qdel.php",data,function(){
                    getlist()
        })
    }


    }

</script>