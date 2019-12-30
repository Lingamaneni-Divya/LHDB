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
    
  <title>Delete Warden</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/LHdb/css/loginstyle.css">
</head>

<body>
<div id="background"></div>

<a href="/LHdb/logout.php"><button type="button" class="cancelbtn">Log Out</button></a>
    
  <form action="deletew.php" method="POST">  
    <div class="container">
      <div class="uname">
        <label><b>Warden ID</b></label>
       <input type="text" placeholder="Enter Warden ID" name="wid" required>
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

$wid=$_POST["wid"];

$sql= "DELETE FROM warden WHERE '$wid'=warden_id";
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




