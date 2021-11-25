<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>MonitorU</title>
	<link href="TeamStyle.css" rel="stylesheet" type="text/css">
</head>
	<body>


	 	<!--Title written at the top of the page-->
		<h3 class="loginpagetitle">MonitorU<h3>

	 	<!--Webiste logo-->
		<img src="MULogo.png" alt="Logo" class="logo">

		<br><br>

		 <!--Form to accpet the login details of users-->
		<form action="" method="post" >
			<label class="userlogintextID" >ID: </label><input type="text" name="id" size="30" placeholder="ID" required/><br><br><br>
			<label class="userlogintextPassword" >Password: </label><input type="password" name="pwd" size="30" placeholder="Password" required/><br><br><br>
			<input type="submit" name="submit" class="button" value="Log in"><br>
			
			 <!--Link to signup page-->
			<a href="http://localhost/TeamSignUp.php"><p class="signuplink">Sign up</p></a>

		</form>


		<?php

			//Connecting to the database
			require("TeamDatabaseConnect.php");

			//If statement that triggers query from the database - Compares login details to the ones in the database
			if(isset($_POST["submit"])){

				//Assigns form input names to variables
				$id = $_POST['id'];
   				$password = md5($_POST['pwd']);


   				//Query to retrieve values from the database
   				$query = "SELECT COUNT(*)  AS total  FROM users WHERE id = '".$id."' and password = '".$password."'";


   				//Execution of query
   				$result = mysqli_query($conn, $query);

   				$rw = mysqli_fetch_array($result);


   			//if statement to check if user details are in the database
   			if($rw['total'] > 0){

   			//Displays message from the browser if details are in the database
   			echo "<script>alert('username and password are correct')</script>";

   			//Redirects page
   			header("location: TeamHomepage.php");

   		}

   		else{
   			//Displays message from the browser if the details are not in the databse
   			echo "<script>alert('username and password are incorrect')</script>";
   		}



			}

	//Closes connection to database
	$conn->close();

			?>



	</body>
</html>