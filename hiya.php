<?php
include "koneksi.php";
$first=$_POST["name1"];
$second=$_POST["name2"];
$name=$first." ".$second;
$email=$_POST["email"];
$pass=$_POST["password"];
$add=$_POST["address"];
$city=$_POST["city"];
$reli=$_POST["religion"];

$query=mysqli_query($koneksi, "insert into accounts values ('$name', '$email', '$pass', '$add', '$city', '$reli')");
?>