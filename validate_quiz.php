<?php
$conn = mysqli_connect("localhost", "root", "", "quiz");
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
$quizId = $_POST['quizId'];
$sql = "SELECT q.id, c.id AS choice_id, c.is_correct FROM Questions q JOIN
Choices c ON q.id = c.question_id WHERE q.quiz_id = $quizId";
$result = mysqli_query($conn, $sql);
$score = 0;
while ($row = mysqli_fetch_assoc($result)) {
$questionId = $row['id'];
$userChoice = $_POST['choice'.$questionId];
$isCorrect = $row['is_correct'];
$sql = "INSERT INTO User_Responses (user_id, question_id, choice_id) VALUES (1, 
$questionId, $userChoice)";
mysqli_query($conn, $sql);
if ($isCorrect && $userChoice == $row['choice_id']) {
$score++;
}
}
$sql = "SELECT COUNT(*) AS total_questions FROM Questions WHERE quiz_id =
$quizId";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totalQuestions = $row['total_questions'];
echo "<h2>Your score: " . $score . " out of " . $totalQuestions . "</h2>";
echo "<h3>Review:</h3>";
$sql = "SELECT q.question, c.choice, c.is_correct FROM Questions q JOIN Choices c 
ON q.id = c.question_id WHERE q.quiz_id = $quizId";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
$question = $row['question'];
$choice = $row['choice'];
$isCorrect = $row['is_correct'];
if ($isCorrect) {
echo "<p>".$question."<br>correct answer: ".$choice."</p>";
} else {
echo "<p>".$question."<br>wrong answer: ".$choice."</p>";
}
}
mysqli_close($conn);
?>