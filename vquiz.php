<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ved";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create the questions table
$sql = "CREATE TABLE questions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255) NOT NULL,
    choice1 VARCHAR(255) NOT NULL,
    choice2 VARCHAR(255) NOT NULL,
    choice3 VARCHAR(255) NOT NULL,
    choice4 VARCHAR(255) NOT NULL,
    correctAnswer INT(1) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Insert sample questions into the table
$sql = "INSERT INTO questions (question, choice1, choice2, choice3, choice4, correctAnswer)
        VALUES (('Who first proposed the atomic theory of matter?', 'John Dalton', 'Berlin', 'Chadwick', 'sagar', 0),
        ('Which reaction is mainly responsible for the cause of energy radiation from the sun?', 'combination Reaction', 'Fusion Reaction', 'Double Reaction', 'none', 1),
               ('What is the largest planet in our solar system?', 'Jupiter', 'Saturn', 'Neptune', 'Mars', 0),
               ('The book titled â€œ1283â€ illustrates the career of which Football legend?', 'Pele', 'Sagar', 'Messi', 'Ronaldo', 0),

               ('The Ramon Magsaysay Award is given in memory of the former president of which country?', 'India', 'canada', 'Philippines', 'US', 2))";
               
if (mysqli_query($conn, $sql)) {
    echo "Questions inserted successfully";
} else {
    echo "Error inserting questions: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
