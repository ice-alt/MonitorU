<?php

//Connects another php file called upload.php
require("upload.php");

?>


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
		<h3 class="uploadocumenttitle">Upload Document</h3><br><br>


		<!--Sidebar navigation-->
		<div class="sidenav">
			<a class="sidenav1" href="TeamHomepage.php">Home</a></li>
			<a class="sidenav1" href="TeamCampusLog.php">Campus Log</a>
			<a class="sidenav1" href="UploadDocument.php">Upload Document</a>
			<a class="sidenav1" href="TeamReportIssue.php">Report Issue</a>
	</div>


		<!--Here the user inputs email and chooses document to upload-->
		<form action="" method="post" enctype="multipart/form-data">
			<label class="uploadocumentcontent">Email: </label> <input type="text" name="email" placeholder="Email"><br><br>
			<label class="uploadocumentcontent">Select File to Upload: </label> <input type="file" name="file" class="filechosen"><br><br><br>
			<input type="submit" name="upload" class="uploadbtn" value="Upload">	
		</form>

		<br>



		<!-- Prints out messages stated in the upload.php file -->
		<?php if(!empty($statusMsg)){?>
			<p class="colortext"><?php echo "   ".$statusMsg; ?></p>
		<?php } ?>


	

<?php 
		

		//Query to display file names that have been uploaded
		$query = $conn->query("SELECT * FROM documents");

		if($query->num_rows > 0){
			while($row = $query->fetch_assoc()){
				$imageURL = 'uploads/'.$row["file_name"];

				?>

				<img src="<?php echo $imageURL; ?>" alt=""/>
				

				<?php
			}
		}
		else{
			?>
			<p>No documents found...</p>
			<?php
		}
		?>

		<?php
		

?>


	</body>
</html>