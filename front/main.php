<?php
// 取得type值，GET有給就使用，否則傳0(全部商品)
$type = $_GET['type'] ?? 0;
if ($type == 0) {
    $nav = "全部商品";
    $rows = $Goods->all(['sh' => 1]);
} else {
    $t = $Type->find($type);
    // 如果$t['parent']為0則為大分類，否則為中分類
    if ($t['parent'] == 0) {
        $nav = $t['name'];
        $rows = $Goods->all(['sh' => 1, 'big' => $type]);
    } else {
        // 因為$t['parent']是中分類，則透過它找大分類
        $b = $Type->find($t['parent']);
        $nav = $b['name'] . " > " . $t['name'];
        $rows = $Goods->all(['sh' => 1, 'mid' => $type]);
    }
}

?>

<h1><?= $nav; ?></h1>

商品區
<?php
foreach ($rows as $row) {
?>
    <div class="all" style="display:flex; justify-content:center;">
        <div class="pp ct" style="padding:10px; width:40%">
            <!-- 點商品圖片進入詳細頁面 -->
            <a href="?do=detail&id=<?= $row['id']; ?>">
                <img src="../icon/<?= $row['img']; ?>" style="width:70%;">
            </a>
        </div>
        <div class="pp" style="width:60%;">
            <div class="tt ct"><?= $row['name']; ?></div>
            <div>價錢：<?= $row['price']; ?>
                <!-- 到buycart頁面同時傳$_GET商品id和預設數量1 -->
                <a href="?do=buycart&id=<?= $row['id']; ?>&qt=1" style="float:right;">
                    <img src="icon/0402.jpg" alt="">
                </a>
            </div>
            <div>規格：<?= $row['spec']; ?></div>
            <!-- 因為簡介沒有全部印出，故用substr取一部份 -->
            <div>簡介：<?= mb_substr($row['intro'], 0, 20); ?>...</div>
        </div>
    </div>

<?php
}
?>