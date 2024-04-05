<?php
// Start the session
session_start();

if (isset($_POST['register_success']) && $_POST['register_success'] == 'true') {

    include "./connection.php";

    $name = mysqli_escape_string($conn,$_POST['name']);
    $email = mysqli_escape_string($conn,$_POST['email']);
    $contact_number = mysqli_escape_string($conn,$_POST['contact_number']);
    $password = mysqli_escape_string($conn,$_POST['password']);

    $res_get_data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '".$email."'"));

    if ($res_get_data['email'] != $email) {

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $query_register = "INSERT INTO `users`(`name`, `email`, `contact_number`, `password`) VALUES ('".$name."','".$email."','".$contact_number."','".$password_hash ."')";

        $res_register = mysqli_query($conn, $query_register);

        if($res_register){
           
            $res_get_data_verify = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `users` WHERE `name` = '".$name."'"));

            $_SESSION['user_id'] = $res_get_data_verify['id'];
            $_SESSION['user_name'] = $res_get_data_verify['name'];
            $_SESSION['user_email'] = $res_get_data_verify['email'];
    
            // Redirect to index.php with user's name as parameter
            header("Location: index.php?name=" . urlencode($res_get_data_verify['name']));
            exit();

        }

        
    }else{

        header("Location: signup.php?error=Username Already Exist");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>SignUp</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style media="screen">
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url('images/bg_2.jpg');
            width: 100%;
            background-size: cover;
        }

        .background {
            width: 430px;
            /* height: 400px; */
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 150px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }

        form {
            /* height: 600px; */
            width: 500px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
        }

        form * {
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 0.3px;
            text-align: center;
        }

        label {
            display: block;
            /* margin-top: 30px; */
            font-size: 16px;
            font-weight: 500;
        }

        input {
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        ::placeholder {
            color: #e5e5e5;
        }

        button {
            margin-top: 10px;
            width: 50%;
            margin-left: 60px;
            background-color: #ffffff;
            color: #080710;
            /* padding: 15px 0; */
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        .social {
            margin-top: 30px;
            display: flex;
        }

        .social div {
            background: red;
            width: 150px;
            border-radius: 3px;
            padding: 5px 10px 10px 5px;
            background-color: rgba(255, 255, 255, 0.27);
            color: #eaf0fb;
            text-align: center;
        }

        .social div:hover {
            background-color: rgba(255, 255, 255, 0.47);
        }

        .social .fb {
            margin-left: 25px;
        }

        .social i {
            margin-right: 4px;
        }
    </style>
</head>

<body>

    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <input type="hidden" name="register_success" value="true">

                    <h3>Sign Up</h3>

                    <?php
                    // Display session messages
                    if (isset($_SESSION['success_message'])) {
                        echo "<p style='padding-top: 30px;'>" . $_SESSION['success_message'] . "</p>";
                        unset($_SESSION['success_message']);
                    } else if (isset($_SESSION['error_message'])) {
                        echo "<p style='padding-top: 30px;'>" . $_SESSION['error_message'] . "</p>";
                        unset($_SESSION['error_message']);
                    } else if (isset($_GET['error'])) {
                        echo "<p style='padding-top: 30px;'>" . $_GET['error'] . "</p>";
                    }
                    ?>

                    <label for="name">Name</label>
                    <input type="text" placeholder="name" id="name" name="name">

                    <label for="username">Email</label>
                    <input type="text" placeholder="Email" id="username" name="email">

                    <label for="number">Contact Number</label>
                    <input type="text" placeholder="Contact Number" pattern="[789][0-9]{9}" id="contact_number" name="contact_number">

                    <label for="password">Password</label>
                    <input type="password" placeholder="password" id="password" name="password">

                    <button type="submit">Sign Up</button>
                    <div class="social">

                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>