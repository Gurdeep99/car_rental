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
          <h5 class="card-title">Default Table</h5>
          <!-- Default Table -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Pickup location</th>
                <th scope="col">Drop off location</th>
                <th scope="col">Pickup Date</th>
                <th scope="col">Drop off Date</th>
                <th scope="col">Pickup Time</th>
                <th scope="col">Car Id</th>
                <th scope="col">Driver Choice</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sqli = "SELECT * FROM `car_bookings`";
              $result = $conn->query($sqli);

              while ($row_ars = $result->fetch_array()) {   //echo "<pre>";print_r($row);
              ?>
                <tr>
                  <td><?php echo $row_ars['name']; ?></td>

                  <td><?php echo $row_ars['phone']; ?></td>
                  <td><?php echo $row_ars['pickup_location']; ?></td>
                  <td><?php echo $row_ars['dropoff_location']; ?></td>
                  <td><?php echo $row_ars['pickup_date']; ?></td>
                  <td><?php echo $row_ars['dropoff_date']; ?></td>
                  <td><?php echo $row_ars['pickup_time']; ?></td>
                  <td><?php echo $row_ars['car_id']; ?></td>
                  <td><?php echo $row_ars['driver_choice']; ?></td>
                  <td><a href="edit_car_booking.php?id=<?php echo $row_ars['id']; ?>&edit=true"><i class="bi bi-pencil-square"></i></a></td>
                  <!-- <td><a href="car_bookings.php?id=<?php echo $row_ars['id']; ?>&delete=true"><i class="bi bi-trash"></i></a></td> -->
                  <td><a onclick="sweetAlert('<?php echo $row_ars['id']; ?>','assets/car_bookings.php')"><i class="bi bi-trash"></i></a></td>
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