<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="NiceAdmin/assets/img/favicon.png" rel="icon">
    <link href="NiceAdmin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="NiceAdmin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="NiceAdmin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="NiceAdmin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="NiceAdmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="NiceAdmin/assets/css/style.css" rel="stylesheet">

</head>

<body>

    <main>
        <?php if (isset($_GET['otp']) && $_GET['otp'] == 'true' && isset($_GET['user']) && isset($_GET['verify'])) { ?>
            <div class="container">
                <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

                                <div class="d-flex justify-content-center py-4">
                                    <a href="index.php" class="logo d-flex align-items-center w-auto">
                                        <img src="NiceAdmin/assets/img/logo1.png" alt="">
                                    </a>
                                </div><!-- End Logo -->
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="pt-4 pb-2">
                                            <h5 class="card-title text-center pb-0 fs-4">Enter OTP</h5>
                                            <p class="text-center small">Enter your OTP to reset Password</p>
                                        </div>
                                        <form class="row g-3 needs-validation" novalidate action="assets/forgot-password-reset.php" method="POST">
                                            <input type="hidden" name="verify_check" value="<?php echo $_GET['verify'] ?>">
                                            <input type="hidden" name="username_check" value="<?php echo $_GET['user']; ?>">

                                            <?php if (isset($_GET['error'])) {
                                                echo '<div class="col-12">
                                                <div class="alert alert-danger" role="alert">
                                                    ' . $_GET['error'] . '
                                                </div>
                                            </div>';
                                            } ?>
                                            <div class="col-12">
                                                <label for="yourUsername" class="form-label">Username</label>
                                                <div class="input-group has-validation">
                                                    <input type="text" name="username" class="form-control" value="<?php echo $_GET['user']; ?>" id="yourUsername" disabled required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="otp" class="form-label">OTP</label>
                                                <div class="input-group has-validation">
                                                    <input type="text" name="our_otp" class="form-control" id="otp" required>
                                                    <div class="invalid-feedback">Please enter OTP here</div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="password_new" class="form-label">New Password</label>
                                                <div class="input-group has-validation">
                                                    <input type="password" name="new_pass" class="form-control" id="password_new" required>
                                                    <div class="invalid-feedback">Please enter New Password</div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="confirm_pass" class="form-label">Confirm New Password</label>
                                                <div class="input-group has-validation">
                                                    <input type="password" name="conf_pass" class="form-control" id="confirm_pass" required>
                                                    <div class="invalid-feedback">Please Confirm New Password</div>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <button class="btn btn-primary w-100" type="submit">Reset Password</button>
                                            </div>
                                            <div class="col-12">
                                                <p class="small mb-0">Password Remember? <a href="admin.php">Login Now</a></p>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                                <div class="credits">

                                    Designed by <a href="">Soumya & Sufia</a>
                                </div>

                            </div>
                        </div>
                    </div>

                </section>

            </div>



        <?php } else { ?>

            <div class="container">
                <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

                                <div class="d-flex justify-content-center py-4">
                                    <a href="index.php" class="logo d-flex align-items-center w-auto">
                                        <img src="NiceAdmin/assets/img/logo1.png" alt="">
                                    </a>
                                </div><!-- End Logo -->
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="pt-4 pb-2">
                                            <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                                            <p class="text-center small">Enter your username to reset Password</p>
                                        </div>
                                        <form class="row g-3 needs-validation" novalidate action="assets/forgot-password.php" method="POST">


                                            <div class="col-12">
                                                <label for="yourUsername" class="form-label">Username</label>
                                                <div class="input-group has-validation">
                                                    <input type="text" name="username" class="form-control" id="yourUsername" required>
                                                    <div class="invalid-feedback">Please enter your username.</div>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <button class="btn btn-primary w-100" type="submit">Reset Password</button>
                                            </div>
                                            <div class="col-12">
                                                <p class="small mb-0">Password Remember? <a href="admin.php">Login Now</a></p>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                                <div class="credits">

                                    Designed by <a href="">Soumya & Sufia</a>
                                </div>

                            </div>
                        </div>
                    </div>

                </section>

            </div>
        <?php } ?>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="NiceAdmin/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="NiceAdmin/assets/vendor/echarts/echarts.min.js"></script>
    <script src="NiceAdmin/assets/vendor/quill/quill.min.js"></script>
    <script src="NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="NiceAdmin/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="NiceAdmin/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="NiceAdmin/assets/js/main.js"></script>

</body>

</html>