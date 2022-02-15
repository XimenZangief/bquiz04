<!-- copy from admin.php -->
<div class="ct">
    會員管理
</div>
<!-- emmet -->
<!-- table.all.ct>tr.tt.+tr.pp -->
<table class="all ct">
    <tr class="tt">
        <td>姓名</td>
        <td>帳號</td>
        <td>註冊日期</td>
        <td>操作</td>
    </tr>

    <?php
    $rows=$Member->all();
    foreach ($rows as $row) {
    ?>
    <tr class="pp">
        <td><?=$row['name'];?></td>
        <td><?=$row['acc'];?></td>
        <td><?=date("Y/m/d",strtotime($row['regdate']));?></td>
        <td>
            <button onclick="location.href='?do=edit_mem&id=<?=$row['id'];?>'">修改</button>
            <!-- js內的del(table,id) -->
            <button onclick="del('member',<?=$row['id'];?>)">刪除</button>
            <?php
            }
            ?>
        </td>
    </tr>
    
</table>