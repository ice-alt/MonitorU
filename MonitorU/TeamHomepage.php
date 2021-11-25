<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>MonitorU</title>
	<link href="TeamStyle.css" rel="stylesheet" type="text/css">

</head>
	<body>

	<br><br>

	<!--Title written at the top of the page-->
	<p class="homepagetitle">MonitorU<p>

	<!--Sidebar navigation-->
	<div class="sidenav">
			<a class="sidenav1 current" href="TeamHomepage.php">Home</a></li>
			<a class="sidenav1" href="TeamCampusLog.php">Campus Log</a>
			<a class="sidenav1" href="UploadDocument.php">Upload Document</a>
			<a class="sidenav1" href="TeamReportIssue.php">Report Issue</a>
	</div>


	<!--Introduction paragraph-->
	<div class="main">
	<p>Welcome to MonitorU!</p>
	<p>The pandemic has brought about a lot of changes, adjustments and caution for all of us. To keep us safe and healthy, kindly provide us with information on how best we can keep track of your movements in order to contain the spread of the virus.</p>
	<p>Your safety is our #1 priority!</p>
	<br><br>

	<!--Radio buttons-->
	<div class="radiobuttons">
			<p style="font-style: italic">Please choose one of the options: </p>
				<form action="" method="post" >
	  				<input type="radio" name="choose" value="Leave" ><label class="radiobtn">I am leaving campus</label>
      			<br><br>
      			<input type="radio" name="choose" value="Return"><label class="radiobtn">I returned to campus<label>
      			<br><br><br>
      			<input type="submit" name="submit" class="button2" value="Confirm">
				</form>

	</div>

<br><br><br>


	<!--Chatbot-->
	<div data-cdc-widget='healthBot' data-cdc-theme='theme1' class='cdc-widget-color-white'  data-cdc-language='en-us'></div>
	<script src='https://t.cdc.gov/1M1B'></script>


	</div>


<?php


	//Connecting to the database
   require("TeamDatabaseConnect.php");

   
   if(isset($_POST["submit"])){

   ////Assigns form input names to variables
   $choose = $_POST["choose"];

   //If statement that decides what page to redirect to
   if($choose == "Leave"){

   	//Redirects to 'leaving' campus form page
      header("location: TeamLeaveCampusForm.php");
   }



   else{
      
   	//Redirects to 'return to campus' page
      header("location: TeamReturnToCampus.php");

   }

 }




//Closes connection to database
$conn->close();




?>









	</body>
</html>


