<?php

include "../koneksi.php";

$branch="japan";
$sql="SELECT * FROM $branch";
$result=mysqli_query($koneksi, $sql);

session_start();
$username2="";
$username3=$_SESSION["session_username"];

if ($username2==$username3){
    header("Location: adminlogin.php");
}

if (isset($_POST['submit'])) {
    $image=$_POST["image"];
    $tipekamar=$_POST["tipekamar"];
    $desc=$_POST["desc"];
    $roomcode=$_POST["kodekamar"];
    $harga=$_POST["harga"];

    $sql = "INSERT INTO $branch VALUES ('$roomcode','$image', '$tipekamar', '$desc', '$harga')";
    $result1 = mysqli_query($koneksi, $sql);
    if($result1){
        echo "<script>alert('Berhasil memasukkan data baru')</script>";
        header("Location: japan.php");
    }
}



if (isset($_POST['delete'])) {
    $kodekamar=$_POST['delete'];
    $sql="DELETE FROM $branch WHERE kode_kamar='$kodekamar'";
    mysqli_query($koneksi, $sql);
    header("Location: japan.php");
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
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet">

        <style>
          body{
            background-image:url(../img/bgjapan.jpg);
          }
        </style>
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
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="client.php">Client</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Branch
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="indo.php">Indonesia</a>
                            <a class="dropdown-item active" href="japan.php">Japan</a>
                            <a class="dropdown-item" href="swiss.php">Switzerland</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?php echo($username3); ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="">Profile</a>
                            <a class="dropdown-item" href="">Room in use</a>
                            <a class="dropdown-item" href="adminlogout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <br><br><br><br>
        <div class="container" style="background-color:lightgrey; border-radius:15px;">
            <form action="" method="post">
                <div class="row">
                    <div class="col align-self-center">
                        <div id="image1"></div>
                        <input type="file" name="image"  id="image">
                    </div>
                    <div class="col align-self-center">
                        <br>
                        <input type="text" placeholder="Room Type" name="tipekamar">
                        <div><input type="text" placeholder="Description" name="desc"></div>
                        <div><input type="text" placeholder="Room Code" name="kodekamar"></div>
                    </div>
                    <div class="col align-self-center">
                        <input type="number" placeholder="Price" name="harga">
                        <button class="btn btn-primary" type="submit" name="submit">Input</button>
                    </div>
                </div>
            </form>
            <?php while($row=mysqli_fetch_assoc($result)) : ?>
                
                    <div class="row">
                        <div class="col-sm">
                            <img class="img-fluid" src="../img/<?php echo $row["image"];?>" style="margin-top:15px; margin-bottom:15px; padding:10px;padding-top:10px; background-color:lightgrey;border:0; border-radius:20px; width:400px; height:200px;  ">
                        </div>
                        <div class="col-sm">
                            <br>
                            <h3 class="text-center"><?php echo $row["tipe_kamar"];?></h3>
                            <div><?php echo $row["deskripsi"];?></div>
                        </div>
                        <div class="col align-self-center">
                            <p class="text-center"><?php echo $row["harga"];?></p>
                            <div align="center">
                                <form action=updateroom.php method="get">
                                    <input type="hidden" value="<?php echo $branch;?>" name="branch">
                                    <button class="btn btn-primary" type="submit" name="update" value=<?php echo($row["kode_kamar"]); ?>>Update</button>
                                </form>
                                <br>
                                <form action="" method="post">
                                <button class="btn btn-primary" type="submit" name="delete" value=<?php echo($row["kode_kamar"]); ?>>Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
            <?php endwhile; ?>
        </div>
        <!-- <script type="text/javascript">
            function loadImage(){
                var imageinp = document.getElementById("image").value;
                var image = new Image(300,700);
                var imagein = "../img/"+imageinp;
                image.src = imagein
                var x = document.getElementById("image1");
                x.appendChild(image);
            }
        </script>
        -->
    </body>
</html>

