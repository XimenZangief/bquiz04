<?php 
include_once "../base.php";

// 動態判定要讀取admin資料表還是member資料表
$db=new DB($_POST['table']);
// echo $db->math('count','*',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
$chk=$db->math('count','*',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if($chk){
    echo 1;
}else{
    echo 0;
}
?>