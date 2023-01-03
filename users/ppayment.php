<?php

$koneksi=mysqli_connect("localhost","root","","percobaanhotel");
if($koneksi){
    
} else{
    echo "koneksi tidak berhasil";
}

session_start();
$name="";
$name0=$_SESSION["name"];

if (isset($_POST["payment"])){
    $branch=$_POST["branch"];
    $kode_kamar=$_POST["kode_kamar"];
    $nik=$_SESSION["nik"];

    $sql="SELECT * FROM $branch WHERE kode_kamar='$kode_kamar'";
    $result=mysqli_query($koneksi, $sql);
    $row=mysqli_fetch_assoc($result);
    $tipe_kamar=$row["tipe_kamar"];
    $harga=$row["harga"];


    $cekin=date("Y-m-d", strtotime($_POST["cekin"]));
    $duration=$_POST["duration"];
    $total=$harga*$duration;
    $cekout=date("Y-m-d", strtotime("+$duration days", strtotime($cekin)));
    $sql1="SELECT * FROM accounts WHERE nik='$nik'";
    $result1=mysqli_query($koneksi, $sql1);
    $client=mysqli_fetch_assoc($result1);
    $email=$client["email"];
    $nohp=$client["nohp"];

    $sql2="INSERT INTO client VALUES ('', '$branch', '$kode_kamar', '$tipe_kamar', '$harga', '$cekin', '$cekout', '$duration', '$total', '$nik', '$name0', '$nohp')";
    $result2=mysqli_query($koneksi, $sql2);

    $order="SELECT * FROM client WHERE nik='$nik'";
    $cekorder=mysqli_query($koneksi, $order);
    
    if($result2){
        header("location: payment.php");
    }
    elseif($cekorder){
        header("location: ordered.php");
    }
    else{
        header("location: error.php");
    }
}

?>