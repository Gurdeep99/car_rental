<?php

include("../connection.php");


$get_email_data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `email` WHERE `id`= 1"));


 
$username = $_POST['username']; // post data from previous page

$res_get_data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `admin_user` WHERE `username`='".$username."'")); // to get valid user data

$otp = rand(000000,999999); //to generate otp

$hash_verify = password_hash(rand(0000,9999),PASSWORD_DEFAULT);

$update_otp_in_database = mysqli_query($conn,"UPDATE `admin_user` SET `otp`='".$otp."',`otp_hash`='".$hash_verify."' WHERE `username` = '".$username."'");

$tempTQ = "Hi ".$res_get_data['name']."<br><br> Here is your OTP <strong>".$otp."</strong><br><br>Reset your account password <br><br><small style='color:red;'>Do not share OTP with anyone</small>";
// echo $tempTQ;
//echo $Email, $name;
// die();



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

    try {
        //Server settings
        //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $get_email_data['user_id'];                     //SMTP username
        $mail->Password   = $get_email_data['pass_key'];                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('info@chilldrive.com', 'Chill Drive');
        $mail->addAddress( $res_get_data['username'],  $res_get_data['name']);     //Add a recipient
        //Attachments
    // $mail->addAttachment('../assets/confi/invoice/pdf/Invoice-'.$orderid.'.pdf');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is your password reset OTP';
        $mail->Body    = $tempTQ;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        header("Location: ../forget-password.php?otp=true&user=".$username."&verify=".$hash_verify);
        //echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

?>
