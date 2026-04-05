<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>View Student Applications</title>

<style>
body{
    margin:0;
    font-family:"Segoe UI", Arial, sans-serif;
    background:url("bg2.jpg") no-repeat center center/cover;
    background-attachment: fixed;
}

/* ===== HEADER (SAME AS PROJECT) ===== */
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
    margin:0;
}
.title p{
    color:#dcdcff;
    font-size:14px;
    margin:0;
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

/* TABLE BOX */
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
    <div class="page-title">Student Job Applications</div>

    <div class="table-box">
        <center>
        <?php
        $t1=$_SESSION["xx"] ;
        echo "<b>Company Email:</b> ".$t1."<br><br>";

        $conn = mysqli_connect("localhost","root","","placement");
        mysqli_select_db($conn,"placement");
        $sql = mysqli_query($conn,"select * from application where companyemail='$t1'");
        ?>

        <table>
            <tr>
                <th>Application ID</th>
                <th>Student Email</th>
                <th>Student Name</th>
                <th>Company ID</th>
                <th>Company Email</th>
                <th>Job Role</th>
                <th>Resume</th>
                <th>Apply Date</th>
                
                <th>Status</th>
            </tr>

            <?php
            while($di = mysqli_fetch_array($sql))
            { ?>            
            <tr>
                <td><?php echo $di[0]; ?></td>
                <td><?php echo $di[1]; ?></td>
                <td><?php echo $di[2]; ?></td>
                <td><?php echo $di[3]; ?></td>
                
                <td><?php echo $di[4]; ?></td>
                <td><?php echo $di[5]; ?></td>
                <td>
    <a href="uploads/<?php echo $di[6]; ?>" target="_blank">
        View Resume
    </a>
</td>
                <td><?php echo $di[7]; ?></td>
                 <td><?php echo $di[8]; ?></td>

                
            </tr>
            <?php
            }
            ?>
        </table>
        </center>
    </div>
</div>

</body>
</html>