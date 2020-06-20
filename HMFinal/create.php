<?php

	
session_start();
$Id=@$_SESSION['Id'];
$userID=@$_SESSION['userID'];
$Uname=@$_SESSION['Uname'];
$tpmei=@$_SESSION["tpmei"];
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
<?php

if (isset($_POST['submit'])) {
$subject=$_POST['subject'];
$body=$_POST['body'];
$choose=@$_POST['choose3'];
$r=$conn->prepare("INSERT INTO $tpmei (`id`,`subject`,`body`,`est`,`name`) VALUES (?,?,?,?,?)");
$r->bindValue(1,$Id);
$r->bindValue(2,$subject);
$r->bindValue(3,$body);
$r->bindValue(4,$choose);
$r->bindValue(5,$Uname);
$r->execute();

}
?>
<a href="logout.php"><button name="logout">logout</button></a>
</div>


<div class="container">
 <h3>料理評価</h3>
	</div><br>
 <table border="1" align="center" width=40% class="table">

    <tr bgcolor="#D0D0D0">
	<form method="POST" action="create.php" enctype="multipart/form-data">
	 <th class="white">料理タイプを選ぶ</th><th class="white" ></th></tr>
	 <td>評価レベル
	 
	 <select name="choose3">
				
  	<option value="最高">最高</option>
		<option value="普通">普通</option>
		<option value="NOT　GOOD">NOT　GOOD</option></td>
			<tr><td bgcolor="#cccccc">テーマ:<input name="subject" style="width:300px"></td></tr>
			<tr><td>評語:<input name="body" style="width:2100px;height:500px"></td></tr>
			
			<tr><td bgcolor="#cccccc"></td></tr>
			
		</select>
			<tr><td><button type="submit" name="submit" onclick="alert('提出しました!!!')">提出</button></td></tr>
	</form>
	
	</table>
	<div>
<button type="button" onclick="location='MyPage.php'">home pageに戻る</button>

</div>

</body>
</html>
