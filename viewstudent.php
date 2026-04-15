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
<title>All Students | Placement Portal</title>

<!-- SWEET ALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:"Segoe UI", Arial, sans-serif;
    background:url("bg2.jpg") no-repeat center center/cover;
    background-attachment: fixed;
}

/* ===== HEADER (FIXED + CLEAN) ===== */
.header{
    background:rgba(44,47,90,0.95);
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:12px 40px;
}

/* LEFT SIDE */
.header-left{
    display:flex;
    align-items:center;
    gap:10px;
}

.logo img{
    width:50px;
    height:50px;
    object-fit:cover;
}

.title h1{
    color:#fff;
    font-size:20px;
    margin:0;
    line-height:1.2;
}
.title p{
    color:#dcdcff;
    font-size:12px;
    margin:0;
}

/* NAV */
.nav{
    display:flex;
    align-items:center;
    gap:15px;
}

.nav a{
    color:#fff;
    text-decoration:none;
    font-size:14px;
    font-weight:600;
    padding:6px 10px;
    border-radius:10px;
    transition:0.3s;
}

.nav a:hover{
    background:rgba(255,255,255,0.1);
    color:#ffdf6c;
}

/* UNDERLINE EFFECT */
.nav a::after{
    content:'';
    display:block;
    height:2px;
    width:0;
    background:#ffdf6c;
    transition:0.3s;
    margin-top:3px;
}
.nav a:hover::after{
    width:100%;
}

/* ===== MAIN ===== */
.main{
    padding:60px;
}

.page-title{
    font-size:32px;
    font-weight:700;
    color:#fff;
    margin-bottom:25px;
}

/* SECTION */
.section{
    background:#fff;
    border-radius:12px;
    padding:25px;
    box-shadow:0 12px 30px rgba(0,0,0,0.25);
}

/* TABLE */
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
    font-size:14px;
}

tr:hover{
    background:#f5f5f5;
}

td img{
    border-radius:6px;
}
/* ===== CONTENT AREA ===== */
.content-area{
    width:100%;
    height:calc(100vh - 100px);  /* 🔥 full height minus topbar */
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
/* BUTTON */
.btn{
    padding:6px 12px;
    border-radius:6px;
    color:#fff;
    font-size:12px;
    cursor:pointer;
    border:none;
}

.delete{
    background:#e74c3c;
}

.delete:hover{
    background:#c0392b;
}
</style>
</head>

<body>


<!-- MAIN -->
<div class="main">

<div class="page-title">All Students</div>

<div class="section">

<table>
<tr>
    <th>Name</th>
    <th>Roll</th>
    <th>Email</th>
    <th>Dept</th>
    <th>Contact</th>
    <th>City</th>
    <th>State</th>
    <th>Photo</th>
    <th>Action</th>
</tr>

<?php
$conn = mysqli_connect("localhost","root","","placement");
$sql = mysqli_query($conn,"SELECT * FROM student WHERE is_deleted=0");

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
        <img src="<?php echo $di[8]; ?>" width="60" height="60">
    </td>

    <td>
        <button class="btn delete" onclick="deleteStudent('<?php echo $di[2]; ?>')">
            Delete
        </button>
    </td>
</tr>

<?php } ?>

</table>

</div>

</div>

<!-- SWEET ALERT -->
<script>
function deleteStudent(email){
    Swal.fire({
        title: 'Delete Student?',
        html: "<b>This action cannot be undone!</b>",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2c2f5a',
        cancelButtonColor: '#999',
        confirmButtonText: 'Yes, Delete',
        cancelButtonText: 'Cancel',
        background: '#ffffff',
        color: '#2c2f5a',
        backdrop: 'rgba(0,0,0,0.6)'
    }).then((result) => {
        if(result.isConfirmed){
            window.location = "deletestudent.php?email=" + email;
        }
    });
}
</script>

</body>
</html>