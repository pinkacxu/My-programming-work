<?php
$conn = null;
session_start();
$Id=@$_SESSION['Id'];
$userID=@$_SESSION['userID'];
$Uname=@$_SESSION['Uname'];
require("conn(test).php");
?>
<br><br><br>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />

	  
  <style> @font-face{
font-family:fontjp;
src:url('image/DFRULA5.TTF');}
body{ font-family:fontjp;


 font-size:20px;


		}

.namelogin{text-align:right;}
h3{ text-align:center;
font-size:50px;}

  </style>
</head>
<body>
  <div class="namelogin">
<?php

echo '<div>'.@$_SESSION['Uname'].'さん.ようこそ<div>';
?>
<p><a href="logout.php"><button name="logout">logout</button></a></p>
</div>
<div class="container">
 <h3>新商品追加</h3>
	</div>
 <table border="1" align="center" width=40% class="table">

    <tr bgcolor="black">
	<form method="POST" action="shopcreate.php" enctype="multipart/form-data">

			<tr><td bgcolor="#cccccc">商品名:<input name="sellname" style="width:300px"></td></tr>
			<tr><td>紹介文:<input name="sellarticle" style="width:2100px;height:500px"></td></tr>
			<tr><td bgcolor="#cccccc"></td></tr>
			<tr><td>価格:<input name="price" style="width:300px"></td></tr>
			<tr><td>写真アップロード:<input type="file" name="img" size="40"><br></td></tr>
			<tr><td><button type="submit"  name="submit" onclick="alert('提出しました!!!')">提出</button></td></tr>
	</form>

	</table>
	<div>


</div>

</body>
</html>
<?php
$sellname=null;
$sellarticle=null;
$price=null;
$imgnum=null;
if(isset($_POST['submit'])){
$sellname=$_POST['sellname'];
$sellarticle=$_POST['sellarticle'];
$price=$_POST['price'];

$image = file_get_contents($_FILES['img']['tmp_name']); 
$type = $_FILES['img']['type'];



$r=$conn->prepare("INSERT INTO `shopread`(`sellname`,`sellarticle`,`usernum`,`price`) VALUES (?,?,?,?)");
$r->bindValue(1,$sellname);
$r->bindValue(2,$sellarticle);
$r->bindValue(3,$Id);
$r->bindValue(4,$price);
$r->execute();

$resimg = $conn->query(
	"SELECT MAX(sellnum) FROM shopread "
	);
	$load= $resimg->fetchAll(PDO::FETCH_ASSOC);
	foreach($load as $row){
	
	$imgnum=$row['MAX(sellnum)'];}
	
$res=$conn->prepare("INSERT INTO `img` (`imgnum`,`imgdata`,`imgtype`) VALUES (?,?,?)");
$res->bindValue(1,$imgnum);
$res->bindValue(2,$image);
$res->bindValue(3,$type);
$res->execute();
}

?>
	<button type="button" onclick="location='shopread.php'">READ pageに戻る</button>

