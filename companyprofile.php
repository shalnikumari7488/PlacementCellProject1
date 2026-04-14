<?php
session_start();
$t1 = $_SESSION["xx"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Company Profile</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI", Arial, sans-serif;
}

/* BACKGROUND */
body{
    background:url("c1.jpg") no-repeat center center/cover;
}

/* HEADER */
.header{
    background:rgba(44,47,90,0.95);
    display:flex;
    align-items:center;
    padding:14px 40px;
}
.logo img{ width:55px; }

.title{ margin-left:15px; }
.title h1{ color:#fff; font-size:24px; }
.title p{ color:#dcdcff; font-size:14px; }

.nav{ margin-left:auto; }
.nav a{
    color:#fff;
    text-decoration:none;
    margin-left:18px;
}
.nav a:hover{ color:#ffdf6c; }

/* MAIN */
.main{
    padding:60px;
    display:flex;
    justify-content:center;
}

/* CARD */
.profile{
    width:700px;
    background:#fff;
    border-radius:12px;
    box-shadow:0 12px 30px rgba(0,0,0,0.3);
    overflow:hidden;
}

/* 🔥 TOP FLEX SECTION */
.profile-top{
    display:flex;
    align-items:center;
    gap:25px;
    padding:25px;
    border-bottom:1px solid #eee;
}

/* IMAGE */
.profile-top img{
    width:110px;
    height:110px;
    border-radius:12px;   /* 🔥 square professional look */
    object-fit:cover;
    border:2px solid #ddd;
}

/* INFO BOX */
.info-box{
    flex:1;
}

.info-box h2{
    margin-bottom:5px;
    color:#333;
}

.info-box p{
    color:#777;
    font-size:14px;
}

/* BODY */
.profile-body{
    padding:25px;
}

/* ROW */
.row{
    display:flex;
    justify-content:space-between;
    padding:14px 0;
    border-bottom:1px solid #eee;
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

/* BUTTON */
.actions{
    text-align:center;
    margin-top:25px;
}

.actions a{
    padding:10px 25px;
    background:#2c2f5a;
    color:#fff;
    text-decoration:none;
    border-radius:6px;
}

.actions a:hover{
    background:#1e2145;
}
</style>
</head>

<body>

<div class="header">
    <div class="logo">
        <img src="logo.jpg">
    </div>

    <div class="title">
        <h1>Ranchi Women's College</h1>
        <p>Placement Cell Management System</p>
    </div>

    <div class="nav">
        <a href="front.html">Home</a>
        <a href="studentlogin.html">Student Login</a>
        <a href="companylogin.html">Company Login</a>
        <a href="companyregistration.html">Registration</a>
        <a href="adminlogin.html">Admin</a>
        <a href="contact.html">Contact</a>
    </div>
</div>

<div class="main">

<div class="profile">

<?php
$conn = mysqli_connect("localhost","root","","placement");
$sql = mysqli_query($conn,"select * from company where companyemail='$t1'");
while($di = mysqli_fetch_array($sql))
{
?>

<!-- 🔥 TOP -->
<div class="profile-top">
    <img src="<?php echo $di[7]; ?>">

    <div class="info-box">
        <h2><?php echo $di[0]; ?></h2>
        <p><?php echo $di[1]; ?></p>
    </div>
</div>

<!-- BODY -->
<div class="profile-body">

<div class="row">
    <div class="label">Company ID</div>
    <div class="value"><?php echo $di[2]; ?></div>
</div>

<div class="row">
    <div class="label">Contact</div>
    <div class="value"><?php echo $di[4]; ?></div>
</div>

<div class="row">
    <div class="label">City</div>
    <div class="value"><?php echo $di[5]; ?></div>
</div>

<div class="row">
    <div class="label">State</div>
    <div class="value"><?php echo $di[6]; ?></div>
</div>

<div class="row">
    <div class="label">Password</div>
    <div class="value"><?php echo $di[3]; ?></div>
</div>

<div class="actions">
    <a href="editcompanyprofile.php">Edit Profile</a>
</div>

</div>

<?php } ?>

</div>

</div>

</body>
</html>