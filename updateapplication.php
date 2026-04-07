<html>
<body>

<?php

$conn = mysqli_connect("localhost","root","","placement");

/* GET ARRAYS FROM FORM */
$appid = $_GET['appid'];   // array of application IDs
$status = $_GET['status']; // array of statuses

$success = 0;

/* LOOP FOR MULTIPLE UPDATE */
for($i=0; $i<count($appid); $i++)
{
    $id = $appid[$i];
    $st = $status[$i];

    $query = "update application set status='$st' where applicationid='$id'";
    $res = mysqli_query($conn,$query);

    if($res)
    {
        $success++;
    }
}

/* MESSAGE */
if($success > 0)
{
    echo "<h2 style='color:green; text-align:center;'>Status Updated Successfully!</h2>";
}
else
{
    echo "<h2 style='color:red; text-align:center;'>No Update Done! Try Again.</h2>";
}

?>

</body>
</html>