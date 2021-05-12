<?php
//include("header.php");
include("database.php");
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
$course_code = "";
$course_title = "";
$reg_id = 0;

if (isset($_GET['edit'])) {
    $reg_id = (int) $_GET['edit'];
    $sql = "SELECT * FROM courses WHERE reg_id='$reg_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1 ) {
        $row = $result->fetch_assoc();
        $course_code = $row['course_code'];
        $course_title = $row['course_title'];
    }?>

<body>
        <form class="form" method="post" action="courses.php">
                <h1 class="form-title">Edit Course</h1>
                <input type="hidden" name="reg_id" value="<?php echo $reg_id; ?>">
                <input type="text" class="input" name="course_code" value="<?php echo $course_code; ?>"/>
                <input type="text" class="input" name="course_title" value="<?php echo $course_title; ?>"/>
                <input type="submit" value="Update" name="edit" class="button"/>
                <p class="link"><a href="courses.php">Click here to cancel</a></p>
        </form>
    </div>
    
</body>
</html>
<?php
}
?>
