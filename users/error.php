<?php 
 
include 'ppayment.php';

if (isset($_POST["home"])){
    header("location: ../index.php");
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
                    /div>
                <div class="col">
                            
                </div>
                </form>
            </div>
        </div>
    </body>
</html>