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
    
    ?>
    <h1 class="login-title"><?php echo "$_SESSION[subject] Paper Set" ?></h1>
    <?php
    $i=0;
    if(isset($_POST['submit']))
    {
    $i=0;
    $question = array($_SESSION['numberOfQuestions']);
    $option1 = array($_SESSION['numberOfQuestions']);
    $option2 = array($_SESSION['numberOfQuestions']);
    $option3 = array($_SESSION['numberOfQuestions']);
    $option4 = array($_SESSION['numberOfQuestions']);
    $answer = array($_SESSION['numberOfQuestions']);
    while($i<$_SESSION['numberOfQuestions'])
    {
        $question[$i] = stripslashes($_REQUEST["$i[question]"]);
        $question[$i] = mysqli_real_escape_string($con, $question[$i]);
        $option1[$i] = stripslashes($_REQUEST["$i[option1]"]);
        $option1[$i] = mysqli_real_escape_string($con,$option1[$i] );
        $option2[$i] = stripslashes($_REQUEST["$i[option2]"]);
        $option2[$i] = mysqli_real_escape_string($con,$option2[$i] );
        $option3[$i] = stripslashes($_REQUEST["$i[option3]"]);
        $option3[$i] = mysqli_real_escape_string($con,$option3[$i] );
        $option4[$i] = stripslashes($_REQUEST["$i[option4]"]);
        $option4[$i] = mysqli_real_escape_string($con,$option4[$i] );
        $answer[$i] = stripslashes($_REQUEST["$i[answer]"]);
        $answer[$i] = mysqli_real_escape_string($con,$answer[$i] );
        

        $i++;
    }
    
}     
    ?>
    <?php
    
    $i = 0;
    while($i<$_SESSION['numberOfQuestions'])
    {
        ?>
    
        
        <input type="text" class="login-input" name="item[i][question]" placeholder="Question <?php echo $i+1;?>" required />
        <input type="text" class="login-input" name="item[i][option1]" placeholder="Option 1" required />
        <input type="text" class="login-input" name="item[i][option2]" placeholder="Option 2" required />
        <input type="text" class="login-input" name="item[i][option3]" placeholder="Option 3" required />
        <input type="text" class="login-input" name="item[i][option4]" placeholder="Option 4" required />
        <input type="number" class="login-input" name="item[i][answer]" placeholder="Answer (Enter Option Number)" required />
        <hr>
   <?php $i++; } ?>
   
        
        <input type="submit" name="submit" value="Submit Question Paper" class="login-button">
        
</body>
</html>