<?php
$ord=$Ord->find($_GET['id']);
?>

<h1 class="ct">訂單編號<span style="color:red;"><?=$ord['no'];?></span>的詳細資料</h1>

<!-- copy from front/checkout.php -->
<table class="all">
    <tr>
        <td class="tt ct">登入帳號</td>
        <td class="pp"><?= $ord['acc']; ?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><?= $ord['name']; ?></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><?= $ord['email']; ?></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp"><?= $ord['addr']; ?></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡電話</td>
        <td class="pp"><?= $ord['tel']; ?></td>
    </tr>
</table>
<table class="all">
    <tr class="tt ct">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <?php
    // 宣告總價
    $sum = 0;
    $cart=unserialize($ord['goods']);
    foreach ($cart as $id => $qt) {
        $item = $Goods->find($id);
    ?>
        <tr class="pp ct">
            <td><?= $item['no']; ?></td>
            <td><?= $item['name']; ?></td>
            <td><?= $qt; ?></td>
            <td><?= $item['price']; ?></td>
            <td><?= $item['price'] * $qt; ?></td>
        </tr>
    <?php
    }
    ?>
</table>
<div class="all pp ct">
    總價：<?=$ord['total'];?>
</div>
<div>
    <button onclick="location.href='?do=order'">返回</button>
</div>