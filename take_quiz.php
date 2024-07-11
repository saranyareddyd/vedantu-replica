<!DOCTYPE html>
<html>
<head>
<title>Take Quiz</title>
</head>
<body>
<h1>Select Quiz</h1>
<form action="quiz.php" method="GET">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, title FROM Quizzes";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo '<input type="radio" name="quizId" value="' . $row['id'] . 
'"> ' . $row['title'] . '<br>';
}
} else {
echo "No quizzes available";
}
$conn->close();
?>
<br>
<input type="submit" value="Start Quiz">
</form>
</body>
</html>