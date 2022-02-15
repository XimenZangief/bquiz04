<?php
$row=$Member->find($_GET['id']);
?>

<!-- copy from add_admin.php -->
<h1 class="ct">編輯會員資料</h1>
<!-- emmet -->
<!-- table.all>tr*3>td.tt.ct+td.pp>input:text -->
<form action="api/save_mem.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><?=$row['acc'];?></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><?=str_repeat("*",strlen($row['pw']));?></td>
        </tr>
        <tr>
            <td class="tt ct">累積交易額</td>
            <td class="pp"><?=$row['total'];?></td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><input type="text" name="name" value="<?=$row['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><input type="text" name="email" value="<?=$row['email'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">地址</td>
            <td class="pp"><input type="text" name="addr" value="<?=$row['addr'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp"><input type="text" name="tel" value="<?=$row['tel'];?>"></td>
        </tr>
    </table>
    <!-- <button onclick="addAdmin()">新增</buttom> -->
    <!-- <button onclick="reset()">重置</button> -->
    <input type="hidden" name="id" value="<?=$row['id'];?>">
    <button type="submit">編輯</button>
    <button type="reset">重置</button>
    <!-- 取消就是回到mem頁囉 -->
    <button onclick="location.href='?do=mem'">取消</button>
</form>
<div>