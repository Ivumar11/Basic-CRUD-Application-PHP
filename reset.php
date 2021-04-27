<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Reset</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('database.php');
    
    // When form submitted, check and create user session.
    if (isset($_POST['user_name'])) {
        $user_name = trim(stripslashes($_REQUEST['user_name']));    // removes backslashes
        $user_name = $conn->real_escape_string($user_name);
        $new_password = trim(stripslashes($_REQUEST['new_password']));
        $new_password = $conn->real_escape_string($new_password);
        $confirm_password = trim(stripslashes($_REQUEST['confirm_password']));
        $confirm_password = $conn->real_escape_string($confirm_password);

        // Check user is exist in the database
        $sql    = "SELECT * FROM users WHERE user_name ='$user_name'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            if ($new_password == $confirm_password) {
                $sql = "UPDATE users SET pass_word= '".md5($new_password)."' WHERE user_name='$user_name'";
                if ($conn->query($sql) === TRUE) {
                    echo "<div class='form'>
                          <h3>Password reset successful.</h3><br/>
                          <p class='link'>Click <a href='login.php'>here</a> to Login.</p>
                          </div>";
                } else {
                    echo "<div class='form'>
                        <h3>Ooops.. There was an error while updating password.</h3><br/>
                        <p class='link'>Click <a href='reset.php'>here</a> to try again.</p>
                        </div>";
                }
            } else {
                echo "<div class='form'>
                        <h3>The new password and its confirmation don't match</h3><br/>
                        <p class='link'>Click <a href='reset.php'>here</a> to try again.</p>
                        </div>";
            }
        } else {
            echo "<div class='form'>
                  <h3>I'm sorry. The user name you provided is not a registered user</h3><br/>
                  <p class='link'>Click <a href='rest.php'>here</a> to try again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post">
        <h1 class="form-title">Reset</h1>
        <input type="text" class="input" name="user_name" placeholder="Username" Required/>
        <input type="password" class="input" name="new_password" placeholder="New Password" Required/>
        <input type="password" class="input" name="confirm_password" placeholder="Confirm Password" Required/>
        <input type="submit" value="Reset" name="submit" class="button"/>
        <p class="link">Don't have an account? <a href="index.php">Register here</a></p>
  </form>
<?php
    }
?>
</body>
</html>