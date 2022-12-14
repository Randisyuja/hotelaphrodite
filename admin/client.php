<?php 
 
include '../koneksi.php';

session_start();
$username2="";
$username3=$_SESSION["session_username"];

if ($username2==$username3){
    header("Location: adminlogin.php");
}

$sql="SELECT * FROM client";
$result=mysqli_query($koneksi, $sql);

$var=$result->num_rows;
$num=0;
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
                        <a class="nav-link active" href="client.php">Client</a>
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
        <br><br><br><br>        
        <div class="container" style="background-color:lightgrey; border-radius:15px;">
        <a class="btn btn-primary" href="checkin.php" role="button">Check In</a>
        <a class="btn btn-primary" href="checkout.php" role="button">Check Out</a>
            <div class="row">
                <div class="col">
                </div>
                <div class="col-13">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Room Code</th>
                            <th scope="col">Room Type</th>
                            <th scope="col">Price</th>
                            <th scope="col">Check In</th>
                            <th scope="col">Check Out</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Total</th>
                            <th scope="col">No HP</th>
                            </tr>
                        </thead>
                        <?php while($row=mysqli_fetch_assoc($result)):
                        $num=$num+1;?>
                        <tbody>
                            <tr>
                            <th scope="row"><?php echo $num;?></th>
                            <td><?php echo $row["nama"];?></td>
                            <td><?php echo $row["kode_kamar"];?></td>
                            <td><?php echo $row["tipe_kamar"];?></td>
                            <td><?php echo "Rp ".$row["harga"];?></td>
                            <td><?php echo $row["checkin"];?></td>
                            <td><?php echo $row["checkout"];?></td>
                            <td><?php echo $row["lama_menginap"];?></td>
                            <td><?php echo "Rp ".$row["total"];?></td>
                            <td><?php echo $row["nohp"];?></td>
                            </tr>
                        </tbody>
                        <?php 
                        endwhile; ?>
                    </table>
                </div>
                <div class="col">
                </div>
            </div>
        </div>
    </body>
</html>