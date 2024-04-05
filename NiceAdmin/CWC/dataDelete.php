<?php
  ob_start();
  session_start();
  include("connection.php");

    $id = $_GET["id"];
     $deletesql = "DELETE FROM dataInsert where user_id=".$id;
     
     $result = $conn->query($deletesql); 
	if ($result){
	   header('Location: http://localhost/CWC/dataShow.php');
     }
?>