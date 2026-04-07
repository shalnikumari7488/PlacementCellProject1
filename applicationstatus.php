<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>My Applications | Placement Portal</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI", Arial, sans-serif;
}

body{
    background:
    linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
    url("bg1.jpg") no-repeat center center/cover;
}

/* HEADER */
.header{
    background:rgba(44,47,90,0.95);
    display:flex;
    align-items:center;
    padding:14px 40px;
}
.logo img{width:55px;}
.title{margin-left:15px;}
.title h1{color:#fff;font-size:24px;}
.title p{color:#dcdcff;font-size:14px;}
.nav{margin-left:auto;}
.nav a{
    color:#fff;
    text-decoration:none;
    margin-left:18px;
    font-size:14px;
    font-weight:600;
}
.nav a:hover{color:#ffdf6c;}

/* MAIN */
.main{
    padding:50px 80px;
}

/* TITLE */
.page-title{
    color:#fff;
    margin-bottom:25px;
}
.page-title h2{
    font-size:32px;
}
.page-title p{
    font-size:14px;
    opacity:0.8;
}

/* ===== STATS ===== */
.stats{
    display:flex;
    gap:20px;
    margin-bottom:30px;
}

.stat-card{
    flex:1;
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(10px);
    padding:20px;
    border-radius:12px;
    color:#fff;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
}

.stat-card h3{
    font-size:22px;
}
.stat-card p{
    font-size:13px;
    opacity:0.8;
}

/* TABLE BOX */
.table-box{
    background:rgba(255,255,255,0.95);
    border-radius:12px;
    padding:20px;
    box-shadow:0 15px 35px rgba(0,0,0,0.3);
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#2c2f5a;
    color:#fff;
    padding:12px;
    font-size:14px;
}

td{
    padding:12px;
    text-align:center;
    font-size:13px;
    border-bottom:1px solid #eee;
}

tr:hover{
    background:#f5f7ff;
    transition:0.2s;
}

/* STATUS */
.status{
    padding:5px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
}

.pending{background:#fff3cd; color:#856404;}
.selected{background:#d4edda; color:#155724;}
.rejected{background:#f8d7da; color:#721c24;}

/* BUTTON */
.resume-btn{
    padding:6px 14px;
    background:#5a5fcf;
    color:#fff;
    text-decoration:none;
    border-radius:20px;
    font-size:12px;
}
.resume-btn:hover{
    background:#2c2f5a;
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
        <a href="front.html">Home</a>
        <a href="studentlogin.html">Student Login</a>
        <a href="companylogin.html">Company Login</a>
        <a href="registration.html">Registration</a>
        <a href="adminlogin.html">Admin</a>
        <a href="contact.html">Contact</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

<div class="page-title">
    <h2>My Applications</h2>
    <p>Track and manage your job applications</p>
</div>

<?php
$t1=$_SESSION["xx"];
$conn = mysqli_connect("localhost","root","","placement");

/* COUNTS */
$total = mysqli_fetch_array(mysqli_query($conn,"select count(*) from application where studentemail='$t1'"));
$pending = mysqli_fetch_array(mysqli_query($conn,"select count(*) from application where studentemail='$t1' and status='Pending'"));
$selected = mysqli_fetch_array(mysqli_query($conn,"select count(*) from application where studentemail='$t1' and status='Selected'"));
$rejected = mysqli_fetch_array(mysqli_query($conn,"select count(*) from application where studentemail='$t1' and status='Rejected'"));
?>

<!-- STATS -->
<div class="stats">
    <div class="stat-card">
        <h3><?php echo $total[0]; ?></h3>
        <p>Total Applied</p>
    </div>
    <div class="stat-card">
        <h3><?php echo $pending[0]; ?></h3>
        <p>Pending</p>
    </div>
    <div class="stat-card">
        <h3><?php echo $selected[0]; ?></h3>
        <p>Selected</p>
    </div>
    <div class="stat-card">
        <h3><?php echo $rejected[0]; ?></h3>
        <p>Rejected</p>
    </div>
</div>

<!-- TABLE -->
<div class="table-box">

<table>
<tr>
    <th>ID</th>
    <th>Company</th>
    <th>Job Role</th>
    <th>Apply Date</th>
    <th>Status</th>
    <th>Resume</th>
</tr>

<?php
$sql = mysqli_query($conn,"select * from application where studentemail='$t1'");

while($di = mysqli_fetch_array($sql))
{
    $status = strtolower($di[8]);
?>

<tr>
    <td><?php echo $di[0]; ?></td>
    <td><?php echo $di[4]; ?></td>
    <td><?php echo $di[5]; ?></td>
    <td><?php echo $di[7]; ?></td>

    <td>
        <span class="status <?php echo $status; ?>">
            <?php echo $di[8]; ?>
        </span>
    </td>

    <td>
        <a href="uploads/<?php echo $di[6]; ?>" target="_blank" class="resume-btn">
            View
        </a>
    </td>
</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>