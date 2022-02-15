<?php
include_once "../base.php";

// 如果_POST['parent']有值則使用值，否則0
// 因為get_big跟get_mid只有差在parent的值
$parent=$_POST['parent']??0;
$rows=$Type->all(['parent'=>$parent]);

foreach ($rows as $key => $row) {
    echo "<option value='{$row['id']}'>{$row['name']}</option>";
}
?>