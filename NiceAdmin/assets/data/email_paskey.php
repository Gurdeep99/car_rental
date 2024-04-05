<?php 
include "../../../connection.php";

$res = mysqli_query($conn,"UPDATE `email` SET `user_id`='".$_POST['email']."',`pass_key`='".$_POST['pass']."' WHERE `id`= 1");

if($res){

    header('Location: ../../email_data.php?success=updated');

}

?>