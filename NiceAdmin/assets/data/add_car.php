<?php 

include "../../../connection.php";

$name = $_POST['name'];


$photo = $_FILES['photo'];
  $filename = $photo['name'];
  $fileerror = $photo['error'];
  $filetmp = $photo['tmp_name'];
  $fileext = explode('.',$filename);
  $filecheck = strtolower(end($fileext));
  $random_name = rand(000,999);

  $fileextstore = array('png','jpg','jpeg','jfif');
  if(in_array($filecheck,$fileextstore)){
       $destinationfile = '../../../images/'.$name.'-'.$random_name.'.'.$filecheck ;
       move_uploaded_file($filetmp,$destinationfile);
       $photo_location_database = 'images/'.$name.'-'.$random_name.'.'.$filecheck ;
  }

// echo $photo;


$brand = $_POST['brand'];
$mileage = $_POST['mileage'];
$transmission = $_POST['transmission'];
$seat = $_POST['seat'];
$luggage = $_POST['luggage'];
$fuel = $_POST['fuel'];
$hourly_price = $_POST['hourly_price'];
$daily_price = $_POST['daily_price'];

if(isset($_POST['AC'])){
    $AC= 1;
}else{            // for Air conditions
    $AC= 0;
}
if(isset($_POST['CS'])){
    $CS= 1;
}else{            // for Child Seat
    $CS= 0;
}
if(isset($_POST['GPS'])){
    $GPS= 1;
}else{            // for GPS
    $GPS= 0;
}
if(isset($_POST['MS'])){
    $MS= 1;
}else{            // for Music System
    $MS= 0;
}
if(isset($_POST['SB'])){
    $SB= 1;
}else{            // for Seat Belt
    $SB= 0;
}
if(isset($_POST['LUG'])){
    $LUG= 1;
}else{            // for Luggage
    $LUG= 0;
}
if(isset($_POST['SBD'])){
    $SBD= 1;
}else{            // for Sleeping Bed
    $SBD= 0;
}
if(isset($_POST['WAT'])){
    $WAT= 1;
}else{            // for Water
    $WAT= 0;
}
if(isset($_POST['BT'])){
    $BT= 1;
}else{            // for Bluetooth
    $BT= 0;
}
if(isset($_POST['OCI'])){
    $OCI= 1;
}else{            // for Onboard computer
    $OCI= 0;
}
if(isset($_POST['AIP'])){
    $AIP= 1;
}else{            // for Audio input
    $AIP= 0;
}
if(isset($_POST['LTT'])){
    $LTT= 1;
}else{            // for Long Term Trips
    $LTT= 0;
}
if(isset($_POST['CKT'])){
    $CKT= 1;
}else{            // for Car Kit
    $CKT= 0;
}
if(isset($_POST['RCL'])){
    $RCL= 1;
}else{            // for Remote central locking
    $RCL= 0;
}
if(isset($_POST['CCL'])){
    $CCL= 1;
}else{            // for Climate control
    $CCL= 0;
}

$description = $_POST['description'];

$update_time = date("Y/m/d-h:i:sa"); // default PHP library "date()";


$query = "INSERT INTO `cars`(`name`, `brand`, `mileage`, `transmission`, `seats`, `luggage`, `fuel`, `image`, `description`, `hourly_price`, `daily_price`, `created_at`, `updated_at`) 
                VALUES ('".$name."','".$brand."','".$mileage."','".$transmission."','".$seat."','".$luggage."','".$fuel."','".$photo_location_database."','".$description."','".$hourly_price."','".$daily_price."','".$update_time."','".$update_time."')";


$res = mysqli_query($conn, $query);

if($res){

    $query2 = "UPDATE `cars` SET 
    `feature_air_conditioning` = ?,
    `feature_child_seat` = ?,
    `feature_gps` = ?,
    `feature_music_system` = ?,
    `feature_seat_belt` = ?,
    `feature_luggage` = ?,
    `feature_sleeping_bed` = ?,
    `feature_water` = ?,
    `feature_bluetooth` = ?,
    `feature_onboard_computer` = ?,
    `feature_audio_input` = ?,
    `feature_long_term_trips` = ?,
    `feature_car_kit` = ?,
    `feature_remote_central_locking` = ?,
    `feature_climate_control` = ?
    WHERE `name` = ?";

// Prepare the statement
$stmt = $conn->prepare($query2);

// Bind parameters and execute the statement
$stmt->bind_param("ssssssssssssssss", 
    $AC, $CS, $GPS, $MS, $SB, $LUG, $SBD, $WAT, $BT, $OCI, $AIP, $LTT, $CKT, $RCL, $CCL, $name);

// Assuming $AC, $CS, $GPS, etc., are the variables containing the respective feature values
// Assuming $name contains the name of the car

// Execute the statement
$stmt->execute();

// Close the statement and database connection
$stmt->close();
$conn->close();
header('Location: ../../car.php?success=Success! New Car Added');

}




?>