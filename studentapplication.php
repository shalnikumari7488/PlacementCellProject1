<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>My Application Status | Placement Portal</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI", Arial, sans-serif;
}

body{
    background:url("bg1.jpg") no-repeat center center/cover;
    background-attachment: fixed;
}

/* ===== HEADER (SAME AS PROJECT) ===== */
.header{
    background:rgba(44,47,90,0.95);
    display:flex;
    align-items:center;
    padding:14px 40px;
}
.logo img{
    width:55px;
}
.title{
    margin-left:15px;
}
.title h1{
    color:#fff;
    font-size:24px;
}
.title p{
    color:#dcdcff;
    font-size:14px;
}
.nav{
    margin-left:auto;
}
.nav a{
    color:#fff;
    text-decoration:none;
    margin-left:18px;
    font-size:14px;
    font-weight:600;
}
.nav a:hover{
    color:#ffdf6c;
}

/* ===== MAIN ===== */
.main{
    padding:60px;
    display:flex;
    justify-content:center;
}

/* BOX */
.status-box{
    background:#ffffff;
    padding:30px;
    border-radius:12px;
    width:100%;
    max-width:650px;
    box-shadow:0 12px 30px rgba(0,0,0,0.25);
}

.status-box h2{
    text-align:center;
    color:#2c2f5a;
    margin-bottom:25px;
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
}

td{
    padding:10px;
    font-size:14px;
    color:#333;
}

td b{
    color:#2c2f5a;
}

input{
    width:100%;
    padding:7px;
    border:1px solid #ccc;
    border-radius:5px;
    font-size:14px;
    background:#f9f9f9;
}
</style>
</head>

<body>

<!-- ===== HEADER ===== -->
<div class="header">
    <div class="logo">
        <img src="logo.jpg">
    </div>

    <div class="title">
        <h1>Ranchi Women's College</h1>
        <p>Placement Cell Management System</p>
    </div>

    <div class="nav">
        <a href="frontpage.html">Home</a>
        <a href="studentdashboard.php">Dashboard</a>
        <a href="contact.html">Contact</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<!-- ===== MAIN ===== -->
<div class="main">
<div class="status-box">

<h2>My Application Status</h2>

<?php
$t1=$_SESSION["xx"] ;
// echo "shalni=".$t1;

$conn = mysqli_connect("localhost","root","","placement");
mysqli_select_db($conn,"placement");
$sql = mysqli_query($conn,"select * from application where studentemail='$t1'");
?>

<table>
<?php
while($di = mysqli_fetch_array($sql))
{ ?>
<tr><td><b>APPLICATION ID:</b></td><td><input type="text" name="nm1" value="<?php echo $di[0];?>" readonly></td></tr>
<tr><td><b>STUDENT EMAIL:</b></td><td><input type="text" name="nm2" value="<?php echo $di[1]; ?>" readonly></td></tr>
<tr><td><b>STUDENT NAME:</b></td><td><input type="text" name="nm3" value="<?php echo $di[2]; ?>" readonly></td></tr>
<tr><td><b>COMPANY ID:</b></td><td><input type="text" name="nm4" value="<?php echo $di[3]; ?>" readonly></td></tr>
<tr><td><b>COMPANY NAME:</b></td><td><input type="text" name="nm5" value="<?php echo $di[4]; ?>" readonly></td></tr>
<tr><td><b>JOB ROLE:</b></td><td><input type="text" name="nm6" value="<?php echo $di[5]; ?>" readonly></td></tr>
<tr><td><b>APPLY DATE:</b></td><td><input type="text" name="nm7" value="<?php echo $di[6]; ?>" readonly></td></tr>
<tr><td><b>STATUS:</b></td><td><input type="text" name="nm8" value="<?php echo $di[7]; ?>" readonly></td></tr>
<?php } ?>
</table>

</div>
</div>

</body>
</html>