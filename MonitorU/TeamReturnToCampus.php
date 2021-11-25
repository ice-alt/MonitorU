<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>MonitorU</title>
	<link href="TeamStyle.css" rel="stylesheet" type="text/css">
	<style>
		<?php include("TeamStyle.css"); ?>
</style>
</head>
	<body>


<p class="updaatetext">Update your status</p>

<!--Sidebar navigation-->
<div class="sidenav">
			<a class="sidenav1 current" href="TeamHomepage.php">Home</a></li>
			<a class="sidenav1" href="TeamCampusLog.php">Campus Log</a>
			<a class="sidenav1" href="UploadDocument.php">Upload Document</a>
			<a class="sidenav1" href="TeamReportIssue.php">Report Issue</a>
	</div>

<!--Form to accept users ID-->
<form action="http://localhost/TeamReturnToCampus.php" method="post">
 		<label style="color: white; margin-left: 200px;">ID: </label> <input type="text" name="id" placeholder="ID"> <input type="submit" name="submit" class="submitbtnreturnform" value="Submit"><br><br><br>
</form>


<!--Table of users details-->
 <table border="2">
  <tr>
    <th>ID</th>
    <th>Departure time</th>
    <th>Departure date</th>
    <th>Destination</th>
    <th>Phone number of Companion</th>
    <th>Expected return date</th>
    <th>Status</th>
    <th>Action</th>
  </tr>


<?php 

		//Connecting to the database
		require("TeamDatabaseConnect.php");

		//If statement that triggers query from the database - Retrieving details from the database
		if(isset($_POST['submit'])){

			//Assigns form input names to variables
			$ID = $_POST["id"];

			//Query to retrieve variables into the database
			$query = "SELECT * FROM leaving_returning WHERE id = '".$ID."'";

			//Execution of query
			$result = mysqli_query($conn, $query);
		

			
			//Fetching infomation from the database in a tabular form
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
?>
		<table>
				<tr>
    				<td><?php echo $row['id']; ?></td>
    				<td><?php echo $row['departtime']; ?></td>
    				<td><?php echo $row['departdate']; ?></td>
    				<td><?php echo $row['destination']; ?></td> 
    				<td><?php echo $row['phonecomp']; ?></td> 
    				<td><?php echo $row['returndate']; ?></td> 
    				<td><?php echo $row['absent_present']; ?></td>     
    				<td><a href="UpdateStatus.php?id=<?php echo $row['id']; ?>">Change Status</a></td>
  				</tr>	
<?php

				}


			}

			//Displays message when there is nothing retrieved from the database
			else {?>
					<p class="colortext"><?php echo "0 results"; ?></p>;
					<?php
			}
			?>

			</table>



	<?php
		}
		

		

		//Closes connection to database
		 $conn->close();
	?>

</table>


	</body>
</html>