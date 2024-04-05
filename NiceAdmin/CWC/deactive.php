
<?php

	// Connect to database
	$conn = mysqli_connect("localhost","root","","cms");
	
	// Get all the courses from courses table
	// execute the query
	// Store the result
	//fetch query
	$sql = "SELECT * FROM `collage`";
	$Sqli = mysqli_query($conn,$sql);
	$All_collage = mysqli_fetch_all($Sqli,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">
	
	<!-- Using internal/embedded css -->
	<style>
		<!--.btn{
			background-color: red;
			border: none;
			color: white;
			padding: 5px 5px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 20px;
			margin: 4px 2px;
			cursor: pointer;
			border-radius: 20px;
		}
		.green{
			background-color: #199319;
		}
		.red{
			background-color: red;
		}-->
		table,th{
			border-style : solid;
			border-width : 1;
			text-align :center;
		}
		td{
			text-align :center;
		}
	</style>	
</head>

<body>
	<h2>COLLEGE</h2>
	<table>
		<!-- TABLE TOP ROW HEADINGS-->
		<tr>
			<th>COLLAGE FIELD</th>
			<th>COLLAGE STATUS</th>
			<th>TOGGLE</th>
		</tr>
		<?php
           // Use foreach to access all the courses data
			foreach ($All_collage as $collage) { ?>
			<tr>    
				<td><?php echo $collage["name"]; ?></td>
				<td><?php
						// Usage of if-else statement to translate the
						// tinyint status value into some common terms
						// 0-Inactive
						// 1-Active
						if($collage['status']=="1")
							echo "Active";
						else
							echo "Inactive";
					?>						
				</td>
				<td>
					<?php
					//& after the using this if
					if($collage['status']=="1")
					    // if a course is active i.e. status is 1
						// the toggle button must be able to deactivate
						// we echo the hyperlink to the page "deactivate.php"
						// in order to make it look like a button
						// we use the appropriate css
						// red-deactivate
						// green- activate
						echo
"<a href=deactive.php?id=".$collage['id']." class='btn'>Deactive</a>";
					    else
						echo
"<a href=active.php?id=".$collage['id']." class='btn'>Active</a>";
					?>
			</tr>
		<?php
				}
				// End the foreach loop

    // Connect to database 
    $con=mysqli_connect("localhost","root","","cms");
  
    // Check if id is set or not, if true,
    // toggle else simply go back to the page
    if (isset($_GET['id'])){
  
        // Store the value from get to 
        // a local variable "course_id"
        $collage_id=$_GET['id'];
  
        // SQL query that sets the status to
        // 0 to indicate deactivation.
        $sql="UPDATE `collage` SET 
            `status`=0 WHERE Id='$collage_id'";
  
        // Execute the query
        mysqli_query($con,$sql);
    }
  
    // Go back to course-page.php
    // header('location: aa.html');
?>
</table>
</body>
</html>