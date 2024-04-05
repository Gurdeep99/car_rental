<?php
ob_start();
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['name']) && isset($_SESSION['img'])) {
  include("connection.php");
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
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <h5 class="card-title">All Display Cars</h5>
            <div class="align-items-center">
            <a href="add_car.php" type="button" class="btn btn-info">Add Cars</a>
            </div>
          </div>
          <!-- Default Table -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">brand</th>
                <th scope="col">Milege</th>
                <th scope="col">Trans</th>
                <th scope="col">Seats</th>
                <th scope="col">Luggage</th>
                <th scope="col">Fuel</th>
                <th scope="col">Image</th>
                <th scope="col">Hourly Price</th>
                <th scope="col">Daily Price</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sqli = "SELECT * FROM `cars`";
              $result = $conn->query($sqli);
              while ($row_ars = $result->fetch_array()) {
              ?>
                <tr>
                  <td><?php echo $row_ars['name']; ?></td>
                  <td><?php echo $row_ars['brand']; ?></td>
                  <td><?php echo $row_ars['mileage']; ?></td>
                  <td><?php echo $row_ars['transmission']; ?></td>
                  <td><?php echo $row_ars['seats']; ?></td>
                  <td><?php echo $row_ars['luggage']; ?></td>
                  <td><?php echo $row_ars['fuel']; ?></td>
                  <td><img style="height: 65px; width: 108px;" src="../<?php echo $row_ars['image']; ?>" alt=""></td>
                  <td><?php echo $row_ars['hourly_price']; ?></td>
                  <td><?php echo $row_ars['daily_price']; ?></td>
                  <td><a href="edit_car.php?id=<?php echo $row_ars['id']; ?>&edit=true"><i class="bi bi-pencil-square"></i></a></td>
                  <!-- <td><a href="cars.php?id=<?php // echo $row_ars['id']; 
                                                ?>&delete=true"><i class="bi bi-trash"></i></a></td> -->
                  <td><a onclick="sweetAlert('<?php echo $row_ars['id']; ?>','assets/cars.php')"><i class="bi bi-trash"></i></a></td>

                </tr>
              <?php } ?>
            </tbody>
          </table>
          <!-- End Default Table Example -->
        </div>
      </div>
    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <?php include "assets/common/footer.php"; ?>
  </body>

  </html>
<?php } else {
  header("Location: ../admin.php?error");
} ?>