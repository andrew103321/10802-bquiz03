
<style>
    .movielist{
        width:100%;
        height:400px;
        overflow:auto;
    }
</style>
<button onclick="javascript:location.href='admin.php?do=addmovie'">新增電影</button>
<hr>
<div class='movielist'>
</div>


<script>
    
getlist()
    function getlist(){
        $.get("./admin/movielist.php",function(list){
            $(".movielist").html(list)


           
// ---------------------------顯示--------------------------------
            $(".showBtn").on("click",function(){
            let id =$(this).data('show')
            $.post("./api/show.php",{id},function(){
                getlist()
            })
        })

// ---------------------------刪除--------------------------------
            $(".delBtn").on("click",function(){
            
            let id =$(this).data('del')
     
            $.post("./api/del.php",{"table":"movie",id},function(res){
                    console.log(res)
                getlist()
            })
        })
// ---------------------------往上往下--------------------------------
        $(".shiftBtn").on("click",function(){
               
               let id =$(this).attr("id").split("-");
        
               $.post("./api/switch.php",{"table":"movie",id},function(res){
             
                   getlist()
               })
           })


    })
    }


</script>