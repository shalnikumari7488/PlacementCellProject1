<html>
<body>
<?php
$t1=$_GET['nm1'];
$t2=$_GET['nm2'];
$t3=$_GET['nm3'];
$t4=$_GET['nm4'];
$t5=$_GET['nm5'];
$t6=$_GET['nm6'];
$t7=$_GET['nm7'];
$t8=$_GET['nm8'];
$conn=mysqli_connect("localhost","root","","placement");
mysqli_select_db($conn,"placement");
$recs=mysqli_query($conn,"update application set status='$t8' where applicationid='$t1'");
if($recs!=0)
{
  print"<h2>Data Updated!...</h2>";
}
else
{
  print"<h2>Sorry try again!...</h2>";
}
?>
</body>
</html>