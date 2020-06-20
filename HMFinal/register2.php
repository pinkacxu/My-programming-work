
  <?php
$conn=null;
session_start();
require("conn(test).php");
$cname=$_POST['cname'];
$cpassword=$_POST['cpassword'];
$Uname=$_POST['Uname'];

$r=$conn->prepare("INSERT INTO `users`(`userid`, `password`, `name`) VALUES (?,?,?)");
$r->bindValue(1,$cname);
$r->bindValue(2,$cpassword);
$r->bindValue(3,$Uname);
$result=$r->execute();

if ($result==true){
  
		$_SESSION["userID"]=$_POST['cname'];
	$_SESSION["password"]=$_POST['cpassword'];
	$_SESSION["Uname"]=$_POST['Uname'];
	
    
echo "<script>alert('おめでとう、ログイン成功した、$Uname さん');location.href='register3.php';</script>";
}else{
echo "<script>alert('残念ながら、失敗しだ、前のページに戻ります');history.back();</script>";	
}
  ?>