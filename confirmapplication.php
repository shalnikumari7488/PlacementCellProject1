<?php
session_start();
$t1 = $_SESSION["xx"];   // Company Email
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Update Application | Placement Portal</title>

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
    padding:70px;
    display:flex;
    justify-content:center;
}

/* FORM BOX */
.form-box{
    background:#fff;
    padding:35px 45px;
    border-radius:12px;
    box-shadow:0 12px 30px rgba(0,0,0,0.25);
    width:550px;
}

/* TITLE */
.form-box h2{
    text-align:center;
    color:#2c2f5a;
    margin-bottom:25px;
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
}
td{
    padding:10px;
    font-size:14px;
    color:#333;
}

/* INPUT */
input[type="text"]{
    width:95%;
    padding:8px;
    border:1px solid #ccc;
    border-radius:6px;
    font-size:13px;
}

/* BUTTON */
input[type="submit"]{
    margin-top:20px;
    padding:10px 35px;
    background:#5a5fcf;
    color:#fff;
    border:none;
    border-radius:25px;
    font-size:14px;
    cursor:pointer;
}
input[type="submit"]:hover{
    background:#2c2f5a;
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
<div class="form-box">

<h2>Update Application</h2>

<?php
$conn = mysqli_connect("localhost","root","","placement");

/* ONLY COMPANY'S APPLICATIONS */
$sql = mysqli_query($conn,"select * from application where companyemail='$t1'");
?>

<form action="updateapplication.php" method="get">

<table>

<?php while($di = mysqli_fetch_array($sql)) { ?>            

<tr>
    <td><b>APPLICATION ID:</b></td>
    <td><input type="text" name="nm1" value="<?php echo $di[0];?>" readonly></td>
</tr>

<tr>
    <td><b>STUDENT EMAIL:</b></td>
    <td><input type="text" value="<?php echo $di[1]; ?>" readonly></td>
</tr>

<tr>
    <td><b>STUDENT NAME:</b></td>
    <td><input type="text" value="<?php echo $di[2]; ?>" readonly></td>
</tr>

<tr>
    <td><b>COMPANY ID:</b></td>
    <td><input type="text" value="<?php echo $di[3]; ?>" readonly></td>
</tr>

<tr>
    <td><b>COMPANY EMAIL:</b></td>
    <td><input type="text" value="<?php echo $di[4]; ?>" readonly></td>
</tr>

<tr>
    <td><b>JOB ROLE:</b></td>
    <td><input type="text" value="<?php echo $di[5]; ?>" readonly></td>
</tr>

<!-- ✅ RESUME ADDED -->
<tr>
    <td><b>RESUME:</b></td>
    <td>
        <a href="uploads/<?php echo $di[6]; ?>" target="_blank">
            View Resume
        </a>
    </td>
</tr>

<tr>
    <td><b>APPLY DATE:</b></td>
    <td><input type="text" value="<?php echo $di[7]; ?>" readonly></td>
</tr>

<tr>
<td><b>STATUS:</b></td>
<td>
    <input type="hidden" name="appid[]" value="<?php echo $di[0]; ?>">

    <select name="status[]">
        <option <?php if($di[8]=="Pending") echo "selected"; ?>>Pending</option>
        <option <?php if($di[8]=="Selected") echo "selected"; ?>>Selected</option>
        <option <?php if($di[8]=="Rejected") echo "selected"; ?>>Rejected</option>
    </select>
</td>
</tr>

<tr><td colspan="2"><hr></td></tr>

<?php } ?>

</table>

<center>
<input type="submit" value="UPDATE STATUS">
</center>

</form>

</div>
</div>

</body>
</html>