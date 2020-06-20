<?php
 sleep(1); 
 $server_name="localhost";
  $user_name="root";
  $user_password="1234";
  $database_name="hmfinal";
  $table_name="users";
                
 $username=$_POST['user'];      
 $conn=new mysqli($server_name,$user_name,$user_password);  
 $conn->select_db($database_name);                    
 mysqli_query($conn,"set names utf-8");                   
$sql="SELECT * FROM `users` WHERE userid='{$username}'";       
 $res=$conn->query($sql);                          
 $data = mysqli_fetch_row($res);
 if($data){ 
 echo 1;
 }else{
 echo 0;
 }       
?>