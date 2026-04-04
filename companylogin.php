<?php
session_start();
?>
<html>
<body>
<?php
$t1=$_GET['nm1'];
$t2=$_GET['nm2'];
$_SESSION["xx"]=$t1;

     $conn=mysqli_connect("localhost","root","" ,"placement");
     mysqli_select_db($conn,"placement");
$sql=mysqli_query($conn,"select * from company where companyemail='$t1'and password='$t2'");
?>
<table border=1>
<?php
if($di=mysqli_fetch_array($sql))
{
include"companydashboard.php";
}
else
{
include"companylogin.html";
}
?>
</body>
</html>
