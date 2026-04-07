<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>View Student Applications</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

/* ===== STATS ===== */
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

/* ===== CHART ===== */
.chart-container{
    display:flex;
    justify-content:center;
    margin-bottom:30px;
}

.chart-box{
    background:#fff;
    padding:20px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
    width:280px;
    height:280px;
    text-align:center;
}

/* ===== TABLE ===== */
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
}
th{
    background:#2c2f5a;
    color:#fff;
}
tr:hover{background:#f5f5f5;}
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
$total_res = mysqli_query($conn,"select count(*) as total from application ");
$total = mysqli_fetch_array($total_res);

/* ===== STATUS COUNT ===== */
$status_res = mysqli_query($conn,"select status, count(*) as total from application group by status");

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

<!-- ===== PIE CHART ===== -->
<div class="chart-container">
    <div class="chart-box">
        <h3>Application Status</h3>
        <canvas id="myChart"></canvas>
    </div>
</div>

<div class="table-box">
<center>

<?php
echo "<b>Admin Email:</b> ".$t1."<br><br>";

$sql = mysqli_query($conn,"select * from application ");
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
        <a href="uploads/<?php echo $di[6]; ?>" target="_blank">View Resume</a>
    </td>
    <td><?php echo $di[7]; ?></td>
    <td><?php echo $di[8]; ?></td>
</tr>
<?php } ?>
</table>

</center>
</div>

</div>

<!-- ===== CHART SCRIPT ===== -->
<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Pending', 'Selected', 'Rejected'],
        datasets: [{
            data: [<?php echo $pending; ?>, <?php echo $selected; ?>, <?php echo $rejected; ?>],
            backgroundColor: ['orange','green','red']
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>

</body>
</html>