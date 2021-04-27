<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('database.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['user_name'])) {
        // removes backslashes
        $first_name = trim(stripslashes($_REQUEST['first_name']));
        //escapes special characters in a string
        $first_name = $conn->real_escape_string($first_name);
        $last_name = trim(stripslashes($_REQUEST['last_name']));
        $last_name = $conn->real_escape_string($last_name);
        $user_name = trim(stripslashes($_REQUEST['user_name']));
        $user_name = $conn->real_escape_string($user_name);
        $pass_word = trim(stripslashes($_REQUEST['pass_word']));
        $pass_word = $conn->real_escape_string($pass_word);
        $sql    = "INSERT into users (first_name, last_name, user_name, pass_word)
                     VALUES ('$first_name', '$last_name', '$user_name', '".md5($pass_word)."')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<div class='form'>
            <h3>You are registered successfully.</h3><br/>
            <p class='link'>Click <a href='login.php'>here to Login</a></p>
            </div>";
          } else {
            echo "<div class='form'>
            <h3>Required fields are missing.</h3><br/>
            <p class='link'>Click here to <a href='index.php'>register</a> again.</p>
            </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="form-title">Registration</h1>
        <input type="text" class="input" name="first_name" placeholder="First Name" required />
        <input type="text" class="input" name="last_name" placeholder="Last Name" required />
        <input type="text" class="input" name="user_name" placeholder="Username" required />
        <input type="password" class="input" name="pass_word" placeholder="Password" required>
        <input type="submit" name="submit" value="Register" class="button">
        <p class="link">Already have an account? <a href="login.php">Click here to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>