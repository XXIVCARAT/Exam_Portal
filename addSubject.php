<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db_connection.php');
    // session_start();
    $result = mysqli_query($con , "SELECT * FROM sub");
    // When form submitted, check and create user session.
   
    if (isset($_POST['subject'])) {
        $subject = stripslashes($_REQUEST['subject']);    // removes backslashes
        $subject = mysqli_real_escape_string($con, $subject);
        $numberOfQuestions = stripslashes($_REQUEST['numberOfQuestions']);    // removes backslashes
        $numberOfQuestions = mysqli_real_escape_string($con, $numberOfQuestions);
        
        // Check user is exist in the database
        $query    = "SELECT * FROM `sub` WHERE subject='$subject'";
        $result = mysqli_query($con, $query) or die(mysqli_error($conn));
        $rows = mysqli_num_rows($result);
        if ($rows == 0) {
            $_SESSION['subject'] = $subject;
            $_SESSION['numberOfQuestions'] = $numberOfQuestions;
            echo "<h1 class=login-title>CONFIRMATION</h1>
                    <div class='form'>
                  <h3></h3><br/>
                  <p class='link'><a href='pushSubject.php'>Click here to Confirm Subject: $subject</a></p>
                  <p class='link'><a href='addSubject.php'>Click here to go back</a></p>
                  </div>";
            // Redirect to user dashboard page
            
        } else {
            echo "<div class='form'>
                  <h3>Subject Already Exists</h3><br/>
                  <p class='link'><a href='addSubject.php'>Click here to add subject</a></p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">ADD QUESTION PAPER</h1>
        <input type="text" class="login-input" name="subject" placeholder="Add Subject" required />
        <input type="number" class="login-input" name="numberOfQuestions" placeholder="Please Enter Number Of Questions" required />
        <input type="submit" value="Add Subject" name="submit" class="login-button"/>
        <p class="link"><a href="Edit.php">Edit Subjects</a></p>
        
  </form>
<?php
    }
?>
</body>
</html>