<?php
$yy = $_SESSION["xx"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard | Placement Portal</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI", Arial, sans-serif;
}

/* ===== BODY ===== */
body{
    display:flex;
    height:100vh;
    background:linear-gradient(135deg,#eef1ff,#f6f7fb);
}

/* ===== SIDEBAR ===== */
.sidebar{
    width:250px;
    background:linear-gradient(180deg,#2c2f5a,#1e2145);
    color:#fff;
    display:flex;
    flex-direction:column;
    padding:25px 20px;
    box-shadow:4px 0 15px rgba(0,0,0,0.1);
}

.sidebar h2{
    font-size:22px;
    margin-bottom:30px;
    letter-spacing:1px;
}

/* SIDEBAR LINKS */
.sidebar a{
    color:#dcdcff;
    text-decoration:none;
    padding:12px 15px;
    border-radius:8px;
    margin-bottom:10px;
    display:flex;
    align-items:center;
    gap:10px;
    transition:0.3s;
    font-size:14px;
}

.sidebar a:hover{
    background:rgba(255,255,255,0.1);
    color:#fff;
    transform:translateX(5px);
}

/* ===== MAIN ===== */
.main{
    flex:1;
    padding:30px 40px;
}

/* TOP BAR */
.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:35px;
}

.topbar h1{
    font-size:28px;
    color:#2c2f5a;
    font-weight:600;
}

.admin{
    background:linear-gradient(135deg,#2c2f5a,#4a4fcf);
    color:#fff;
    padding:8px 18px;
    border-radius:20px;
    font-size:13px;
    box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

/* ===== CARDS ===== */
.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(260px,1fr));
    gap:25px;
}

/* CARD */
.card{
    background:#ffffff;
    padding:30px 25px;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    transition:0.3s;
    position:relative;
    overflow:hidden;
}

/* HOVER EFFECT */
.card:hover{
    transform:translateY(-8px) scale(1.02);
    box-shadow:0 15px 35px rgba(0,0,0,0.15);
}

/* GLOW BORDER EFFECT */
.card::after{
    content:"";
    position:absolute;
    width:100%;
    height:4px;
    left:0;
    bottom:0;
    background:linear-gradient(90deg,#6c63ff,#8a7dff);
}

/* ICON STYLE */
.card::before{
    content:"";
    width:60px;
    height:60px;
    border-radius:12px;
    position:absolute;
    top:20px;
    right:20px;
    opacity:0.15;
}

/* COLORS */
.card.students::before{ background:#6c63ff; }
.card.companies::before{ background:#ff6584; }
.card.report::before{ background:#28c76f; }

/* TEXT */
.card h3{
    font-size:20px;
    color:#2c2f5a;
    margin-bottom:10px;
}

.card p{
    font-size:14px;
    color:#666;
    margin-bottom:25px;
    line-height:1.5;
}

/* BUTTON */
.card a{
    text-decoration:none;
    padding:10px 18px;
    background:linear-gradient(135deg,#2c2f5a,#4a4fcf);
    color:#fff;
    border-radius:8px;
    font-size:13px;
    transition:0.3s;
    display:inline-block;
}

.card a:hover{
    background:linear-gradient(135deg,#1e2145,#3b3fb5);
    transform:scale(1.05);
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="front.html">🏠 Home</a>
    <a href="viewstudent.php">🎓 Manage Students</a>
    <a href="view_company.php">🏢 Manage Companies</a>
    <a href="viewplacementreport.php">📊 Placement Reports</a>
    <a href="adminlogin.html">🚪 Logout</a>
</div>

<!-- MAIN -->
<div class="main">

<!-- TOP BAR -->
<div class="topbar">
    <h1>Admin Dashboard</h1>
    <div class="admin">👤 <?php echo $yy; ?></div>
</div>

<!-- CARDS -->
<div class="cards">

    <div class="card students">
        <h3>Manage Students</h3>
        <p>View, edit and delete student records easily</p>
        <a href="viewstudent.php">Open</a>
    </div>

    <div class="card companies">
        <h3>Manage Companies</h3>
        <p>Handle company registrations & company details</p>
        <a href="view_company.php">Open</a>
    </div>

    <div class="card report">
        <h3>Placement Reports</h3>
        <p>Track applications and placement statistics</p>
        <a href="viewplacementreport.php">View</a>
    </div>

</div>

</div>

</body>
</html>