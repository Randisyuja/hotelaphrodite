<?php 
 
include '../koneksi.php';

session_start();
$name="";
$name0=$_SESSION["name"];
$nik=$_SESSION["nik"];

if ($name==$name0){
    header("Location: login.php");
}

$sql="SELECT * FROM client WHERE nik='$nik'";
$result=mysqli_query($koneksi, $sql);
if($result->num_rows>0){
    $client=mysqli_fetch_assoc($result);
    $branch=$client["branch"];
    $kode_kamar=$client["kode_kamar"];

    $sql1="SELECT * FROM $branch WHERE kode_kamar='$kode_kamar'";
    $result1=mysqli_query($koneksi, $sql1);
    $kamar=mysqli_fetch_assoc($result1);
}else{
    echo "<script>alert('Anda belum memiliki pesanan')</script>";
}

if(isset($_POST["delete"])){
    $sql2="DELETE FROM client WHERE nik='$nik'";
    mysqli_query($koneksi, $sql2);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript" src="../ajs/bootstrap.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>

        <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet">

        <style>
          body{
            background-image:url(../img/login.jpg);
          }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="border-bottom:2px solid ">
            <a class="navbar-brand" href="#">Hotel Kami</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Branch
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="indo.php">Indonesia</a>
                            <a class="dropdown-item" href="japan.php">Japan</a>
                            <a class="dropdown-item" href="swiss.php">Switzerland</a>
                        </div>
                    </li>
                    <?php
                    if ($name==$name0){
                        echo '<li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                        </li>';
                    }else{
                        echo '<li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            '.$name0.'
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="profile.php">My Profile</a>
                            <a class="dropdown-item active" href="myorder.php">My Order</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                        </li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <br><br><br><br>
        
        <div class="container" style="background-color:lightgrey; border-radius:15px;">
            <div class="row">
                <div class="col">
                </div>
                <div class="col-14">
                    Anda Belum Memiliki Pesanan
                </div>
                <div class="col">
       
                </div>
            </div>
        </div>
    </body>
</html>