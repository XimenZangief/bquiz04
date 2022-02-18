<?php
// 判斷是否有登入，否則導入登入頁
if(!isset($_SESSION['mem'])){
    to("?do=login");
    exit();
}
?>