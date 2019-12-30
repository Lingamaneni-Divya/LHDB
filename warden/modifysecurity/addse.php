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
    
  <title>Add Security</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/LHdb/css/loginstyle.css">
</head>

<body>
<div id="background"></div>

<a href="/LHdb/logout.php"><button type="button" class="cancelbtn">Log Out</button></a>
    
  <form action="addse.php" method="POST">  
    <div class="container">
      <div class="uname">
        <label><b>Security ID</b></label>
       <input type="text" placeholder="Enter Security ID" name="sid" required>
     </div>
      <br>

<div class="uname">
        <label><b>Security Name </b></label>
       <input type="text" placeholder="Enter Security Name" name="sname" required>
     </div>
      <br>

<div class="uname">
        <label><b>Security Phone No</b></label>
       <input type="text" placeholder="Enter Security Phone No" name="sphno" required>
     </div>
      <br>

     <div class="passwd">
      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
     </div> 
      <br>

 <div class="passwd">
      <label><b>Re-Enter Password</b></label>
      <input type="password" placeholder="Re-Enter Password" name="repsw" required>
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
$psw=$_POST["psw"];
$repsw=$_POST["repsw"];
 
if(strcmp($psw,$repsw)==0)    
    {
$sql="INSERT INTO security(security_id, security_name, security_password, security_phno) VALUES ('$sid','$sname','$psw',$sphno)";


}
else
echo '<script> alert("password mismatch. Try again")</script>';




$conn->close();
}
if(isset($_POST['submit']))
{
   logins();
} 
?>
</body>
</html>




