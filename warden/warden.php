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
<title>Warden Page</title>
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
</br>
<a href="modifystudent/modifyst.php" id="link">
<button type="button">Modify Student Data</button>
</a>
</br>
<a href="viewse.php" id="link">
<button type="button">View All Security Guards</button>
</a>
</br>
<a href="modifysecurity/modifyse.php" id="link">
<button type="button">Modify Security Data</button>
</a>
</br>
<a href="modifywarden/modifyw.php" id="link">
<button type="button">Modify Warden Data</button>
</a>
</br>
</div>

</body>
</html>




