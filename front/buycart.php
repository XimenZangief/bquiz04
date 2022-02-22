<?php
// 如果未登入且購物數qt=0但進入此頁視為非法登入
if (isset($_GET['id']) && isset($_GET['qt'])) {
    $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}

// 判斷是否有登入，否則導入登入頁
if (!isset($_SESSION['member'])) {
    to("?do=login");
    exit();
}
// 登入後購物車有商品則顯示商品，否則提示"無商品"
if (empty($_SESSION['cart'])) {
    echo "購物車無商品";
    exit();
} else {
    dd($_SESSION['cart']);
}
?>

<h1 class="ct"><?= $_SESSION['member']; ?> 的購物車</h1>
<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小計</td>
        <td>刪除</td>
    </tr>

    <?php
    foreach ($_SESSION['cart'] as $id => $qt) {
        $item = $Goods->find($id);
    ?>
    <tr class="pp ct">
        <td><?= $item['no']; ?></td>
        <td><?= $item['name']; ?></td>
        <td><?= $qt; ?></td>
        <td><?= $item['stock']; ?></td>
        <td><?= $item['price']; ?></td>
        <td><?= $item['price'] * $qt; ?></td>
        <td>
            <img src="../icon/0415.jpg" >
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<div>
    <img src="icon/0411.jpg" onclick="location.href='index.php'"> | 
    <img src="icon/0411.jpg" onclick="location.href='?do=checkout'">
</div>