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
    <title>Document</title>
</head>
<body>
    <?php
        
    $currentQuestion = $_GET['id']; 
    $result = mysqli_query($con , "SELECT * FROM que WHERE subject='" .$_SESSION['subject']. "' AND questionNo = '" .$_GET['id']. "'");
    $question = mysqli_fetch_array($result);
    
    
    
    if (isset($_REQUEST["option"])){
        $currentQuestion = $currentQuestion - 1;
        $optionEnteredByStudent = $_REQUEST["option"];
        

        $checkifstudentAttempted = "SELECT * FROM `enteredanswerbystudent`
                                    WHERE
                                    email = '$_SESSION[email]' AND
                                    subject = '$_SESSION[subject]' AND 
                                    questionNo = '$currentQuestion'";
                
        $result = mysqli_query($con, $checkifstudentAttempted);

        if(mysqli_num_rows($result)!=0){
            $queryPushOptionByStudent = "UPDATE `enteredanswerbystudent` SET
                                        enteredOption =  $optionEnteredByStudent
                                        WHERE
                                        email = '$_SESSION[email]' AND
                                        subject = '$_SESSION[subject]' AND 
                                        questionNo = '$currentQuestion'";
        
        }
        else{
            $queryPushOptionByStudent = "INSERT into `enteredanswerbystudent` 
                                        ( email , subject , questionNo , enteredOption) VALUES 
                                        ('$_SESSION[email]' , '$_SESSION[subject]' , '$currentQuestion' , '$optionEnteredByStudent')";
        

        }
        

        $result = mysqli_query($con, $queryPushOptionByStudent);
        $currentQuestion = $currentQuestion + 1;
    }
    
    
    ?>
                
                
               
                
                
                
                <?php
                if($currentQuestion <= $_SESSION['numberOfQuestions']){
                    echo "Question .";
                    echo $currentQuestion;
                    echo ")     ";
                    echo $question['question'];
                
                    $query = mysqli_query($con , "SELECT * FROM opt WHERE subject='". $_SESSION['subject']. "' AND questionNo='".$_GET['id']."'");
                    $row2 = mysqli_fetch_array($query);
                    
                    echo"</br>"; 
                ?>
                <form action = 'test.php?id=<?php echo ++$currentQuestion ;?>' method = "POST">

                <input type="radio" name="option" id="1" value="1" />
                <label for="1"><?php echo $row2['option'] ; $row2 = mysqli_fetch_array($query); ?></label><br>

                <input type="radio" name="option" id="2" value="2" />
                <label for="2"><?php echo $row2['option'] ; $row2 = mysqli_fetch_array($query); ?></label><br>

                <input type="radio" name="option" id="1" value="3" />
                <label for="3"><?php echo $row2['option'] ; $row2 = mysqli_fetch_array($query); ?></label><br>

                <input type="radio" name="option" id="4" value="4" />
                <label for="4"><?php echo $row2['option'] ; $row2 = mysqli_fetch_array($query); ?></label><br>
                
                <input type="submit" value="NEXT">
                </form>

                <?php 
                } 
                else {
                ?>
                <form action = 'result.php' method = "POST">
                <input type="submit" value="SUBMIT PAPER">
                </form>

                <?php 
                } 
                ?>
                
                

                
                
                
                        
                        
               
                 
</body>
</html>