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

  <title>Security Information</title>
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

$sql = "SELECT security_id,security_name,security_phno FROM security ";
$result = $conn->query($sql);

echo "<table bgcolor=#ffff00; align=center>

<tr>

<th>Security ID</th>
<th>Security Name</th>
<th>Security Phone No</th>
</tr>";
while( $row = $result->fetch_assoc() ) 
{
 
 echo "<tr>";

  echo "<td>" . $row['security_id'] . "</td>";
  echo "<td>" . $row['security_name'] . "</td>";
  echo "<td>" . $row['security_phno'] . "</td>";

  echo "</tr>";

  }

echo "</table>";


$conn->close();


?>
</body>
</html>