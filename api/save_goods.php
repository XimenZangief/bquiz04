<?php
include_once "../base.php";

$file=$_FILES['img']['tmp_name'];
if(isset($file)){
    move_uploaded_file($file,"../img/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}

// 商品無id的話則給予6位亂數編號
if(!isset($_POST['id'])){
    $_POST['no']=rand(100000,999999);
}

$Goods->save($_POST);
to("../back.php?do=th");
?>