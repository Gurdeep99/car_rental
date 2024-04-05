<?php 

include "../../../connection.php";

// echo $_POST['name'];

$id= $_POST['id'];
$car_id = $_POST['car_id'];
$name = $_POST['review_name'];
$rating = $_POST['review_rating'];
$feedback = $_POST['review_feedback'];
$update_time = date("Y/m/d-h:i:sa"); // default PHP library "date()";

$res = mysqli_query($conn, "UPDATE `reviews` SET `car_id`='".$car_id."', `name`='".$name."', `rating`='".$rating."', `feedback`='".$feedback."', `updated_at`='".$update_time."' WHERE  `id`='".$id."'");

if($res){
    header('Location: ../../reviews.php?success=update');
}





?>