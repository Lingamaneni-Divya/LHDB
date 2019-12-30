<?php 
session_start();
if(!(session_id()=='' || isset($_SESSION['loginw'])))
{
  header("Location:/LHdb/login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Modify Student Data</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="/LHdb/css/loginstyle.css">
</head>

<body>
<div id="background"></div>

<a href="/LHdb/logout.php"><button type="button" class="cancelbtn" >Log Out</button></a>
<div class="container">

<a href="addst.php" id="link">
<button type="button">Add Student</button>
</a>
</br>
<a href="deletest.php" id="link">
<button type="button">Delete Student</button>
</a>
</br>
<a href="updatest.php" id="link">
<button type="button">Update Student Data</button>
</a>
</br>
</div>

</body>
</html>




