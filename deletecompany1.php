<?php
$conn = mysqli_connect("localhost","root","","placement");

$companyemail = $_GET['companyemail'];

mysqli_query($conn,"UPDATE company SET is_deleted=1 WHERE companyemail='$companyemail'");

echo "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script>
Swal.fire({
    title:'Deleted!',
    text:'Company removed successfully',
    icon:'success',
    confirmButtonColor:'#2c2f5a'
}).then(()=>{
    window.location='viewcompany.php';
});
</script>
";
?>