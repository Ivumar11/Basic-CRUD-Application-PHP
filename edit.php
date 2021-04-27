<?php
//include("header.php");
include("database.php");

$course_code = $row['course_code'];
$course_title = $row['course_title'];
$reg_id = $_GET['edit'];

if (isset($_GET['edit'])) {
    $reg_id = $_GET['edit'];
    $sql = "SELECT * FROM courses WHERE id='$reg_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1 ) {
        $row = $result->fetch_assoc();
        $course_code = $row['course_code'];
        $course_title = $row['course_title'];
    }
}
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <form class="form" method="post" action="dashboard.php">
                <h1 class="form-title">Login</h1>
                <input type="hidden" name="reg_id" value="<?php echo $reg_id; ?>">
                <input type="text" class="input" name="course_code" value="<?php echo $course_code; ?>" Required/>
                <input type="text" class="input" name="course_title" value="<?php echo $course_title; ?>" Required/>
                <input type="submit" value="Update" name="edit" class="button"/>
                <p class="link"><a href="dashboard.php">Click here to cancel</a></p>
        </form>
    </div>
    
</body>
</html>
