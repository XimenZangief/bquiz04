<?php
include_once "../base.php";

// 找到所有parnt=0的大分類
$bigs=$Type->all(['parent'=>0]);
foreach ($bigs as $key => $value) {
    echo "<option value='{$value['id']}'>{$value['name']}</option>";
}
?>