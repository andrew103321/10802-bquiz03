<style>
.list,.add{
    width:98%;
    border: 2px solid #ccc;
    padding: 5px;
    background:#999; 
}
h3{
    margin:0;
    padding:5px;
    background:#555;
    color:white;
    text-align:center;
    border:1px solid black;
}
.header,.row{
    list-style-type:none;
    display:flex;
    color:black;
    text-align:center;
    padding:0;
    margin:5px;

}
.header li,.row li{
    background:#ccc;
    width:24.5%;
    margin:0.25%;
}
.row{
    background:white;
}
.row li{
    color:black;
    background:white;
}
.row img{
    width:80px;
    height:100px;
}
.items{
    height: 300px;
    overflow:hidden;

}
</style>
<div class="list">
    <h3>預告片清單</h3>
    <ul class="header">
        <li>預告片海報</li>
        <li>預告片片名</li>
        <li>預告片排序</li>
        <li>操做</li>
    </ul>
    <form action="./api/editposter.php" method='post'>
        <div class='items'>
   
        </div>
                <div class="ct"><input type="submit" value="編輯確定"><input type="reset" value="重置"></div>
    </form>
</div>
<hr>
<div class="add">
    <h3>新增預告片海報</h3>
    <form action="./api/addposter.php" method='post' enctype="multipart/form-data">
    <table class="ct" style="width:98%">
        <tr>
            <td>
                預告片海報: <input type="file" name="poster" id="poster">
            </td>
            <td>
                預告片片名: <input type="text" name="name" id="name">
            </td>
        </tr>
        <tr>
            <td  colspan='2'>
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
    </form>
</div>

<script>
    getlist();

    function getlist(){
        $.get("./admin/posterlist.php",function(res){
            $(".items").html(res);

            $("input[type=button]").on("click",function(){
                // split("-") 很像php implode
                let id =$(this).attr("id").split("-");
                console.log(id)
                $.post("./api/switch.php",{"table":"poster",id},function(res){
                    console.log(res)
                getlist();
            })
                
            })
        })
    }

</script>