<?php
session_start();

$conn = null;
$userID=$_SESSION["userID"];
$Uname=$_SESSION["Uname"];
$Id=$_SESSION["Id"];
require("conn(test).php");

?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
      <meta charset="utf-8">
    
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>MY：ホームページ</title>
      <link href="CSS/bootstrap.min.css" rel="stylesheet">
      <style type="text/css">
        .body {
    display: block;  
    margin-left: auto;  
    margin-right: auto; 
    float: none; 
    width:1000px;
}
           body { padding-top: 70px; }


          .dropdowncolor {
              background-color: #d15710;
              color: white;
              font-weight: bold;
          }

          .carousel-inner .item img {
              height: 400px;
              width: 100%;
          }
         
          .img-circle {
              width: 250px;  
          }
         
          #copyright {
              background-color: #422424;
              height: 100px;
              color: #7a7575;
              text-align: center;
              font-size: 10px;
              padding-top: 6px;
          }
      </style>
      <script src="JS/jquery-3.3.1.min.js"></script>

 
      <script src="JS/bootstrap.min.js"></script>
  </head>
   <body>
       
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                
                <div class="navbar-header">
                   
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">ホームページ</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">料理分野 <span class="sr-only">(current)</span></a></li>
                        <li class="dropdown">
                  
                            
                        </li>
                      
                        <li><a href="managepage.php">個人PAGE</a></li>
                        <li><a href="shopread.php">購入システムへ</a></li>

                    </ul>
           
                    <!--<form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn navbar-btn">検索</button>
                    </form>-->
              
                    <ul class="nav navbar-nav navbar-right">
                    <?php if(isset($_SESSION['username'])and
                    isset($_SESSION["Id"])){
                        echo '<li><a href="login.html">まだ登録してない、登録ページへ</a></li>';}else{echo '<li style="color:white;">'.$Uname.'さんようこそ</li>';}
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
      <div class="body">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
           
            <ol class="carousel-indicators">
                
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

    
            <div class="carousel-inner" role="listbox" >
            
                <div class="item active" >
                    <img src="Images/1.jpg" alt="料理">
                    <div class="carousel-caption">
                     
                        <h4>なんでも注文できる</h4>
                    </div>
                </div>
                <div class="item">
                    <img src="Images/2.jpg" alt="料理2">
                    <div class="carousel-caption">
                        <h4></h4>
                    </div>
                </div>
                <div class="item">
                    <img src="Images/3.jpg" alt="料理3">
                    <div class="carousel-caption">
                        <h4></h4>
                    </div>
                </div>
                <div class="item">
                    <img src="Images/4.jpg" alt="料理4">
                    <div class="carousel-caption">
                        <h4></h4>
                    </div>
                </div>
            </div>

     
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
   
       <div class="container">
      
           <div class="row">
               <h2>料理分野</h2>
           </div>
           <div class="row">
               
               <div class="col-sm-3">
                  
                   <img src="Images/中华料理.jpg"  class="img-thumbnail" alt="中華料理"/>
                   <h3>中華料理</h3>
                   <p>中国で食べられてきた料理、またはその技法や調味料を使用して作られた料理。</p>
                   <p><a href="chinese.php" class="btn btn-success" role="button">詳細</a></p>
               </div>
               <div class="col-sm-3">
                   <img src="Images/日本料理.jpg" class="img-thumbnail" alt="日本料理" />
                   <h3>日本料理</h3>
                   <p>日本の風土と社会で発達した料理をいう。洋食に対して和食とも呼ぶ。</p>
                   <p><a href="japanese.php" class="btn btn-success" role="button">詳細</a></p>
               </div>
            
             
           </div>
           <div class="row">
               <div class="col-sm-3">
                  
                   <img src="Images/西餐.jpg"  class="img-circle" alt="ヨーロッパ料理"/>
                   <h3>ヨーロッパ料理</h3>
                   <p>ヨーロッパ各地の料理を一覧に示す。</p>
                   <p><a href="Europa.php" class="btn btn-success" role="button">詳細</a></p>
               </div>
               
              
           </div>
     


       <div  id="copyright">
           <p style="margin-top:10px"> 登録</p>
           <p> </p>
            <p> メール：pinkacxu@gmail.com </p>
       </div>
      

  </body>
</html>
