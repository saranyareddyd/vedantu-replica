<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "ved";

// Create a connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement
    $sql = "INSERT INTO signin (username , password) VALUES ('$username', '$password')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "<h1>Sign In successful</h1>";
        header("location:vedantu.html");
        exit;
    
    } else {
        echo "Error in Sign In " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

