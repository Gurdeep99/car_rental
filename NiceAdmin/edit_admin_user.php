<?php
ob_start();
session_start();
include("connection.php");

if (isset($_GET['edit'])) {

    $res_get_data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM admin_user WHERE id = '" . $_GET['edit'] . "'"));
}
if (isset($_GET['edit_update'])) {

    $name = $_POST['name'];
    $username = $_POST['username'];
    //----------------------------------------------------------------------------------------------------------------

    $photo = $_FILES['photo'];
    // echo"<pre>";
    // print_r($photo);
    // die();
    $filename = $photo['name'];   //get file name path
    $filetmp = $photo['tmp_name']; //get file temprary path
    //=============================
    $fileext = explode('.', $filename); // split the file name using "." 
    // echo "<pre>";
    // print_r($fileext);
    // die();
    $filecheck = strtolower(end($fileext));  // to get last value value of that array 

    $random_name = rand(000, 999); // to generate random number

    $fileextstore = array('png', 'jpg', 'jpeg', 'jfif'); // server side validation for image

    if (in_array($filecheck, $fileextstore)) {  // in array to compare the validation with our array
        $destinationfile = './assets/img/' . $name . '-' . $random_name . '.' . $filecheck;
        //echo //die();
        move_uploaded_file($filetmp, $destinationfile);
    }

    //----------------------------------------------------------------------------------------------------------------
    $edit_id = $_POST['update_id'];
    $company = $_POST['company'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $query_update_admin_user = "UPDATE `admin_user` SET
 `username`='" . $username . "',
 `name`='" . $name . "',
 `company`='" . $company . "',
 `country`='" . $country . "',
 `address`='" . $address . "',
 `phone`='" . $phone . "'
  WHERE `id` ='" . $edit_id . "'";
    $res_update_admin_user = mysqli_query($conn, $query_update_admin_user);
    if ($res_update_admin_user) {

        if (isset($destinationfile)) {
            $query_update_photo = "UPDATE `admin_user` SET `img` = '" . $destinationfile . "' WHERE id='" . $edit_id . "'";
            $res_update_photo = mysqli_query($conn, $query_update_photo);
            if ($res_update_photo) {
                header("Location: edit_admin_user.php?update_sucess=true&edit=" . $edit_id);
            }
        } else {
            header("Location: edit_admin_user.php?update_sucess=true&edit=" . $edit_id);
        }
    }
}


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
                        <h5 class="card-title">Edit Admin User</h5>

                        <!-- General Form Elements -->
                        <form action="?edit_update=true" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $res_get_data['id']; ?>" name="update_id">

                            <?php if (isset($_GET['update_sucess'])) { ?>
                                <div class="row mb-3">
                                    <div class="alert alert-primary" role="alert">
                                        Admin <?php echo $res_get_data['name']; ?>! Updated...
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Full Nmae</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="<?php echo $res_get_data['name']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="username" value="<?php echo $res_get_data['username']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Profile Photo</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="photo">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Company</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="company" value="<?php echo $res_get_data['company']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Country</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="country" value="<?php echo $res_get_data['country']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="address" value="<?php echo $res_get_data['address']; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Phone Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="phone" value="<?php echo $res_get_data['phone']; ?>">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update Admin User</button>
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