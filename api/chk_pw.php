<?php 
include_once "../base.php";

// 動態判定要讀取admin資料表還是member資料表
$db=new DB($_POST['table']);
// echo $db->math('count','*',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
$chk=$db->math('count','*',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if($chk){
    echo 1;
    // 支援會員與管理者可以同時在登入狀態
    switch($_POST['table']){
        case "admin":
            $_SESSION['admin']=$_POST['acc'];
            break;
        case "member":
            $_SESSION['member']=$_POST['acc'];
            break;
    }
}else{
    echo 0;
}
?>