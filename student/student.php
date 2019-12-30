<?php 
session_start();
if(!(session_id()=='' || isset($_SESSION['loginst'])))
{
  header("Location:/LHdb/login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Page</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="/LHdb/css/loginstyle.css">
</head>

<body>

<div id="background"></div>

<a href="/LHdb/logout.php"><button type="button" class="cancelbtn" >Log Out</button></a>

<div class="container">

<?php

$servername = "localhost";
$user = "root";
$pass = "password";
$dbname="LHdb";

$conn = new mysqli($servername,$user,$pass,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_SESSION['loginst'];
//echo $id;
$sql="SELECT * FROM st_status where '$id'=roll_no";
$result=$conn->query($sql);
$row= $result->fetch_assoc();
$p=$row["place"];
echo "<h1>Hi! ".$_SESSION['loginst']."</h1>";

if(strcmp($p,"hostel")==0)
{
echo "<h1> YOU ARE SIGNED IN </h1>";
}
else
 echo "<h1> YOU ARE NOT SIGNED IN</h1>";  


$conn->close();

?>
<br>
<br>

<a href="/LHdb/student/signin.php" id="link">
<button type="button">Sign In</button>
</a>
</br>
<a href="/LHdb/student/signout.php" id="link">
<button type="button">Sign Out</button>
</a>
</div>

</body>
</html>