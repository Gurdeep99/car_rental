<?php 

include "../../../connection.php";

// echo $_POST['name'];
$pre_name=$_POST['pre_name'];
$name= $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$license= $_POST['license'];
$update_time = date("Y/m/d-h:i:sa"); // default PHP library "date()";


 $query = "UPDATE `job` SET`name`='".$name."', `email`='".$email."', `message`='".$message."', `license`='".$license."'  WHERE  `id`='".$pre_name."'";


$res = mysqli_query($conn, $query);

if($res){
    header('Location: ../../job.php?success=update');
}

?>