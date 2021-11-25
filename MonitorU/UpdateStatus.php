<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>MonitorU</title>
	<link href="TeamStyle.css" rel="stylesheet" type="text/css">
</head>
<body>



	


<?php
	
	//Connecting to the database
	require("TeamDatabaseConnect.php");

	//Retrieves ID from databasee	
	$id = $_GET['id'];

	//Query to retrieve values from the database
	$qry = "SELECT * FROM  leaving_returning WHERE id = '".$id."'";

	//Execution of query
	$result = mysqli_query($conn, $qry);

	$row = mysqli_fetch_array($result);

	//If statement that triggers query from the database - updating the database
	if(isset($_POST['update'])){
		$return = $_POST['status'];

		$query = "UPDATE leaving_returning SET absent_present='".$return."' WHERE id= '".$id."'";

		//Execution of query
		$result1 = mysqli_query($conn, $query);


		if($result1)
    {

        echo "<script>alert('Update successful!')</script>";
        header("location:ConfirmReturn.php");
        
    }
    else
    {
        echo "<script>alert('Update unsuccessful!')</script>";
    }    	





		
	}


 $conn->close();


?>



<form action="" method="post">
		<br><br><br><br><br><br><br><br><br>
		<label class="statusupdate" for="status">Status (Type in "Present"): </label><input type="text" name="status" value="<?php echo $row['absent_present'] ?>" /><br><br><br>
		
  	
  	<input type="submit" name="update" class="updatebtn" value="Update"><br><br>
	</form>




	</body>
</html>