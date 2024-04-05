<?php
ob_start();
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['name']) && isset($_SESSION['img'])) {
    include("connection.php");

?>
    <!DOCTYPE html>
    <html lang="en">

    <?php include "assets/common/head.php"; ?>
    <style>



    </style>

    <body>
        <!-- ======= Header ======= -->
        <?php include "assets/common/navbar.php"; ?>
        <!-- ======= Sidebar ======= -->
        <?php include "assets/common/sidebar.php"; ?>
        <main id="main" class="main">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Admin list</h5>
                    <!-- Default Table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact Number</th>
                                <!-- <th scope="col">Edit</th> -->
                                <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sqli = "SELECT * FROM `admin_user`";
                            $result = $conn->query($sqli);
                            while ($row_ars = $result->fetch_array()) {
                            ?>
                                <tr>
                                    <td><?php echo $row_ars['name']; ?></td>
                                    <td><?php echo $row_ars['username']; ?></td>
                                    <td><?php echo $row_ars['phone']; ?></td>

                                    <!-- <td><a href="dataUpdate_users.php?id=<?php echo $row_ars['id']; ?>&edit=true"><i class="bi bi-pencil-square"></i></a></td> -->
                                    <!-- <td><a href="users.php?id=<?php echo $row_ars['id']; ?>&delete=true"><i class="bi bi-trash"></i></a></td> -->

                                    <?php if ($row_ars['name'] == "Soumya Das") {
                                        echo "<td>Super Admin</td>";
                                    } else { ?>

                                        <td>
                                            <a href="edit_admin_user.php?edit=<?php echo $row_ars['id']; ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a style="padding-left: 26px;" onclick="sweetAlert('<?php echo $row_ars['id']; ?>','assets/admin-list.php')">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    <?php } ?>


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