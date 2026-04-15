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

<!-- SWEET ALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
body{
    margin:0;
    font-family:"Segoe UI", Arial, sans-serif;
    background:url("c1.jpg") no-repeat center center/cover;
    background-attachment: fixed;
}

/* ===== HEADER (UNCHANGED) ===== */
.header{
    background:rgba(44,47,90,0.95);
    display:flex;
    align-items:center;
    padding:14px 40px;
}
.logo img{width:55px;}
.title{margin-left:15px;}
.title h1{color:#fff;font-size:24px;}
.title p{color:#dcdcff;font-size:14px;}
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
    padding:10px;
    text-align:center;
    border-bottom:1px solid #ddd;
    font-size:13px; /* compact */
}

th{
    background:#2c2f5a;
    color:#fff;
}

tr:hover{
    background:#f5f5f5;
}

/* BUTTON */
.btn{
    padding:6px 12px;
    border:none;
    border-radius:6px;
    color:#fff;
    font-size:12px;
    cursor:pointer;
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
<div class="page-title">Available Companies</div>

<div class="table-box">

<table>
<tr>
    <th>Company Name</th>
    <th>Email</th>
    <th>ID</th>
    <th>Contact</th>
    <th>City</th>
    <th>State</th>
    <th>Photo</th>
    <th>Action</th> <!-- NEW -->
</tr>

<?php
$conn = mysqli_connect("localhost","root","","placement");

/* 🔥 only active companies */
$sql = mysqli_query($conn,"SELECT * FROM company WHERE is_deleted=0");

while($di = mysqli_fetch_array($sql)){
?>
<tr>
    <td><?php echo $di[0]; ?></td>
    <td><?php echo $di[1]; ?></td>
    <td><?php echo $di[2]; ?></td>
    <td><?php echo $di[4]; ?></td>
    <td><?php echo $di[5]; ?></td>
    <td><?php echo $di[6]; ?></td>

    <td>
        <img src="<?php echo $di[7]; ?>" width="70" height="70">
    </td>

    <td>
        <button class="btn delete" onclick="deleteCompany('<?php echo $di[1]; ?>')">
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
function deleteCompany(companyemail){
    Swal.fire({
        title: 'Delete Company?',
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
            window.location = "deletecompany1git .php?companyemail=" + companyemail;
        }
    });
}
</script>

</body>
</html>