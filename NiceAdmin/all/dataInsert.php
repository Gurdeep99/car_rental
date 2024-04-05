<?php
  ob_start();
  session_start();
  include("connection.php");   //connection define
  
    //variable define
    $name = $email  = $mobile = $password = ""; 
      
    $nameErr = $emailErr = $mobileErr = $passwordErr = "";


	if($_POST){
	print_r($_POST);
	if(empty($_POST["name"])){
	$nameErr = "Name Is Required";
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
	$emailErr = "Invalid Email Address";
	}
	$email = $_POST["email"];
   }
   
   
	if(empty($_POST["mobile"])){
	$mobileErr = "Mobile Number Is Required";
	}
	else{
	if(!checkmobile($_POST["mobile"])){
	$mobileErr = "Invalid mobile Address";
	}
	$mobile = $_POST["mobile"];
   }


	if(empty($_POST["password"])){
      $passwordErr = "Password Is Required";
      }
      else{
      if(!checkpass($_POST["password"])){
      $passwordErr = "Invalid PassWord";
      }
      $password = $_POST["password"];
      }
	 
 if  (empty($nameErr) && empty($emailErr) && empty($mobileErr) && empty($passwordErr)) 
 {
 
   $sql = "INSERT INTO dataInsert SET user_name = '".$name."' ,
    user_email = '".$email."' , user_mob = '".$mobile."' ,
   user_pass = '".$password."'"; 
	//echo $sql ;die;

   echo json_encode($sql);
	
	if($conn->query($sql) == TRUE)
	{
	// echo "New Records Inserted Successfully";
   header("location: dataShow.php");
	}
	else
	{
	echo "Error:" . $sql . "<br>";
	}

}   else { ?>

<DOCTYPE html>
<html>
<head>
<style>
      #myBody
      {
         background-color:wheat ;
         width:50%;
         background-size:100%;
         margin:100px 0px 0px 100px;
      }
   </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<title>Student</title>
</head>
<body id="myBody">

<form name="stform" method="post" action="" id="myForm">

<input type="text" name="name" class="form-control" maxlength="30" placeholder="Student" value="">
   <span class="error">*<?php echo $nameErr;?></span><br><br>
<input type="email" name="email" class="form-control" maxlength="50" placeholder="Email" value="">
   <span class="error">*<?php echo $emailErr;?></span><br><br>
   
   
<input type="number" name="mobile"  class="form-control" maxlength="60" placeholder="Mobile" value="">
   <span class="error"><?php echo $mobileErr;?></span><br><br>


<input type="password" name="password"  class="form-control" maxlength="60" placeholder="Password" value="">
   <span class="error"><?php echo $passwordErr;?></span<br><br><br>

<input type="submit" name="Submit" class="btn btn-primary">
<input type="reset" name="Reset" class="btn btn-success">
</form>

<?PHP }

} else { 

?>


<DOCTYPE html>
<html>
<head>
   <style>
      #myBody
      {
         background-color:wheat ;
         width:50%;
         background-size:100%;
         margin:100px 0px 0px 100px;
      }
   </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<title>Student</title>
</head>
<body id="myBody">
<form name="stform" method="post" action="" id="myForm">

<h6>NAME</h6>
<input type="text" name="name"  class="form-control" maxlength="50" placeholder="Student" value="">
   <span class="error"><?php echo $nameErr;?></span><br><br>

<h6>EMAIL</h6>
<input type="email" name="email" class="form-control"  maxlength="50" placeholder="Email" value="">
   <span class="error"><?php echo $emailErr;?></span><br><br>

<h6>MOBILE</h6>
<input type="number" name="mobile"  class="form-control" maxlength="60" placeholder="Mobile" value="">
   <span class="error"><?php echo $mobileErr;?></span><br><br>


<input type="password" name="password"  class="form-control" maxlength="60" placeholder="Password" value="">
   <span class="error"><?php echo $passwordErr;?></span><br><br>


  <input type="submit" name="Submit" class="btn btn-primary">
  <input type="reset" name="Reset" class="btn btn-success">
</form>

 <?php 
} 
 ?>
 <?php
  
   

function checkname($str)
{
  return(!preg_match("/^[a-z A-z]*$/", $str))?
  FALSE : TRUE;
}
  
function checkemail($str)
{
   return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? 
   FALSE : TRUE;
} 
  
function checkmobile($str)
{
  return(!preg_match("/^[0-9]*$/", $str))?
  FALSE : TRUE;
}

function checkpass($str)
{
   return (!preg_match("/^([a-z0-9\+_\-]+)[a-z]{2,6}$/ix", $str)) ? 
   FALSE : TRUE;
}

?>
  
</body>
</html>
	