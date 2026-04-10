<?php
session_start();
if(!isset($_SESSION["xx"])) {
    header("location:studentlogin.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Available Companies | Placement Portal</title>

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
    background:linear-gradient(rgba(44,47,90,0.7), rgba(44,47,90,0.7)),
               url("bg4.jpg") no-repeat center center/cover;
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
    font-size:14px;
    font-weight:600;
}
.nav a:hover{ color:#ffdf6c; }

/* MAIN */
.main{
    padding:50px;
}

/* TITLE */
.page-title{
    font-size:32px;
    font-weight:700;
    color:#fff;
    margin-bottom:30px;
}

/* GRID */
.company-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(280px,1fr));
    gap:25px;
}

/* CARD */
.card{
    background:#fff;
    border-radius:14px;
    padding:20px;
    box-shadow:0 12px 25px rgba(0,0,0,0.2);
    transition:0.3s;
    text-align:center;
}

.card:hover{
    transform:translateY(-6px);
    box-shadow:0 18px 35px rgba(0,0,0,0.3);
}

/* IMAGE */
.card img{
    width:80px;
    height:80px;
    border-radius:50%;
    object-fit:cover;
    margin-bottom:10px;
}

/* NAME */
.card h3{
    color:#2c2f5a;
    margin-bottom:5px;
}

/* DETAILS */
.card p{
    font-size:13px;
    color:#666;
    margin:3px 0;
}

/* BUTTON */
.btn{
    margin-top:12px;
    display:inline-block;
    padding:8px 14px;
    background:#2c2f5a;
    color:#fff;
    border-radius:6px;
    text-decoration:none;
    font-size:13px;
}

.btn:hover{
    background:#1e2145;
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
        <a href="companylogin.html">Company Login</a>
        <a href="registration.html">Registration</a>
        <a href="adminlogin.html">Admin</a>
        <a href="contact.html">Contact</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">

<div class="page-title">Explore Companies</div>

<div class="company-grid">

<?php
$conn = mysqli_connect("localhost","root","","placement");
$sql = mysqli_query($conn,"SELECT * FROM company");

while($di = mysqli_fetch_array($sql)){
?>

<div class="card">

    <img src="<?php echo $di[7]; ?>">

    <h3><?php echo $di[0]; ?></h3>

    <p><strong>Email:</strong> <?php echo $di[1]; ?></p>
    <p><strong>Company ID:</strong> <?php echo $di[2]; ?></p>
    <p><strong>Contact:</strong> <?php echo $di[4]; ?></p>
    <p><strong>Location:</strong> <?php echo $di[5]; ?>, <?php echo $di[6]; ?></p>

    <a href="#" class="btn">View Details</a>

</div>

<?php } ?>

</div>

</div>

</body>
</html>