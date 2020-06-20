<?php
$creatething=$_POST['sellnum'];
$createuser=$_POST['selluser'];
$rething=$_POST['besellnum'];
$reuser=$_POST['beselluser'];
session_start();
if(empty($_SESSION["Id"])) {
  header("location:login.html");
  exit;
}
$conn = null;
$userID=$_SESSION["userID"];
$Uname=$_SESSION["Uname"];
$Id=$_SESSION["Id"];
require("conn(test).php");


$re = $conn->prepare(
  "SELECT * FROM endchange where usernum=? and cargonum=? ");
  $re->bindValue(1,$reuser);
  $re->bindValue(2,$creatething);
  $countend=$re->execute();
  $c=$re->rowCount();
  $re2 = $conn->prepare(
    "SELECT * FROM endchange where  usernum=? and cargonum=? ");
    $re2->bindValue(1,$createuser);
    $re2->bindValue(2,$rething);
    $countend2=$re2->execute();
    $c2=$re2->rowCount();
  if($c==0 and $c2==0){    



$res1 = $conn->prepare(
  "SELECT * FROM exchange where usernum=? and sellnum=?");
  $res1->bindValue(1,$createuser);
  $res1->bindValue(2,$creatething);
$count1=$res1->execute();
if($count1>0){
$res_1=$res1->fetchAll(PDO::FETCH_ASSOC);	
foreach($res_1 as $row1){
  $usernum=$row1['usernum'];
  
  echo '<div>本人番号:'.$usernum.'様の商品:'.$row1['sellname'].'と 御本人番号:'.$reuser.'様の商品番号:'.$rething.'の商品と交換しました!</div>';

}}else{
  echo'交換できる商品がない!';
}

$res1 = $conn->prepare(
  "UPDATE shopread SET usernum=? WHERE usernum =? and sellnum=?");
  $res1->bindValue(1,$reuser);
  $res1->bindValue(2,$createuser);
  $res1->bindValue(3,$creatething);
$count1=$res1->execute();

$res1 = $conn->prepare(
  "UPDATE shopread SET usernum=? WHERE usernum =? and sellnum=?");
  $res1->bindValue(1,$createuser);
  $res1->bindValue(2,$reuser);
  $res1->bindValue(3,$rething);
$count1=$res1->execute();



   

$r = $conn->prepare("INSERT INTO `endchange`( cargoname, cargoarticle, usernum, cargonum , price ) 
SELECT sellname, sellarticle, usernum, sellnum,  price FROM shopread WHERE sellnum =? and  usernum=?");
$r->bindValue(1,$creatething);
$r->bindValue(2,$reuser);
$r->execute();
$r = $conn->prepare("INSERT INTO `endchange`( cargoname, cargoarticle, usernum, cargonum , price ) 
SELECT sellname, sellarticle, usernum, sellnum,  price FROM shopread WHERE sellnum =? and  usernum=?");
$r->bindValue(1,$rething);
$r->bindValue(2,$createuser);
$r->execute();


$r = $conn->prepare("DELETE FROM `exchange` WHERE  sellnum=? and usernum=?  and ansellnum=? and anusernum=?");
  $r->bindValue(1,$creatething);
  $r->bindValue(2,$createuser);
  $r->bindValue(3,$rething);
  $r->bindValue(4,$reuser);
  $r->execute();
  
  if($r==true){
  echo "<script>alert('削除成功');</script>";
  }else{
    echo "<script>alert('削除できない');</script>";
  }
  
  $r = $conn->prepare("DELETE FROM `shopread` WHERE  sellnum=? and usernum=? ");
  $r->bindValue(1,$creatething);
  $r->bindValue(2,$reuser);
  $r->execute();

  $r = $conn->prepare("DELETE FROM `shopread` WHERE  sellnum=? and usernum=? ");
  $r->bindValue(1,$rething);
  $r->bindValue(2,$createuser);
  $r->execute();
  
  $r = $conn->prepare(
    "UPDATE endchange SET notmynum=? WHERE usernum =? and cargonum =?");
    $r->bindValue(1,$createuser);
    $r->bindValue(2,$reuser);
    $r->bindValue(3,$creatething);
  $r->execute();
  
  $r = $conn->prepare(
    "UPDATE endchange SET notmynum=? WHERE usernum =? and cargonum =?");
    $r->bindValue(1,$reuser);
    $r->bindValue(2,$createuser);
    $r->bindValue(3,$rething);
  $r->execute();

  }else{
    
    echo '交換したことがあるものにもう一度交換することができません';
  }


  


?>
<button type="button"  onclick="location.href='endchangepage.php'">購入したもの表示に戻る</button>

