<?php

include "koneksi.php";

$sql="SELECT * FROM kamar_indo";
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
        <script type="text/javascript" src="ajs/bootstrap.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="border-bottom:2px solid ">
            <a class="navbar-brand" href="#">Hotel Aphrodite</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                        </li>';
                    }
                    ?>
                    
                </ul>
            </div>
        </nav>
        <br><br><br><br>
        <form action="test.php" method="post">
            <div class="container" style="background-color:lightgrey; border-radius:15px;">
                <?php
                    if ($result->num_rows > 0) {
                        $row = mysqli_fetch_assoc($result);
                        for ($i=0; $i=$row->num_row; $i-- ){
                            $var='<div class="row">
                                <div class="col-sm">
                                    <img class="img-fluid" src="img/'.$row["image"].'" style="padding:10px;padding-top:20px; background-color:lightgrey;border:0; border-radius:15px;">
                                </div>
                                <div class="col-sm">
                                    <br>
                                    <h3 class="text-center">'.$row["tipe_kamar"].'</h3>
                                </div>
                                <div class="col align-self-center">
                                    <p class="text-center">'.$row["harga"].'</p>
                                    <button class="btn btn-primary" type="submit" value="Double Bed Room" name="roomtype1">Book Now</button>
                                </div>
                            </div>';

                        echo $var;
                        }
                        
                        
                    } else {
                        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
                    }
                ?>
            </div>
        </form>
    </body>
</html>

