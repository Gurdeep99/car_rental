<?php 
include("../connection.php");

$username = $_POST['email'];

$get_email_data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `email` WHERE `id`= 1"));


$res_get_clint_data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '".$username."'"));

$otp = rand(000000,999999);

$update_otp_in_database = mysqli_query($conn,"UPDATE `users` SET `otp`='".$otp."' WHERE `email`='".$username."'");



$tempTQ = "Hi ".$res_get_clint_data['name']."<br><br> Here is your OTP <strong>".$otp."</strong><br><br>Reset your account password <br><br><small style='color:red;'>Do not share OTP with anyone</small>";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/vendor/autoload.php';

$mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $get_email_data['user_id'];                     //SMTP username
        $mail->Password   = $get_email_data['pass_key'];                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->setFrom('info@chilldrive.com', 'Chill Drive');
        $mail->addAddress( $res_get_clint_data['email'],  $res_get_clint_data['name']);     //Add a recipient
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is your password reset OTP';
        $mail->Body    = $tempTQ;
        $mail->send();
        header("Location: ../login.php?otp=true&user=".$username);
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }




?>