
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

//SQL query for selecting all data from the database.
$result = mysqli_query($con , "SELECT * FROM que WHERE subject='" .$_GET['id']. "'");
//Displaying table header on the browser.


//Displaying table rows on the browser.

while($row1 = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" .$row1['questionNo'] . "</a></td>";
  echo ". ";
  echo "<td>" . $row1['question'] . "</td>";
  $query = mysqli_query($con , "SELECT * FROM opt WHERE subject='". $_GET['id']. "' AND questionNo='".$row1['questionNo'] ."'");
  while($row2 = mysqli_fetch_array($query))
  {
    echo "\n <br>";
    echo  $row2['optionNo'] ;
    echo ". ";
    echo $row2['option'];
    
  echo "</tr>";
}
}
echo "</table>";


?>
   
</body>
