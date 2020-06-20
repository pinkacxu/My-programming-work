<?php
session_start();
if(empty($_SESSION["Id"])) {
  header("location:web3 blog/login.html");
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

    <head>
        <meta charset="UTF-8">
        <title>MY page</title>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
      
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </head>
    <style type="text/css">
        body {
            padding: 20px;
        }

        .headLeft {
            float: left;
        }

        .headRight {
            padding-top: 40px;
            padding-left: 340px;
        }

        .search {
            margin-bottom: 10px;
        }

        .search .toolbar {}
    </style>


    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-fixed-top" role="navigation">
                        <div class="container">
                            <div class="navbar-header">
                                <a class="navbar-brand " href="#">MY page</a>
                            </div>
                            <div id="navbar" class="navbar-right">
                                <a class="navbar-brand" href="#">USER:</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row" style="padding-top: 45px">
                <div class="col-md-3">
                    <div class="list-group">
                  
                        <a href="#" class="list-group-item active ">
                            メニュー
                        </a>
                        <a href="#" class="list-group-item">商品CREATE</a>
                       <a href="createaddr.php" class="list-group-item">連絡方式記入</a>
                        <a href="nowchange.php" class="list-group-item">交換手続き</a>
                        <a href="endchangepage.php" class="list-group-item">交換完了</a>
                        <a href="logout.php" class="list-group-item">退出</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div>
                        <ol class="breadcrumb">
                            <li><span class="glyphicon glyphicon-home"></span> 
                                <a href="shopread.php">HOME PAGE</a>
                            </li>
                            <li class="active"></li>
                        </ol>
                    </div>
                    <div align="center" style="padding-top: 50px;">
                        <h1>MY page</h1>
                        <h2>請求受ける結果</h2>
                        <?php
$s = $conn->prepare("select * from `endchange` where usernum=?");
$s->bindValue(1,$Id);
$s->execute();
$rowsells = $s->fetchAll(PDO::FETCH_ASSOC);	
$counti = $s->rowCount();
    if($counti>=1){
       
foreach($rowsells as $row){
   
    echo'<div>購入時間'.$row['modified'].'</div><br>';
    echo '<div> 購入したもの: '.$row['cargoname'].'商品番号:'.$row['cargonum'].' 商品名:'.$row['cargoname'].' 商品紹介:'.$row['cargoarticle'].' 昔の販売価格:'.$row['price'].'</div>';
    echo '<form method="POST" action="address.php" >
    <input type="hidden" name="cargon-addr" value="'.$row['cargonum'].'"> 
    <button type="submit">交換相手の連絡方式を表示</button></form>';
    
}}else{
        
        echo '<div>購入したものがない</div>';
        
    }

    
   
?>
<h2>請求を申し込んた結果</h2>
<?php
$s1 = $conn->prepare("select * from `endchange` where notmynum=?");
$s1->bindValue(1,$Id);
$s1->execute();
$rowsells1 = $s1->fetchAll(PDO::FETCH_ASSOC);	
$counti1= $s1->rowCount();
if($counti>=1){
foreach($rowsells1 as $row1){
echo'<div>交換完了,'.$row1['usernum'].'さんはあなたの交換条件を許可しました</div><br>';
echo'<div>交換完了時間'.$row1['modified'].'</div><br>';
    echo '<div> 交換完了したもの: '.$row1['cargoname'].'</div>';

    
}}else{
        
    echo '<div>交換完了したものがない</div>';}
  
?>


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div align="center" style="padding-top: 200px">
                    
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
