<?php 
session_start();
if(!(session_id()=='' || isset($_SESSION['loginw'])) )
{
  header("Location:/LHdb/login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    
  <title>Delete Student</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/LHdb/css/loginstyle.css">
</head>

<body>
<div id="background"></div>

<a href="/LHdb/logout.php"><button type="button" class="cancelbtn">Log Out</button></a>
    
  <form action="deletest.php" method="POST">  
    <div class="container">
      <div class="uname">
        <label><b>Roll No</b></label>
       <input type="text" placeholder="Enter Roll Number" name="rollno" required>
     </div>
      <br>
   <button type="submit" name="submit">Submit</button>
      <br>
 </div>
      

</form>

<?php

function logins(){
$servername = "localhost";
$user = "root";
$pass = "password";
$dbname="LHdb";

$conn = new mysqli($servername,$user,$pass,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$rollno=$_POST["rollno"];

$sql1= "DELETE FROM st_status WHERE '$rollno'=roll_no";   
$conn->query($sql1) ;
$sql= "DELETE FROM student WHERE '$rollno'=roll_no";
$conn->query($sql) ;

$conn->close();
}

if(isset($_POST['submit']))
{
   logins();
} 
?>
</body>
</html>




