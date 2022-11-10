<?php 
 //ketika menuju file ini session akan berakhir dan ditujukan kek file yang ada di header
session_start();
session_destroy();
 
header("Location: adminlogin.php");
 
?>