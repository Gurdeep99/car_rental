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
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col">License</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sqli = "SELECT * FROM `job`";
              $result = $conn->query($sqli);
              while ($row_ars = $result->fetch_array()) {   //echo "<pre>";print_r($row);
              ?>
                <tr>
                  <td><?php echo $row_ars['name']; ?></td>
                  <td><?php echo $row_ars['email']; ?></td>
                  <td><?php echo $row_ars['message']; ?></td>
                  <td><?php echo $row_ars['license']; ?></td>
                  <td><a href="edit_job.php?id=<?php echo $row_ars['id']; ?>&edit=true"><i class="bi bi-pencil-square"></i></a></td>
                  <td><a onclick="sweetAlert('<?php echo $row_ars['id']; ?>','assets/job.php')"><i class="bi bi-trash"></i></a></td>
                  <!-- <td><a href="job.php?id=<?php //echo $row_ars['id']; 
                                                ?>&delete=true"><i class="bi bi-trash"></i></a></td> -->
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