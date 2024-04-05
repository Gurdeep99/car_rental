<?php
  ob_start();
	session_start();
	include("conn.php");
	   
      // echo $sql = "INSERT INTO teacher SET Name ='".$_POST['teacher_name']."' , 
	  // Medium_Id ='".$_POST['medium_id']."' , Subject_Id ='".$_POST['subject_id']."' , 
	  // Other ='".$_POST['other']."'";	
	 
	
	  // $id = $_GET["id"];
	  // print_r($id);
      // $deletesql = "DELETE FROM teacher WHERE I_d=".$id;
     
      // $result = $conn->query($deletesql); 
	  // if ($result){
	  // header('Location: http://localhost/test/student_list.php');
      
	  // }	
	 
	 if($_GET){
	     print_r($_GET);   
         $id = $_GET["id"];
		 print_r($id);

		 $sqli2 = "DELETE FROM collage WHERE Id=".$id; 
  	     print_r($sqli2); 
		 $result = $conn->query($sqli2);
         // $row = $result->fetch_assoc();
	     // print_r($row);
	 }
	 
	 //print_r($_GET);
	 
	 // print_r($_GET);
      // $id = $_GET["id"];
	  // print_r($id);
     // $deletesql = "DELETE FROM collage WHERE Id=".$id;
	 
    // $result = $conn->query($deletesql); 
	// if($result){
	   // header('Location: http://localhost/test/delete2.php');
     // }
   
  
	 
	 // print_r($id);
	 // $id = $_GET["id"];
	 // print_r($id);
     // $deletesqli2 = "DELETE FROM collage WHERE Id=".$id;
     
     // $result = $conn->query($deletesqli2); 
	  // if ($result){
	   // header('Location: http://localhost/test/formlist.php');
     // }
   
?>