<?php 
 
include '../koneksi.php';

session_start();
$branch=$_POST["branch"];
$name="";
$name0=$_SESSION["name"];

if ($name==$name0){
    header("Location: login.php");
}

if (isset($_POST["booknow"])){
    $kode_kamar=$_POST["booknow"];
    $nik=$_SESSION["nik"];

    $sql="SELECT * FROM $branch WHERE kode_kamar='$kode_kamar'";
    $result=mysqli_query($koneksi, $sql);
    $row=mysqli_fetch_assoc($result);
    $tipe_kamar=$row["tipe_kamar"];
    $harga=$row["harga"];
    $nohp=$row["nohp"];


    $cekin=date("Y-m-d", strtotime($_POST["cekin"]));
    $duration=$_POST["duration"];
    $total=$row["harga"]*$duration;
    $cekout=date("Y-m-d", strtotime("+$duration days", strtotime($cekin)));
    $sql1="SELECT * FROM accounts WHERE nik='$nik'";
    $result1=mysqli_query($koneksi, $sql1);
    $client=mysqli_fetch_assoc($result1);

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
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="facilities.php">Facilities</a>
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?php echo($name0); ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <a class="dropdown-item" href="myorder.php">My Order</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <br><br><br><br>
        <div class="container" style="border-radius:15px;">
        <form action="payment.php" method="post">
            <div class="row" style="background-color:lightgrey; border-radius:15px;">
                <div class="col-sm">
                    <img class="img-fluid" src="../img/<?php echo $row["image"];?>" style="margin-top:15px; margin-bottom:15px; padding:10px;padding-top:10px; background-color:lightgrey;border:0; border-radius:20px; width:400px; height:200px;  ">
                </div>
                <div class="col-sm">
                    <br>
                    <h3 class="text-center"><?php echo $row["tipe_kamar"];?></h3>
                    <hr>
                    <div><?php echo $row["deskripsi"];?></div>
                </div>
                <div class="col">
                    <br>
                    <h3 class="text-center">Contact Details</h3>
                    <hr>
                    <div><?php echo $client["name"];?></div>
                    <div><?php echo $client["nohp"];?></div>
                    <div><?php echo $client["email"];?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">

                </div>
                <div class="col-sm">

                </div>
                <div class="col align-self-center" style="background-color:lightgrey; margin-top:-15px;">
                    <br>
                    <div style="background-color:darkgrey; padding:10px; border-radius:15px">
                        <h6>Check In</h6>
                        <div><?php echo $cekin;?></div>
                        <h6>Check Out</h6>
                        <div><?php echo $cekout; ?></div>
                        <h6>Duration Of Stay</h6>
                        <div><?php echo $duration; ?></div>
                    </div>
                    <br><br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">

                </div>
                <div class="col-sm">

                </div>
                <div class="col align-self-center" style="background-color:lightgrey; border-radius:15px; margin-top:-15px;">
                    <h4 class="text-center">Total</h4>
                    <hr>
                    <p class="text-center">Rp <?php echo $total;?></p>

                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <input type="hidden" value="<?php echo $branch; ?>" name="branch">
                    <input type="hidden" value="<?php echo $kode_kamar; ?>" name="kode_kamar">
                    <input type="hidden" value="<?php echo $cekin; ?>" name="cekin">
                    <input type="hidden" value="<?php echo $duration; ?>" name="duration">
                </div>
                <div class="col-sm">
                </div>
                <div class="col" align="center">
                    <br>
                    <button class="btn btn-primary" type="submit"  name="payment">Continue to Payment</button>
                </div>
            </div>
        </form>
        </div>
    </body>
</html>