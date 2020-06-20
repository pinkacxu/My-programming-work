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
    background-size: cover;
	text-align:center;
    overflow:hidden;
    background-attachment: fixed;
    background:url(image/bg.png) no-repeat top center;
	color:red;
		}
  </style>
</head>
<body>

<?php

echo '<div>'.@$_SESSION['Uname'].'さん.ようこそ<div>';
?>

<div class="container">
 <h3>連絡方式記入</h3>
	</div>
 <table border="1" align="center" width=40% class="table">

    <tr bgcolor="black">
	<form method="POST" action="createaddr.php" enctype="multipart/form-data">
   <th class="white">自分の資料</th><th class="white" >名前など必要</th><tr></tr></tr>

			<tr><td bgcolor="#cccccc">名前<input name="namae" style="width:300px"></td></tr>
			<tr><td>電話:<input name="tel" style="width:300px"></td></tr>
			<tr><td bgcolor="#cccccc"></td></tr>
			<tr><td>住所:<input name="addr" style="width:300px;height:200px;"></td></tr>
			<tr><td><button type="submit"  name="submit" onclick="alert('提出しました!!!')">提出</button></td></tr>
	</form>
	<button type="button" onclick="location='shopread.php'">READ pageに戻る</button>
	</table>
	<div>
	<div><?php 
   $res = $conn->query(
	"SELECT * FROM `address`  where $Id=`id`");
	$re =$res->fetchAll(PDO::FETCH_ASSOC);
	$count1 = $res->rowCount();
	if($count1>=1){
	foreach($re as $row){
		echo'<div>実名前:'.$row['namae'].'</div>,<div>電話:'.$row['tel'].'</div>,<div>実住所:'.$row['addr'].'</div>.'; }}?></div>


</div>

</body>
</html>
<?php
if(isset($_POST['submit'])){
$namae=$_POST['namae'];
$tel=$_POST['tel'];
$addr=$_POST['addr'];

$r=$conn->prepare("update `address` SET `namae`=?,`tel`=?,`addr`=? where `id`=?");
$r->bindValue(1,$namae);
$r->bindValue(2,$tel);
$r->bindValue(3,$addr);
$r->bindValue(4,$Id);
$r->execute();}

?>
<a href="logout.php"><button name="logout">logout</button></p>
