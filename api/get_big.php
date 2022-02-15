<?php
include_once "../base.php";

// 找到所有parent=0的大分類，並給予name排序
$bigs=$Type->all(['parent'=>0],"ORDER BY name");
foreach ($bigs as $key => $value) {
    echo "<option value='{$value['id']}'>{$value['name']}</option>";
}
?>