<?php
$conn=null;
session_start();
require("conn(test).php");
$cname=$_SESSION["userID"];

$res = $conn->prepare("SELECT * FROM `users` WHERE userID=:userID ");
    $res->bindValue(':userID',$cname);
    $res->execute();
    foreach($res as $row){
    $Id=$row['id'];}
    $_SESSION["Id"]=$Id;

$namae="記入必要";
$tel="記入必要";
$addr="記入必要";
$r1=$conn->prepare("INSERT INTO `address`(`id`, `namae`, `tel`,`addr`) VALUES (?,?,?,?)");
    $r1->bindValue(1,$Id);
    $r1->bindValue(2,$namae);
    $r1->bindValue(3,$tel);
    $r1->bindValue(4,$addr);
    $result=$r1->execute();

    echo "<script>location.href='MyPage.php';</script>";
    ?>