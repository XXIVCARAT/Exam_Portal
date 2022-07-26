<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['email']; ?>!</p>
        <p>You are now on Exam Page</p>
        <p><a href="examSelect.php">Select Exam</a></p>
        <p><a href="dashboard.php">Home</a></p>
        <?php $_SESSION['enteredOptionByStudent'] = 0; ?>
    </div>
</body>
</html>