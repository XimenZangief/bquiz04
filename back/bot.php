<?php
// 確認bottom資料表內「只有一筆id=1」的資料
if (isset($_POST['bottom'])) {
    $Bottom->save(['id' => 1, 'bottom' => $_POST['bottom']]);
}
?>

<h1 class="ct">編輯頁尾版權區</h1>
<form action="?do=bot" method="post">
    <!-- emmet -->
    <!-- table.all>tr>td.tt.ct+td.pp>input:text -->
    <table class="all">
        <tr>
            <td class="tt ct">頁尾宣告內容</td>
            <td class="pp">
                <input type="text" name="bottom" value="<?= $Bottom->find(1)['bottom']; ?>">
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
    </div>
</form>