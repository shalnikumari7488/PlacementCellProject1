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
    background:
    linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
    url("bg1.jpg") no-repeat center center/cover;
}

/* ===== HEADER ===== */
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

/* ===== MAIN ===== */
.main{
    padding:60px;
    display:flex;
    justify-content:center;
}

/* CARD */
.status-box{
    background:rgba(255,255,255,0.97);
    padding:30px;
    border-radius:14px;
    width:100%;
    max-width:750px;
    box-shadow:0 15px 35px rgba(0,0,0,0.3);
}

/* TITLE */
.status-box h2{
    text-align:center;
    color:#2c2f5a;
    margin-bottom:25px;
}

/* APPLICATION CARD */
.app-card{
    border:1px solid #e0e0e0;
    border-radius:10px;
    padding:20px;
    margin-bottom:20px;
    background:#fafafa;
    transition:0.3s;
}
.app-card:hover{
    transform:scale(1.01);
}

/* ROW */
.row{
    display:flex;
    justify-content:space-between;
    padding:8px 0;
    font-size:14px;
}
.label{
    font-weight:600;
    color:#2c2f5a;
}
.value{
    color:#444;
}

/* STATUS BADGE */
.status{
    padding:5px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
}

.pending{background:#fff3cd; color:#856404;}
.selected{background:#d4edda; color:#155724;}
.rejected{background:#f8d7da; color:#721c24;}

/* RESUME BUTTON */
.resume-btn{
    display:inline-block;
    margin-top:10px;
    padding:6px 15px;
    background:#5a5fcf;
    color:#fff;
    text-decoration:none;
    border-radius:20px;
    font-size:13px;
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
        <a href="frontpage.html">Home</a>
        <a href="studentdashboard.php">Dashboard</a>
        <a href="contact.html">Contact</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">
<div class="status-box">

<h2>My Application Status</h2>

<?php
$t1=$_SESSION["xx"];

$conn = mysqli_connect("localhost","root","","placement");
$sql = mysqli_query($conn,"select * from application where studentemail='$t1'");

while($di = mysqli_fetch_array($sql))
{ 
    $status = strtolower($di[7]); // for class
?>

<!-- APPLICATION CARD -->
<div class="app-card">

    <div class="row">
        <div class="label">Application ID</div>
        <div class="value"><?php echo $di[0]; ?></div>
    </div>
    <div class="row">
        <div class="label">Student Email</div>
        <div class="value"><?php echo $di[1]; ?></div>
    </div>
    <div class="row">
        <div class="label">Student Name</div>
        <div class="value"><?php echo $di[2]; ?></div>
    </div>

    <div class="row">
        <div class="label">Company Id</div>
        <div class="value"><?php echo $di[3]; ?></div>
</div>

<div class="row">
        <div class="label">Company Email</div>
        <div class="value"><?php echo $di[4]; ?></div>
    </div>

    <div class="row">
        <div class="label">Job Role</div>
        <div class="value"><?php echo $di[5]; ?></div>
    </div>

    <div class="row">
        <div class="label">Apply Date</div>
        <div class="value"><?php echo $di[7]; ?></div>
    </div>

    <div class="row">
        <div class="label">Status</div>
        <div class="value">
            <span class="status <?php echo $status; ?>">
                <?php echo $di[8]; ?>
            </span>
        </div>
    </div>

    <!-- RESUME SECTION -->
    <a href="uploads/<?php echo $di[6]; ?>" target="_blank" class="resume-btn">
        View Resume
    </a>

</div>

<?php } ?>

</div>
</div>

</body>
</html>