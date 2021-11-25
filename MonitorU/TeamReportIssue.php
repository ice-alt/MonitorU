<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>MonitorU</title>
	<link href="TeamStyle.css" rel="stylesheet" type="text/css">
</head>

	<body>


<!--Title written at the top of the page-->
<h3 class="uploadocumenttitle">Report Issue</h3><br><br>


<!--Sidebar navigation-->
<div class="sidenav">
			<a class="sidenav1" href="TeamHomepage.php">Home</a></li>
			<a class="sidenav1" href="TeamCampusLog.php">Campus Log</a>
			<a class="sidenav1" href="UploadDocument.php">Upload Document</a>
			<a class="sidenav1" href="TeamReportIssue.php">Report Issue</a>
</div>


<!--Form to accept feedback from user-->
<form action="" method="post">
		<textarea name="report" rows="20" cols="100" class="textarea">Write issue here...</textarea>
  		<br><br>
  		<label class="emailreport">Email: </label><input type="text" name="email" placeholder="Email" required/><br><br><br>
  		<input type="submit" name="submit" class="submitbtnreport" value="Submit">
</form>



<?php

	
	//Connecting to the database
	require("TeamDatabaseConnect.php");


	//If statement that triggers query from the database - Allows users input to be inserted
	if(isset($_POST['submit'])){


			//Assigns form input names to variables
			$report = $_POST["report"];
			$email = $_POST["email"];


			//Query to insert variables into the database
			$query = "INSERT INTO `report_issue` (`comments`, `email`) VALUES ('$report', '$email')";


			//Execution of query
			mysqli_query($conn, $query);

			//Displays message from browser
     		echo "<script>alert('The issue will be resolved as soon as possible!')</script>";


		}



	//Closes connection to database
	$conn->close();

?>









	</body>
</html>