<?php 
include "../base.php";
// dd($_POST);

// 陣列->字串
$_POST['pr']=serialize($_POST['pr']);
// dd($_POST);

$Admin->save($_POST);
to('../back.php?do=admin');
?>