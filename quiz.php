<?php
$conn = mysqli_connect("localhost", "root", "", "quiz");
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['quizId'])) {
$quizId = $_GET['quizId'];
$sql = "SELECT * FROM Quizzes WHERE id = $quizId";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
$quiz = mysqli_fetch_assoc($result);
echo "<h2>".$quiz['title']."</h2>";
echo "<p>".$quiz['description']."</p>";
$sql = "SELECT * FROM Questions WHERE quiz_id = $quizId";
$result = mysqli_query($conn, $sql);
echo "<form method='POST' action='validate_quiz.php'>";
while ($question = mysqli_fetch_assoc($result)) {
echo "<h3>".$question['question']."</h3>";
$choicesSql = "SELECT * FROM Choices WHERE question_id = ".$question['id'];
$choicesResult = mysqli_query($conn, $choicesSql);
while ($choice = mysqli_fetch_assoc($choicesResult)) {
echo "<input type='radio' name='choice".$question['id']."' 
value='".$choice['id']."' required>".$choice['choice']."<br>";
}
}
echo "<input type='hidden' name='quizId' value='".$quizId."'>";
echo "<input type='submit' value='Submit Quiz'>";
echo "</form>";
} else {
echo "Quiz not found.";
}
} else {
echo "Invalid quiz ID.";
}
mysqli_close($conn);
?>