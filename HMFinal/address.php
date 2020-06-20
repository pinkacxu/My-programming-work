<?php
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

?>
<!DOCTYPE html>
<html>
<?php 

$cargo="";
$name="";
$cargonum=$_POST['cargon-addr'];
echo'<div>商品番号:'.$cargonum.'</div>';
    $reskey1 = $conn->query(
        "SELECT * FROM `endchange`  where $cargonum=`cargonum`");
        $re1 =$reskey1->fetchAll(PDO::FETCH_ASSOC);
        $count1 = $reskey1->rowCount();
        if($count1>=1){
        foreach($re1 as $row1){
            $cargo=$row1['notmynum'];}}
    $reskey2 = $conn->query(
        "SELECT * FROM `address`  where $cargo=`id`");
        $re2 = $reskey2->fetchAll(PDO::FETCH_ASSOC);
        $count2 = $reskey2->rowCount();
        if($count2>=1){
        foreach($re2 as $row2){
        $name=$row2['namae'];
        echo'<div>実名前:'.$row2['namae'].'</div>,<div>電話:'.$row2['tel'].'</div>,<div>実住所:'.$row2['addr'].'</div>.';
        }}
    
    ?>
    </html>