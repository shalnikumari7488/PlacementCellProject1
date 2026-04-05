<?php
session_start();
$t1 = $_SESSION["xx"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Company Profile | Placement Portal</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI", Arial, sans-serif;
}

/* ===== BACKGROUND IMAGE ===== */
body{
    background:url("bg1.jpg") no-repeat center center/cover;
    background-attachment:fixed;
}

/* ===== HEADER (SAME AS BEFORE) ===== */
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

/* PROFILE CARD */
.profile{
    background:#ffffff;
    width:600px;
    border-radius:12px;
    box-shadow:0 12px 30px rgba(0,0,0,0.3);
    overflow:hidden;
}
.profile-header{
    background:#2c2f5a;
    color:#fff;
    padding:18px;
    font-size:18px;
    font-weight:600;
}
.profile-body{
    padding:25px;
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
        <a href="studentlogin.html">Student Login</a>
        <a href="companylogin.html">Company Login</a>
        <a href="registration.html">Registration</a>
        <a href="adminlogin.html">Admin</a>
        <a href="contact.html">Contact</a>
    </div>
</div>

<!-- ===== MAIN CONTENT ===== -->
<div class="main">

<div class="profile">
    <div class="profile-header">
        Company Profile
    </div>

    <div class="profile-body">

<?php
$conn = mysqli_connect("localhost","root","","placement");
mysqli_select_db($conn,"placement");

$sql = mysqli_query($conn,"select * from company where companyemail='$t1'");
while($di = mysqli_fetch_array($sql))
{
?>
        <div class="row">
            <div class="label">Company Name</div>
            <div class="value"><?php echo $di[0]; ?></div>
        </div>

        <div class="row">
            <div class="label">Company Email</div>
            <div class="value"><?php echo $di[1]; ?></div>
        </div>

        <div class="row">
            <div class="label">Company Id</div>
            <div class="value"><?php echo $di[2]; ?></div>
        </div>

        <div class="row">
            <div class="label">Password</div>
            <div class="value"><?php echo $di[3]; ?></div>
        </div>

        <div class="row">
            <div class="label">Contact</div>
            <div class="value"><?php echo $di[4]; ?></div>
        </div>

<div class="row">
            <div class="label">city</div>
            <div class="value"><?php echo $di[5]; ?></div>
        </div>
 <div class="row">
            <div class="label">state</div>
            <div class="value"><?php echo $di[6]; ?></div>
        </div>
<div class="row">
    <div class="label">Photo</div>
    <div class="value">
        <img src="<?php echo $di[7]; ?>" style="width:120px; height:120px; object-fit:cover; border-radius:8px;">
    </div>
</div>

<?php
}
?>

    </div>
</div>

</div>

</body>
</html>