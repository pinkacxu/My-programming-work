<?php
$conn = null;
session_start();
$myexnum=$_POST['myexnum'];
$wantbuy=$_POST['num'];
require("conn(test).php");
$resif = $conn->query(
    "SELECT * FROM exchange where sellnum=$myexnum and ansellnum=$wantbuy");
    $counti = $resif->rowCount();
    if($counti!==1){
    

    
$anusernum=null;
$r = $conn->prepare("INSERT INTO `exchange`( sellname, sellarticle, usernum, sellnum, modified, price ) 
SELECT sellname, sellarticle, usernum, sellnum, modified, price FROM shopread WHERE sellnum =?");
$r->bindValue(1,$myexnum);
$r->execute();
$s = $conn->prepare("select * from `shopread` where sellnum=?");
$s->bindValue(1,$wantbuy);
$s->execute();
$allrows = $s->fetchAll(PDO::FETCH_ASSOC);	
foreach($allrows as $row){
    $anusernum=$row['usernum'];}

$e = $conn->prepare("update `exchange` set anusernum=?,ansellnum=?   where sellnum=?");
$e->bindValue(1,$anusernum);
$e->bindValue(2,$wantbuy);
$e->bindValue(3,$myexnum);
$e->execute();
$count = $e->rowCount();
if($count==1){
echo "<script>alert('成功');location.href='shopread.php'</script>";}}
else{
    echo "<script>alert('もうほかの誰と交換しています、今は交換できません');location.href='shopread.php'</script>";
}
?>