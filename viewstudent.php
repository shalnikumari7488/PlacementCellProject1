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

<style>
body{
    margin:0;
    font-family:"Segoe UI", Arial, sans-serif;
    background:url("bg2.jpg") no-repeat center center/cover;
    background-attachment: fixed;
}

/* ===== HEADER ===== */
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
}

/* PAGE TITLE */
.page-title{
    font-size:32px;
    font-weight:700;
    color:#fff;
    margin-bottom:30px;
    text-shadow:2px 4px 10px rgba(0,0,0,0.6);
}

/* TABLE */
.table-box{
    background:#fff;
    border-radius:12px;
    padding:25px;
    box-shadow:0 12px 30px rgba(0,0,0,0.25);
}

table{
    width:100%;
    border-collapse:collapse;
}

th, td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #ddd;
    font-size:14px;
}

th{
    background:#2c2f5a;
    color:#fff;
}

tr:hover{
    background:#f5f5f5;
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
        <a href="companylogin.html">Company Login</a>
        <a href="registration.html">Registration</a>
        <a href="adminlogin.html">Admin</a>
        <a href="contact.html">Contact</a>
    </div>
</div>

<!-- ===== MAIN ===== -->
<div class="main">
    <div class="page-title">Available Companies</div>

    <div class="table-box">
        <table border="0" cellspacing="10">
            <tr>
                <th>Student Name</th>
                <th>Roll No.</th>
                <th>Student Email</th>
                <th>Department</th>

                <th>Contact</th>
                <th>City</th>
                <th>State</th>
                <th>Photo</th>
            </tr>

            <?php
            $conn = mysqli_connect("localhost","root","","placement");
            $sql = mysqli_query($conn,"SELECT * FROM student");

            while($di = mysqli_fetch_array($sql)){
            ?>
            <tr>
                <td><?php echo $di[0]; ?></td>
                <td><?php echo $di[1]; ?></td>
                <td><?php echo $di[2]; ?></td>
                <td><?php echo $di[4]; ?></td>
                <td><?php echo $di[5]; ?></td>
                <td><?php echo $di[6]; ?></td>
                <td><?php echo $di[7]; ?></td>
                                

 
                
                                <td>
                    <img src="<?php echo $di[8]; ?>" width="80" height="80">
                </td>

            </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>