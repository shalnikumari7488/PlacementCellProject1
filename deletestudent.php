<?php
session_start();

/* ===== DATABASE CONNECTION ===== */
$conn = mysqli_connect("localhost","root","","placement");

if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}

/* ===== GET EMAIL ===== */
if(isset($_GET['email']))
{
    $email = $_GET['email'];

    /* ===== SOFT DELETE ===== */
    $sql = "UPDATE student SET is_deleted=1 WHERE email='$email'";

    if(mysqli_query($conn,$sql))
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
            title: 'Deleted!',
            text: 'Student has been removed successfully',
            icon: 'success',
            confirmButtonColor: '#2c2f5a'
        }).then(() => {
            window.location='viewstudent.php';
        });
        </script>

        </body>
        </html>
        ";
    }
    else
    {
        echo "
        <script>
        alert('Error: Could not delete');
        window.location='viewstudent.php';
        </script>
        ";
    }
}
else
{
    header("location:viewstudent.php");
}
?>