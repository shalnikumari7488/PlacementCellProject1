<?php
$conn = mysqli_connect("localhost","root","","placement");

$email = $_POST['email'];
$password = $_POST['password'];

/* STEP 2: Email check */
$sql = mysqli_query($conn,"SELECT * FROM student WHERE email='$email'");

if(mysqli_num_rows($sql) > 0)
{
    /* STEP 3: Update password */
    mysqli_query($conn,"UPDATE student SET password='$password' WHERE email='$email'");

    echo "
    <!DOCTYPE html>
    <html>
    <head>
    <title>Success</title>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>

    <script>
    Swal.fire({
        title: 'Success!',
        text: 'Your password has been updated successfully 🔐',
        icon: 'success',
        confirmButtonText: 'Login Now',
        confirmButtonColor: '#2c2f5a',
        background: '#f5f7ff'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = 'studentlogin.html';
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
    <title>Error</title>
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>

    <script>
    Swal.fire({
        title: 'Oops!',
        text: 'Email not found ❌',
        icon: 'error',
        confirmButtonColor: '#d33'
    }).then(() => {
        window.history.back();
    });
    </script>

    </body>
    </html>
    ";
}
?>