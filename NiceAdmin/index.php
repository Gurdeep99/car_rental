<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['name']) && isset($_SESSION['img'])) {
  include "../connection.php";
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
      <div class="grey-bg container-fluid">
        <section id="minimal-statistics">
          <div class="row">
            <div class="col-12 mt-3 mb-1">
              <h4 class="text-uppercase">Dashboard</h4>
              <p><small>Home / Dashboard</small></p>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <div class="media d-flex">
                      <div class="align-self-center">
                      <i class="fas fa-car fa-lg" style="color: #63E6BE; font-size: 54px;"></i>
                      </div>
                      <div class="media-body text-right">
                        <h3>0<?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `cars`"));?></h3>
                        <span>Cars</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <div class="media d-flex">
                      <div class="align-self-center">
                      <i class="fas fa-users fa-lg" style="color: #74C0FC; font-size: 54px;"></i>
                      </div>
                      <div class="media-body text-right">
                        <h3>0<?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `users`"));?></h3>
                        <span>Users</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <div class="media d-flex">
                      <div class="align-self-center">
                      <i class="fas fa-key fa-lg" style="color: #FFD43B; font-size: 54px;"></i>
                      </div>
                      <div class="media-body text-right">
                        <h3>0<?php echo mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `job`"));?></h3>
                        <span>Drivers</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </section>

        
      </div>
    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <?php include "assets/common/footer.php"; ?>
  </body>

  </html>
<?php } else {
  header("Location: ../admin.php?error");
} ?>