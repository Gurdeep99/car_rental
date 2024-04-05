<?
include("../connection.php");
if (isset($_POST['datasend'])) {

    $resuly = mysqli_query($conn, "INSERT INTO job (name, email, message, license) VALUES ('" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['license'] . "','" . $_POST['message'] . "')");
  
    if ($resuly) {
      header("Location: ../job.php?success");
    }
  }



?>