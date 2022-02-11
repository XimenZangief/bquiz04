<?php 
include_once "../base.php";

// echo $Member->math('count','*',['acc'=>$_POST['acc']]);
$chk=$Member->math('count','*',['acc'=>$_POST['acc']]);
if($chk){
    echo 1;
}else{
    echo 0;
}
?>