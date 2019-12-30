<?php 
session_start();
if(!(session_id()=='' || !isset($_SESSION['login'])) )
{
  header("Location:/LHdb/login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/loginstyle.css">
</head>

<body>
<div id="background"></div>

<a href="home.php"><button type="button" class="cancelbtn">Home</button></a>
    
  <form action="login.php" method="POST">  
    <div class="container">
      <h1>Login</h1>
      <div class="uname">
        <label><b>User  ID </b></label>
       <input type="text" placeholder="Enter User ID" name="uname" required>
     </div>
      <br>
     <div class="passwd">
      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
     </div> 
      <br>
     <div class="select">
          <label for="designation"><b>Designation</b></label>
          <select id="designation" name="who">
	 	<option value="0">Designation</option>
		<option value="Security">Security</option>
      	<option value="Warden">Warden</option>
      	<option value="Student">Student</option>
    </select>
      </div>
      <br>
      <br>
      
    <button type="submit" name="login">Login</button>
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


$id=$_POST["uname"];
$password=$_POST["psw"];
$who=$_POST["who"];


if(strcmp($who, "Security")==0)    
    {
	$sql= "SELECT * FROM security WHERE '$id'=security_id and '$password'=security_password";
    	$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
			$_SESSION['loginse']=$_POST['uname'];
		header("Location:/LHdb/security/security.php");
		}
		else
    			echo '<script> alert("auth failed. Try again")</script>';
      
    }
else if(strcmp($who, "Warden")==0)
	{ 
		$sql= "SELECT * FROM warden WHERE '$id'=warden_id and '$password'=warden_password";
    	$result = $conn->query($sql);
    	if($result->num_rows>0){
    	$_SESSION['loginw']=$_POST['uname'];
    		header("Location:/LHdb/warden/warden.php");
      }
		
		else
    			echo '<script> alert("auth failed. Try again")</script>';
      
    }

else if(strcmp($who, "Student")==0)
	{ 
		$sql= "SELECT * FROM student WHERE '$id'=roll_no and '$password'=password";
    	$result = $conn->query($sql);
    	if($result->num_rows>0){
        $_SESSION['loginst']=$_POST['uname'];
    		header("Location:/LHdb/student/student.php");
      }
		
		else
    			echo '<script> alert("auth failed. Try again")</script>';
      
    }

$conn->close();
}
if(isset($_POST['login']))
{
   logins();
} 
?>
</body>
</html>




