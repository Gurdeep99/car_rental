<?php
// Start the session
session_start();

// Function to connect to the database
function connectToDatabase()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "car_rental";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Function to retrieve user data from the database based on email
function getUserByEmail($email)
{
    // Connect to the database
    $conn = connectToDatabase();

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Return user data
    return $result->fetch_assoc();
}

// Process login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user data from the database based on email
    $user = getUserByEmail($email);



    if ($user && password_verify($password, $user['password'])) {
        // Store user data in session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];

        // Redirect to index.php with user's name as parameter
        header("Location: index.php?name=" . urlencode($user['name']));
        exit();
    } else {
        // Set error message
        $error_message = "Invalid email or password.";

        // Redirect back to login page with error message
        header("Location: login.php?error=" . urlencode($error_message));
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Login</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {

            /* background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url('https://img.freepik.com/free-photo/sports-car-driving-asphalt-road-night-generative-ai_188544-8052.jpg'); */
            background-image: url('images/bg_1.jpg');
            background-size: cover;

        }

        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }

        form {
            height: auto;
            width: 400px;
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
            line-height: 42px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 30px;
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
            margin-top: 50px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
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

        .alert {
            margin-top: 26px;
            padding: 20px;
            background-color: cyan;
            /* Red */
            color: black;
            margin-bottom: 15px;
        }

        /* The close button */
        .closebtn {
            margin-left: 15px;
            color: black;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        /* When moving the mouse over the close button */
        .closebtn:hover {
            color: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 loginBackgroundImg">
                <div class="background">
                    <div class="shape"></div>
                    <div class="shape"></div>
                </div>

                <?php if (isset($_GET['forgot']) && $_GET['forgot'] == 'true' && $_GET['auth'] == "7c8d2bbd70058070bbff35da898dd77a3b6c0d1fe5ae4ccde9e7f320dddcf6db3047356d7960c440de38b9dc08fc0467f0472c5ee02ce88f4b04e337c860cfcc") { ?>

                    <form action="assets/forgot_clint.php" method="post">

                        <h3>Forget Password</h3>

                        <label for="username">Username</label>
                        <input type="text" placeholder="Email Address" id="email" name="email">


                        <button type="submit">Forgot Password</button>
                        <div class="social">

                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <h4><a href="signup.php">Sign Up</a></h4>
                            <h4><a href="login.php">Log In</a></h4>
                        </div>
                    </form>

                <?php } elseif (isset($_GET['otp']) && $_GET['otp'] == 'true') { ?>

                    <form style="width: 635px;" action="assets/forgot-clint-reset.php?user=<?php echo $_GET['user'];?>" method="post">

                        <h3>Forget Password</h3>

                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                <?php echo $_GET['error']; ?>
                            </div>
                        <?php } ?>

                        <label for="email">Username</label>
                        <input type="text" placeholder="Email Address" id="email" name="email" value="<?php echo $_GET['user'];?>" disabled>

                        <label for="otp">OTP</label>
                        <input type="text" placeholder="Please Enter OTP" id="otp" name="otp">

                        <label for="new_password">New Password</label>
                        <input type="password" placeholder="New password" id="new_password" name="new_password" value="">

                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" placeholder="Confirm password" id="confirm_password" name="confirm_password" value="">

                        <button type="submit">Forgot Password</button>
                        
                        <div style="display: flex; justify-content: space-between; margin-top: 30px">
                            <h4><a href="signup.php">Sign Up</a></h4>
                            <h4><a href="login.php">Log In</a></h4>
                        </div>
                    </form>


                <?php } else { ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                        <h3>Login</h3>
                        <?php if (isset($_GET['login'])) { ?>
                            <div class="alert">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                Please Login First
                            </div>
                        <?php } ?>
                        <label for="username">Username</label>
                        <input type="text" placeholder="Email or Phone" id="email" name="email">

                        <label for="password">Password</label>
                        <input type="password" placeholder="Password" id="password" name="password">

                        <button type="submit">Log In</button>
                        <div class="social">

                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <h4><a href="signup.php">SignUp</a></h4>
                            <h4><a href="login.php?forgot=true&auth=7c8d2bbd70058070bbff35da898dd77a3b6c0d1fe5ae4ccde9e7f320dddcf6db3047356d7960c440de38b9dc08fc0467f0472c5ee02ce88f4b04e337c860cfcc">Forgot Password</a></h4>
                        </div>
                    </form>
                <?php } ?>

            </div>
        </div>
    </div>

</body>

</html>