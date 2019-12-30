<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Student SignIn Page</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="/LHdb/css/loginstyle.css">
</head>
<body >
 
<div id="background"></div>
<a href="/LHdb/logout.php"><button type="button" class="cancelbtn">Log Out</button></a>

<form action="signin.php" method="POST">
   <div class="container">
      <h1>YOU HAVE SUCESSFULLY SIGNED IN! </h1>
    </div>
      <br>
</form>


<?php

$servername = "localhost";
$user = "root";
$pass = "password";
$dbname="LHdb";

$conn = new mysqli($servername,$user,$pass,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id=$_SESSION['loginst'];
$sql= "UPDATE st_status SET place='hostel' , in_time=CURRENT_TIMESTAMP,out_time=0 WHERE '$id'=roll_no ";

$conn->query($sql);

/*
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
*/
$conn->close();

?>

</body>
</html>

  
