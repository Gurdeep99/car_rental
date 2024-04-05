<?php 

include "../../../connection.php";

// echo $_POST['clint_name'];

$id = $_POST['id'];
$clint_name = $_POST['clint_name'];
$clint_phone_number = $_POST['clint_phone_number'];
$pickup_location = $_POST['pickup_location'];
$dropoff_location = $_POST['dropoff_location'];
$pickup_date = $_POST['pickup_date'];
$dropoff_date = $_POST['dropoff_date'];
$pickup_time = $_POST['pickup_time'];
$driver_choice = $_POST['driver_choice'];

$update_time = date("Y/m/d-h:i:sa"); // default PHP library "date()";


$query = "UPDATE `car_bookings` SET   `name`='".$clint_name."',  `phone`='".$clint_phone_number."',  `pickup_location`='".$pickup_location."',  `dropoff_location`='".$dropoff_location."',  `pickup_date`='".$pickup_date."',  `dropoff_date`='".$dropoff_date."',  `pickup_time`='".$pickup_time."',  `driver_choice`='".$driver_choice."',  `updated_at`='".$update_time."'   WHERE   `id`='".$id."'";

$res = mysqli_query($conn, $query);

if($res){
    header('Location: ../../car_bookings.php?success=update');
}



?>