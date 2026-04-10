<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>

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
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(rgba(44,47,90,0.7), rgba(44,47,90,0.7)),
               url("bg4.jpg") no-repeat center center/cover;
}

/* CARD */
.box{
    background:#ffffff;
    padding:35px 30px;
    border-radius:16px;
    width:100%;
    max-width:380px;
    box-shadow:0 15px 40px rgba(0,0,0,0.3);
    animation:fadeIn 0.6s ease;
}

/* TITLE */
.box h2{
    text-align:center;
    margin-bottom:25px;
    color:#2c2f5a;
    font-weight:600;
}

/* INPUT */
input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:1px solid #ddd;
    border-radius:8px;
    font-size:14px;
    transition:0.3s;
}

/* INPUT FOCUS */
input:focus{
    border-color:#2c2f5a;
    box-shadow:0 0 0 2px rgba(44,47,90,0.1);
    outline:none;
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

/* EXTRA TEXT */
.extra{
    text-align:center;
    margin-top:15px;
    font-size:13px;
}

.extra a{
    color:#2c2f5a;
    text-decoration:none;
    font-weight:600;
}

.extra a:hover{
    text-decoration:underline;
}

/* ANIMATION */
@keyframes fadeIn{
    from{opacity:0; transform:translateY(20px);}
    to{opacity:1; transform:translateY(0);}
}
</style>

</head>

<body>

<div class="box">
<h2>Reset Password</h2>

<form action="resetpassword.php" method="post">

<input type="email" name="email" placeholder="Enter Email" required>

<input type="password" name="password" placeholder="New Password" required>

<button type="submit">Reset Password</button>

</form>

<div class="extra">
    <a href="studentlogin.html">Back to Login</a>
</div>

</div>

</body>
</html>