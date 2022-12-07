<?php 
 
include '../koneksi.php';
 
 
if (isset($_SESSION['name'])) {
    header("Location: ../login.php");
}
 
if (isset($_POST['submit'])) {
    $nik=$_POST["nik"];
    $nohp=$_POST["nohp"];
    $first=$_POST["name1"];
    $second=$_POST["name2"];
    $name=$first." ".$second;
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $add=$_POST["address"];
    $city=$_POST["city"];
    $reli=$_POST["religion"];
    $sex=$_POST["sex"];
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM accounts WHERE email='$email'";
        $sql1 = "SELECT * FROM accounts WHERE nik='$nik'";
        $result = mysqli_query($koneksi, $sql);
        $result1 = mysqli_query($koneksi, $sql1);
        if (!$result1->num_rows > 0){
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO accounts VALUES ('$nik', '$name', '$email', '$password', '$add', '$city', '$reli', '$sex', '$nohp')";
                $result = mysqli_query($koneksi, $sql);
                if ($result) {
                    echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                    $nik = "";
                    $name = "";
                    $email = "";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = "";
                } else {
                    echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
                }
            } else {
                echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
            }
        } else {
            echo "<script>alert('Woops! NIK Sudah Terdaftar. ')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
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
          #bor:hover{
            border-radius:15px;
          }

          body{
            background-image:url(../img/login.jpg);
          }

          #login:hover{
            border-radius:15px;
            background-color:darkgrey;
            padding-left:20px;
            padding-right:20px;
          }
        </style>
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand">Hotel Kami</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="login.php" id="login">Login <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
      </nav>
      <div class="container" style="margin:100px auto;">
        <div class="row">
            <div class="col">
                
            </div>
            <div class="col-6" style="background-color:darkgrey; border-radius:30px; padding:3rem; padding-top:2rem">
                <h4><b>REGISTER</b></h4>
                <form action="" method="post">
                    <div class="form-row form-group">
                        <div class="col">
                            <input type="text" class="form-control" id="inputName1" name="name1" placeholder="First name" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="inputName2" name="name2" placeholder="Last name" required>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col">
                            <input type="text" class="form-control" id="inputnik" name="nik" placeholder="NIK" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="inputnohp" name="nohp" placeholder="No Handphone" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="inputAddress" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="password" class="form-control" id="inputPassword4" name="cpassword" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="inputCity" name="city" placeholder="City" required>
                        </div>
                        <div class="form-group col-md-4">
                            <select id="inputState" class="form-control" name="religion" required>
                                <option selected disabled>Religion</option>
                                <option value="Islam">Islam</option>
                                <option value="Christian">Christian</option>
                                <option value="Protestant">Protestant</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <select id="inputState" class="form-control" name="sex" required>
                                <option selected disabled>Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                     <button type="submit" class="btn btn-primary" name="submit">Sign up</button>
                </form>
            </div>
            <div class="col">

            </div>
        </div>
      </div>
    </body>
</html>