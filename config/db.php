<?php
  $host='localhost';
  $user="root";
  $pass="";
  $db="lost_and_found";
  $conn=mysqli_connect($host,$user,$pass,$db);

  if (!$conn){
    echo"Database connection failed:".mysqli_connect_error();
  }
// seperated database connection into a config file  for reusability
?>