<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>MonitorU</title>
	<link href="TeamStyle.css" rel="stylesheet" type="text/css">
</head>
	<body>

	<div class="main2">
		<br><br>
		<p style="text-align: center">Please fill in the following details: </p><br>

		<!--Form to accept users details-->
		<form action="" method="post">
	  		<label class="campusformtext">ID: </label><input type="text" name="id" size="30" placeholder="ID" required/>
      		<label class="campusformtext2">Departure Time: </label><input type="time" name="departuretime" size="30" placeholder="Time" required/><br><br><br>
      		<label class="campusformtext">Departure Date: </label><input type="date" name="departuredate" size="30" placeholder="Date" required/>
     		<label class="campusformtext2">Destination: </label><input type="text" name="destination" size="30" placeholder="Destination" required/><br><br><br>
      		<label class="campusformphone">Phone number of a Companion: </label><input type="tel" name="tele2" size="30" placeholder="Phone number of a Companion" required/>
     		<label class="campusformdate">Expected return date: </label><input type="date" name="returndate" size="30" placeholder="Expected return date" required/><br><br><br>
      		<label class="campusformtext3">Status (Type in "Absent"): </label><input type="text" name="status" size="30" placeholder="Status" required/><br><br><br>
    
    </div>
      		<input type="submit" name="submit" class="submitbtncampusform" value="Submit">
      
		</form>

	<br><br><br><br><br>

	<!--Previous button-->
	<form action="TeamHomepage.php">
		<input type="submit" name="previous" class="prevbtncamousform" value="< Previous">
	</form>

	
	<?php

		//Connecting to the database
		require("TeamDatabaseConnect.php");

		//If statement that triggers query from the database - inserting details into the database
		 if(isset($_POST["submit"])){

		 	//Assigns form input names to variables
		 	$ID = $_POST['id'];
      		$DepartTime = $_POST['departuretime'];
      		$DepartDate = $_POST['departuredate'];
      		$Destination = $_POST['destination'];
      		$PhoneComp = $_POST['tele2'];
      		$ReturnDate = $_POST['returndate'];
      		$Status = $_POST['status'];


      		//Query to insert values into the database
      		$query = "INSERT INTO `leaving_returning` (`id`, `departtime`, `departdate`, `destination`, `phonecomp`, `returndate`, `absent_present`) VALUES ('$ID','$DepartTime', '$DepartDate', '$Destination', '$PhoneComp', '$ReturnDate', '$Status')";

      		//Execution of query
      		mysqli_query($conn, $query);

      		//Redirects to another page
      		header("location: ConfirmLeave.php");




		 }

		 //Closes connection to database
		 $conn->close();


	?>

	</body>
</html>