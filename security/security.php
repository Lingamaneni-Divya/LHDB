<?php 
session_start();
if(!(session_id()=='' || isset($_SESSION['loginse'])))
{
  header("Location:/LHdb/login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Security Page</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="/LHdb/css/loginstyle.css">
</head>

<body>
<div id="background"></div>

<a href="/LHdb/logout.php"><button type="button" class="cancelbtn" >Log Out</button></a>
<div class="container">

<a href="pstudent.php" id="link">
<button type="button">Know a Particular student information</button>
</a>
</br>
<a href="viewall.php" id="link">
<button type="button">View All Signed Out Students</button>
</a>
</div>

</body>
</html>




