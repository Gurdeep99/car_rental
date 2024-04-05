<?php
    ob_start();
	session_start();
	include("connection.php");
	

    $sqli = "SELECT * FROM dataInsert"; 
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
            background-color:blueviolet;
          }
          tr td{
            padding: 25px;
            background-color:wheat;
          }
          tr td i{
            padding-left: 15px;
          }
        </style>
      </head>
	 <table>
  <colgroup>
    <col span="6" style="background-color:lightblue">
    <col span="5" style="background-color:lightblue">
  </colgroup><tr>
<th scope="col">ID</th>
<th scope="col">NAME</th>
<th scope="col">EMAIL</th>
<th scope="col">MOBILE</th>
<th scope="col">PASSWORD  </th>
<th scope="col">DELETE</th>
<th scope="col">UPDATE</th>

</tr>
  <?php 
  while ($row = $result->fetch_array()) {   //echo "<pre>";print_r($row);
    ?>

<tr>
<td><?php echo $row["user_id"];?></td>
<td><?php echo $row["user_name"];?></td>
<td><?php echo $row["user_email"];?></td>
<td><?php echo $row["user_mob"];?></td>
<td><?php echo $row["user_pass"];?></td>

<td><a href="dataDelete.php?id=<?php echo $row['user_id'] ?> " onclick="return confirm('Are You Sure?')"><i class="fa-solid fa-trash-can"></i></a></td>

<td><a href="dataUpdate.php?id=<?php echo $row['user_id'] ?>   " onclick="return confirm('Are You Sure?')"><i class="fa-solid fa-pen-to-square"></i></a></td>
 </tr>
	   <?php
	   
   }
?>
</table>
</body>
</html>
<?php 	
	
?>