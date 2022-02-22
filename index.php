<?php include_once "base.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <title>┌精品電子商務網站」</title>
  <link href="./css/css.css" rel="stylesheet" type="text/css">
  <script src="./js/js.js"></script>
  <script src="./js/jquery.js"></script>
</head>

<body>
  <iframe name="back" style="display:none;"></iframe>
  <div id="main">
    <div id="top">
      <a href="index.php">
        <img src="./icon/0416.jpg">
      </a>
      <div style="padding:10px;">
        <a href="index.php">回首頁</a> |
        <a href="?do=news">最新消息</a> |
        <a href="?do=look">購物流程</a> |
        <a href="?do=buycart">購物車</a> |
        <a href="?do=login">會員登入</a> |
        <a href="?do=admin">管理登入</a>
      </div>
      <marquee>
        年終特賣會開跑了 &nbsp;&nbsp;&nbsp;&nbsp; 情人節特惠活動
      </marquee>
    </div>
    <div id="left" class="ct">
      <div style="min-height:400px;">
        <div class="ww">
          <a href="#">
            全部商品(<?= $Goods->math('count', '*', ['sh' => 1]); ?>)
          </a>
        </div>

        <?php
        $bigs = $Type->all(['parent' => 0]);
        foreach ($bigs as $big) {
          echo "<div class='ww'>";
          // 帶個大分類參數進來
          echo "  <a href='?type={$big['id']}'>";
          echo      $big['name'];
                    // 算出sh=1的big的總數
          echo "    ({$Goods->math('count','*',['big'=>$big['id'],'sh'=>1])})";
          echo "  </a>";
          $mids = $Type->all(['parent' => $big['id']]);
          if (!empty($mids)) {
            foreach ($mids as $mid) {
              echo "<div class='s'>";
              // 帶個中分類參數進來
              echo "  <a href='?type={$mid['id']}' style='margin-left:100px;background:lightgreen;'>";
              echo      $mid['name'];
                        // 算出sh=1的mid的總數
              echo "    ({$Goods->math('count','*',['mid'=>$mid['id'],'sh'=>1])})";
              echo "  </a>";
              echo "</div>";
            }
          }
          echo "</div>";
        }
        ?>
      </div>
      <span>
        <div>進站總人數</div>
        <div style="color:#f00; font-size:28px;">
          00005 </div>
      </span>
    </div>
    <div id="right">
      <?php
      $do = $_GET['do'] ?? 'main';
      $file = "front/" . $do . ".php";
      if (file_exists($file)) {
        include $file;
      } else {
        echo "檔案不存在";
        include "front/main.php";
      }
      ?>
    </div>
    <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
      <?= $Bottom->find(1)['bottom']; ?>
    </div>
  </div>

</body>

</html>