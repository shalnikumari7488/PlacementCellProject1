<html>
<body>
<?php

$t1=$_POST["nm1"];
$t2=$_POST["nm2"];
$t3=$_POST["nm3"];
$t4=$_POST["nm4"];
$t5=$_POST["nm5"];
$t6=$_POST["nm6"];
$t7=$_POST["nm7"];
$t8=$_POST["nm8"];

$t9=$_FILES["nm9"];


 move_uploaded_file($t9['tmp_name'],"image/".$t9['name']);
 
$xx="image/".$t9['name'];



$conn=mysqli_connect("localhost","root","","placement");

 mysqli_select_db($conn,"placement");

   $recs= mysqli_query($conn," insert into student  values('$t1','$t2','$t3','$t4','$t5','$t6','$t7','$t8','$xx')  ");
 
 if($recs!=0)
	{
	  print "<h2> data inserted !..</h2>";
	}
 else
	{
	  print "<h2> Sorry Try Again !..</h2>";	
	}
?>
</body>
</html>