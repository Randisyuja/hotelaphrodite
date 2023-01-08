<?php

include "../koneksi.php";

$sql="SELECT * FROM japan";
$result=mysqli_query($koneksi, $sql);

session_start();
$username="";
$username1=$_SESSION["name"];

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
            background-image:url(../img/bgjapan.jpg);
          }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="border-bottom:2px solid ">
            <a class="navbar-brand" href="index.php">Hotel Kami</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Branch
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="indo.php">Indonesia</a>
                            <a class="dropdown-item active" href="japan.php">Japan</a>
                            <a class="dropdown-item" href="swiss.php">Switzerland</a>
                        </div>
                    </li>
                    <?php
                    if ($username==$username1){
                        echo '<li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                        </li>';
                    }else{
                        echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            '.$username1.'
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="profile.php">My Profile</a>
                            <a class="dropdown-item" href="myorder.php">My Order</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                        </li>';
                    }
                    ?>
                    
                </ul>
            </div>
        </nav>
        <br><br><br><br>
        <form action="review.php" method="post">
            <div class="container" style="background-color:lightgrey; border-radius:15px;">
                <div class="row">
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col">
                        <br>
                        <input type="date" name="cekin" style="border:1px solid darkgrey; border-radius:30px; padding-left:30px; padding-right:30px;" required>
                        <select style="border:1px solid darkgrey; border-radius:30px;" name="duration" id="duration" required>
                            <option value="" selected disabled>-- Duration --</option>
                            <option value="1">1 Night</option>
                            <option value="2">2 Nights</option>
                            <option value="3">3 Nights</option>
                            <option value="4">4 Nights</option>
                            <option value="5">5 Nights</option>
                            <option value="6">6 Nights</option>
                            <option value="7">7 Nights</option>
                            <option value="8">8 Nights</option>
                            <option value="9">9 Nights</option>
                        </select>
                    </div>
                </div>
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
                        <p class="text-center">$<?php echo $row["harga"];?></p>
                        <input type="hidden" name="branch" value="japan">
                        <button class="btn btn-primary" type="submit" value="<?php echo $row["kode_kamar"];?>" name="booknow">Book Now</button>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </form>
    </body>
</html>

