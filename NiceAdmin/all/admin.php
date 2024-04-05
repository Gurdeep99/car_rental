<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/log.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo1.png" alt="" width="50%">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

       

     
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Laxman</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Laxmansingh Sodha</h6>
              
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          
          <span>Dashboard</span>
          
        </a>
      </li><!-- End Dashboard Nav -->

    
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="admin.php">
              <i class="bi bi-circle"></i><span>Admin</span>
            </a>
          </li>
          <li>
            <a href="car.php">
              <i class="bi bi-circle"></i><span>Car</span>
            </a>
          </li>
          <li>
            <a href="car_bookings.php">
              <i class="bi bi-circle"></i><span>Car Booking</span>
            </a>
          </li>
          <li>
            <a href="contact.php">
              <i class="bi bi-circle"></i><span>Contact</span>
            </a>
          </li>
          <li>
            <a href="features.php">
              <i class="bi bi-circle"></i><span>Features</span>
            </a>
          </li>
          <li>
            <a href="job.php">
              <i class="bi bi-circle"></i><span>Job</span>
            </a>
          </li>
          <li>
            <a href="reviews.php">
              <i class="bi bi-circle"></i><span>Review</span>
            </a>
          </li>
          <li>
            <a href="users.php">
              <i class="bi bi-circle"></i><span>Users</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->



      <li class="nav-heading">Pages</li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

     
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <section class="section">
      <div class="container" >
      <div class="row">
        <div class="col-lg-12">

        <?php
  include("connection.php");   //connection define
  
    //variable define
    $ad_name = $ad_email  = $ad_pass = ""; 
      
    $nameErr = $emailErr = $mobileErr = $passwordErr = "";


	if($_POST){
	// print_r($_POST);
  $nameErr = "Name Is Required";
	if(empty($_POST["ad_name"])){
	// $nameErr = "Name Is Required";
	}
	else{
	if(!checkname($_POST["ad_name"])){
	$nameErr = "Name Is Invalid";
	}
	$name = $_POST["ad_name"]; 
   } 	
    
   
	if(empty($_POST["ad_email"])){
	$emailErr = "Email Is Required";
	}
	else{
	if(!checkemail($_POST["ad_email"])){
	$emailErr = "Invalid Email Address";
	}
	$email = $_POST["ad_email"];
   }
   
   
	//

	if(empty($_POST["ad_pass"])){
      $passwordErr = "Password Is Required";
      }
      else{
      if(!checkpass($_POST["ad_pass"])){
      $passwordErr = "Invalid Password";
      }
      $password = $_POST["ad_pass"];
      }
	 
 if  (empty($nameErr) && empty($emailErr)  && empty($passwordErr)) 
 {
 
   $sql = "INSERT INTO admins SET ad_name = '".$ad_name."' ,
    ad_email = '".$ad_email."'  , ad_pass = '".$ad_pass."'"; 


  //  echo json_encode($sql);
	
	if(mysqli_query($conn, $sql))
	{
	echo "New Records Inserted Successfully";
  //  header("location: dataShow.php");
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
         background-color:whitesmoke ;
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

<input type="text" name="name" class="form-control" maxlength="30" placeholder="Name" value="">
   <span class="error">*<?php echo $nameErr;?></span>

<input type="email" name="email" class="form-control" maxlength="50" placeholder="Email" value="">
   <span class="error">*<?php echo $emailErr;?></span>
   
<input type="password" name="password"  class="form-control" maxlength="60" placeholder="Password" value="">
   <span class="error"><?php echo $passwordErr;?></span><br><br>

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
         background-color:whitesmoke ;
         width:50%;
         background-size:100%;
         margin:100px 0px 0px 100px;
      }
   </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<title>Admin</title>
</head>
<body id="myBody">
<form name="stform" method="post" action="" id="myForm">

<input type="text" name="name"  class="form-control" maxlength="50" placeholder="Name" value=""><br>
   <span class="error"><?php echo $nameErr;?></span>

<input type="email" name="email" class="form-control"  maxlength="50" placeholder="Email" value=""><br>
   <span class="error"><?php echo $emailErr;?></span>

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
	

        </div>

        
      </div>
      </div>
    </section>




</div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>