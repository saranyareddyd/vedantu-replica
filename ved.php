<?php
     
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "ved";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $mobile_number = $_POST['mobile_number'];
  $state = $_POST['state'];


  // To prevent SQL injection
  $username = stripslashes($username);
  $mobile_number = stripslashes($mobile_number);
  $class = stripslashes($state);

  $username = mysqli_real_escape_string($con, $username);
  $mobile_number = mysqli_real_escape_string($con, $mobile_number);
  $class = mysqli_real_escape_string($con, $state);


  $sql = "INSERT INTO vedantu (username,mobile_number,state) VALUES ('$username', '$mobile_number','$state')";
  if (mysqli_query($con, $sql)) {
    echo "<h1><center>Successfully Booked a Demo</center></h1>";
    header('location:fdemo.html');
    exit;
  } else {
    echo "<h1><center>Error: " . mysqli_error($con) . "</center></h1>";
  }
}

mysqli_close($con);
?>