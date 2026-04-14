<?php
session_start();
$t1 = $_SESSION["xx"];

$conn = mysqli_connect("localhost","root","","placement");

$sql = mysqli_query($conn,"select * from company where companyemail='$t1'");
$di = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Profile</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins', sans-serif;
}

/* BACKGROUND */
body{
    background:linear-gradient(rgba(44,47,90,0.6), rgba(44,47,90,0.6)),
               url("c1.jpg") no-repeat center center/cover;
}

/* CONTAINER */
.container{
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
    padding:20px;
}

/* FORM CARD */
.form-box{
    background:#ffffff;
    padding:35px 30px;
    width:100%;
    max-width:520px;
    border-radius:16px;
    box-shadow:0 15px 40px rgba(0,0,0,0.25);
    animation:fadeIn 0.6s ease;
}

/* TITLE */
.form-box h2{
    text-align:center;
    margin-bottom:25px;
    color:#2c2f5a;
    font-weight:600;
}

/* SECTION TITLE */
.section-title{
    font-size:13px;
    color:#888;
    margin-bottom:10px;
    font-weight:600;
}

/* INPUT GROUP */
.input-group{
    margin-bottom:18px;
}

/* LABEL */
.input-group label{
    font-size:13px;
    font-weight:600;
    color:#555;
    margin-bottom:6px;
    display:block;
}

/* INPUT */
.input-group input{
    width:100%;
    padding:11px 12px;
    border:1px solid #ddd;
    border-radius:8px;
    outline:none;
    font-size:14px;
    transition:0.3s;
}

/* INPUT FOCUS */
.input-group input:focus{
    border-color:#2c2f5a;
    box-shadow:0 0 0 2px rgba(44,47,90,0.1);
}

/* FILE INPUT */
.input-group input[type="file"]{
    padding:6px;
}

/* DIVIDER */
.divider{
    margin:20px 0;
    border:none;
    border-top:1px solid #eee;
}

/* BUTTON */
button{
    width:100%;
    padding:13px;
    margin-top:10px;
    background:linear-gradient(135deg,#2c2f5a,#1e2145);
    color:#fff;
    border:none;
    border-radius:8px;
    font-size:15px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 20px rgba(0,0,0,0.2);
}

/* ANIMATION */
@keyframes fadeIn{
    from{opacity:0; transform:translateY(20px);}
    to{opacity:1; transform:translateY(0);}
}
</style>
</head>

<body>

<div class="container">

<div class="form-box">

<h2>Edit Profile</h2>

<form action="updateprofile.php" method="post" enctype="multipart/form-data">

<div class="section-title">Basic Details</div>

<div class="input-group">
<label> Company Name</label>
<input type="text" name="name" value="<?php echo $di[0]; ?>" required>
</div>

<div class="input-group">
<label>Comapany Email</label>
<input type="email" name="roll" value="<?php echo $di[1]; ?>" required>
</div>

<div class="input-group">
<label>Comapany Id</label>
<input type="text" name="email" value="<?php echo $di[2]; ?>" required>
</div>



<div class="input-group">
<label>Password</label>
<input type="text" name="dept" value="<?php echo $di[3]; ?>" required>
</div>

<div class="input-group">
<label>Contact</label>
<input type="text" name="contact" value="<?php echo $di[4]; ?>" required>
</div>

<div class="input-group">
<label>City</label>
<input type="text" name="city" value="<?php echo $di[5]; ?>" required>
</div>

<div class="input-group">
<label>State</label>
<input type="text" name="state" value="<?php echo $di[6]; ?>" required>
</div>

<div class="divider"></div>

<div class="section-title">Profile Photo</div>

<div class="input-group">
<label>Upload New Photo</label>
<input type="file" name="photo">
</div>

<button type="submit">Update Profile</button>

</form>

</div>

</div>

</body>
</html>