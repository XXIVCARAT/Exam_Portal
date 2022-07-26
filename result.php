<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
include 'db_connection.php';
?>

<?php 
$totalMarks = 0;
$totalRightAns = 0;
$totalWrongAns = 0;
$totalRightMarks = 0;
$totalWrongMarks = 0;
$currentQuestion = 1;
while($currentQuestion <= $_SESSION['numberOfQuestions']){
    $queryRightAnswer = "SELECT answer FROM ans WHERE questionNo = '".$currentQuestion."' AND subject='" .$_SESSION['subject']. "'";
                    
    
    $queryCheck = "SELECT enteredOption 
                    FROM enteredanswerbystudent 
                    WHERE 
                    email = '".$_SESSION['email']."' AND 
                    subject ='" .$_SESSION['subject']. "' AND
                    questionNo ='" .$currentQuestion. "'";

    $resultRightAnswer = mysqli_query($con , $queryRightAnswer);
    $resultCheck = mysqli_query($con ,$queryCheck);
    
    $rowRightAnswer = mysqli_fetch_row($resultRightAnswer);
    $rowCheck = mysqli_fetch_row($resultCheck);
    
    echo "Question ";
    echo $currentQuestion;
    echo "\t";
    echo "Correct Option : ";
    echo $rowRightAnswer[0];
    echo "\t";
    echo "Entered Option : ";
    echo $rowCheck[0];
    echo "\t";

    if($rowRightAnswer[0] == $rowCheck[0])
    {       
        echo "      CORRECT";
        echo"</br>";
        $totalRightAns++;
    }
    else{
        echo "      WRONG";
        echo"</br>";
        $totalWrongAns++;
    }

    $totalMarks = $_SESSION['numberOfQuestions'] - $totalWrongAns;

    

    $currentQuestion++;
}

echo "TOTAL RIGHT ANS = ";
echo $totalRightAns;
echo"</br>";
echo "TOTAL WRONG ANS = ";
echo $totalWrongAns;
echo"</br>";
echo "TOTAL MARKS = ";
echo $totalMarks;
echo "\t";
echo "Out of";
echo "\t";
echo $_SESSION['numberOfQuestions'];
echo"</br>";
?>