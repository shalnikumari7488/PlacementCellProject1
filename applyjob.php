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

// 🔥 FILE UPLOAD
$file_name = $_FILES['resume']['name'];
$file_tmp  = $_FILES['resume']['tmp_name'];

$upload_path = "uploads/" . $file_name;

// 🔥 DATABASE CONNECT
$conn=mysqli_connect("localhost","root","","placement");

// 🔥 MOVE FILE
move_uploaded_file($file_tmp, $upload_path);

// 🔥 INSERT QUERY
$recs = mysqli_query($conn, "INSERT INTO application 
(applicationid, studentemail, studentname, companyid, companyemail, jobrole, applydate, status, resume) 
VALUES ('$t1','$t2','$t3','$t4','$t5','$t6','$t7','$t8','$file_name')");

if($recs){
    print "<h2> Application Submitted Successfully! </h2>";
}else{
    print "<h2> Sorry Try Again!.. </h2>";
}
?>
</body>
</html>