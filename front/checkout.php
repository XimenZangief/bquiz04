<h1 class="ct">填寫資料</h1>
<?php
$mem = $Member->find(['acc' => $_SESSION['member']]);
?>

<table class="all">
    <tr>
        <td class="tt ct">登入帳號</td>
        <td class="pp"><?= $mem['acc']; ?></td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name" value="<?= $mem['name']; ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email" value="<?= $mem['email']; ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp"><input type="text" name="addr" id="addr" value="<?= $mem['addr']; ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡電話</td>
        <td class="pp"><input type="text" name="tel" id="tel" value="<?= $mem['tel']; ?>"></td>
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
    foreach ($_SESSION['cart'] as $id => $qt) {
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
        $sum = $sum + $item['price'] * $qt;
    }
    ?>
</table>
<div class="all pp ct">
    總價：<?=$sum;?>
</div>
<div>
    <button onclick="checkout()">確定送出</button>
    <button onclick="location.href='?do=buycart'">返回修改訂單</button>
</div>

<script>
    function checkout(){
        let data={
            // 加上引號使acc型態為字串
            acc:"<?=$mem['acc'];?>",
            name:$("#name").val(),
            addr:$("#addr").val(),
            email:$("#email").val(),
            tel:$("#tel").val(),
            total:<?=$sum;?>
        }
        // console.log(data);
        $.post("api/checkout.php",data,(res)=>{
            alert("訂購成功  感謝您的選購");
            // console.log(res);
            // location.href='index.php';
        })
    }
</script>