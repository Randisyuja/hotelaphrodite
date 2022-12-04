<?php
include '../koneksi.php';

$cekin=$_POST["cekin"];
$duration=$_POST["duration"];
$kode_kamar=$_POST["kode_kamar"];
$branch=$_POST["branch"];

echo $branch.$kode_kamar.$cekin.$duration;
?>