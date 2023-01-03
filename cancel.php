<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
include 'koneksi.php';

session_start();
$nik=$_SESSION["nik"];

//Create an instance; passing `true` enables exceptions
if(isset($_POST["delete"])){
    
    $sql2="DELETE FROM client WHERE nik='$nik'";
    $sql3="DELETE FROM checkin WHERE nik='$nik'";
    mysqli_query($koneksi, $sql2);
    mysqli_query($koneksi, $sql3);

    $mail = new PHPMailer(true);

    $name=$_POST['name'];
    $email=$_POST['email'];
    echo $email;
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'hotelkami05@gmail.com';                     //SMTP username
    $mail->Password   = 'bjidlzexrbyckhfm';                               //SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('hotelkami05@gmail.com', 'HotelKami');
    $mail->addAddress($email, $name);     //Add a recipient
    $mail->addReplyTo('hotelkami05@gmail.com', 'HotelKami');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Pembatalan Pesanan Hotel Kami';
    $mail->Body    = '<b>Halo, terima kasih sudah menggunakan jasa Hotel Kami</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if($mail->send()){
        header("Location: users/myorder.php");
    }
    else{
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}