<?php
// 取得type值，GET有給就使用，否則傳0(全部商品)
$type=$_GET['type']??0;
if($type==0){
    $nav="全部商品";
}else{
    $big=$Type->find($type);
    // 如果$big['parent']為0則為大分類，否則為中分類
    if($big['parent']==0){
        $nav=$big['name'];
    }else{
        // 透過$big['parent']找出中分類
        $mid=$Type->find($big['parent']);
        $nav=$big['name'] ." > ". $mid['name'];
    }
}

?>

<h1><?=$nav;?></h1>

商品區