<?php
session_start();

/* ===== DATABASE CONNECTION ===== */
$conn = mysqli_connect("localhost","root","","placement");

if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}

/* ===== GET FORM DATA ===== */
$email   = $_POST['email'];

$name    = $_POST['name'];
$roll    = $_POST['roll'];
$dept    = $_POST['dept'];
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

/* ===== SAFE QUERY BUILD ===== */
$sql = "UPDATE student SET 
name='$name',
roll='$roll',
department='$dept',
contact='$contact',
city='$city',
state='$state'";

$sql .= $imgQuery;   // yaha append kar rahe hain safely

$sql .= " WHERE email='$email'";

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
        text: 'Your profile has been updated successfully 🎉',
        icon: 'success',
        confirmButtonText: 'Go to Profile',
        confirmButtonColor: '#2c2f5a'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = 'studentprofile.php';
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