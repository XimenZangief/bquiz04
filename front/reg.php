<h1 class="ct">會員註冊</h1>
<!-- emmet -->
<!-- table.all>tr*6>td.tt.ct+td.pp>input:text -->
<table class="all">
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp">
            <input type="text" name="acc" id="acc">
            <button onclick="chkAcc()">檢測帳號</button>
        </td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
    <tr>
        <td class="tt ct">住址</td>
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
</table>
<div class="ct">
    <button onclick="reg()">註冊</button>
    <button onclick="reset()">重置</button>
</div>

<script>
    // 單純判定帳號是否已存在
    function chkAcc(){
        $.post("api/chk_acc.php",{acc:$("#acc").val()},(chk)=>{
            console.log(chk);
            // 確保回傳的chk為整數型態
            // chk為1  或  $("#acc").val()為admin時拒絕註冊
            if(parseInt(chk) || $("#acc").val()=='admin'){
                alert("帳號已存在");
            }else{
                alert("此帳號可使用");
            }
        })
    }

    // 使用ajax傳輸並檢查帳號是否存在
    function reg(){
        // 取得各註冊欄位的值
        let data={
            acc:$("#acc").val(),
            pw:$("#pw").val(),
            name:$("#name").val(),
            addr:$("#addr").val(),
            tel:$("#tel").val(),
            email:$("#email").val(),
        };
        console.log(data);
        // 檢查會員帳號是否已經存在
        $.post("api/chk_acc.php",{acc:data.acc},(chk)=>{
            console.log(chk);
            // 確保回傳的chk為整數型態
            // chk為1  或  data.acc為admin時拒絕註冊
            if(parseInt(chk) || data.acc=="admin"){
                alert("帳號已存在");
            }else{
                $.post("api/reg.php",data,()=>{
                    alert("註冊成功，舒服，回登入頁");
                    location.href="?do=login";
                });
            }
        })
    }
</script>