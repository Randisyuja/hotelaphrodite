<?php 
 
include 'ppayment.php';

if (isset($_POST["home"])){
    header("location: ../index.php");
}
$nik=$_SESSION["nik"];
$name0=$_SESSION["name"];

//Untuk mengambil data client dan dikirim ke phpmailer
$sql1="SELECT * FROM accounts WHERE nik='$nik'";
$result1=mysqli_query($koneksi, $sql1);
$account=mysqli_fetch_assoc($result1);
$email=$account['email'];
$nohp=$account['nohp'];

//untuk mengambil data client seperti kode kamar, no pemesanan, cabang, dsb.
$sql2="SELECT * FROM client WHERE nik='$nik'";
$result2=mysqli_query($koneksi, $sql2);
$client=mysqli_fetch_assoc($result2);
$nopayment=$client['no_pemesanan'];
$branch=$client['branch'];
$kode_kamar=$client['kode_kamar'];
$duration=$client['lama_menginap'];
$checkin=$client['checkin'];
$checkout=$client['checkout'];

//mengambil data kamar yang dipesan
$sql3="SELECT * FROM $branch WHERE kode_kamar='$kode_kamar'";
$result3=mysqli_query($koneksi, $sql3);
$kamar=mysqli_fetch_assoc($result3);
$tipe_kamar=$kamar['tipe_kamar'];
$gambar=$kamar['image'];
$harga=$kamar['harga'];
$total=$harga*$duration;

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
        <div class="container" style="border-radius:15px;">
            <form action="../kirim.php" method="post">
            <div class="row">
                <div class="col-sm">
                    <input type="hidden" value="<?php ?>">
                </div>
                <div class="col-sm"  align="center">
                    <br><br><br><br><br><br>
                    <h5 class="text-center">Berhasil Memesan Kamar</h5>
                    <input type="hidden" value="<?php echo $name0; ?>" name="name">
                    <input type="hidden" value="<?php echo $email; ?>" name="email">
                    <input type="hidden" value="<?php echo $tipe_kamar; ?>" name="tipekamar">
                    <input type="hidden" value="<?php echo $branch; ?>" name="branch">
                    <input type="hidden" value="<?php echo $nopayment; ?>" name="nopayment">
                    <input type="hidden" value="<?php echo $checkin; ?>" name="checkin">
                    <input type="hidden" value="<?php echo $checkout; ?>" name="checkout">
                    <input type="hidden" value="<?php echo $gambar; ?>" name="gambar">
                    <button class="btn btn-primary" type="submit"  name="sukses">Back to Home</button>
                </div>
                <div class="col">
                            
                </div>
                </form>
            </div>
        </div>
    </body>
</html>