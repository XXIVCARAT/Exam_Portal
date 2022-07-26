<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
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
<?php
include 'db_connection.php';
//include 'examSelect.php';
//session_start();
//SQL query for selecting all data from the database.
$result = mysqli_query($con , "SELECT * FROM que WHERE subject='" .$_GET['id']. "'");
//Displaying table header on the browser.


//Displaying table rows on the browser.

while($row1 = mysqli_fetch_array($result)) {
  echo "<hr>";
  echo $row1['questionNo'];
  echo ". ";
  echo $row1['question'];
  echo "<br>";
  //echo "<hr>";
  $query = mysqli_query($con , "SELECT * FROM opt WHERE subject='". $_GET['id']. "' AND questionNo='".$row1['questionNo'] ."'");
  

  while($row2 = mysqli_fetch_array($query))
  {
    
  ?>
  <form action="/action_page.php">
  <input type="radio" id="html" name="fav_language" value="HTML">
  <label for="html"> <?php echo $row2['option'] ?></label><br>
  

  <?php
  }
  echo "</form>";
  echo "<hr>";
}
?>

<form class="form" action="" method="post">
<?php echo "<td> <a href='quiz.php?id=". $row1['questionNo'] ."'>" .$row1['subject'] . "</a></td>"; ?>
</form>


</body>
</html>

$query = mysqli_query($con , "SELECT * FROM opt WHERE subject='". $_SESSION['subject']. "' AND questionNo='".$_GET['id']."'");

<input type="submit" value="Submit">

<?php
                echo "<hr>";
                if($_SESSION['currentQuestion'] < $_SESSION['numberOfQuestions'])
                {
                ?>
                <?php $_SESSION['currentQuestion'] = $_SESSION['currentQuestion']+1; 
                //$_SESSION['correct'] = $_GET['option'];
                ?>
                <input type="submit" value="NEXT">
                <?php 
                }
                else
                {
                ?>
                <form action="result.php" form class="form2" action="" method="post">
                <input type="submit" name="finish" value="FINISH" class="login-button">
                </form>
                <?php
                }
                ?>
                </form>