<meta charset="UTF-8">
<?php
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
