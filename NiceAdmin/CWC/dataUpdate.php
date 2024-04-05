<?php
  ob_start();
  session_start();
  include("connection.php");   //connection define
  
    //variable define
    $name = $email  = $mobile = $password = ""; 
      
    $nameErr = $emailErr = $mobileErr = $passwordErr = "";
	
         if($_GET){  
         $id = $_GET["id"];

		 $sqli2 = "SELECT * FROM dataInsert WHERE user_id=".$id; 

		 $result = $conn->query($sqli2);
         
         $row = $result->fetch_assoc();

	 }
	
    if($_POST){
	print_r($_POST);
	if(empty($_POST["name"])){
	$nameErr = "Name Is Compulsory";
	}
	else{
	if(!checkname($_POST["name"])){
	$nameErr = "Name Is Invalid";
	}
	$name = $_POST["name"];
	}
	
	
	if(empty($_POST["email"])){
	$emailErr = "Email Is Required";
	}
	else{
	if(!checkemail($_POST["email"])){
	$emailErr = "Email Is InValid";
	}
	$email = $_POST["email"];
   }
   
   if(empty($_POST["mobile"])){
   $mobileErr = "Mobile Is Required";
   }
   else{
   if(!checkmobile($_POST["mobile"])){
   $mobileErr = "Mobile Invalid";
   }
   $mobile = $_POST["mobile"];
  }
  
    if(empty($_POST["password"])){
   $passwordErr = "Password Compulsory";
   }
   else{
   if(!checkpass($_POST["password"])){
   $passwordErr = "Password Invalid";
   }
   $password = $_POST["password"];
   }
   
 if(empty($nameErr)  && empty($emailErr) && empty($mobileErr) && empty($passwordErr)){

         
  $sqli2 = "UPDATE dataInsert SET user_name ='".$name."', user_email ='".$email."', user_mob ='".$mobile."', user_pass ='".$password."' WHERE user_id=".$id;
        
	// echo $sqli2;//die;
    if($conn->query($sqli2) === TRUE)
	{ 
    // echo "_Record was updated successfully_";
    header("location: dataShow.php");

    }
    else
	{
	echo "Error: You Can't Able to Execute $sqli2.". mysqli_connect_error();
    }


}  else { ?> 


<DOCTYPE html>
<html>
<head>
	<style>
	#myBody
    {
        background-color:wheat;
        width:50%;
        margin:100px 0px 0px 100px;
    }
	</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body id="myBody">
<form name="myForm"  action="dataShow.php" method="POST">
<input type="hidden" name="id" placeholder="id" value=""><br><br>

<input type="text" name="name" placeholder="Name" class="form-control" value="">
      <span class="error">*<?php echo $nameErr;?></span><br>

<input type="text" name="email" placeholder="Email" class="form-control" value="">
     <span class="error">*<?php echo $emailErr;?></span><br>

     <input type="text" name="mobile" placeholder="Mobile" class="form-control" value="">
     <span class="error">*<?php echo $mobileErr;?></span><br>

     <input type="password" name="password"  class="form-control" maxlength="60" placeholder="Password" value="">
   <span class="error"><?php echo $passwordErr;?></span<br><br><br>


<input type="submit" value="Submit" class="btn btn-primary">
<input type="reset" value="Reset" class="btn btn-success">
</form>

<?php } 

} else { ?>

<DOCTYPE html>
<html>
<head>
	<style>
	#myBody
    {
        background-color:wheat;
        width:50%;
        margin:100px 0px 0px 100px;
    }
	</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body id="myBody">
<form name="myForm"  action="" method="POST">
<input type="hidden" name="id" placeholder="id" value=""><br><br>
   
<input type="text" name="name" placeholder="Name" class="form-control" value="">
      <span class="error"><?php echo $nameErr;?></span><br><br>

<input type="text" name="email" placeholder="Email" class="form-control" value="">
     <span class="error"><?php echo $emailErr;?></span><br><br>

<input type="text" name="mobile" placeholder="Mobile" class="form-control" value="">
     <span class="error"><?php echo $mobileErr;?></span><br><br>

     <input type="password" name="password"  class="form-control" maxlength="60" placeholder="Password" value="">
   <span class="error"><?php echo $passwordErr;?></span<br><br><br>

   <input type="submit" value="Submit" class="btn btn-primary">
     <input type="reset" value="Reset" class="btn btn-success">
</form>

<?php } 

?> <br>

<?php

// function checkname($str){
// return(!preg_match("/^[a-z A-z]*$/", $str))? FALSE : TRUE;
// }

function checkname($str)
{
  return(!preg_match("/^[a-z A-z]*$/", $str))? FALSE : TRUE;
}

function checkemail($str)
{
	return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

function checkmobile($str)
{
return(!preg_match("/^[0-9]*$/", $str))? FALSE : TRUE;
}

function checkpass($str)
{
return(!preg_match("/^[a-zA-Z]*$/", $str))? FALSE : TRUE;
}
?>


</body>
</html>
