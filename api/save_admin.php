<?php 
include "../base.php";
$_POST=serialize($_POST['tr']);
$Admin->save($_POST);
?>