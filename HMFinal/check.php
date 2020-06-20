
<?php

$conn = null;
session_start();
try{
	$option = array(
		PDO::ATTR_ERRMODE
		=> PDO::ERRMODE_EXCEPTION);
	$conn = new PDO(
		"mysql:host=localhost;dbname=hmfinal;charset=utf8;",
		"root","1234", $option
    );
   
}catch(PDOException $e){
	echo '异常発見：<br/>';
    echo 'ERROR位置：' . $e->getFile() . $e->getLine() . '<br/>';
    echo 'ERROR原因：'  . $e->getMessage();
	die($e->getMessage());
}
echo($conn->getAttribute(
	PDO::ATTR_SERVER_VERSION)
);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<h2>check</h2>
<?php

$Uid=$_POST['userID'];
$Upass=$_POST['password'];
$dbcheck = $conn->prepare("SELECT * FROM `users` WHERE userid=:userid and password=:password");
$dbcheck->bindParam(':userid', $Uid);
$dbcheck->bindParam(':password', $Upass);
$dbcheck->execute();
$res = $dbcheck->fetchAll(PDO::FETCH_ASSOC);
foreach($res as $row){
$Id=$row['id'];
$Uname=$row['name'];
    }
if (!empty($res)){
	

	$_SESSION["userID"]=$_POST['userID'];
	$_SESSION["password"]=$_POST['password'];
	$_SESSION["Uname"]=$Uname;
	$_SESSION["Id"]=$Id;
	
echo "<script>alert('おめでとう、ログイン成功した、$Uname さん');location.href='MyPage.php';</script>";
}else{
echo "<script>alert('残念ながら、失敗しだ、前のページに戻ります');history.back();</script>";	
}
?>

<br/>

</body>
</html>





