<?php
$conn = mysqli_connect("localhost","root","","placement");

$applicationid = $_POST['applicationid'];
$status = $_POST['status'];

mysqli_query($conn,"UPDATE application SET status='$status' WHERE applicationid='$applicationid'");

header("location: viewstudentapplication.php"); // 
?>