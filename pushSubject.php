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
    
    
  
    <?php
    require "db_connection.php";
  
    
    if(mysqli_num_rows(mysqli_query($con, "SELECT * FROM exam.sub WHERE subject = '" . $_SESSION["subject"] . "'"))==0)
    {
    $query = "INSERT into `sub` (subject) VALUES ('$_SESSION[subject]')";
    $result = mysqli_query($con, $query);
    }
    $questionNumber = $_GET["id"];
    if(isset($_POST['addQuestion']))
    {
        $question = stripslashes($_REQUEST["question"]);
        $option1 = stripslashes($_REQUEST["option1"]);
        $option2 = stripslashes($_REQUEST["option2"]);
        $option3 = stripslashes($_REQUEST["option3"]);
        $option4 = stripslashes($_REQUEST["option4"]);
        $answer = stripslashes($_REQUEST["answer"]);
        
        $queryPushQuestion = "INSERT into `que` (questionNo , question , subject) VALUES ('$questionNumber ', '$question' , '$_SESSION[subject]')";
        $queryPushOption1 = "INSERT into `opt` (optionNo , option , questionNo , subject ) VALUES (1, '$option1' ,'$questionNumber' ,'$_SESSION[subject]')";
        $queryPushOption2 = "INSERT into `opt` (optionNo , option , questionNo , subject ) VALUES (2, '$option2' ,'$questionNumber' ,'$_SESSION[subject]')";
        $queryPushOption3 = "INSERT into `opt` (optionNo , option , questionNo , subject ) VALUES (3, '$option3' ,'$questionNumber' ,'$_SESSION[subject]')";
        $queryPushOption4 = "INSERT into `opt` (optionNo , option , questionNo , subject ) VALUES (4, '$option4' ,'$questionNumber' ,'$_SESSION[subject]')";
        $queryPushAnswer = "INSERT into `ans` (answer , questionNo , subject) VALUES ('$answer', '$questionNumber' , '$_SESSION[subject]')";

        $questionQuery = mysqli_query($con , $queryPushQuestion);
        $option1Query = mysqli_query($con , $queryPushOption1);
        $option2Query = mysqli_query($con , $queryPushOption2);
        $option3Query = mysqli_query($con , $queryPushOption3);
        $option4Query = mysqli_query($con , $queryPushOption4);
        $answerQuery = mysqli_query($con , $queryPushAnswer);
        
    }
    if(isset($_POST['finish']))
    {

    }
    ?>
    <h1 class="login-title"><?php echo "$_SESSION[subject] Paper Set" ?></h1>
        <form action="pushSubject.php?id=<?php echo $_GET["id"]+1; ?>" form class="form2" action="" method="post">
        <input type="text" class="login-input" name="question" placeholder="Question" required />
        <input type="text" class="login-input" name="option1" placeholder="Option 1" required />
        <input type="text" class="login-input" name="option2" placeholder="Option 2" required />
        <input type="text" class="login-input" name="option3"placeholder="Option 3" required />
        <input type="text" class="login-input" name="option4" placeholder="Option 4" required />
        <input type="number" class="login-input" name="answer" placeholder="Answer (Enter Option Number)" required />
        <input type="submit" name="addQuestion" value="Add Question" class="login-button">
        
        
    </form>
    <form action="quiz.php?id=<?php echo $_SESSION['subject'] ?>" form class="form2" action="" method="post">
    <input type="submit" name="finish" value="FINISH" class="login-button">
    </form>
</body>
</html>