<?php
    $dsn = "mysql:host=localhost;charset=utf8;dbname=db03_1";
    $pdo = new PDO($dsn,"root","");
    session_start(); // *



    function find($table,...$arg){
        global $pdo;
        
        $sql = "select * from $table where " ;

        if(is_array($arg[0])){
            foreach($arg[0] as  $key => $value ){
                $tmp[] =  sprintf("`%s`='%s'",$key,$value);
            }
                $sql = $sql .implode(" && ",$tmp);
        }else{
                $sql = $sql . "`id`='".$arg[0]."'" ;  /**/ 
        }
            // echo $sql ;
            return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC); /**/
    }
            // print_r(find("total",1)) ;

    function all($table,...$arg){
        global $pdo;

        $sql = "select * from $table  ";

        if(!empty($arg[0])){
            foreach($arg[0] as $key=>$value){    // *
                $tmp[] = sprintf("`%s`='%s'",$key,$value);
            }
            $sql = $sql ."where". implode(" && ",$tmp);   // *
          
        }

        if(!empty($arg[1])){
            $sql = $sql . $arg[1];     
        }

       return $pdo->query($sql)->fetchALL();
    }

        // print_r(all("total",["total"=>2],"limit 2"));   //*//*


        function del($table,...$arg){
            global $pdo;
            $sql = "delete from $table where ";
            if(is_array($arg[0])){
                foreach($arg[0] as $key=>$value){
                    $tmp[] = sprintf("`%s`='%s'",$key,$value);
                 
                }
                    $sql = $sql . implode(" && " ,$tmp);
            }else{
                $sql = $sql . "`id`='".$arg[0]."'"; //*
             
            }
          
            return $pdo->exec($sql);
        }

       function save($table,$data){
            global $pdo;
            if(!empty($data['id'])){
                //up
                foreach($data as $key=>$value){
                    $tmp[] = sprintf("`%s`='%s'",$key,$value);
                }
                $sql = "update $table set ".implode(",",$tmp)."  where `id`='".$data['id']."' " ;
          
            }else{
                //in
                    $key = array_keys($data);
                    $key_str = "`".implode("`,`",$key)."`";
                    $data_str = "'".implode("','",$data)."'";

                    $sql = "insert into $table ($key_str) value($data_str)";
            }
            // echo $sql;
            return $pdo->exec($sql);
       }


        function to($path){
            header("location:".$path);   //*
        }


        function q($sql){
            global $pdo;
            return $pdo->query($sql)->fetchALL();
        }
     
        $level=[
            1=>["03C01.png","普遍級"],
            2=>["03C02.png","輔導級"],
            3=>["03C03.png","保護級"],
            4=>["03C04.png","限制級"],
        ];

?>