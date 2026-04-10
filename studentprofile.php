<?php
session_start();
$t1 = $_SESSION["xx"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Profile | Placement Portal</title>

<!-- GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins', sans-serif;
}

/* BACKGROUND */
body{
    background:url("bg4.jpg") no-repeat center center/cover;
    background-attachment:fixed;
}

/* HEADER */
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

/* MAIN */
.main{
    padding:60px;
    display:flex;
    justify-content:center;
}

/* PROFILE CARD */
.profile{
    background:#ffffff;
    width:600px;
    border-radius:12px;
    box-shadow:0 12px 30px rgba(0,0,0,0.3);
    overflow:hidden;
    transition:0.3s;
}
.profile:hover{
    transform:translateY(-5px);
    box-shadow:0 18px 40px rgba(0,0,0,0.4);
}

/* TOP PROFILE */
.profile-top{
    text-align:center;
    padding:25px;
    background:#f5f7ff;
}
.profile-top img{
    width:120px;
    height:120px;
    border-radius:50%;
    border:4px solid #2c2f5a;
    object-fit:cover;
}
.profile-top h2{
    margin-top:10px;
}
.profile-top p{
    color:#666;
}

/* HEADER */
.profile-header{
    background:#2c2f5a;
    color:#fff;
    padding:18px;
    font-size:18px;
    font-weight:600;
}

/* BODY */
.profile-body{
    padding:25px;
}

/* EDIT BUTTON */
.edit-btn{
    text-align:right;
    margin-bottom:15px;
}
.edit-btn a{
    background:#2c2f5a;
    color:#fff;
    padding:8px 15px;
    border-radius:6px;
    text-decoration:none;
    font-size:14px;
}
.edit-btn a:hover{
    background:#1e2145;
}

/* ROWS */
.row{
    display:flex;
    justify-content:space-between;
    padding:12px 0;
    border-bottom:1px solid #e0e0e0;
}
.row:last-child{
    border-bottom:none;
}
.label{
    font-weight:600;
    color:#333;
}
.value{
    color:#555;
}
</style>
</head>

<body>

<!-- HEADER -->
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
        <a href="studentlogin.html">Student Login</a>
        <a href="companylogin.html">Company Login</a>
        <a href="registration.html">Registration</a>
        <a href="adminlogin.html">Admin</a>
        <a href="contact.html">Contact</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

<div class="profile">

<?php
$conn = mysqli_connect("localhost","root","","placement");

$sql = mysqli_query($conn,"select * from student where email='$t1'");
$di = mysqli_fetch_array($sql);
?>

<!-- TOP SECTION -->
<div class="profile-top">
    <img src="<?php echo $di[8]; ?>">
    <h2><?php echo $di[0]; ?></h2>
    <p><?php echo $di[2]; ?></p>
</div>


<div class="profile-body">


<div class="row">
    <div class="label">Name</div>
    <div class="value"><?php echo $di[0]; ?></div>
</div>

<div class="row">
    <div class="label">Roll No.</div>
    <div class="value"><?php echo $di[1]; ?></div>
</div>

<div class="row">
    <div class="label">Email</div>
    <div class="value"><?php echo $di[2]; ?></div>
</div>

<div class="row">
    <div class="label">Password</div>
    <div class="value">********</div>
</div>

<div class="row">
    <div class="label">Department</div>
    <div class="value"><?php echo $di[4]; ?></div>
</div>

<div class="row">
    <div class="label">Contact</div>
    <div class="value"><?php echo $di[5]; ?></div>
</div>

<div class="row">
    <div class="label">City</div>
    <div class="value"><?php echo $di[6]; ?></div>
</div>

<div class="row">
    <div class="label">State</div>
    <div class="value"><?php echo $di[7]; ?></div>
</div>
<center>
<div class="edit-btn">
    <a href="editprofile.php">Edit Profile</a>
</div>
</center>

</div>
</div>

</div>

</body>
</html>