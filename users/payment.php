<?php 
 
include '../koneksi.php';

session_start();
$name="";
$name0=$_SESSION["name"];

if ($name==$name0){
    header("Location: login.php");
}

if (isset($_POST["home"])){
    header("location: ../index.php");
}

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
    $nohp=$client["nohp"];

    $sql2="INSERT INTO client VALUES ('', '$branch', '$kode_kamar', '$tipe_kamar', '$harga', '$cekin', '$cekout', '$duration', '$total', '$nik', '$name0', '$nohp')";
    $result2=mysqli_query($koneksi, $sql2);
    
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
    </head>
    <body>
        <br><br><br><br>
        <?php 
        if($result2){
            echo '
                <div class="container" style="border-radius:15px;">
                    <form method="post">
                    <div class="row">
                        <div class="col-sm">
                            <input type="hidden" value="<?php ?>">
                        </div>
                        <div class="col-sm"  align="center">
                            <br><br><br><br><br><br>
                            <h5 class="text-center">Berhasil Memesan Kamar</h5>
                            <button class="btn btn-primary" type="submit"  name="home">Back to Home</button>
                        </div>
                        <div class="col">
                            
                        </div>
                        </form>
                    </div>
                </div>';
        }else{
            echo '
                <div class="container" style="border-radius:15px;">
                    <form method="post">
                    <div class="row">
                        <div class="col-sm">
                            <input type="hidden" value="<?php ?>">
                        </div>
                        <div class="col-sm"  align="center">
                            <br><br><br><br><br><br>
                            <h5 class="text-center">Kesalahan terjadi saat memesan kamar</h5>
                            <button class="btn btn-primary" type="submit"  name="home">Back to Home</button>
                        </div>
                        <div class="col">
                            
                        </div>
                        </form>
                    </div>
                </div>';
        }
        ?>
    </body>
</html>