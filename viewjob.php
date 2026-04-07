<?php
session_start();
$t1 = $_SESSION["xx"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Available Jobs | Placement Portal</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI", Arial, sans-serif;
}

body{
    background:#f4f6f9;
}

/* HEADER */
.header{
    background:#2c2f5a;
    display:flex;
    align-items:center;
    padding:16px 40px;
}
.logo img{width:55px;}
.title{margin-left:15px;}
.title h1{color:#fff;font-size:24px;}
.title p{color:#ccc;font-size:14px;}
.nav{margin-left:auto;}
.nav a{
    color:#fff;
    text-decoration:none;
    margin-left:20px;
    font-size:14px;
}
.nav a:hover{color:#ffdf6c;}

/* MAIN */
.main{
    padding:40px 80px;
}

/* JOB LIST */
.job-container{
    display:flex;
    flex-direction:column;
    gap:20px;
}

/* CARD */
.job-card{
    display:flex;
    background:#fff;
    border-radius:12px;
    box-shadow:0 5px 20px rgba(0,0,0,0.08);
    overflow:hidden;
    transition:0.3s;
}
.job-card:hover{
    transform:translateY(-4px);
}

/* IMAGE */
.job-img{
    width:220px;
    height:100%;
    object-fit:cover;
}

/* CONTENT */
.job-content{
    padding:20px;
    flex:1;
}

/* TOP ROW */
.top-row{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

/* TITLE */
.job-title{
    font-size:20px;
    font-weight:700;
    color:#2c2f5a;
}

.company{
    font-size:15px;
    color:#666;
    margin-top:3px;
}

/* SALARY BADGE */
.salary{
    background:#e6f4ea;
    color:#1e7e34;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

/* INFO */
.info{
    font-size:14px;
    margin:6px 0;
    color:#444;
}

/* BUTTONS */
.actions{
    margin-top:12px;
}

.btn{
    padding:7px 18px;
    border:none;
    border-radius:20px;
    cursor:pointer;
    font-size:13px;
    margin-right:10px;
}

/* VIEW */
.view-btn{
    background:#0073b1;
    color:#fff;
}
.view-btn:hover{
    background:#005582;
}

/* APPLY */
.apply-btn{
    background:#28a745;
    color:#fff;
}
.apply-btn:hover{
    background:#1e7e34;
}

/* DETAILS */
.more{
    display:none;
    margin-top:12px;
    border-top:1px solid #ddd;
    padding-top:12px;
    animation:fadeIn 0.4s ease;
}

@keyframes fadeIn{
    from{opacity:0;transform:translateY(10px);}
    to{opacity:1;transform:translateY(0);}
}
</style>

<script>
function toggleDetails(id, btn){
    let x = document.getElementById(id);

    if(x.style.display === "block"){
        x.style.display = "none";
        btn.style.display = "inline-block";
    } else {
        x.style.display = "block";
        btn.style.display = "none";
    }
}
</script>

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

<div class="job-container">

<?php
$conn = mysqli_connect("localhost","root","","placement");

$sql = mysqli_query($conn,"select * from job");

$i=0;
while($di = mysqli_fetch_array($sql))
{
    $i++;
?>

<div class="job-card">

    <!-- IMAGE -->
    <img src="<?php echo $di[9]; ?>" class="job-img">

    <!-- CONTENT -->
    <div class="job-content">

        <!-- TOP -->
        <div class="top-row">
            <div>
                <div class="job-title"><?php echo $di[0]; ?></div>
                <div class="company"><?php echo $di[4]; ?></div>
            </div>

            <div class="salary">
                <?php echo $di[3]; ?>
            </div>
        </div>

        <!-- BASIC INFO -->
        <div class="info"><b>📍 Location:</b> <?php echo $di[6]; ?></div>
        <div class="info"><b>📅 Last Date:</b> <?php echo $di[7]; ?></div>

        <!-- BUTTONS -->
        <div class="actions">
            <button class="btn view-btn" onclick="toggleDetails('more<?php echo $i; ?>', this)">
                View More
            </button>

           <a href="applyjob.html" target="_blank">
    <button class="btn apply-btn">Apply Now</button>
</a>
        </div>

        <!-- MORE DETAILS -->
        <div class="more" id="more<?php echo $i; ?>">

            <div class="info"><b>Description:</b> <?php echo $di[1]; ?></div>
            <div class="info"><b>Eligibility:</b> <?php echo $di[2]; ?></div>
            <div class="info"><b>Email:</b> <?php echo $di[5]; ?></div>
            <div class="info"><b>Post Date:</b> <?php echo $di[8]; ?></div>

        </div>

    </div>

</div>

<?php } ?>

</div>

</div>

</body>
</html>