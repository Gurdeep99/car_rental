<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['name']) && isset($_SESSION['img'])) {
  include "../connection.php";
  $res_admin_user = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `admin_user` WHERE `username` = '".$_SESSION['username']."'"));
?>

<!DOCTYPE html>
<html lang="en">

<?php include "assets/common/head.php"; ?>

<body>
  <!-- ======= Header ======= -->
  <?php include "assets/common/navbar.php"; ?>
  <!-- ======= Sidebar ======= -->
  <?php include "assets/common/sidebar.php"; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?php echo $res_admin_user['img'];?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $res_admin_user['name'];?></h2>
            </div>
          </div>
        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>
              </ul>
              <!-- overview -->
              <div class="tab-content pt-2">
                  <h5 class="card-title">Profile Details</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $res_admin_user['name'];?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Company</div>
                    <div class="col-lg-9 col-md-8"><?php echo $res_admin_user['company'];?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8"><?php echo $res_admin_user['country'];?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $res_admin_user['address'];?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo $res_admin_user['phone'];?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $res_admin_user['username'];?></div>
                  </div>
                </div>
              </div><!-- End Bordered Tabs -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
   <!-- ======= Footer ======= -->
   <?php include "assets/common/footer.php"; ?>
</body>

</html>
<?php } else {
  header("Location: ../admin.php?error");
} ?>