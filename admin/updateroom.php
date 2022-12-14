<?php

include "../koneksi.php";

$branch=$_GET["branch"];
echo $branch;
$sql="SELECT * FROM '$branch'";
$result=mysqli_query($koneksi, $sql);

session_start();
$username2="";
$username3=$_SESSION["session_username"];

if ($username2==$username3){
    header("Location: adminlogin.php");
}

if ($_SERVER['REQUEST_METHOD']=='GET'){
    
    if(!isset($_GET["update"])){
        header("location: indo.php");
        exit;
    }

    $kode_kamar = $_GET["update"];

    $sql1 = "SELECT * FROM $branch WHERE kode_kamar='$kode_kamar'";
    $result1 = mysqli_query($koneksi, $sql1);
    $row = mysqli_fetch_assoc($result1);

    if(!$row){
        header("location: indo.php");
        exit;
    }

    $kode_kamar=$row["kode_kamar"];
    $image=$row["image"];
    $tipe_kamar=$row["tipe_kamar"];
    $desc=$row["deskripsi"];
    $harga=$row["harga"];
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="border-bottom:2px solid ">
            <a class="navbar-brand" href="index.php">Hotel Kami</a>
            <span style="background-color:darkcyan; color:white; padding-left:20px; padding-right:20px; border-radius:15px;">Administrator</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="facilities.html">Facilities</a>
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
                        <?php echo($username3); ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="">Profile</a>
                            <a class="dropdown-item" href="adminlogout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container" style="margin:100px auto;">
            <div class="row">
                <div class="col">
                    
                </div>
                <div class="col-6" style="background-color:darkgrey; border-radius:30px; padding:3rem; padding-top:2rem">
                    <h4><b>UPDATE ROOM</b></h4>
                    <form action="percobaan.php" method="post">
                        <div class="form-row form-group">
                            <input type="file" value="<?php echo $image; ?>"name="image">
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $branch;?>" name="branch">
                            <input type="text" class="form-control" name="kodekamar" value="<?php echo $kode_kamar; ?>" placeholder="Room Code" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="tipekamar" value="<?php echo $tipe_kamar; ?>" placeholder="Room Type" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="deskripsi" placeholder="Description" rows="4" required><?php echo $desc; ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="harga" value="<?php echo $harga; ?>" placeholder="Price" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Update</button>
                    </form>
                </div>
                    <div class="col">

                </div>
            </div>
        </div>
    </body>
</html>