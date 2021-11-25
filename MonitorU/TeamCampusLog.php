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

<!--Title written at the top of the page-->
<h3 class="uploadocumenttitle">Campus Log</h3><br>

<!--Sidebar navigation-->
<div class="sidenav">
			<a class="sidenav1" href="TeamHomepage.php">Home</a></li>
			<a class="sidenav1" href="TeamCampusLog.php">Campus Log</a>
			<a class="sidenav1" href="UploadDocument.php">Upload Document</a>
			<a class="sidenav1" href="TeamReportIssue.php">Report Issue</a>
</div>


<!--Form to accept ID and search for it-->
<form action="TeamCampusLog.php" method="post">
 		<label class="idcampuslog">ID: </label> <input type="text" name="id" placeholder="ID">  <input type="submit" name="submit" class="submitbtnreturnform" value="Search"><br><br><br>
 		<input type="submit" name="delete" class="deletepresent" value="Delete all 'Present'"><br><br>
 		
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
   
  </tr>


<?php

			//Connecting to the database
			require("TeamDatabaseConnect.php");

			//Query to retrieve data from the database
			$query = "SELECT * FROM leaving_returning";

		
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
  				</tr>	
<?php

				}


			}

			else {
					echo "<br>";
			}
			?>

			</table>


<br><br><br>

<p class="searchresults">Search Results</p>


<?php


		//If statement that triggers query from the database - Retrieving details from the database
		if(isset($_POST['submit'])){

			//Assigns form input names to variables
			$ID = $_POST["id"];

			//Query to retrieve variables into the database
			$query1 = "SELECT * FROM leaving_returning WHERE id = '".$ID."'";

		
			//Execution of query
			$result1 = mysqli_query($conn, $query1);

			

			
			//Fetching infomation from the database in a tabular form
			if($result1->num_rows > 0){
				while($row = $result1->fetch_assoc()){
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
  				</tr>	
<?php

				}


			}

			else {
				?>
					<p class="colortext"><?php echo "0 results"; ?></p>;
					<?php

			}
			?>

			</table>



	<?php
		}	


		//If statement that triggers query from the database - Deleting details from the database
		if(isset($_POST['delete'])){
			$query2 = "DELETE FROM leaving_returning WHERE absent_present = 'Present'";

		
			//Execution of query
			$result2 = mysqli_query($conn, $query2);
		}


		//Closes connection to database
		 $conn->close();

?>




	</body>
</html>