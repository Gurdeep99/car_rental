<?php
include("../connection.php");

  $id = $_GET["id"];
  $deletesql = "DELETE FROM `users` where `id`='$id'";
  $result = $conn->query($deletesql);
  if($result){
    echo "Record deleted successfully";
  }else{
    echo "Error";
  }

  ?>