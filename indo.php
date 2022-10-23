<?php
$var='<div class="row">
<div class="col-sm">
    <img class="img-fluid" src="img/balieee.jpg" style="padding:10px;padding-top:20px; background-color:lightgrey;border:0; border-radius:15px;">
</div>
<div class="col-sm">
    <br>
    <h3 class="text-center"><b>Double Bed Room</b></h3>
</div>
<div class="col align-self-center">
    <p class="text-center">RP 9.999.999</p>
    <button class="btn btn-primary" type="submit" value="Double Bed Room" name="roomtype1">Book Now</button>
</div>
</div>'
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="border-bottom:2px solid darkgrey">
            <a class="navbar-brand" href="#">Hotel</a>
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
                        <a class="dropdown-item" href="indo.html">Indonesia</a>
                        <a class="dropdown-item" href="japan.html">Japan</a>
                        <a class="dropdown-item" href="swiss.html">Switzerland</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                          </svg></a>
                    </li>
                </ul>
            </div>
        </nav>
        <br><br><br><br>
        <form action="test.php" method="post">
            <div class="container" style="background-color:lightgrey; border-radius:15px;">
                <?php
                    echo $var;
                    echo $var;
                ?>
            </div>
        </form>
    </body>
</html>
