<?php 
include_once "../base.php";

// 使用form功能要記得to();
$Member->save($_POST);
to("../back.php?do=mem");
?>