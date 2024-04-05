<?php 

include "../../../connection.php";

// echo $_POST['name'];

$id= $_POST['id'];
$car_id = $_POST['car_id'];
$feature_name = $_POST['feature_name'];
$has_feature = $_POST['has_feature'];
$update_time = date("Y/m/d-h:i:sa"); // default PHP library "date()";


$query = "UPDATE `features` SET  `car_id`='".$car_id."', `feature_name`='".$feature_name."', `has_feature`='".$has_feature."' WHERE  `id`='".$id."'";

$res = mysqli_query($conn, $query);

if($res){
    header('Location: ../../features.php?success=update');
}





?>