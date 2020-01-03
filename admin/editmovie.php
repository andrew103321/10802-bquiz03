<style>
.form{
    list-style-type:none;
    padding:5px;
    margin:auto;
    width:70%;

}
.form li{
    margin:3px 0;
}

</style>
<?php
    $movie = find("movie",$_GET['id']);
    $dd =explode("-",$movie['ondate']);
   // echo "<pre>";print_r($dd);"</pre>";

?>
<form action="./api/editmovie.php" method="post" enctype="multipart/form-data">
    <ul class="form">
        <li>片名：<input type="text" name="name" value="<?=$movie['name'];?>"></li>
        <li>分級：<select name="level" value="" >
        <option value="1" <?=($movie['level']==1)?"selected":"";?>><?=$level['1'][1];?></option>
        <option value="2" <?=($movie['level']==2)?"selected":"";?>><?=$level['2'][1];?></option>
        <option value="3" <?=($movie['level']==3)?"selected":"";?>><?=$level['3'][1];?></option>
        <option value="4" <?=($movie['level']==4)?"selected":"";?>><?=$level['4'][1];?></option>
        </select></li>
        <li>片長：<input type="number" name="length" value="<?=$movie['length'];?>"></li>
        <li>上映日期：
            <select name="year" >
                <option value="2020" <?=($dd[0]=='2020')?"selected":"";?>>2020</option>
                <option value="2021" <?=($dd[0]=='2021')?"selected":"";?>>2021</option>
                <option value="2022" <?=($dd[0]=='2022')?"selected":"";?>>2022</option>
            </select>年
            <!--select>option[value="$$"]*12>{$$}-->
            <select name="month" >
                <option value="01"  <?=($dd[1]=='01')?"selected":"";?>>01</option>
                <option value="02"  <?=($dd[1]=='02')?"selected":"";?>>02</option>
                <option value="03"  <?=($dd[1]=='03')?"selected":"";?>>03</option>
                <option value="04"  <?=($dd[1]=='04')?"selected":"";?>>04</option>
                <option value="05"  <?=($dd[1]=='05')?"selected":"";?>>05</option>
                <option value="06"  <?=($dd[1]=='06')?"selected":"";?>>06</option>
                <option value="07"  <?=($dd[1]=='07')?"selected":"";?>>07</option>
                <option value="08"  <?=($dd[1]=='08')?"selected":"";?>>08</option>
                <option value="09"  <?=($dd[1]=='09')?"selected":"";?>>09</option>
                <option value="10"  <?=($dd[1]=='10')?"selected":"";?>>10</option>
                <option value="11"  <?=($dd[1]=='11')?"selected":"";?>>11</option>
                <option value="12"  <?=($dd[1]=='12')?"selected":"";?>>12</option>
            </select>月
             <!--select>option[value="$$"]*31>{$$}-->
            <select name="day">
                <option value="01"  <?=($dd[2]=='01')?"selected":"";?>>01</option>
                <option value="02"  <?=($dd[2]=='02')?"selected":"";?>>02</option>
                <option value="03"  <?=($dd[2]=='03')?"selected":"";?>>03</option>
                <option value="04"  <?=($dd[2]=='04')?"selected":"";?>>04</option>
                <option value="05"  <?=($dd[2]=='05')?"selected":"";?>>05</option>
                <option value="06"  <?=($dd[2]=='06')?"selected":"";?>>06</option>
                <option value="07"  <?=($dd[2]=='07')?"selected":"";?>>07</option>
                <option value="08"  <?=($dd[2]=='08')?"selected":"";?>>08</option>
                <option value="09"  <?=($dd[2]=='09')?"selected":"";?>>09</option>
                <option value="10"  <?=($dd[2]=='10')?"selected":"";?>>10</option>
                <option value="11"  <?=($dd[2]=='11')?"selected":"";?>>11</option>
                <option value="12"  <?=($dd[2]=='12')?"selected":"";?>>12</option>
                <option value="13"  <?=($dd[2]=='13')?"selected":"";?>>13</option>
                <option value="14"  <?=($dd[2]=='14')?"selected":"";?>>14</option>
                <option value="15"  <?=($dd[2]=='15')?"selected":"";?>>15</option>
                <option value="16"  <?=($dd[2]=='16')?"selected":"";?>>16</option>
                <option value="17"  <?=($dd[2]=='17')?"selected":"";?>>17</option>
                <option value="18"  <?=($dd[2]=='18')?"selected":"";?>>18</option>
                <option value="19"  <?=($dd[2]=='19')?"selected":"";?>>19</option>
                <option value="20"  <?=($dd[2]=='20')?"selected":"";?>>20</option>
                <option value="21"  <?=($dd[2]=='21')?"selected":"";?>>21</option>
                <option value="22"  <?=($dd[2]=='22')?"selected":"";?>>22</option>
                <option value="23"  <?=($dd[2]=='23')?"selected":"";?>>23</option>
                <option value="24"  <?=($dd[2]=='24')?"selected":"";?>>24</option>
                <option value="25"  <?=($dd[2]=='25')?"selected":"";?>>25</option>
                <option value="26"  <?=($dd[2]=='26')?"selected":"";?>>26</option>
                <option value="27"  <?=($dd[2]=='27')?"selected":"";?>>27</option>
                <option value="28"  <?=($dd[2]=='28')?"selected":"";?>>28</option>
                <option value="29"  <?=($dd[2]=='29')?"selected":"";?>>29</option>
                <option value="30"  <?=($dd[2]=='30')?"selected":"";?>>30</option>
                <option value="31"  <?=($dd[2]=='31')?"selected":"";?>>31</option>
            </select>日  
           

        </li>
        <li>發行商：<input type="text" name="publish" value="<?=$movie['publish'];?>"></li>
        <li>導演：<input type="text" name="director" value="<?=$movie['director'];?>"></li>
        <li>預告影片：<input type="file" name="trailer" value=""></li>
        <li>電影海報：<input type="file" name="poster" value=""></li>
        <li>劇情簡介：<textarea name="intro" value="" style="width:70%;height:50px"><?=$movie['intro'];?></textarea></li>
    </ul>
    <input type="hidden" name="id" value=<?=$movie['id'];?>>
    <div class="ct"><input type="submit" value="編輯"><input type="reset" value="重置"></div>
</form>
