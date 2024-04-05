<?php 

include "../../../connection.php";

// echo $_POST['name'];

$id= $_POST['id'];
$name = $_POST['name'];
$brand = $_POST['brand'];
$mileage = $_POST['mileage'];
$transmission = $_POST['transmission'];
$seats = $_POST['seats'];
$luggage = $_POST['luggage'];
$fuel = $_POST['fuel'];
$hourly_price = $_POST['hourly_price'];
$daily_price = $_POST['daily_price'];
$update_time = date("Y/m/d-h:i:sa"); // default PHP library "date()";


$query = "UPDATE `cars` SET  `name`='".$name."', `brand`='".$brand."', `mileage`='".$mileage."', `transmission`='".$transmission."', `seats`='".$seats."', `luggage`='".$luggage."', `fuel`='".$fuel."', `hourly_price`='".$hourly_price."', `daily_price`='".$daily_price."', `updated_at`='".$update_time."' WHERE  `id`='".$id."'";

$res = mysqli_query($conn, $query);

if($res){
    header('Location: ../../car.php?success=update');
}





?>