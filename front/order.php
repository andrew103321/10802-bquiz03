<!-- -- -->
<style>
      table{
            width:50%;
            padding:20px;
            margin:20px auto;
            border:1px solid #ccc;
            background:#eeee;
      }
      table td{
            padding:5px 0;
            text-align:center;
            border:1px solid #999;
      }
      table tr:nth-child(odd){
            background:#aaa;
      }
      table tr:nth-child(even){
            background:#ccc;
      }
      table td:nth-child(1){
         width:100px;
      }
      table td select{
          width:100%;
}



</style>
<form action="">
<h3 class="ct">線上訂票</h3>
      <table>
            <tr>
                  <td>電影:</td>
                  <td><select name="movie" id="movie"></select></td>
            </tr>
            <tr>
                  <td>日期:</td>
                  <td><select name="date" id="date"></select></td>
            </tr>
            <tr>
                  <td>場次:</td>
                  <td><select name="session" id="session"></select></td>
            </tr>
            <tr>
                  <td class='ct' colspan='2'>
                  <input type="button" value="確定" id="send">
                  <input type="reset" value="重置">
                  </td>
                  
            </tr>
      </table>
</form>

<div class='load'></div>
<script>

      // 拿上上映中電影
      $("#movie").on("change",function(){
            // let id =$("#movie").val()
            // getDate()
            getDate(getForm().id)
      })
      $("#date").on("change",function(){
            // let id = $("movie").val()
            // getSession(id,date)
            getSession(getForm().id,getForm().date)
      })
      $("#send").on("click",function(){
            $("form").hide()
            $.get("./front/booking.php",getForm(),function(res){
                  $(".load").html(res)
            })
      })
      getMovie()

      function getMovie(){


            //高級用法
            // let url = new URL(location.href)
            // let param = url.searchParams.get("id")

            // let id=0

            // if(!$.isEmptyObject){
            //       param=id
            // }
         
            let id = <?=(!empty($_GET['id']))?$_GET['id']:0;?>;
           
            $.get("./api/getmovie.php",{id},function(movie){
                  $("#movie").html(movie)
                console.log(movie)
                if(id==0){
                        id=$("#movie").val()
                  }
                  getDate(id)
            })
      }

      function getDate(id){
            $.get("./api/getdate.php",{id},function(list){
                  $("#date").html(list)
                  let date= $("#date").val()
                  getSession(id,date)
            })
      }

      function getSession(id,date){
            $.get("./api/getsession.php",{id,date},function(session){
                  $("#session").html(session)
            })
      }

      function getForm(){
            // let id =$("#movie").val()
            // let date =$("#date").val()
            // let session =$("#session").val()
            // return {"id":id,"date":date,"session":session}
            return {"id":$("#movie").val(),"date":$("#date").val(),"session":$("#session").val()}
      }
</script>


