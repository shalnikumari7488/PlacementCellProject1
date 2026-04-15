<?php
$yy = $_SESSION["xx"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Company Dashboard | Placement Portal</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI", Arial, sans-serif;
}
html,body{
    height:100%;
}

/* ===== BACKGROUND ===== */
body{
    background:url("c1.jpg") no-repeat center center/cover;
    background-attachment: fixed;
}

/* ===== HEADER (UNCHANGED) ===== */
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
    min-height:calc(100vh - 90px);
    padding:60px 80px;
}

/* WELCOME TEXT */
.welcome{
    font-size:40px;
    font-weight:700;
    color:#ffffff;
    margin-bottom:10px;
    text-shadow:2px 4px 10px rgba(0,0,0,0.6);
}
.subtext{
    font-size:16px;
    color:#f0f0f0;
    margin-bottom:40px;
}

/* PANEL */
.panel{
    background:#ffffff;
    max-width:700px;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 12px 30px rgba(0,0,0,0.25);
}

/* PANEL HEADER */
.panel-header{
    background:#2c2f5a;
    color:#fff;
    padding:18px 25px;
    font-size:18px;
    font-weight:600;
}

/* PANEL BODY */
.panel-body{
    padding:25px;
}

/* ROW */
.row{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:15px 0;
    border-bottom:1px solid #e5e5e5;
}
.row:last-child{
    border-bottom:none;
}

.row span{
    font-size:15px;
    color:#333;
}
.row a{
    text-decoration:none;
    font-size:14px;
    padding:7px 18px;
    border:1px solid #5a5fcf;
    color:#5a5fcf;
    border-radius:20px;
    transition:0.3s;
}
.row a:hover{
    background:#5a5fcf;
    color:#fff;
}

/* FOOTER */
.footer{
    text-align:center;
    padding:10px;
    font-size:13px;
    background:rgba(255,255,255,0.85);
    color:#444;
}

/* RESPONSIVE */
@media(max-width:768px){
    .main{
        padding:30px;
    }
    .welcome{
        font-size:30px;
    }
}
</style>
</head>

<body>

<!-- ===== HEADER ===== -->
<div class="header">
    <div class="logo">
        <img src="logo.jpg" alt="Ranchi Women's College Logo">
    </div>

    <div class="title">
        <h1>Ranchi Women's College</h1>
        <p>Placement Cell Management System</p>
    </div>

    <div class="nav">
        <a href="front.html">Home</a>
        <a href="studentlogin.html">Student Login</a>
        <a href="companylogin.html">Company Login</a>
        <a href="registration.html">Registration</a>
        <a href="adminlogin.html">Admin</a>
        <a href="contact.html">Contact</a>
    </div>
</div>

<!-- ===== MAIN ===== -->
<div class="main">
<center>
    <h1>Welcome <?php echo $yy; ?></h1>

    <div class="subtext">
        Company Dashboard – Manage recruitment and applicants
    </div>

    <div class="panel">
        <div class="panel-header">
            Company Control Panel
        </div>

        <div class="panel-body">

            <div class="row">
                <span>View / Update Company Profile</span>
                <a href="companyprofile.php">Open</a>
            </div>

            <div class="row">
                <span>Post New Job</span>
                <a href="postjob.html">Post</a>
            </div>

            <div class="row">
                <span>View Posted Jobs</span>
                <a href="viewpostedjob.php">View</a>
            </div>

            <div class="row">
                <span>View Student Applications</span>
                <a href="viewstudentapplication.php">Open</a>
            </div>

           

        </div>
    </div>

</div>

<!-- ===== FOOTER ===== -->
<div class="footer">
    © 2026 Ranchi Women’s College | Placement Cell
</div>
</center>
</body>
</html>