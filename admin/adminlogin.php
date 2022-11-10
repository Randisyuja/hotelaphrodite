<?php 
 
include '../koneksi.php';
 
error_reporting(0);
 
session_start();

 
if (isset($_SESSION['name'])) {
    header("Location:admin.php");
}
 //button dipencet ambil data dari form dimasukkan ke var  dan akan dicek dengan kode di var result
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
        
    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['name'] = $row['name'];
        header("Location: admin.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
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
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">Hotel Aphrodite</a>
        <span style="background-color:darkcyan; color:white; padding-left:20px; padding-right:20px; border-radius:15px;">Administrator</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
      <div class="container" style="margin:100px auto;">
        <div class="row">
          <div class="col">
            
          </div>
          <div class="col-6" style="background-color:darkgrey; border-radius:30px; padding:1rem">
            <form class="px-4 py-3" action="" method="post">
              <div class="form-group">
                <label for="exampleDropdownFormEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com" name="email">
              </div>
              <div class="form-group">
                <label for="exampleDropdownFormPassword1">Password</label>
                <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password" name="password">
              </div>
              <div class="form-check" style="padding-bottom:5px">
                <input type="checkbox" class="form-check-input" id="dropdownCheck">
                <label class="form-check-label" for="dropdownCheck">
                  Remember me
                </label>
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
            </form>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="adminsignup.php" id="bor">New around here? Sign up</a>
            </div>
          <div class="col">

          </div>
        </div>
      </div>
    </body>
</html>