<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Student SignOut Page</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="/LHdb/css/loginstyle.css">
</head>
<body>

<div id="background"></div>
<a href="/LHdb/logout.php"><button type="button" class="cancelbtn">Log Out</button></a>

<form action="signout.php" method="POST">
   <div class="container">
    

     <div class="select" overflow="auto">
          <label for="designation"><b>Designation</b></label>
                 <select id="designation" name="go">
	<option value="0">Select Designation</option>
	<option value="Campus">Campus</option>
                <option value="Home">Home</option>
	<option value="City">City</option>
  	<option value="Kattangal">Kattangal</option>
	<option value="Other">Other</option>    
    </select>
      </div>
     
   <button type="submit" name="done">done</button>
      </div>

 
      
</form>
<?php
   function change(){
   $servername = "localhost";
$user = "root";
$pass = "password";
$dbname="LHdb";

$conn = new mysqli($servername,$user,$pass,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$go=$_POST["go"];  

$id=$_SESSION['loginst'];
$sql= "UPDATE st_status SET place='$go' , in_time=0,out_time=CURRENT_TIMESTAMP WHERE '$id'=roll_no ";

$conn->query($sql);
echo "<h1>YOU HAVE SUCESSFULLY SIGNED OUT! </h1>";
/*
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
*/

$conn->close();
}

if(isset($_POST['done']))
{
   change();
} 

?>

</body>
</html>

  


