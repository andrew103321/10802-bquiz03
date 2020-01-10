<style>
    
    

</style>
<div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="slider">
          <div class="lists">
                <div class="poster"></div>
          </div>
          <div class="controls">
              <div class=ra></div>
              <div class="icon"></div>
              <div class=la></div>
          </div>
        </div>
      </div>
    </div>


    <style>
.movie-list{
  display:flex;
  flex-wrap:wrap;
  justify-content:start;
}
.movie-box{
  width:48%;
  margin:0.5%;
  box-sizing:border-box;
  border:1px solid #ccc;
  border-radius:10px;
  display:flex;
  flex-wrap:wrap;
  padding:10px 3px;
}
  .movie-poster img{
    width:55px;
    height:70px;
  }
  .movie-poster {
    width:30%;
 
  }
  .movie-info {
    width:40%;
 
  }
  .movie-info li{
    list-style-type:none;
    padding:0;
    font-size:12px;
 
  }
</style>


    <div class="half">
    
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;">
      <div class="movie-list">
      <?php
$today = date("Y-m-d");
$startDay = date("Y-m-d",strtotime("-2 days"));
$sql = "select *from movie where sh='1' && ondate >= '$startDay' &&  ondate <= '$today' order by rank";
$movies = q($sql);
foreach($movies as $m){
?>
<div class="movie-box">
  <div class="movie-poster">
    <img src="./movie/<?=$m["poster"];?>" alt="">
    </div>
    <div class="movie-info">
        <li><?=$m["name"];?></li>
        <li><?=$m["level"];?></li>
        <li><?=$m["ondate"];?></li>
    </div>
    <div class='movie-btn'>
      <button>劇情簡介</button>
      <button>線上訂票</button>
    </div>
  </div>

<?php
}
?>
</div>

        <div class="ct">分頁</div>
      </div>
    </div>
