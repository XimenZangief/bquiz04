<?php 
include "../base.php";
$_POST=serialize($_POST['pr']);
$Admin->save($_POST);

to('../back.php?do=admin');
?>