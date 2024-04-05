<?php
ob_start();
session_start();
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

        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Car</h5>

                        <!-- General Form Elements -->
                        <form action="assets/data/add_car.php" method="POST" enctype="multipart/form-data">

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Car Photo</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="photo">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Car name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Car Brand</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="brand">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Milege</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="mileage">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Transmission Type</label>
                                <div class="d-flex col-sm-10 align-items-center">
                                    <div class="pl-1">
                                        <input type="radio" name="transmission" value="Automatic"> Automatic
                                    </div>
                                    <div class="pl-1">
                                        <input type="radio" name="transmission" value="Manual"> Manual
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">  
                                <label for="inputGroupSelect01" class="col-sm-2 col-form-label">Seats</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <select class="custom-select" name="seat" id="inputGroupSelect01">
                                            <option selected>Choose...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                            <option value="4">Four</option>
                                            <option value="5">Five</option>
                                            <option value="6">Six</option>
                                            <option value="7">Seven</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Luggage</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="luggage">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Fuel</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="fuel">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Hourly Price</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="hourly_price">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Daily Price</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="daily_price">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Car Features</label>

                                <div class="d-flex col-sm-10">
                                    <div class="pl-1">
                                        <div>
                                            <input type="checkbox" name="AC" value="ac"><label class="pl-1">Air Conditioning</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="CS" value="cs"><label class="pl-1">Child Seat</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="GPS" value="gps"><label class="pl-1">GPS</label>
                                        </div>
                                    </div>
                                    <div class="pl-1">
                                        <div>
                                            <input type="checkbox" name="MS" value="ms"><label class="pl-1">Music System</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="SB" value="sb"><label class="pl-1">Seat Belt</label>
                                        </div>
                                    </div>
                                    <div class="pl-1">
                                        <div>
                                            <input type="checkbox" name="LUG" value="lug"><label class="pl-1">Luggage</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="SBD" value="sb"><label class="pl-1">Sleeping Bed</label>
                                        </div>
                                    </div>
                                    <div class="pl-1">
                                        <div>
                                            <input type="checkbox" name="WAT" value="wat"><label class="pl-1">Water</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="BT" value="bt"><label class="pl-1">Bluetooth</label>
                                        </div>
                                    </div>
                                    <div class="pl-1">
                                        <div>
                                            <input type="checkbox" name="OCI" value="oci"><label class="pl-1">Onboard computer</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="AIP" value="aip"><label class="pl-1">Audio input</label>
                                        </div>
                                    </div>
                                    <div class="pl-1">
                                        <div>
                                            <input type="checkbox" name="LTT" value="ltt"><label class="pl-1">Long Term Trips</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="CKT" value="ckt"><label class="pl-1">Car Kit</label>
                                        </div>
                                    </div>
                                    <div class="pl-1">
                                        <div>
                                            <input type="checkbox" name="RCL" value="rcl"><label class="pl-1">Remote central locking</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="CCL" value="ccl"><label class="pl-1">Climate control</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Car Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="description">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Add</button>
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