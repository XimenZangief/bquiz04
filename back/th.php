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
    // 找到所有parent=0的大分類，並給予name排序(預設ASC升序)
    $bigs=$Type->all(['parent'=>0],"ORDER BY name");
        foreach ($bigs as $key => $big) {
    ?>
    <tr class="tt">
        <td><?=$big['name'];?></td>
        <td class="ct">
            <!-- HTML的this: 當下的元素(含內容) -->
            <button onclick="edit(this,'<?=$big['id'];?>')">修改</button>
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
            <button onclick="edit(this,'<?=$big['id'];?>')">修改</button>
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
    <button onclick="location.href='?do=add_goods'">新增商品</button>
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
            <button onclick="location.href='?do=edit_goods'">修改</button>
            <button onclick="del('type','id')">刪除</button>
            <button onclick="show()">上架</button>
            <button onclick="show()">下架</button>
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

    function edit(dom,id){
        let text= $(dom).parent().prev().text();
        let name = prompt("請輸入要修改的分類文字",text);
        if(name!=null){
            $.post("/api/save_type.php",{id,name},(res)=>{
                // location.reload();
                // 存到SQL後直接更改text/選單內容
                // 因為type表內的id欄位絕對不會重複故使用id抓內容
                $(dom).parent().prev().text(name);
                $(`#parent option[value='${id}']`).text(name);
            })
        }
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