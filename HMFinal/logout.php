<?php
     
     session_start();
     
     $_SESSION = array();
    
     if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-42000, '/');
     }
    
     session_destroy();

echo "<script>alert('ログオン');location.href='login.html';</script>";
?>