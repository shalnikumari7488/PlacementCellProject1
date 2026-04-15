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

/* ===== HEADER ===== */
.header{
    background:rgba(44,47,90,0.95);
    display:flex;
    align-items:center;
    padding:14px 40px;
}
.logo img{width:55px;}
.title{margin-left:15px;}
.title h1{color:#fff;font-size:24px;margin:0;}
.title p{color:#dcdcff;font-size:14px;margin:0;}
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
.main{padding:60px;}

.page-title{
    font-size:32px;
    font-weight:700;
    color:#fff;
    margin-bottom:20px;
}

/* ===== CARD STATS ===== */
.stats{
    display:flex;
    gap:20px;
    margin-bottom:25px;
}
.card{
    background:#fff;
    padding:15px 25px;
    border-radius:10px;
    box-shadow:0 8px 20px rgba(0,0,0,0.2);
    font-size:14px;
}
.card b{
    font-size:20px;
    color:#2c2f5a;
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
    padding:10px;
    text-align:center;
    border-bottom:1px solid #ddd;
    font-size:13px;
}
th{
    background:#2c2f5a;
    color:#fff;
}
tr:hover{background:#f5f5f5;}

/* ===== BUTTONS ===== */
.btn{
    padding:6px 10px;
    border:none;
    border-radius:6px;
    font-size:12px;
    cursor:pointer;
    color:#fff;
}

/* SELECT */
.select{
    background:#28c76f;
}
.select:hover{
    background:#20a85a;
}

/* REJECT */
.reject{
    background:#ea5455;
}
.reject:hover{
    background:#c73c3d;
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
        <a href="registration.html">Registration</a>
        <a href="adminlogin.html">Admin</a>
        <a href="contact.html">Contact</a>
    </div>
</div>

<div class="main">

<div class="page-title">Student Job Applications</div>

<?php
$t1=$_SESSION["xx"];

$conn = mysqli_connect("localhost","root","","placement");

/* ===== TOTAL COUNT ===== */
$total_res = mysqli_query($conn,"select count(*) as total from application where companyemail='$t1'");
$total = mysqli_fetch_array($total_res);

/* ===== STATUS COUNT ===== */
$status_res = mysqli_query($conn,"select status, count(*) as total from application where companyemail='$t1' group by status");

$pending=0; $selected=0; $rejected=0;

while($row=mysqli_fetch_array($status_res)){
    if($row['status']=="Pending") $pending=$row['total'];
    if($row['status']=="Selected") $selected=$row['total'];
    if($row['status']=="Rejected") $rejected=$row['total'];
}
?>

<!-- ===== STATS ===== -->
<div class="stats">
    <div class="card">Total Applications<br><b><?php echo $total['total']; ?></b></div>
    <div class="card">Pending<br><b><?php echo $pending; ?></b></div>
    <div class="card">Selected<br><b><?php echo $selected; ?></b></div>
    <div class="card">Rejected<br><b><?php echo $rejected; ?></b></div>
</div>

<div class="table-box">
<center>

<?php
echo "<b>Company Email:</b> ".$t1."<br><br>";

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
    <th>Action</th>
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
        <a href="uploads/<?php echo $di[6]; ?>" target="_blank">View Resume</a>
    </td>
    <td><?php echo $di[7]; ?></td>
    <td><?php echo $di[8]; ?></td>

    <!-- ACTION BUTTON -->
    <td>
        <form method="post" action="update_status.php" style="display:flex; gap:5px; justify-content:center;">
            <input type="hidden" name="applicationid" value="<?php echo $di[0]; ?>">

            <button type="submit" name="status" value="Selected" class="btn select">Select</button>
            <button type="submit" name="status" value="Rejected" class="btn reject">Reject</button>
        </form>
    </td>

</tr>
<?php } ?>
</table>

</center>
</div>

</div>
</body>
</html>