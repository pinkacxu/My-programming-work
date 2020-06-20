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
$_SESSION["tpmei"]="kicty";
require("conn(test).php");

?>

 <?php
 
?>
<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<style> @font-face{
font-family:fontjp;
src:url('image/DFRULA5.TTF');}
body{ font-family:fontjp;
    background-size: cover;
	<!--text-align:center;-->
    overflow:hidden;
    background-attachment: fixed;
    background:url(image/bg.png) no-repeat top center;
	background:#f8f8f8;
	border: 0;
    margin: 0;
    padding: 0 24px;
		}
		h1{text-align: center;font-weight:bold;}
		a{text-align: center;}
		.sagasu{text-align: center;}
		.navnavbar-nav{text-align: center;}

  </style>
<script>
  function del(){ 
    var msg="本当に削除しますか？"
if(confirm(msg)==true){

  return true;
}else{
  
  return false;
}}
</script>

</head>
<body>
<div class="container" ><h1>キッチン瑞穂</h1></div>
  <div class="navbar navbar-inverse">
    <div class="navnavbar-nav">
      <ul class="navnavbar-nav">
      <li><a href="logout.php">logout</li>
      
      <li><a href="create.php?tpmei=kicty">評価追加</a></li>
      
    </ul>
    </div>
</div>

  
     
        
        <ul class="nav nav-tabs nav-stacked">
          <li><a href="read.php">Home</li>
          
		  <?php
		  echo '<li><a>'.@$_SESSION['Uname'].'さんようこそ</a></li>';
		  ?>
        </ul>


    <br>
<div class="sagasu">
 <form method="GET" action="search.php">
<select name="type1">
  <option value="user">作者</option>
  <option value="subject">表題</option>
</select>
<input name="messege1" >
<button type="submit" name="submit">探す</button>
</form>
</div>
  

<ul class="container">


  <?php
  

  $result = $conn->query(
  "SELECT * FROM kicty"
  );


  $allrows = $result->fetchAll(PDO::FETCH_ASSOC);	
foreach($allrows as $row){

  echo ' <il id="content" class="col-md-4 
  " style="background:white;    list-style: none ; width:1200;height:160
  ; color:black;0 list-style: none;">';
 

echo '<h2><span></span>'.$row['subject'].'</h2><div class="clr"></div>';



echo '<p class="text-justify">内容：'.$row['body'].'</p>';
echo'<p>評価:'.$row['est'].'</p>';
echo '</il>';
echo '<p>名前:'.$row['name'].'<p>発表時間:'.$row['date'].'</p>';'</p>';

}

?>
</ul>
 </div>
  </script>

</body>
</html>