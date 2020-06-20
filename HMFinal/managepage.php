<!DOCTYPE html>
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
<html>

    <head>
        <meta charset="UTF-8">
        <title>管理</title>
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
                                <a class="navbar-brand " href="MyPage.php">HOME PAGE</a>
                            </div>
                            <div id="navbar" class="navbar-right">
                                <a class="navbar-brand" href="#">USER:<?php echo $Uname;?></a>
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
                        <a href="create.php" class="list-group-item">商品CREATE</a>
                        <a href="#" class="list-group-item">商品DELETE</a>
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
