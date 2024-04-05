<?php
session_start();
$conn = mysqli_connect("localhost","root","","car_rental");
if($conn){
  if(isset($_POST['submit']))
  {
    $name = $_POST["username"];
    $pass=$_POST["password"];
    $query = "SELECT * FROM admin WHERE username='{$name}' AND password='{$pass}' ";
    $sql = mysqli_query($conn,$query);
    $row =   mysqli_fetch_row($sql);
    if($row)
    {
      $_SESSION["username"]=$row[1];
      header("location:index.php");
    }
    else{
        echo "<style>.wrapper .form form .error-txt{display:block;}</style>";
     }

  } 
}
else{
  echo "no";
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="adminStyle.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
  </head>
  <body>
    <div class="wrapper">
      <section class="form login">
        <header>Realtime Chat App</header>
        <form action="" method="POST">
          <div class="error-txt">This is an error message</div>
          <div class="field input">
            <label>Usename</label>
            <input type="text" name="username" placeholder="Username" />
          </div>
          <div class="field input">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password" /><i class="ri-eye-fill"></i>
          </div>
          <div class="field button">
            <input type="submit" name="submit">
          </div>
        </form>
        <div class="link">Don't have account <a href="index.php">Signup Now</a></div>
      </section>
    </div>
  </body>
</html>
