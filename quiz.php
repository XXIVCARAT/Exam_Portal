<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include 'db_connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Title>QUIZ</title>
</head>
<body>
<h1 class="login-title">Welcome to <?php echo  $_GET['id']; ?> Quiz </h1>

<?php

$result = mysqli_query($con , "SELECT * FROM que WHERE subject='" .$_GET['id']. "'");
$numberOfQuestions = mysqli_num_rows($result);
$_SESSION['numberOfQuestions'] = $numberOfQuestions;
$_SESSION['subject'] = $_GET['id'];
$currentQuestion = 1;
?>

<a href='test.php?id=<?php echo $currentQuestion ; ?>'>START</a>
<?php


?>
</body>
</html>