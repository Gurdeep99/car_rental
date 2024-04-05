<?php
  ob_start();
  session_start();
  include("conn.php");   //connection define
  
    //variable define
    $name = $f_name = $m_name = $email  = $mobile = $gender = $add = ""; 
      
    $nameErr = $f_nameErr = $m_nameErr = $emailErr = $mobileErr = $genderErr = $addErr = "";  


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
    
	if(empty($_POST["father"])){
	$f_nameErr = "Father Name Is Required";
	}
	else{
	if(!checkfname($_POST["father"])){
	$f_nameErr = "Invalid Father Name";
	}
	$f_name = $_POST["father"];
	}
	
	if(empty($_POST["mother"])){
	$m_nameErr = "Mother Name Is Required";
	}
	else{
	if(!checkmname($_POST["mother"])){
	$m_nameErr ="Invalid Mother Name";
	}
	$m_name = $_POST["mother"];
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
	
     if(empty($_POST["gender"])){
     $genderErr = "Gender Is Required";
      }
     else{
     if(!checkgender($_POST["gender"])){
     $genderErr = "Gender Is Invalid";
     }
     $gender = $_POST["gender"];
   } 
		 
	 
 if  (empty($nameErr) && empty($f_nameErr ) && empty($m_nameErr) && empty($emailErr) && empty($mobileErr) && empty($genderErr)) 
 {
 
   $sql = "INSERT INTO students SET name = '".$name."' , father = '".$f_name."' ,
   mother = '".$m_name."' , email = '".$email."' , mobile = '".$mobile."' ,
   gender = '".$gender."'"; 
	//echo $sql ;die;
	
	if($conn->query($sql) == TRUE)
	{
	// echo "New Records Inserted Successfully";
   header("location: dataShow.php");
	}
	else
	{
	echo "Error:" . $sql . "<br>" . $conn->error;
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

<h6>NAME</h6>
<input type="text" name="name" class="form-control" maxlength="30" placeholder="Student" value="">
   <span class="error">*<?php echo $nameErr;?></span><br>

<h6>FATHER</h6>
<input type="text" name="father" class="form-control" maxlength="50" placeholder="Father" value="">
   <span class="error">*<?php echo $f_nameErr;?></span><br>                                      

<h6>MOTHER</h6>
<input type="text" name="mother" class="form-control" maxlength="50" placeholder="Mother" value="">
   <span class="error">*<?php echo $m_nameErr;?></span><br>

   <h6>EMAIL</h6>
<input type="email" name="email" class="form-control" maxlength="50" placeholder="Email" value="">
   <span class="error">*<?php echo $emailErr;?></span><br>

<h6>MOBILE</h6>
<input type="number" name="mobile" class="form-control" maxlength="50" placeholder="Mobile" value="">
   <span class="error">*<?php echo $mobileErr;?></span><br><br>

<h6>GENDER</h6>
   <span class="error" class="form-control">*<?php echo $genderErr;?></span><br>
   <input type="radio" name="gender" value="Male"/>Male<br>  
   <input type="radio" name="gender" value="Female"/>Female<br/>   
   <input type="radio" name="gender" value="Other"/>Other<b><br>

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
   <span class="error"><?php echo $nameErr;?></span>


<h6>FATHER</h6>
<input type="text" name="father"  class="form-control" maxlength="50" placeholder="Father" value="">
   <span class="error"><?php echo $f_nameErr;?></span> 

<h6>MOTHER</h6>
<input type="text" name="mother"  class="form-control" maxlength="50" placeholder="Mother" value="">
   <span class="error"><?php echo $m_nameErr;?></span>

<h6>EMAIL</h6>
<input type="email" name="email" class="form-control"  maxlength="50" placeholder="Email" value="">
   <span class="error"><?php echo $emailErr;?></span>

<h6>MOBILE</h6>
<input type="number" name="mobile"  class="form-control" maxlength="60" placeholder="Mobile" value="">
   <span class="error"><?php echo $mobileErr;?></span>


<h6>GENDER</h6>
<span class="error" class="form-control"><?php echo $genderErr;?></span>
<input type="radio" name="gender" value="Male"/> Male<br>  
<input type="radio" name="gender" value="Female"/> Female<br/>   
<input type="radio" name="gender" value="Other"/> Other<br>

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
  
function checkfname($str)
{
  return(!preg_match("/^[a-z A-Z]*$/", $str))?
   FALSE : TRUE;                            
}                                         
   
function checkmname($str)                 
{                                         
  return(!preg_match("/^[a-z A-Z]*$/", $str))?
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

function checkgender($str)
{
  return(!preg_match("/^[a-z A-Z]*$/", $str))?
  FALSE : TRUE;
}

?>
  
</body>
</html>
	