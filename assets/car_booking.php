<?php
// Start the session
session_start();


include "../connection.php";

if(isset($_SESSION['user_email'])){

if(isset($_POST['payment_type']) && $_POST['payment_type'] == 'cod'){

    $pickup_location = $_POST['pickup_location'];
    $dropoff_location = $_POST['dropoff_location'];
    $pickup_date = $_POST['pickup_date'];
    $dropoff_date = $_POST['dropoff_date'];
    $pickup_time = $_POST['pickup_time'];
    $selected_car = $_POST['selected_car'];
    $driver_choice = $_POST['driver_choice'];
    $Fname = $_POST['Fname'];
    $phone = $_POST['phone'];
    $payment_type = $_POST['payment_type'];
    $date = date("d:m:Y - h:i a");


    $query = "INSERT INTO `car_bookings`(`name`, `phone`, `pickup_location`, `dropoff_location`, `pickup_date`, `dropoff_date`, `pickup_time`, `car_id`, `driver_choice`, `payment_type`, `created_at`, `updated_at`) VALUES ('".$Fname."','".$phone."','".$pickup_location."','".$dropoff_location."','".$pickup_date."','".$dropoff_date."','".$pickup_time."','".$selected_car."','".$driver_choice."','COD','".$date."','".$date."')";

    $res = mysqli_query($conn, $query);
    if($res){
        header("Location: ../index.php?success=akgvialdkvbadkvbeasckdjvnksjghnbb");
    }else{
        header("Location: ../index.php?error=kvbeasckdjvnksjghnbbakgvialdkvbad");
    }




}elseif(isset($_POST['payment_type']) && $_POST['payment_type'] == 'upi/card'){
    
    $pickup_location = $_POST['pickup_location'];
    $dropoff_location = $_POST['dropoff_location'];
    $pickup_date = $_POST['pickup_date'];
    $dropoff_date = $_POST['dropoff_date'];
    $pickup_time = $_POST['pickup_time'];
    $selected_car = $_POST['selected_car'];
    $driver_choice = $_POST['driver_choice'];
    $Fname = $_POST['Fname'];
    $phone = $_POST['phone'];
    $date = date("d:m:Y - h:i a");


    $query = "INSERT INTO `car_bookings`(`name`, `phone`, `pickup_location`, `dropoff_location`, `pickup_date`, `dropoff_date`, `pickup_time`, `car_id`, `driver_choice`, `payment_type`, `created_at`, `updated_at`) VALUES ('".$Fname."','".$phone."','".$pickup_location."','".$dropoff_location."','".$pickup_date."','".$dropoff_date."','".$pickup_time."','".$selected_car."','".$driver_choice."','UPI/Card','".$date."','".$date."')";

    $res = mysqli_query($conn, $query);
    if($res){
        header("Location: ../index.php?alert=feature not working&success=akgvialdkvbadkvbeasckdjvnksjghnbb");
    }else{
        header("Location: ../index.php?error=kvbeasckdjvnksjghnbbakgvialdkvbad");
    }




}

}else{
    header("Location: ../login.php?login=kvbeasckdjvnksjgkgvialdkvbadhnbba");
}


?>
