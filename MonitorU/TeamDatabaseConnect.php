<?php


     
     //servername, username, password, database names 
     define("servername", "localhost");
     define("username", "root");
     define("password", "");
     define("database", "monitoru");



     //Connection initiated
    $conn = new mysqli(servername, username, password, database);




    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);

  
   }
   else{
    echo "<br>";

}
    
?>
