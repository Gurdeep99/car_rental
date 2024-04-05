<?php
    ob_start();
	session_start();
	include("conn.php");
    
	//ID Get from GET METHOD
	//And ID is SET or NOT SET because using of ISSET 
	if (isset($_GET['pageno'])) {
		$pageno = $_GET['pageno'];
	} else {
		$pageno = 1;
	}
	  //how many numbers of records in one page  
		$no_of_records_per_page = 2;
		
	  //formula for offset 
      $offset = ($pageno-1) * $no_of_records_per_page; 
	
	
      $total_pages_sql = "SELECT COUNT(*) FROM pagination";
		
	  $result = mysqli_query($conn,$total_pages_sql);
		
	  $total_rows = mysqli_fetch_array($result);
	    //print_r($total_rows[0]);
		
	  $total_pages = ceil($total_rows[0] / $no_of_records_per_page);
	//define variable
	$sqli2 = "SELECT * FROM pagination LIMIT $offset, $no_of_records_per_page";
    $result = $conn->query($sqli2);
	
	?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
body{
background-color:purple;
}
tr th{
background-color:pink;
padding: 15px;
}
tr td{
text-align:center;
padding: 15px;
}
 
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

ul.pagination {
    display: inline-block;
    padding: 0;
    margin: 0;
}

ul.pagination li {display: inline;}

ul.pagination li a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
}

ul.pagination li a:hover:not(.active) {background-color: green;}
</style>
<body>	
<table style="width:100%">
  <colgroup>
    <col span="10" style="background-color:lightblue">
  </colgroup>
<tr>

<th>ID</th>
<th>NAME</th>
<th>ADDRESS</th>
<th>CITY</th>
<th>STATE</th>
<th>OWNER</th>
<th>UPDATE</th>

<th>DELETE</th>
<th>ACTION</th>

</tr>
 <?php 

 while ($row = $result->fetch_array()) {   //echo "<pre>";print_r($row);

?>


<tr>
 <td><?php echo $row["id"];?></td>
 <td><?php echo $row["name"];?></td>
 <td><?php echo $row["address"];?></td>
 <td><?php echo $row["city"];?></td>
 <td><?php echo $row["state"];?></td>
 <td><?php echo $row["owner"];?></td>
 


<td><a href="dataUpdate.php?id=<?php echo $row['id']; ?> " onclick="return confirm('Are You Sure?')"><i class="fa-solid fa-pen-to-square"></i></a></td>
<td><a href="dataDelete.php?id=<?php echo $row['id']; ?> " onclick="return confirm('Are You Sure?')"><i class="fa-solid fa-trash-can"></i></a></td>
<td><a href="active.php?id=<?php echo $row['id']; ?> " onclick="return confirm('Are You Sure?')"><i class="fa-solid fa-eye"></i></a></td>
</tr>  
  <?php
	
	}
	
 ?>

<tr><td colspan="10" align="right" >
  <ul class="pagination">
  <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
   <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
   </li>
    
   <li><a href="?pageno=1">1</a></li>
   <li><a href="?pageno=2">2</a></li>
   <li><a href="?pageno=3">3</a></li>
   <li><a href="?pageno=4">4</a></li>
   <li><a href="?pageno=5">5</a></li>
   <li><a href="?pageno=6">6</a></li>
   <li><a href="?pageno=7">7</a></li>
   <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
   <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
   </li>
</ul> 
</td></tr>
</table>
   <!--<li><a href="?pageno=<?php //echo $total_pages; ?>">Last</a></li>-->

</head>
</body>
</html>