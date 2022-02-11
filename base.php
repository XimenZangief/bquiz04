<?php
date_default_timezone_set("Asia/Taipei");
session_start();

class DB{
    private $dsn= "mysql:host=localhost;charset=utf8;dbname=2.php";
    private $user="root";
    private $pw="";
    private $pdo;
    private $table;

    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,$this->user,$this->pw);
    }

    public function all(...$arg){
        $sql="SELECT * FROM $this->table ";
        switch(count($arg)){
            case 2:
                foreach ($arg[0] as $key => $value) {
                    $tmp[]="`$key`='$value'";
                }
                $sql .= " WHERE ".implode(" AND ",$tmp)." ".$arg[1];
                break;
            case 1:
                if(is_array($arg[0])){
                    foreach ($arg[0] as $key => $value) {
                        $tmp[]="`$key`='$value'";
                    }
                    $sql .= " WHERE ".implode(" AND ",$tmp);
                }else{
                    $sql .= $arg[0];
                }
                break;
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function math($math,$col,...$arg){
        
    }
}

?>