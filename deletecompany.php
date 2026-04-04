<html>
<body>
<?php
$t1=$_GET['nm1'];
$conn=mysqli_connect("localhost","root","","placement");
mysqli_select_db($conn,"placement");
$recs=mysqli_query($conn,"delete from company where companyemail='$t1'");
if($recs!=0)
{
  print"<h2>data deleted!...</h2>";
}
else
{
  print"<h2>Sorry try again!...</h2>"; 
}
?>
</body>
</html>