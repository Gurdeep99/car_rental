<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "car_rental";

$conn = mysqli_connect($server, $username, $password, $database);
if ($conn){
    // "success";
}
else{
    die("Error". mysqli_connect_error());
}

?>
