<?php
    ob_start();
	session_start();
	include("connection.php");
	

    $sqli = "SELECT * FROM car_bookings"; 
  	   $result = $conn->query($sqli);
  	// Associative array
       ?>
  <html>
    <body>
      <head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
        <style>
          table{
            width: 100%;
          }
          tr th{
            padding: 25px;
            background-color:blue;
          }
          tr td{
            padding: 25px;
            background-color:whitesmoke;
          }
          tr td i{
            padding-left: 15px;
          }
        </style>
      </head>
      <table border="1">
  <!--<colgroup>
    <col span="1" style="background-color:lightblue">
    <col span="1" style="background-color:lightblue">
  </colgroup>--><tr>
<th colspan="2">Name</th>
<th colspan="2">Phone</th>
<th colspan="2">Pickup Location</th>
<th colspan="2">Dropoff Location</th>
<th colspan="2">Pickup Date</th>
<th colspan="2">Dropoff Date</th>
<th colspan="2">fPickup Time</th>
<th colspan="2">Car Id</th>
<th colspan="2">Driver Choice</th>
<th colspan="2">Delete</th>
<th colspan="2">Update</th>
</tr>
  <?php 
  while ($row = $result->fetch_array()) {   //echo "<pre>";print_r($row);
    ?>

<tr>
<td colspan="2"><?php echo $row["name"];?></td>
<td colspan="2"><?php echo $row["phone"];?></td>
<td colspan="2"><?php echo $row["pickup_location"];?></td>
<td colspan="2"><?php echo $row["dropoff_location"];?></td>
<td colspan="2"><?php echo $row["pickup_date"];?></td>
<td colspan="2"><?php echo $row["dropoff_date"];?></td>
<td colspan="2"><?php echo $row["pickup_time"];?></td>
<td colspan="2"><?php echo $row["car_id"];?></td>
<td colspan="2"><?php echo $row["driver_choice"];?></td>


<td><a href="car_bookings.php?id=<?php echo $row['id'] ?> " onclick="return confirm('Are You Sure?')"><i class="fa-solid fa-trash-can"></i></a></td>

<td><a href="car_bookings.php?id=<?php echo $row['id'] ?>  " onclick="return confirm('Are You Sure?')"><i class="fa-solid fa-pen-to-square"></i></a></td>
 </tr>
	   <?php
   }
?>
</table>
</body>
</html>
<?php 	
	
?>