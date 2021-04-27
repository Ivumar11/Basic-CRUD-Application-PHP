<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('database.php');
    
    // When form submitted, check and create user session.
    if (isset($_POST['user_name'])) {
        $user_name = trim(stripslashes($_REQUEST['user_name']));    // removes backslashes
        $user_name = $conn->real_escape_string($user_name);
        $pass_word = trim(stripslashes($_REQUEST['pass_word']));
        $pass_word = $conn->real_escape_string($pass_word);
        // Check user is exist in the database
        $sql    = "SELECT * FROM users WHERE user_name ='$user_name'
                     AND pass_word='".md5($pass_word)."'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $_SESSION['user_name'] = $user_name;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click <a href='login.php'>here to Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post">
        <h1 class="title">Login</h1>
        <input type="text" class="input" name="user_name" placeholder="Username" Required/>
        <input type="password" class="input" name="pass_word" placeholder="Password" Required/>
        <input type="submit" value="Login" name="submit" class="button"/>
        <p class="link">Don't have an account? <a href="index.php">Register here</a></p>
        <p class="link">Forgot password? <a href="reset.php">Reset here</a></p>
  </form>
<?php
    }
?>
</body>
</html>