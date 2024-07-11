<?php
    session_start();
    $name1="";
    $mbno="";
    $errors=array();
    $db = mysqli_connect('localhost','root','vedantu');
    if (isset($_POST['reg_user'])) {
        $name1 = mysqli_real_escape_string($db, $_POST['name1']);
        $mbno = mysqli_real_escape_string($db, $_POST['mbno']);
        $class = mysqli_real_escape_string($db, $_POST['class']);
        if (empty($name1)) { array_push($errors, "Username is required"); }
        if (empty($mbno)) { array_push($errors, "Mobile Number is required"); }
        if (empty($class)) { array_push($errors, "Please select class"); }

        $user_check_query = "SELECT * FROM veddata WHERE name1='$name1' OR mbno='$mbno' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
            if ($user['name1'] === $name1) {
              array_push($errors, "Username already exists");
            }
        
            if ($user['mbno'] === $mbno) {
              array_push($errors, "email already exists");
            }
        }
        // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    
    $query = "INSERT INTO veddata (name1, mbno, class) 
              VALUES('$name1', '$mbno', '$class')";
    mysqli_query($db, $query);
    $_SESSION['name1'] = $name1;
    $_SESSION['success'] = "You are now logged in";
    header('location: vedantu1.php');
}
    }

    ?>

