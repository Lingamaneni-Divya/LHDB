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
    
  <title>Add Student</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/LHdb/css/loginstyle.css">
</head>

<body>
<div id="background"></div>

<a href="/LHdb/logout.php"><button type="button" class="cancelbtn">Log Out</button></a>
    
  <form action="addst.php" method="POST">  
    <div class="container">
      <div class="uname">
        <label><b>Roll No</b></label>
       <input type="text" placeholder="Enter Roll Number" name="rollno" required>
     </div>
      <br>

<div class="uname">
        <label><b>Name </b></label>
       <input type="text" placeholder="Enter Name" name="name" required>
     </div>
      <br>

<div class="uname">
        <label><b>Room Number</b></label>
       <input type="text" placeholder="Enter Room Number" name="roomno" required>
     </div>
      <br>

<div class="uname">
        <label><b>Block Number </b></label>
       <input type="text" placeholder="Enter Block Number" name="blockno" required>
     </div>
      <br>

<div class="uname">
        <label><b>Home Address</b></label>
       <input type="text" placeholder="Enter Home Address" name="homeaddr" required>
     </div>
      <br>

<div class="uname">
        <label><b>Phone Number</b></label>
       <input type="text" placeholder="Enter Phone Number" name="phno" required>
     </div>
      <br>

<div class="uname">
        <label><b>Parent Phone Number </b></label>
       <input type="text" placeholder="Enter Parent Phone Number" name="parentphno" required>
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

$rollno=$_POST["rollno"];
$name=$_POST["name"];
$roomno=$_POST["roomno"];
$blockno=$_POST["blockno"];
$homeaddr=$_POST["homeaddr"];
$phno=$_POST["phno"];
$parentphno=$_POST["parentphno"];
$psw=$_POST["psw"];
$repsw=$_POST["repsw"];
 
if(strcmp($psw,$repsw)==0)    
    {
$sql="INSERT INTO student(roll_no, name, room_no, block_no, phone_no, home_addr,parent_no, password) VALUES ('$rollno','$name',$roomno,'$blockno',$phno,'$homeaddr',$parentphno,'$psw')";

$conn->query($sql) ;
   
$sql1="INSERT INTO st_status(roll_no) VALUES ('$rollno')";

$conn->query($sql1) ;
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




