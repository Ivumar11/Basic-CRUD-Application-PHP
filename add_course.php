<?php 
include("auth_session.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>New Course</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
require("database.php");
if (isset($_POST['add'])) {
    $course_code = trim(stripslashes($_POST['course_code']));
    $course_code = $conn->real_escape_string($course_code);
    $course_title = trim(stripslashes($_POST['course_title']));
    $course_title = $conn->real_escape_string($course_title);
    $id = $_SESSION['id'];

    $sql = "INSERT into courses (course_code, course_title, id)
    VALUES ('$course_code', '$course_title', '$id')";

    if ($conn->query($sql) === TRUE) {
        header("Location: courses.php");
    } else {
        echo "<div class='form'>
        <h3>Something went wrong.</h3><br/>
        <p class='link'><a href='add_course.php'>Try again</a> or <a href='dashboard.php'>Go back to dashboard</a>.</p>
        </div>";
    }

} else {
    ?>

<form class="form" method="post">
        <h1 class="form-title">Login</h1>
        <input type="text" class="input" name="course_code" placeholder="Course code" Required/>
        <input type="text" class="input" name="course_title" placeholder="Course title" Required/>
        <input type="submit" value="Add course" name="add" class="button"/>
        <p class="link"><a href="dashboard.php">Click here to go back</a></p>
  </form>
<?php
} ?>
</body>
</html>