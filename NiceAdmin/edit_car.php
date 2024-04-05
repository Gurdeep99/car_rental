<?php
ob_start();
session_start();
include("connection.php");

$sqli_edit = "SELECT * FROM `cars` WHERE id =" . $_GET['id'];
$result_edit = $conn->query($sqli_edit);
$row_cars_edit = $result_edit->fetch_array()
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

    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Car Info</h5>

            <!-- General Form Elements -->
            <form action="assets/data/dataUpdate.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Car name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" value="<?php echo $row_cars_edit['name']; ?>">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Car Brand</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="brand" value="<?php echo $row_cars_edit['brand']; ?>">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Milege</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="mileage" value="<?php echo $row_cars_edit['mileage']; ?>">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Transmission Type</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="transmission" value="<?php echo $row_cars_edit['transmission']; ?>">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Seats</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="seats" value="<?php echo $row_cars_edit['seats']; ?>">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Luggage</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="luggage" value="<?php echo $row_cars_edit['luggage']; ?>">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Fuel</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="fuel" value="<?php echo $row_cars_edit['fuel']; ?>">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Hourly Price</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="hourly_price" value="<?php echo $row_cars_edit['hourly_price']; ?>">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Daily Price</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="daily_price" value="<?php echo $row_cars_edit['daily_price']; ?>">
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>

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
  </footer><!-- End Footer -->

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