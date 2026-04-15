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
}

.sidebar h2{
    font-size:22px;
    margin-bottom:30px;
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
    margin-bottom:20px;
}

.topbar h1{
    font-size:28px;
    color:#2c2f5a;
}

.admin{
    background:#2c2f5a;
    color:#fff;
    padding:8px 18px;
    border-radius:20px;
    font-size:13px;
}

/* ===== CONTENT AREA ===== */
.content-area{
    width:100%;
    height:85vh;
    background:#fff;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
    overflow:hidden;
}

/* IFRAME */
.content-area iframe{
    width:100%;
    height:100%;
    border:none;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Admin Panel</h2>

    <a href="front.html" >🏠 Home</a>
    <a href="viewstudent.php" target="contentFrame">🎓 Manage Students</a>
    <a href="view_company.php" target="contentFrame">🏢 Manage Companies</a>
    <a href="viewplacementreport.php" target="contentFrame">📊 Placement Reports</a>
    <a href="adminlogin.html">🚪 Logout</a>
</div>

<!-- MAIN -->
<div class="main">

<!-- TOP BAR -->
<div class="topbar">
    <h1>Admin Dashboard</h1>
    <div class="admin">👤 <?php echo $yy; ?></div>
</div>

<!-- RIGHT SIDE CONTENT (REPLACES CARDS) -->
<div class="content-area">
    <iframe name="contentFrame" src="admindash.html"></iframe>
    <iframe name="contentFrame" src=""></iframe>
</div>

</div>

</body>
</html>