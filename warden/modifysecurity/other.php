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
    
  <title>Update Security</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/LHdb/css/loginstyle.css">
</head>

<body>
<div id="background"></div>

<a href="/LHdb/logout.php"><button type="button" class="cancelbtn">Log Out</button></a>
    
  <form action="other.php" method="POST">  
    <div class="container">
      <div class="uname">
        <label><b>Security ID</b></label>
       <input type="text" placeholder="Enter Security ID" name="sid" required>
     </div>
      <br>

<div class="uname">
        <label><b> Name </b></label>
       <input type="text" placeholder="Enter Name" name="sname" required>
     </div>
      <br>


<div class="uname">
        <label><b>Phone Number</b></label>
       <input type="text" placeholder="Enter Phone Number" name="sphno" required>
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

$sid=$_POST["sid"];
$sname=$_POST["sname"];
$sphno=$_POST["sphno"];
 
$sql="UPDATE security SET security_id='$sid',security_name='$sname',security_phno=$sphno WHERE '$sid'=security_id";

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




