<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<style>

table ,th, td

{

border:1px solid black;

}

</style>    

  <title>Particular Student Information</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/LHdb/css/loginstyle.css">
 </head>

<body>
<div id="background"></div>

<a href="/LHdb/logout.php"><button type="button" class="cancelbtn">Log Out</button></a>

<?php

$servername = "localhost";
$user = "root";
$pass = "password";
$dbname="LHdb";

$conn = new mysqli($servername,$user,$pass,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id=$_SESSION['securitypst'];


$sql = "SELECT roll_no,place,in_time,out_time FROM st_status where '$id'=roll_no";
$result = $conn->query($sql);

$sql1 = "SELECT name,room_no,block_no,phone_no,home_addr,parent_no FROM student where '$id'=roll_no";
$result1 = $conn->query($sql1);


echo "<table bgcolor=#ffff00; align=center>

<tr>

<th>Roll No</th>
<th>Name</th>
<th>Phone No</th>
<th>Room No</th>
<th>Block No</th>
<th>Parent Phone No</th>
<th>Home Address</th>
<th>Place</th>
<th>In Time</th>
<th>Out Time</th>

</tr>";
while(TRUE) 
{
  $row = $result->fetch_assoc() ;
$row1=$result1->fetch_assoc();
if(!$row&&!$row1)
{
break;
}
 echo "<tr>";

 echo "<td>" . $row['roll_no'] . "</td>";
echo "<td>" . $row1['name'] . "</td>";
echo "<td>" . $row1['phone_no'] . "</td>";
echo "<td>" . $row1['room_no'] . "</td>";
echo "<td>" . $row1['block_no'] . "</td>";
echo "<td>" . $row1['parent_no'] . "</td>";
  echo "<td>" . $row1['home_addr'] . "</td>";

  echo "<td>" . $row['place'] . "</td>";
  echo "<td>" . $row['in_time'] . "</td>";

  echo "<td>" . $row['out_time'] . "</td>";

  echo "</tr>";

  }

echo "</table>";


$conn->close();


?>
</body>
</html>