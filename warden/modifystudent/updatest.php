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
<title>Update Student Info</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="/LHdb/css/loginstyle.css">
</head>

<body>

<div id="background"></div>


<a href="/LHdb/logout.php"><button type="button" class="cancelbtn" >Log Out</button></a>
</br>
<div class="container">
<a href="changepsw.php" id="link">
</br>
<button type="button">Change Password </button>
</a>
</br>
<a href="other.php" id="link">
<button type="button">Change Other Info</button>
</a>
</div>

</body>
</html>