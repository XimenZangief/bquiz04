<?php
// 因為只用到session，不需要特地呼叫base
session_start();

echo $_POST['ans']==$_SESSION['ans'];
// if($_POST['ans']==$_SESSION['ans']){
//     echo 1;
// }else{
//     echo 0;
// }

?>