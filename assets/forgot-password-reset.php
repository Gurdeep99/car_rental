<?php

include("../connection.php");

// echo $_POST['verify_check'];


if (isset($_POST['verify_check']) && $_POST['verify_check'] != '') {

    // echo "Hello";

    $username_check = $_POST['username_check'];

    $verify_check = $_POST['verify_check'];

    $otp = $_POST['our_otp'];

    $pas1 = $_POST['new_pass'];

    $pas2 = $_POST['conf_pass'];


    if ($pas1 == $pas2 && $pas1 != '' ) {

        $check_otp = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `admin_user` WHERE `username` = '" . $username_check . "'"));

        if ($otp == $check_otp['otp'] && $check_otp['otp'] != '') {


            $password_hash_gen = password_hash($pas1,PASSWORD_DEFAULT);


            $query = "UPDATE `admin_user` SET `password`='".$password_hash_gen."' WHERE `username`='".$username_check."'";
            $res = mysqli_query($conn, $query);
            
            if($res){

                $query_delete_otp = "UPDATE `admin_user` SET `otp`='', `otp_hash`='' WHERE `username`='".$username_check."'";
                $res_delete_otp = mysqli_query($conn, $query_delete_otp); 
                header("Location: ../admin.php?success=Password update successfully");

                
            }else{
                header("Location: ../forget-password.php?otp=true&user=" . $username_check . "&verify=" . $verify_check . "&error=Somthing went wrong");
            }

            
        } else {
            header("Location: ../forget-password.php?otp=true&user=" . $username_check . "&verify=" . $verify_check . "&error=OTP is wrong try again");
        }
    } else {
        header("Location: ../forget-password.php?otp=true&user=" . $username_check . "&verify=" . $verify_check . "&error=Passwords is not matching");
    }
}
