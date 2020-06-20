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
                        <h1>交換手続き</h1>
<?php
$s = $conn->prepare("select * from `exchange` where usernum=?");
$s->bindValue(1,$Id);
$s->execute();
$rowsells = $s->fetchAll(PDO::FETCH_ASSOC);	
$counti = $s->rowCount();
    if($counti>=1){
foreach($rowsells as $row){
    echo'<div>'.$row['modified'].'</div><br>';
    echo '<div>あなたから交換をもし込んだもの:商品番号:'.$row['sellnum'].'商品名:'.$row['sellname'].'              商品紹介:'.$row['sellarticle'].'昔の販売価格:'.$row['price'].'</div><br>
    <div>交換したいもの:商品を持っている人の番号:'.$row['anusernum'].'交換したいの商品番号:'.$row['ansellnum'].'</div>';}}else{
        echo '<div>あなたから交換をもし込んだものがない</div>';
    }
   
?>
<br><hr><br><br>
<?php
$s = $conn->prepare("select * from `exchange` where anusernum=?");
$s->bindValue(1,$Id);
$s->execute();
$rowsells = $s->fetchAll(PDO::FETCH_ASSOC);	
$counti = $s->rowCount();
    if($counti>=1){
foreach($rowsells as $row){
    echo'<div>'.$row['modified'].'</div><br>';
    echo '<div>他の人から交換をもし込んだもの:商品番号:'.$row['sellnum'].'商品名:'.$row['sellname'].'                商品紹介:'.$row['sellarticle'].'昔の販売価格:'.$row['price'].'/div><br>
    <div>個人番号は['.$row['usernum'].']の人はあなたの商品の中に　番号:'.$row['anusernum'].'商品番号:'.$row['ansellnum'].'の商品がほしいです</div>';
    echo '<div><form method="POST" action="endchange.php">
    <input type="hidden" name="sellnum" value="'.$row['sellnum'].'">
    <input type="hidden" name="selluser" value="'.$row['usernum'].'"> 
    <input type="hidden" name="besellnum" value="'.$row['ansellnum'].'"> 
    <input type="hidden" name="beselluser" value="'.$row['anusernum'].'"> 
    <button type="submit">交換</button></form></div><div><button type="button">キャンセル</button></form></div>';
    echo '</div>';}}else{
        echo '<div>あなたに交換をもし込んだ人がいない</div>';
        
    }
   
    
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

