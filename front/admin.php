<h1>管理登入</h1>
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
        <td class="tt ct">驗證碼</td>
        <td class="pp">
            <?php
            $a = rand(10, 99);
            $b = rand(10, 99);
            $_SESSION['ans'] = $a + $b;
            echo $a . "+" . $b . "=";
            ?>
            <input type="text" name="ans" id="ans">
        </td>
    </tr>
</table>
<div class="ct">
    <button onclick="login()">確認</button>
</div>

<script>
    function login() {
        $.post("api/chk_ans.php", {
            ans: $("#ans").val()
        }, (chk) => {
            if (parseInt(chk)) {
                $.post("api/chk_pw.php", {
                        // 由於後台有權限問題，有admin與member兩張資料表，此處指定後台資料表
                        table:'admin',
                        acc: $("#acc".val()),
                        pw: $("#pw".val())
                    },
                    (check) => {
                        if (parseInt(check)) {
                            // 題目要求登入後進管理者頁面
                            location.href = "back.php";
                        } else {
                            alert("帳號或密碼錯誤");
                        }
                    })
            } else {
                alert("對不起，您輸入的驗證碼有誤，請重新輸入");
            }
        })
    }
</script>