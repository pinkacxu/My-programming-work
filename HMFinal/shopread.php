<?php
session_start();
if(empty($_SESSION["Id"])) {
  header("location:shop/login.html");
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

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<style> 
@font-face{
font-family:fontjp;
src:url('image/DFRULA5.TTF');}
<style> 
                .black_overlay{ 
                    display: none; 
                    position: absolute; 
                    top: 0%; 
                    left: 0%; 
                    width: 100%; 
                    height: 100%; 
                    background-color: black; 
                    z-index:1001; 
                    -moz-opacity: 0.8; 
                    opacity:.80; 
                    filter: alpha(opacity=88); 
                } 
                .white_content { 
                    display: none; 
                    position: absolute; 
                    top: 25%; 
                    left: 25%; 
                    width: 55%; 
                    height: 55%; 
                    padding: 20px; 
                    border: 10px solid orange; 
                    background-color: white; 
                    z-index:1002; 
                    overflow: auto; 
                } 
body{ font-family:fontjp;
    background-size: cover;
	text-align:center;

    background-attachment: fixed;

		}
		.usermessage ul{
			float: right;
            list-style: none;
            margin: 
           padding: 

		}
		.usermessage li{list-style: none;
          margin: 2px;
            padding: 2px;
            float: left;
			font-size:15px;
			}
  </style>
<script>
  $(function(){
                })
                function openDialog(){
                    document.getElementById('light').style.display='block';
                    document.getElementById('fade').style.display='block'
                }
                function closeDialog(){
                    document.getElementById('light').style.display='none';
                    document.getElementById('fade').style.display='none'
                }
  function del(){ 
    var msg="本当に削除しますか？"
if(confirm(msg)==true){

  return true;
}else{
  
  return false;
}}
</script>

		  <div class="usermessage">
		 <ul>
		   <?php
		  echo '<li><a>'.@$_SESSION['Uname'].'さんようこそ</a></li>';
		  ?>
		  		  <li><a href="shopcreate.php">商品追加</li>
          <li><a href="logout.php">logout</a></li>

		
        </ul>
		</div>
</head>
<body>

<div class="container" ><h1>交換システム</h1></div>
  <div class="navbar navbar-inverse">
    <div class="navnavbar-nav">
      <ul class="navnavbar-nav">
      <li><a href="mypage.php">MY　ページへ</li>
      <li><a href="shopcreate.php">商品追加</li>
      <li><a href="nowchange.php">交換ページへ</a></li></ul>
    </div>
</div>

  
     
        




</div>

    <br>
<div>
 <form method="GET" action="search.php">
<select name="type1">
  <option value="user">販売者</option>
  <option value="subject">販売品</option>
</select>
<input name="messege1" >
<button type="submit" name="submit">探す</button>
</form>
</div>
  
  


  <?php
  
  echo ' <div class="col-md-4
  " style="background:rgb(176,176,176,0.5);  color:black;margin-left:36%;">';
  $result = $conn->query(
  "SELECT * FROM shopread,users where shopread.usernum=users.id"
  );


  $allrows = $result->fetchAll(PDO::FETCH_ASSOC);	
foreach($allrows as $row){
  
if($row['usernum']==$Id){
  $imgnum=$row['sellnum'];
   
  

echo '<span>商品番号：</span><p  style="color:red";>'.$row['sellnum'].'</p>';
$_SESSION["imgnum"]=$row['sellnum'];
$resimg = $conn->query(
  "SELECT * FROM img where $imgnum=imgnum"
  );
  $loadimg= $resimg->fetchAll(PDO::FETCH_ASSOC);
  
  if(!$loadimg) {  
    
  echo '<img src="image/nasi.jpg" width="201" height="146" alt="image" class="fl" />';
  echo '<button>アップロード</button>';
  
}else{	
  foreach($loadimg as $rowi){
    
 echo '<img  width="201" height="146" src="data:image/jpeg;base64,'.base64_encode( $rowi['imgdata'] ).'"/>';
  }
 
  
}
echo '<p>販売名：'.$row['sellname'].'</p>';echo '<p>販売者ID:'.$row['usernum'].'</p>';
echo '<p>販売開始時間:'.$row['modified'].'</p>';
echo '<p class=>商品紹介：'.$row['sellarticle'].'</p><p class=>価格：'.$row['price'].'</p>';
echo '<p class=><a href="delete.php?delete='.$row['sellnum'].'"onclick="return del();">削除&nbsp&nbsp&nbsp</a><a href="search2.php?messege1='.$row['sellnum'].'&type1=user&articleID='.$row['sellnum'].'" >詳細</a></p>';


}else{
  
 echo '<span>商品番号：</span><p  style="color:red";>'.$row['sellnum'].'</p>';
 $imgnum=$row['sellnum'];
 $resimg = $conn->query(
  "SELECT * FROM img where $imgnum=imgnum"
  );
  $loadimg= $resimg->fetchAll(PDO::FETCH_ASSOC);
  
  if(!$loadimg) {  
    
  echo '<img src="image/nasi.jpg" width="201" height="146" alt="image" class="fl" />';
  echo '<button>アップロード</button>';
  
}else{	
  foreach($loadimg as $rowi){
   
 echo '<img  width="201" height="146" src="data:image/jpeg;base64,'.base64_encode( $rowi['imgdata'] ).'"/>';
  }}
echo '<p>販売名：'.$row['sellname'].'</p>';echo '<p>販売者ID:'.$row['usernum'].'</p>';
echo'<p>販売開始時間:'.$row['modified'].'</p>';
echo '<p class=>商品紹介：'.$row['sellarticle'].'</p><p> 価格：'.$row['price'].'</p><p><a href="search2.php?messege1='.$row['usernum'].'&type1=user&articleID='.$row['sellnum'].'">詳細</a></p>';
echo'<br>';
echo '<a style="color:green">この商品を交換したい場合、自分の商品番号を入力して下さい:</a><br>';

echo '<form method="POST" action="exchange.php" >
<input  type="number" name="myexnum" ><br>
<input type="hidden" name="num" value="'.$row['sellnum'].'"> 
<button type="submit">交換</button></form>';


}
}
echo '</div>';
?>
<!--<button oncilck="location.href='read.php'">議論Home</button>
</div>-->

<p><button><a href = "JavaScript:void(0)" onclick = "openDialog()">システム使用方法</a></p> </button>
                <div id="light" class="white_content">
                    <table>
                    <p style="color:red; font-size:20px;">システム使用方法</p>
                        <tr>
                                
                                
                                    
                                
                                <td>中国語</td>  
                            <td style="padding:10px">注册 登陆<br> 
                                购入系统 首先到自己账户页面。输入自己的地址，如果没有购买东西时候会默认なし，无法交换成功
                                交换东西 平时可以提交自己已经不需要的物品等待别人的交换
                                当想要交换别人的东西的时候，先提交自己这边想要和别人交换的东西，
                                会出现物品号码，然后在交换大厅，别人的物品号码下面この商品を交換したい場合、自分の商品番号を入力して下さい:的位置输入自己物品的号码，
                                这时被交换方的个人账户交換手続き会出现交换者的号码交换物品的信息
                                如果想要交换的时候，被交换方点击确认，在交換完了界面可以看到，想交换的东西的信息交換相手の連絡方式を表示可以显示发起交换请求方的地址真实姓名和电话。
                                </td>
                            
                        </tr>
                        <tr>
                            <td >英語</td>
                            <td style="padding:10px">Registered landing
                                
                                    The purchase system first goes to its own account page. Enter your own address. If you don't buy something, you will default. You can't exchange it successfully.
                                    
                                    Exchanges can usually submit items that you don't need to wait for others to exchange.
                                    
                                    When you want to exchange other people's things, first submit what you want to exchange with others on your side.
                                    
                                    There will be the item number, and then in the exchange hall, under the item number of other people, enter the number of your own item in the exchange occasion, the item number of your own item, and the location of your own item.
                                    
                                    At this time, the exchanger's personal account will exchange the information of the exchanger's number exchange items.
                                    
                                    If you want to exchange, the exchanged party clicks to confirm that, after the exchange interface, you can see that the exchange of information for the exchange of things hand in hand. Connection means that the real name and telephone address of the originating exchange requester can be displayed.</td>
                            
                        </tr>
                        <tr>
                            <td >日本語</td>
                            <td style="padding:10px">留学生はユーザーで登録したら、請求人は自分のほしいものを見つけた場合、
                                    自分の請求をその人(ものの主人、その人は受ける方と呼ぶ)に発送する、
                                    受ける方が請求を見る時に、もし交換を受けたい、確認を選んてから、請求人の商品とアドレス、
                                    名前、電話が表示できるようになる。これで交換が完了しました。</td>
                                    <tr></tr>
</tr>      <tr style="color:red; font-size:50px;width:300;">注意''ポイント</tr>
                          <tr style="color:red; font-size:20px;">連絡方式を必ず記入しなさい<img src="img/2.png" width="201" height="146"></tr>
                          <tr style="color:red; font-size:20px;">番号入力<img src="img/1.png" width="201" height="146"></tr>
                          <tr style="color:red; font-size:20px;">交換手続き<img src="img/3.png" width="201" height="146"></tr>

                    </table> 
                    <a href = "javascript:void(0)" onclick = "closeDialog()">閉じる</a>
                </div> 
                <div id="fade" class="black_overlay"></div> 

                
</body>
</html>
