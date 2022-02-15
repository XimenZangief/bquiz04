<?php
$row=$Admin->find($_GET['id']);
// 字串->陣列
$pr=unserialize($row['pr']);
?>

<!-- copy from add_admin.php -->
<h1 class="ct">新增管理帳號</h1>
<!-- emmet -->
<!-- table.all>tr*3>td.tt.ct+td.pp>input:text -->
<form action="api/save_admin.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="tt ct">權限</td>
            <td class="pp">
                <div><input type="checkbox" name="pr[]" value="1">商品分類管理</div>
                <div><input type="checkbox" name="pr[]" value="2">訂單管理</div>
                <div><input type="checkbox" name="pr[]" value="3">會員管理</div>
                <div><input type="checkbox" name="pr[]" value="4">頁尾版權管理</div>
                <div><input type="checkbox" name="pr[]" value="5">最新消息頁面</div>
            </td>
        </tr>
    </table>
    <!-- <button onclick="addAdmin()">新增</buttom> -->
    <!-- <button onclick="reset()">重置</button> -->
    <input type="hidden" name="id" value="<?=$row['id'];?>">
    <button type="submit">新增</button>
    <button type="reset">重置</button>
</form>
<div>