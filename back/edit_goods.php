<?php
$good=$Goods->find([$_GET['id']]);
?>

<!-- copy from add_goods.php -->
<h1 class="ct">修改商品</h1>
<!-- emmet -->
<!-- table.all>tr*3>td.tt.ct+td.pp>input:text -->
<form action="api/save_goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp">
                <select name="big" id="big">

                </select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">所屬中分類</td>
            <td class="pp">
                <select name="mid" id="mid">

                </select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品編號</td>
            <td class="pp"><?=$good['no'];?></td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp"><input type="text" name="name" value="<?=$good['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp"><input type="text" name="price" value="<?=$good['price'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp"><input type="text" name="spec" value="<?=$good['spec'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp"><input type="text" name="stock" value="<?=$good['stock'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp"><input type="file" name="img" id="img"></td>
        </tr>
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp">
                <textarea name="intro" id="intro" style="width:90%;height:100px"><?=$good['intro'];?></textarea>
            </td>
        </tr>
    </table>
    <input type="hidden" name="id" value="<?=$good['id'];?>">
    <button type="submit">修改</button>
    <button type="reset">重置</button>
    <button type="button" onclick="location.href='?do=th'">返回</button>
</form>


<script>
    // callback，顯示大中分類選項
    $("#big").load("api/get_type.php",()=>{

        // 大分類完全載入完成才選定商品的大分類項目
        $("#big option[value='<?=$good['big'];?>']").prop('selected',true);
        $("#mid").load("api/get_type.php",{parent:$("#big").val()},()=>{
            // 中分類完全載入完成才選定商品的中分類項目
            $("#mid option[value='<?=$good['mid'];?>']").prop('selected',true);
        });
    });

    $("#big").on("change",function(){
        // 根據大分類選單改變中分類選單
        $("#mid").load("api/get_type.php",{parent:$("#big").val()});
    })
</script>