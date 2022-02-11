<h1 class="ct">新增管理帳號</h1>
<!-- emmet -->
<!-- table.all>tr*3>td.tt.ct+td.pp>input:text -->
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
<div>
<button onclick="addAdmin()">新增</buttom>
<button onclick="reset()">重置</button>
</,3,33>
<script>
    function reset(){
        $("#acc,#pw").val("");
        // prop 指定checked為true/false
        $("input[type='checkbox']").prop('checked',false);
    }

    function addAdmin(){
        let pr=new Array();
        $("input[type='checkbox']").each((idx,dom)=>{
            pr.push($(dom).val());
        })
        $.post("api/save_admin.php",{acc:$("acc").val(),pw:$("#pw").val(),pr},()=>{
            location.href="?do=admin";
        })
    }
</script>