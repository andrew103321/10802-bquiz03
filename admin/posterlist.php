<?php
        include_once "../base.php";

                $pos = all("poster",[],"order by rank");
                foreach($pos as $k => $p){
                    // 計算上一筆
                    $prev = ($k!=0)?$pos[$k-1]['id']:$p['id'];
                    // 計算下一筆
                    // 計算陣列比數  count
                    $next = ($k!=(count($pos)-1))?$pos[$k+1]['id']:$p['id'];
            ?>
            <ul class="row">
                <li><img src="./poster/<?=$p['poster'];?>" alt=""></li>
                <li><input type="text" name="name[]" value="<?=$p['name'];?>"></li>
                <li>                                  
                                                   <!-- id=v現在頁."-".交換頁 -->
                    <input type="button" value="往上" id=<?=$p['id']."-".$prev?>>
                    <input type="button" value="往下" id=<?=$p['id']."-".$next?>>
                </li>
                <li>
                    <input type="checkbox" name="sh[]" value="<?=$p['id'];?>" <?=($p['sh']==1)?'checked':"";?>>顯示
                    <input type="checkbox" name="del[]" value="<?=$p['id'];?>">刪除


                    <select name="ani[]" >
                            <option value="1" <?=($p['ani']==1)?"selected":"";?>>淡入淡出</option>
                            <option value="2" <?=($p['ani']==2)?"selected":"";?>>滑入滑出</option>
                            <option value="3" <?=($p['ani']==3)?"selected":"";?>>縮放</option>
                    </select>
                </li>
                <input type="hidden" name="id[]" value="<?=$p['id'];?>">
            </ul>
            <?php
            }
            ?>