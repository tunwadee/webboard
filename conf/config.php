<?php
$host = "localhost";
$user_db = "root";
$pass = "12345678";
$con = mysqli_connect($host, $user_db, $pass);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// ...some PHP code for database "my_db"...
mysqli_select_db($con,"webboard");
mysqli_query($con,"SET NAMES UTF8");
mysqli_query($con,"SET collection_connection='utf8'");
mysqli_query($con,"SET character_set_results=utf8");
mysqli_query($con,"SET character_set_client=utf8");
mysqli_query($con,"SET character_set_connection=utf8");
?>
