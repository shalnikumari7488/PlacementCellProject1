<?php
session_start();

/* ===== DATABASE CONNECTION ===== */
$conn = mysqli_connect("localhost","root","","placement");

if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}

/* ===== GET FORM DATA ===== */
$companyemail   = $_POST['companyemail'];

$companyname    = $_POST['comname'];

$comid     = $_POST['comid'];
$password    = $_POST['password'];
$contact = $_POST['contact'];
$city    = $_POST['city'];
$state   = $_POST['state'];

/* ===== IMAGE UPLOAD ===== */
$imgQuery = "";

if(isset($_FILES['photo']) && $_FILES['photo']['name'] != "")
{
    $photoName = $_FILES['photo']['name'];
    $tmp       = $_FILES['photo']['tmp_name'];

    $newPhotoName = time() . "_" . $photoName;
    $uploadPath = "image/" . $newPhotoName;

    if(move_uploaded_file($tmp, $uploadPath))
    {
        $imgQuery = ", photo='$uploadPath'";
    }
}

/* ===== UPDATE QUERY ===== */
$sql = "UPDATE company SET 
companyname='$comname',
companyemail='$companyemail',
companyid='$comid',
password='$password',
contact='$contact',
city='$city',
state='$state'";

$sql .= $imgQuery;

$sql .= " WHERE companyemail='$companyemail'";

/* ===== EXECUTE ===== */
if(mysqli_query($conn, $sql))
{
    echo "
    <!DOCTYPE html>
    <html>
    <head>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>

    <script>
    Swal.fire({
        title: 'Success!',
        text: 'Company profile updated successfully 🎉',
        icon: 'success',
        confirmButtonText: 'Go to Profile',
        confirmButtonColor: '#2c2f5a'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = 'companyprofile.php';
        }
    });
    </script>

    </body>
    </html>
    ";
}
else
{
    echo "
    <!DOCTYPE html>
    <html>
    <head>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>

    <script>
    Swal.fire({
        title: 'Error!',
        text: 'Something went wrong 😢',
        icon: 'error',
        confirmButtonColor: '#d33'
    });
    </script>

    </body>
    </html>
    ";
}
?>