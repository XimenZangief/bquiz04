<?php
include_once "../base.php";

// 日期+6碼亂數
$_POST['no']=date("Ymd") . rand(100000,999999);

// 判定DB內是否重複，有就重新產生一組*選配*
// while(!empty($Ord->find(['no'=>$_POST['no']]))){
//     $_POST['no']=date("Ymd") . rand(100000,999999);
// }

// 陣列->字串
$_POST['goods']=serialize($_SESSION['cart']);
// dd($_POST);
$Ord->save($_POST);

// 清空購物車
unset($_SESSION['cart']);

?>