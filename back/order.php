<!-- copy from mem.php -->
<div class="ct">
    訂單管理
</div>
<!-- emmet -->
<!-- table.all.ct>tr.tt.+tr.pp -->
<table class="all ct">
    <tr class="tt">
        <td>訂單編號</td>
        <td>金額</td>
        <td>會員帳號</td>
        <td>姓名</td>
        <td>下單時間</td>
        <td>操作</td>
    </tr>

    <?php
    $rows=$Ord->all();
    foreach ($rows as $row) {
    ?>
    <tr class="pp">
        <td><?=$row['no'];?></td>
        <td><?=$row['total'];?></td>
        <td><?=$row['acc'];?></td>
        <td><?=$row['name'];?></td>
        <td><?=date("Y/m/d",strtotime($row['orddate']));?></td>
        <td>
            <!-- js內的del(table,id) -->
            <button onclick="del('member',<?=$row['id'];?>)">刪除</button>
            <?php
            }
            ?>
        </td>
    </tr>
    
</table>