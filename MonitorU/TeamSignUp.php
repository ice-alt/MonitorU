<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>MonitorU</title>
    <link href="TeamStyle.css" rel="stylesheet" type="text/css">
</head>
    <body>


<script>

    //Function that checks if passwords match (between the 'Password' field and the 'Confirm Password' field)
    function PasswordMatch(){
        var firstpass=document.f1.pwd.value;
        var secondpass=document.f1.pwd2.value;

        if(firstpass===secondpass){
            return true;
        }
        else{
            alert("Passwords must be the same!");
            return false;
        }

    }
</script>

    
    <!--Titles written at the top of the page-->
    <h3 class="loginpagetitle">MonitorU<h3>
    <p class="signuptitle">Sign Up<p><br>


    <!--Form to accept sign up details from user-->
	<form action="" method="post" name="f1" onsubmit="return PasswordMatch()">
      <label class="usersignuptext">ID: </label><input type="text" name="id" size="47" placeholder="ID" required/><br><br>
      <label class="usersignuptext">First name: </label><input type="text" name="fname" size="36" placeholder="First Name" required/><br><br>
      <label class="usersignuptext">Last name: </label><input type="text" name="lname" size="36" placeholder="Last Name" required/><br><br>
      <label class="usersignuptext">Phone number: </label><input type="tel" name="phonenumber" size="30" placeholder="Phone Number" required/><br><br>
      <label class="usersignuptext">Email: </label><input type="email" name="email" size="43" placeholder="Email" required/><br><br>
      <label class="usersignuptext">Password:   </label><input type="password" name="pwd" size="37" pattern="(?=. *d)(?=. *[a-z])(?=. *[A-Z])(?=.*?[#?!@$%^&*-\=+]\[]).{8,}" title="Must contain at least number, once uppercase letter, one lowercase letter, and at least 8 or more characters" placeholder="Password" required><br><br>
      <label class="usersignuptext">Confirm Password:   </label><input type="password" name="pwd2" size="25" pattern="(?=. *d)(?=. *[a-z])(?=. *[A-Z])(?=.*?[#?!@$%^&*-\=+]\[]).{8,}" title="Must contain at least number, once uppercase letter, one lowercase letter, and at least 8 or more characters" placeholder="Confirm Password" required><br><br><br>
      <input type="submit" name="submit" class="button" value="Sign Up">
      
    </form>


      <?php

            //Connecting to the database
      		require("TeamDatabaseConnect.php");


            //If statement that triggers query from the database - Allows users details to be inserted
      		 if(isset($_POST["submit"])){

                //Assigns form input names to variables
      		 	 $ID = $_POST['id'];
     			 $Fname = $_POST['fname'];
      			 $Lname = $_POST['lname'];
      			 $Phone = $_POST['phonenumber'];
      			 $Email = $_POST['email'];
      			 $Password = md5($_POST['pwd']);


                 //Query to insert variables into the database
      			 $query = "INSERT INTO `users`(`id`, `fname`, `lname`, `phonenumber`, `email`, `password`) VALUES ('$ID','$Fname','$Lname','$Phone','$Email','$Password')";

                 //Execution of query
      			 mysqli_query($conn, $query);

                 //Redirects to another page
      			 header("location: TeamHomepage.php");


      		 }

    //Closes connection to database
	$conn->close();


      ?>

    </body>
</html>