<h1 class="ct">商品分類</h1>
<div>
    新增大分類
    <input type="text" name="big" id="big">
    <button onclick="newType('big')">新增</button>
</div>
<div>
    新增中分類
    <select name="parent" id="parent"></select>
    <input type="text" name="mid" id="mid">
    <button onclick="newType('mid')">新增</button>
</div>

<!-- 分類區 -->
<!-- emmet -->
<!-- table.all>tr.tt>td+td.ct>button*2 -->
<table class="all">

    <!-- 大分類 START -->
    <?php
    // 找到所有parent=0的大分類，並給予name排序
    $bigs=$Type->all(['parent'=>0],"ORDER BY name");
        foreach ($bigs as $key => $big) {
    ?>
    <tr class="tt">
        <td><?=$big['name'];?></td>
        <td class="ct">
            <button onclick="edit('<?=$big['id'];?>')">修改</button>
            <button onclick="del('type','<?=$big['id'];?>')">刪除</button>
        </td>
    </tr>
    <!-- 大分類 END -->
    
    <!-- 中分類 START -->
    <?php
    // 透過id欄位確認mid所屬的大分類
    $mids=$Type->all(['parent'=>$big['id']]);
    if(count($mids)>0){
        foreach ($mids as $key => $mid) {
    ?>
    <!-- tr.pp.ct>td*2 -->
    <tr class="pp ct">
        <td><?=$mid['name'];?></td>
        <td>
            <button onclick="edit('<?=$mid['id'];?>')">修改</button>
            <button onclick="del('type','<?=$mid['id'];?>')">刪除</button>
        </td>
    </tr>
    <!-- 中分類 END -->
    <?php
        }
    }
    }
    ?>
</table>
<hr>
<h1 class="ct">商品管理</h1>
<div class="ct">
    <button>新增商品</button>
</div>
<!-- emmet -->
<!-- table.all>tr.tt.ct>td*5 -->
<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <tr class="pp ct">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <button>修改</button>
            <button onclick="del('type','id')">刪除</button>
            <button>上架</button>
            <button>下架</button>
        </td>
    </tr>
</table>

<script>
    $("#parent").load("api/get_big.php");

    function newType(type){
        let name, parent;
        switch(type){
            case "big":
                name=$("#big").val();
                parent=0;
                break;
            case "mid":
                name=$("#mid").val();
                parent=$("#parent").val();
                break;
        }
        $.post("api/save_type.php",{name,parent},(res)=>{
            // 沒有回傳值所以log一片空白
            // console.log(res);
            location.reload();
        })
    }

    // function newBig(){
    //     let big=$("#big").val();
    //     $.post("api/new_big.php",{name:big,parent:0},(res)=>{
    //         // console.log(res);
    //         location.reload();
    //     })
    // }
    // function newMid(){
    //     let parent=$("#parent").val();
    //     let mid=$("#mid").val();
    //     $.post("api/new_mid.php",{name:mid,parent},(res)=>{
    //         // console.log(res);
    //         location.reload();
    //     })
    // }
</script>