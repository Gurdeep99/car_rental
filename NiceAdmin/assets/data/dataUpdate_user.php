<?php 

include "../../../connection.php";

// echo $_POST['name'];

$id= $_POST['id'];
$name = $_POST['name'];

$contact_number = $_POST['contact_number'];

$update_time = date("Y/m/d-h:i:sa"); // default PHP library "date()";


$query = "UPDATE `users` SET  `name`='".$name."',`contact_number`='".$contact_number."'  WHERE  `id`='".$id."'";

$res = mysqli_query($conn, $query);

if($res){
    header('Location: ../../users.php?success=update');
}





?>