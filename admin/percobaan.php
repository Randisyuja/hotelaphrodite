<?php
include "../koneksi.php";

if (isset($_POST["submit"])){

    $branch=$_POST["branch"];
    $kode_kamar=$_POST["kodekamar"];
    $image=$_POST["image"];
    $tipe_kamar=$_POST["tipekamar"];
    $desc=$_POST["deskripsi"];
    $harga=$_POST["harga"];

    $sql="UPDATE $branch SET kode_kamar='$kode_kamar', image='$image', tipe_kamar='$tipe_kamar', deskripsi='$desc', harga='$harga' WHERE kode_kamar='$kode_kamar'";
    $result=mysqli_query($koneksi, $sql);
    if (!$result){
        echo ("Query mistake");
    }else{
        echo "<script>alert('Update Successful!')</script>";
        if($branch=="indonesia"){
            header("location: indo.php");
        }elseif($branch=="japan"){
            header("location: japan.php");
        }else{
            header("location: swiss.php");
        }
    }
}
?>
