<?php 
include("../connection.php");

$res_get_otp = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `users` WHERE `email` ='".$_GET['user']."'"));




if(isset($_POST['new_password']) && isset($_POST['confirm_password']) && isset($_POST['otp']) && isset($_GET['user'])){


    if($_POST['new_password'] == $_POST['confirm_password']){

        if($res_get_otp['otp'] == $_POST['otp']){

            $hashed_pass = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

            $res_change_password = mysqli_query($conn,"UPDATE `users` SET `password`='".$hashed_pass."',`otp`='' WHERE `email`='".$res_get_otp['email']."'");

            if($res_change_password){
                
                header('Location: ../login.php?success=Password Successfully Changed');


            }else{
                header('Location: ' . $_SERVER['HTTP_REFERER'].'&error=Somthing Went Wrong');
            }

        }else{
            header('Location: ' . $_SERVER['HTTP_REFERER'].'&error=OTP is Wrong! Please Try Again');
        }
        
    






    }else{

        header('Location: ' . $_SERVER['HTTP_REFERER'].'&error=Password Should be same');
    }





}else{
        
    header('Location: ' . $_SERVER['HTTP_REFERER'].'&error=All Fields Required');
    }










?>