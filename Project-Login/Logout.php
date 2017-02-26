<?php
session_start();
session_destroy();
setcookie('loginid', '', time()-300);   
header("Location:login.php");
 ?>
