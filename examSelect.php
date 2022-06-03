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
    <title>Select Your Exam</title>
</head>
<body>
<?php
include 'db_connection.php';
//SQL query for selecting all data from the database.
$result = mysqli_query($con,"SELECT * FROM sub");
//Displaying table header on the browser.

echo "<table border='1'>
<tr>
<th>SR NO.</th>
<th>Subject</th>
</tr>";
//Displaying table rows on the browser.

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" .$row['srno'] . "</a></td>";
  echo "<td> <a href='quiz.php?id=". $row['subject'] ."'>" .$row['subject'] . "</a></td>";
  echo "</tr>";
}

echo "</table>";
//Closing Database Connection.
//mysqli_close($con);
?>
   
</body>
</html>