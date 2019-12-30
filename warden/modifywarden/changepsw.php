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
    
  <title>Change Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/LHdb/css/loginstyle.css">
</head>

<body>
<div id="background"></div>

<a href="/LHdb/logout.php"><button type="button" class="cancelbtn">Log Out</button></a>

<form action="modifyw.php" method="POST">  
    <div class="container">

      <div class="uname">
        <label><b>Warden ID</b></label>
       <input type="text" placeholder="Enter Warden ID" name="wid" required>
     </div>
      <br>

<div class="passwd">
        <label><b>Old Password</b></label>
       <input type="password" placeholder="Enter Old Password" name="oldpsw" required>
     </div>
      <br>

<div class="passwd">
        <label><b>New Password</b></label>
       <input type="password" placeholder="Enter New Password" name="newpsw" required>
     </div>
      <br>

<div class="passwd">
        <label><b>Re-Type New Password</b></label>
       <input type="password" placeholder="Re-Enter New Password" name="repsw" required>
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
$oldpsw=$_POST["oldpsw"];
$newpsw=$_POST["newpsw"];
$repsw=$_POST["repsw"];

$sql="select warden_password from warden where '$wid'=warden_id";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

if(strcmp($row["warden_password"],$oldpsw)==0)
{
  
if(strcmp($newpsw,$repsw)==0)    
{
   $sql1="update warden set warden_password='$newpsw' where warden_id='$wid' ";
 $conn->query($sql1);
}

else
{
echo '<script> alert("password mismatch. Try again")</script>';

}

}
else
{
echo '<script> alert("Invalid Username or Password.Try Again")</script>';
}


$conn->close();
}
if(isset($_POST['submit']))
{
   logins();
} 
?>
</body>
</html>

